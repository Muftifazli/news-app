<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Semua route aplikasi berita.
| GET untuk tampilan, POST untuk kirim data (misalnya komentar)
|--------------------------------------------------------------------------
*/

// Halaman utama (daftar berita)
Route::get('/', [NewsController::class, 'index'])->name('news.index');

// Halaman detail berita (GET)
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

// Kirim komentar ke berita tertentu (POST)
Route::post('/news/{news}/comments', [NewsController::class, 'storeComment'])->name('news.comments.store');

// (Opsional) Halaman daftar kategori
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
