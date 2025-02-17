<header>
        <div class="encabezado-izquierda">
            <div class="menu-desplegable">
                <button class="boton-desplegable">Categorías</button>
                <div class="contenido-desplegable">
                    <div class="subcategoria">
                        <span class="titulo-subcategoria">Productos</span>
                        <div class="subcategorias">
                            <a href="{{ route('palas') }}">Palas</a>
                            <a href="{{ route('paleteros') }}">Paleteros</a>
                            <a href="{{ route('mochilas') }}">Mochilas</a>
                        </div>
                    </div>
                    <a href="{{ route('ropa') }}">Ropa</a>
                    <a href="{{ route('calzado') }}">Calzado</a>
                    <a href="{{ route('pelotas') }}">Pelotas</a>
                    @yield('admin')

                </div>
            </div>
        </div>

        <div class="encabezado-centro">
            <a href="/"><h1>Bienvenido a PádelPro</h1></a>
        </div>

        <div class="encabezado-derecha">
            <div class="elementos-derecha">
                <div class="barra-busqueda">
                    <input type="text" id="busqueda" placeholder="Buscar...">
                    <button id="boton-busqueda">🔍</button>
                </div>
                <div class="carrito">
                    <button id="boton-carrito">🛒 Carrito</button>
                </div>
                <div class="carrito">
                    <a href="{{route('login')}}">
                        <button id="boton-carrito">Iniciar sesion</button>
                    </a>
                    
                </div>
            </div>
        </div>
    </header>

    <style>
        .carrito_desplegable ul{
            display: flex;
            flex-direction: column;
            height: 400px;
            overflow-y: scroll;
        }
        .carrito_desplegable ul li{
            list-style: none;
            width: 100%;
            height: 50px;
            background-color: white;
        }
        .carrito_desplegable ul button{
            width: 20px; 
            height:20px; 
            border-radius:10px; 
            background:red;
            padding:0px;
            position: absolute;
            top: 0;
            right: 0;
        }
        .divCarro{
            height: 50px;
            position:relative;
        }
    </style>
    <div class="carrito_desplegable oculto">
        <h5 style="margin-bottom:30px;">Carrito</h5>
        <ul>

        </ul>
        <button>Comprar</button>
    </div>