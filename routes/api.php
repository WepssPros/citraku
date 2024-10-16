<?php

use App\Http\Controllers\Api\CitrakuAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('/kecamatan', [CitrakuAPI::class, 'getAllKecamatan']);
Route::post('/kelurahan', [CitrakuAPI::class, 'getAllKelurahan']);
Route::post('/rt', [CitrakuAPI::class, 'getALlRt']);
Route::post('/kumuh', [CitrakuAPI::class, 'getKawasanKumuh']);
Route::post('/rawanbanjir', [CitrakuAPI::class, 'getRawanBanjir']);
Route::post('/rawankebakaran', [CitrakuAPI::class, 'getRawanKebakaran']);

Route::post('/get-kelurahan/{kecamatan}', [CitrakuAPI::class, 'getKelurahan'])->name('get-kelurahan');
