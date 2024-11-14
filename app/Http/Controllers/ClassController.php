<?php

namespace App\Http\Controllers;

use App\Models\approveclass;
use App\Models\approveclassrooms;
use App\Models\classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $kelas = classroom::all();
        return view('academic-classpage-dekan', compact('kelas'));
    }

    public function filter(Request $request)
    {

        $semester = $request->input('semester');
        $jurusan = $request->input('jurusan');

        $kelas = Classroom::query();

        if ($semester) {
            $kelas->where('semester', $semester);
        }

        if ($jurusan) {
            $kelas->where('jurusan', $jurusan);
        }

        $kelas = $kelas->get();

        return view('academic-classpage-dekan', compact('kelas'));
    }
    public function approve($id)
    {
        // Cari kelas berdasarkan ID
        $kelas = Classroom::find($id);

        // Pindahkan data ke tabel kelas_disetujui
        $kelasDisetujui = new approveclassrooms();
        $kelasDisetujui->nama = $kelas->nama;   
        $kelasDisetujui->ruang = $kelas->ruang;
        $kelasDisetujui->hari = $kelas->hari;
        $kelasDisetujui->jam_mulai = $kelas->jam_mulai;
        $kelasDisetujui->jam_selesai = $kelas->jam_selesai;
        $kelasDisetujui->semester = $kelas->semester;
        $kelasDisetujui->jurusan = $kelas->jurusan;
        $kelasDisetujui->save();

        // Hapus data dari tabel kelas
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Jadwal berhasil disetujui.');
    }
}
