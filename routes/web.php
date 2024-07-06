<?php

use App\Http\Controllers\DaftarorderController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PembelianController;
use App\Models\Daftarorder;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::resource('merchant', \App\Http\Controllers\MerchantController::class);
Route::resource('menu', \App\Http\Controllers\MenuController::class);
Route::resource('kantor', \App\Http\Controllers\KantorController::class);
Route::resource('pembelian', \App\Http\Controllers\PembelianController::class);
Route::resource('invoice', \App\Http\Controllers\InvoiceController::class);
Route::resource('daftarorder', \App\Http\Controllers\DaftarorderController::class);
// Route::post('/pembelian', [PembelianController::class, 'store']);
// Route::get('/invoice/{id}', [InvoiceController::class, 'show']);
// Route::get('/orders', [DaftarorderController::class, 'index']);
