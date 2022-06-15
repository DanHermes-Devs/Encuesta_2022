@extends('layouts.app')

<style>
    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }

    thead.thead-dark {
        color: #fff;
        background-color: #343a40;
        border-color: #454d55;
        vertical-align: bottom;
        border-bottom: 2px solid #dee2e6;
        text-align: center;
    }

    .badge-success-low {
        color: #000;
        background-color: #92d050;
    }
    .badge-warning-low {
        color: #000;
        background-color: #ffff00;
    }

    .badge {
        width: -webkit-fill-available;
        border: 1px solid #000;
    }

</style>
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
@section('content')
    <div class="container bg-white mt-5 p-5">
        <div class="row justify-content-center">
            @php
                $registroID = App\Registro::where('id', $registro->id)->first();
                $Cfinal = App\Registro::where('id', $registro->id)->first();

                // Calificacion final
                $calificacionFinal = $Cfinal->item_1+$Cfinal->item_2+$Cfinal->item_3+$Cfinal->item_4+$Cfinal->item_5+$Cfinal->item_6+$Cfinal->item_7+$Cfinal->item_8+$Cfinal->item_9+$Cfinal->item_10+$Cfinal->item_11+$Cfinal->item_12+$Cfinal->item_13+$Cfinal->item_14+$Cfinal->item_15+$Cfinal->item_16+$Cfinal->item_17+$Cfinal->item_18+$Cfinal->item_19+$Cfinal->item_20+$Cfinal->item_21+$Cfinal->item_22+$Cfinal->item_23+$Cfinal->item_24+$Cfinal->item_25+$Cfinal->item_26+$Cfinal->item_27+$Cfinal->item_28+$Cfinal->item_29+$Cfinal->item_30+$Cfinal->item_31+$Cfinal->item_32+$Cfinal->item_33+$Cfinal->item_34+$Cfinal->item_35+$Cfinal->item_36+$Cfinal->item_37+$Cfinal->item_38+$Cfinal->item_39+$Cfinal->item_40+$Cfinal->item_41+$Cfinal->item_42+$Cfinal->item_43+$Cfinal->item_44+$Cfinal->item_45+$Cfinal->item_46+$Cfinal->item_47+$Cfinal->item_48+$Cfinal->item_49+$Cfinal->item_50+$Cfinal->item_51+$Cfinal->item_52+$Cfinal->item_53+$Cfinal->item_54+$Cfinal->item_55+$Cfinal->item_56+$Cfinal->item_57+$Cfinal->item_58+$Cfinal->item_59+$Cfinal->item_60+$Cfinal->item_61+$Cfinal->item_62+$Cfinal->item_63+$Cfinal->item_64+$Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68+$Cfinal->item_69+$Cfinal->item_70+$Cfinal->item_71+$Cfinal->item_72;

                // Ambiente de trabajo
                $Atrabajo = $Cfinal->item_1+$Cfinal->item_2+$Cfinal->item_3+$Cfinal->item_4+$Cfinal->item_5;

                // Factores propios de la actividad
                $Fpropios = $Cfinal->item_1+$Cfinal->item_2+$Cfinal->item_3+$Cfinal->item_4+$Cfinal->item_5+$Cfinal->item_6+$Cfinal->item_7+$Cfinal->item_8+$Cfinal->item_9+$Cfinal->item_10+$Cfinal->item_11+$Cfinal->item_12+$Cfinal->item_13+$Cfinal->item_14+$Cfinal->item_15+$Cfinal->item_16+$Cfinal->item_23+$Cfinal->item_24+$Cfinal->item_25+$Cfinal->item_26+$Cfinal->item_27+$Cfinal->item_28+$Cfinal->item_29+$Cfinal->item_30+$Cfinal->item_35+$Cfinal->item_36+$Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68;

                // Organización del tiempo de trabajo
                $Otiempo = $Cfinal->item_17+$Cfinal->item_18+$Cfinal->item_19+$Cfinal->item_20+$Cfinal->item_21+$Cfinal->item_22;

                // Liderazgo y relaciones en el trabajo
                $Lrelaciones = $Cfinal->item_31+$Cfinal->item_32+$Cfinal->item_33+$Cfinal->item_34+$Cfinal->item_35+$Cfinal->item_36+$Cfinal->item_37+$Cfinal->item_38+$Cfinal->item_39+$Cfinal->item_40+$Cfinal->item_41+$Cfinal->item_42+$Cfinal->item_43+$Cfinal->item_44+$Cfinal->item_45+$Cfinal->item_46+$Cfinal->item_57+$Cfinal->item_58+$Cfinal->item_59+$Cfinal->item_60+$Cfinal->item_61+$Cfinal->item_62+$Cfinal->item_63+$Cfinal->item_64+$Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68+$Cfinal->item_69+$Cfinal->item_70+$Cfinal->item_71+$Cfinal->item_72;

                // Entorno organizacional
                $Eorganizacional = $Cfinal->item_47+$Cfinal->item_48+$Cfinal->item_49+$Cfinal->item_50+$Cfinal->item_51+$Cfinal->item_52+$Cfinal->item_53+$Cfinal->item_54+$Cfinal->item_55+$Cfinal->item_56;

                // Condiciones en el ambiente de trabajo
                $Cambiente = $Cfinal->item_1+$Cfinal->item_2+$Cfinal->item_3+$Cfinal->item_4+$Cfinal->item_5;

                // Carga de trabajo
                $Ctrabajo = $Cfinal->item_6+$Cfinal->item_7+$Cfinal->item_8+$Cfinal->item_9+$Cfinal->item_10+$Cfinal->item_11+$Cfinal->item_12+$Cfinal->item_13+$Cfinal->item_14+$Cfinal->item_15+$Cfinal->item_16+$Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68;

                // Falta de control sobre el trabajo
                $Fcontrol = $Cfinal->item_23+$Cfinal->item_24+$Cfinal->item_25+$Cfinal->item_26+$Cfinal->item_27+$Cfinal->item_28+$Cfinal->item_29+$Cfinal->item_30+$Cfinal->item_35+$Cfinal->item_36;

                // Jornada de trabajo
                $Jtrabajo = $Cfinal->item_17+$Cfinal->item_18;

                // Interferencia en la relación trabajo-familia
                $Irelacion = $Cfinal->item_19+$Cfinal->item_20+$Cfinal->item_21+$Cfinal->item_22;

                // Liderazgo
                $Liderazgo = $Cfinal->item_31+$Cfinal->item_32+$Cfinal->item_33+$Cfinal->item_34+$Cfinal->item_37+$Cfinal->item_38+$Cfinal->item_39+$Cfinal->item_40+$Cfinal->item_41;

                // Relaciones en el trabajo
                $Rtrabajo = $Cfinal->item_42+$Cfinal->item_43+$Cfinal->item_44+$Cfinal->item_45+$Cfinal->item_46+$Cfinal->item_69+$Cfinal->item_70+$Cfinal->item_71+$Cfinal->item_72;

                // Violencia
                $Violencia = $Cfinal->item_57+$Cfinal->item_58+$Cfinal->item_59+$Cfinal->item_60+$Cfinal->item_61+$Cfinal->item_62+$Cfinal->item_63+$Cfinal->item_64;

                // Reconocimiento del desempeño
                $Rdesempeño = $Cfinal->item_47+$Cfinal->item_48+$Cfinal->item_49+$Cfinal->item_50+$Cfinal->item_51+$Cfinal->item_52;

                // Insuficiente sentido de pertenencia e, inestabilidad
                $Ipertenencia = $Cfinal->item_53+$Cfinal->item_54+$Cfinal->item_55+$Cfinal->item_56;

                // Condiciones peligrosas e inseguras
                $Cpeligrosas = $Cfinal->item_1+$Cfinal->item_3;

                // Condiciones deficientes e insalubres
                $Cdeficientes = $Cfinal->item_2+$Cfinal->item_4;

                // Trabajos peligrosos 2
                $Tpeligrosos = $Cfinal->item_5;

                // Cargas cuantitativas
                $Ccuantitativa = $Cfinal->item_6+$Cfinal->item_12;

                // Ritmos de trabajo acelerado
                $Rtrabajoacelerado = $Cfinal->item_7+$Cfinal->item_8;

                // Carga mental
                $Cmental = $Cfinal->item_9+$Cfinal->item_10+$Cfinal->item_11;

                // Cargas psicológicas emocionales
                $Cpsicologica = $Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68;

                // Cargas de alta responsabilidad
                $Calta = $Cfinal->item_13+$Cfinal->item_14;

                // Cargas contradictorias o inconsistentes
                $Ccontradictorias = $Cfinal->item_15+$Cfinal->item_16;

                // Falta de control y autonomía sobre el trabajo
                $Fcontrolautonomia = $Cfinal->item_25+$Cfinal->item_26+$Cfinal->item_27+$Cfinal->item_28;

                // Limitada o nula posibilidad de desarrollo
                $Ldesarrollo = $Cfinal->item_23+$Cfinal->item_24;

                // Insuficiente participación y manejo del cambio
                $Iparticipacion = $Cfinal->item_29+$Cfinal->item_30;

                // Limitada o inexistente capacitación
                $Lcapacitacion = $Cfinal->item_35+$Cfinal->item_36;

                // Jornadas de trabajo extensas
                $Jextensas = $Cfinal->item_17+$Cfinal->item_18;

                // Influencia del trabajo fuera del centro laboral
                $Itrabajofuera = $Cfinal->item_19+$Cfinal->item_20;

                // Influencia de las responsabilidades familiares
                $Iresponsabilidades = $Cfinal->item_21+$Cfinal->item_22;

                // Escaza claridad de funciones
                $Eclaridad = $Cfinal->item_31+$Cfinal->item_32+$Cfinal->item_33+$Cfinal->item_34;

                // Características del liderazgo
                $Caracteristicas = $Cfinal->item_37+$Cfinal->item_38+$Cfinal->item_39+$Cfinal->item_40+$Cfinal->item_41;

                // Relaciones sociales en el trabajo
                $Rsociales = $Cfinal->item_42+$Cfinal->item_43+$Cfinal->item_44+$Cfinal->item_45+$Cfinal->item_46;

                // Deficiente relación con los colaboradores que supervisa
                $Drelaciones = $Cfinal->item_69+$Cfinal->item_70+$Cfinal->item_71+$Cfinal->item_72;

                // Violencia laboral
                $ViolenciaLaboral = $Cfinal->item_57+$Cfinal->item_58+$Cfinal->item_59+$Cfinal->item_60+$Cfinal->item_61+$Cfinal->item_62+$Cfinal->item_63+$Cfinal->item_64;

                // Escasa o nula retroalimentación del desempeño
                $Eretroalimentacion = $Cfinal->item_47+$Cfinal->item_48;

                // Escaso o nulo reconocimiento y compensación
                $Ereconocimiento = $Cfinal->item_49+$Cfinal->item_50+$Cfinal->item_51+$Cfinal->item_52;

                // Limitado sentido de pertenencia
                $Lpertenencia = $Cfinal->item_55+$Cfinal->item_56;

                // Inestabilidad laboral
                $Iestabilidad = $Cfinal->item_53+$Cfinal->item_54;

                // Token empresa
                $tokenEmpresa = $registroID->id_empresa;

                // Token usuario
                $tokenUsuario = $registroID->id;

                // Crear registro de las calificaciones en la base de datos
                $calificaciones = new App\Calificaciones;
                $calificaciones->id_registro = $tokenUsuario;
                $calificaciones->id_empresa = $tokenEmpresa;
                $calificaciones->c_final = $calificacionFinal;

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

                // Guardar calificaciones
                $calificaciones->save();

            @endphp
            <div class="col-12 mb-5">
                <h2>Resultados</h2>

                <h4 class="font-weight-bold">información general</h4>
            </div>

            <div class="col-12 col-md-3">
                <p  class="mb-3">
                    <b>Correo electrónico:</b>
                    {{$registroID->email}}
                </p>
                <p class="mb-3">
                    <b>Sexo:</b>
                    <br>
                    {{ $registroID->sexo }}
                </p>

                <p class="mb-3">
                    <b>Estado civil:</b>
                    <br>
                    {{ $registroID->estado_civil }}
                </p>
            </div>

            <div class="col-12 col-md-3">
                <p class="mb-3">
                    <b>Edad en años:</b>
                    <br>
                    {{ $registroID->edad }}
                </p>
                <p class="mb-3">
                    <b>Antigüedad en puesto actual:</b>
                    <br>
                    {{ $registroID->antiguedad }}
                </p>

                <p class="mb-3">
                    <b>Estudios:</b>
                    <br>
                    {{ $registroID->estudios }}
                </p>
            </div>


            <div class="col-12 col-md-3">
                <p class="mb-3">
                    <b>Tipo de puesto:</b>
                    <br>
                    {{ $registroID->tipo_puesto }}
                </p>
                <p class="mb-3">
                    <b>Área:</b>
                    <br>
                    {{ $registroID->area }}
                </p>

                <p class="mb-3">
                    <b>Tipo de contratación:</b>
                    <br>
                    {{ $registroID->tipo_contratacion }}
                </p>
            </div>

            <div class="col-12 col-md-3">
                <p class="mb-3">
                    <b>Jornada de trabajo:</b>
                    <br>
                    {{ $registroID->jornada_trabajo }}
                </p>
                <p class="mb-3">
                    <b>Rotación de turnos:</b>
                    <br>
                    {{ $registroID->rotacion_turnos }}
                </p>

                <p class="mb-3">
                    <b>Experiencia Laboral:</b>
                    <br>
                    {{ $registroID->experiencia_laboral }}
                </p>
            </div>
        </div>

        <div class="mt-4">
            <table class="table table-stripped table-bordered w-100">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Calificaciones</th>
                        <th scope="col" class="text-center">Puntaje</th>
                        <th scope="col" class="text-center">Resultado</th>
                    </tr>
                </thead>

                <tbody>
                    <tr class="text-center">
                        <th scope="row">1</th>
                        <td scope="row">Calificación final del cuestionario</td>
                        <td scope="row">
                            @if ($calificacionFinal < '50')
                                <span class="badge badge-success">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal <= '50' || $calificacionFinal < '75')
                                <span class="badge badge-success-low">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal <= '75' || $calificacionFinal < '99')
                                <span class="badge badge-warning-low">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal <= '99' || $calificacionFinal < '140')
                                <span class="badge badge-warning">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal >= '140')
                                <span class="badge badge-danger">{{ $calificacionFinal }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($calificacionFinal < '50')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionFinal <= '50' || $calificacionFinal < '75')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionFinal <= '75' || $calificacionFinal < '99')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionFinal <= '99' || $calificacionFinal < '140')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionFinal >= '140')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">2</th>
                        <td scope="row">Ambiente de trabajo</td>
                        <td scope="row">
                            @if ($Atrabajo < '5')
                                <span class="badge badge-success">{{ $Atrabajo }}</span>
                            @elseif ($Atrabajo <= '5' || $Atrabajo < '9')
                                <span class="badge badge-success-low">{{ $Atrabajo }}</span>
                            @elseif ($Atrabajo <= '9' || $Atrabajo < '11')
                                <span class="badge badge-warning-low">{{ $Atrabajo }}</span>
                            @elseif ($Atrabajo <= '11' || $Atrabajo < '14')
                                <span class="badge badge-warning">{{ $Atrabajo }}</span>
                            @elseif ($Atrabajo >= '14')
                                <span class="badge badge-danger">{{ $Atrabajo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Atrabajo < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Atrabajo <= '5' || $Atrabajo < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Atrabajo <= '9' || $Atrabajo < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Atrabajo <= '11' || $Atrabajo < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Atrabajo >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">3</th>
                        <td scope="row">Factores propios de la actividad</td>
                        <td scope="row">
                            @if ($Fpropios < '15')
                                <span class="badge badge-success">{{ $Fpropios }}</span>
                            @elseif ($Fpropios <= '15' || $Fpropios < '30')
                                <span class="badge badge-success-low">{{ $Fpropios }}</span>
                            @elseif ($Fpropios <= '30' || $Fpropios < '45')
                                <span class="badge badge-warning-low">{{ $Fpropios }}</span>
                            @elseif ($Fpropios <= '45' || $Fpropios < '60')
                                <span class="badge badge-warning">{{ $Fpropios }}</span>
                            @elseif ($Fpropios >= '60')
                                <span class="badge badge-danger">{{ $Fpropios }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Fpropios < '15')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Fpropios <= '15' || $Fpropios < '30')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Fpropios <= '30' || $Fpropios < '45')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Fpropios <= '45' || $Fpropios < '60')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Fpropios >= '60')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">4</th>
                        <td scope="row">Organización del tiempo de trabajo</td>
                        <td scope="row">
                            @if ($Otiempo < '5')
                                <span class="badge badge-success">{{ $Otiempo }}</span>
                            @elseif ($Otiempo <= '5' || $Otiempo < '7')
                                <span class="badge badge-success-low">{{ $Otiempo }}</span>
                            @elseif ($Otiempo <= '7' || $Otiempo < '10')
                                <span class="badge badge-warning-low">{{ $Otiempo }}</span>
                            @elseif ($Otiempo <= '10' || $Otiempo < '13')
                                <span class="badge badge-warning">{{ $Otiempo }}</span>
                            @elseif ($Otiempo >= '13')
                                <span class="badge badge-danger">{{ $Otiempo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Otiempo < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Otiempo <= '5' || $Otiempo < '7')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Otiempo <= '7' || $Otiempo < '10')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Otiempo <= '10' || $Otiempo < '13')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Otiempo >= '13')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">5</th>
                        <td scope="row">Liderazgo y relaciones en el trabajo</td>
                        <td scope="row">
                            @if ($Lrelaciones < '14')
                                <span class="badge badge-success">{{ $Lrelaciones }}</span>
                            @elseif ($Lrelaciones <= '14' || $Lrelaciones < '29')
                                <span class="badge badge-success-low">{{ $Lrelaciones }}</span>
                            @elseif ($Lrelaciones <= '29' || $Lrelaciones < '42')
                                <span class="badge badge-warning-low">{{ $Lrelaciones }}</span>
                            @elseif ($Lrelaciones <= '42' || $Lrelaciones < '58')
                                <span class="badge badge-warning">{{ $Lrelaciones }}</span>
                            @elseif ($Lrelaciones >= '58')
                                <span class="badge badge-danger">{{ $Lrelaciones }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Lrelaciones < '14')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Lrelaciones <= '14' || $Lrelaciones < '29')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Lrelaciones <= '29' || $Lrelaciones < '42')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Lrelaciones <= '42' || $Lrelaciones < '58')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Lrelaciones >= '58')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">6</th>
                        <td scope="row">Entorno organizacional</td>
                        <td scope="row">
                            @if ($Eorganizacional < '10')
                                <span class="badge badge-success">{{ $Eorganizacional }}</span>
                            @elseif ($Eorganizacional <= '10' || $Eorganizacional < '14')
                                <span class="badge badge-success-low">{{ $Eorganizacional }}</span>
                            @elseif ($Eorganizacional <= '14' || $Eorganizacional < '18')
                                <span class="badge badge-warning-low">{{ $Eorganizacional }}</span>
                            @elseif ($Eorganizacional <= '18' || $Eorganizacional < '23')
                                <span class="badge badge-warning">{{ $Eorganizacional }}</span>
                            @elseif ($Eorganizacional >= '23')
                                <span class="badge badge-danger">{{ $Eorganizacional }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Eorganizacional < '10')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Eorganizacional <= '10' || $Eorganizacional < '14')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Eorganizacional <= '14' || $Eorganizacional < '18')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Eorganizacional <= '18' || $Eorganizacional < '23')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Eorganizacional >= '23')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">7</th>
                        <td scope="row">Condiciones en el ambiente de trabajo</td>
                        <td scope="row">
                            @if ($Cambiente < '5')
                                <span class="badge badge-success">{{ $Cambiente }}</span>
                            @elseif ($Cambiente <= '5' || $Cambiente < '9')
                                <span class="badge badge-success-low">{{ $Cambiente }}</span>
                            @elseif ($Cambiente <= '9' || $Cambiente < '11')
                                <span class="badge badge-warning-low">{{ $Cambiente }}</span>
                            @elseif ($Cambiente <= '11' || $Cambiente < '14')
                                <span class="badge badge-warning">{{ $Cambiente }}</span>
                            @elseif ($Cambiente >= '14')
                                <span class="badge badge-danger">{{ $Cambiente }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Cambiente < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Cambiente <= '5' || $Cambiente < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Cambiente <= '9' || $Cambiente < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Cambiente <= '11' || $Cambiente < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Cambiente >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">8</th>
                        <td scope="row">Carga de trabajo</td>
                        <td scope="row">
                            @if ($Ctrabajo < '15')
                                <span class="badge badge-success">{{ $Ctrabajo }}</span>
                            @elseif ($Ctrabajo <= '15' || $Ctrabajo < '21')
                                <span class="badge badge-success-low">{{ $Ctrabajo }}</span>
                            @elseif ($Ctrabajo <= '21' || $Ctrabajo < '27')
                                <span class="badge badge-warning-low">{{ $Ctrabajo }}</span>
                            @elseif ($Ctrabajo <= '27' || $Ctrabajo < '37')
                                <span class="badge badge-warning">{{ $Ctrabajo }}</span>
                            @elseif ($Ctrabajo >= '37')
                                <span class="badge badge-danger">{{ $Ctrabajo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ctrabajo < '15')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ctrabajo <= '15' || $Ctrabajo < '21')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ctrabajo <= '21' || $Ctrabajo < '27')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ctrabajo <= '27' || $Ctrabajo < '37')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ctrabajo >= '37')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">9</th>
                        <td scope="row">Falta de control sobre el trabajo</td>
                        <td scope="row">
                            @if ($Fcontrol < '11')
                                <span class="badge badge-success">{{ $Fcontrol }}</span>
                            @elseif ($Fcontrol <= '11' || $Fcontrol < '16')
                                <span class="badge badge-success-low">{{ $Fcontrol }}</span>
                            @elseif ($Fcontrol <= '16' || $Fcontrol < '21')
                                <span class="badge badge-warning-low">{{ $Fcontrol }}</span>
                            @elseif ($Fcontrol <= '21' || $Fcontrol < '25')
                                <span class="badge badge-warning">{{ $Fcontrol }}</span>
                            @elseif ($Fcontrol >= '25')
                                <span class="badge badge-danger">{{ $Fcontrol }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Fcontrol < '11')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Fcontrol <= '11' || $Fcontrol < '16')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Fcontrol <= '16' || $Fcontrol < '21')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Fcontrol <= '21' || $Fcontrol < '25')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Fcontrol >= '25')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">10</th>
                        <td scope="row">Jornada de trabajo</td>
                        <td scope="row">
                            @if ($Jtrabajo < '1')
                                <span class="badge badge-success">{{ $Jtrabajo }}</span>
                            @elseif ($Jtrabajo <= '1' || $Jtrabajo < '2')
                                <span class="badge badge-success-low">{{ $Jtrabajo }}</span>
                            @elseif ($Jtrabajo <= '2' || $Jtrabajo < '4')
                                <span class="badge badge-warning-low">{{ $Jtrabajo }}</span>
                            @elseif ($Jtrabajo <= '4' || $Jtrabajo < '6')
                                <span class="badge badge-warning">{{ $Jtrabajo }}</span>
                            @elseif ($Jtrabajo >= '6')
                                <span class="badge badge-danger">{{ $Jtrabajo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Jtrabajo < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Jtrabajo <= '1' || $Jtrabajo < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Jtrabajo <= '2' || $Jtrabajo < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Jtrabajo <= '4' || $Jtrabajo < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Jtrabajo >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">11</th>
                        <td scope="row">Interferencia en la relación trabajo-familia</td>
                        <td scope="row">
                            @if ($Irelacion < '4')
                                <span class="badge badge-success">{{ $Irelacion }}</span>
                            @elseif ($Irelacion <= '4' || $Irelacion < '6')
                                <span class="badge badge-success-low">{{ $Irelacion }}</span>
                            @elseif ($Irelacion <= '6' || $Irelacion < '8')
                                <span class="badge badge-warning-low">{{ $Irelacion }}</span>
                            @elseif ($Irelacion <= '8' || $Irelacion < '10')
                                <span class="badge badge-warning">{{ $Irelacion }}</span>
                            @elseif ($Irelacion >= '10')
                                <span class="badge badge-danger">{{ $Irelacion }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Irelacion < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Irelacion <= '4' || $Irelacion < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Irelacion <= '6' || $Irelacion < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Irelacion <= '8' || $Irelacion < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Irelacion >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">12</th>
                        <td scope="row">Liderazgo</td>
                        <td scope="row">
                            @if ($Liderazgo < '9')
                                <span class="badge badge-success">{{ $Liderazgo }}</span>
                            @elseif ($Liderazgo <= '9' || $Liderazgo < '12')
                                <span class="badge badge-success-low">{{ $Liderazgo }}</span>
                            @elseif ($Liderazgo <= '12' || $Liderazgo < '16')
                                <span class="badge badge-warning-low">{{ $Liderazgo }}</span>
                            @elseif ($Liderazgo <= '16' || $Liderazgo < '20')
                                <span class="badge badge-warning">{{ $Liderazgo }}</span>
                            @elseif ($Liderazgo >= '20')
                                <span class="badge badge-danger">{{ $Liderazgo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Liderazgo < '9')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Liderazgo <= '9' || $Liderazgo < '12')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Liderazgo <= '12' || $Liderazgo < '16')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Liderazgo <= '16' || $Liderazgo < '20')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Liderazgo >= '20')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">13</th>
                        <td scope="row">Relaciones en el trabajo</td>
                        <td scope="row">
                            @if ($Rtrabajo < '10')
                                <span class="badge badge-success">{{ $Rtrabajo }}</span>
                            @elseif ($Rtrabajo <= '10' || $Rtrabajo < '13')
                                <span class="badge badge-success-low">{{ $Rtrabajo }}</span>
                            @elseif ($Rtrabajo <= '13' || $Rtrabajo < '17')
                                <span class="badge badge-warning-low">{{ $Rtrabajo }}</span>
                            @elseif ($Rtrabajo <= '17' || $Rtrabajo < '21')
                                <span class="badge badge-warning">{{ $Rtrabajo }}</span>
                            @elseif ($Rtrabajo >= '21')
                                <span class="badge badge-danger">{{ $Rtrabajo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Rtrabajo < '10')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Rtrabajo <= '10' || $Rtrabajo < '13')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Rtrabajo <= '13' || $Rtrabajo < '17')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Rtrabajo <= '17' || $Rtrabajo < '21')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Rtrabajo >= '21')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">14</th>
                        <td scope="row">Violencia</td>
                        <td scope="row">
                            @if ($Violencia < '7')
                                <span class="badge badge-success">{{ $Violencia }}</span>
                            @elseif ($Violencia <= '7' || $Violencia < '10')
                                <span class="badge badge-success-low">{{ $Violencia }}</span>
                            @elseif ($Violencia <= '10' || $Violencia < '13')
                                <span class="badge badge-warning-low">{{ $Violencia }}</span>
                            @elseif ($Violencia <= '13' || $Violencia < '16')
                                <span class="badge badge-warning">{{ $Violencia }}</span>
                            @elseif ($Violencia >= '16')
                                <span class="badge badge-danger">{{ $Violencia }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Violencia < '7')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Violencia <= '7' || $Violencia < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Violencia <= '10' || $Violencia < '13')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Violencia <= '13' || $Violencia < '16')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Violencia >= '16')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">15</th>
                        <td scope="row">Reconocimiento del desempeño</td>
                        <td scope="row">
                            @if ($Rdesempeño < '6')
                                <span class="badge badge-success">{{ $Rdesempeño }}</span>
                            @elseif ($Rdesempeño <= '6' || $Rdesempeño < '10')
                                <span class="badge badge-success-low">{{ $Rdesempeño }}</span>
                            @elseif ($Rdesempeño <= '10' || $Rdesempeño < '14')
                                <span class="badge badge-warning-low">{{ $Rdesempeño }}</span>
                            @elseif ($Rdesempeño <= '14' || $Rdesempeño < '18')
                                <span class="badge badge-warning">{{ $Rdesempeño }}</span>
                            @elseif ($Rdesempeño >= '18')
                                <span class="badge badge-danger">{{ $Rdesempeño }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Rdesempeño < '6')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Rdesempeño <= '6' || $Rdesempeño < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Rdesempeño <= '10' || $Rdesempeño < '14')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Rdesempeño <= '14' || $Rdesempeño < '18')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Rdesempeño >= '18')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">16</th>
                        <td scope="row">Insuficiente sentido de pertenencia e, inestabilidad</td>
                        <td scope="row">
                            @if ($Ipertenencia < '4')
                                <span class="badge badge-success">{{ $Ipertenencia }}</span>
                            @elseif ($Ipertenencia <= '4' || $Ipertenencia < '6')
                                <span class="badge badge-success-low">{{ $Ipertenencia }}</span>
                            @elseif ($Ipertenencia <= '6' || $Ipertenencia < '8')
                                <span class="badge badge-warning-low">{{ $Ipertenencia }}</span>
                            @elseif ($Ipertenencia <= '8' || $Ipertenencia < '10')
                                <span class="badge badge-warning">{{ $Ipertenencia }}</span>
                            @elseif ($Ipertenencia >= '10')
                                <span class="badge badge-danger">{{ $Ipertenencia }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ipertenencia < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ipertenencia <= '4' || $Ipertenencia < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ipertenencia <= '6' || $Ipertenencia < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ipertenencia <= '8' || $Ipertenencia < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ipertenencia >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">17</th>
                        <td scope="row">Condiciones peligrosas e inseguras</td>
                        <td scope="row">
                            @if ($Cpeligrosas < '1')
                                <span class="badge badge-success">{{ $Cpeligrosas }}</span>
                            @elseif ($Cpeligrosas <= '1' || $Cpeligrosas < '2')
                                <span class="badge badge-success-low">{{ $Cpeligrosas }}</span>
                            @elseif ($Cpeligrosas <= '2' || $Cpeligrosas < '4')
                                <span class="badge badge-warning-low">{{ $Cpeligrosas }}</span>
                            @elseif ($Cpeligrosas <= '4' || $Cpeligrosas < '6')
                                <span class="badge badge-warning">{{ $Cpeligrosas }}</span>
                            @elseif ($Cpeligrosas >= '6')
                                <span class="badge badge-danger">{{ $Cpeligrosas }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Cpeligrosas < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Cpeligrosas <= '1' || $Cpeligrosas < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Cpeligrosas <= '2' || $Cpeligrosas < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Cpeligrosas <= '4' || $Cpeligrosas < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Cpeligrosas >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">18</th>
                        <td scope="row">Condiciones deficientes e insalubres</td>
                        <td scope="row">
                            @if ($Cdeficientes < '1')
                                <span class="badge badge-success">{{ $Cdeficientes }}</span>
                            @elseif ($Cdeficientes <= '1' || $Cdeficientes < '2')
                                <span class="badge badge-success-low">{{ $Cdeficientes }}</span>
                            @elseif ($Cdeficientes <= '2' || $Cdeficientes < '4')
                                <span class="badge badge-warning-low">{{ $Cdeficientes }}</span>
                            @elseif ($Cdeficientes <= '4' || $Cdeficientes < '6')
                                <span class="badge badge-warning">{{ $Cdeficientes }}</span>
                            @elseif ($Cdeficientes >= '6')
                                <span class="badge badge-danger">{{ $Cdeficientes }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Cdeficientes < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Cdeficientes <= '1' || $Cdeficientes < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Cdeficientes <= '2' || $Cdeficientes < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Cdeficientes <= '4' || $Cdeficientes < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Cdeficientes >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">19</th>
                        <td scope="row">Trabajos peligrosos</td>
                        <td scope="row">
                            @if ($Tpeligrosos = '0')
                                <span class="badge badge-success">{{ $Tpeligrosos }}</span>
                            @elseif ($Tpeligrosos = '1')
                                <span class="badge badge-success-low">{{ $Tpeligrosos }}</span>
                            @elseif ($Tpeligrosos = '2')
                                <span class="badge badge-warning-low">{{ $Tpeligrosos }}</span>
                            @elseif ($Tpeligrosos < '3')
                                <span class="badge badge-warning">{{ $Tpeligrosos }}</span>
                            @elseif ($Tpeligrosos = '4')
                                <span class="badge badge-danger">{{ $Tpeligrosos }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Tpeligrosos = '0')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Tpeligrosos = '1')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Tpeligrosos = '2')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Tpeligrosos < '3')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Tpeligrosos = '4')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">20</th>
                        <td scope="row">Cargas cuantitativas</td>
                        <td scope="row">
                            @if ($Ccuantitativa < '1')
                                <span class="badge badge-success">{{ $Ccuantitativa }}</span>
                            @elseif ($Ccuantitativa <= '1' || $Ccuantitativa < '2')
                                <span class="badge badge-success-low">{{ $Ccuantitativa }}</span>
                            @elseif ($Ccuantitativa <= '2' || $Ccuantitativa < '4')
                                <span class="badge badge-warning-low">{{ $Ccuantitativa }}</span>
                            @elseif ($Ccuantitativa <= '4' || $Ccuantitativa < '6')
                                <span class="badge badge-warning">{{ $Ccuantitativa }}</span>
                            @elseif ($Ccuantitativa >= '6')
                                <span class="badge badge-danger">{{ $Ccuantitativa }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ccuantitativa < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ccuantitativa <= '1' || $Ccuantitativa < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ccuantitativa <= '2' || $Ccuantitativa < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ccuantitativa <= '4' || $Ccuantitativa < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ccuantitativa >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">21</th>
                        <td scope="row">Ritmos de trabajo acelerado</td>
                        <td scope="row">
                            @if ($Rtrabajoacelerado < '1')
                                <span class="badge badge-success">{{ $Rtrabajoacelerado }}</span>
                            @elseif ($Rtrabajoacelerado <= '1' || $Rtrabajoacelerado < '2')
                                <span class="badge badge-success-low">{{ $Rtrabajoacelerado }}</span>
                            @elseif ($Rtrabajoacelerado <= '2' || $Rtrabajoacelerado < '4')
                                <span class="badge badge-warning-low">{{ $Rtrabajoacelerado }}</span>
                            @elseif ($Rtrabajoacelerado <= '4' || $Rtrabajoacelerado < '6')
                                <span class="badge badge-warning">{{ $Rtrabajoacelerado }}</span>
                            @elseif ($Rtrabajoacelerado >= '6')
                                <span class="badge badge-danger">{{ $Rtrabajoacelerado }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Rtrabajoacelerado < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Rtrabajoacelerado <= '1' || $Rtrabajoacelerado < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Rtrabajoacelerado <= '2' || $Rtrabajoacelerado < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Rtrabajoacelerado <= '4' || $Rtrabajoacelerado < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Rtrabajoacelerado >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">22</th>
                        <td scope="row">Carga mental</td>
                        <td scope="row">
                            @if ($Cmental < '3')
                                <span class="badge badge-success">{{ $Cmental }}</span>
                            @elseif ($Cmental <= '3' || $Cmental < '5')
                                <span class="badge badge-success-low">{{ $Cmental }}</span>
                            @elseif ($Cmental <= '5' || $Cmental < '7')
                                <span class="badge badge-warning-low">{{ $Cmental }}</span>
                            @elseif ($Cmental <= '7' || $Cmental < '9')
                                <span class="badge badge-warning">{{ $Cmental }}</span>
                            @elseif ($Cmental >= '9')
                                <span class="badge badge-danger">{{ $Cmental }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Cmental < '3')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Cmental <= '3' || $Cmental < '5')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Cmental <= '5' || $Cmental < '7')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Cmental <= '7' || $Cmental < '9')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Cmental >= '9')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">23</th>
                        <td scope="row">Cargas psicológicas emocionales</td>
                        <td scope="row">
                            @if ($Cpsicologica < '4')
                                <span class="badge badge-success">{{ $Cpsicologica }}</span>
                            @elseif ($Cpsicologica <= '4' || $Cpsicologica < '6')
                                <span class="badge badge-success-low">{{ $Cpsicologica }}</span>
                            @elseif ($Cpsicologica <= '6' || $Cpsicologica < '8')
                                <span class="badge badge-warning-low">{{ $Cpsicologica }}</span>
                            @elseif ($Cpsicologica <= '8' || $Cpsicologica < '10')
                                <span class="badge badge-warning">{{ $Cpsicologica }}</span>
                            @elseif ($Cpsicologica >= '10')
                                <span class="badge badge-danger">{{ $Cpsicologica }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Cpsicologica < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Cpsicologica <= '4' || $Cpsicologica < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Cpsicologica <= '6' || $Cpsicologica < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Cpsicologica <= '8' || $Cpsicologica < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Cpsicologica >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">24</th>
                        <td scope="row">Cargas de alta responsabilidad</td>
                        <td scope="row">
                            @if ($Calta < '1')
                                <span class="badge badge-success">{{ $Calta }}</span>
                            @elseif ($Calta <= '1' || $Calta < '2')
                                <span class="badge badge-success-low">{{ $Calta }}</span>
                            @elseif ($Calta <= '2' || $Calta < '4')
                                <span class="badge badge-warning-low">{{ $Calta }}</span>
                            @elseif ($Calta <= '4' || $Calta < '6')
                                <span class="badge badge-warning">{{ $Calta }}</span>
                            @elseif ($Calta >= '6')
                                <span class="badge badge-danger">{{ $Calta }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Calta < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Calta <= '1' || $Calta < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Calta <= '2' || $Calta < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Calta <= '4' || $Calta < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Calta >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">25</th>
                        <td scope="row">Cargas contradictorias o inconsistentes</td>
                        <td scope="row">
                            @if ($Ccontradictorias < '1')
                                <span class="badge badge-success">{{ $Ccontradictorias }}</span>
                            @elseif ($Ccontradictorias <= '1' || $Ccontradictorias < '2')
                                <span class="badge badge-success-low">{{ $Ccontradictorias }}</span>
                            @elseif ($Ccontradictorias <= '2' || $Ccontradictorias < '4')
                                <span class="badge badge-warning-low">{{ $Ccontradictorias }}</span>
                            @elseif ($Ccontradictorias <= '4' || $Ccontradictorias < '6')
                                <span class="badge badge-warning">{{ $Ccontradictorias }}</span>
                            @elseif ($Ccontradictorias >= '6')
                                <span class="badge badge-danger">{{ $Ccontradictorias }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ccontradictorias < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ccontradictorias <= '1' || $Ccontradictorias < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ccontradictorias <= '2' || $Ccontradictorias < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ccontradictorias <= '4' || $Ccontradictorias < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ccontradictorias >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">26</th>
                        <td scope="row">Falta de control y autonomía sobre el trabajo</td>
                        <td scope="row">
                            @if ($Fcontrolautonomia < '4')
                                <span class="badge badge-success">{{ $Fcontrolautonomia }}</span>
                            @elseif ($Fcontrolautonomia <= '4' || $Fcontrolautonomia < '6')
                                <span class="badge badge-success-low">{{ $Fcontrolautonomia }}</span>
                            @elseif ($Fcontrolautonomia <= '6' || $Fcontrolautonomia < '8')
                                <span class="badge badge-warning-low">{{ $Fcontrolautonomia }}</span>
                            @elseif ($Fcontrolautonomia <= '8' || $Fcontrolautonomia < '10')
                                <span class="badge badge-warning">{{ $Fcontrolautonomia }}</span>
                            @elseif ($Fcontrolautonomia >= '10')
                                <span class="badge badge-danger">{{ $Fcontrolautonomia }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Fcontrolautonomia < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Fcontrolautonomia <= '4' || $Fcontrolautonomia < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Fcontrolautonomia <= '6' || $Fcontrolautonomia < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Fcontrolautonomia <= '8' || $Fcontrolautonomia < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Fcontrolautonomia >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">27</th>
                        <td scope="row">Limitada o nula posibilidad de desarrollo</td>
                        <td scope="row">
                            @if ($Ldesarrollo < '1')
                                <span class="badge badge-success">{{ $Ldesarrollo }}</span>
                            @elseif ($Ldesarrollo <= '1' || $Ldesarrollo < '2')
                                <span class="badge badge-success-low">{{ $Ldesarrollo }}</span>
                            @elseif ($Ldesarrollo <= '2' || $Ldesarrollo < '4')
                                <span class="badge badge-warning-low">{{ $Ldesarrollo }}</span>
                            @elseif ($Ldesarrollo <= '4' || $Ldesarrollo < '6')
                                <span class="badge badge-warning">{{ $Ldesarrollo }}</span>
                            @elseif ($Ldesarrollo >= '6')
                                <span class="badge badge-danger">{{ $Ldesarrollo }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ldesarrollo < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ldesarrollo <= '1' || $Ldesarrollo < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ldesarrollo <= '2' || $Ldesarrollo < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ldesarrollo <= '4' || $Ldesarrollo < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ldesarrollo >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">28</th>
                        <td scope="row">Insuficiente participación y manejo del cambio</td>
                        <td scope="row">
                            @if ($Iparticipacion < '1')
                                <span class="badge badge-success">{{ $Iparticipacion }}</span>
                            @elseif ($Iparticipacion <= '1' || $Iparticipacion < '2')
                                <span class="badge badge-success-low">{{ $Iparticipacion }}</span>
                            @elseif ($Iparticipacion <= '2' || $Iparticipacion < '4')
                                <span class="badge badge-warning-low">{{ $Iparticipacion }}</span>
                            @elseif ($Iparticipacion <= '4' || $Iparticipacion < '6')
                                <span class="badge badge-warning">{{ $Iparticipacion }}</span>
                            @elseif ($Iparticipacion >= '6')
                                <span class="badge badge-danger">{{ $Iparticipacion }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Iparticipacion < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Iparticipacion <= '1' || $Iparticipacion < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Iparticipacion <= '2' || $Iparticipacion < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Iparticipacion <= '4' || $Iparticipacion < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Iparticipacion >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">29</th>
                        <td scope="row">Limitada o inexistente capacitación</td>
                        <td scope="row">
                            @if ($Lcapacitacion < '1')
                                <span class="badge badge-success">{{ $Lcapacitacion }}</span>
                            @elseif ($Lcapacitacion <= '1' || $Lcapacitacion < '2')
                                <span class="badge badge-success-low">{{ $Lcapacitacion }}</span>
                            @elseif ($Lcapacitacion <= '2' || $Lcapacitacion < '4')
                                <span class="badge badge-warning-low">{{ $Lcapacitacion }}</span>
                            @elseif ($Lcapacitacion <= '4' || $Lcapacitacion < '6')
                                <span class="badge badge-warning">{{ $Lcapacitacion }}</span>
                            @elseif ($Lcapacitacion >= '6')
                                <span class="badge badge-danger">{{ $Lcapacitacion }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Lcapacitacion < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Lcapacitacion <= '1' || $Lcapacitacion < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Lcapacitacion <= '2' || $Lcapacitacion < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Lcapacitacion <= '4' || $Lcapacitacion < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Lcapacitacion >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">30</th>
                        <td scope="row">Jornadas de trabajo extensas</td>
                        <td scope="row">
                            @if ($Jextensas < '1')
                                <span class="badge badge-success">{{ $Jextensas }}</span>
                            @elseif ($Jextensas <= '1' || $Jextensas < '2')
                                <span class="badge badge-success-low">{{ $Jextensas }}</span>
                            @elseif ($Jextensas <= '2' || $Jextensas < '4')
                                <span class="badge badge-warning-low">{{ $Jextensas }}</span>
                            @elseif ($Jextensas <= '4' || $Jextensas < '6')
                                <span class="badge badge-warning">{{ $Jextensas }}</span>
                            @elseif ($Jextensas >= '6')
                                <span class="badge badge-danger">{{ $Jextensas }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Jextensas < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Jextensas <= '1' || $Jextensas < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Jextensas <= '2' || $Jextensas < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Jextensas <= '4' || $Jextensas < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Jextensas >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">31</th>
                        <td scope="row">Influencia del trabajo fuera del centro laboral</td>
                        <td scope="row">
                            @if ($Itrabajofuera < '1')
                                <span class="badge badge-success">{{ $Itrabajofuera }}</span>
                            @elseif ($Itrabajofuera <= '1' || $Itrabajofuera < '2')
                                <span class="badge badge-success-low">{{ $Itrabajofuera }}</span>
                            @elseif ($Itrabajofuera <= '2' || $Itrabajofuera < '4')
                                <span class="badge badge-warning-low">{{ $Itrabajofuera }}</span>
                            @elseif ($Itrabajofuera <= '4' || $Itrabajofuera < '6')
                                <span class="badge badge-warning">{{ $Itrabajofuera }}</span>
                            @elseif ($Itrabajofuera >= '6')
                                <span class="badge badge-danger">{{ $Itrabajofuera }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Itrabajofuera < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Itrabajofuera <= '1' || $Itrabajofuera < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Itrabajofuera <= '2' || $Itrabajofuera < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Itrabajofuera <= '4' || $Itrabajofuera < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Itrabajofuera >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">32</th>
                        <td scope="row">Influencia de las responsabilidades familiares</td>
                        <td scope="row">
                            @if ($Iresponsabilidades < '1')
                                <span class="badge badge-success">{{ $Iresponsabilidades }}</span>
                            @elseif ($Iresponsabilidades <= '1' || $Iresponsabilidades < '2')
                                <span class="badge badge-success-low">{{ $Iresponsabilidades }}</span>
                            @elseif ($Iresponsabilidades <= '2' || $Iresponsabilidades < '4')
                                <span class="badge badge-warning-low">{{ $Iresponsabilidades }}</span>
                            @elseif ($Iresponsabilidades <= '4' || $Iresponsabilidades < '6')
                                <span class="badge badge-warning">{{ $Iresponsabilidades }}</span>
                            @elseif ($Iresponsabilidades >= '6')
                                <span class="badge badge-danger">{{ $Iresponsabilidades }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Iresponsabilidades < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Iresponsabilidades <= '1' || $Iresponsabilidades < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Iresponsabilidades <= '2' || $Iresponsabilidades < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Iresponsabilidades <= '4' || $Iresponsabilidades < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Iresponsabilidades >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">33</th>
                        <td scope="row">Escaza claridad de funciones</td>
                        <td scope="row">
                            @if ($Eclaridad < '4')
                                <span class="badge badge-success">{{ $Eclaridad }}</span>
                            @elseif ($Eclaridad <= '4' || $Eclaridad < '6')
                                <span class="badge badge-success-low">{{ $Eclaridad }}</span>
                            @elseif ($Eclaridad <= '6' || $Eclaridad < '8')
                                <span class="badge badge-warning-low">{{ $Eclaridad }}</span>
                            @elseif ($Eclaridad <= '8' || $Eclaridad < '10')
                                <span class="badge badge-warning">{{ $Eclaridad }}</span>
                            @elseif ($Eclaridad >= '10')
                                <span class="badge badge-danger">{{ $Eclaridad }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Eclaridad < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Eclaridad <= '4' || $Eclaridad < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Eclaridad <= '6' || $Eclaridad < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Eclaridad <= '8' || $Eclaridad < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Eclaridad >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">34</th>
                        <td scope="row">Características del liderazgo</td>
                        <td scope="row">
                            @if ($Caracteristicas < '5')
                                <span class="badge badge-success">{{ $Caracteristicas }}</span>
                            @elseif ($Caracteristicas <= '5' || $Caracteristicas < '9')
                                <span class="badge badge-success-low">{{ $Caracteristicas }}</span>
                            @elseif ($Caracteristicas <= '9' || $Caracteristicas < '11')
                                <span class="badge badge-warning-low">{{ $Caracteristicas }}</span>
                            @elseif ($Caracteristicas <= '11' || $Caracteristicas < '14')
                                <span class="badge badge-warning">{{ $Caracteristicas }}</span>
                            @elseif ($Caracteristicas >= '14')
                                <span class="badge badge-danger">{{ $Caracteristicas }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Caracteristicas < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Caracteristicas <= '5' || $Caracteristicas < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Caracteristicas <= '9' || $Caracteristicas < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Caracteristicas <= '11' || $Caracteristicas < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Caracteristicas >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">35</th>
                        <td scope="row">Relaciones sociales en el trabajo</td>
                        <td scope="row">
                            @if ($Rsociales < '5')
                                <span class="badge badge-success">{{ $Rsociales }}</span>
                            @elseif ($Rsociales <= '5' || $Rsociales < '9')
                                <span class="badge badge-success-low">{{ $Rsociales }}</span>
                            @elseif ($Rsociales <= '9' || $Rsociales < '11')
                                <span class="badge badge-warning-low">{{ $Rsociales }}</span>
                            @elseif ($Rsociales <= '11' || $Rsociales < '14')
                                <span class="badge badge-warning">{{ $Rsociales }}</span>
                            @elseif ($Rsociales >= '14')
                                <span class="badge badge-danger">{{ $Rsociales }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Rsociales < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Rsociales <= '5' || $Rsociales < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Rsociales <= '9' || $Rsociales < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Rsociales <= '11' || $Rsociales < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Rsociales >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">36</th>
                        <td scope="row">Deficiente relación con los colaboradores que supervisa</td>
                        <td scope="row">
                            @if ($Drelaciones < '4')
                                <span class="badge badge-success">{{ $Drelaciones }}</span>
                            @elseif ($Drelaciones <= '4' || $Drelaciones < '6')
                                <span class="badge badge-success-low">{{ $Drelaciones }}</span>
                            @elseif ($Drelaciones <= '6' || $Drelaciones < '8')
                                <span class="badge badge-warning-low">{{ $Drelaciones }}</span>
                            @elseif ($Drelaciones <= '8' || $Drelaciones < '10')
                                <span class="badge badge-warning">{{ $Drelaciones }}</span>
                            @elseif ($Drelaciones >= '10')
                                <span class="badge badge-danger">{{ $Drelaciones }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Drelaciones < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Drelaciones <= '4' || $Drelaciones < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Drelaciones <= '6' || $Drelaciones < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Drelaciones <= '8' || $Drelaciones < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Drelaciones >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">37</th>
                        <td scope="row">Violencia laboral</td>
                        <td scope="row">
                            @if ($ViolenciaLaboral < '7')
                                <span class="badge badge-success">{{ $ViolenciaLaboral }}</span>
                            @elseif ($ViolenciaLaboral <= '7' || $ViolenciaLaboral < '10')
                                <span class="badge badge-success-low">{{ $ViolenciaLaboral }}</span>
                            @elseif ($ViolenciaLaboral <= '10' || $ViolenciaLaboral < '13')
                                <span class="badge badge-warning-low">{{ $ViolenciaLaboral }}</span>
                            @elseif ($ViolenciaLaboral <= '13' || $ViolenciaLaboral < '16')
                                <span class="badge badge-warning">{{ $ViolenciaLaboral }}</span>
                            @elseif ($ViolenciaLaboral >= '16')
                                <span class="badge badge-danger">{{ $ViolenciaLaboral }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($ViolenciaLaboral < '7')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($ViolenciaLaboral <= '7' || $ViolenciaLaboral < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($ViolenciaLaboral <= '10' || $ViolenciaLaboral < '13')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($ViolenciaLaboral <= '13' || $ViolenciaLaboral < '16')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($ViolenciaLaboral >= '16')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">38</th>
                        <td scope="row">Escasa o nula retroalimentación del desempeño</td>
                        <td scope="row">
                            @if ($Eretroalimentacion < '1')
                                <span class="badge badge-success">{{ $Eretroalimentacion }}</span>
                            @elseif ($Eretroalimentacion <= '1' || $Eretroalimentacion < '2')
                                <span class="badge badge-success-low">{{ $Eretroalimentacion }}</span>
                            @elseif ($Eretroalimentacion <= '2' || $Eretroalimentacion < '4')
                                <span class="badge badge-warning-low">{{ $Eretroalimentacion }}</span>
                            @elseif ($Eretroalimentacion <= '4' || $Eretroalimentacion < '6')
                                <span class="badge badge-warning">{{ $Eretroalimentacion }}</span>
                            @elseif ($Eretroalimentacion >= '6')
                                <span class="badge badge-danger">{{ $Eretroalimentacion }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Eretroalimentacion < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Eretroalimentacion <= '1' || $Eretroalimentacion < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Eretroalimentacion <= '2' || $Eretroalimentacion < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Eretroalimentacion <= '4' || $Eretroalimentacion < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Eretroalimentacion >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">39</th>
                        <td scope="row">Escaso o nulo reconocimiento y compensación</td>
                        <td scope="row">
                            @if ($Ereconocimiento < '4')
                                <span class="badge badge-success">{{ $Ereconocimiento }}</span>
                            @elseif ($Ereconocimiento <= '4' || $Ereconocimiento < '6')
                                <span class="badge badge-success-low">{{ $Ereconocimiento }}</span>
                            @elseif ($Ereconocimiento <= '6' || $Ereconocimiento < '8')
                                <span class="badge badge-warning-low">{{ $Ereconocimiento }}</span>
                            @elseif ($Ereconocimiento <= '8' || $Ereconocimiento < '10')
                                <span class="badge badge-warning">{{ $Ereconocimiento }}</span>
                            @elseif ($Ereconocimiento >= '10')
                                <span class="badge badge-danger">{{ $Ereconocimiento }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Ereconocimiento < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Ereconocimiento <= '4' || $Ereconocimiento < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Ereconocimiento <= '6' || $Ereconocimiento < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Ereconocimiento <= '8' || $Ereconocimiento < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Ereconocimiento >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">40</th>
                        <td scope="row">Limitado sentido de pertenencia</td>
                        <td scope="row">
                            @if ($Lpertenencia < '1')
                                <span class="badge badge-success">{{ $Lpertenencia }}</span>
                            @elseif ($Lpertenencia <= '1' || $Lpertenencia < '2')
                                <span class="badge badge-success-low">{{ $Lpertenencia }}</span>
                            @elseif ($Lpertenencia <= '2' || $Lpertenencia < '4')
                                <span class="badge badge-warning-low">{{ $Lpertenencia }}</span>
                            @elseif ($Lpertenencia <= '4' || $Lpertenencia < '6')
                                <span class="badge badge-warning">{{ $Lpertenencia }}</span>
                            @elseif ($Lpertenencia >= '6')
                                <span class="badge badge-danger">{{ $Lpertenencia }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Lpertenencia < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Lpertenencia <= '1' || $Lpertenencia < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Lpertenencia <= '2' || $Lpertenencia < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Lpertenencia <= '4' || $Lpertenencia < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Lpertenencia >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">41</th>
                        <td scope="row">Inestabilidad laboral</td>
                        <td scope="row">
                            @if ($Iestabilidad < '1')
                                <span class="badge badge-success">{{ $Iestabilidad }}</span>
                            @elseif ($Iestabilidad <= '1' || $Iestabilidad < '2')
                                <span class="badge badge-success-low">{{ $Iestabilidad }}</span>
                            @elseif ($Iestabilidad <= '2' || $Iestabilidad < '4')
                                <span class="badge badge-warning-low">{{ $Iestabilidad }}</span>
                            @elseif ($Iestabilidad <= '4' || $Iestabilidad < '6')
                                <span class="badge badge-warning">{{ $Iestabilidad }}</span>
                            @elseif ($Iestabilidad >= '6')
                                <span class="badge badge-danger">{{ $Iestabilidad }}</span>
                            @endif
                        </td>
                        <td>
                            @if ($Iestabilidad < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($Iestabilidad <= '1' || $Iestabilidad < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($Iestabilidad <= '2' || $Iestabilidad < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($Iestabilidad <= '4' || $Iestabilidad < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($Iestabilidad >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif
                        </td>
                    </tr>
            </table>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>

    <script>
        $(function () {
            $('.table').DataTable({
                searching: true,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json'
                },
                lengthMenu: [
                    [10, 50, -1],
                    ['10', '50', 'Todos']
                ],
            });
        });
    </script>
@endsection