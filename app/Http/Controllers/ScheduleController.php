<?php

namespace App\Http\Controllers;

use App\Models\approveschedule;
use App\Models\jadwal;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index()
    {
        $jadwal = jadwal::where('status', 'Belum Disetujui')->get();
        // dd($jadwal);
        return view('academic-schedulepage-dekan', compact('jadwal'));
    }

    public function filter(Request $request)
    {

        $semester = $request->input('semester_aktif');
        $jurusan = $request->input('jurusan');
        $kelas = $request->input('kelas');

        $jadwal = jadwal::query();

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

        $jadwal = jadwal::find($id);

        if ($jadwal) {
            $jadwal->status = 'Sudah Disetujui';  // Atau status lain yang relevan
            $jadwal->save();  // Simpan perubahan
            return response()->json(['message' => 'Jadwal approved successfully']);
        } else {
            return response()->json(['message' => 'Jadwal not found'], 404);
        }


        // return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil disetujui.');
    }

}
