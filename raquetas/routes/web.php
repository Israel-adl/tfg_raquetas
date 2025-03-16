<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\globalController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('inicio');
})->name('inicio');
Route::get('/admin', function () {
    return view('login');
})->name("login");

// Route::get('/admin/register', function () {
//     return view('register');
// })->name("register");

// Route::get('/palas', function () {
//     return view('palas');
// })->name('palas');

Route::get('/palas', [globalController::class, 'listarPalas'])->name('palas');
Route::get('/paleteros', [globalController::class, 'listarPaleteros'])->name('paleteros');
Route::get('/mochilas', [globalController::class, 'listarMochilas'])->name('mochilas');
Route::get('/calzado', [globalController::class, 'listarCalzado'])->name('calzado');
Route::get('/ropa', [globalController::class, 'listarRopa'])->name('ropa');
Route::get('/pelotas', [globalController::class, 'listarPelotas'])->name('pelotas');
Route::get('/admin/listado', [globalController::class, 'listarArticulosAdmin'])->name('adminListado')->middleware('auth');
Route::get('/admin/crear', [globalController::class, 'crearArticulosAdmin'])->name('crearadminListado')->middleware('auth');
Route::get('/admin/editar/{id}', [globalController::class, 'editarArticulosAdmin'])->name('editaradminListado')->middleware('auth');
Route::post('/admin/editar', [globalController::class, 'posteditarArticulosAdmin'])->name('posteditaradminListado')->middleware('auth');
Route::post('/admin/crear', [globalController::class, 'crearArticulosAdminPOST'])->name('crearArticulosAdminPOST')->middleware('auth');
Route::post('/admin/eliminar/{id}', [globalController::class, 'eliminarArticuloAdminPOST'])->name('eliminarArticuloAdminPOST')->middleware('auth');

Route::get('/resumen-compra', [globalController::class, 'resumenCompra'])->name('resumen-compra');
Route::get('/localizador/{id}', [globalController::class, 'localizador'])->name('localizador');

Route::post('/crear-pedido', [globalController::class, 'crearPedido'])->name('crearPedido');

/*
    RUTA PARA VER DETALLES DE ARTICULO
*/
Route::get('/detalles/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
/*
Route::get('/articulo/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
*/

Route::get('/test', [globalController::class, 'test'])->name('test');
Route::get('/testParametro/{id}', [globalController::class, 'testParametro'])->name('test');


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');