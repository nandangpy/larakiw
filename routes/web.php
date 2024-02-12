<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\News\NewsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\BarangController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\KategoribarangController;
use App\Http\Controllers\Admin\TransaksiController;

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BeliController;
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

Route::get('/pesanan', function () {
    // return view('pages.public.pesanan-saya');
});

// Route::get('/news', [NewsController::class, 'index'])->name('news');
// Route::get('/news/{berita:slug}', [NewsController::class, 'show'])->name('news-show');

Route::get('/', [BerandaController::class, 'index']);

Route::get('/beli/{uid_b}', [BeliController::class, 'beli'])->name('beli');


// LOGIN?REGISTER?
Route::group([
    'prefix' => 'auth',
    'namespace' => 'Auth',
], function () {
    // Route::resource('login', LoginController::class)->only(['authenticate', 'index'])->middleware('guest');
    Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/register', [RegisterController::class, 'index'])->name('register')->middleware('guest');
    Route::post('/register',  [RegisterController::class, 'store'])->name('register');
    // Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    // Route::get('/profile/{id}/ubah', [ProfileController::class, 'ubah'])->name('profile.ubah');
    // Route::put('/profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
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
});

/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::group([
    'middleware' => ['auth' => 'UserAccess:customer']
], function () {
    
    Route::put('/beli/{uid_b}', [BeliController::class, 'belimainan'])->name('beli-mainan');
    Route::get('/pesanan-saya', [TransaksisayaController::class, 'transaksisaya'])->name('pesanan-saya');
    Route::get('/pesanan-saya/{uid_tr}', [TransaksisayaController::class, 'pesananditerima'])->name('pesanan-diterima');
});
