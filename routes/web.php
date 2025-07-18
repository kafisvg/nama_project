<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenerimaBantuanController; // ✅ Di luar function
use App\Http\Controllers\AssessmentController;

// Menampilkan data penerima bantuan langsung di halaman utama
Route::get('/', [PenerimaBantuanController::class, 'index']);

// Resource route CRUD penerima bantuan
Route::resource('penerima', PenerimaBantuanController::class);
Route::resource('assessment', AssessmentController::class);


