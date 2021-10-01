<?php

use App\Http\Controllers\Admin\AbsensiController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\GuruController;
use App\Http\Controllers\Admin\KelasController;
use App\Http\Controllers\Admin\SiswaController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\GuruMiddleware;
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
    return redirect('/login');
});

Route::get('/login', function () {
    return view('login');
});
Route::post('/login', [AuthController::class,'login']);
Route::get('/logout', [AuthController::class,'logout']);

Route::get('/register-page', function () {
    return view('registerPage');
});
Route::post('/register-page', [AuthController::class, 'registerMember']);





Route::prefix('/admin')->middleware(AdminMiddleware::class)->group(function (){
    Route::get('/', function () {
        return view('admin/dashboard');
    });
    Route::get('/data-admin', [AdminController::class,'index']);
    Route::post('/data-admin', [AuthController::class, 'register']);
    Route::get('/data-admin/{id}/delete', [AdminController::class, 'delete']);

    Route::get('/guru', [GuruController::class, 'index']);
    Route::post('/guru', [AuthController::class, 'register']);
    Route::get('/guru/delete/{id}', [GuruController::class, 'delete']);

    Route::match(['post','get'],'/kelas', [KelasController::class, 'index']);
    Route::get('/kelas/delete/{id}', [KelasController::class, 'delete']);

    Route::prefix('/siswa')->group(function (){
        Route::match(['POST','GET'],'/', [SiswaController::class, 'index']);
        Route::get('/{id}', [SiswaController::class, 'detail']);
        Route::get('/{id}/tugas', [SiswaController::class,'tugas']);
    });

    Route::prefix('/absensi')->group(function (){
        Route::match(['post','get'],'/', [AbsensiController::class, 'index']);
        Route::get('/{id}', [AbsensiController::class,'detail']);
    });
});

Route::prefix('/guru')->middleware(GuruMiddleware::class)->group(function (){
    Route::get('/',[\App\Http\Controllers\Guru\DashboardController::class,'index']);
    Route::get('/profile',[\App\Http\Controllers\Guru\ProfileController::class,'index']);
    Route::post('/profile',[AuthController::class,'register']);
    Route::post('/profile/update-image',[\App\Http\Controllers\Guru\ProfileController::class,'updateImage']);
    Route::match(['post','get'],'/materi',[\App\Http\Controllers\Guru\MateriController::class,'index']);
    Route::get('/materi/{id}/delete',[\App\Http\Controllers\Guru\MateriController::class, 'delete']);
    Route::match(['post','get'],'/tugas',[\App\Http\Controllers\Guru\TugasController::class,'index']);
    Route::get('/tugas/{id}',[\App\Http\Controllers\Guru\TugasController::class,'detail']);
    Route::post('/tugas/nilai/{id}',[\App\Http\Controllers\Guru\TugasController::class,'updateNilai']);
});



//Route::post('/register',[AuthController::class,'register']);
//
//Route::get('/barang', [BarangController::class, 'index']);
//Route::post('/barang', [BarangController::class, 'createProduct']);
