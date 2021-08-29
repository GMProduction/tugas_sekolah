<?php

use App\Http\Controllers\API\APIAbsensiController;
use App\Http\Controllers\API\APIAktivitasController;
use App\Http\Controllers\API\APIMateriController;
use App\Http\Controllers\API\APINilaiController;
use App\Http\Controllers\API\APIProfileController;
use App\Http\Controllers\API\APITugasController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'loginApp']);




Route::group(['middleware' => ['auth:sanctum']],function () {
    Route::get('/tugas', [APITugasController::class, 'index']);
    Route::get('/tugas-now', [APITugasController::class, 'showNow']);
    Route::get('/tugas/{id}', [APITugasController::class, 'show']);
    Route::post('/tugas/{id}', [APITugasController::class, 'store']);

    Route::get('/aktivitas',[APIAktivitasController::class, 'index']);
    Route::get('/aktivitas/{id}',[APIAktivitasController::class, 'show']);
    Route::post('/aktivitas/store',[APIAktivitasController::class, 'store']);

    Route::get('/materi',[APIMateriController::class, 'index']);
    Route::get('/materi-now',[APIMateriController::class, 'showNow']);
    Route::get('/materi/{id}',[APIMateriController::class, 'show']);

    Route::get('/profile',[APIProfileController::class,'index']);
    Route::post('/profile',[AuthController::class,'register']);
    Route::post('/profile/update-image',[APIProfileController::class,'updateImage']);

    Route::get('/absensi',[APIAbsensiController::class,'index']);
    Route::post('/absensi/{id}',[APIAbsensiController::class,'absen']);
    Route::get('/absensi-avg',[APIAbsensiController::class,'ratarata']);


    Route::get('/nilai',[APINilaiController::class,'index']);
    Route::get('/nilai-avg',[APINilaiController::class,'ratarata']);

});
