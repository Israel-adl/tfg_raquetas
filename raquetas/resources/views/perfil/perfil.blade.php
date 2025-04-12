@extends('welcome')

@section('titulo_pagina')
Perfil
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
  
    <div style="display: flex; flex-direction:column;">
    <h1>Perfil</h1>
    <h5>Nombre Usuario: {{Auth::user()->name}}</h5>
    <h5>Email: {{Auth::user()->email}}</h5>
    <h5>Rol: {{Auth::user()->role}}</h5>
    <h2>Listado Pedidos:</h2>
    <div class="pedidos">
    @foreach($pedidos as $item)
    <div>ID: {{$item->id}}</div>
    <div>TOTAL: {{$item->total}}</div>
    <div>Detalles localizador : <a href="/localizador/{{$item->id}}"><button>Ver</button></a>
    <iframe src="/localizador/{{$item->id}}" frameborder="0" width="1000" height="500"></iframe>
    @endforeach
    </div>
    </div>

</main>
@endsection