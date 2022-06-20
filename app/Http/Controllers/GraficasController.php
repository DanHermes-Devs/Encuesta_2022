<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Graficas;
use App\Registro;
use Illuminate\Http\Request;

class GraficasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Empresas registradas
        $empresas = Empresas::all();

        return view('admin.graficas.index', compact('empresas'));
    }

    public function empresas()
    {
        // Sexo
        $sexoMasculino = Registro::select('sexo')->where('sexo', 'Masculino')->count();
        $sexoFemenino = Registro::select('sexo')->where('sexo', 'Femenino')->count();

        // Estado civil
        $estadoCivilSoltero = Registro::select('estado_civil')->where('estado_civil', 'Soltero(a)')->count();
        $estadoCivilCasado = Registro::select('estado_civil')->where('estado_civil', 'Casado(a)')->count();
        $estadoCivilDivorciado = Registro::select('estado_civil')->where('estado_civil', 'Divorciado')->count();
        $estadoCivilViudo = Registro::select('estado_civil')->where('estado_civil', 'Viudo')->count();
        $estadoUnionLibre = Registro::select('estado_civil')->where('estado_civil', 'Unión libre')->count();
        $estadoOtro = Registro::select('estado_civil')->where('estado_civil', 'Otro')->count();

        // Edad
        $edad18 = Registro::select('edad')->where('edad', 'Menos de 18 años')->count();
        $edad18_25 = Registro::select('edad')->where('edad', '18-25 años')->count();
        $edad26_30 = Registro::select('edad')->where('edad', '26-30 años')->count();
        $edad31_35 = Registro::select('edad')->where('edad', '31-35 años')->count();
        $edad36_40 = Registro::select('edad')->where('edad', '36-40 años')->count();
        $edad41_45 = Registro::select('edad')->where('edad', '41-45 años')->count();
        $edad46_50 = Registro::select('edad')->where('edad', '46-50 años')->count();
        $edad51_55 = Registro::select('edad')->where('edad', '51-55 años')->count();
        $edad56_60 = Registro::select('edad')->where('edad', '56-60 años')->count();
        $edad61_65 = Registro::select('edad')->where('edad', '61-65 años')->count();
        $edad66_70 = Registro::select('edad')->where('edad', '66-70 años')->count();
        $edad70 = Registro::select('edad')->where('edad', 'Más de 70 años')->count();

        // Estudios
        $estudiosPrimaria = Registro::select('estudios')->where('estudios', 'Primaria')->count();
        $estudiosSecundaria = Registro::select('estudios')->where('estudios', 'Secundaria')->count();
        $estudiosPreparatoria = Registro::select('estudios')->where('estudios', 'Preparatoria')->count();
        $estudiosTecSuperior = Registro::select('estudios')->where('estudios', 'Tec. Superior')->count();
        $estudiosLicenciatura = Registro::select('estudios')->where('estudios', 'Licenciatura')->count();
        $estudiosMaestría = Registro::select('estudios')->where('estudios', 'Maestría')->count();
        $estudiosDoctorado = Registro::select('estudios')->where('estudios', 'Doctorado')->count();

        // Antiguedad
        $antiguedad1 = Registro::select('antiguedad')->where('antiguedad', 'Menos de 1 año')->count();
        $antiguedad2 = Registro::select('antiguedad')->where('antiguedad', '1-5 años')->count();
        $antiguedad3 = Registro::select('antiguedad')->where('antiguedad', '6-10 años')->count();
        $antiguedad4 = Registro::select('antiguedad')->where('antiguedad', '11-15 años')->count();
        $antiguedad5 = Registro::select('antiguedad')->where('antiguedad', '16-20 años')->count();
        $antiguedad6 = Registro::select('antiguedad')->where('antiguedad', '21-25 años')->count();
        $antiguedad7 = Registro::select('antiguedad')->where('antiguedad', 'Más de 25 años')->count();

        // Experiencia
        $experiencia1 = Registro::select('experiencia_laboral')->where('experiencia_laboral', 'Menos de 1 año')->count();
        $experiencia2 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '1-5 años')->count();
        $experiencia3 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '6-10 años')->count();
        $experiencia4 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '11-15 años')->count();
        $experiencia5 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '16-20 años')->count();
        $experiencia6 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '21-25 años')->count();
        $experiencia7 = Registro::select('experiencia_laboral')->where('experiencia_laboral', 'Más de 25 años')->count();
    
        $data = [
            'sexoMasculino' => $sexoMasculino,
            'sexoFemenino' => $sexoFemenino,
            'estadoCivilSoltero' => $estadoCivilSoltero,
            'estadoCivilCasado' => $estadoCivilCasado,
            'estadoCivilDivorciado' => $estadoCivilDivorciado,
            'estadoCivilViudo' => $estadoCivilViudo,
            'estadoUnionLibre' => $estadoUnionLibre,
            'estadoOtro' => $estadoOtro,
            'edad18' => $edad18,
            'edad18_25' => $edad18_25,
            'edad26_30' => $edad26_30,
            'edad31_35' => $edad31_35,
            'edad36_40' => $edad36_40,
            'edad41_45' => $edad41_45,
            'edad46_50' => $edad46_50,
            'edad51_55' => $edad51_55,
            'edad56_60' => $edad56_60,
            'edad61_65' => $edad61_65,
            'edad66_70' => $edad66_70,
            'edad70' => $edad70,
            'estudiosPrimaria' => $estudiosPrimaria,
            'estudiosSecundaria' => $estudiosSecundaria,
            'estudiosPreparatoria' => $estudiosPreparatoria,
            'estudiosTecSuperior' => $estudiosTecSuperior,
            'estudiosLicenciatura' => $estudiosLicenciatura,
            'estudiosMaestría' => $estudiosMaestría,
            'estudiosDoctorado' => $estudiosDoctorado,
            'antiguedad1' => $antiguedad1,
            'antiguedad2' => $antiguedad2,
            'antiguedad3' => $antiguedad3,
            'antiguedad4' => $antiguedad4,
            'antiguedad5' => $antiguedad5,
            'antiguedad6' => $antiguedad6,
            'antiguedad7' => $antiguedad7,
            'experiencia1' => $experiencia1,
            'experiencia2' => $experiencia2,
            'experiencia3' => $experiencia3,
            'experiencia4' => $experiencia4,
            'experiencia5' => $experiencia5,
            'experiencia6' => $experiencia6,
            'experiencia7' => $experiencia7,
        ];

        return response()->json($data);
    }

    // Filtrar por empresa
    public function filtrarEmpresa($id)
    {

        if($id == -1){
            // Sexo
            $sexoMasculino = Registro::select('sexo')->where('sexo', 'Masculino')->count();
            $sexoFemenino = Registro::select('sexo')->where('sexo', 'Femenino')->count();

            // Estado civil
            $estadoCivilSoltero = Registro::select('estado_civil')->where('estado_civil', 'Soltero(a)')->count();
            $estadoCivilCasado = Registro::select('estado_civil')->where('estado_civil', 'Casado(a)')->count();
            $estadoCivilDivorciado = Registro::select('estado_civil')->where('estado_civil', 'Divorciado')->count();
            $estadoCivilViudo = Registro::select('estado_civil')->where('estado_civil', 'Viudo')->count();
            $estadoUnionLibre = Registro::select('estado_civil')->where('estado_civil', 'Unión libre')->count();
            $estadoOtro = Registro::select('estado_civil')->where('estado_civil', 'Otro')->count();

            // Edad
            $edad18 = Registro::select('edad')->where('edad', 'Menos de 18 años')->count();
            $edad18_25 = Registro::select('edad')->where('edad', '18-25 años')->count();
            $edad26_30 = Registro::select('edad')->where('edad', '26-30 años')->count();
            $edad31_35 = Registro::select('edad')->where('edad', '31-35 años')->count();
            $edad36_40 = Registro::select('edad')->where('edad', '36-40 años')->count();
            $edad41_45 = Registro::select('edad')->where('edad', '41-45 años')->count();
            $edad46_50 = Registro::select('edad')->where('edad', '46-50 años')->count();
            $edad51_55 = Registro::select('edad')->where('edad', '51-55 años')->count();
            $edad56_60 = Registro::select('edad')->where('edad', '56-60 años')->count();
            $edad61_65 = Registro::select('edad')->where('edad', '61-65 años')->count();
            $edad66_70 = Registro::select('edad')->where('edad', '66-70 años')->count();
            $edad70 = Registro::select('edad')->where('edad', 'Más de 70 años')->count();

            // Estudios
            $estudiosPrimaria = Registro::select('estudios')->where('estudios', 'Primaria')->count();
            $estudiosSecundaria = Registro::select('estudios')->where('estudios', 'Secundaria')->count();
            $estudiosPreparatoria = Registro::select('estudios')->where('estudios', 'Preparatoria')->count();
            $estudiosTecSuperior = Registro::select('estudios')->where('estudios', 'Tec. Superior')->count();
            $estudiosLicenciatura = Registro::select('estudios')->where('estudios', 'Licenciatura')->count();
            $estudiosMaestría = Registro::select('estudios')->where('estudios', 'Maestría')->count();
            $estudiosDoctorado = Registro::select('estudios')->where('estudios', 'Doctorado')->count();

            // Antiguedad
            $antiguedad1 = Registro::select('antiguedad')->where('antiguedad', 'Menos de 1 año')->count();
            $antiguedad2 = Registro::select('antiguedad')->where('antiguedad', '1-5 años')->count();
            $antiguedad3 = Registro::select('antiguedad')->where('antiguedad', '6-10 años')->count();
            $antiguedad4 = Registro::select('antiguedad')->where('antiguedad', '11-15 años')->count();
            $antiguedad5 = Registro::select('antiguedad')->where('antiguedad', '16-20 años')->count();
            $antiguedad6 = Registro::select('antiguedad')->where('antiguedad', '21-25 años')->count();
            $antiguedad7 = Registro::select('antiguedad')->where('antiguedad', 'Más de 25 años')->count();

            // Experiencia
            $experiencia1 = Registro::select('experiencia_laboral')->where('experiencia_laboral', 'Menos de 1 año')->count();
            $experiencia2 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '1-5 años')->count();
            $experiencia3 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '6-10 años')->count();
            $experiencia4 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '11-15 años')->count();
            $experiencia5 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '16-20 años')->count();
            $experiencia6 = Registro::select('experiencia_laboral')->where('experiencia_laboral', '21-25 años')->count();
            $experiencia7 = Registro::select('experiencia_laboral')->where('experiencia_laboral', 'Más de 25 años')->count();
        
            $data = [
                'sexoMasculino' => $sexoMasculino,
                'sexoFemenino' => $sexoFemenino,
                'estadoCivilSoltero' => $estadoCivilSoltero,
                'estadoCivilCasado' => $estadoCivilCasado,
                'estadoCivilDivorciado' => $estadoCivilDivorciado,
                'estadoCivilViudo' => $estadoCivilViudo,
                'estadoUnionLibre' => $estadoUnionLibre,
                'estadoOtro' => $estadoOtro,
                'edad18' => $edad18,
                'edad18_25' => $edad18_25,
                'edad26_30' => $edad26_30,
                'edad31_35' => $edad31_35,
                'edad36_40' => $edad36_40,
                'edad41_45' => $edad41_45,
                'edad46_50' => $edad46_50,
                'edad51_55' => $edad51_55,
                'edad56_60' => $edad56_60,
                'edad61_65' => $edad61_65,
                'edad66_70' => $edad66_70,
                'edad70' => $edad70,
                'estudiosPrimaria' => $estudiosPrimaria,
                'estudiosSecundaria' => $estudiosSecundaria,
                'estudiosPreparatoria' => $estudiosPreparatoria,
                'estudiosTecSuperior' => $estudiosTecSuperior,
                'estudiosLicenciatura' => $estudiosLicenciatura,
                'estudiosMaestría' => $estudiosMaestría,
                'estudiosDoctorado' => $estudiosDoctorado,
                'antiguedad1' => $antiguedad1,
                'antiguedad2' => $antiguedad2,
                'antiguedad3' => $antiguedad3,
                'antiguedad4' => $antiguedad4,
                'antiguedad5' => $antiguedad5,
                'antiguedad6' => $antiguedad6,
                'antiguedad7' => $antiguedad7,
                'experiencia1' => $experiencia1,
                'experiencia2' => $experiencia2,
                'experiencia3' => $experiencia3,
                'experiencia4' => $experiencia4,
                'experiencia5' => $experiencia5,
                'experiencia6' => $experiencia6,
                'experiencia7' => $experiencia7,
            ];

            return response()->json($data);
        }else{
            $empresa = Empresas::where('id', $id)->first();
            $sexoMasculino = Registro::with('empresas')->where('id_empresa', $id)->where('sexo', 'Masculino')->count();
            // Sexo
            $sexoMasculino = Registro::with('empresas')->where('id_empresa', $id)->where('sexo', 'Masculino')->count();
            $sexoFemenino = Registro::with('empresas')->where('id_empresa', $id)->where('sexo', 'Femenino')->count();

            // Estado civil
            $estadoCivilSoltero = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Soltero(a)')->count();
            $estadoCivilCasado = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Casado(a)')->count();
            $estadoCivilDivorciado = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Divorciado')->count();
            $estadoCivilViudo = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Viudo')->count();
            $estadoUnionLibre = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Unión libre')->count();
            $estadoOtro = Registro::with('empresas')->where('id_empresa', $id)->where('estado_civil', 'Otro')->count();

            // Edad
            $edad18 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', 'Menos de 18 años')->count();
            $edad18_25 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '18-25 años')->count();
            $edad26_30 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '26-30 años')->count();
            $edad31_35 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '31-35 años')->count();
            $edad36_40 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '36-40 años')->count();
            $edad41_45 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '41-45 años')->count();
            $edad46_50 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '46-50 años')->count();
            $edad51_55 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '51-55 años')->count();
            $edad56_60 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '56-60 años')->count();
            $edad61_65 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '61-65 años')->count();
            $edad66_70 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', '66-70 años')->count();
            $edad70 = Registro::with('empresas')->where('id_empresa', $id)->where('edad', 'Más de 70 años')->count();

            // Estudios
            $estudiosPrimaria = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Primaria')->count();
            $estudiosSecundaria = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Secundaria')->count();
            $estudiosPreparatoria = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Preparatoria')->count();
            $estudiosTecSuperior = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Tec. Superior')->count();
            $estudiosLicenciatura = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Licenciatura')->count();
            $estudiosMaestría = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Maestría')->count();
            $estudiosDoctorado = Registro::with('empresas')->where('id_empresa', $id)->where('estudios', 'Doctorado')->count();

            // Antiguedad
            $antiguedad1 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', 'Menos de 1 año')->count();
            $antiguedad2 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', '1-5 años')->count();
            $antiguedad3 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', '6-10 años')->count();
            $antiguedad4 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', '11-15 años')->count();
            $antiguedad5 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', '16-20 años')->count();
            $antiguedad6 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', '21-25 años')->count();
            $antiguedad7 = Registro::with('empresas')->where('id_empresa', $id)->where('antiguedad', 'Más de 25 años')->count();

            // Experiencia
            $experiencia1 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', 'Menos de 1 año')->count();
            $experiencia2 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', '1-5 años')->count();
            $experiencia3 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', '6-10 años')->count();
            $experiencia4 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', '11-15 años')->count();
            $experiencia5 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', '16-20 años')->count();
            $experiencia6 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', '21-25 años')->count();
            $experiencia7 = Registro::with('empresas')->where('id_empresa', $id)->where('experiencia_laboral', 'Más de 25 años')->count();

            $data = [
                'empresa' => $empresa,
                'sexoMasculino' => $sexoMasculino,
                'sexoFemenino' => $sexoFemenino,
                'estadoCivilSoltero' => $estadoCivilSoltero,
                'estadoCivilCasado' => $estadoCivilCasado,
                'estadoCivilDivorciado' => $estadoCivilDivorciado,
                'estadoCivilViudo' => $estadoCivilViudo,
                'estadoUnionLibre' => $estadoUnionLibre,
                'estadoOtro' => $estadoOtro,
                'edad18' => $edad18,
                'edad18_25' => $edad18_25,
                'edad26_30' => $edad26_30,
                'edad31_35' => $edad31_35,
                'edad36_40' => $edad36_40,
                'edad41_45' => $edad41_45,
                'edad46_50' => $edad46_50,
                'edad51_55' => $edad51_55,
                'edad56_60' => $edad56_60,
                'edad61_65' => $edad61_65,
                'edad66_70' => $edad66_70,
                'edad70' => $edad70,
                'estudiosPrimaria' => $estudiosPrimaria,
                'estudiosSecundaria' => $estudiosSecundaria,
                'estudiosPreparatoria' => $estudiosPreparatoria,
                'estudiosTecSuperior' => $estudiosTecSuperior,
                'estudiosLicenciatura' => $estudiosLicenciatura,
                'estudiosMaestría' => $estudiosMaestría,
                'estudiosDoctorado' => $estudiosDoctorado,
                'antiguedad1' => $antiguedad1,
                'antiguedad2' => $antiguedad2,
                'antiguedad3' => $antiguedad3,
                'antiguedad4' => $antiguedad4,
                'antiguedad5' => $antiguedad5,
                'antiguedad6' => $antiguedad6,
                'antiguedad7' => $antiguedad7,
                'experiencia1' => $experiencia1,
                'experiencia2' => $experiencia2,
                'experiencia3' => $experiencia3,
                'experiencia4' => $experiencia4,
                'experiencia5' => $experiencia5,
                'experiencia6' => $experiencia6,
                'experiencia7' => $experiencia7,
            ];
            
            return response()->json($data);
        }
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
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function show(Graficas $graficas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function edit(Graficas $graficas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Graficas $graficas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Graficas  $graficas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Graficas $graficas)
    {
        //
    }
}
