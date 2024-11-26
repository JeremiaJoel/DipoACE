<?php

// app/Http/Controllers/SubmissionController.php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Classroom;

class ClassroomController extends Controller
{
    public function index()
    {
        // Ambil semua data submissions dari tabel classroomss
        $classrooms = Classroom::all();

        // Kirim data submissions ke view
        return view('nyusunruangkelas', compact('classrooms'));
    }

    public function store(Request $request)
{
    // Validasi data form
    $validatedData = $request->validate([
        'kode_ruang' => 'required|array', // Checkbox
        'kode_ruang.*' => 'string',
        'gedung' => 'required|string',
        'kapasitas' => 'required|string|max:100',
        'jurusan' => 'required|string|max:100',
        'status' => 'required|string|max:50',
    ]);

    // Ubah array gedung menjadi string dipisahkan dengan koma
    $validatedData['kode_ruang'] = implode(', ', $request->kode_ruang);

    // Simpan data ke database
    Classroom::create($validatedData);

    // Redirect ke halaman index agar list terbaru ditampilkan
    return redirect()->route('classrooms.index')->with('success', 'Data berhasil ditambahkan');
}

    public function destroy($id)
    {
        // Hapus data dari tabel classroomss
        DB::table('classroomss')->where('id', $id)->delete();

        return redirect()->route('classrooms.index')->with('success', 'Data berhasil dihapus');
    }

    public function edit($id)
    {
        // Ambil data dari tabel classroomss berdasarkan id
        $classroom = Classroom::findOrFail($id);
        $kode_ruang = explode(', ', $classroom->kode_ruang);

        // Kirim data ke view
        return view('editruangkelas', compact('classroom', 'kode_ruang'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'gedung' => 'required|string|max:255',
            'kode_ruang' => 'required|array', // Checkbox untuk kode ruang
            'kode_ruang.*' => 'string',
            'kapasitas' => 'required|integer',
            'status' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
        ]);
    
        // Gabungkan array kode_ruang menjadi string
        $validatedData['kode_ruang'] = implode(', ', $request->kode_ruang);
    
        $classroom = Classroom::findOrFail($id);
        $classroom->update($validatedData);

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('classrooms.index')->with('success', 'Data berhasil diperbarui');
    }
}
