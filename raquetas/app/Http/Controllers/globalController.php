<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use Illuminate\Support\Facades\DB; // Importar la clase DB
use Carbon\Carbon;

class globalController extends Controller
{
    public function listarPalas()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'palas')->get();
    // Definir título y descripción
    $titulo = 'Listado de Palas de Pádel';
    $descripcion = 'Encuentra las mejores palas de pádel al mejor precio. Compara y elige la tuya.';

    // Retornar la vista con los datos
    return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarMochilas()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'mochila')->get();
        $titulo = 'Listado de Mochilas de Pádel';
        $descripcion = 'Encuentra las mejores Mochilas de pádel al mejor precio. Compara y elige la tuya.';
    
        // Retornar la vista con los datos
        return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarPaleteros()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'paletero')->get();
    $titulo = 'Listado de Palas de Pádel';
    $descripcion = 'Encuentra las mejores palas de pádel al mejor precio. Compara y elige la tuya.';

    // Retornar la vista con los datos
    return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarRopa()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'ropa')->get();
    $titulo = 'Listado de Palas de Pádel';
    $descripcion = 'Encuentra las mejores palas de pádel al mejor precio. Compara y elige la tuya.';

    // Retornar la vista con los datos
    return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarCalzado()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'calzado')->get();
    $titulo = 'Listado de Palas de Pádel';
    $descripcion = 'Encuentra las mejores palas de pádel al mejor precio. Compara y elige la tuya.';

    // Retornar la vista con los datos
    return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarPelotas()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->where('categoria_nombre', 'pelotas')->get();
    $titulo = 'Listado de Palas de Pádel';
    $descripcion = 'Encuentra las mejores palas de pádel al mejor precio. Compara y elige la tuya.';

    // Retornar la vista con los datos
    return view('listadoArticulos', compact('articulo', 'titulo', 'descripcion'));
    }
    public function listarArticulosAdmin()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        $articulo = DB::table('productos')->get();
        // dd($palas);
        // Retornar la vista con los datos
        return view('admin.listado', compact('articulo'));
    }
    public function crearArticulosAdmin()
    {
        // Ejecutar la consulta a la tabla 'productos' donde la columna 'categoria' sea 'pala'
        // $articulo = DB::table('productos')->get();
        // dd($palas);
        // Retornar la vista con los datos
        return view('admin.nuevoArticulo');
    }
    public function crearArticulosAdminPOST(Request $request)
    {
    // Validación de los datos recibidos
    // $request->validate([
    //     'nombre' => 'required|string|max:255',
    //     'descripcion' => 'nullable|string',
    //     'precio' => 'required|numeric|min:0',
    //     'stock' => 'required|integer|min:0',
    //     'marca' => 'required|string|max:255',
    //     'categoria_nombre' => 'required|string|max:255',
    //     'img' => 'nullable|string',
    // ]);

    // Creación del nuevo artículo en la base de datos
    $articulo = new Articulo(); // Modelo actualizado a 'Articulo'
    $articulo->nombre = $request->nombre;
    $articulo->descripcion = $request->descripcion;
    $articulo->precio = $request->precio;
    $articulo->stock = $request->stock;
    $articulo->marca = $request->marca;
    $articulo->categoria_nombre = $request->categoria_nombre;
    $articulo->img = $request->img;
    
    // $articulo->updated_at = Carbon::now();
    $articulo->save();

    // Retornar una respuesta
    return response()->json([
        'mensaje' => 'Artículo creado exitosamente',
        'articulo' => $articulo
    ], 201);
        // return view('admin.nuevoArticulo');
        
    }

    public function eliminarArticuloAdminPOST($id)
    {
        // Lógica para eliminar el artículo con el id recibido
        $articulo = Articulo::find($id);
    
        if ($articulo) {
            $articulo->delete();
            // Redirigir de nuevo a la página anterior con un mensaje de éxito
            return redirect()->back()->with('message', 'Artículo eliminado correctamente');
        } else {
            // Redirigir de nuevo a la página anterior con un mensaje de error
            return redirect()->back()->with('error', 'Artículo no encontrado');
        }
    }
    public function editarArticulosAdmin($id){
        $articulo = Articulo::find($id);

        return view('admin.editarArticulo', compact('articulo'));
    }
    public function posteditarArticulosAdmin(Request $request){
        $articulo = Articulo::find($request->id);
        $articulo->nombre = $request->nombre;
        $articulo->precio = $request->precio;
        $articulo->stock = $request->stock;
        $articulo->descripcion = $request->descripcion;
        $articulo->marca = $request->marca;
        $articulo->img = $request->img;
        $articulo->save();
        // dd($articulo->nombre);
        return redirect()->back()->with('message', 'Artículo editado correctamente');
    }
    public function verArticulo($id){
        $articulo = Articulo::find($id);
        // dd($articulo);
        return view('articulo.detallesArticulo', compact('articulo'));
    }









    public function test()
    {
        // Lógica para eliminar el artículo con el id recibido
        $articulo = Articulo::find(3);
    
        dd($articulo);
    }
    public function testParametro($id)
    {
        // Lógica para eliminar el artículo con el id recibido
        $articulo = Articulo::find($id);
        
        dd($articulo);
    }
    
}

