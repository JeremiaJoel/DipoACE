<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function showStatus($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        // Jika mahasiswa tidak ditemukan, kembalikan pesan error atau redirect
        if (!$mahasiswa) {
            return redirect()->back()->withErrors('Mahasiswa tidak ditemukan');
        }

        return view('status', ['status' => $mahasiswa->status]);
    }

    public function status(Request $request, $id)
    {
        // Get the selected status from the request
        $status = $request->input('status');

        // Find the Mahasiswa model by ID and update the status
        $mhs = Mahasiswa::find($id);

        if ($mhs) {
            $mhs->status = $status;
            $mhs->save();

            return response()->json(['status' => $status, 'message' => 'Status updated successfully']);
        }

        return response()->json(['message' => 'Student not found'], 404);
    }
}
