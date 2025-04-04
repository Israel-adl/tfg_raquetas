@extends('welcome')

<!-- @section('titulo', 'Inicio') -->

@section('contenido')
<main>
        <section id="seccion-login">
            <h2>Inicia Sesión</h2>
            <form action="/login" method="POST">
    @csrf
    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
    </div>
    <div>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" placeholder="Contraseña" required>
    </div>

    <!-- Mostrar errores de validación -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <button type="submit">Iniciar sesión</button>
</form>
        </section>
    </main>
@endsection