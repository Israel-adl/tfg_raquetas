<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;
use App\Models\Pedido;
use App\Models\Comentario;
use App\Models\DetallePedido;
use Illuminate\Support\Facades\DB; // Importar la clase DB
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

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
        $comentarios = DB::table('comentarios')
        ->join('users', 'comentarios.id_usuario', '=', 'users.id')
        ->where('comentarios.id_producto', $id)
        ->select('comentarios.*', 'users.name as usuario_nombre') // Puedes añadir más campos si quieres
        ->get();
    
        $mediaPuntuacion = Comentario::where('id_producto', $id)->avg('puntuacion');
        return view('articulo.detallesArticulo', compact('articulo', 'comentarios','mediaPuntuacion'));
    }
    public function storeComentario(Request $request)
    {
    
        // Validar datos

    
        // Crear el comentario
        $comentario = new Comentario();
        $comentario->contenido = $request->comentario;
        $comentario->puntuacion = $request->puntuacion;
        $comentario->id_producto = $request->id_producto;
        $comentario->id_usuario = Auth::id(); // o un ID fijo si no tienes login
        $comentario->fecha = Carbon::now(); // Fecha actual (asegúrate de tener ese campo en la DB)
    
        $comentario->save();
  
        return redirect()->back()->with('mensaje', 'Comentario enviado correctamente.');
    }
    public function eliminar($id)
    {
        $comentario = Comentario::findOrFail($id);
    
        // Verificar que el usuario autenticado sea admin
        if (auth()->user()->role !== 'admin') {
            abort(403, 'No tienes permiso para realizar esta acción.');
        }
    
        $comentario->delete();
    
        return redirect()->back()->with('mensaje', 'Comentario eliminado correctamente.');
    }
    public function localizador($id){
        $pedido = DB::table('detalle_pedidos')
        ->join('productos', 'detalle_pedidos.producto_id', '=', 'productos.id')
        ->where('detalle_pedidos.pedido_id', $id)
        ->select(
            'detalle_pedidos.id as detalle_id',
            'detalle_pedidos.pedido_id',
            'detalle_pedidos.producto_id',
            'productos.nombre as producto_nombre',
            'productos.precio as precio_unidad',
            'productos.img as imagen',
            'detalle_pedidos.cantidad'
        )
        ->get();
     

    return view('localizador', compact('pedido'));
}


public function resumenCompra(){
    return view('resumenCompra'/*, compact('articulo')*/);
}
public function crearPedido(Request $request)
{
    // Obtener solo la clave 'carrito' del cuerpo de la solicitud
    $pedidoData = $request->json('carrito'); // Los productos del carrito
    // Obtener los otros datos del formulario
    $nombre = $request->input('nombre');
    $apellidos = $request->input('apellidos');
    $telefono = $request->input('telefono');
    $email = $request->input('email');
    $direccion = $request->input('direccion');
    $codigo_postal = $request->input('codigo_postal');
    $ciudad = $request->input('ciudad');
    $provincia = $request->input('provincia');
    $metodo_pago = $request->input('metodo_pago');
    $numTarjeta = $request->input('numTarjeta');
    $comentarios = $request->input('comentarios');
    $id_user = null;
    if (Auth::check()) {
        $id_user = Auth::user()->id;
    }
    // Imprimir los datos para verificar
    // dd($pedidoData, $nombre, $apellidos, $telefono, $email, $direccion, $codigo_postal, $ciudad, $provincia, $metodo_pago, $comentarios);

    try {
        DB::beginTransaction(); // Iniciar transacción

        // Calcular el total sumando los precios de todos los productos
        $total = array_reduce($pedidoData, function ($sum, $producto) {
            return $sum + ($producto['precio'] * $producto['cantidad']);
        }, 0);

        // Crear el pedido en la base de datos
        $pedido = Pedido::create([
            'fecha_pedido' => Carbon::now()->toDateTimeString(), // Fecha actual
            'total' => $total,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'telefono' => $telefono,
            'email' => $email,
            'direccion' => $direccion,
            'codigo_postal' => $codigo_postal,
            'ciudad' => $ciudad,
            'provincia' => $provincia,
            'pago' => $metodo_pago,
            'numTarjeta' => $numTarjeta,
            'comentario' => $comentarios,
            'user_id' => $id_user,
        ]);

        // Insertar los detalles del pedido en la tabla detalles_pedido
        foreach ($pedidoData as $producto) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $producto['id'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $producto['precio']
            ]);
        }

        DB::commit(); // Confirmar la transacción

        return response()->json([
            'mensaje' => 'Pedido y detalles creados correctamente',
            'localizador' => $pedido->id,
            'pedido_id' => $pedido->id,
            'total' => $total
        ], 201);
    } catch (\Exception $e) {
        DB::rollBack(); // Revertir en caso de error
        return response()->json(['error' => 'Error al crear el pedido', 'detalle' => $e->getMessage()], 500);
    }
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

    public function verPerfil(){
        $pedidos = DB::table('pedidos')->where('user_id', Auth::user()->id)->get();

        return view('perfil.perfil', compact('pedidos'));
    }
    
}

