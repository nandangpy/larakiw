<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KategoribarangController;
use App\Http\Controllers\Admin\TransaksiController;
use App\Http\Controllers\Admin\PenjualanController;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\HistoripembelianController;
use App\Http\Controllers\TransaksisayaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [BerandaController::class, 'index'])->name('beranda');
Route::get('/tentang', [BerandaController::class, 'tentangkami'])->name('tentang-kami');
Route::get('/kontak', [BerandaController::class, 'kontakkami'])->name('kontak-kami');


Route::get('/beli/{uid_b}', [BeliController::class, 'beli'])->name('beli');


// LOGIN?REGISTER?
Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/register',  [RegisterController::class, 'store'])->name('register');
});




/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth' => 'UserAccess:admin']
], function () {
    Route::get('/home', [HomeController::class, 'adminHome'])->name('dashboard-admin');
    Route::resource('kategoribarang', KategoribarangController::class);
    Route::resource('barang', BarangController::class);
    Route::get('/transaksi', [TransaksiController::class, 'index'])->name('transaksi');
    Route::put('/transaksi/{uid_tr}', [TransaksiController::class, 'pesanandikirim'])->name('pesanan-dikirim');
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan');
    Route::post('/penjualan', [PenjualanController::class, 'filterperiode'])->name('penjualan-filter');
    Route::post('/penjualan/print', [PenjualanController::class, 'cetaklaporanperiode'])->name('print-laporan');
    Route::get('/penjualan/print-harian', [PenjualanController::class, 'cetaklaporanharian'])->name('print-laporan-harian');
    Route::get('/penjualan/print-bulanan', [PenjualanController::class, 'cetaklaporanbulanan'])->name('print-laporan-bulanan');
});

/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::group([
    'middleware' => ['auth' => 'UserAccess:customer']
], function () {

    Route::put('/beli/{uid_b}', [BeliController::class, 'belimainan'])->name('beli-mainan');
    Route::get('/pesanan-saya', [TransaksisayaController::class, 'transaksisaya'])->name('pesanan-saya');
    Route::put('/pesanan-saya/{uid_tr}', [TransaksisayaController::class, 'pesananditerima'])->name('pesanan-diterima');
    Route::get('/historypembelian-saya', [HistoripembelianController::class, 'historypembelian'])->name('historypembelian-saya');

    Route::get('/pesanan-saya/print/{uid_tr}', [TransaksisayaController::class, 'cetakinvoice'])->name('print-invoice');
});
