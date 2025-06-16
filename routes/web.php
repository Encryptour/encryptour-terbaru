<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;

Route::get('/identity', function () {
    return view('identity');
});

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/biodata', [BiodataController::class, 'index']);


Route::get('/gallery', function () {
    return view('maintenance');
});
