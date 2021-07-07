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
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;

Route::get('/', [LoginController::class, 'halamanLogin'])->name('halamanLogin');
Route::post('/proseslogin', [LoginController::class, 'prosesLogin'])->name('prosesLogin');
Route::get('/logout', [LoginController::class, 'logOut'])->name('logOut');

Route::group(['middleware' => ['auth', 'ceklevel: 0']], function () {

    Route::get('/user', [UserController::class, 'index'])->name('dataUser');
    Route::get('/user/delete', [UserController::class, 'indexDelete'])->name('dataUserDelete');
    Route::post('/user/add', [UserController::class, 'create'])->name('tambahUser');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('editUser');
    Route::post('/user/update', [UserController::class, 'update'])->name('updateUser');
    Route::get('user/user/delete/{id}', [UserController::class, 'destroy'])->name('deleteUser');

    Route::get('/obat', [ObatController::class, 'index'])->name('obat');
    Route::post('/obat/add', [ObatController::class, 'create'])->name('tambahDataObat');
    Route::get('/obat/edit/{id}', [ObatController::class, 'edit'])->name('editDataObat');
    Route::post('/obat/update', [ObatController::class, 'update'])->name('updateDataObat');
    Route::get('/obat/delete/{id}', [ObatController::class, 'destroy'])->name('deleteDataObat');

    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::post('/pegawai/add', [PegawaiController::class, 'create'])->name('tambahDataPegawai');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('editDataPegawai');
    Route::post('/pegawai/update', [PegawaiController::class, 'update'])->name('updateDataPegawai');
    Route::get('/pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('deleteDataPegawai');

    Route::get('/tindakan', [TindakanController::class, 'index'])->name('tindakan');
    Route::post('/tindakan/add', [TindakanController::class, 'create'])->name('tambahDataTindakan');
    Route::get('/tindakan/edit/{id}', [TindakanController::class, 'edit'])->name('editDataTindakan');
    Route::post('/tindakan/update', [TindakanController::class, 'update'])->name('updateDataTindakan');
    Route::get('/tindakan/delete/{id}', [TindakanController::class, 'destroy'])->name('deleteDataTindakan');

    Route::get('/wilayah', [WilayahController::class, 'index'])->name('wilayah');
    Route::post('/wilayah/add', [WilayahController::class, 'create'])->name('tambahDataWilayah');
    Route::get('/wilayah/edit/{id}', [WilayahController::class, 'edit'])->name('editDataWilayah');
    Route::post('/wilayah/update', [WilayahController::class, 'update'])->name('updateDataWilayah');
    Route::get('/wilayah/delete/{id}', [WilayahController::class, 'destroy'])->name('deleteDataWilayah');

    Route::get('/form-laporan-harian', [LaporanController::class, 'formHarian'])->name('formHarian');
    Route::get('/cetak-harian/{tgl}', [LaporanController::class, 'cetakHarian'])->name('cetakHarian');
    Route::get('/form-laporan-bulanan', [LaporanController::class, 'formBulanan'])->name('formBulanan');
    Route::get('/cetak-bulanan/{awal}/{akhir}', [LaporanController::class, 'cetakBulanan'])->name('cetakBulanan');
});

Route::group(['middleware' => ['auth', 'ceklevel: 0, 1']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/pendaftaran', [PendaftaranController::class, 'index'])->name('pendaftaran');
    Route::post('/pendaftaran/add', [PendaftaranController::class, 'create'])->name('tambahDataPendaftaran');
    Route::get('/pendaftaran/edit/{id}', [PendaftaranController::class, 'edit'])->name('editDataPendaftaran');
    Route::post('/pendaftaran/update', [PendaftaranController::class, 'update'])->name('updateDataPendaftaran');
    Route::get('/pendaftaran/delete/{id}', [PendaftaranController::class, 'destroy'])->name('deleteDataPendaftaran');

    Route::get('/periksa', [PeriksaController::class, 'index'])->name('periksa');
    Route::get('/periksa/edit/{id_periksa}', [PeriksaController::class, 'edit'])->name('editDataPeriksa');
    Route::post('/periksa/update', [PeriksaController::class, 'update'])->name('updateDataPeriksa');

    Route::post('/proses/edit/{id_periksa}', [PeriksaDetailController::class, 'create'])->name('prosesUpdate');

    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('Transaksi');
    Route::post('/transaksi/add', [TransaksiController::class, 'create'])->name('simpanTransaksi');
    Route::get('/transaksi/edit/{id_transaksi}', [TransaksiController::class, 'edit'])->name('editTransaksi');
    Route::post('/transaksi/update', [TransaksiController::class, 'update'])->name('bayarTransaksi');
});
