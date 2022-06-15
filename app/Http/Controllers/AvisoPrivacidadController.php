<?php

namespace App\Http\Controllers;

use App\AvisoPrivacidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AvisoPrivacidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.aviso-privacidad.index');
    }

    public function mostrarAviso()
    {
        $aviso = AvisoPrivacidad::first();
        return response()->json($aviso);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\AvisoPrivacidad  $avisoPrivacidad
     * @return \Illuminate\Http\Response
     */
    public function show(AvisoPrivacidad $avisoPrivacidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AvisoPrivacidad  $avisoPrivacidad
     * @return \Illuminate\Http\Response
     */
    public function edit(AvisoPrivacidad $avisoPrivacidad)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AvisoPrivacidad  $avisoPrivacidad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'aviso' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages()
            ]);
        }else{
            $aviso = AvisoPrivacidad::find($id);
            $aviso->aviso = $request->aviso;
            $aviso->save();
            return response()->json(['message' => 'Aviso actualizado correctamente.', 'aviso' => $aviso, 'status' => 200]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AvisoPrivacidad  $avisoPrivacidad
     * @return \Illuminate\Http\Response
     */
    public function destroy(AvisoPrivacidad $avisoPrivacidad)
    {
        //
    }
}
