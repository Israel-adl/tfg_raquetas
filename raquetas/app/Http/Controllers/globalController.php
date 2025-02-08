<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importar la clase DB

class globalController extends Controller
{
    public function listarPalas()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'palas')->get();
        // dd($palas);
        // Retornar la vista con los datos
        return view('listadoArticulos', compact('articulo'));
    }
    public function listarMochilas()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'mochila')->get();
        // dd($palas);
        // Retornar la vista con los datos
        return view('listadoArticulos', compact('articulo'));
    }
    public function listarPaleteros()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'paletero')->get();
        // dd($palas);
        // Retornar la vista con los datos
        return view('listadoArticulos', compact('articulo'));
    }
}
