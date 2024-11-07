<?php

namespace App\Http\Controllers;

use App\Models\approveschedule;
use App\Models\schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $jadwal = Schedule::all();
        // dd($jadwal);
        return view('academic-schedulepage-dekan', compact('jadwal'));
    }

    public function filter(Request $request)
    {

        $semester = $request->input('semester_aktif');
        $jurusan = $request->input('jurusan');
        $kelas = $request->input('kelas');

        $jadwal = schedule::query();

        if ($semester) {
            $jadwal->where('semester_aktif', $semester);
        }

        if ($jurusan) {
            $jadwal->where('jurusan', $jurusan);
        }

        if ($kelas) {
            $jadwal->where('kelas', $kelas);
        }

        $jadwal = $jadwal->get();

        return view('academic-schedulepage-dekan', compact('jadwal'));
    }

    public function approve($id)
    {
        // Cari jadwal berdasarkan ID
        $jadwal = schedule::find($id);

        // Pindahkan data ke tabel jadwal_disetujui
        $jadwalDisetujui = new approveschedule();
        $jadwalDisetujui->dosen = $jadwal->dosen;
        $jadwalDisetujui->ruang = $jadwal->ruang;
        $jadwalDisetujui->matakuliah = $jadwal->matakuliah;
        $jadwalDisetujui->waktu = $jadwal->waktu;
        $jadwalDisetujui->kelas = $jadwal->kelas;
        $jadwalDisetujui->semester_aktif = $jadwal->semester_aktif;
        $jadwalDisetujui->jurusan = $jadwal->jurusan;
        $jadwalDisetujui->save();

        // Hapus data dari tabel jadwal
        $jadwal->delete();

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil disetujui.');
    }
        
    }

