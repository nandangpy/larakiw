<?php

use App\Http\Controllers\News\NewsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\KategoribarangController;


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

Route::get('/', function () {
    return view('pages.public.index');
});


Route::get('/news', [NewsController::class, 'index'])->name('news');
Route::get('/news/{berita:slug}', [NewsController::class, 'show'])->name('news-show');


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
});


/*------------------------------------------
All Admin Routes List
--------------------------------------------*/
// Route::group([
//     'prefix' => 'partner',
//     'middleware' => ['auth' => 'UserAccess:partner']
// ], function () {
//     Route::get('/home', [HomeController::class, 'partnerHome'])->name('dashboard-partner');
// });


/*------------------------------------------
All Normal Users Routes List
--------------------------------------------*/
Route::group([
    'middleware' => ['auth' => 'UserAccess:customer']
], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
