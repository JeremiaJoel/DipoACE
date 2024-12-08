<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\khs;
use App\Models\User;
use App\Models\Jadwal;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Notifications\PembatalanIrsEvent;
use App\Models\users;

class IRSController extends Controller
{

    // public function __construct()
    // {
    //         $this->middleware('StatusMahasiswa')->only([
    //         'index', 'ambil', 'submitIRS', 'showIrs'
    //     ]);
    // }

    public function index()
    {
        // Ambil data jadwal dari database
        $jadwals = Jadwal::paginate(10);

        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();

        if ($mahasiswa && $mahasiswa->status === 'Cuti') {
            // Kirim pesan error ke view jika status mahasiswa adalah Cuti
            return view('mahasiswa-buatirs', ['error' => 'Status Cuti Tidak Dapat Mengisi IRS']);
        }

        $nim = $mahasiswa ? $mahasiswa->nim : null;
        $sksLoad = $this->calculateSKSLoad($nim);

        // Kirim data ke view
        return view('mahasiswa-buatirs', compact('jadwals', 'sksLoad'));
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
        // Ambil data IRS teragregasi untuk mahasiswa tertentu
        $aggregatedData = DB::table('irs')
            ->selectRaw('
            nim AS mahasiswa_id,
            CONCAT(tahun_ajaran, " ", REGEXP_REPLACE(semester, "[0-9]", "")) AS periode,
            MAX(status_irs) AS status,
            MAX(created_at) AS tanggal_submit
        ')
            ->where('nim', $nim)
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

}
