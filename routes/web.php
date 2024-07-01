<?php

use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\AgamaController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ConfigController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KelulusanController;
use App\Http\Controllers\TahunAjaranController;

Route::get('/', function () {
    return view('welcome');
    // return view('auth.login');
})->name('welcome');



Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/users/isLogin', [UsersController::class, 'isLogin'])->name('users.isLogin')->middleware('admin');
    Route::resource('/users', UsersController::class)->middleware('admin');
    Route::post('/users/store', [UsersController::class, 'store'])->name('users.store')->middleware('admin');
    Route::post('/users', [UsersController::class, 'import'])->name('users.import')->middleware('admin');
    Route::delete('/hapusAllUser', [UsersController::class, 'hapusAllUser'])->name('users.hapus')->middleware('admin');

    //agama
    Route::resource('/agama', AgamaController::class)->middleware('admin');
    //jurusan
    Route::resource('/jurusan', JurusanController::class)->middleware('admin');
    //kelas
    Route::resource('/kelas', KelasController::class)->names('kelas')->parameters(['kelas' => 'kelas'])->middleware('admin');

    //biodata
    Route::get('/biodata', [BiodataController::class, 'index'])->name('biodata.index');
    Route::post('/biodata', [BiodataController::class, 'store'])->name('biodata.store');
    Route::get('/biodata/edit/{id}', [BiodataController::class, 'edit'])->name('biodata.edit');
    Route::put('/biodata/update/{id}', [BiodataController::class, 'update'])->name('biodata.update');

    //config
    Route::resource('/config', ConfigController::class)->middleware('admin');

    //tahun ajaran
    Route::resource('/tahunAjaran', TahunAjaranController::class)->middleware('admin');

    //cetak kartu
    Route::get('/kartu-pelajar', [BiodataController::class, 'cetak'])->name('biodata.cetak');

    //absen
    Route::get('/absensi/dashboard', [AbsenController::class, 'absen_siswa'])->name('dashboard.absensi');
    Route::post('/absensi/store_absen', [AbsenController::class, 'store_absen'])->name('absensi.store_absen');

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
