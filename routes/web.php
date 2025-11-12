<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\LoginController;

Route::get('/login', function () {
    if (session()->has('auth')) {
        return redirect()->route('home');
    }
    return view('login');
})->name('login');

Route::post('/login', LoginController::class)
->middleware('throttle:login')
->name('login.authenticate');

Route::middleware(['checkSession'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::get('/identity', function () {
        return view('identity');
    });

    Route::get('/biodata', [MahasiswaController::class, 'index'])->name('biodata.index');
    Route::get('/biodata/search', [MahasiswaController::class, 'liveSearch'])->name('biodata.search');


    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

    Route::get('/logout', function () {
        session()->forget('auth');
        return redirect()->route('login');
    })->name('logout');

});