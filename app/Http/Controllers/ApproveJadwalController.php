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

    public function submit($id)
    {
            $jadwal = jadwal::findOrFail($id);

        // Cek apakah sudah diajukan sebelumnya
        $existingApproval = ApproveJadwal::where('jadwal_id', $id)->first();
        if ($existingApproval) {
            return redirect()->back()->with('error', 'Pengajuan sudah dibuat sebelumnya.');
        }

        // Simpan pengajuan
        ApproveJadwal::create([
            'jadwal_id' => $id,
            'status' => 'Menunggu',
        ]);

        return redirect()->back()->with('success', 'Pengajuan berhasil dikirim.');
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
