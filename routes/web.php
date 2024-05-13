<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/data-pasien', [App\Http\Controllers\DataPasienController::class, 'index'])->name('data-pasien');
Route::get('/data-pasien/cari', [App\Http\Controllers\DataPasienController::class, 'cari'])->name('cari');
Route::get('/data-pasien/{id}', [App\Http\Controllers\DataPasienController::class, 'getPatientDetail'])->name('pasien.detail');