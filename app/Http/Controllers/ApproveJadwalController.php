<?php

namespace App\Http\Controllers;

use App\Models\approvejadwal;
use App\Models\jadwal;
use Illuminate\Http\Request;


class ApproveJadwalController extends Controller
{

    public function index()
    {
        // Ambil data pengajuan yang berstatus "Menunggu"
        $approvals = ApproveJadwal::where('status', 'Menunggu')->with('jadwal')->get();

        // Kirim data ke view
        return view('academic-classpage-dekan', compact('approvals'));
    }

    
    public function submit(Request $id)
    {
        // Ambil semua jadwal yang statusnya "Belum Disetujui"
        $jadwals = Jadwal::where('status', 'Belum Disetujui')->get();

        // Periksa jika ada jadwal yang perlu diajukan
        if ($jadwals->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada jadwal yang perlu diajukan.');
        }

        // Kirim semua jadwal ke tabel approvejadwal
        foreach ($jadwals as $jadwal) {
            // Cek apakah sudah ada pengajuan untuk jadwal ini
            $existingApproval = ApproveJadwal::where('jadwal_id', $jadwal->id)->first();
            if (!$existingApproval) {
                ApproveJadwal::create([
                    'jadwal_id' => $jadwal->id,
                    'status' => 'Menunggu', // Status awal
                ]);
            }
        }

        return redirect()->back()->with('success', 'Semua jadwal berhasil diajukan.');
    }


    public function approve($id)
    {
        try {
            $approval = ApproveJadwal::findOrFail($id);
            $approval->update(['status' => 'Disetujui']);

            $jadwal = jadwal::findOrFail($approval->jadwal_id);
            $jadwal->update(['status' => 'Sudah Disetujui']);

            // Kembalikan respons JSON yang sesuai
            return response()->json(['message' => 'Persetujuan berhasil disetujui.'], 200);
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan respons dengan status 500
            return response()->json(['error' => 'Terjadi masalah saat menyetujui.'], 500);
        }
    }

    public function reject($id)
    {
        $approval = ApproveJadwal::findOrFail($id);
        $approval->update(['status' => 'Ditolak']);

        return redirect()->back()->with('success', 'Pengajuan berhasil ditolak.');
    }

    public function filter(Request $request)
    {
        $jurusan = $request->get('jurusan'); // Ambil filter jurusan dari request

        // Ambil data pengajuan dengan filter jurusan dan status "Menunggu"
        $approvals = ApproveJadwal::whereHas('jadwal', function ($query) use ($jurusan) {
            if ($jurusan) {
                $query->where('jurusan', $jurusan);
            }
        })
        ->where('status', 'Menunggu')
        ->with('jadwal')
        ->get();

        // Kirim data ke view
        return view('academic-classpage-dekan', compact('approvals'));
    }


}