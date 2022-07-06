<?php

namespace App\Http\Controllers;

use App\Empresas;
use App\Registro;
use App\Calificaciones;
use App\AvisoPrivacidad;
use App\Configuracion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Exports\RegistroExport;
use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class RegistroController extends Controller
{

    public function index($token){
        // Empresa activa
        $empresa = Empresas::where('token', $token)->where('activo', 1)->first();
        $aviso = AvisoPrivacidad::first();
        $configuraciones = Configuracion::first();
        return view('index', compact('empresa', 'token', 'configuraciones'));
    }

    public function registroDatos(Request $request)
    {

        if($request->item_sc == "Sí"){
            // Validar campos   
            $request->validate([
                'email' => 'required|email|unique:registros',
                'sexo' => 'required',
                'estado_civil' => 'required',
                'edad' => 'required',
                'antiguedad' => 'required',
                'estudios' => 'required',
                'tipo_puesto' => 'required',
                'area' => 'required',
                'tipo_contratacion' => 'required',
                'jornada_trabajo' => 'required',
                'rotacion_turnos' => 'required',
                'experiencia_laboral' => 'required',
                'item_1' => 'required',
                'item_2' => 'required',
                'item_3' => 'required',
                'item_4' => 'required',
                'item_5' => 'required',
                'item_6' => 'required',
                'item_7' => 'required',
                'item_8' => 'required',
                'item_9' => 'required',
                'item_10' => 'required',
                'item_11' => 'required',
                'item_12' => 'required',
                'item_13' => 'required',
                'item_14' => 'required',
                'item_15' => 'required',
                'item_16' => 'required',
                'item_17' => 'required',
                'item_18' => 'required',
                'item_19' => 'required',
                'item_20' => 'required',
                'item_21' => 'required',
                'item_22' => 'required',
                'item_23' => 'required',
                'item_24' => 'required',
                'item_25' => 'required',
                'item_26' => 'required',
                'item_27' => 'required',
                'item_28' => 'required',
                'item_29' => 'required',
                'item_30' => 'required',
                'item_31' => 'required',
                'item_32' => 'required',
                'item_33' => 'required',
                'item_34' => 'required',
                'item_35' => 'required',
                'item_36' => 'required',
                'item_37' => 'required',
                'item_38' => 'required',
                'item_39' => 'required',
                'item_40' => 'required',
                'item_41' => 'required',
                'item_42' => 'required',
                'item_43' => 'required',
                'item_44' => 'required',
                'item_45' => 'required',
                'item_46' => 'required',
                'item_47' => 'required',
                'item_48' => 'required',
                'item_49' => 'required',
                'item_50' => 'required',
                'item_51' => 'required',
                'item_52' => 'required',
                'item_53' => 'required',
                'item_54' => 'required',
                'item_55' => 'required',
                'item_56' => 'required',
                'item_57' => 'required',
                'item_58' => 'required',
                'item_59' => 'required',
                'item_60' => 'required',
                'item_61' => 'required',
                'item_62' => 'required',
                'item_63' => 'required',
                'item_64' => 'required',
                'item_sc' => 'required',
                'item_jefe' => 'required',
                'ets_1' => 'required',
                'ets_2' => 'required',
                'ets_3' => 'required',
                'ets_4' => 'required',
                'ets_5' => 'required',
                'ets_6' => 'required',
                'ets_7' => 'required',
                'ets_8' => 'required',
                'ets_9' => 'required',
                'ets_10' => 'required',
                'ets_11' => 'required',
                'ets_12' => 'required',
                'ets_13' => 'required',
                'ets_14' => 'required',
                'ets_15' => 'required',
                'ets_16' => 'required',
                'ets_17' => 'required',
                'ets_18' => 'required',
                'ets_19' => 'required',
                'ets_20' => 'required',
            ], [
                'email.required' => 'El campo Correo electrónico es obligatorio.',
                'email.email' => 'El campo Correo electrónico no es válido.',
                'email.unique' => 'El campo Correo electrónico ya existe.',
                'sexo.required' => 'El campo Sexo es obligatorio.',
                'estado_civil.required' => 'El campo Estado civil es obligatorio.',
                'edad.required' => 'El campo Edad en años es obligatorio.',
                'antiguedad.required' => 'El campo Antigüedad en puesto actual es obligatorio.',
                'estudios.required' => 'El campo Estudios es obligatorio.',
                'tipo_puesto.required' => 'El campo Tipo de puesto es obligatorio.',
                'area.required' => 'El campo Área es obligatorio.',
                'tipo_contratacion.required' => 'El campo Tipo de contratación es obligatorio.',
                'jornada_trabajo.required' => 'El campo Jornada de trabajo es obligatorio.',
                'rotacion_turnos.required' => 'El campo Rotación de turnos es obligatorio.',
                'experiencia_laboral.required' => 'El campo Eperiencia laboral es obligatorio.',
                'item_1.required' => 'El campo ¿El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica? es obligatorio.',
                'item_2.required' => 'El campo ¿Mi trabajo me exige hacer mucho esfuerzo físico? es obligatorio.',
                'item_3.required' => 'El campo ¿Me preocupa sufrir un accidente en mi trabajo? es obligatorio.',
                'item_4.required' => 'El campo ¿Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo? es obligatorio.',
                'item_5.required' => 'El campo ¿Considero que las actividades que realizo son peligrosas? es obligatorio.',
                'item_6.required' => 'El campo ¿Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno? es obligatorio.',
                'item_7.required' => 'El campo ¿Por la cantidad de trabajo que tengo debo trabajar sin parar? es obligatorio.',
                'item_8.required' => 'El campo ¿Considero que es necesario mantener un ritmo de trabajo acelerado? es obligatorio.',
                'item_9.required' => 'El campo ¿Mi trabajo exige que esté muy concentrado? es obligatorio.',
                'item_10.required' => 'El campo ¿Mi trabajo requiere que memorice mucha información? es obligatorio.',
                'item_11.required' => 'El campo ¿En mi trabajo tengo que tomar decisiones difíciles muy rápido? es obligatorio.',
                'item_12.required' => 'El campo ¿Mi trabajo exige que atienda varios asuntos al mismo tiempo? es obligatorio.',
                'item_13.required' => 'El campo ¿En mi trabajo soy responsable de cosas de mucho valor? es obligatorio.',
                'item_14.required' => 'El campo ¿Respondo ante mi jefe por los resultados de toda mi área de trabajo? es obligatorio.',
                'item_15.required' => 'El campo ¿En el trabajo me dan órdenes contradictorias? es obligatorio.',
                'item_16.required' => 'El campo ¿Considero que en mi trabajo me piden hacer cosas innecesarias? es obligatorio.',
                'item_17.required' => 'El campo ¿Trabajo horas extras más de tres veces a la semana? es obligatorio.',
                'item_18.required' => 'El campo ¿Mi trabajo me exige laborar en días de descanso, festivos o fines de semana? es obligatorio.',
                'item_19.required' => 'El campo ¿Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales? es obligatorio.',
                'item_20.required' => 'El campo ¿Debo atender asuntos de trabajo cuando estoy en casa? es obligatorio.',
                'item_21.required' => 'El campo ¿Pienso en las actividades familiares o personal es cuando estoy en mi trabajo? es obligatorio.',
                'item_22.required' => 'El campo ¿Pienso que mis responsabilidades familiares afectan mi trabajo? es obligatorio.',
                'item_23.required' => 'El campo ¿Mi trabajo permite que desarrolle nuevas habilidades? es obligatorio.',
                'item_24.required' => 'El campo ¿En mi trabajo puedo aspirar a un mejor puesto? es obligatorio.',
                'item_25.required' => 'El campo ¿Durante mi jornada de trabajo puedo tomar pausas cuando las necesito? es obligatorio.',
                'item_26.required' => 'El campo ¿Puedo decidir cuánto trabajo realizo durante la jornada laboral? es obligatorio.',
                'item_27.required' => 'El campo ¿Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo? es obligatorio.',
                'item_28.required' => 'El campo ¿Puedo cambiar el orden de las actividades que realizo en mi trabajo? es obligatorio.',
                'item_29.required' => 'El campo ¿Los cambios que se presentan en mi trabajo dificultan mi labor? es obligatorio.',
                'item_30.required' => 'El campo ¿Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones? es obligatorio.',
                'item_31.required' => 'El campo ¿Me informan con claridad cuáles son mis funciones? es obligatorio.',
                'item_32.required' => 'El campo ¿Me explican claramente los resultados que debo obtener en mi trabajo? es obligatorio.',
                'item_33.required' => 'El campo ¿Me explican claramente los objetivos de mi trabajo? es obligatorio.',
                'item_34.required' => 'El campo ¿Me informan con quién puedo resolver problemas o asuntos de trabajo? es obligatorio.',
                'item_35.required' => 'El campo ¿Me permiten asistir a capacitaciones relacionadas con mi trabajo? es obligatorio.',
                'item_36.required' => 'El campo ¿Recibo capacitación útil para hacer mi trabajo? es obligatorio.',
                'item_37.required' => 'El campo ¿Mi jefe ayuda a organizar mejor el trabajo? es obligatorio.',
                'item_38.required' => 'El campo ¿Mi jefe tiene en cuenta mis puntos de vista y opiniones? es obligatorio.',
                'item_39.required' => 'El campo ¿Mi jefe me comunica a tiempo la información relacionada con el trabajo? es obligatorio.',
                'item_40.required' => 'El campo ¿La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo? es obligatorio.',
                'item_41.required' => 'El campo ¿Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo? es obligatorio.',
                'item_42.required' => 'El campo ¿Puedo confiar en mis compañeros de trabajo? es obligatorio.',
                'item_43.required' => 'El campo ¿Entre compañeros solucionamos los problemas de trabajo de forma respetuosa? es obligatorio.',
                'item_44.required' => 'El campo ¿En mi trabajo me hacen sentir parte del grupo? es obligatorio.',
                'item_45.required' => 'El campo ¿Cuando tenemos que realizar trabajo de equipo los compañeros colaboran? es obligatorio.',
                'item_46.required' => 'El campo Mis compañeros de trabajo me ayudan cuando tengo dificultades es obligatorio.',
                'item_47.required' => 'El campo ¿Me informan sobre lo que hago bien en mi trabajo? es obligatorio.',
                'item_48.required' => 'El campo ¿La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño? es obligatorio.',
                'item_49.required' => 'El campo ¿En mi centro de trabajo me pagan a tiempo mi salario? es obligatorio.',
                'item_50.required' => 'El campo ¿El pago que recibo es el que merezco por el trabajo que realizo? es obligatorio.',
                'item_51.required' => 'El campo ¿Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen? es obligatorio.',
                'item_52.required' => 'El campo ¿Las personas que hacen bien el trabajo pueden crecer laboralmente? es obligatorio.',
                'item_53.required' => 'El campo ¿Considero que mi trabajo es estable? es obligatorio.',
                'item_54.required' => 'El campo ¿En mi trabajo existe continua rotación de personal? es obligatorio.',
                'item_55.required' => 'El campo ¿Siento orgullo de laborar en este centro de trabajo? es obligatorio.',
                'item_56.required' => 'El campo ¿Me siento comprometido con mi trabajo? es obligatorio.',
                'item_57.required' => 'El campo ¿En mi trabajo puedo expresarme libremente sin interrupciones? es obligatorio.',
                'item_58.required' => 'El campo ¿Recibo críticas constantes a mi persona y/o trabajo? es obligatorio.',
                'item_59.required' => 'El campo ¿Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones? es obligatorio.',
                'item_60.required' => 'El campo ¿Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones? es obligatorio.',
                'item_61.required' => 'El campo ¿Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador? es obligatorio.',
                'item_62.required' => 'El campo ¿Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores? es obligatorio.',
                'item_63.required' => 'El campo ¿Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo? es obligatorio.',
                'item_64.required' => 'El campo ¿He presenciado actos de violencia en mi centro de trabajo? es obligatorio.',
                'item_sc.required' => 'El campo En mi trabajo debo brindar servicio a clientes o usuarios es obligatorio.',
                'item_jefe.required' => 'El campo Soy jefe de otros trabajadores es obligatorio.',
                'ets_1.required' => 'El campo ¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave? es obligatorio.',
                'ets_2.required' => 'El campo ¿Asaltos? es obligatorio.',
                'ets_3.required' => 'El campo ¿Actos violentos que derivaron en lesiones graves? es obligatorio.',
                'ets_4.required' => 'El campo ¿Secuestro? es obligatorio.',
                'ets_5.required' => 'El campo ¿Amenazas? es obligatorio.',
                'ets_6.required' => 'El campo ¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas? es obligatorio.',
                'ets_7.required' => 'El campo ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares? es obligatorio.',
                'ets_8.required' => 'El campo ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar? es obligatorio.',
                'ets_9.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento? es obligatorio.',
                'ets_10.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento? es obligatorio.',
                'ets_11.required' => 'El campo ¿Ha tenido dificultad para recordar alguna parte importante del evento? es obligatorio.',
                'ets_12.required' => 'El campo ¿Ha disminuido su interés en sus actividades cotidianas? es obligatorio.',
                'ets_13.required' => 'El campo ¿Se ha sentido usted alejado o distante de los demás? es obligatorio.',
                'ets_14.required' => 'El campo ¿Ha notado que tiene dificultad para expresar sus sentimientos? es obligatorio.',
                'ets_15.required' => 'El campo ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado? es obligatorio.',
                'ets_16.required' => 'El campo ¿Ha tenido usted dificultades para dormir? es obligatorio.',
                'ets_17.required' => 'El campo ¿Ha estado particularmente irritable o le han dado arranques de coraje? es obligatorio.',
                'ets_18.required' => 'El campo ¿Ha tenido dificultad para concentrarse? es obligatorio.',
                'ets_19.required' => 'El campo ¿Ha estado nervioso o constantemente en alerta? es obligatorio.',
                'ets_20.required' => 'El campo ¿Se ha sobresaltado fácilmente por cualquier cosa? es obligatorio.',
            ]);
        }else{
            $request->validate([
                'email' => 'required|email|unique:registros',
                'sexo' => 'required',
                'estado_civil' => 'required',
                'edad' => 'required',
                'antiguedad' => 'required',
                'estudios' => 'required',
                'tipo_puesto' => 'required',
                'area' => 'required',
                'tipo_contratacion' => 'required',
                'jornada_trabajo' => 'required',
                'rotacion_turnos' => 'required',
                'experiencia_laboral' => 'required',
                'item_1' => 'required',
                'item_2' => 'required',
                'item_3' => 'required',
                'item_4' => 'required',
                'item_5' => 'required',
                'item_6' => 'required',
                'item_7' => 'required',
                'item_8' => 'required',
                'item_9' => 'required',
                'item_10' => 'required',
                'item_11' => 'required',
                'item_12' => 'required',
                'item_13' => 'required',
                'item_14' => 'required',
                'item_15' => 'required',
                'item_16' => 'required',
                'item_17' => 'required',
                'item_18' => 'required',
                'item_19' => 'required',
                'item_20' => 'required',
                'item_21' => 'required',
                'item_22' => 'required',
                'item_23' => 'required',
                'item_24' => 'required',
                'item_25' => 'required',
                'item_26' => 'required',
                'item_27' => 'required',
                'item_28' => 'required',
                'item_29' => 'required',
                'item_30' => 'required',
                'item_31' => 'required',
                'item_32' => 'required',
                'item_33' => 'required',
                'item_34' => 'required',
                'item_35' => 'required',
                'item_36' => 'required',
                'item_37' => 'required',
                'item_38' => 'required',
                'item_39' => 'required',
                'item_40' => 'required',
                'item_41' => 'required',
                'item_42' => 'required',
                'item_43' => 'required',
                'item_44' => 'required',
                'item_45' => 'required',
                'item_46' => 'required',
                'item_47' => 'required',
                'item_48' => 'required',
                'item_49' => 'required',
                'item_50' => 'required',
                'item_51' => 'required',
                'item_52' => 'required',
                'item_53' => 'required',
                'item_54' => 'required',
                'item_55' => 'required',
                'item_56' => 'required',
                'item_57' => 'required',
                'item_58' => 'required',
                'item_59' => 'required',
                'item_60' => 'required',
                'item_61' => 'required',
                'item_62' => 'required',
                'item_63' => 'required',
                'item_64' => 'required',
                'item_sc' => 'required',
                'item_jefe' => 'required',
                // 'ets_1' => 'required',
                // 'ets_2' => 'required',
                // 'ets_3' => 'required',
                // 'ets_4' => 'required',
                // 'ets_5' => 'required',
                // 'ets_6' => 'required',
                // 'ets_7' => 'required',
                // 'ets_8' => 'required',
                // 'ets_9' => 'required',
                // 'ets_10' => 'required',
                // 'ets_11' => 'required',
                // 'ets_12' => 'required',
                // 'ets_13' => 'required',
                // 'ets_14' => 'required',
                // 'ets_15' => 'required',
                // 'ets_16' => 'required',
                // 'ets_17' => 'required',
                // 'ets_18' => 'required',
                // 'ets_19' => 'required',
                // 'ets_20' => 'required',
            ], [
                'email.required' => 'El campo Correo electrónico es obligatorio.',
                'email.email' => 'El campo Correo electrónico no es válido.',
                'email.unique' => 'El campo Correo electrónico ya existe.',
                'sexo.required' => 'El campo Sexo es obligatorio.',
                'estado_civil.required' => 'El campo Estado civil es obligatorio.',
                'edad.required' => 'El campo Edad en años es obligatorio.',
                'antiguedad.required' => 'El campo Antigüedad en puesto actual es obligatorio.',
                'estudios.required' => 'El campo Estudios es obligatorio.',
                'tipo_puesto.required' => 'El campo Tipo de puesto es obligatorio.',
                'area.required' => 'El campo Área es obligatorio.',
                'tipo_contratacion.required' => 'El campo Tipo de contratación es obligatorio.',
                'jornada_trabajo.required' => 'El campo Jornada de trabajo es obligatorio.',
                'rotacion_turnos.required' => 'El campo Rotación de turnos es obligatorio.',
                'experiencia_laboral.required' => 'El campo Eperiencia laboral es obligatorio.',
                'item_1.required' => 'El campo ¿El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica? es obligatorio.',
                'item_2.required' => 'El campo ¿Mi trabajo me exige hacer mucho esfuerzo físico? es obligatorio.',
                'item_3.required' => 'El campo ¿Me preocupa sufrir un accidente en mi trabajo? es obligatorio.',
                'item_4.required' => 'El campo ¿Considero que en mi trabajo se aplican las normas de seguridad y salud en el trabajo? es obligatorio.',
                'item_5.required' => 'El campo ¿Considero que las actividades que realizo son peligrosas? es obligatorio.',
                'item_6.required' => 'El campo ¿Por la cantidad de trabajo que tengo debo quedarme tiempo adicional a mi turno? es obligatorio.',
                'item_7.required' => 'El campo ¿Por la cantidad de trabajo que tengo debo trabajar sin parar? es obligatorio.',
                'item_8.required' => 'El campo ¿Considero que es necesario mantener un ritmo de trabajo acelerado? es obligatorio.',
                'item_9.required' => 'El campo ¿Mi trabajo exige que esté muy concentrado? es obligatorio.',
                'item_10.required' => 'El campo ¿Mi trabajo requiere que memorice mucha información? es obligatorio.',
                'item_11.required' => 'El campo ¿En mi trabajo tengo que tomar decisiones difíciles muy rápido? es obligatorio.',
                'item_12.required' => 'El campo ¿Mi trabajo exige que atienda varios asuntos al mismo tiempo? es obligatorio.',
                'item_13.required' => 'El campo ¿En mi trabajo soy responsable de cosas de mucho valor? es obligatorio.',
                'item_14.required' => 'El campo ¿Respondo ante mi jefe por los resultados de toda mi área de trabajo? es obligatorio.',
                'item_15.required' => 'El campo ¿En el trabajo me dan órdenes contradictorias? es obligatorio.',
                'item_16.required' => 'El campo ¿Considero que en mi trabajo me piden hacer cosas innecesarias? es obligatorio.',
                'item_17.required' => 'El campo ¿Trabajo horas extras más de tres veces a la semana? es obligatorio.',
                'item_18.required' => 'El campo ¿Mi trabajo me exige laborar en días de descanso, festivos o fines de semana? es obligatorio.',
                'item_19.required' => 'El campo ¿Considero que el tiempo en el trabajo es mucho y perjudica mis actividades familiares o personales? es obligatorio.',
                'item_20.required' => 'El campo ¿Debo atender asuntos de trabajo cuando estoy en casa? es obligatorio.',
                'item_21.required' => 'El campo ¿Pienso en las actividades familiares o personal es cuando estoy en mi trabajo? es obligatorio.',
                'item_22.required' => 'El campo ¿Pienso que mis responsabilidades familiares afectan mi trabajo? es obligatorio.',
                'item_23.required' => 'El campo ¿Mi trabajo permite que desarrolle nuevas habilidades? es obligatorio.',
                'item_24.required' => 'El campo ¿En mi trabajo puedo aspirar a un mejor puesto? es obligatorio.',
                'item_25.required' => 'El campo ¿Durante mi jornada de trabajo puedo tomar pausas cuando las necesito? es obligatorio.',
                'item_26.required' => 'El campo ¿Puedo decidir cuánto trabajo realizo durante la jornada laboral? es obligatorio.',
                'item_27.required' => 'El campo ¿Puedo decidir la velocidad a la que realizo mis actividades en mi trabajo? es obligatorio.',
                'item_28.required' => 'El campo ¿Puedo cambiar el orden de las actividades que realizo en mi trabajo? es obligatorio.',
                'item_29.required' => 'El campo ¿Los cambios que se presentan en mi trabajo dificultan mi labor? es obligatorio.',
                'item_30.required' => 'El campo ¿Cuando se presentan cambios en mi trabajo se tienen en cuenta mis ideas o aportaciones? es obligatorio.',
                'item_31.required' => 'El campo ¿Me informan con claridad cuáles son mis funciones? es obligatorio.',
                'item_32.required' => 'El campo ¿Me explican claramente los resultados que debo obtener en mi trabajo? es obligatorio.',
                'item_33.required' => 'El campo ¿Me explican claramente los objetivos de mi trabajo? es obligatorio.',
                'item_34.required' => 'El campo ¿Me informan con quién puedo resolver problemas o asuntos de trabajo? es obligatorio.',
                'item_35.required' => 'El campo ¿Me permiten asistir a capacitaciones relacionadas con mi trabajo? es obligatorio.',
                'item_36.required' => 'El campo ¿Recibo capacitación útil para hacer mi trabajo? es obligatorio.',
                'item_37.required' => 'El campo ¿Mi jefe ayuda a organizar mejor el trabajo? es obligatorio.',
                'item_38.required' => 'El campo ¿Mi jefe tiene en cuenta mis puntos de vista y opiniones? es obligatorio.',
                'item_39.required' => 'El campo ¿Mi jefe me comunica a tiempo la información relacionada con el trabajo? es obligatorio.',
                'item_40.required' => 'El campo ¿La orientación que me da mi jefe me ayuda a realizar mejor mi trabajo? es obligatorio.',
                'item_41.required' => 'El campo ¿Mi jefe ayuda a solucionar los problemas que se presentan en el trabajo? es obligatorio.',
                'item_42.required' => 'El campo ¿Puedo confiar en mis compañeros de trabajo? es obligatorio.',
                'item_43.required' => 'El campo ¿Entre compañeros solucionamos los problemas de trabajo de forma respetuosa? es obligatorio.',
                'item_44.required' => 'El campo ¿En mi trabajo me hacen sentir parte del grupo? es obligatorio.',
                'item_45.required' => 'El campo ¿Cuando tenemos que realizar trabajo de equipo los compañeros colaboran? es obligatorio.',
                'item_46.required' => 'El campo Mis compañeros de trabajo me ayudan cuando tengo dificultades es obligatorio.',
                'item_47.required' => 'El campo ¿Me informan sobre lo que hago bien en mi trabajo? es obligatorio.',
                'item_48.required' => 'El campo ¿La forma como evalúan mi trabajo en mi centro de trabajo me ayuda a mejorar mi desempeño? es obligatorio.',
                'item_49.required' => 'El campo ¿En mi centro de trabajo me pagan a tiempo mi salario? es obligatorio.',
                'item_50.required' => 'El campo ¿El pago que recibo es el que merezco por el trabajo que realizo? es obligatorio.',
                'item_51.required' => 'El campo ¿Si obtengo los resultados esperados en mi trabajo me recompensan o reconocen? es obligatorio.',
                'item_52.required' => 'El campo ¿Las personas que hacen bien el trabajo pueden crecer laboralmente? es obligatorio.',
                'item_53.required' => 'El campo ¿Considero que mi trabajo es estable? es obligatorio.',
                'item_54.required' => 'El campo ¿En mi trabajo existe continua rotación de personal? es obligatorio.',
                'item_55.required' => 'El campo ¿Siento orgullo de laborar en este centro de trabajo? es obligatorio.',
                'item_56.required' => 'El campo ¿Me siento comprometido con mi trabajo? es obligatorio.',
                'item_57.required' => 'El campo ¿En mi trabajo puedo expresarme libremente sin interrupciones? es obligatorio.',
                'item_58.required' => 'El campo ¿Recibo críticas constantes a mi persona y/o trabajo? es obligatorio.',
                'item_59.required' => 'El campo ¿Recibo burlas, calumnias, difamaciones, humillaciones o ridiculizaciones? es obligatorio.',
                'item_60.required' => 'El campo ¿Se ignora mi presencia o se me excluye de las reuniones de trabajo y en la toma de decisiones? es obligatorio.',
                'item_61.required' => 'El campo ¿Se manipulan las situaciones de trabajo para hacerme parecer un mal trabajador? es obligatorio.',
                'item_62.required' => 'El campo ¿Se ignoran mis éxitos laborales y se atribuyen a otros trabajadores? es obligatorio.',
                'item_63.required' => 'El campo ¿Me bloquean o impiden las oportunidades que tengo para obtener ascenso o mejora en mi trabajo? es obligatorio.',
                'item_64.required' => 'El campo ¿He presenciado actos de violencia en mi centro de trabajo? es obligatorio.',
                'item_sc.required' => 'El campo En mi trabajo debo brindar servicio a clientes o usuarios es obligatorio.',
                'item_jefe.required' => 'El campo Soy jefe de otros trabajadores es obligatorio.',
                // 'ets_1.required' => 'El campo ¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave? es obligatorio.',
                // 'ets_2.required' => 'El campo ¿Asaltos? es obligatorio.',
                // 'ets_3.required' => 'El campo ¿Actos violentos que derivaron en lesiones graves? es obligatorio.',
                // 'ets_4.required' => 'El campo ¿Secuestro? es obligatorio.',
                // 'ets_5.required' => 'El campo ¿Amenazas? es obligatorio.',
                // 'ets_6.required' => 'El campo ¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas? es obligatorio.',
                // 'ets_7.required' => 'El campo ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares? es obligatorio.',
                // 'ets_8.required' => 'El campo ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar? es obligatorio.',
                // 'ets_9.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento? es obligatorio.',
                // 'ets_10.required' => 'El campo ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento? es obligatorio.',
                // 'ets_11.required' => 'El campo ¿Ha tenido dificultad para recordar alguna parte importante del evento? es obligatorio.',
                // 'ets_12.required' => 'El campo ¿Ha disminuido su interés en sus actividades cotidianas? es obligatorio.',
                // 'ets_13.required' => 'El campo ¿Se ha sentido usted alejado o distante de los demás? es obligatorio.',
                // 'ets_14.required' => 'El campo ¿Ha notado que tiene dificultad para expresar sus sentimientos? es obligatorio.',
                // 'ets_15.required' => 'El campo ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado? es obligatorio.',
                // 'ets_16.required' => 'El campo ¿Ha tenido usted dificultades para dormir? es obligatorio.',
                // 'ets_17.required' => 'El campo ¿Ha estado particularmente irritable o le han dado arranques de coraje? es obligatorio.',
                // 'ets_18.required' => 'El campo ¿Ha tenido dificultad para concentrarse? es obligatorio.',
                // 'ets_19.required' => 'El campo ¿Ha estado nervioso o constantemente en alerta? es obligatorio.',
                // 'ets_20.required' => 'El campo ¿Se ha sobresaltado fácilmente por cualquier cosa? es obligatorio.',
            ]);
        }

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
        $calificacionesDT = Calificaciones::where('id_registro', $registro->id)->first();

        Paginator::useBootstrap();

        if ($registro) {
            return view('resultados', compact('registro', 'calificacionesDT'));
        } else {
            return view('resultado_inexistente');
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