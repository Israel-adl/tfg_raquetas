@extends('welcome')

<!-- @section('titulo', 'Inicio') -->

@section('contenido')
<main>
        <section id="seccion-login">
            <h2>Inicia Sesión</h2>
            <form id="formulario-login">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" placeholder="Introduce tu usuario" required>

                <label for="contraseña">Contraseña:</label>
                <input type="password" id="contraseña" name="contraseña" placeholder="Introduce tu contraseña" required>

                <button type="submit">Iniciar Sesión</button>
            </form>
        </section>
    </main>
@endsection