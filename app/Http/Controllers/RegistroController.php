<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Registro;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RegistroController extends Controller
{

    public function index($token){
        // Empresa activa
        $empresa = Empresas::where('token', $token)->where('activo', 1)->first();
        return view('index', compact('empresa', 'token'));
    }

    public function registroDatos(Request $request)
    {
        // setcookie("cookieCalificaciones", $request->token, time()+36000);
        $registro = Registro::create($request->all());
        return response()->json(['data' => $registro, 'message' => 'Registro creado correctamente', 'status' => 201]);
    }

    public function resultados($token)
    {
        // $registro = Registro::find($token);
        $registro = Registro::where('token', $token)->first();
        if ($registro) {
            // return response()->json(['data' => $registro, 'message' => 'Registro encontrado', 'status' => 200]);
            return view('resultados', compact('registro'));
        } else {
            return response()->json(['data' => $registro, 'message' => 'Registro no encontrado', 'status' => 404]);
        }
    }

    public function registroAdmin(){
        if(request()->ajax())
        {
            $registros = Registro::all();
            return DataTables()->of($registros)
                ->addColumn('action', function($registros){
                    $button = '<button type="button" name="edit" data-id="'.$registros->id.'" class="edit btn btn-warning btn-sm"><i class="fas fa-edit"></i></button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" data-id="'.$registros->id.'" class="delete btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.registros.index');
    }
    
}
