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
                <a href="{{ route('verArticulo', ['id' => $item->id]) }}">
                    <img src="{{ asset($item->img) }}" alt="Pala de pádel" width="100">
                </a>
                <div>
                    <h2>{{$item->nombre}}</h2>
                    <!-- {{$item->descripcion}} -->
                    <p class="marca">{{$item->marca}}</p>
                    <p class="precio">{{$item->precio}}€</p>
                </div>
                <button onclick="anadir('{{$item->id}}','{{$item->precio}}','{{asset($item->img)}}')">Añadir</button>
            </article>
    @endforeach

    </section>
</main>
@endsection