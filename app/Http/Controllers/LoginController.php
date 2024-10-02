<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PharIo\Manifest\Email;

class LoginController extends Controller
{

    function index()
    {
        return view('login');
    }

    function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        // dd($infologin["email"]);
        if (Auth::attempt($infologin)) {
            if (Auth::user()->dekan == '1' && Auth::user()->pembimbing_akademik == '1') {
                return redirect('/confirmrole');
            } else if (Auth::user()->kaprodi == '1' && Auth::user()->pembimbing_akademik == '1') {
                return redirect('/confirmrole');
            } else if (Auth::user()->mahasiswa == '1') {
                return redirect('/dashboard-mahasiswa');
            } else if (Auth::user()->akademik == '1') {
                return redirect('/dashboard-akademik');
            }
        } else {
            $errorMessage = 'username dan password yang dimasukkan tidak sesuai';
            return redirect()->route('login')->with('error', $errorMessage);
        }
    }


    function logout()
    {
        Auth::logout();
        return redirect('');
    }
}
