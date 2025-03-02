@extends('welcome')
@section('admin')
<a href="{{ route('adminListado') }}">Admin Listado</a>
@endsection
@section('titulo_pagina')
Pagina palas
@endsection
@section('contenido')
<main>
    <div style="display: flex; flex-direction:column;">
    <a href="{{ route('adminListado')}}">
        <button>Volver</button>
    </a>
        <form action="" method="post">
        @CSRF
        <input type="hidden" name="id" id="" value="{{$articulo->id}}" placeholder="id">
        <input type="text" name="nombre" id="" value="{{$articulo->nombre}}" placeholder="nombre">
        <input type="text" name="descripcion" id="" value="{{$articulo->descripcion}}" placeholder="descripcion">
        <input type="text" name="precio" id="" value="{{$articulo->precio}}" placeholder="precio">
        <input type="text" name="stock" id="" value="{{$articulo->stock}}" placeholder="stock">
        <input type="text" name="marca" id="" value="{{$articulo->marca}}" placeholder="marca">
        <input type="text" name="categoria_nombre" id="" value="{{$articulo->categoria_nombre}}" placeholder="categoria_nombre">
        <select name="categoria_nombre" id="">
            <!-- <option value="" selected disabled>Selecciona categoria</option> -->
            <option value="palas" 
            @if ($articulo->categoria_nombre == "palas") 
                selected
            @endif
            >Palas</option>
            <option value="mochilas" 
            @if ($articulo->categoria_nombre == "mochilas") 
                selected
            @endif
            >Mochilas</option>
            <option value="paleteros" 
            @if ($articulo->categoria_nombre == "paleteros") 
                selected
            @endif
            >Paleteros</option>
            <option value="ropa" 
            @if ($articulo->categoria_nombre == "ropa") 
                selected
            @endif
            >Ropa</option>
            <option value="calzado" 
            @if ($articulo->categoria_nombre == "calzado") 
                selected
            @endif
            >Calzado</option>
            <option value="pelotas" 
            @if ($articulo->categoria_nombre == "pelotas") 
                selected
            @endif
            >Pelotas</option>

        </select>
        <input type="text" name="imagen" id="" value="{{$articulo->img}}" placeholder="imagen">
        <input type="submit" value="Editar" id="enviar">
        </form>
    </div>
    <script>
    var enviar = document.querySelector("#enviar")
    const form = document.querySelector("form");
    
    enviar.addEventListener("click", function (event) {
        event.preventDefault(); // Evita la recarga de la página
        
        const formData = {
            id: document.querySelector("input[name='id']").value,
            nombre: document.querySelector("input[name='nombre']").value,
            descripcion: document.querySelector("input[name='descripcion']").value,
            precio: document.querySelector("input[name='precio']").value,
            stock: document.querySelector("input[name='stock']").value,
            marca: document.querySelector("input[name='marca']").value,
            categoria_nombre: document.querySelector("select[name='categoria_nombre']").value,
            img: document.querySelector("input[name='imagen']").value,
            _token:'{{ csrf_token() }}'
        };

        fetch("http://localhost:8000/admin/editar", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector("input[name='_token']").value
            },
            body: JSON.stringify(formData)
        })
        .then(response => response.json())
        .then(data => {
            alert("Elemento creado exitosamente");
            console.log(data);
        })
        .catch(error => {
            console.error("Error:", error);
            alert("Hubo un error al crear el elemento");
        });
    });

    </script>
</main>
@endsection

