<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GeneratedQRController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JamMengajarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TunjanganController;
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

Route::redirect('/', '/login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('dashboard')->middleware(['auth', 'role:admin'])->group(fn () => [
  Route::resource('jabatan', JabatanController::class)->only(['index', 'edit', 'update'])->names('admin.jabatan'),
  Route::resource('tunjangan', TunjanganController::class)->only(['index', 'edit', 'update'])->names('admin.tunjangan'),
  Route::resource('guru', GuruController::class)->parameter('guru', 'user')->names('admin.guru'),
  Route::resource('jam-mengajar', JamMengajarController::class)->except(['show'])->names('admin.jam-mengajar'),
]);

Route::prefix('dashboard')->middleware(['auth', 'role:guru'])->group(fn () => [
  Route::resource('profile', ProfileController::class)->only(['index', 'update'])->parameter('profile', 'user')->names('guru.profile'),
  Route::resource('generated-qr', GeneratedQRController::class)->only(['index', 'store', 'show'])->names('guru.generated-qr'),
]);

require __DIR__ . '/auth.php';
