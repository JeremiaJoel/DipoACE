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

}