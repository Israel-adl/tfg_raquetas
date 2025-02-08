@extends('welcome')

@section('titulo_pagina')
Pagina palas
@endsection
@section('contenido')
<main>
    <!-- <h1>PAGINA ARTICULOS</h1> -->
    <section class="productos">
    
    @foreach($articulo as $item)
            <article>
                <img src="{{ asset($item->img) }}" alt="Pala de pádel" width="100">
                <h2>{{$item->nombre}}</h2>
                {{$item->descripcion}}
                {{$item->marca}}
                <p>Precio: {{$item->precio}}€</p>
                <button onclick="anadir({{$item->id}},'{{$item->precio}}')">Añadir al carro articulo con id = {{$item->id}}</button>
            </article>
    @endforeach

    </section>
</main>
@endsection