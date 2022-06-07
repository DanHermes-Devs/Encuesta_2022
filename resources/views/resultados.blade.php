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

</style>
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
@section('content')
    <div class="container bg-white mt-5 p-5">
        <div class="row justify-content-center">
            @php
                // $cookieGlobal = $_COOKIE['cookieCalificaciones'];
                // $registroID = App\Registro::where('token', $cookieGlobal)->first();
                $registroID = App\Registro::where('id', 13)->first();
                $Cfinal = App\Registro::where('id', 13)->first();
                $calificacionFinal = $Cfinal->item_1+$Cfinal->item_2+$Cfinal->item_3+$Cfinal->item_4+$Cfinal->item_5+$Cfinal->item_6+$Cfinal->item_7+$Cfinal->item_8+$Cfinal->item_9+$Cfinal->item_10+$Cfinal->item_11+$Cfinal->item_12+$Cfinal->item_13+$Cfinal->item_14+$Cfinal->item_15+$Cfinal->item_16+$Cfinal->item_17+$Cfinal->item_18+$Cfinal->item_19+$Cfinal->item_20+$Cfinal->item_21+$Cfinal->item_22+$Cfinal->item_23+$Cfinal->item_24+$Cfinal->item_25+$Cfinal->item_26+$Cfinal->item_27+$Cfinal->item_28+$Cfinal->item_29+$Cfinal->item_30+$Cfinal->item_31+$Cfinal->item_32+$Cfinal->item_33+$Cfinal->item_34+$Cfinal->item_35+$Cfinal->item_36+$Cfinal->item_37+$Cfinal->item_38+$Cfinal->item_39+$Cfinal->item_40+$Cfinal->item_41+$Cfinal->item_42+$Cfinal->item_43+$Cfinal->item_44+$Cfinal->item_45+$Cfinal->item_46+$Cfinal->item_47+$Cfinal->item_48+$Cfinal->item_49+$Cfinal->item_50+$Cfinal->item_51+$Cfinal->item_52+$Cfinal->item_53+$Cfinal->item_54+$Cfinal->item_55+$Cfinal->item_56+$Cfinal->item_57+$Cfinal->item_58+$Cfinal->item_59+$Cfinal->item_60+$Cfinal->item_61+$Cfinal->item_62+$Cfinal->item_63+$Cfinal->item_64+$Cfinal->item_65+$Cfinal->item_66+$Cfinal->item_67+$Cfinal->item_68+$Cfinal->item_69+$Cfinal->item_70+$Cfinal->item_71+$Cfinal->item_72;
            @endphp
            <div class="col-12 mb-5">
                <h2>Resultados</h2>

                <h4 class="font-weight-bold">información general</h4>
            </div>

            <div class="col-12 col-md-3">
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

                <p class="mb-3">
                    <b>Edad en años:</b>
                    <br>
                    {{ $registroID->edad }}
                </p>
            </div>

            <div class="col-12 col-md-3">
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

                <p class="mb-3">
                    <b>Tipo de puesto:</b>
                    <br>
                    {{ $registroID->tipo_puesto }}
                </p>
            </div>


            <div class="col-12 col-md-3">
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

                <p class="mb-3">
                    <b>Jornada de trabajo:</b>
                    <br>
                    {{ $registroID->jornada_trabajo }}
                </p>
            </div>

            <div class="col-12 col-md-3">
                <p class="mb-3">
                    <b>Rotación de turnos:</b>
                    <br>
                    {{ $registroID->rotacion_turnos }}
                </p>

                <p class="mb-3">
                    <b>Experiencia Laboral:</b>
                    <br>
                    {{ $registroID->tipo_contratacion }}
                </p>
            </div>
        </div>

        <div class="row mt-3">
            <table class="table table-stripped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Calificación</th>
                        <th scope="col">Resultado</th>
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
                                <span class="badge badge-warning">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal <= '99' || $calificacionFinal < '140')
                                <span class="badge badge-danger">{{ $calificacionFinal }}</span>
                            @elseif ($calificacionFinal >= '140')
                                
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
@endsection
