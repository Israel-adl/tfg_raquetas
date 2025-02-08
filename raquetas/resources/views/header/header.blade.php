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
                    <a href="categorias/ropa.html">Ropa</a>
                    <a href="categorias/calzado.html">Calzado</a>
                    <a href="categorias/pelotas.html">Pelotas</a>
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

    <div class="carrito_desplegable oculto">

    </div>