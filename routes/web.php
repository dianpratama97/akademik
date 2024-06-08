<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TahunAjaranController;

Route::get('/', function () {
    return view('welcome');
    // return view('auth.login');
});



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/users/isLogin', [UsersController::class, 'isLogin'])->name('users.isLogin');
    Route::resource('/users', UsersController::class);
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store');
    Route::post('/users', [UsersController::class, 'import'])->name('users.import');
    Route::delete('/hapusAllUser', [UsersController::class, 'hapusAllUser'])->name('users.hapus');

    //agama
    Route::resource('/agama', AgamaController::class);
    //jurusan
    Route::resource('/jurusan', JurusanController::class);
    //kelas
    Route::resource('/kelas', KelasController::class)->names('kelas')->parameters(['kelas' => 'kelas']);

    //biodata
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata.index');
    Route::post('/biodata', [BiodataController::class, 'store'])->name('biodata.store');
    Route::get('/biodata/edit/{id}', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::put('/biodata/update/{id}', [BiodataController::class, 'update'])->name('biodata.update');

    //agama
    Route::resource('/config', ConfigController::class);

    //agama
    Route::resource('/tahunAjaran', TahunAjaranController::class);

    //cetak kartu
    Route::get('/kartu-pelajar', [BiodataController::class, 'cetak'])->name('biodata.cetak');

    //absen
    Route::get('/absensi/dashboard', [AbsenController::class, 'absen_siswa'])->name('dashboard.absensi');
    // Route::get('/absensi/ambil', [AbsenController::class, 'halaman_absen'])->name('absensi.siswa');

    Route::post('/absensi/getData', [AbsenController::class, 'getData'])->name('absensi.getData'); //ambil data berdasar tanggal
    Route::get('/absensi/hapus', [AbsenController::class, 'halaman_hapus'])->name('absensi.hapus');
    Route::post('hapusAllFoto', [AbsenController::class, 'hapusPhoto']);
    Route::get('/absensi/rekap', [AbsenController::class, 'halaman_rekap'])->name('absensi.rekap');
    Route::post('/absensi/getDataRekap', [AbsenController::class, 'getDataRekap'])->name('absensi.getDataRekap');
    Route::get('/absensi/sakit', [AbsenController::class, 'halaman_sakit'])->name('absensi.sakit');
    Route::get('/absensi/izin', [AbsenController::class, 'halaman_izin'])->name('absensi.izin');
    Route::post('/absensi/getDataKetarangan', [AbsenController::class, 'getDataKetarangan'])->name('absensi.getDataKetarangan');

    Route::resource('/absensi', AbsenController::class);

    //kelulusan
    Route::get('/kelulusan/halaman-cek', [KelulusanController::class, 'halaman_cek'])->name('kelulusan.halaman_cek');
    Route::post('/kelulusan/import', [KelulusanController::class, 'import'])->name('kelulusan.import');
    Route::delete('/hapusAllKelulusan', [KelulusanController::class, 'hapusAllKelulusan'])->name('kelulusan.hapus');
    Route::resource('/kelulusan', KelulusanController::class);
});

require __DIR__ . '/auth.php';

//kelulusan
Route::get('/kelulusan/halaman-cek', [KelulusanController::class, 'halaman_cek'])->name('kelulusan.halaman_cek');
Route::post('/kelulusan/cek', [KelulusanController::class, 'cek'])->name('kelulusan.cek');
