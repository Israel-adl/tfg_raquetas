@extends('welcome')

@section('titulo_pagina')
Detalles {{$articulo->nombre}}
@endsection
@section('contenido')

<style>
    .detallesArticulo{
        width: 1000px !important;
        background-color: white;
    }
    main{
        display: flex;
        flex-direction: row;
        justify-content: center;
        align-items: start;
    }
    img{
        aspect-ratio: 4/4;
        width: 300px;
        border-right: 1px solid #ccc;
    }
    .headerArt{
        display: flex;
        border-bottom: 1px solid #ccc;
    }
    header{
        z-index: 100000;
    }
    .headerArt p {
        position: relative;
        padding: 30px;
    }
    .detallitos{
        padding: 30px;
    }
    .detallitos p{
        font-size: 20px;
    }
    .precioArt{
align-items: center;
        color: orange;
        display: flex;
        justify-content: end;
        margin-top: 40px;
        font-weight: bold;
        gap: 30px;
    }
    .precioArt p{
        font-size: 30px !important;
    }
</style>
<main>
    <div class="detallesArticulo">
        <div class="headerArt">
            <img src="{{ asset($articulo->img) }}" alt="Pala de pádel" width="100">
            <h1>{{$articulo->nombre}}</h1>
            <p>Disponibles: {{$articulo->stock}}</p>
        </div>
        <div class="detallitos">
            <p>{{$articulo->descripcion}}</p>
            <p style="margin-top: 20px;">Marca: {{$articulo->marca}}</p>
            <div class="precioArt">
            Precio:<p>{{$articulo->precio}} €</p>
            </div>
       <button style="margin-top: 30px;" onclick="anadir('{{$articulo->id}}','{{$articulo->precio}}','{{asset($articulo->img)}}','{{$articulo->nombre}}')">Añadir al carro</button>


        </div>
      
    </div>
    
</main>
@endsection