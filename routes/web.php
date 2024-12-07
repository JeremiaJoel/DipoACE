<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PageController;
use App\Http\Middleware\UserAkses;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\menuPembimbingController;
use App\Http\Controllers\ApproveClassroomController;
use App\Http\Controllers\IRSController;
use App\Http\Controllers\KHSController;
use App\Http\Controllers\ApproveJadwalController;
use App\Http\Controllers\KaprodiController;

// Route::get('/', function () {
//     return view('dashboard-mahasiswa');
// });

Route::middleware(['guest'])->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::get('/confirmrole', [RoleController::class, 'showRoleSelection']);
    Route::post('/confirmrole', [RoleController::class, 'selectRole']);
    // Route::get('/academic-page', [PageController::class, 'academic']);
    Route::get('academic-classpage-dekan/logout', [LoginController::class, 'logout']);


    // Halaman Dekan: Approve Classrooms
    Route::get('/academic-classpage-dekan', [ApproveClassroomController::class, 'index'])->name('academic-classpage-dekan');
    Route::get('/academic-classpage-dekan/filter', [ApproveClassroomController::class, 'filter'])->name('kelas.filter');

    // Role Akademik: Mengirim pengajuan
    Route::post('/classrooms/{id}/submit-approval', [ApproveClassroomController::class, 'submit'])->name('approveclassrooms.submit');

    // Approve dan Reject Pengajuan
    Route::post('/approveclassrooms/{id}/approve', [ApproveClassroomController::class, 'approve'])->name('kelas.approve');
    Route::post('/approveclassrooms/{id}/reject', [ApproveClassroomController::class, 'reject'])->name('kelas.reject');
    Route::get('/dashboard-akademik', [ApproveClassroomController::class, 'dashboard'])->name('dashboard-akademik');

    // Route punya pembimbing akademik
    Route::get('/tabelMahasiswa/{status}', [menuPembimbingController::class, 'menuIrs'])->name('tabelMahasiswa');

    // Route untuk menampilkan daftar mahasiswa dengan status IRS 
    Route::get('/tabelMahasiswa', [MenuPembimbingController::class, 'index'])->name('tabelMahasiswa');
    Route::middleware('auth')->get('/tabel-mahasiswa', [MenuPembimbingController::class, 'index'])->name('tabel-mahasiswa');


    Route::get('/pembimbing-irs-mahasiswa', [menuPembimbingController::class, 'listMahasiswaBelumDisetujui'])->name('pembimbing-irs-mahasiswa');;
    Route::get('/pembimbing-irs-sudah-disetujui', [menuPembimbingController::class, 'listMahasiswaSudahDisetujui'])->name('pembimbing-irs-sudah-disetujui');;

    //Route menampilkan detail irs mahasiswa
    // Route untuk melihat IRS mahasiswa yang statusnya 'Belum Disetujui'
    Route::get('/irs/{nim}/belum-disetujui', [menuPembimbingController::class, 'showBelumDisetujui'])->name('irs.belumDisetujui');
    
    Route::get('/irs', [IRSController::class, 'index'])->name('irs.index');

    // Route untuk melihat IRS mahasiswa yang statusnya 'Sudah Disetujui'
    Route::get('/irs/{nim}/sudah-disetujui', [menuPembimbingController::class, 'showSudahDisetujui'])->name('irs.sudahDisetujui');

    // Route untuk menyetujui IRS mahasiswa
    Route::post('/approve-irs/{mahasiswaId}', [menuPembimbingController::class, 'approveIRS']);
    Route::post('/irs/{nim}/cancelApprove', [menuPembimbingController::class, 'cancelApproveIrs'])->name('cancelApproveIrs');

    //Sinkronisasi tabel irs mahasiswa
    Route::get('/sync-irs', [IRSController::class, 'syncIRSData']);
    Route::get('/mata-kuliah/{mahasiswaId}', [IRSController::class, 'getMataKuliah']);

    






    //mahasiswa
    Route::get('/irs', [IRSController::class, 'showIRSForm'])->name('irs.form');
    Route::post('/irs', [IRSController::class, 'storeIRS'])->middleware('auth')->name('irs.store');
    Route::get('/download-pdf', 'PDFController@downloadPDF');
    // Route::get('/search-mata-kuliah', [MataKuliahController::class, 'search'])->name('search.mata-kuliah');
    Route::get('/classrooms/{id}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');



    Route::get('/academic-schedulepage-dekan', [ScheduleController::class, 'index'])->name('jadwal.index');

    Route::get('/academic-schedulepage-dekan/filter', [ScheduleController::class, 'filter'])->name('jadwal.filter');
    Route::post('/academic-schedulepage-dekan/{id}/approve', [ScheduleController::class, 'approve'])->name('jadwal.approve');
    // Route::post('/status-mahasiswa/{nim}/{status}', [MahasiswaController::class, 'ubahStatus'])->name('mahasiswa.status');
    Route::post('/status-mahasiswa/{nim}/{status}', [MahasiswaController::class, 'setStatus'])->name('mahasiswa.status');


    Route::delete('/classrooms/{id}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');
    Route::patch('/classrooms/{id}', [ClassroomController::class, 'update'])->name('classrooms.update');
    Route::post('/submit-form', [ClassroomController::class, 'store'])->name('submit.form');

    Route::get('/khs', [KHSController::class, 'showKhs'])->name('khsData.showKhs');

    Route::get('/mahasiswa-buatirs', [IRSController::class, 'index'])->name('jadwals.index');
    Route::get('/mahasiswa-buatirs/search', [IRSController::class, 'search'])->name('jadwals.search');

    Route::post('/irs/store', [IRSController::class, 'store'])->name('irs.store');
    Route::post('/mahasiswa/submit-irs', [IrsController::class, 'submitIRS'])->name('mahasiswa.submitIRS');
    Route::post('/mahasiswa/cancel-irs', [IRSController::class, 'cancelIRS'])->name('mahasiswa.cancelIRS');
    Route::post('/mahasiswa/ajukan-pembatalan', [IRSController::class, 'ajukanPembatalan'])->name('mahasiswa.ajukanPembatalan');


    Route::post('/jadwal/{id}/ambil', [IRSController::class, 'ambil'])->name('jadwal.ambil');
});

Route::middleware(['auth', UserAkses::class])->group(function () {
    Route::get('/dashboard-dekan', [RoleController::class, 'dekan'])->name('dashboard-dekan');
    Route::get('/dashboard-pembimbing', [RoleController::class, 'pembimbing'])->name('dashboard-pembimbing');
    Route::get('/dashboard-mahasiswa', [RoleController::class, 'mahasiswa'])->name('dashboard-mahasiswa');
    Route::get('/dashboard-kaprodi', [RoleController::class, 'kaprodi'])->name('dashboard-kaprodi');
    Route::get('/dashboard-akademik', [RoleController::class, 'bagian_akademik'])->name('dashboard-akademik');
});


// Route::get('/nyusunruangkelas', function () {
//     return view('nyusunruangkelas');
// });

Route::get('/status-mahasiswa', function () {
    return view('status-mahasiswa');
});


Route::get('/mahasiswa-irs', function () {
    return view('mahasiswa-irs');
});


Route::get('/classrooms', [ClassroomController::class, 'index'])->name('classrooms.index');
Route::get('/nyusunruangkelas', [ClassroomController::class, 'index'])->name('nyusunruangkelas'); // Route tambahan



//menampilkan data irs mahasiswa tertentu

// Route punya Kaprodi

Route::get('/tabelVerifikasiIRS', [KaprodiController::class, 'menuVerifikasi'])->name('tabelVerifikasiIRS');
Route::get('/pembimbing-irs-mahasiswa', [KaprodiController::class, 'irsMahasiswa'])->name('pembimbing-irs-mahasiswa');
Route::get('/nyusunJadwalKaprodi', [KaprodiController::class, 'menuNyusunJadwal'])->name('nyusunJadwalKaprodi');

Route::delete('/kaprodi/jadwal/{id}', [KaprodiController::class, 'hapusJadwal'])->name('kaprodi.hapusJadwal');
Route::patch('/kaprodi/jadwal/{id}', [KaprodiController::class, 'updateJadwal'])->name('kaprodi.updateJadwal');
Route::post('/simpan-jadwal', [KaprodiController::class, 'simpanJadwal'])->name('simpan.jadwal');

Route::get('/kaprodi/jadwal/{id}/edit', [KaprodiController::class, 'edit'])->name('kaprodi.edit');


// Halaman Dekan: Approve Classrooms
//Route::get('/academic-classpage-dekan', [ApproveJadwalController::class, 'index'])->name('academic-classpage-dekan');
//Route::get('/academic-classpage-dekan/filter', [ApproveJadwalController::class, 'filter'])->name('jadwal.filter');

// Role Akademik: Mengirim pengajuan
// Route::post('/jadwal/{id}/submit-approval', [ApproveJadwalController::class, 'submit'])->name('approvejadwal.submit');
    
// // Approve dan Reject Pengajuan
// Route::post('/approvejadwal/{id}/approve', [ApproveJadwalController::class, 'approve'])->name('jadwal.approve');
// Route::post('/approvejadwal/{id}/reject', [ApproveJadwalController::class, 'reject'])->name('jadwal.reject');
//Route::get('/dashboard-kaprodi', [ApproveJadwalController::class, 'dashboard'])->name('dashboard-kaprodi');



