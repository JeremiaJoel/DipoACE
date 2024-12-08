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
    public function generatePDF($mahasiswaId)
    {
        // $user = Auth::user()->profile_photo;
        

        // Mengambil data mahasiswa 
        $mahasiswa = Mahasiswa::with('dosen')->findOrFail($mahasiswaId);

        // Mengambil IRS data untuk mahasiswa yang dipilih
        $irsData = Irs::where('nim', $mahasiswaId)->where('semester', $mahasiswa->semester)
            ->with(['mataKuliah', 'jadwal'])
            ->get();

        // Mengorganisir data untuk ke view
        $data = [
            'title' => 'Print IRS',
            'date' => date('m/d/Y'),
            'mahasiswa' => $mahasiswa,
            'irsData' => $irsData,
            'image' => Auth::user()->profile_photo, // Mengirimkan data user
        ];

        $pdf = Pdf::loadView('pdf', $data);

        return $pdf->download('Print IRS.pdf');
    }

}