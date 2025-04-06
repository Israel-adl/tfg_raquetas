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
   
    .estrellita{
        font-size: 40px;
    }
    .wrapperComentario, .wrapperFormComentarios{
        padding: 30px;
    }
    .nombre_comentario,.comentario{
        margin: 10px 0px;
    }
    .listaComentarios{
        display: flex;
        flex-direction: column;
        gap: 30px;
    }
    .bloqueComentario{
        background: rgb(231, 231, 231);
        padding: 10px 30px;
        border-radius: 10px;
    }
    .estrella {
        font-size: 2rem;
        color: lightgray;
        cursor: pointer;
        transition: color 0.2s;
    }

    .estrella.seleccionada {
        color: gold;
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
        <div class="wrapperFormComentarios">
            <h2>Comentarios</h2>
            <hr>
            @auth
            <form action="{{ route('comentarios.guardar') }}" method="post">
                @csrf
                <input type="hidden" name="id_producto" value="{{ $articulo->id }}"> {{-- Para saber a qué producto pertenece --}}
                <input type="text" name="comentario" placeholder="Escribe tu comentario">
              
<div id="estrellas">
    @for ($i = 1; $i <= 5; $i++)
        <span class="estrella" data-valor="{{ $i }}">★</span>
    @endfor
</div>

<input type="hidden" name="puntuacion" id="puntuacion" value="0">
                <button type="submit">Enviar</button>
            </form>
            
                
            @endauth
        </div>
      <div class="wrapperComentario">
        <h2 class="mediaPuntuacion">Media Puntuacion Total: {{$mediaPuntuacion}}</h2>
        <div class="listaComentarios">
        @foreach ($comentarios as $comentario)
        <div class="bloqueComentario">
        @if(session('mensaje'))
            <div class="alert alert-success">
                {{ session('mensaje') }}
            </div>
        @endif
        @if(auth()->check() && auth()->user()->role === 'admin')
            <form action="{{ route('comentarios.eliminar', $comentario->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Estás seguro de eliminar este comentario?')">
                    🗑️ Eliminar
                </button>
            </form>

        @endif
            <h5 class="nombre_comentario">Nombre Cliente: {{$comentario->usuario_nombre}}</h5>
            <p class="comentario">{{ $comentario->contenido }}</p>
            <h5 style="display: inline;">Puntuacion:</h5>
            <span class="puntuacion_comentario">{{$comentario->puntuacion}}</span>
        </div>
        @endforeach
        </div>
      </div>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function () {
    const estrellasHTML = (puntuacion) => {
        let html = '';
        for (let i = 1; i <= 5; i++) {
            if (i <= puntuacion) {
                html += '<span class="estrellita" style="color: gold;">★</span>'; // Estrella amarilla
            } else {
                html += '<span class="estrellita" style="color: lightgray;">★</span>'; // Estrella gris
            }
        }
        return html;
    };
    const estrellas = document.querySelectorAll('#estrellas .estrella');
    const inputPuntuacion = document.getElementById('puntuacion');

    estrellas.forEach((estrella, index) => {
        estrella.addEventListener('click', function () {
            const valor = parseInt(this.getAttribute('data-valor'));

            // Guardar valor en el input oculto
            inputPuntuacion.value = valor;

            // Pintar estrellas seleccionadas
            estrellas.forEach((e, i) => {
                if (i < valor) {
                    e.classList.add('seleccionada');
                } else {
                    e.classList.remove('seleccionada');
                }
            });
        });
    });
    // Comentarios individuales
    document.querySelectorAll('.puntuacion_comentario').forEach(function (element) {
        const puntuacion = parseFloat(element.textContent);
        if (!isNaN(puntuacion)) {
            element.innerHTML = estrellasHTML(puntuacion);
        }
    });

    // Media total (redondeada hacia arriba)
    const mediaEl = document.querySelector('.mediaPuntuacion');
    if (mediaEl) {
        const regex = /(\d+(\.\d+)?)/; // Extrae número decimal
        const match = mediaEl.textContent.match(regex);
        if (match) {
            const puntuacion = Math.ceil(parseFloat(match[0])); // Redondeo hacia arriba
            mediaEl.innerHTML = `Media Puntuacion Total: ${estrellasHTML(puntuacion)}`;
        }
    }
});


</script>
</main>
@endsection