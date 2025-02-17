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
Route::get('/calzado', [globalController::class, 'listarCalzado'])->name('calzado');
Route::get('/ropa', [globalController::class, 'listarRopa'])->name('ropa');
Route::get('/pelotas', [globalController::class, 'listarPelotas'])->name('pelotas');
Route::get('/admin/listado', [globalController::class, 'listarArticulosAdmin'])->name('adminListado');
Route::get('/admin/crear', [globalController::class, 'crearArticulosAdmin'])->name('crearadminListado');
Route::get('/admin/editar/{id}', [globalController::class, 'editarArticulosAdmin'])->name('editaradminListado');
Route::post('/admin/editar', [globalController::class, 'posteditarArticulosAdmin'])->name('posteditaradminListado');
Route::post('/admin/crear', [globalController::class, 'crearArticulosAdminPOST'])->name('crearArticulosAdminPOST');
Route::post('/admin/eliminar/{id}', [globalController::class, 'eliminarArticuloAdminPOST'])->name('eliminarArticuloAdminPOST');


/*
    RUTA PARA VER DETALLES DE ARTICULO
*/
Route::get('/detalles/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
/*
Route::get('/articulo/{id}', [globalController::class, 'verArticulo'])->name('verArticulo');
*/

Route::get('/test', [globalController::class, 'test'])->name('test');
Route::get('/testParametro/{id}', [globalController::class, 'testParametro'])->name('test');
