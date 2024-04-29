<?php

use App\Events\MassageCreated;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DinasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PeternakController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Broadcast;
use Illuminate\Http\Request;




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

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['role:1'])->group(function () {
    Route::get('/dinas/dashboard', [DinasController::class, 'index'])->name('dinas.dashboard');

    //profil
    Route::get('/dinas/profil', [DinasController::class, 'profil'])->name('dinas.profil');
    Route::post('/dinas/profil/save', [DinasController::class, 'saveprofil'])->name('dinas.profil.save');

    //akun
    Route::get('/dinas/buatakun', [DinasController::class, 'buatakun'])->name('dinas.buatakun');
    Route::post('/dinas/buatakun/store', [DinasController::class, 'buatakunstore'])->name('dinas.buatakun.store');

    Route::get('/dinas/akundokter', [DinasController::class, 'akundokter'])->name('dinas.akundokter');
    Route::post('/dinas/akundokter/edit', [DinasController::class, 'editakundokter'])->name('dinas.editakundokter');
    Route::post('/dinas/akundokter/resetpassword', [DinasController::class, 'resetpasswordakundokter'])->name('dinas.resetpasswordakundokter');
    Route::post('/dinas/akundokter/remove', [DinasController::class, 'removeakundokter'])->name('dinas.removeakundokter');


    Route::get('/dinas/akunpeternak', [DinasController::class, 'akunpeternak'])->name('dinas.akunpeternak');
});

Route::middleware(['role:2'])->group(function () {
    //dashboard
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');

    //profil
    Route::get('/dokter/profil', [DokterController::class, 'profil'])->name('dokter.profil');
    Route::post('/dokter/profil/save', [DokterController::class, 'saveprofil'])->name('dokter.profil.save');

    //konsultasi
    Route::get('/dokter/konsultasi', [DokterController::class, 'konsultasi'])->name('dokter.konsultasi');
    Route::post('/dokter/konsultasi', [ChatController::class,'saveMessage'])->name('dokter.chat.save');
    Route::get('/dokter/konsultasi/load/{roomId}', [ChatController::class, 'loadMessage'])->name('dokter.chat.load');
    Route::post('/dokter/konsultasi/room', [RoomController::class,'create'])->name('dokter.room.create');
});

Route::middleware(['role:3'])->group(function () {

    Route::get('/peternak/dashboard', [PeternakController::class, 'index'])->name('peternak.dashboard');
    Route::get('/peternak/profil', [PeternakController::class, 'profil'])->name('peternak.profil');
    Route::post('/peternak/profil/save', [PeternakController::class, 'saveprofil'])->name('peternak.profil.save');
    Route::get('/peternak/konsultasi', [PeternakController::class, 'konsultasi'])->name('peternak.konsultasi');
    Route::post('/peternak/konsultasi', [ChatController::class,'saveMessage'])->name('chat.save');
    Route::get('/peternak/konsultasi/load/{roomId}', [ChatController::class, 'loadMessage'])->name('chat.load');
    Route::post('/peternak/konsultasi/room', [RoomController::class,'create'])->name('room.create');

});