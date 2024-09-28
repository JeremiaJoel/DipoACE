<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleController extends Controller
{
    public function showRoleSelection()
    {
        // Ambil role user yang terdaftar
        $user =Auth::user();
        $roles = [];

        if ($user->dekan == '1') {
            $roles[] = 'dekan';
        }

        if ($user->pembimbing_akademik == '1') {
            $roles[] = 'pembimbing_akademik';
        }

        if ($user->mahasiswa == '1') {
            $roles[] = 'mahasiswa';
        }

        if ($user->akadmeik == '1') {
            $roles[] = 'bagian_akademik';
        }

        if ($user->kaprodi == '1') {
            $roles[] = 'kaprodi';
        }

        return view('confirmrole', compact('roles'));
    }

    public function selectRole(Request $request)
    {
    
        $request->validate(['role' => 'required']);
        
        $role = $request->role;

        if (Auth::user()->{$role} == '1') {
            switch ($role) {
                case 'dekan':
                    return redirect()->route('dashboard-dekan');
                case 'pembimbing_akademik':
                    return redirect()->route('dashboard-pembimbing');
                case 'mahasiswa':
                    return redirect()->route('dashboard-mahasiswa');
                case 'bagian_akademik':
                    return redirect()->route('dashboard-akademik');
                case 'kaprodi':
                    return redirect()->route('dashboard-kaprodi');
            }
        }

        return back()->withErrors(['role' => 'Anda tidak memiliki akses ke role ini.']);
    }

    public function dekan(){
    if (Auth::check()) {
        return view('dashboard-dekan');
    }
    return redirect('/login');  
    }

    public function pembimbing(){
        if (Auth::check()) {
            return view('dashboard-pembimbing');
        }
        return redirect('/login');  
        }

    public function mahasiswa(){
        if (Auth::check()) {
            return view('dashboard-mahasiswa');
        }
        return redirect('/login');  
        }

    public function akadmeik(){
        if (Auth::check()) {
            return view('dashboard-akademik');
        }
        return redirect('/login');  
        }

    public function kaprodi(){
        if (Auth::check()) {
            return view('dashboard-kaprodi');
        }
        return redirect('/login');  
        }


  

}
