@extends('welcome')
@section('admin')
<a href="{{ route('adminListado') }}">Admin Listado</a>
@endsection
@section('titulo_pagina')
Pagina palas
@endsection
@section('contenido')
<main>
    <a href="{{ route('adminListado')}}">
        <button>Volver</button>
    </a>
    <div style="display: flex; flex-direction:column;">
        <form action="" method="post">
        @CSRF
        <input type="text" name="nombre" id="" value="" placeholder="nombre">
        <input type="text" name="descripcion" id="" value="" placeholder="descripcion">
        <input type="text" name="precio" id="" value="" placeholder="precio">
        <input type="text" name="stock" id="" value="" placeholder="stock">
        <input type="text" name="marca" id="" value="" placeholder="marca">
        <!-- <input type="text" name="categoria_nombre" id="" value="" placeholder="categoria_nombre"> -->
        <select name="categoria_nombre" id="">
            <option value="" selected disabled>Selecciona categoria</option>
            <option value="palas">Palas</option>
            <option value="mochila">Mochilas</option>
            <option value="paletero">Paleteros</option>
            <option value="ropa">Ropa</option>
            <option value="calzado">Calzado</option>
            <option value="pelotas">Pelotas</option>

        </select>
        <input type="text" name="imagen" id="" value="" placeholder="imagen">
        <input type="submit" value="enviar" id="enviar">
        </form>
    </div>
    <script>
    var enviar = document.querySelector("#enviar")
    const form = document.querySelector("form");
    
    enviar.addEventListener("click", function (event) {
        event.preventDefault(); // Evita la recarga de la página
        
        const formData = {
            nombre: document.querySelector("input[name='nombre']").value,
            descripcion: document.querySelector("input[name='descripcion']").value,
            precio: document.querySelector("input[name='precio']").value,
            stock: document.querySelector("input[name='stock']").value,
            marca: document.querySelector("input[name='marca']").value,
            categoria_nombre: document.querySelector("select[name='categoria_nombre']").value,
            img: document.querySelector("input[name='imagen']").value,
            _token:'{{ csrf_token() }}'
        };

        fetch("http://localhost:8000/admin/crear", {
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

