<?php

namespace App\Http\Controllers;

use App\Empresas;
use Illuminate\Http\Request;
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
            'descripcion.required' => 'La descripcion de la empresa es requerido'
        ];
        $validator = Validator::make($request->all(), [
            'token' => 'required',
            'nombre' => 'required',
            'logo' => 'required|image:jpeg,png,jpg|max:2048',
            'imagen_fondo' => 'required|image:jpeg,png,jpg|max:2048',
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
}
