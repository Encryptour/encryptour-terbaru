<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BiodataController;

// Route::get('/', [HomeController::class, 'index']);
Route::get('/identity', function () {
    return view('identity');
});

//route sementara tanpa bio
// Route::get('/biodata', function () {
//     return view('biodata');
// });
Route::get('/', function () {
    return view('home');
});

//route asli
Route::get('/biodata', [BiodataController::class, 'index']);
Route::get('/biodata', [BiodataController::class, 'index']);


Route::get('/gallery', function () {
    return view('gallery');
});

Route::get("/about", function () {
    return view('welcom');
});
