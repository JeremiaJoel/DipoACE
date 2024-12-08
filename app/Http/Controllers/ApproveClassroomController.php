<?php

namespace App\Http\Controllers;

use App\Models\ApproveClassroom;
use App\Models\Classroom;
use Illuminate\Http\Request;

class ApproveClassroomController extends Controller
{

    public function index()
    {
        // Ambil data pengajuan yang berstatus "Menunggu"
        $approvals = ApproveClassroom::where('status', 'Menunggu')->with('classroom')->get();

        // Kirim data ke view
        return view('academic-classpage-dekan', compact('approvals'));
    }

    public function submit($id)
{
    $classroom = Classroom::findOrFail($id);

    // Cek apakah sudah diajukan sebelumnya
    $existingApproval = ApproveClassroom::where('classroom_id', $id)->first();
    if ($existingApproval) {
        return response()->json([
            'status' => 'error',
            'message' => 'Pengajuan sudah dibuat sebelumnya.'
        ]);
    }

    // Simpan pengajuan
    ApproveClassroom::create([
        'classroom_id' => $id,
        'status' => 'Menunggu',
    ]);

    return response()->json([
        'status' => 'success',
        'message' => 'Pengajuan berhasil dikirim.'
    ]);
}

    public function approve($id)
    {
        try {
            $approval = ApproveClassroom::findOrFail($id);
            $approval->update(['status' => 'Disetujui']);

            $classroom = Classroom::findOrFail($approval->classroom_id);
            $classroom->update(['status' => 'Sudah Disetujui']);

            // Kembalikan respons JSON yang sesuai
            return response()->json(['message' => 'Persetujuan berhasil disetujui.'], 200);
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan respons dengan status 500
            return response()->json(['error' => 'Terjadi masalah saat menyetujui.'], 500);
        }
    }



    public function filter(Request $request)
    {
        $jurusan = $request->get('jurusan'); // Ambil filter jurusan dari request

        // Ambil data pengajuan dengan filter jurusan dan status "Menunggu"
        $approvals = ApproveClassroom::whereHas('classroom', function ($query) use ($jurusan) {
            if ($jurusan) {
                $query->where('jurusan', $jurusan);
            }
        })
        ->where('status', 'Menunggu')
        ->with('classroom')
        ->get();

        // Kirim data ke view
        return view('academic-classpage-dekan', compact('approvals'));
    }

    public function approveAll(Request $request)
    {
        // $semester = $request->input('semester');
        $jurusan = $request->input('jurusan');
        // $kelas = $request->input('kelas');

        $kelas = Classroom::query();

        // if ($semester) {
        //     $jadwal->where('semester_aktif', $semester);
        // }
        if ($jurusan) {
            $kelas->where('jurusan', $jurusan);
        }
        // if ($kelas) {
        //     $jadwal->where('kelas', $kelas);
        // }

        $updatedCount = $kelas->update(['status' => 'Sudah Disetujui']);

        return response()->json(['message' => 'Approved ' .' schedules successfully']);
    }


}
