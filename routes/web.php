<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('template');
});

Route::resource('buku', BukuController::class); 
Route::resource('biodata', BiodataController::class); 
Route::resource('penerbit', PenerbitController::class); 
Route::resource('foto', FotoController::class); 