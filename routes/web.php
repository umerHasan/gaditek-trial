<?php

use App\Http\Controllers\BoxController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

// Services
Route::get('/services/{id}', [ServiceController::class, 'show'])->middleware(['auth', 'verified']);
Route::post('/services/{id}/purchase', [ServiceController::class, 'purchase'])->middleware(['auth', 'verified']);

// Emails
Route::get('/emails', [EmailController::class, 'index'])->middleware(['auth', 'verified'])->name('emails');
Route::get('/emails/create', [EmailController::class, 'create'])->middleware(['auth', 'verified']);
Route::get('/emails/inbox', [EmailController::class, 'inbox'])->middleware(['auth', 'verified']);
Route::get('/emails/sent', [EmailController::class, 'sent'])->middleware(['auth', 'verified']);
Route::post('/emails', [EmailController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/emails/{id}', [EmailController::class, 'show'])->middleware(['auth', 'verified']);

// Boxes
Route::get('/boxes/create', [BoxController::class, 'create'])->middleware(['auth', 'verified']);
Route::post('/boxes', [BoxController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/boxes/{id}', [BoxController::class, 'show'])->middleware(['auth', 'verified']);
Route::post('/boxes/add-email', [BoxController::class, 'addEmail'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
