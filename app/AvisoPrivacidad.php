<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvisoPrivacidad extends Model
{
    use HasFactory;
    protected $table = 'aviso_privacidads';
    protected $fillable = [
        'aviso',
    ];
}
