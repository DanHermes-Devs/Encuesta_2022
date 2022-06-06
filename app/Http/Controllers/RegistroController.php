<?php

namespace App\Http\Controllers;

use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegistroController extends Controller
{

    public function registroDatos(Request $request)
    {
        setcookie("cookieCalificaciones", $request->token, time()+3600);
        $registro = Registro::create($request->all());
        return response()->json(['data' => $registro, 'message' => 'Registro creado correctamente', 'status' => 201]);
    }

    
}
