<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Registro;
use App\Calificaciones;
use App\AvisoPrivacidad;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\RegistroExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class RegistroController extends Controller
{

    public function index($token){
        // Empresa activa
        $empresa = Empresas::where('token', $token)->where('activo', 1)->first();
        $aviso = AvisoPrivacidad::first();
        return view('index', compact('empresa', 'token', 'aviso'));
    }

    public function registroDatos(Request $request)
    {
        // dd($request->all());
        // setcookie("cookieCalificaciones", $request->token, time()+36000);
        $registro = Registro::create($request->all());

        // Obtener id del registro realizado
        $id_registro = $registro->id;

        $calificaciones = new Calificaciones;
        $calificaciones->c_final = $request->item_1+$request->item_2+$request->item_3+$request->item_4+$request->item_5+$request->item_6+$request->item_7+$request->item_8+$request->item_9+$request->item_10+$request->item_11+$request->item_12+$request->item_13+$request->item_14+$request->item_15+$request->item_16+$request->item_17+$request->item_18+$request->item_19+$request->item_20+$request->item_21+$request->item_22+$request->item_23+$request->item_24+$request->item_25+$request->item_26+$request->item_27+$request->item_28+$request->item_29+$request->item_30+$request->item_31+$request->item_32+$request->item_33+$request->item_34+$request->item_35+$request->item_36+$request->item_37+$request->item_38+$request->item_39+$request->item_40+$request->item_41+$request->item_42+$request->item_43+$request->item_44+$request->item_45+$request->item_46+$request->item_47+$request->item_48+$request->item_49+$request->item_50+$request->item_51+$request->item_52+$request->item_53+$request->item_54+$request->item_55+$request->item_56+$request->item_57+$request->item_58+$request->item_59+$request->item_60+$request->item_61+$request->item_62+$request->item_63+$request->item_64+$request->item_65+$request->item_66+$request->item_67+$request->item_68+$request->item_69+$request->item_70+$request->item_71+$request->item_72;

        // Ambiente de trabajo
        $Atrabajo = $request->item_1+$request->item_2+$request->item_3+$request->item_4+$request->item_5;

        // Factores propios de la actividad
        $Fpropios = $request->item_1+$request->item_2+$request->item_3+$request->item_4+$request->item_5+$request->item_6+$request->item_7+$request->item_8+$request->item_9+$request->item_10+$request->item_11+$request->item_12+$request->item_13+$request->item_14+$request->item_15+$request->item_16+$request->item_23+$request->item_24+$request->item_25+$request->item_26+$request->item_27+$request->item_28+$request->item_29+$request->item_30+$request->item_35+$request->item_36+$request->item_65+$request->item_66+$request->item_67+$request->item_68;

        // Organización del tiempo de trabajo
        $Otiempo = $request->item_17+$request->item_18+$request->item_19+$request->item_20+$request->item_21+$request->item_22;

        // Liderazgo y relaciones en el trabajo
        $Lrelaciones = $request->item_31+$request->item_32+$request->item_33+$request->item_34+$request->item_35+$request->item_36+$request->item_37+$request->item_38+$request->item_39+$request->item_40+$request->item_41+$request->item_42+$request->item_43+$request->item_44+$request->item_45+$request->item_46+$request->item_57+$request->item_58+$request->item_59+$request->item_60+$request->item_61+$request->item_62+$request->item_63+$request->item_64+$request->item_65+$request->item_66+$request->item_67+$request->item_68+$request->item_69+$request->item_70+$request->item_71+$request->item_72;

        // Entorno organizacional
        $Eorganizacional = $request->item_47+$request->item_48+$request->item_49+$request->item_50+$request->item_51+$request->item_52+$request->item_53+$request->item_54+$request->item_55+$request->item_56;

        // Condiciones en el ambiente de trabajo
        $Cambiente = $request->item_1+$request->item_2+$request->item_3+$request->item_4+$request->item_5;

        // Carga de trabajo
        $Ctrabajo = $request->item_6+$request->item_7+$request->item_8+$request->item_9+$request->item_10+$request->item_11+$request->item_12+$request->item_13+$request->item_14+$request->item_15+$request->item_16+$request->item_65+$request->item_66+$request->item_67+$request->item_68;

        // Falta de control sobre el trabajo
        $Fcontrol = $request->item_23+$request->item_24+$request->item_25+$request->item_26+$request->item_27+$request->item_28+$request->item_29+$request->item_30+$request->item_35+$request->item_36;

        // Jornada de trabajo
        $Jtrabajo = $request->item_17+$request->item_18;

        // Interferencia en la relación trabajo-familia
        $Irelacion = $request->item_19+$request->item_20+$request->item_21+$request->item_22;

        // Liderazgo
        $Liderazgo = $request->item_31+$request->item_32+$request->item_33+$request->item_34+$request->item_37+$request->item_38+$request->item_39+$request->item_40+$request->item_41;

        // Relaciones en el trabajo
        $Rtrabajo = $request->item_42+$request->item_43+$request->item_44+$request->item_45+$request->item_46+$request->item_69+$request->item_70+$request->item_71+$request->item_72;

        // Violencia
        $Violencia = $request->item_57+$request->item_58+$request->item_59+$request->item_60+$request->item_61+$request->item_62+$request->item_63+$request->item_64;

        // Reconocimiento del desempeño
        $Rdesempeño = $request->item_47+$request->item_48+$request->item_49+$request->item_50+$request->item_51+$request->item_52;

        // Insuficiente sentido de pertenencia e, inestabilidad
        $Ipertenencia = $request->item_53+$request->item_54+$request->item_55+$request->item_56;

        // Condiciones peligrosas e inseguras
        $Cpeligrosas = $request->item_1+$request->item_3;

        // Condiciones deficientes e insalubres
        $Cdeficientes = $request->item_2+$request->item_4;

        // Trabajos peligrosos 2
        $Tpeligrosos = $request->item_5;

        // Cargas cuantitativas
        $Ccuantitativa = $request->item_6+$request->item_12;

        // Ritmos de trabajo acelerado
        $Rtrabajoacelerado = $request->item_7+$request->item_8;

        // Carga mental
        $Cmental = $request->item_9+$request->item_10+$request->item_11;

        // Cargas psicológicas emocionales
        $Cpsicologica = $request->item_65+$request->item_66+$request->item_67+$request->item_68;

        // Cargas de alta responsabilidad
        $Calta = $request->item_13+$request->item_14;

        // Cargas contradictorias o inconsistentes
        $Ccontradictorias = $request->item_15+$request->item_16;

        // Falta de control y autonomía sobre el trabajo
        $Fcontrolautonomia = $request->item_25+$request->item_26+$request->item_27+$request->item_28;

        // Limitada o nula posibilidad de desarrollo
        $Ldesarrollo = $request->item_23+$request->item_24;

        // Insuficiente participación y manejo del cambio
        $Iparticipacion = $request->item_29+$request->item_30;

        // Limitada o inexistente capacitación
        $Lcapacitacion = $request->item_35+$request->item_36;

        // Jornadas de trabajo extensas
        $Jextensas = $request->item_17+$request->item_18;

        // Influencia del trabajo fuera del centro laboral
        $Itrabajofuera = $request->item_19+$request->item_20;

        // Influencia de las responsabilidades familiares
        $Iresponsabilidades = $request->item_21+$request->item_22;

        // Escaza claridad de funciones
        $Eclaridad = $request->item_31+$request->item_32+$request->item_33+$request->item_34;

        // Características del liderazgo
        $Caracteristicas = $request->item_37+$request->item_38+$request->item_39+$request->item_40+$request->item_41;

        // Relaciones sociales en el trabajo
        $Rsociales = $request->item_42+$request->item_43+$request->item_44+$request->item_45+$request->item_46;

        // Deficiente relación con los colaboradores que supervisa
        $Drelaciones = $request->item_69+$request->item_70+$request->item_71+$request->item_72;

        // Violencia laboral
        $ViolenciaLaboral = $request->item_57+$request->item_58+$request->item_59+$request->item_60+$request->item_61+$request->item_62+$request->item_63+$request->item_64;

        // Escasa o nula retroalimentación del desempeño
        $Eretroalimentacion = $request->item_47+$request->item_48;

        // Escaso o nulo reconocimiento y compensación
        $Ereconocimiento = $request->item_49+$request->item_50+$request->item_51+$request->item_52;

        // Limitado sentido de pertenencia
        $Lpertenencia = $request->item_55+$request->item_56;

        // Inestabilidad laboral
        $Iestabilidad = $request->item_53+$request->item_54;

        // Token empresa
        $tokenEmpresa = $request->id_empresa;
        $calificaciones->id_empresa = $tokenEmpresa;
        $calificaciones->id_registro = $id_registro;
        // Categorias
        $calificaciones->c_cat_1 = $Atrabajo;
        $calificaciones->c_cat_2 = $Fpropios;
        $calificaciones->c_cat_3 = $Otiempo;
        $calificaciones->c_cat_4 = $Lrelaciones;
        $calificaciones->c_cat_5 = $Eorganizacional;
        $calificaciones->c_cat_6 = $Caracteristicas;
        $calificaciones->c_cat_7 = $Rsociales;

        // Dominio
        $calificaciones->c_dominio_1 = $Cambiente;
        $calificaciones->c_dominio_2 = $Ctrabajo;
        $calificaciones->c_dominio_3 = $Fcontrol;
        $calificaciones->c_dominio_4 = $Jtrabajo;
        $calificaciones->c_dominio_5 = $Irelacion;
        $calificaciones->c_dominio_6 = $Liderazgo;
        $calificaciones->c_dominio_7 = $Rtrabajo;
        $calificaciones->c_dominio_8 = $Violencia;
        $calificaciones->c_dominio_9 = $Rdesempeño;
        $calificaciones->c_dominio_10 = $Ipertenencia;

        // Dimension
        $calificaciones->c_dimension_1 = $Cpeligrosas;
        $calificaciones->c_dimension_2 = $Cdeficientes;
        $calificaciones->c_dimension_3 = $Tpeligrosos;
        $calificaciones->c_dimension_4 = $Ccuantitativa;
        $calificaciones->c_dimension_5 = $Rtrabajoacelerado;
        $calificaciones->c_dimension_6 = $Cmental;
        $calificaciones->c_dimension_7 = $Cpsicologica;
        $calificaciones->c_dimension_8 = $Calta;
        $calificaciones->c_dimension_9 = $Ccontradictorias;
        $calificaciones->c_dimension_10 = $Fcontrolautonomia;
        $calificaciones->c_dimension_11 = $Ldesarrollo;
        $calificaciones->c_dimension_12 = $Iparticipacion;
        $calificaciones->c_dimension_13 = $Lcapacitacion;
        $calificaciones->c_dimension_14 = $Jextensas;
        $calificaciones->c_dimension_15 = $Itrabajofuera;
        $calificaciones->c_dimension_16 = $Iresponsabilidades;
        $calificaciones->c_dimension_17 = $Eclaridad;
        $calificaciones->c_dimension_18 = $Drelaciones;
        $calificaciones->c_dimension_19 = $ViolenciaLaboral;
        $calificaciones->c_dimension_20 = $Eretroalimentacion;
        $calificaciones->c_dimension_21 = $Ereconocimiento;
        $calificaciones->c_dimension_22 = $Lpertenencia;
        $calificaciones->c_dimension_23 = $Iestabilidad;

        $calificaciones->save();

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
            $registros = Registro::with('empresa')->get();
            return DataTables()->of($registros)
                ->make(true);
        }
        return view('admin.registros.index');
    }

    // Exportar registros generales
    public function export()
    {
        return Excel::download(new RegistroExport, "Registros-".date("Y-m-d H:i:s").".xlsx");
    }
    
}