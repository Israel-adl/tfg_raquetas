
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
td{
    text-align: center;
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

    </style>
<div>
    <table class="tabla-crud-resumen">
        <tr>
            <th>Nombre</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Cantidad</th>
         
        </tr>
        @foreach($pedido as $item)
            <tr>
                <td>{{$item->producto_nombre}}</td>
                <td><img src="{{$item->imagen}}" alt="" width="50"></td>
                <td>{{$item->precio_unidad}}€</td>
                <td>{{$item->cantidad}}</td>
             
                
            </tr>
    @endforeach
    </table>
</div>
</main>

