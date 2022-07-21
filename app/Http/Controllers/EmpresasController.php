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
        $empresa = Empresas::where('id', $id)->first();
        $registros = Registro::where('id_empresa', $id)->with('empresa')->get();

        $estudios = Registro::where('id_empresa', $id)->get();

        $NombreEmpresa = Registro::where('id_empresa', $id)->with('empresa')->first();

        // Calificaion Final
        $c_final = Calificaciones::select('c_final')->where('id_empresa', $id)->get();

        // Ambiente de trabajo
        $Atrabajo = Calificaciones::select('c_cat_1')->where('id_empresa', $id)->get();
        
        // Factores propios de la actividad
        $Fpropios = Calificaciones::select('c_cat_2')->where('id_empresa', $id)->get();
        
        // Organización del tiempo de trabajo
        $Otiempo = Calificaciones::select('c_cat_3')->where('id_empresa', $id)->get();

        // Liderazgo y relaciones en el trabajo
        $Lrelaciones = Calificaciones::select('c_cat_4')->where('id_empresa', $id)->get();

        // Entorno Organizacional
        $Eorganizacional = Calificaciones::select('c_cat_5')->where('id_empresa', $id)->get();

        // Condiciones en el ambiente de trabajo
        $Cambiente = Calificaciones::select('c_dominio_1')->where('id_empresa', $id)->get();
        
        // Carga de trabajo
        $Ctrabajo = Calificaciones::select('c_dominio_2')->where('id_empresa', $id)->get();


        // Eventos traumáticos severos
        $ets_1Si = Registro::select('ets_1')->where('ets_1', 'Sí')->where('id_empresa', $id)->count();
        $ets_1No = Registro::select('ets_1')->where('ets_1', 'No')->where('id_empresa', $id)->count();
        
        $ets_2Si = Registro::select('ets_2')->where('ets_2', 'Sí')->where('id_empresa', $id)->count();
        $ets_2No = Registro::select('ets_2')->where('ets_2', 'No')->where('id_empresa', $id)->count();
        
        $ets_3Si = Registro::select('ets_3')->where('ets_3', 'Sí')->where('id_empresa', $id)->count();
        $ets_3No = Registro::select('ets_3')->where('ets_3', 'No')->where('id_empresa', $id)->count();
        
        $ets_4Si = Registro::select('ets_4')->where('ets_4', 'Sí')->where('id_empresa', $id)->count();
        $ets_4No = Registro::select('ets_4')->where('ets_4', 'No')->where('id_empresa', $id)->count();
        
        $ets_5Si = Registro::select('ets_5')->where('ets_5', 'Sí')->where('id_empresa', $id)->count();
        $ets_5No = Registro::select('ets_5')->where('ets_5', 'No')->where('id_empresa', $id)->count();
        
        $ets_6Si = Registro::select('ets_6')->where('ets_6', 'Sí')->where('id_empresa', $id)->count();
        $ets_6No = Registro::select('ets_6')->where('ets_6', 'No')->where('id_empresa', $id)->count();
        
        $ets_7Si = Registro::select('ets_7')->where('ets_7', 'Sí')->where('id_empresa', $id)->count();
        $ets_7No = Registro::select('ets_7')->where('ets_7', 'No')->where('id_empresa', $id)->count();
        
        $ets_8Si = Registro::select('ets_8')->where('ets_8', 'Sí')->where('id_empresa', $id)->count();
        $ets_8No = Registro::select('ets_8')->where('ets_8', 'No')->where('id_empresa', $id)->count();
        
        $ets_9Si = Registro::select('ets_9')->where('ets_9', 'Sí')->where('id_empresa', $id)->count();
        $ets_9No = Registro::select('ets_9')->where('ets_9', 'No')->where('id_empresa', $id)->count();
        
        $ets_10Si = Registro::select('ets_10')->where('ets_10', 'Sí')->where('id_empresa', $id)->count();
        $ets_10No = Registro::select('ets_10')->where('ets_10', 'No')->where('id_empresa', $id)->count();
        
        $ets_11Si = Registro::select('ets_11')->where('ets_11', 'Sí')->where('id_empresa', $id)->count();
        $ets_11No = Registro::select('ets_11')->where('ets_11', 'No')->where('id_empresa', $id)->count();
        
        $ets_12Si = Registro::select('ets_12')->where('ets_12', 'Sí')->where('id_empresa', $id)->count();
        $ets_12No = Registro::select('ets_12')->where('ets_12', 'No')->where('id_empresa', $id)->count();
        
        $ets_13Si = Registro::select('ets_13')->where('ets_13', 'Sí')->where('id_empresa', $id)->count();
        $ets_13No = Registro::select('ets_13')->where('ets_13', 'No')->where('id_empresa', $id)->count();
        
        $ets_14Si = Registro::select('ets_14')->where('ets_14', 'Sí')->where('id_empresa', $id)->count();
        $ets_14No = Registro::select('ets_14')->where('ets_14', 'No')->where('id_empresa', $id)->count();
        
        $ets_15Si = Registro::select('ets_15')->where('ets_15', 'Sí')->where('id_empresa', $id)->count();
        $ets_15No = Registro::select('ets_15')->where('ets_15', 'No')->where('id_empresa', $id)->count();
        
        $ets_16Si = Registro::select('ets_16')->where('ets_16', 'Sí')->where('id_empresa', $id)->count();
        $ets_16No = Registro::select('ets_16')->where('ets_16', 'No')->where('id_empresa', $id)->count();
        
        $ets_17Si = Registro::select('ets_17')->where('ets_17', 'Sí')->where('id_empresa', $id)->count();
        $ets_17No = Registro::select('ets_17')->where('ets_17', 'No')->where('id_empresa', $id)->count();
        
        $ets_18Si = Registro::select('ets_18')->where('ets_18', 'Sí')->where('id_empresa', $id)->count();
        $ets_18No = Registro::select('ets_18')->where('ets_18', 'No')->where('id_empresa', $id)->count();
        
        $ets_19Si = Registro::select('ets_19')->where('ets_19', 'Sí')->where('id_empresa', $id)->count();
        $ets_19No = Registro::select('ets_19')->where('ets_19', 'No')->where('id_empresa', $id)->count();
        
        $ets_20Si = Registro::select('ets_20')->where('ets_20', 'Sí')->where('id_empresa', $id)->count();
        $ets_20No = Registro::select('ets_20')->where('ets_20', 'No')->where('id_empresa', $id)->count();

        $etsTotalSi = $ets_1Si+$ets_2Si+$ets_3Si+$ets_4Si+$ets_5Si+$ets_6Si+$ets_7Si+$ets_8Si+$ets_9Si+$ets_10Si+$ets_11Si+$ets_12Si+$ets_13Si+$ets_14Si+$ets_15Si+$ets_16Si+$ets_17Si+$ets_18Si+$ets_19Si+$ets_20Si;

        $etsTotalNo = $ets_1No+$ets_2No+$ets_3No+$ets_4No+$ets_5No+$ets_6No+$ets_7No+$ets_8No+$ets_9No+$ets_10No+$ets_11No+$ets_12No+$ets_13No+$ets_14No+$ets_15No+$ets_16No+$ets_17No+$ets_18No+$ets_19No+$ets_20No;

        // Falta de control sobre el trabajo
        $Fcontrol = Calificaciones::select('c_dominio_3')->where('id_empresa', $id)->get();
        
        // Jornada de trabajo
        $Jtrabajo = Calificaciones::select('c_dominio_4')->where('id_empresa', $id)->get();
        
        // Interferencia en la relación trabajo-familia
        $Irelacion = Calificaciones::select('c_dominio_5')->where('id_empresa', $id)->get();
        
        // Liderazgo
        $Liderazgo = Calificaciones::select('c_dominio_6')->where('id_empresa', $id)->get();
        
        // Relaciones en el trabajo	
        $Rtrabajo = Calificaciones::select('c_dominio_7')->where('id_empresa', $id)->get();
        
        // Violencia
        $Violencia = Calificaciones::select('c_dominio_8')->where('id_empresa', $id)->get();
        
        // Reconocimiento del desempeño
        $Rdesempeño = Calificaciones::select('c_dominio_9')->where('id_empresa', $id)->get();
        
        // Insuficiente sentido de pertenencia e, inestabilidad
        $Ipertenencia = Calificaciones::select('c_dominio_10')->where('id_empresa', $id)->get();
        
        // Condiciones peligrosas e inseguras
        $Cpeligrosas = Calificaciones::select('c_dimension_1')->where('id_empresa', $id)->get();
        
        // Condiciones deficientes e insalubres
        $Cdeficientes = Calificaciones::select('c_dimension_2')->where('id_empresa', $id)->get();
        
        // Trabajos peligrosos	
        $Tpeligrosos = Calificaciones::select('c_dimension_3')->where('id_empresa', $id)->get();
        
        // Cargas cuantitativas	
        $Ccuantitativa = Calificaciones::select('c_dimension_4')->where('id_empresa', $id)->get();
        
        // Ritmos de trabajo acelerado	
        $Rtrabajoacelerado = Calificaciones::select('c_dimension_5')->where('id_empresa', $id)->get();
        
        // Carga Mental
        $Cmental = Calificaciones::select('c_dimension_6')->where('id_empresa', $id)->get();
        
        // Cargas psicológicas emocionales	
        $Cpsicologica = Calificaciones::select('c_dimension_7')->where('id_empresa', $id)->get();
        
        // Cargas de alta responsabilidad
        $Calta = Calificaciones::select('c_dimension_8')->where('id_empresa', $id)->get();
        
        // Cargas contradictorias o inconsistentes
        $Ccontradictorias = Calificaciones::select('c_dimension_9')->where('id_empresa', $id)->get();
        
        // Falta de control y autonomía sobre el trabajo
        $Fcontrolautonomia = Calificaciones::select('c_dimension_10')->where('id_empresa', $id)->get();
        
        // Limitada o nula posibilidad de desarrollo
        $Ldesarrollo = Calificaciones::select('c_dimension_11')->where('id_empresa', $id)->get();
        
        // Insuficiente participación y manejo del cambio	
        $Iparticipacion = Calificaciones::select('c_dimension_12')->where('id_empresa', $id)->get();
        
        // Limitada o inexistente capacitación
        $Lcapacitacion = Calificaciones::select('c_dimension_13')->where('id_empresa', $id)->get();
        
        // Jornadas de trabajo extensas	
        $Jextensas = Calificaciones::select('c_dimension_14')->where('id_empresa', $id)->get();
        
        // Influencia del trabajo fuera del centro laboral
        $Itrabajofuera = Calificaciones::select('c_dimension_15')->where('id_empresa', $id)->get();
        
        // Influencia de las responsabilidades familiares
        $Iresponsabilidades = Calificaciones::select('c_dimension_16')->where('id_empresa', $id)->get();
        
        // Escaza claridad de funciones	
        $Eclaridad = Calificaciones::select('c_dimension_17')->where('id_empresa', $id)->get();
        
        // Características del liderazgo
        $Caracteristicas = Calificaciones::select('c_cat_6')->where('id_empresa', $id)->get();
        
        // Relaciones sociales en el trabajo
        $Rsociales = Calificaciones::select('c_cat_7')->where('id_empresa', $id)->get();
        
        // Deficiente relación con los colaboradores que supervisa
        $Drelaciones = Calificaciones::select('c_dimension_18')->where('id_empresa', $id)->get();
        
        // Violencia laboral
        $ViolenciaLaboral = Calificaciones::select('c_dimension_19')->where('id_empresa', $id)->get();
        
        // Escasa o nula retroalimentación del desempeño
        $Eretroalimentacion = Calificaciones::select('c_dimension_20')->where('id_empresa', $id)->get();
        
        // Escaso o nulo reconocimiento y compensación	
        $Ereconocimiento = Calificaciones::select('c_dimension_21')->where('id_empresa', $id)->get();
        
        // Limitado sentido de pertenencia
        $Lpertenencia = Calificaciones::select('c_dimension_22')->where('id_empresa', $id)->get();
        
        // Inestabilidad laboral
        $Iestabilidad = Calificaciones::select('c_dimension_23')->where('id_empresa', $id)->get();
        
        return view('admin.empresas.graficas', compact(
            'empresa',
            'etsTotalSi', 
            'etsTotalNo', 
            'estudios', 
            'registros', 
            'NombreEmpresa', 
            'c_final', 
            'Atrabajo', 
            'Fpropios', 
            'Otiempo', 
            'Lrelaciones', 
            'Eorganizacional',
            'Cambiente',
            'Ctrabajo',
            'Fcontrol',
            'Jtrabajo',
            'Irelacion',
            'Liderazgo',
            'Rtrabajo',
            'Violencia',
            'Rdesempeño',
            'Ipertenencia',
            'Cpeligrosas',
            'Cdeficientes',
            'Tpeligrosos',
            'Ccuantitativa',
            'Rtrabajoacelerado',
            'Cmental',
            'Cpsicologica',
            'Calta',
            'Ccontradictorias',
            'Fcontrolautonomia',
            'Ldesarrollo',
            'Iparticipacion',
            'Lcapacitacion',
            'Jextensas',
            'Itrabajofuera',
            'Iresponsabilidades',
            'Eclaridad',
            'Caracteristicas',
            'Rsociales',
            'Drelaciones',
            'ViolenciaLaboral',
            'Eretroalimentacion',
            'Ereconocimiento',
            'Lpertenencia',
            'Iestabilidad'
        ));


    }
}
