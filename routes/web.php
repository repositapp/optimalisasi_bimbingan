<?php

use App\Http\Controllers\AplikasiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JudulController;
use App\Http\Controllers\MahasiswaController;
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

Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/authentication', [AuthController::class, 'authenticate'])->name('authentication');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/', [HomeController::class, 'index'])->name('index');

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
    // Settings
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('aplikasi', AplikasiController::class)->except(['show', 'create', 'store', 'destroy', 'edit']);
});
