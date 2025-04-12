@extends('welcome')

@section('titulo_pagina')
Pagina palas
@endsection
@section('contenido')
<main>
    <div class="contenidoportada">
    <div class="bannerPrincipal">
            <div style="display: flex; flex-direction:column; justify-content:center;align-items:start;gap:30px;padding:40px">
                <h1 style="flex-grow: unset; text-align:start;">Tus mejores productos</h1>
                <p>Descubre nuestra selección exclusiva de artículos diseñados para ofrecerte el máximo rendimiento dentro y fuera de la pista. Calidad, confort y tecnología se unen para ayudarte a dar tu mejor versión en cada partido.</p>
                <!-- <button>Ver mas</button> -->
            </div>
            <div>
                <img src="https://www.padeladdict.com/wp-content/uploads/2023/03/quienes-son-los-mejores-rematadores-del-padel-profesional-portada-1068x580-1.jpg" alt="">
            </div>
        </div>
    <section class="productos">

    @foreach($articulo as $item)
            <article>
                <a href="{{ route('verArticulo', ['id' => $item->id]) }}">
                    <img src="{{ asset($item->img) }}" alt="Pala de pádel" width="100">
                </a>
                <div>
                    <h2>{{$item->nombre}}</h2>
                    <!-- {{$item->descripcion}} -->
                    <!-- <p class="nombre">{{$item->precio}}€</p> -->
                    <p class="marca">{{$item->marca}}</p>
                    <p class="precio">{{$item->precio}}€</p>
                    <!-- <p class="descripcion">{{$item->precio}}€</p>
                    <p class="stock">{{$item->precio}}€</p> -->
                </div>
                <button class="agregar-carrito buttonAnadir_{{$item->id}}" onclick="anadir('{{$item->id}}','{{$item->precio}}','{{asset($item->img)}}','{{$item->nombre}}')">Añadir</button>
            </article>
    @endforeach

    </section>
    </div>
</main>
@endsection