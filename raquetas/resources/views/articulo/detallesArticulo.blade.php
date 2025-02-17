@extends('welcome')

@section('titulo_pagina')
Detalles {{$articulo->nombre}}
@endsection
@section('contenido')
<main>
    <div class="detallesArticulo">
        <img src="{{ asset($articulo->img) }}" alt="Pala de pádel" width="100">
        <h1>Detalles {{$articulo->nombre}}</h1>
        <h1>{{$articulo->descripcion}}</h1>
        <h1>{{$articulo->precio}}</h1>
        <h1>{{$articulo->stock}}</h1>
        <h1>{{$articulo->marca}}</h1>
    </div>
    

</main>
@endsection