<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\UserController;
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

// Login Admin
Route::middleware('guest:web')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
    Route::post('/authentication', [AuthController::class, 'authenticate'])->name('authentication');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/', [HomeController::class, 'index'])->name('index');

Route::prefix('panel')->middleware(['auth:web', 'role:admin'])->group(function () {
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
    // Settings
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('aplikasi', AplikasiController::class)->except(['show', 'create', 'store', 'destroy', 'edit']);
});

// Login Mahasiswa / Dosen (jika belum login sebagai mahasiswa atau dosen)
Route::middleware('guest:user')->group(function () {
    Route::get('/user/login', [UserAuthController::class, 'index'])->name('user.login');
    Route::post('/user/authentication', [UserAuthController::class, 'authenticate'])->name('user.authentication');
});
Route::post('/user/logout', [UserAuthController::class, 'logout'])->name('user.logout');

// =================== MAHASISWA PANEL ===================
Route::prefix('mahasiswa')->middleware(['auth:user', 'role:mahasiswa'])->group(function () {
    Route::get('/dashboard', [MahasiswaController::class, 'dashboard'])->name('mahasiswa.dashboard');
    Route::get('/profil', [UserController::class, 'profilMahasiswa'])->name('mahasiswa.profil');
    // Route::get('/jadwal-bimbingan', [MahasiswaController::class, 'lihatJadwal'])->name('mahasiswa.jadwal');
    // Route::get('/laporan', [MahasiswaController::class, 'uploadLaporan'])->name('mahasiswa.laporan');
    // Route::post('/laporan', [MahasiswaController::class, 'storeLaporan'])->name('mahasiswa.laporan.store');
    // Route::get('/revisi', [MahasiswaController::class, 'lihatRevisi'])->name('mahasiswa.revisi');
});

// =================== DOSEN PANEL ===================
// Route::prefix('dosen')->middleware(['auth:user', 'role:dosen'])->group(function () {
//     Route::get('/dashboard', [DosenController::class, 'dashboard'])->name('dosen.dashboard');
//     Route::get('/jadwal-bimbingan', [DosenController::class, 'lihatJadwal'])->name('dosen.jadwal');
//     Route::get('/mahasiswa-bimbingan', [DosenController::class, 'lihatMahasiswa'])->name('dosen.mahasiswa');
// });