<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    // Especificar el nombre de la tabla
    protected $table = 'pedidos';
    
    // Desactivar los timestamps, ya que estamos usando la fecha manualmente
    public $timestamps = false;

    // Campos asignables en masa
    protected $fillable = [
        'id',
        'fecha_pedido',
        'total',
        'nombre',
        'apellidos',
        'telefono',
        'email',
        'direccion',
        'codigo_postal',
        'ciudad',
        'provincia',
        'pago',
        'numTarjeta',
        'comentario'
    ];

    // Si quieres que el campo 'fecha_pedido' se guarde en un formato específico, puedes agregarlo
    protected $dates = [
        'fecha_pedido'
    ];
}
