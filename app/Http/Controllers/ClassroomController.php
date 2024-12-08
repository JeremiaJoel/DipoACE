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
        // Ambil semua data submissions dari tabel classrooms
        $classrooms = Classroom::all();
        
        // Ambil kode ruang yang sudah dipilih, jika ada
        $selectedClassrooms = $classrooms->pluck('kode_ruang')->flatten()->unique()->toArray();

        // Kirim data classrooms dan selectedClassrooms ke view
        return view('nyusunruangkelas', compact('classrooms', 'selectedClassrooms'));
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
    $validatedData['kode_ruang'] = implode(', ', array_unique($request->kode_ruang)); // Menghindari duplikasi kode ruang

    // Simpan data ke database
    Classroom::create($validatedData);

    // Redirect ke halaman index agar list terbaru ditampilkan
    return redirect()->route('classrooms.index')->with('success', 'Data berhasil ditambahkan');
}

public function destroy($id)
{
    try {
        // Hapus data dari tabel classroomss
        $deleted = DB::table('classroomss')->where('id', $id)->delete();
        
        // Jika data berhasil dihapus (mengembalikan angka > 0)
        if ($deleted) {
            return response()->json(['message' => 'Ruangan berhasil dihapus!'], 200);
        } else {
            // Jika tidak ada data yang dihapus (ID tidak ditemukan)
            return response()->json(['message' => 'Ruangan tidak ditemukan!'], 404);
        }
    } catch (\Exception $e) {
        // Tangani jika ada error pada query atau lainnya
        return response()->json(['message' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
    }
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
            'kode_ruang' => 'required|array',
            'kode_ruang.*' => 'string',
            'kapasitas' => 'required|integer',
            'status' => 'required|string|max:50',
            'jurusan' => 'required|string|max:100',
        ]);
    
        $validatedData['kode_ruang'] = implode(', ', $request->kode_ruang);
    
        $classroom = Classroom::findOrFail($id);
        $classroom->update($validatedData);

        // Redirect ke halaman list dengan pesan sukses
        return redirect()->route('classrooms.index')->with('success', 'Data berhasil diperbarui');
    }
}