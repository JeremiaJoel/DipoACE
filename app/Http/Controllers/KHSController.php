<?php

namespace App\Http\Controllers;

use App\Models\khs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KHSController extends Controller
{
    public function showKhs()
    {
        // Ambil data KHS berdasarkan NIM yang sedang login
        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
        $nim = $mahasiswa ? $mahasiswa->nim : null;
        $khsData = khs::where('nim', $nim)->get();  // Ambil semua data KHS untuk NIM ini
        
        return view('khs', compact('khsData'));
    }
}
