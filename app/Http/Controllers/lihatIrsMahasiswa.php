<?php

namespace App\Http\Controllers;

use App\Models\irs;
use Illuminate\Http\Request;

class lihatIrsMahasiswa extends Controller
{
    public function show($mahasiswaId)
    {
        // Ambil data IRS berdasarkan mahasiswa_id
        $irsData = irs::all();

        // Kirim data ke view
        return view('irs.index', compact('irsData'));
    }
}
