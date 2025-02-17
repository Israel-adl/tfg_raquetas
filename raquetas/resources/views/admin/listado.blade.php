@extends('welcome')
@section('admin')
<a href="{{ route('adminListado') }}">Admin Listado</a>
@endsection
@section('titulo_pagina')
PAGINA ADMINISTRACION
@endsection
@section('contenido')
<main>
    <style>
        table{
            width: 1300px;
        }
        /* Estilos generales para la tabla CRUD */
.tabla-crud {
    width: 1300px;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}
/* Estilos para el encabezado de la tabla */
.tabla-crud thead {
    background-color: #007bff;
    color: white;
    text-align: left;
}

.tabla-crud th, .tabla-crud td {
    padding: 12px 16px;
    border-bottom: 1px solid #ddd;
}

/* Estilos para las filas impares */
.tabla-crud tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Efecto hover en las filas */
.tabla-crud tbody tr:hover {
    background-color: #f1f1f1;
}

/* Estilos para los botones de acción */
.boton-accion {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s ease;
}

.boton-editar {
    background-color: #ffc107;
    color: white;
}

.boton-editar:hover {
    background-color: #e0a800;
}

.boton-eliminar {
    background-color: #dc3545;
    color: white;
}

.boton-eliminar:hover {
    background-color: #c82333;
}
a {
    min-width: 70px;
}
/* Responsividad */
@media (max-width: 768px) {
    .tabla-crud th, .tabla-crud td {
        padding: 10px;
        font-size: 14px;
    }

    .boton-accion {
        font-size: 12px;
        padding: 4px 8px;
    }
}

    </style>
<div>
    <a href="{{ route('crearadminListado')}}">
        <button>Crear</button>
    </a>
    <table class="tabla-crud">
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Marca</th>
            <th>Categoria</th>
            <th>Imagen</th>
            <th>Controles</th>
        </tr>
        @foreach($articulo as $item)
            <tr>
                <td>{{$item->nombre}}</td>
                <td>{{$item->precio}}</td>
                <td>{{$item->stock}}</td>
                <td>{{$item->marca}}</td>
                <td>{{$item->categoria_nombre}}</td>
                <td><img src="{{ asset($item->img) }}" alt="Pala de pádel" height="30"></td>
                <td style="display: flex;">
                    <!-- poner ruta como la de eliminar pero para ver {{-- route('verArticulo', ['id' => $item->id]) --}} 
                        esto va dentro del href 
                        ruta de prueba http://localhost:8000/testParametro/3
                    -->
                         
                    <a href="{{ route('verArticulo', ['id' => $item->id]) }}">
                        <button>
                            Ver
                        </button>
                    </a>
                    <a href="{{ route('editaradminListado', ['id' => $item->id]) }}">
                        <button style="background-color:rgb(255, 207, 62); color:black;">
                            Editar
                        </button>
                    </a>
                  
                        <form action="{{ route('eliminarArticuloAdminPOST', ['id' => $item->id]) }}" method="post">
                        @CSRF
                            <button  style="background-color:rgb(255, 40, 58);">
                                Eliminar
                            </button>
                        </form>
                 
                    <!-- <a href="">
                        <button style="background-color:rgb(109, 6, 92);">
                            Ocultar
                        </button>
                    </a> -->
                </td>
            </tr>
    @endforeach
    </table>
</div>

</main>
@endsection