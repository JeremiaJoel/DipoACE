<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class menuPembimbingController extends Controller
{

    public function index()
    {
        // Ambil ID dosen yang sedang login
        $dosenId = Auth::user()->id;
        dd($dosenId);  // Memastikan dosen_id yang sedang digunakan
        // Ambil NIP dari user yang login sebagai ID dosen

        // Ambil mahasiswa yang menjadi perwalian dosen yang sedang login
        $mahasiswaList = Mahasiswa::with(['irs' => function ($query) {
            $query->selectRaw('nim, 
                CASE 
                    WHEN SUM(CASE WHEN status = "Belum Disetujui" THEN 1 ELSE 0 END) > 0 THEN "Belum Disetujui"
                    ELSE "Sudah Disetujui"
                END as status_global')
                ->groupBy('nim');
        }])
            ->where('dosen_id', $dosenId) // Filter mahasiswa berdasarkan dosen_id
            ->get();

        dd($mahasiswaList); // Memeriksa data yang diambil



        // Kirim data mahasiswa ke view
        return view('tabelMahasiswa', compact('mahasiswaList'));
    }




    public function menuIrs()
    {
        return view('tabelMahasiswa');
    }
    public function listMahasiswaBelumDisetujui()
    {
        return view('pembimbing-irs-mahasiswa');
    }

    public function listMahasiswaSudahDisetujui()
    {
        return view('pembimbing-irs-sudah-disetujui');
    }

    public function showBelumDisetujui($nim)
    {
        $irs = Irs::with('matakuliah')
            ->where('nim', $nim)
            ->where('semester', 5)
            ->where('status_irs', 'Belum Disetujui')
            ->get();

        return view('pembimbing-irs-mahasiswa', compact('irs'));
    }



    public function showSudahDisetujui($nim)
    {
        $irs = Irs::with('matakuliah')
            ->where('nim', $nim)
            ->where('semester', 5)
            ->where('status_irs', 'Sudah Disetujui')
            ->get();

        return view('pembimbing-irs-sudah-disetujui', compact('irs'));
    }



    public function approveIrs($nim)
    {
        // Pastikan mahasiswa dengan NIM ini ada
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();

        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // Update semua IRS semester 5 menjadi 'Sudah Disetujui'
        $updated = Irs::where('nim', $nim)
            ->where('semester', 5)
            ->update(['status_irs' => 'Sudah Disetujui']);

        if ($updated === 0) {
            // Jika tidak ada baris yang diperbarui
            return redirect()->back()->with('error', 'Tidak ada data IRS yang diperbarui.');
        }

        // Dapatkan status global IRS terbaru
        $statusGlobal = $mahasiswa->statusGlobalIrs();

        // Redirect dengan pesan sukses
        return redirect()->back()->with('success', 'IRS berhasil disetujui. Status Global IRS: ' . $statusGlobal);
    }


    public function cancelApproveIrs($nim)
    {
        // Pastikan mahasiswa dengan NIM ini ada
        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        if (!$mahasiswa) {
            return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
        }

        // Update semua IRS semester 5 menjadi 'Belum Disetujui'
        Irs::where('nim', $nim)
            ->where('semester', 5)
            ->update(['status_irs' => 'Belum Disetujui']);

        // Dapatkan status global IRS terbaru
        $statusGlobal = $mahasiswa->statusGlobalIrs();

        // Kembalikan pesan sukses
        return redirect()->back()->with('success', 'Persetujuan IRS dibatalkan. Status Global IRS: ' . $statusGlobal);
    }
}
