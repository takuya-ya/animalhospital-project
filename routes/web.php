<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HolidayController;


use App\Models\Reservation;

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



// change
// フロントエンドのルート
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::view('/faq', 'pages.faq')->name('faq');
Route::view('/guide', 'pages.guide')->name('guide');
Route::view('/recruit', 'pages.recruit')->name('recruit');
Route::view('/reservation', 'pages.reservation')->name('reservation');
Route::view('/staff', 'pages.staff')->name('staff');
Route::view('/facility', 'pages.facility')->name('facility');

// バックエンドのルート
Route::prefix('admin')->name('admin.')->group(function () {
    // Authentication routes
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])
        ->name('login')
        ->middleware('guest:admin');
    Route::post('/login', [AdminAuthController::class, 'login'])
        ->name('login.store')
        ->middleware(['guest:admin', 'throttle:login']);
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');


    Route::middleware('auth.admin')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
        Route::resource('reservations', ReservationController::class);
        Route::resource('holidays', HolidayController::class);
    });
});

Route::middleware(['auth'])->group(function () {
    // 予約ルート
    // Route::resource('reservations', ReservationController::class);
    Route::resource('reservations', \App\Http\Controllers\ReservationController::class);



    // プロフィール関連
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
