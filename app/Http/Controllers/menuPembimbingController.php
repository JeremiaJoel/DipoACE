<?php

namespace App\Http\Controllers;

use App\Models\irs;
use App\Models\mahasiswa;
use App\Models\IrsMahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class menuPembimbingController extends Controller
{

    public function index()
{
    $dosenId = Auth::user()->id;

    // Ambil mahasiswa dengan IRS "Belum Disetujui"
    $mahasiswaBelum = IrsMahasiswa::with('mahasiswa') // Menghubungkan dengan tabel mahasiswa
            ->where('status', 'Belum Disetujui') // Filter data dengan status "Belum Disetujui"
            ->get();

    // Ambil mahasiswa dengan IRS "Sudah Disetujui"
    $mahasiswaSudah = IrsMahasiswa::with('mahasiswa') // Menghubungkan dengan tabel mahasiswa
    ->where('status', 'Sudah Disetujui') // Filter data dengan status "Belum Disetujui"
    ->get();

    return view('tabelMahasiswa', compact('mahasiswaBelum', 'mahasiswaSudah'));
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
        // Ambil data IRS beserta mata kuliah terkait
        $irs = IrsMahasiswa::with(['irs' => function ($query) {
            $query->where('status_irs', 'Belum Disetujui')
                  ->with('matakuliah'); // Pastikan relasi ke matakuliah sudah didefinisikan
        }])
        ->where('mahasiswa_id', $nim) // Filter berdasarkan mahasiswa_id
        ->get();
    
        return view('pembimbing-irs-mahasiswa', compact('irs'));
    }
    

    




public function showSudahDisetujui($nim)
{
    $irs = Irs::with('matakuliah')
        ->where('nim', $nim)
        ->whereRaw('semester % 2 = 1') // Menampilkan semester ganjil
        ->where('status_irs', 'Sudah Disetujui')
        ->get();

    return view('pembimbing-irs-sudah-disetujui', compact('irs'));
}




//     public function approveIrs($nim)
// {
//     // Pastikan mahasiswa dengan NIM ini ada
//     $mahasiswa = Mahasiswa::where('nim', $nim)->first();

//     if (!$mahasiswa) {
//         return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
//     }

//     // Update semua IRS semester 5 menjadi 'Sudah Disetujui'
//     $updated = Irs::where('nim', $nim)
//         ->where('semester', 5)
//         ->update(['status_irs' => 'Sudah Disetujui']);

//     if ($updated === 0) {
//         // Jika tidak ada baris yang diperbarui
//         return redirect()->back()->with('error', 'Tidak ada data IRS yang diperbarui.');
//     }

//     // Dapatkan status global IRS terbaru menggunakan query yang sudah Anda implementasikan
//     $statusGlobal = Irs::where('nim', $nim)
//         ->selectRaw('
//             CASE 
//                 WHEN SUM(CASE WHEN status_irs = "Belum Disetujui" THEN 1 ELSE 0 END) = 0 THEN "Sudah Disetujui"
//                 ELSE "Belum Disetujui"
//             END as status_global'
//         )
//         ->groupBy('nim')
//         ->value('status_global'); // Mengambil nilai status_global

//     // Redirect dengan pesan sukses
//     return redirect()->back()->with('success', 'IRS berhasil disetujui. Status Global IRS: ' . $statusGlobal);
// }

public function approveIRS(Request $request, $mahasiswaId)
{
    // Validasi input
    $request->validate([
        'status' => 'required|in:Belum Disetujui,Sudah Disetujui',
    ]);

    // Perbarui status di tabel irs_mahasiswa
    DB::table('irs_mahasiswa')
        ->where('mahasiswa_id', $mahasiswaId)
        ->update(['status' => $request->status]);

    // Perbarui status di tabel irs untuk semua mata kuliah mahasiswa tersebut
    DB::table('irs')
        ->where('nim', $mahasiswaId)
        ->update(['status_irs' => $request->status]);

    return response()->json(['message' => 'Status berhasil diperbarui!']);
}




public function cancelApproveIrs($nim)
{
    // Pastikan mahasiswa dengan NIM ini ada
    $mahasiswa = Mahasiswa::where('nim', $nim)->first();

    if (!$mahasiswa) {
        return redirect()->back()->with('error', 'Mahasiswa tidak ditemukan.');
    }

    // Update semua IRS semester 5 menjadi 'Belum Disetujui' untuk mahasiswa ini
    $updated = Irs::where('nim', $nim)
        ->where('semester', 5)
        ->update(['status_irs' => 'Belum Disetujui']);

    if ($updated === 0) {
        // Jika tidak ada baris yang diperbarui
        return redirect()->back()->with('error', 'Tidak ada data IRS yang dibatalkan.');
    }

    // Setelah pembatalan, dapatkan status global IRS terbaru
    $statusGlobal = Irs::where('nim', $nim)
        ->selectRaw('CASE WHEN SUM(CASE WHEN status_irs = "Belum Disetujui" THEN 1 ELSE 0 END) > 0 THEN "Belum Disetujui" ELSE "Sudah Disetujui" END as status_global')
        ->groupBy('nim')
        ->first()->status_global;

    // Redirect dengan pesan sukses dan status global IRS terbaru
    return redirect()->back()->with('success', 'IRS berhasil dibatalkan. Status Global IRS: ' . $statusGlobal);
}

public function getMataKuliah($mahasiswaId)
{
    $mataKuliah = DB::table('irs')
        ->where('nim', $mahasiswaId)
        ->get();

    return view('mata_kuliah', ['mataKuliah' => $mataKuliah]);
}


}
