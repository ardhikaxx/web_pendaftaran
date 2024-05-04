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
Route::get('/print', 'App\Http\Controllers\PasienController@print')->name('print');
Route::get('/home/cari', [App\Http\Controllers\HomeController::class, 'cari'])->name('cari');
Route::post('/process-dropdown', [App\Http\Controllers\HomeController::class, 'processDropdown'])->name('process_dropdown');
Route::post('/search-patient', [App\Http\Controllers\HomeController::class, 'search'])->name('search_patient');