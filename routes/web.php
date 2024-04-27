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

Route::middleware(['role:1'])->group(function () {
    Route::get('/dinas/dashboard', [DinasController::class, 'index'])->name('dinas.dashboard');
});

Route::middleware(['role:2'])->group(function () {
    Route::get('/dokter/dashboard', [DokterController::class, 'index'])->name('dokter.dashboard');
});

Route::middleware(['role:3'])->group(function () {

    Route::get('/peternak/dashboard', [PeternakController::class, 'index'])->name('peternak.dashboard');
    Route::get('/peternak/profil', [PeternakController::class, 'profil'])->name('peternak.profil');
    Route::get('/peternak/konsultasi', [PeternakController::class, 'konsultasi'])->name('peternak.konsultasi');
    Route::post('/peternak/konsultasi', [ChatController::class,'saveMessage'])->name('chat.save');
    Route::get('/peternak/konsultasi/load', [ChatController::class, 'loadMessage'])->name('peternak.konsultasi.load');
    Route::post('/peternak/konsultasi/room', [RoomController::class,'create'])->name('room.create');

});