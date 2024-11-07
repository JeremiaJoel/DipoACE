<?php

namespace App\Http\Controllers;

use App\Models\classroom;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $kelas = classroom::all(); 
        return view('academic-classpage-dekan', compact('kelas')); 
    }

    public function filter(Request $request)
{
    
    $semester = $request->input('semester');
    $jurusan = $request->input('jurusan');

    $kelas = Classroom::query();

    if ($semester) {
        $kelas->where('semester', $semester);
    }

    if ($jurusan) {
        $kelas->where('jurusan', $jurusan);
    }

    $kelas = $kelas->get(); 

    return view('academic-classpage-dekan', compact('kelas')); 
}

}
