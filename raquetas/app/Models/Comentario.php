<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    // Especificar el nombre de la tabla
    protected $table = 'comentarios';
    public $timestamps = false;
    // Campos asignables en masa
    protected $fillable = [
        'id',
        'id_producto',
        'id_usuario',
        'contenido',
        'fecha',
        'puntuacion',
    ];
}
