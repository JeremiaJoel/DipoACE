<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        // Ambil data jadwal dari database
        $jadwals = Jadwal::paginate(10);

        // Kirim data ke view
        return view('mahasiswa-buatirs', compact('jadwals'));
    }

    // Method untuk menangani tombol "Ambil"
    public function ambil($id)
    {
        $jadwal = Jadwal::findOrFail($id);

        // Lakukan proses apa pun yang diinginkan ketika jadwal "diambil"
        // Contoh: menandai jadwal sebagai "Diambil"
        $jadwal->update([
            'status' => 'Diambil'
        ]);

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diambil!');
    }

    public function search(Request $request)
{
    $query = $request->get('query');

    $jadwals = Jadwal::with('matakuliah')  // Pastikan eager loading matakuliah
                    ->where('kodemk', 'like', '%' . $query . '%') // Pencarian berdasarkan kode mata kuliah
                    ->orWhereHas('matakuliah', function ($q) use ($query) {
                        $q->where('nama', 'like', '%' . $query . '%'); // Pencarian berdasarkan nama mata kuliah
                    })
                    ->get();  // Mengambil data langsung, tanpa paginate, untuk keperluan pencarian


    return response()->json($jadwals);  // Kirim data jadwal dengan relasi matakuliah ke client
}
}
