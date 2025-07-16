<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\UserController;
use App\Models\Bansossaluran;
use App\Models\Dosen;
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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authentication', [AuthController::class, 'authenticate'])->name('authentication');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/dokumen', [DokumenController::class, 'show'])->name('dokumen.show');
Route::get('/dokumen/download/{id}', [DokumenController::class, 'download'])->name('dokumen.download');

Route::get('/berita/{slug}', [BeritaController::class, 'show'])->name('berita.show');
Route::get('/kegiatan/{slug}', [KegiatanController::class, 'show'])->name('kegiatan.show');
Route::get('/pengumuman/{slug}', [PengumumanController::class, 'show'])->name('pengumuman.show');

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});

Route::get('/{slug}', [MenuController::class, 'show'])->name('menu.show');

Route::prefix('panel')->middleware('auth')->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Master Data
    Route::resource('dosen', DosenController::class)->except(['show']);
    Route::resource('mahasiswa', MahasiswaController::class)->except(['show']);
    Route::resource('judul', JudulController::class)->except(['show']);
    Route::get('/judul/skPembimbing/{id}', [JudulController::class, 'skPembimbing'])->name('judul.skPembimbing');
    Route::get('/judul/skPenguji/{id}', [JudulController::class, 'skPenguji'])->name('judul.skPenguji');
    // Jadwal
    Route::resource('jadwal', JadwalController::class)->except(['show']);
    Route::get('/get-pembimbing/{judul_id}', [JadwalController::class, 'getPembimbing']);
    // Pengumuman
    Route::resource('pengumuman', PengumumanController::class)->except(['show']);
    // Kegiatan
    Route::resource('kegiatan', KegiatanController::class)->except(['show']);
    // Modul
    Route::resource('halaman', HalamanController::class)->except(['show']);
    Route::resource('menu', MenuController::class)->except(['show']);
    Route::get('/menu/load-targets', [MenuController::class, 'loadTargets'])->name('menu.target');
    // Settings
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('aplikasi', AplikasiController::class)->except(['show', 'create', 'store', 'destroy', 'edit']);
});
