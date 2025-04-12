@extends('welcome')

@section('titulo_pagina')
Pagina palas
@endsection
@section('contenido')
<main>
    <div class="contenidoportada">
        <div class="bannerPrincipal">
            <div style="display: flex; flex-direction:column; justify-content:center;align-items:start;gap:30px;padding:40px">
                <h1 style="flex-grow: unset; text-align:start;">Tus mejores raquetas</h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel, dolorem iure illum magnam commodi numquam minima neque qui illo provident!</p>
                <a href="{{route('palas')}}"><button>Ver mas</button></a>
            </div>
            <div>
                <img src="https://www.padeladdict.com/wp-content/uploads/2023/03/quienes-son-los-mejores-rematadores-del-padel-profesional-portada-1068x580-1.jpg" alt="">
            </div>
        </div>
        <h2 style="margin-bottom: 30px;">Proximos Partidos</h2>
        <div class="partidos">
            
        </div>
        <div class="items">
        <a href="{{ route('palas') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTO_yiXyKxi7X001Yl11jl3Gn8PW8ILcC4VyQ&s" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Palas</h5>
                </div>
            </div>
        </a>
 <a href="{{ route('paleteros') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTOgyiCM8N8IijC9SHYBRfWH9XADrd_tbHo9g&s" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Paleteros</h5>
                </div>
            </div>
            </a>
 <a href="{{ route('mochilas') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://royalpadel.com/wp-content/uploads/2023/02/FE506802_2-copia.png" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Mochilas</h5>
                </div>
            </div>
            </a>
 <a href="{{ route('ropa') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://mcprod.head.com/media/wysiwyg/SPW-SU23-Merchandise_Performance.jpg?auto=webp&format=pjpg&quality=85" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Ropa</h5>
                </div>
            </div>
            </a>
 <a href="{{ route('calzado') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://uploads-ssl.webflow.com/65f4578243bae7ca90d451f3/65f6a4d43750bb4054e100f1_2024PD_WILSON_BELA_Altas-48.jpg.cq5dam.web.1200.1200.jpeg" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Calzado</h5>
                </div>
            </div>
            </a>
             <a href="{{ route('pelotas') }}">
            <div class="item">
                <div class="imagenitem">
                    <img src="https://img.freepik.com/fotos-premium/pila-bolas-tenis-fondo-blanco-linea-negra-parte-inferior_1077802-137410.jpg?w=1060" alt="">
                </div>
                <div class="tituloitem">
                    <h5>Pelotas</h5>
                </div>
            </div>
            </a>

        </div>
    <div class="detallesWeb">
        <div class="items">
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1738537200000/ofertas-especiales.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Ofertas Especiales</p>
                </div>
            </div>
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1735858800000/benef-envio-gratis-v2.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Envios Gratuitos superiores a 50 euros</p>
                </div>
            </div>
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1735858800000/benef-gar-solucion-v2.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Garantia de solución y sustitución en 24 horas</p>
                </div>
            </div>
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1736722800000/lanzamientos-y-novedades.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Lanzamiento y novedades</p>
                </div>
            </div>
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1735858800000/frame-5-v2.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Servicio</p>
                </div>
            </div>
            <div class="infoitem">
                <div class="imagenitem">
                    <img src="https://img.pccomponentes.com/pcblog/1735858800000/benef-dev-24h-v2.png" alt="">
                </div>
                <div class="detalleitem">
                    <p>Recibe tu pedido en 24 horas</p>
                </div>
            </div>
        </div>
    </div>

    </div>
    <!-- <h1>PAGINA INICIAL</h1> -->
    <script src="{{ asset('js/apipadel.js') }}"></script>
</main>
@endsection