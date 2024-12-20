<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\khs;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\mahasiswa;
use App\Models\matakuliah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PembatalanIrsEvent;
use App\Models\users;
use Carbon\Carbon;

class IRSController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data mahasiswa berdasarkan email pengguna yang sedang login
        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();

        // Tentukan semester mahasiswa (angka semester)
        $semesterMahasiswa = $mahasiswa->semester;

        // Tentukan apakah semester mahasiswa ganjil atau genap
        $isGenap = $semesterMahasiswa % 2 == 0;

        // Query untuk mengambil jadwal sesuai dengan semester mahasiswa
        $query = \App\Models\Jadwal::where(function ($query) use ($isGenap) {
            $query->whereRaw('semester_aktif % 2 = ?', [$isGenap ? 0 : 1]);
        });

        // Jika ada query pencarian, filter jadwal berdasarkan kata kunci pencarian
        if ($request->has('query') && $request->query('query') !== '') {
            $query->where(function ($q) use ($request) {
                $q->where('kodemk', 'like', '%' . $request->query('query') . '%')
                    ->orWhereHas('matakuliah', function ($q) use ($request) {
                        $q->where('nama', 'like', '%' . $request->query('query') . '%');
                    });
            });
        }

        // Hitung SKS yang sedang diambil
        $nim = $mahasiswa ? $mahasiswa->nim : null;
        $sksLoad = $this->calculateSKSLoad($nim);

        // Tanggal sekarang dikurangi 14 hari
        $tanggalMaks = Carbon::now()->subDays(14);

        // Query list mata kuliah
        $listMK = \App\Models\Jadwal::select('kodemk', 'updated_at')
            ->where('status', 'Belum Disetujui')
            ->whereDate('updated_at', '<=', $tanggalMaks)
            ->distinct()
            ->get();

        // Kirim data ke view
        return view('mahasiswa-buatirs', compact('jadwals', 'sksLoad', 'tanggalSekarang'));
    }



    // Method untuk menangani tombol "Ambil"
    public function ambil(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();
        $sksLoad = $this->calculateSKSLoad($mahasiswa->nim);

        // Check if the current SKS load plus the new course's SKS exceeds the limit
        if (($mahasiswa->current_sks + $jadwal->sks) > $sksLoad) {
            if ($request->ajax()) {
                return response()->json(['error' => 'Exceeds the SKS limit'], 422);
            }
            return back()->withErrors('Exceeds the SKS limit');
        }

        // Proceed with enrollment
        $mahasiswa->current_sks += $jadwal->sks;
        $mahasiswa->save();
        $jadwal->status = 'Diambil';
        $jadwal->save();

        if ($request->ajax()) {
            return response()->json(['success' => 'Course successfully taken']);
        }
        return back()->with('success', 'Course successfully taken');
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $jadwals = Jadwal::whereHas('matakuliah', function ($q) use ($query) {
            $q->where('nama', 'like', '%' . $query . '%');
            $q->whereRaw('semester_aktif % 2 = 1');
        })
            ->orWhere('kodemk', 'like', "%{$query}%")
            ->with('matakuliah')
            ->get();

        if ($request->ajax()) {
            return response()->json($jadwals);
        }

        return view('mahasiswa.buatirs', compact('jadwals'));
    }

    public function calculateSKSLoad($nim)
    {
        // Ambil data mahasiswa
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        // Cek apakah data mahasiswa ada dan memiliki semester
        if (!$mahasiswa || $mahasiswa->semester === null) {
            return null; // Tidak ada data mahasiswa atau semester tidak ditetapkan
        }

        // Menghitung semester sebelumnya
        $previousSemester = $mahasiswa->semester - 1;

        // Mengambil data KHS untuk semester sebelumnya
        $khsRecords = KHS::where('nim', $nim)->where('semester', $previousSemester)->get();

        // Jika tidak ada catatan KHS untuk semester tersebut, kembalikan null atau load SKS default
        if ($khsRecords->isEmpty()) {
            return 18; // Misalnya mengembalikan beban SKS minimum jika tidak ada data KHS
        }

        // Menghitung total SKS dan total poin
        $totalSKS = $khsRecords->sum('sks');
        $totalPoints = $khsRecords->reduce(function ($carry, $item) {
            return $carry + ($item->sks * $this->getGradePoints($item->nilai_huruf));
        }, 0);

        // Menghitung IP Semester
        $ipSemester = $totalSKS > 0 ? round($totalPoints / $totalSKS, 2) : 0;

        // Menentukan beban SKS berdasarkan IP
        return $this->determineSKSLoadBasedOnIP($ipSemester);
    }


    protected function getGradePoints($grade)
    {
        $gradePoints = [
            'A' => 4,
            'B' => 3,
            'C' => 2,
            'D' => 1,
            'E' => 0
        ];

        return $gradePoints[$grade] ?? 0;
    }

    protected function determineSKSLoadBasedOnIP($ip)
    {
        if ($ip >= 3.0) {
            return 24;
        } elseif ($ip >= 2.5) {
            return 20;
        } else {
            return 18;
        }
    }

    public function store(Request $request)
    {
        // Validasi input data (sesuaikan dengan field di form)
        $validated = $request->validate([
            'student_id' => 'required|integer',
            'tahun_akademik' => 'required|string',
            // Tambahkan validasi untuk field lain sesuai kebutuhan
        ]);

        // Simpan data ke tabel irs dan set status ke 'Belum Disetujui'
        IRS::create([
            'student_id' => $validated['student_id'],
            'tahun_akademik' => $validated['tahun_akademik'],
            'status' => 'Belum Disetujui',
            // Tambahkan kolom lain yang sesuai dengan tabel irs
        ]);

        // Redirect atau response sukses
        return redirect()->route('irs.index')->with('success', 'Data IRS berhasil disimpan!');
    }

    public function submitIRS(Request $request)
    {
        // Validasi data
        $request->validate([
            'courses' => 'required|array',
            'courses.*.kodemk' => 'required|string',
            'courses.*.mata_kuliah' => 'required|string',
            'courses.*.hari' => 'required|string',
            'courses.*.sks' => 'required|integer',
            'courses.*.waktu' => 'required|string',
            'courses.*.kelas' => 'required|string',
            'courses.*.semester' => 'required|string',
            'sks' => 'required|integer',
            'student_id' => 'required|integer|exists:users,id',
        ]);

        try {
            $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
            $nim = $mahasiswa ? $mahasiswa->nim : null;

            foreach ($request->courses as $course) {
                list($jam_mulai, $jam_selesai) = explode('-', $course['waktu']);
                $jadwal = Jadwal::where('kodemk', $course['kodemk'])->first();

                $jurusan = $jadwal ? $jadwal->jurusan : 'Tidak Diketahui';
                $pengampu_1 = $jadwal ? $jadwal->pengampu_1 : 'Tidak Diketahui';
                $pengampu_2 = $jadwal ? $jadwal->pengampu_2 : 'Tidak Diketahui';
                $pengampu_3 = $jadwal ? $jadwal->pengampu_3 : 'Tidak Diketahui';

                Irs::create([
                    'nim' => $nim,
                    'kodemk' => $course['kodemk'],
                    'sks' => $course['sks'],
                    'ruang' => $course['ruang'],
                    'hari' => $course['hari'],
                    'jam_mulai' => $jam_mulai,
                    'jam_selesai' => $jam_selesai,
                    'kelas' => $course['kelas'],
                    'semester' => $course['semester'],
                    'tahun_ajaran' => '2024-2025',
                    'jurusan' => $jurusan,
                    'pengampu_1' => $pengampu_1,
                    'pengampu_2' => $pengampu_2,
                    'pengampu_3' => $pengampu_3,
                    'status_irs' => 'Belum Disetujui', // Always set to default
                    'status_mk' => $request->status_mk ?? 'Baru',
                ]);
            }

            // Sinkronisasi ke tabel irs_mahasiswa
            $this->syncIRSDataForStudent($nim);

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    public function cancelIRS(Request $request)
{
    try {
        // Validasi input
        $request->validate([
            'courses' => 'required|array|min:1',
            'courses.*.kodemk' => 'required|string',
            'courses.*.kelas' => 'required|string',
            'courses.*.semester' => 'required|integer',
        ]);

        // Ambil mahasiswa berdasarkan email
        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
        $nim = $mahasiswa ? $mahasiswa->nim : null;


        if (!$nim) {
            return response()->json(['success' => false, 'message' => 'Mahasiswa tidak ditemukan']);
        }

        // Cek status IRS pada tabel irs_mahasiswa berdasarkan nim mahasiswa
        $irsMahasiswa = DB::table('irs_mahasiswa')
            ->where('mahasiswa_id', $nim)
            ->first();

        // Jika status IRS sudah disetujui, cancel tidak boleh dilakukan
        if ($irsMahasiswa && $irsMahasiswa->status === 'Sudah Disetujui') {
            return response()->json([
                'success' => false,
                'message' => "Tidak bisa membatalkan IRS karena statusnya sudah disetujui."
            ]);
        }

        // Loop untuk menghapus semua mata kuliah yang dikirimkan
        foreach ($request->courses as $course) {
            Irs::where('nim', $nim)
                ->where('kodemk', $course['kodemk'])
                ->where('kelas', $course['kelas'])
                ->where('semester', $course['semester'])
                ->delete();
        }

        // Sinkronisasi data di irs_mahasiswa
        $this->syncIRSDataForStudent($nim);

        return response()->json(['success' => true, 'message' => 'IRS berhasil dibatalkan dan semua data terkait telah dihapus']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => $e->getMessage()]);
    }
}

    

    private function syncIRSDataForStudent($nim)
    {
        // Ambil data IRS teragregasi untuk mahasiswa tertentu dengan tahun ajaran 2024/2025
        $aggregatedData = DB::table('irs')
            ->selectRaw('
            nim AS mahasiswa_id,
            CONCAT(tahun_ajaran, " ", REGEXP_REPLACE(semester, "[0-9]", "")) AS periode,
            MAX(status_irs) AS status,
            MAX(created_at) AS tanggal_submit
        ')
            ->where('nim', $nim)
            ->where('tahun_ajaran', '2024-2025') // Pastikan hanya mengambil tahun ajaran 2024/2025
            ->groupBy('nim', 'tahun_ajaran', 'semester')
            ->first();

        if ($aggregatedData) {
            // Jika ada data IRS, sinkronisasi ke tabel irs_mahasiswa
            DB::table('irs_mahasiswa')->updateOrInsert(
                [
                    'mahasiswa_id' => $aggregatedData->mahasiswa_id,
                    'periode' => $aggregatedData->periode,
                ],
                [
                    'status' => 'Belum Disetujui', // Pastikan status default
                    'tanggal_submit' => $aggregatedData->tanggal_submit,
                    'updated_at' => now(),
                ]
            );
        } else {
            // Jika tidak ada data IRS yang tersisa, hapus dari tabel irs_mahasiswa
            DB::table('irs_mahasiswa')->where('mahasiswa_id', $nim)->delete();
        }
    }


    public function getIRS(Request $request)
{
    $studentId = Auth::user()->id; // ID mahasiswa yang login
    $irs = IRS::where('student_id', $studentId)->get(); // Ambil IRS mahasiswa login
    return response()->json($irs);
}


    public function showIrs()
    {
        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
        $nim = $mahasiswa ? $mahasiswa->nim : null;

        // Pastikan nim terisi dengan benar
        if (!$nim) {
            dd('NIM tidak ditemukan untuk user yang sedang login');
        }

        // Ambil data IRS berdasarkan NIM
        $irsData = \App\Models\Irs::where('nim', $nim)->get();

        // Pastikan irsData ada
        if ($irsData->isEmpty()) {
            dd('Data IRS tidak ditemukan');
        }

        return view('mahasiswa-irs', compact('irsData'));
    }

    public function create()
    {
        // Ambil data mahasiswa berdasarkan email pengguna yang login
        $mahasiswa = Mahasiswa::where('email', Auth::user()->email)->first();

        // Pastikan data mahasiswa ditemukan
        if (!$mahasiswa) {
            return redirect()->route('login')->with('error', 'Data mahasiswa tidak ditemukan.');
        }

        // Cek status akademik mahasiswa, hanya mahasiswa aktif yang dapat mengakses halaman ini
        if ($mahasiswa->status !== 'Aktif') {
            return redirect()->route('dashboard-mahasiswa')->with('error', 'Hanya mahasiswa aktif yang dapat membuat IRS.');
        }

        // Tampilkan view untuk membuat IRS jika status aktif
        return view('mahasiswa-irs');
    }

    public function enroll($nim, $kodemk)
    {
        $student = Mahasiswa::findOrFail($nim);  // Ambil data mahasiswa berdasarkan NIM
        $course = Matakuliah::findOrFail($kodemk);  // Ambil data mata kuliah berdasarkan kode

        // Ambil semester mahasiswa dari tabel mahasiswa
        $studentSemester = $student->semester;

        // Cek apakah mahasiswa bisa mengambil mata kuliah berdasarkan semester mereka
        if (!$this->canEnrollInCourse($studentSemester, $course)) {
            return response()->json([
                'message' => 'Mata kuliah ini hanya untuk mahasiswa semester yang lebih tinggi.',
            ], 400);
        }

        // Cek total mahasiswa yang sudah mendaftar di mata kuliah ini
        $totalEnrolled = $course->students()->count();

        // Kuota maksimal kelas
        $jadwal = Jadwal::where('kodemk', $kodemk)->first();
        $maxQuota = $jadwal ? $jadwal->kuota : 30;  // Asumsi kuota maksimal 30 jika tidak ada data kuota

        // Jika jumlah mahasiswa yang terdaftar kurang dari kuota maksimal, langsung proses pendaftaran
        if ($totalEnrolled < $maxQuota) {
            $student->courses()->attach($course);  // Mendaftar mata kuliah
            return response()->json(['message' => 'Berhasil mendaftar mata kuliah!']);
        } else {
            // Cek mahasiswa semester atas yang sudah mendaftar
            $higherSemesterCount = $course->students()
                ->where('semester', '>', $studentSemester)  // Menggunakan semester mahasiswa
                ->count();

            // Jika masih ada kuota untuk mahasiswa semester bawah
            if (($totalEnrolled - $higherSemesterCount) < $maxQuota) {
                $student->courses()->attach($course);  // Mendaftar mata kuliah
                return response()->json(['message' => 'Berhasil mendaftar mata kuliah!']);
            } else {
                return response()->json([
                    'message' => 'Kuota kelas penuh, tidak ada kuota untuk mahasiswa semester bawah.',
                ], 400);
            }
        }
    }


    // Method untuk cek apakah mahasiswa dapat mendaftar pada mata kuliah
    public function canEnrollInCourse($studentSemester, $course)
    {
        // Cek apakah mata kuliah ini hanya dapat diambil oleh mahasiswa semester tertentu
        return $studentSemester >= $course->required_semester;
    }
}
