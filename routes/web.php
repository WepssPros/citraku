<?php

use App\Http\Controllers\Admin\BLogController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\KawasanKumuhController;
use App\Http\Controllers\admin\KecamatanController;
use App\Http\Controllers\admin\KelurahanController;
use App\Http\Controllers\admin\PermasalahanController;
use App\Http\Controllers\admin\RTController;
use App\Http\Controllers\admin\SubPermasalahanController;
use App\Http\Controllers\admin\TematikMapController;
use App\Http\Controllers\front\FrontendController;
use App\Models\SubPermasalahan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontendController::class, 'index'])->name('index');
Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {
    // Main Frontend

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::middleware(['admin'])->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('index');
            Route::resource('kawasankumuh', KawasanKumuhController::class);
            Route::resource('tematik', TematikMapController::class);
            Route::resource('blog', BLogController::class);
            Route::resource('permasalahan', PermasalahanController::class);
            Route::resource('subpermasalahan', SubPermasalahanController::class);
            Route::resource('rt', RTController::class);
            Route::resource('kelurahan', KelurahanController::class);
            Route::resource('kecamatan', KecamatanController::class);
        });
    });
});
