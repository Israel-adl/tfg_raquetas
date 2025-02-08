<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    // Especificar el nombre de la tabla
    protected $table = 'productos';
    public $timestamps = false;
    // Campos asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'marca',
        'categoria_nombre',
        'img',
    ];
}
