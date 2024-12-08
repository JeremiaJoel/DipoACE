<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mahasiswa;
use App\Models\Irs;
use App\Models\MataKuliah;
use App\Models\Jadwal;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class PdfController extends Controller
{
    public function generatePDF($mahasiswaId, $semester)
{
    // Mengambil data mahasiswa
    $mahasiswa = Mahasiswa::with('dosen')->findOrFail($mahasiswaId);

    // Mengambil IRS data untuk mahasiswa yang dipilih dan semester yang sesuai
    $irsData = Irs::where('nim', $mahasiswaId)
        ->where('semester', $semester)  // Menggunakan semester yang dipilih
        ->with(['mataKuliah', 'jadwal'])
        ->get();

    // Mengorganisir data untuk ke view
    $data = [
        'title' => 'Print IRS',
        'date' => date('m/d/Y'),
        'mahasiswa' => $mahasiswa,
        'irsData' => $irsData,
        'image' => Auth::user()->profile_photo, // Mengirimkan data user
        'semester' => $semester, // Menambahkan semester untuk ditampilkan di PDF
    ];

    // Memuat view PDF dengan data yang sudah disiapkan
    $pdf = Pdf::loadView('pdf', $data);

    return $pdf->download('Print IRS Semester ' . $semester . '.pdf');
}


}