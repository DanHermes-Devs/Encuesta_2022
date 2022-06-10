<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmpresasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $empresas = Empresas::all();
            return DataTables()->of($empresas)
                ->addColumn('action', function($empresas){
                    $button = '<button type="button" name="edit" id="'.$empresas->id.'" class="edit btn btn-primary btn-sm">Editar</button>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<button type="button" name="delete" id="'.$empresas->id.'" class="delete btn btn-danger btn-sm">Eliminar</button>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.empresas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nombre' => 'required',
            'logo' => 'required|image',
            // 'imagen_fondo' => 'required|image',
            // 'colores_principales' => 'required',
            'descripcion' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors(), 'status'=>'failed']);
        }else {
            $empresas = new Empresas;
            $empresas->token = $request->token;
            $empresas->nombre = $request->nombre;
            $empresas->logo = $request->logo;
            $empresas->imagen_fondo = $request->imagen_fondo;
            $empresas->colores_principales = $request->colores_principales;
            $empresas->descripcion = $request->descripcion;
            $empresas->activo = $request->activo;
            $empresas->save();
            return response()->json(['message' => 'Empresa creada correctamente.', 'empresa' => $empresas, 'status' => 'success']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function show(Empresas $empresas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresas $empresas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresas $empresas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresas $empresas)
    {
        //
    }
}
