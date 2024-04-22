<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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
    return view('frontend.home');
});

Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [UserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [UserController::class, 'update'])->name('profile.update');

    // Route::group(['prefix' => 'laporan', 'as' => 'laporan.'],function () {
    //     Route::resource('/', LaporanController::class)->parameters([
    //         '' => 'laporan'
    //     ]);
    //     Route::get('/menu', [LaporanController::class, 'menu'])->name('menu');
    //     Route::patch('/{laporan}/verifikasi', [LaporanController::class, 'verifikasi'])->name('verifikasi');
        
    // });
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
