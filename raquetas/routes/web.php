<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\globalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\GoogleController;


Route::get('/', function () {
    return view('inicio');
})->name('inicio');
Route::get('/admin', function () {
    return view('login');
})->name("login");


// Route::get('/perfil', function () {
//     return view('perfil.perfil');
// })->name('perfil');
// Route::get('/admin/register', function () {
//     return view('register');
// })->name("register");

// Route::get('/palas', function () {
//     return view('palas');
// })->name('palas');
Route::get('/perfil', [globalController::class, 'verPerfil'])->name('perfil');

Route::get('/palas', [globalController::class, 'listarPalas'])->name('palas');
Route::get('/paleteros', [globalController::class, 'listarPaleteros'])->name('paleteros');
Route::get('/mochilas', [globalController::class, 'listarMochilas'])->name('mochilas');
Route::get('/calzado', [globalController::class, 'listarCalzado'])->name('calzado');
Route::get('/ropa', [globalController::class, 'listarRopa'])->name('ropa');
Route::get('/pelotas', [globalController::class, 'listarPelotas'])->name('pelotas');
Route::middleware(['auth', 'Role:admin'])->group(function () {
    Route::get('/admin/listado', [globalController::class, 'listarArticulosAdmin'])->name('adminListado');
    Route::get('/admin/crear', [globalController::class, 'crearArticulosAdmin'])->name('crearadminListado');
    Route::get('/admin/editar/{id}', [globalController::class, 'editarArticulosAdmin'])->name('editaradminListado');
    Route::post('/admin/editar', [globalController::class, 'posteditarArticulosAdmin'])->name('posteditaradminListado');
    Route::post('/admin/crear', [globalController::class, 'crearArticulosAdminPOST'])->name('crearArticulosAdminPOST');
    Route::post('/admin/eliminar/{id}', [globalController::class, 'eliminarArticuloAdminPOST'])->name('eliminarArticuloAdminPOST');
});

Route::get('/resumen-compra', [globalController::class, 'resumenCompra'])->name('resumen-compra');
Route::get('/localizador/{id}', [globalController::class, 'localizador'])->name('localizador');

Route::post('/crear-pedido', [globalController::class, 'crearPedido'])->name('crearPedido');

/*
    RUTA PARA VER DETALLES DE ARTICULO
*/
Route::get('/detalles/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
Route::post('/comentarios/guardar', [globalController::class, 'storeComentario'])->name('comentarios.guardar');
Route::delete('/comentarios/eliminar/{id}', [globalController::class, 'eliminar'])->name('comentarios.eliminar');

/*
Route::get('/articulo/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
*/

Route::get('/test', [globalController::class, 'test'])->name('test');
Route::get('/testParametro/{id}', [globalController::class, 'testParametro'])->name('test');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');


Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);