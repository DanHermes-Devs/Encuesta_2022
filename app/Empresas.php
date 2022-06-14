<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresas extends Model
{
    use HasFactory;
    protected $table = 'empresas';
    protected $fillable = [
        'token',
        'nombre',
        'logo',
        'imagen_fondo',
        'colores_principales',
        'descripcion',
        'activo',
    ];

    public function registros()
    {
        return $this->hasMany(Registro::class);
    }

    public function calificaciones()
    {
        return $this->hasMany(Calificaciones::class);
    }
}
