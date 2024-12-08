<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusMahasiswa
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $status
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $status)
    {
        // Ambil data mahasiswa berdasarkan email user yang sedang login
        $mahasiswa = \App\Models\Mahasiswa::where('email', Auth::user()->email)->first();
        
        // Jika tidak ditemukan atau status tidak sesuai
        if (!$mahasiswa || $mahasiswa->status !== $status) {
            // Redirect dengan pesan error jika status bukan 'aktif'
            return redirect()->route('dashboard-mahasiswa')->with('error', 'Hanya mahasiswa aktif yang dapat mengakses halaman ini.');
        }

        // Jika status valid, lanjutkan request
        return $next($request);
    }
}

