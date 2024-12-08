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

    public function index($periode)
    {
        try {
            // Ambil data dosen yang login
            $dosen = Auth::user(); // Asumsikan dosen sudah login
            $dosen_id = $dosen->id; // ID dosen dari user login
    
            // Query mahasiswa perwalian berdasarkan periode dan status disetujui
                $approved = DB::table('irs_mahasiswa')
                ->join('mahasiswa', 'irs_mahasiswa.mahasiswa_id', '=', 'mahasiswa.nim')
                ->where('irs_mahasiswa.periode', '2024-2025')
                ->where('irs_mahasiswa.status', 'Sudah Disetujui')
                ->where('mahasiswa.dosen_id', $dosen_id)
                ->select('irs_mahasiswa.*', 'mahasiswa.nama as mahasiswa_nama', 'mahasiswa_id as mahasiswa_nim')
                ->get();
    
                $notApproved = DB::table('irs_mahasiswa')
                ->join('mahasiswa', 'irs_mahasiswa.mahasiswa_id', '=', 'mahasiswa.nim')
                ->where('irs_mahasiswa.periode', '2024-2025')
                ->where('irs_mahasiswa.status', 'Belum Disetujui')
                ->where('mahasiswa.dosen_id', $dosen_id)
                ->select('irs_mahasiswa.*', 'mahasiswa.nama as mahasiswa_nama', 'mahasiswa_id as mahasiswa_nim')
                ->get();

            
            // Kirim data ke view
            return view('tabelMahasiswa', [
                'approved' => $approved,
                'notApproved' => $notApproved,
                'periode' => $periode,
            ]);
            

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }
    


    public function tabelMahasiswa(Request $request, $periode)
    {
        // Jika format periode adalah 2024-2025, ubah menjadi 2024/2025
        $periode = str_replace('-', '/', $periode);
    
        $status = $request->query('status');
    
        // Validasi format periode
        if (!preg_match('/^\d{4}\/\d{4}$/', $periode)) {
            abort(404, 'Periode tidak valid.');
        }
    
        // Lakukan pengolahan data
        $mahasiswa = IrsMahasiswa::where('periode', $periode)
            ->where('status', $status)
            ->get();
    
        return view('tabelMahasiswa', compact('mahasiswa', 'status', 'periode'));
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
    // Ambil data IRS dengan relasi ke irs dan matakuliah
    $irs = IrsMahasiswa::with(['irs.matakuliah'])
        ->where('mahasiswa_id', $nim) // Filter berdasarkan mahasiswa_id
        ->where('periode', '2024-2025') // Filter periode di tabel irs_mahasiswa
        ->whereHas('irs', function ($query) {
            $query->where('status_irs', 'Belum Disetujui') // Filter status IRS di tabel irs
                  ->where('tahun_ajaran', '2024-2025'); // Filter tahun ajaran di tabel irs
        })
        ->get();

    return view('pembimbing-irs-mahasiswa', compact('irs'));
}




public function showSudahDisetujui($nim)
{
    $irs = IrsMahasiswa::with(['irs.matakuliah'])
    ->where('mahasiswa_id', $nim) // Filter berdasarkan mahasiswa_id
    ->where('periode', '2024-2025') // Filter periode di tabel irs_mahasiswa
    ->whereHas('irs', function ($query) {
        $query->where('status_irs', 'Sudah Disetujui') // Filter status IRS di tabel irs
              ->where('tahun_ajaran', '2024-2025'); // Filter tahun ajaran di tabel irs
    })
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
    // 1. Update status di tabel irs_mahasiswa
    DB::table('irs_mahasiswa')
        ->where('mahasiswa_id', $mahasiswaId)
        ->where('status', 'Belum Disetujui')  // Pastikan hanya mengupdate jika status masih 'Belum Disetujui'
        ->update(['status' => 'Sudah Disetujui']); // Ubah status menjadi 'Sudah Disetujui'

    // 2. Update status di tabel irs untuk semua mata kuliah terkait mahasiswa ini
    DB::table('irs')
        ->where('nim', $mahasiswaId)  // Menggunakan nim untuk memperbarui mata kuliah mahasiswa
        ->where('status_irs', 'Belum Disetujui') // Pastikan hanya yang statusnya masih 'Belum Disetujui' yang diupdate
        ->update(['status_irs' => 'Sudah Disetujui']); // Ubah status_irs menjadi 'Sudah Disetujui'

    return redirect()->back()->with('success', 'Status IRS berhasil diperbarui!');


}





public function cancelApproveIrs(Request $request, $mahasiswaId)
{
    // 1. Update status di tabel irs_mahasiswa
    DB::table('irs_mahasiswa')
        ->where('mahasiswa_id', $mahasiswaId)
        ->where('status', 'Sudah Disetujui')  // Pastikan hanya mengupdate jika status masih 'Belum Disetujui'
        ->update(['status' => 'Belum Disetujui']); // Ubah status menjadi 'Sudah Disetujui'

    // 2. Update status di tabel irs untuk semua mata kuliah terkait mahasiswa ini
    DB::table('irs')
        ->where('nim', $mahasiswaId)  // Menggunakan nim untuk memperbarui mata kuliah mahasiswa
        ->where('status_irs', 'Sudah Disetujui') // Pastikan hanya yang statusnya masih 'Belum Disetujui' yang diupdate
        ->update(['status_irs' => 'Belum Disetujui']); // Ubah status_irs menjadi 'Sudah Disetujui'

    return redirect()->back()->with('success', 'Status IRS berhasil diperbarui!');
}

public function getMataKuliah($mahasiswaId)
{
    $mataKuliah = DB::table('irs')
        ->where('nim', $mahasiswaId)
        ->get();

    return view('mata_kuliah', ['mataKuliah' => $mataKuliah]);
}


}
