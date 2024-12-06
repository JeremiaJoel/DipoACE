<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    // Menampilkan daftar jadwal
    public function index()
    {
        $jadwals = Jadwal::paginate(10);

        // Format waktu untuk setiap jadwal
        foreach ($jadwals as $jadwal) {
            $jadwal->formatted_waktu = Carbon::parse($jadwal->start_time)->format('H:i') . ' - ' . Carbon::parse($jadwal->end_time)->format('H:i');
        }

        return view('mahasiswa-buat-irs', compact('jadwals'));
    }

    // Mengambil jadwal
    public function ambil($id)
    {
        $jadwal = Jadwal::find($id);
    
        if (!$jadwal) {
            return redirect()->route('jadwal.index')->withErrors(['message' => 'Jadwal tidak ditemukan!']);
        }
    
    
        // Tandai jadwal sebagai "Diambil"
        $jadwal->update(['status' => 'Diambil']);
    
        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil diambil!');
    }
    
    

    // Cek bentrokan jadwal menggunakan query
    public function cekBentrokanJadwalV2($jadwalBaru)
    {
        return Jadwal::where('status', 'Diambil')
            ->where(function ($query) use ($jadwalBaru) {
                $query->where('start_time', '<', $jadwalBaru->end_time)
                      ->where('end_time', '>', $jadwalBaru->start_time);
            })
            ->exists();
    }
}
