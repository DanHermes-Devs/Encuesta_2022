<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Calificaciones extends Model
{
    use HasFactory;
    protected $table = 'calificaciones';
    protected $fillable = [
        'id_empresa',
        'id_registro',
        'c_final',
        'c_item_1',
        'c_item_2',
        'c_item_3',
        'c_item_4',
        'c_item_5',
        'c_item_6',
        'c_item_7',
        'c_dominio_1',
        'c_dominio_2',
        'c_dominio_3',
        'c_dominio_4',
        'c_dominio_5',
        'c_dominio_6',
        'c_dominio_7',
        'c_dominio_8',
        'c_dominio_9',
        'c_dominio_10',
        'c_dimension_1',
        'c_dimension_2',
        'c_dimension_3',
        'c_dimension_4',
        'c_dimension_5',
        'c_dimension_6',
        'c_dimension_7',
        'c_dimension_8',
        'c_dimension_9',
        'c_dimension_10',
        'c_dimension_11',
        'c_dimension_12',
        'c_dimension_13',
        'c_dimension_14',
        'c_dimension_15',
        'c_dimension_16',
        'c_dimension_17',
        'c_dimension_18',
        'c_dimension_19',
        'c_dimension_20',
        'c_dimension_21',
        'c_dimension_22',
        'c_dimension_23',
    ];

    public function empresa()
    {
        return $this->belongsTo('App\Empresa', 'id_empresa');
    }

    public function registro()
    {
        return $this->belongsTo('App\Registro', 'id_registro');
    }
}
