<?php

use App\Http\Controllers\CetakkartuController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DatabukuController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\DatausersController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/daftar', [DaftarController::class, 'index']);
Route::get('/cetak', [CetakkartuController::class, 'index']);
Route::get('/databuku', [DatabukuController::class, 'index']);
Route::get('/peminjaman', [PeminjamanController::class, 'index']);
Route::get('/pengembalian', [PengembalianController::class, 'index']);

Route::get('/datausers', [DatausersController::class, 'index']);
Route::get('/tambahuser', [DatausersController::class, 'tambah']);
Route::post('/userstore', [DatausersController::class, 'userstore']);
Route::get('/edituser/{id}', [DatausersController::class, 'edit']);
Route::post('/editusers/{id}', [DatausersController::class, 'editusers']);
Route::delete('/deleteuser/{id}', [DatausersController::class, 'delete']);

Route::get('/', [LoginController::class, 'index']);
Route::post('/proseslogin', [LoginController::class, 'proseslogin']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/logout',[LoginController::class, 'logout']);