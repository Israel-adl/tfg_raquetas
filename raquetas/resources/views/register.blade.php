@extends('welcome')

<!-- @section('titulo', 'Inicio') -->

@section('contenido')
<main>
        <section id="seccion-login">
            <h2>Inicia Sesión</h2>
            <form action="/register" method="POST">
    @csrf
    <div>
        <label for="name">Nombre</label>
        <input type="text" id="name" name="name" placeholder="Nombre completo" required>
    </div>
    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
    </div>
    <div>
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmar contraseña" required>
    </div>
    <button type="submit">Registrar</button>
</form>

        </section>
    </main>
@endsection