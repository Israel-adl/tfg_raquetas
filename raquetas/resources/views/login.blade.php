@extends('welcome')

<!-- @section('titulo', 'Inicio') -->

@section('contenido')
<main>
        <section id="seccion-login">
            <h2>Inicia Sesión</h2>
            <form action="/login" method="POST" style="margin-bottom:20px;">
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
    <a href="{{route('registro')}}" style="margin-bottom: 30px;">¿No estas registrado? ¡REGISTRATE!</a>
</form>

<a style="margin-top:20px;background-color: white; padding:10px 25px; font-size:15px; border-radius:10px;" href="{{ route('auth.google') }}" class="btn btn-danger">
   <img src="https://cdn-icons-png.freepik.com/256/2702/2702602.png?semt=ais_hybrid" width="15" alt=""> Iniciar sesión con Google
</a>
        </section>
    </main>
@endsection