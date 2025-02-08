<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\globalController;

Route::get('/', function () {
    return view('inicio');
});
Route::get('/login', function () {
    return view('login');
})->name("login");

// Route::get('/palas', function () {
//     return view('palas');
// })->name('palas');

Route::get('/palas', [globalController::class, 'listarPalas'])->name('palas');
Route::get('/paleteros', [globalController::class, 'listarPaleteros'])->name('paleteros');
Route::get('/mochilas', [globalController::class, 'listarMochilas'])->name('mochilas');