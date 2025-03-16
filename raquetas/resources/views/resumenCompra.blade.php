@extends('welcome')
@section('admin')
<a href="{{ route('adminListado') }}">Admin Listado</a>
@endsection
@section('titulo_pagina')
PAGINA ADMINISTRACION
@endsection
@section('contenido')
<main>
    <style>
        table{
            width: 1300px;
        }
        /* Estilos generales para la tabla CRUD */
.tabla-cru,.tabla-crud-resumend {
    width: 1300px;
    border-collapse: collapse;
    background-color: #fff;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}
/* Estilos para el encabezado de la tabla */
.tabla-crud thead {
    background-color: #007bff;
    color: white;
    text-align: left;
}

.tabla-crud th, .tabla-crud td {
    padding: 12px 16px;
    border-bottom: 1px solid #ddd;
}

/* Estilos para las filas impares */
.tabla-crud tbody tr:nth-child(odd) {
    background-color: #f9f9f9;
}

/* Efecto hover en las filas */
.tabla-crud tbody tr:hover {
    background-color: #f1f1f1;
}

/* Estilos para los botones de acción */
.boton-accion {
    padding: 6px 12px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 14px;
    transition: background 0.3s ease;
}

.boton-editar {
    background-color: #ffc107;
    color: white;
}

.boton-editar:hover {
    background-color: #e0a800;
}

.boton-eliminar {
    background-color: #dc3545;
    color: white;
}

.boton-eliminar:hover {
    background-color: #c82333;
}
a {
    min-width: 70px;
}
/* Responsividad */
@media (max-width: 768px) {
    .tabla-crud th, .tabla-crud td {
        padding: 10px;
        font-size: 14px;
    }

    .boton-accion {
        font-size: 12px;
        padding: 4px 8px;
    }
}
td{
    text-align: center;
}
table{
    width: 500px !important;
}
button{
    width: 300px;
}
@media screen and (max-width: 768px) {

    table{
    width: 100% !important;
}
button{
    width: 100px;
}
}

    </style>
<div>
<form id="formulario-compra" onsubmit="return hacerPedido(event,'{{ csrf_token() }}')">
    @csrf

    <h2>Detalles de la compra</h2>
    
    <!-- Información personal -->
    <div>
        <label for="nombre">Nombre</label>
        <input type="text" id="nombre" name="nombre" placeholder="Ingresa tu nombre" required>
    </div>

    <div>
        <label for="apellidos">Apellidos</label>
        <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" required>
    </div>

    <div>
        <label for="telefono">Teléfono</label>
        <input type="tel" id="telefono" name="telefono" placeholder="Ingresa tu teléfono" required>
    </div>

    <div>
        <label for="email">Correo electrónico</label>
        <input type="email" id="email" name="email" placeholder="Ingresa tu correo electrónico" required>
    </div>

    <!-- Dirección de envío -->
    <h3>Dirección de Envío</h3>
    <div>
        <label for="direccion">Dirección</label>
        <input type="text" id="direccion" name="direccion" placeholder="Ingresa tu dirección de envío" required>
    </div>

    <div>
        <label for="codigo_postal">Código Postal</label>
        <input type="text" id="codigo_postal" name="codigo_postal" placeholder="Ingresa tu código postal" required>
    </div>

    <div>
        <label for="ciudad">Ciudad</label>
        <input type="text" id="ciudad" name="ciudad" placeholder="Ingresa tu ciudad" required>
    </div>

    <div>
        <label for="provincia">Provincia</label>
        <input type="text" id="provincia" name="provincia" placeholder="Ingresa tu provincia" required>
    </div>

    <!-- Método de pago -->
    <h3>Método de Pago</h3>
    <div>
        <label for="metodo_pago">Selecciona tu método de pago</label>
        <select id="metodo_pago" name="metodo_pago" required>
            <option value="tarjeta">Tarjeta de crédito/débito</option>
            <option value="paypal">PayPal</option>
            <option value="transferencia">Transferencia bancaria</option>
        </select>
    </div>

    <div>
        <label for="numero_tarjeta" id="numero_tarjeta_label" style="display: none;">Número de tarjeta</label>
        <input type="text" id="numero_tarjeta" name="numero_tarjeta" placeholder="Ingresa el número de tu tarjeta" style="display: none;">
    </div>

    <div>
        <label for="fecha_vencimiento" id="fecha_vencimiento_label" style="display: none;">Fecha de vencimiento (MM/AA)</label>
        <input type="text" id="fecha_vencimiento" name="fecha_vencimiento" placeholder="MM/AA" style="display: none;">
    </div>

    <div>
        <label for="cvv" id="cvv_label" style="display: none;">CVV</label>
        <input type="text" id="cvv" name="cvv" placeholder="CVV" style="display: none;">
    </div>

    <!-- Comentarios adicionales -->
    <div>
        <label for="comentarios">Comentarios adicionales</label>
        <textarea id="comentarios" name="comentarios" placeholder="Escribe aquí cualquier comentario adicional que tengas." rows="4"></textarea>
    </div>

    <table class="tabla-crud-resumen">
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Cantidad</th>
            <th>Precio</th>
        </tr>
       
    </table>
    <div style="display: flex;justify-content: end;">
        <button type="submit">Realizar compra</button>
    </div>
</form>

</div>

    <!-- <button onclick="hacerPedido('{{ csrf_token() }}')">Hacer pedido</button> -->

</main>
<script>
    // Mostrar campos de tarjeta de crédito si se selecciona "Tarjeta de crédito/débito"
    document.getElementById('metodo_pago').addEventListener('change', function () {
        var metodoPago = this.value;
        if (metodoPago === 'tarjeta') {
            document.getElementById('numero_tarjeta').style.display = 'block';
            document.getElementById('numero_tarjeta_label').style.display = 'block';
            document.getElementById('fecha_vencimiento').style.display = 'block';
            document.getElementById('fecha_vencimiento_label').style.display = 'block';
            document.getElementById('cvv').style.display = 'block';
            document.getElementById('cvv_label').style.display = 'block';
        } else {
            document.getElementById('numero_tarjeta').style.display = 'none';
            document.getElementById('numero_tarjeta_label').style.display = 'none';
            document.getElementById('fecha_vencimiento').style.display = 'none';
            document.getElementById('fecha_vencimiento_label').style.display = 'none';
            document.getElementById('cvv').style.display = 'none';
            document.getElementById('cvv_label').style.display = 'none';
        }
    });
</script>
@section('scripsExtra')
<script>
    leerCarrito()
</script>
@endsection

@endsection