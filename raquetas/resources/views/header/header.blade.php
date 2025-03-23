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
            <a href="/"><h1>PádelPro</h1></a>
        </div>

        <div class="encabezado-derecha">
            <div class="elementos-derecha">
                <!-- <div class="barra-busqueda">
                    <input type="text" id="busqueda" placeholder="Buscar...">
                    <button id="boton-busqueda">🔍</button>
                </div> -->
                @guest
                <a href="{{route('login')}}">
                        <button id="">Iniciar sesion</button>
                </a>
                @endguest
                @auth
                <form action="/logout" method="POST">
                    @csrf
                    <button type="submit">Cerrar sesión</button>
                </form>
                @endauth
                @if(auth()->check() && auth()->user()->role === 'admin')
                <a href="{{route('adminListado')}}">
                        <button id="">Admin Panel</button>
                </a>
                @endif
                <div class="carrito">
                    <button id="boton-carrito">🛒 Carrito</button>
                </div>
                @auth
                <a href="{{route('perfil')}}">
                        <button id="">Perfil</button>
                </a>
                @endauth
                <div class="carrito">
                    <!-- <a href="{{route('login')}}">
                        <button id="boton-carrito">Iniciar sesion</button>
                    </a> -->
                    
                </div>
            </div>
        </div>
    </header>
    <div class="carrito_desplegable oculto">
        <h5 style="margin-bottom:15px;">Carrito</h5>
        <ul>

        </ul>
        <span class="precioTotal">0€</span>
        <a href="{{route('resumen-compra')}}">
            <button>Comprar</button>
        </a>
    </div>