<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});



Route::get('/guru', function () {
    return view('guru/dashboard');
});

Route::get('/guru/materi', function () {
    return view('guru/materi');
});

Route::get('/guru/tugas', function () {
    return view('guru/tugas');
});


Route::get('/admin', function () {
    return view('admin/dashboard');
});

Route::get('/admin/admin', function () {
    return view('admin/admin');
});

Route::get('/admin/guru', function () {
    return view('admin/guru');
});

Route::get('/admin/siswa', function () {
    return view('admin/siswa');
});

Route::get('/admin/absensi', function () {
    return view('admin/absensi');
});




Route::post('/register',[AuthController::class,'register']);

Route::get('/barang', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'createProduct']);
