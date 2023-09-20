<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\JabatanController;
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
]);

Route::middleware('auth')->group(function () {
  Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
  Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

require __DIR__ . '/auth.php';
