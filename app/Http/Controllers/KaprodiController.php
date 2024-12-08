<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Classrooms;
use App\Models\jadwal;

class KaprodiController extends Controller
{
    // Menampilkan halaman dashboard Kaprodi
    public function dashboard(Request $request)
    {
        $status = $request->query('status', 'belum_diverifikasi');
        return view('dashboard-kaprodi', compact('status'));
    }

    // Menampilkan halaman tabel verifikasi IRS
    public function menuVerifikasi()
    {
        return view('tabelVerifikasiIRS');
    }

    // Menampilkan halaman IRS Mahasiswa
    public function irsMahasiswa()
    {
        return view('pembimbing-irs-mahasiswa');
    }

    // Menampilkan halaman nyusun jadwal
    public function menuNyusunJadwal()
    {
        // Ambil data dari tabel 'jadwal' untuk tabel jadwal
        $submissions = jadwal::all();

        // Ambil data dosen dan mata kuliah untuk digunakan di form
        $dosenList = DB::table('dosen')->select('nama')->get();
        $matakuliahList = DB::table('matakuliah')->select('kodemk', 'nama', 'jurusan', 'sks')->get();

        // Ambil data ruang dengan status "Sudah Disetujui" dari tabel classrooms
        $ruangDisetujui = Classrooms::where('status', 'Sudah Disetujui')->get();

        // Kirim data ke view
        return view('nyusunJadwalKaprodi', compact('submissions', 'dosenList', 'matakuliahList', 'ruangDisetujui'));
    }

    // Menyimpan jadwal baru ke tabel 'jadwal'
    public function simpanJadwal(Request $request)
    {
        // Validasi data dari form
        $data = $request->validate([
            'ruang' => 'required|string',
            'kelas' => 'required|string',
            'semester_aktif' => 'required|integer|min:1|max:14',
            'jurusan' => 'required|string',
            'sks' => 'required|integer',
            'hari' => 'required|string',
            'pengampu_1' => 'required|string',
            'pengampu_2' => 'required|string',
            'pengampu_3' => 'nullable|string',
            'kodemk' => 'required|string',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i|after:jam_mulai',
        ]);

        // 1. Validasi jika sudah ada jadwal dengan Kelas dan Kode MK yang sama
        $existingSchedule = DB::table('jadwal')
            ->where('kelas', $data['kelas'])
            ->where('kodemk', $data['kodemk'])
            ->exists();

        if ($existingSchedule) {
            return back()->withErrors(['kelas_kodemk' => 'Jadwal dengan kelas dan kode MK yang sama sudah ada.'])->withInput();
        }

        // 2. Validasi jika ruang dan hari bertabrakan dengan jam yang sudah ada
        $conflictingSchedule = DB::table('jadwal')
            ->where('ruang', $data['ruang'])
            ->where('hari', $data['hari'])
            ->where(function($query) use ($data) {
                // Cek apakah jam kuliah baru bertabrakan
                $query->whereBetween('jam_mulai', [$data['jam_mulai'], $data['jam_selesai']])
                    ->orWhereBetween('jam_selesai', [$data['jam_mulai'], $data['jam_selesai']])
                    ->orWhere(function($query) use ($data) {
                        $query->where('jam_mulai', '<', $data['jam_mulai'])
                                ->where('jam_selesai', '>', $data['jam_selesai']);
                    });
            })
            ->exists();

        if ($conflictingSchedule) {
            return back()->withErrors(['jam_conflict' => 'Jadwal tidak dapat ditambahkan karena ruang dan jam bertabrakan.'])->withInput();
        }

        // Simpan data ke database
        jadwal::create($data);

        // Redirect ke halaman nyusunJadwalKaprodi agar list terbaru ditampilkan
        return redirect()->route('nyusunJadwalKaprodi')->with('success', 'Jadwal berhasil disimpan.');
    }

    public function edit($id)
    {
        // Ambil data jadwal berdasarkan id
        $jadwal = jadwal::findOrFail($id);

        // Kirim data ke view untuk proses edit
        
        return view('nyusunJadwalKaprodi', compact('jadwal'));
    }

    public function updateJadwal(Request $request, $id)
{
    // Validasi data dari form
    $data = $request->validate([
        'ruang' => 'required|string|max:255',
        'kelas' => 'required|string|max:255',
        'semester_aktif' => 'required|integer|min:1|max:14',
        'jurusan' => 'required|string|max:255',
        'pengampu_1' => 'required|string|max:255',
        'pengampu_2' => 'required|string|max:255',
        'pengampu_3' => 'nullable|string|max:255',
        'kodemk' => 'required|string|max:255',
        'hari' => 'required|string|max:10',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai'
    ]);

    // Temukan data jadwal yang ingin diubah
    $jadwal = jadwal::findOrFail($id);

    // Perbarui data jadwal
    $jadwal->update($data);

    return redirect()->route('nyusunJadwalKaprodi')->with('success', 'Jadwal berhasil diperbarui.');
}

    // Fungsi untuk menghapus jadwal
    public function hapusJadwal($id)
    {
        // Menghapus data dari tabel 'jadwal'
        DB::table('jadwal')->where('id', $id)->delete();

        return redirect()->route('nyusunJadwalKaprodi')->with('success', 'Jadwal berhasil dihapus.');
    }
}