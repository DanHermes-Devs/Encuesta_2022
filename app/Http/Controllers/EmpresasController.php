<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Registro;
use App\Calificaciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
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
        $empresas = Empresas::all();

        if (request()->ajax()) {
            return DataTables()
                ->of($empresas)
                ->addColumn('action', 'admin.empresas.actions')
                ->rawColumns(['action'])
                ->toJson();
        }

        return view('admin.empresas.index')->with('empresas', Empresas::all());
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
        $messages = [
            // Validar campos
            'nombre.required' => 'El nombre de la empresa es requerido',
            'logo.required' => 'El logo de la empresa es requerido',
            'imagen_fondo.required' => 'La imagen de fondo de la empresa es requerido',
            'logo.mimes' => 'El logo de la empresa debe ser de tipo jpeg, png o jpg',
            'imagen_fondo.mimes' => 'La imagen de fondo debe ser de tipo jpeg, png o jpg',
            'descripcion.required' => 'La descripcion de la empresa es requerido'
        ];
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nombre' => 'required',
            'logo' => 'required|mimes:jpeg,png,jpg|max:2048',
            'imagen_fondo' => 'required|mimes:jpeg,png,jpg|max:2048',
            'descripcion' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors(), 'status'=>'failed']);
        }else {
            $logo = $request->logo->store('logos', 'public');
            $img_1 = Image::make(public_path("storage/{$logo}"))->fit(300, 300);
            $img_1->save();

            $img_fondo = $request->imagen_fondo->store('imagenes_fondo', 'public');
            $img_2 = Image::make(public_path("storage/{$img_fondo}"))->fit(1920, 1080);
            $img_2->save();

            $empresas = new Empresas;
            $empresas->token = $request->token;
            $empresas->nombre = $request->nombre;
            $empresas->logo = $logo;
            $empresas->imagen_fondo = $img_fondo;
            $empresas->colores_principales = $request->colores_principales;
            $empresas->descripcion = $request->descripcion;
            $empresas->activo = $request->activo;
            $empresas->aviso = $request->aviso;
            if(isset($request->tipo_puesto)){
                $tipo_puesto = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->tipo_puesto; $i++){
                    array_push($tipo_puesto, $_POST['summaryPuesto_'.$i]);
                }
            }
            $empresas->tipo_puesto = json_encode($tipo_puesto);
            if(isset($request->area)){
                $area = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->area; $i++){
                    array_push($area, $_POST['summaryArea_'.$i]);
                }
            }
            $empresas->area = json_encode($area);
            $empresas->tipo_puesto = json_encode($tipo_puesto);
            if(isset($request->tipo_contratacion)){
                $tipo_contratacion = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->tipo_contratacion; $i++){
                    array_push($tipo_contratacion, $_POST['summaryContratacion_'.$i]);
                }
            }
            $empresas->tipo_contratacion = json_encode($tipo_contratacion);
            if(isset($request->jornada_trabajo)){
                $jornada_trabajo = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->jornada_trabajo; $i++){
                    array_push($jornada_trabajo, $_POST['summaryJornada_'.$i]);
                }
            }
            $empresas->jornada_trabajo = json_encode($jornada_trabajo);
            if(isset($request->rotacion_turnos)){
                $rotacion_turnos = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->rotacion_turnos; $i++){
                    array_push($rotacion_turnos, $_POST['summaryRotacion_'.$i]);
                }
            }
            $empresas->rotacion_turnos = json_encode($rotacion_turnos);
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
    public function edit($id)
    {
        $empresas = Empresas::find($id);
        if($empresas){
            return view('admin.empresas.edit')->with('empresas', $empresas);
        }else{
            return response()->json(['message' => 'Empresa no encontrada.', 'status' => 'failed']);
        }
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
        // Enoncontrar empresa primero
        $empresas = Empresas::find($request->id);
        $messages = [
            // Validar campos
            'nombre.required' => 'El nombre de la empresa es requerido',
            'descripcion.required' => 'La descripcion de la empresa es requerido'
        ];
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nombre' => 'required',
            'logo' => 'image:jpeg,png,jpg|max:2048',
            'imagen_fondo' => 'image:jpeg,png,jpg|max:2048',
            'descripcion' => 'required',
        ], $messages);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors(), 'status'=>'failed']);
        }else {
            if(request('logo')){
                $logo = $request->logo->store('logos', 'public');
                $img_1 = Image::make(public_path("storage/{$logo}"))->fit(300, 300);
                $img_1->save();
                $empresas->logo = $logo;
            }

            if(request('imagen_fondo')){
                $img_fondo = $request->imagen_fondo->store('imagenes_fondo', 'public');
                $img_2 = Image::make(public_path("storage/{$img_fondo}"))->fit(1920, 1080);
                $img_2->save();
                $empresas->imagen_fondo = $img_fondo;
            }
            $empresas->token = $request->token;
            $empresas->nombre = $request->nombre;
            $empresas->colores_principales = $request->colores_principales;
            $empresas->descripcion = $request->descripcion;
            $empresas->activo = $request->activo;
            $empresas->aviso = $request->aviso;
            if(isset($request->tipo_puesto)){
                $tipo_puesto = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->tipo_puesto; $i++){
                    array_push($tipo_puesto, $_POST['summaryPuesto_'.$i]);
                }
            }
            $empresas->tipo_puesto = json_encode($tipo_puesto);
            if(isset($request->area)){
                $area = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->area; $i++){
                    array_push($area, $_POST['summaryArea_'.$i]);
                }
            }
            $empresas->area = json_encode($area);
            $empresas->tipo_puesto = json_encode($tipo_puesto);
            if(isset($request->tipo_contratacion)){
                $tipo_contratacion = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->tipo_contratacion; $i++){
                    array_push($tipo_contratacion, $_POST['summaryContratacion_'.$i]);
                }
            }
            $empresas->tipo_contratacion = json_encode($tipo_contratacion);
            if(isset($request->jornada_trabajo)){
                $jornada_trabajo = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->jornada_trabajo; $i++){
                    array_push($jornada_trabajo, $_POST['summaryJornada_'.$i]);
                }
            }
            $empresas->jornada_trabajo = json_encode($jornada_trabajo);
            if(isset($request->rotacion_turnos)){
                $rotacion_turnos = array();
                // Recorrer con un ciclo for para obtener los valores
                for($i = 0; $i < $request->rotacion_turnos; $i++){
                    array_push($rotacion_turnos, $_POST['summaryRotacion_'.$i]);
                }
            }
            $empresas->rotacion_turnos = json_encode($rotacion_turnos);
            $empresas->save();
            // Mandar mensaje flash en la vista con el mensaje de que se ha actualizado correctamente
            
            // return view('admin.empresas.edit')->with(['empresas' => $empresas, 'message' => 'Empresa actualizada correctamente.', 'status' => 'success']);
            return redirect()->route('empresas.edit', $empresas->id)->with(['empresas' => $empresas, 'update' => 'Empresa actualizada correctamente.', 'status' => 'success']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empresas  $empresas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $empresas = Empresas::find($id);
        $empresas->delete();

        // Eliminar el logotipo
        $imagen_path = public_path("storage/" . $empresas->logo);
        if(File::exists($imagen_path)){
            unlink($imagen_path);
        }

        // Eliminar la imagen de fondo
        $imagen_path_2 = public_path("storage/" . $empresas->imagen_fondo );
        if(File::exists($imagen_path_2)){
            unlink($imagen_path_2);
        }
        return response()->json(['message' => 'Empresa eliminada correctamente.', 'status' => 'success']);
    }

    // Ver pagina para las graficas restantes
    public function getGraficas($id)
    {
        $registros = Registro::where('id_empresa', $id)->with('empresa')->get();

        $estudios = Registro::where('id_empresa', $id)->get();

        $NombreEmpresa = Registro::where('id_empresa', $id)->with('empresa')->first();
        $c_final = DB::table('registros')->selectRaw('SUM(item_1) + SUM(item_2) + SUM(item_3) + SUM(item_4) + SUM(item_5) + SUM(item_6) + SUM(item_7) + SUM(item_8) + SUM(item_9) + SUM(item_10) + 
        SUM(item_11) + SUM(item_12) + SUM(item_13) + SUM(item_14) + SUM(item_15) + SUM(item_16) + SUM(item_17) + SUM(item_18) + SUM(item_19) + SUM(item_20) + 
        SUM(item_21) + SUM(item_22) + SUM(item_23) + SUM(item_24) + SUM(item_25) + SUM(item_26) + SUM(item_27) + SUM(item_28) + SUM(item_29) + SUM(item_30) + 
        SUM(item_31) + SUM(item_32) + SUM(item_33) + SUM(item_34) + SUM(item_35) + SUM(item_36) + SUM(item_37) + SUM(item_38) + SUM(item_39) + SUM(item_40) + 
        SUM(item_41) + SUM(item_42) + SUM(item_43) + SUM(item_44) + SUM(item_45) + SUM(item_46) + SUM(item_47) + SUM(item_48) + SUM(item_49) + SUM(item_50) + 
        SUM(item_51) + SUM(item_52) + SUM(item_53) + SUM(item_54) + SUM(item_55) + SUM(item_56) + SUM(item_57) + SUM(item_58) + SUM(item_59) + SUM(item_60) + 
        SUM(item_61) + SUM(item_62) + SUM(item_63) + SUM(item_64) + SUM(item_65) + SUM(item_66) + SUM(item_67) + SUM(item_68) + SUM(item_69) + SUM(item_70) + 
        SUM(item_71) + SUM(item_72) as suma')->where('id_empresa', $id)->first()->suma;

        // Ambiente de trabajo
        $Atrabajo = DB::table('registros')->selectRaw('SUM(item_1) + SUM(item_2) + SUM(item_3) + SUM(item_4) + SUM(item_5) as Atrabajo')->where('id_empresa', $id)->first()->Atrabajo;

        // Factores propios de la actividad
        $Fpropios = DB::table('registros')->selectRaw('SUM(item_1) + SUM(item_2) + SUM(item_3) + SUM(item_4) + SUM(item_5) + SUM(item_6) + SUM(item_7) + SUM(item_8) + SUM(item_9) + SUM(item_10) + 
        SUM(item_11) + SUM(item_12) + SUM(item_13) + SUM(item_14) + SUM(item_15) + SUM(item_16) + SUM(item_23) + SUM(item_24) + SUM(item_25) + SUM(item_26) + SUM(item_27) + SUM(item_28) + SUM(item_29) + SUM(item_30) + SUM(item_35) + SUM(item_36) + SUM(item_65) + SUM(item_66) + SUM(item_67) + SUM(item_68) as Fpropios')->where('id_empresa', $id)->first()->Fpropios;

        // Organización del tiempo de trabajo
        $Otiempo = DB::table('registros')->selectRaw('SUM(item_17) + SUM(item_18) + SUM(item_19) + SUM(item_20) + SUM(item_21) + SUM(item_22) as Otiempo')->where('id_empresa', $id)->first()->Otiempo;

        // Eventos traumáticos severos
        $ets_1Si = Registro::select('ets_1')->where('ets_1', 'Sí')->count();
        $ets_1No = Registro::select('ets_1')->where('ets_1', 'No')->count();
        
        $ets_2Si = Registro::select('ets_2')->where('ets_2', 'Sí')->count();
        $ets_2No = Registro::select('ets_2')->where('ets_2', 'No')->count();
        
        $ets_3Si = Registro::select('ets_3')->where('ets_3', 'Sí')->count();
        $ets_3No = Registro::select('ets_3')->where('ets_3', 'No')->count();
        
        $ets_4Si = Registro::select('ets_4')->where('ets_4', 'Sí')->count();
        $ets_4No = Registro::select('ets_4')->where('ets_4', 'No')->count();
        
        $ets_5Si = Registro::select('ets_5')->where('ets_5', 'Sí')->count();
        $ets_5No = Registro::select('ets_5')->where('ets_5', 'No')->count();
        
        $ets_6Si = Registro::select('ets_6')->where('ets_6', 'Sí')->count();
        $ets_6No = Registro::select('ets_6')->where('ets_6', 'No')->count();
        
        $ets_7Si = Registro::select('ets_7')->where('ets_7', 'Sí')->count();
        $ets_7No = Registro::select('ets_7')->where('ets_7', 'No')->count();
        
        $ets_8Si = Registro::select('ets_8')->where('ets_8', 'Sí')->count();
        $ets_8No = Registro::select('ets_8')->where('ets_8', 'No')->count();
        
        $ets_9Si = Registro::select('ets_9')->where('ets_9', 'Sí')->count();
        $ets_9No = Registro::select('ets_9')->where('ets_9', 'No')->count();
        
        $ets_10Si = Registro::select('ets_10')->where('ets_10', 'Sí')->count();
        $ets_10No = Registro::select('ets_10')->where('ets_10', 'No')->count();
        
        $ets_11Si = Registro::select('ets_11')->where('ets_11', 'Sí')->count();
        $ets_11No = Registro::select('ets_11')->where('ets_11', 'No')->count();
        
        $ets_12Si = Registro::select('ets_12')->where('ets_12', 'Sí')->count();
        $ets_12No = Registro::select('ets_12')->where('ets_12', 'No')->count();
        
        $ets_13Si = Registro::select('ets_13')->where('ets_13', 'Sí')->count();
        $ets_13No = Registro::select('ets_13')->where('ets_13', 'No')->count();
        
        $ets_14Si = Registro::select('ets_14')->where('ets_14', 'Sí')->count();
        $ets_14No = Registro::select('ets_14')->where('ets_14', 'No')->count();
        
        $ets_15Si = Registro::select('ets_15')->where('ets_15', 'Sí')->count();
        $ets_15No = Registro::select('ets_15')->where('ets_15', 'No')->count();
        
        $ets_16Si = Registro::select('ets_16')->where('ets_16', 'Sí')->count();
        $ets_16No = Registro::select('ets_16')->where('ets_16', 'No')->count();
        
        $ets_17Si = Registro::select('ets_17')->where('ets_17', 'Sí')->count();
        $ets_17No = Registro::select('ets_17')->where('ets_17', 'No')->count();
        
        $ets_18Si = Registro::select('ets_18')->where('ets_18', 'Sí')->count();
        $ets_18No = Registro::select('ets_18')->where('ets_18', 'No')->count();
        
        $ets_19Si = Registro::select('ets_19')->where('ets_19', 'Sí')->count();
        $ets_19No = Registro::select('ets_19')->where('ets_19', 'No')->count();
        
        $ets_20Si = Registro::select('ets_20')->where('ets_20', 'Sí')->count();
        $ets_20No = Registro::select('ets_20')->where('ets_20', 'No')->count();

        $etsTotalSi = $ets_1Si+$ets_2Si+$ets_3Si+$ets_4Si+$ets_5Si+$ets_6Si+$ets_7Si+$ets_8Si+$ets_9Si+$ets_10Si+$ets_11Si+$ets_12Si+$ets_13Si+$ets_14Si+$ets_15Si+$ets_16Si+$ets_17Si+$ets_18Si+$ets_19Si+$ets_20Si;

        $etsTotalNo = $ets_1No+$ets_2No+$ets_3No+$ets_4No+$ets_5No+$ets_6No+$ets_7No+$ets_8No+$ets_9No+$ets_10No+$ets_11No+$ets_12No+$ets_13No+$ets_14No+$ets_15No+$ets_16No+$ets_17No+$ets_18No+$ets_19No+$ets_20No;

        return view('admin.empresas.graficas', compact('etsTotalSi', 'etsTotalNo', 'estudios', 'registros', 'NombreEmpresa', 'c_final', 'Atrabajo', 'Fpropios', 'Otiempo'));


    }
}
