<?php

namespace App\Http\Controllers;

use App\Models\mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function showStatus($nim)
    {
        $mahasiswa = Mahasiswa::find($nim);

        if (!$mahasiswa) {
            return redirect()->back()->withErrors('Mahasiswa tidak ditemukan');
        }

        return view('status', ['status' => $mahasiswa->status]);
    }

    public function setStatus(Request $request, $nim, $status)
    {
        try {
            // Cari mahasiswa berdasarkan NIM
            $mahasiswa = Mahasiswa::where('nim', $nim)->first();
            if (!$mahasiswa) {
                return response()->json([
                    'status' => false,
                    'message' => 'Mahasiswa tidak ditemukan.'
                ]);
            }

            // Perbarui status
            $mahasiswa->status = $status;
            $mahasiswa->save();

            return response()->json([
                'status' => true,
                'message' => 'Status berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage()
            ]);
        }
    }
}
