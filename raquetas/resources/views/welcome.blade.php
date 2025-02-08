<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo_pagina')</title>
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/carrito.css') }}">
</head>
<body>
@include('../header/header')

@yield('contenido')

@include('../footer/footer')
</body>
<script src="{{ asset('js/carrito.js') }}"></script>
</html>