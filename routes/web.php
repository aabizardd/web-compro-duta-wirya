<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\SejarahController;
use App\Http\Controllers\Admin\VisiMisiController;
use App\Http\Controllers\Admin\KantorCabangController;
use App\Http\Controllers\Admin\LegalitasController;
use App\Http\Controllers\Admin\JasaController;
use App\Http\Controllers\Admin\BidangClientController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\KegiatanController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\FrontEndController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|asdas
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontEndController::class, 'index']);
// Route::get('/profil-kami', [FrontEndController::class, 'profil_kami'])->name('profil-kami');

Route::prefix('profil-kami')->group(function () {
    Route::get('/', [FrontEndController::class, 'sejarah'])->name('profil-kami');
    Route::get('/cabang', [FrontEndController::class, 'kantor_cabang'])->name('profil-kami.cabang');
    Route::get('/visi-misi', [FrontEndController::class, 'visi_misi'])->name('profil-kami.visi-misi');

    Route::get('/legalitas', [FrontEndController::class, 'legalitas'])->name('profil-kami.legalitas');

    // Route::post('/visi-misi', [FrontEndController::class, 'update'])->name('profil-kami.visi-misi');
});

Route::prefix('jasa')->group(function () {
    Route::get('/', [FrontEndController::class, 'jasa'])->name('jasa');
});

Route::prefix('klien')->group(function () {
    Route::get('/', [FrontEndController::class, 'klien'])->name('klien');
});

Route::prefix('berita')->group(function () {
    Route::get('/', [FrontEndController::class, 'berita'])->name('berita');
    Route::get('detail/{id}', [FrontEndController::class, 'berita_detail'])->name('berita.detail');
});

Route::prefix('kontak')->group(function () {
    Route::get('/', [FrontEndController::class, 'kontak'])->name('kontak');
    Route::post('/', [FrontEndController::class, 'send_email'])->name('kontak');
});


Auth::routes();


Route::prefix('admin')->group(function () {


    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/update', [HomeController::class, 'update'])->name('update');

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


    Route::prefix('legalitas')->group(function () {
        Route::get('/', [LegalitasController::class, 'index'])->name('legalitas');
        Route::post('/', [LegalitasController::class, 'update'])->name('legalitas');
    });

    Route::prefix('jasa')->group(function () {
        Route::get('/', [JasaController::class, 'index'])->name('jasa');
        Route::post('/', [JasaController::class, 'store'])->name('jasa');
        Route::get('hapus/{id}', [JasaController::class, 'destroy'])->name('jasa.hapus');
        Route::post('update/{id}', [JasaController::class, 'update'])->name('jasa.update');

        Route::get('get_jasa/{id}', [JasaController::class, 'get_jasa'])->name('jasa.get_jasa');
    });

    // Route::prefix('bidang-client')->group(function () {
    //     Route::get('/', [BidangClientController::class, 'index'])->name('bidang-client');
    //     Route::post('/', [BidangClientController::class, 'store'])->name('bidang-client');
    //     Route::get('hapus/{id}', [BidangClientController::class, 'destroy'])->name('bidang-client.hapus');
    //     Route::post('update/{id}', [BidangClientController::class, 'update'])->name('bidang-client.update');
    // });

    Route::prefix('client')->group(function () {
        Route::get('/', [ClientController::class, 'index'])->name('client');
        Route::post('/', [ClientController::class, 'store'])->name('client');
        Route::get('hapus/{id}', [ClientController::class, 'destroy'])->name('client.hapus');
        Route::post('update/{id}', [ClientController::class, 'update'])->name('client.update');

        Route::get('get_client_by_id/{id}', [ClientController::class, 'get_client_by_id'])->name('client.get_client_by_id');
    });


    Route::prefix('kegiatan')->group(function () {
        Route::get('/', [KegiatanController::class, 'index'])->name('kegiatan');
        Route::post('/', [KegiatanController::class, 'store'])->name('kegiatan');
        Route::get('hapus/{id}', [KegiatanController::class, 'destroy'])->name('kegiatan.hapus');
        Route::post('update/{id}', [KegiatanController::class, 'update'])->name('kegiatan.update');
        Route::get('get_kegiatan/{id}', [KegiatanController::class, 'get_kegiatan'])->name('kegiatan.get_kegiatan');
    });

    Route::prefix('berita')->group(function () {
        Route::get('/', [BeritaController::class, 'index'])->name('berita');
        Route::get('/create', [BeritaController::class, 'create'])->name('berita.create');
        Route::post('/store', [BeritaController::class, 'store'])->name('berita.store');
        Route::get('hapus/{id}', [BeritaController::class, 'destroy'])->name('berita.hapus');
        Route::get('edit/{id}', [BeritaController::class, 'edit'])->name('berita.edit');
        Route::post('update/{id}', [BeritaController::class, 'update'])->name('berita.update');
    });

    Route::prefix('contact-us')->group(function () {
        Route::get('/', [ContactUsController::class, 'index'])->name('contact-us');
        // Route::post('/', [ContactUsController::class, 'store'])->name('client');
        Route::get('hapus/{id}', [ContactUsController::class, 'destroy'])->name('contact-us.hapus');
        // Route::post('update/{id}', [ContactUsController::class, 'update'])->name('client.update');

        // Route::get('get_client_by_id/{id}', [ContactUsController::class, 'get_client_by_id'])->name('client.get_client_by_id');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('profile');
        // Route::post('/', [ProfileController::class, 'store'])->name('client');
        // Route::get('hapus/{id}', [ProfileController::class, 'destroy'])->name('contact-us.hapus');
        // Route::post('update/{id}', [ProfileController::class, 'update'])->name('client.update');

        // Route::get('get_client_by_id/{id}', [ProfileController::class, 'get_client_by_id'])->name('client.get_client_by_id');
    });
});