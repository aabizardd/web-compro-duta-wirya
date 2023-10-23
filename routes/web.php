<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\KantorCabangController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::prefix('sejarah')->group(function () {
    Route::get('/', [SejarahController::class, 'index'])->name('sejarah');
    Route::post('/', [SejarahController::class, 'update'])->name('sejarah');
});

Route::prefix('visi-misi')->group(function () {
    Route::get('/', [VisiMisiController::class, 'index'])->name('visi-misi');
    Route::post('/', [VisiMisiController::class, 'update'])->name('visi-misi');
});

Route::prefix('kantor-cabang')->group(function () {
    Route::get('/', [KantorCabangController::class, 'index'])->name('kantor-cabang');
    Route::post('/', [KantorCabangController::class, 'store'])->name('kantor-cabang');
    Route::get('hapus/{id}', [KantorCabangController::class, 'destroy'])->name('kantor-cabang.hapus');
    Route::post('update/{id}', [KantorCabangController::class, 'update'])->name('kantor-cabang.update');
});