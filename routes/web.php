<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\PeriksaController;
use App\Http\Controllers\PeriksaDetailController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\LoginController;

Route::get('/', [LoginController::class, 'halamanLogin'])->name('halamanLogin');
Route::post('/proseslogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/logout', [LoginController::class, 'logOut'])->name('logOut');

Route::group(['middleware' => ['auth', 'ceklevel: 0 , 1']], function () {
    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::post('/obat/add', [ObatController::class, 'create'])->name('tambahData');
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit'])->name('editData');
    Route::post('/obat/update', [ObatController::class, 'update'])->name('updateData');
    Route::get('/obat/delete/{id}', [ObatController::class, 'destroy'])->name('deleteData');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/add', [PegawaiController::class, 'create'])->name('tambahData');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('editData');
    Route::post('/pegawai/update', [PegawaiController::class, 'update'])->name('updateData');
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('deleteData');

    Route::get('/tindakan', [TindakanController::class, 'index'])->name('tindakan');
    Route::post('/tindakan/add', [TindakanController::class, 'create'])->name('tambahData');
    Route::get('/tindakan/edit/{id}', [TindakanController::class, 'edit'])->name('editData');
    Route::post('/tindakan/update', [TindakanController::class, 'update'])->name('updateData');
    Route::get('/tindakan/delete/{id}', [TindakanController::class, 'destroy'])->name('deleteData');

    Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah');
    Route::post('/wilayah/add', [WilayahController::class, 'create'])->name('tambahData');
    Route::get('/wilayah/edit/{id}', [WilayahController::class, 'edit'])->name('editData');
    Route::post('/wilayah/update', [WilayahController::class, 'update'])->name('updateData');
    Route::get('/wilayah/delete/{id}', [WilayahController::class, 'destroy'])->name('deleteData');

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran/add', [PendaftaranController::class, 'create'])->name('tambahData');
    Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('editData');
    Route::post('/pendaftaran/update', [PendaftaranController::class, 'update'])->name('updateDaftar');
    Route::get('/pendaftaran/delete/{id}', [PendaftaranController::class, 'destroy'])->name('deleteData');

    Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa');
    Route::get('/periksa/edit/{id_periksa}', [PeriksaController::class, 'edit'])->name('editData');
    Route::post('/periksa/update', [PeriksaController::class, 'update'])->name('updateData');

    Route::post('/proses/edit/{id_periksa}', [PeriksaDetailController::class, 'create'])->name('prosesUpdate');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('Transaksi');
    Route::post('/transaksi/add', [TransaksiController::class, 'create'])->name('simpanTransaksi');
    Route::get('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'edit'])->name('editTransaksi');
    Route::post('/transaksi/update', [TransaksiController::class, 'update'])->name('bayarTransaksi');

    Route::get('/laporan-harian', [LaporanController::class, 'harian'])->name('lapHarian');
    Route::get('/laporan-bulanan', [LaporanController::class, 'bulanan'])->name('lapBulanan');
});


Route::get('/laporan', function () {
    return view('laporan/laporan');
});
Route::get('/dashboard', function () {
    return view('v_dashboard');
});



//auth-laravel-
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
