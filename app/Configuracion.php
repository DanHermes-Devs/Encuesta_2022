<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    use HasFactory;
    protected $table = 'configuracions';
    protected $fillable = [
        'mensaje_bienvenida',
        'instrucciones1',
        'instrucciones2',
    ];
}
