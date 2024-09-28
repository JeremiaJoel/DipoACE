<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index(){
        echo"Halo, Welcome di halaman dekan";
        echo"<h1>".Auth::user()->email."<h1>";
        // return view('dashboard');
        echo "<a href='logout'> Logout </a>";
    }
}
