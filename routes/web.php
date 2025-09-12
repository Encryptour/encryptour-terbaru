<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\GalleryController;

Route::get('/identity', function () {
    return view('identity');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/biodata', [MahasiswaController::class, 'index'])->name('biodata.index');


Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
