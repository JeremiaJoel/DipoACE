<?php

// app/Http/Controllers/SubmissionController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller{

    public function index(){
        // Ambil semua data submissions dari database
        $submissions = Classroom::all();

        // Kirim data submissions ke view
        return view('nyusunruangkelas', compact('submissions'));
    }

    public function store(Request $request){
        // Validasi data form
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'ruang' => 'required|string|max:255',
            'hari' => 'required|string|max:255',
            'jam_mulai' => 'required|string|max:255',
            'jam_selesai' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
        ]);

        // Simpan data ke database
        Classroom::create($validatedData);

        // Redirect ke halaman index agar data baru ditampilkan
        return redirect()->route('classrooms.index')->with('success', 'Form Berhasil Di Submit');
    }

    public function destroy($id){
        
        DB::table('classrooms')->where('id', $id)->delete();

        return redirect()->route('classrooms.index')->with('success', 'Data berhasil dihapus');

    }

    public function edit($id){
    // Ambil data berdasarkan id
    $classroom = Classroom::findOrFail($id);

    // Kirim data ke view
    return view('editruangkelas', compact('classroom'));
    }

    public function update(Request $request, $id){
    // Validasi data
    $validatedData = $request->validate([
        'nama' => 'required|string|max:255',
        'ruang' => 'required|string|max:255',
        'hari' => 'required|string|max:255',
        'jam_mulai' => 'required|string|max:255',
        'jam_selesai' => 'required|string|max:255',
        'semester' => 'required|string|max:255',
        'jurusan' => 'required|string|max:255',
    ]);

    // Cari data dan update
    $classroom = Classroom::findOrFail($id);
    $classroom->update($validatedData);

    // Redirect ke halaman list dengan pesan sukses
    return redirect()->route('classrooms.index')->with('success', 'Data berhasil diperbarui');
    }
}