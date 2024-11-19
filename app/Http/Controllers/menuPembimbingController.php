<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class menuPembimbingController extends Controller
{
    public function menuIrs()
    {
        return view('tabelMahasiswa');
    }
    public function irsMahasiswa()
    {
        return view('pembimbing-irs-mahasiswa');
    }
}
