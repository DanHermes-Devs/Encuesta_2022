@extends('layouts.app')

<script src="https://cdn.jsdelivr.net/npm/pace-js@latest/pace.min.js"></script>

<style>
    .pace {
        -webkit-pointer-events: none;
        pointer-events: none;

        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;

        position: fixed;
        top: 0;
        left: 0;
        width: 100%;

        -webkit-transform: translate3d(0, -50px, 0);
        -ms-transform: translate3d(0, -50px, 0);
        transform: translate3d(0, -50px, 0);

        -webkit-transition: transform .5s ease-out;
        -ms-transition: transform .5s ease-out;
        transition: transform .5s ease-out;
    }

    .pace.pace-active {
        -webkit-transform: translate3d(0, 0, 0);
        -ms-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
    }

    .pace .pace-progress {
        display: block;
        position: fixed;
        z-index: 2000;
        top: 0;
        right: 100%;
        width: 100%;
        height: 10px;
        background: {{ $registro->empresa->colores_principales }} !important;

        pointer-events: none;
    }

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

    .bg-custom {
        background-color: {{ $registro->empresa->colores_principales }} !important;
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

            <div class="col-12 mb-5">

                <h2>Resultados</h2>

                <h4 class="font-weight-bold">información general</h4>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Correo electrónico:</b>

                    {{ $registro->email }}

                </p>

                <p class="mb-3">

                    <b>Sexo:</b>

                    <br>

                    {{ $registro->sexo }}

                </p>



                <p class="mb-3">

                    <b>Estado civil:</b>

                    <br>

                    {{ $registro->estado_civil }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Edad en años:</b>

                    <br>

                    {{ $registro->edad }}

                </p>

                <p class="mb-3">

                    <b>Antigüedad en puesto actual:</b>

                    <br>

                    {{ $registro->antiguedad }}

                </p>



                <p class="mb-3">

                    <b>Estudios:</b>

                    <br>

                    {{ $registro->estudios }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Área:</b>

                    <br>

                    {{ $registro->area }}

                </p>
                
                
                <p class="mb-3">

                    <b>Tipo de Puesto:</b>

                    <br>

                    {{ $registro->tipo_contratacion }}

                </p>



                <p class="mb-3">

                    <b>Tipo de contratación:</b>

                    <br>

                    {{ $registro->tipo_contratacion_two }}

                </p>

            </div>



            <div class="col-12 col-md-3">

                <p class="mb-3">

                    <b>Jornada de trabajo:</b>

                    <br>

                    @if ( $registro->jornada_trabajo === 'Otro' )
                        {{ $registro->jornada_trabajo }}: {{ $registro->jornada_trabajo_opcional }}
                        @else
                        {{ $registro->jornada_trabajo }}
                    @endif
                </p>

                <p class="mb-3">

                    <b>Rotación de turnos:</b>

                    <br>

                    {{ $registro->rotacion_turnos }}

                </p>


                <p class="mb-3">

                    <b>Experiencia Laboral:</b>

                    <br>

                    {{ $registro->experiencia_laboral }}

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

                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Calificacion Final</b></td>
                    </tr>
                    <tr class="text-center">

                        <th scope="row">1</th>

                        <td scope="row">Calificación final del cuestionario</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_final < '50')
                                <span class="badge badge-success">{{ $calificacionesDT->c_final }}</span>
                            @elseif ($calificacionesDT->c_final <= '50' || $calificacionesDT->c_final < '75')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_final }}</span>
                            @elseif ($calificacionesDT->c_final <= '75' || $calificacionesDT->c_final < '99')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_final }}</span>
                            @elseif ($calificacionesDT->c_final <= '99' || $calificacionesDT->c_final < '140')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_final }}</span>
                            @elseif ($calificacionesDT->c_final >= '140')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_final }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_final < '50')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_final <= '50' || $calificacionesDT->c_final < '75')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_final <= '75' || $calificacionesDT->c_final < '99')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_final <= '99' || $calificacionesDT->c_final < '140')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_final >= '140')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>
                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Calificacion por Categorías</b></td>
                    </tr>

                    <tr class="text-center">

                        <th scope="row">2</th>

                        <td scope="row">Ambiente de trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_1 < '5')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_1 }}</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '5' || $calificacionesDT->c_cat_1 < '9')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_1 }}</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '9' || $calificacionesDT->c_cat_1 < '11')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_1 }}</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '11' || $calificacionesDT->c_cat_1 < '14')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_1 }}</span>
                            @elseif ($calificacionesDT->c_cat_1 >= '14')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_1 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_1 < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '5' || $calificacionesDT->c_cat_1 < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '9' || $calificacionesDT->c_cat_1 < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_1 <= '11' || $calificacionesDT->c_cat_1 < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_1 >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">3</th>

                        <td scope="row">Factores propios de la actividad</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_2 < '15')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_2 }}</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '15' || $calificacionesDT->c_cat_2 < '30')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_2 }}</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '30' || $calificacionesDT->c_cat_2 < '45')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_2 }}</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '45' || $calificacionesDT->c_cat_2 < '60')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_2 }}</span>
                            @elseif ($calificacionesDT->c_cat_2 >= '60')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_2 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_2 < '15')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '15' || $calificacionesDT->c_cat_2 < '30')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '30' || $calificacionesDT->c_cat_2 < '45')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_2 <= '45' || $calificacionesDT->c_cat_2 < '60')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_2 >= '60')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">4</th>

                        <td scope="row">Organización del tiempo de trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_3 < '5')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_3 }}</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '5' || $calificacionesDT->c_cat_3 < '7')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_3 }}</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '7' || $calificacionesDT->c_cat_3 < '10')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_3 }}</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '10' || $calificacionesDT->c_cat_3 < '13')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_3 }}</span>
                            @elseif ($calificacionesDT->c_cat_3 >= '13')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_3 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_3 < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '5' || $calificacionesDT->c_cat_3 < '7')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '7' || $calificacionesDT->c_cat_3 < '10')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_3 <= '10' || $calificacionesDT->c_cat_3 < '13')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_3 >= '13')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">5</th>

                        <td scope="row">Liderazgo y relaciones en el trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_4 < '14')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_4 }}</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '14' || $calificacionesDT->c_cat_4 < '29')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_4 }}</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '29' || $calificacionesDT->c_cat_4 < '42')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_4 }}</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '42' || $calificacionesDT->c_cat_4 < '58')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_4 }}</span>
                            @elseif ($calificacionesDT->c_cat_4 >= '58')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_4 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_4 < '14')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '14' || $calificacionesDT->c_cat_4 < '29')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '29' || $calificacionesDT->c_cat_4 < '42')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_4 <= '42' || $calificacionesDT->c_cat_4 < '58')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_4 >= '58')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">6</th>

                        <td scope="row">Entorno organizacional</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_5 < '10')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_5 }}</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '10' || $calificacionesDT->c_cat_5 < '14')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_5 }}</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '14' || $calificacionesDT->c_cat_5 < '18')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_5 }}</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '18' || $calificacionesDT->c_cat_5 < '23')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_5 }}</span>
                            @elseif ($calificacionesDT->c_cat_5 >= '23')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_5 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_5 < '10')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '10' || $calificacionesDT->c_cat_5 < '14')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '14' || $calificacionesDT->c_cat_5 < '18')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_5 <= '18' || $calificacionesDT->c_cat_5 < '23')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_5 >= '23')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Calificacion por Dominio</b></td>
                    </tr>

                    <tr class="text-center">

                        <th scope="row">7</th>

                        <td scope="row">Condiciones en el ambiente de trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_1 < '5')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_1 }}</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '5' || $calificacionesDT->c_dominio_1 < '9')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_1 }}</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '9' || $calificacionesDT->c_dominio_1 < '11')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_1 }}</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '11' || $calificacionesDT->c_dominio_1 < '14')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_1 }}</span>
                            @elseif ($calificacionesDT->c_dominio_1 >= '14')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_1 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_1 < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '5' || $calificacionesDT->c_dominio_1 < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '9' || $calificacionesDT->c_dominio_1 < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_1 <= '11' || $calificacionesDT->c_dominio_1 < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_1 >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">8</th>

                        <td scope="row">Carga de trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_2 < '15')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_2 }}</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '15' || $calificacionesDT->c_dominio_2 < '21')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_2 }}</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '21' || $calificacionesDT->c_dominio_2 < '27')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_2 }}</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '27' || $calificacionesDT->c_dominio_2 < '37')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_2 }}</span>
                            @elseif ($calificacionesDT->c_dominio_2 >= '37')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_2 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_2 < '15')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '15' || $calificacionesDT->c_dominio_2 < '21')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '21' || $calificacionesDT->c_dominio_2 < '27')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_2 <= '27' || $calificacionesDT->c_dominio_2 < '37')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_2 >= '37')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">9</th>

                        <td scope="row">Falta de control sobre el trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_3 < '11')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_3 }}</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '11' || $calificacionesDT->c_dominio_3 < '16')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_3 }}</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '16' || $calificacionesDT->c_dominio_3 < '21')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_3 }}</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '21' || $calificacionesDT->c_dominio_3 < '25')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_3 }}</span>
                            @elseif ($calificacionesDT->c_dominio_3 >= '25')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_3 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_3 < '11')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '11' || $calificacionesDT->c_dominio_3 < '16')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '16' || $calificacionesDT->c_dominio_3 < '21')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_3 <= '21' || $calificacionesDT->c_dominio_3 < '25')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_3 >= '25')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">10</th>

                        <td scope="row">Jornada de trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_4 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_4 }}</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '1' || $calificacionesDT->c_dominio_4 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_4 }}</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '2' || $calificacionesDT->c_dominio_4 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_4 }}</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '4' || $calificacionesDT->c_dominio_4 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_4 }}</span>
                            @elseif ($calificacionesDT->c_dominio_4 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_4 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_4 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '1' || $calificacionesDT->c_dominio_4 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '2' || $calificacionesDT->c_dominio_4 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_4 <= '4' || $calificacionesDT->c_dominio_4 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_4 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">11</th>

                        <td scope="row">Interferencia en la relación trabajo-familia</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_5 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_5 }}</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '4' || $calificacionesDT->c_dominio_5 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_5 }}</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '6' || $calificacionesDT->c_dominio_5 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_5 }}</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '8' || $calificacionesDT->c_dominio_5 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_5 }}</span>
                            @elseif ($calificacionesDT->c_dominio_5 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_5 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_5 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '4' || $calificacionesDT->c_dominio_5 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '6' || $calificacionesDT->c_dominio_5 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_5 <= '8' || $calificacionesDT->c_dominio_5 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_5 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">12</th>

                        <td scope="row">Liderazgo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_6 < '9')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_6 }}</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '9' || $calificacionesDT->c_dominio_6 < '12')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_6 }}</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '12' || $calificacionesDT->c_dominio_6 < '16')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_6 }}</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '16' || $calificacionesDT->c_dominio_6 < '20')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_6 }}</span>
                            @elseif ($calificacionesDT->c_dominio_6 >= '20')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_6 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_6 < '9')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '9' || $calificacionesDT->c_dominio_6 < '12')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '12' || $calificacionesDT->c_dominio_6 < '16')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_6 <= '16' || $calificacionesDT->c_dominio_6 < '20')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_6 >= '20')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">13</th>

                        <td scope="row">Relaciones en el trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_7 < '10')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_7 }}</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '10' || $calificacionesDT->c_dominio_7 < '13')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_7 }}</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '13' || $calificacionesDT->c_dominio_7 < '17')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_7 }}</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '17' || $calificacionesDT->c_dominio_7 < '21')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_7 }}</span>
                            @elseif ($calificacionesDT->c_dominio_7 >= '21')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_7 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_7 < '10')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '10' || $calificacionesDT->c_dominio_7 < '13')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '13' || $calificacionesDT->c_dominio_7 < '17')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_7 <= '17' || $calificacionesDT->c_dominio_7 < '21')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_7 >= '21')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">14</th>

                        <td scope="row">Violencia</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_8 < '7')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_8 }}</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '7' || $calificacionesDT->c_dominio_8 < '10')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_8 }}</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '10' || $calificacionesDT->c_dominio_8 < '13')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_8 }}</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '13' || $calificacionesDT->c_dominio_8 < '16')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_8 }}</span>
                            @elseif ($calificacionesDT->c_dominio_8 >= '16')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_8 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_8 < '7')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '7' || $calificacionesDT->c_dominio_8 < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '10' || $calificacionesDT->c_dominio_8 < '13')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_8 <= '13' || $calificacionesDT->c_dominio_8 < '16')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_8 >= '16')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">15</th>

                        <td scope="row">Reconocimiento del desempeño</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_9 < '6')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_9 }}</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '6' || $calificacionesDT->c_dominio_9 < '10')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_9 }}</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '10' || $calificacionesDT->c_dominio_9 < '14')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_9 }}</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '14' || $calificacionesDT->c_dominio_9 < '18')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_9 }}</span>
                            @elseif ($calificacionesDT->c_dominio_9 >= '18')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_9 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_9 < '6')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '6' || $calificacionesDT->c_dominio_9 < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '10' || $calificacionesDT->c_dominio_9 < '14')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_9 <= '14' || $calificacionesDT->c_dominio_9 < '18')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_9 >= '18')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">16</th>

                        <td scope="row">Insuficiente sentido de pertenencia e, inestabilidad</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dominio_10 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dominio_10 }}</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '4' || $calificacionesDT->c_dominio_10 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dominio_10 }}</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '6' || $calificacionesDT->c_dominio_10 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dominio_10 }}</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '8' || $calificacionesDT->c_dominio_10 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dominio_10 }}</span>
                            @elseif ($calificacionesDT->c_dominio_10 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dominio_10 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dominio_10 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '4' || $calificacionesDT->c_dominio_10 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '6' || $calificacionesDT->c_dominio_10 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dominio_10 <= '8' || $calificacionesDT->c_dominio_10 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dominio_10 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>
                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Calificacion por Dimensión</b></td>
                    </tr>
                    <tr class="text-center">

                        <th scope="row">17</th>

                        <td scope="row">Condiciones peligrosas e inseguras</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_1 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_1 }}</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '1' || $calificacionesDT->c_dimension_1 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_1 }}</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '2' || $calificacionesDT->c_dimension_1 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_1 }}</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '4' || $calificacionesDT->c_dimension_1 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_1 }}</span>
                            @elseif ($calificacionesDT->c_dimension_1 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_1 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_1 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '1' || $calificacionesDT->c_dimension_1 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '2' || $calificacionesDT->c_dimension_1 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_1 <= '4' || $calificacionesDT->c_dimension_1 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_1 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">18</th>

                        <td scope="row">Condiciones deficientes e insalubres</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_2 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_2 }}</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '1' || $calificacionesDT->c_dimension_2 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_2 }}</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '2' || $calificacionesDT->c_dimension_2 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_2 }}</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '4' || $calificacionesDT->c_dimension_2 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_2 }}</span>
                            @elseif ($calificacionesDT->c_dimension_2 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_2 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_2 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '1' || $calificacionesDT->c_dimension_2 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '2' || $calificacionesDT->c_dimension_2 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_2 <= '4' || $calificacionesDT->c_dimension_2 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_2 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">19</th>

                        <td scope="row">Trabajos peligrosos</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_3 = '0')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_3 }}</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '1')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_3 }}</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '2')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_3 }}</span>
                            @elseif ($calificacionesDT->c_dimension_3 < '3')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_3 }}</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '4')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_3 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_3 = '0')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '1')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '2')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_3 < '3')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_3 = '4')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">20</th>

                        <td scope="row">Cargas cuantitativas</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_4 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_4 }}</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '1' || $calificacionesDT->c_dimension_4 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_4 }}</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '2' || $calificacionesDT->c_dimension_4 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_4 }}</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '4' || $calificacionesDT->c_dimension_4 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_4 }}</span>
                            @elseif ($calificacionesDT->c_dimension_4 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_4 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_4 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '1' || $calificacionesDT->c_dimension_4 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '2' || $calificacionesDT->c_dimension_4 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_4 <= '4' || $calificacionesDT->c_dimension_4 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_4 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">21</th>

                        <td scope="row">Ritmos de trabajo acelerado</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_5 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_5 }}</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '1' || $calificacionesDT->c_dimension_5 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_5 }}</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '2' || $calificacionesDT->c_dimension_5 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_5 }}</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '4' || $calificacionesDT->c_dimension_5 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_5 }}</span>
                            @elseif ($calificacionesDT->c_dimension_5 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_5 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_5 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '1' || $calificacionesDT->c_dimension_5 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '2' || $calificacionesDT->c_dimension_5 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_5 <= '4' || $calificacionesDT->c_dimension_5 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_5 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">22</th>

                        <td scope="row">Carga mental</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_6 < '3')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_6 }}</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '3' || $calificacionesDT->c_dimension_6 < '5')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_6 }}</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '5' || $calificacionesDT->c_dimension_6 < '7')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_6 }}</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '7' || $calificacionesDT->c_dimension_6 < '9')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_6 }}</span>
                            @elseif ($calificacionesDT->c_dimension_6 >= '9')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_6 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_6 < '3')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '3' || $calificacionesDT->c_dimension_6 < '5')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '5' || $calificacionesDT->c_dimension_6 < '7')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_6 <= '7' || $calificacionesDT->c_dimension_6 < '9')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_6 >= '9')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">23</th>

                        <td scope="row">Cargas psicológicas emocionales</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_7 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_7 }}</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '4' || $calificacionesDT->c_dimension_7 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_7 }}</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '6' || $calificacionesDT->c_dimension_7 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_7 }}</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '8' || $calificacionesDT->c_dimension_7 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_7 }}</span>
                            @elseif ($calificacionesDT->c_dimension_7 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_7 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_7 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '4' || $calificacionesDT->c_dimension_7 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '6' || $calificacionesDT->c_dimension_7 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_7 <= '8' || $calificacionesDT->c_dimension_7 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_7 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">24</th>

                        <td scope="row">Cargas de alta responsabilidad</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_8 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_8 }}</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '1' || $calificacionesDT->c_dimension_8 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_8 }}</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '2' || $calificacionesDT->c_dimension_8 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_8 }}</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '4' || $calificacionesDT->c_dimension_8 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_8 }}</span>
                            @elseif ($calificacionesDT->c_dimension_8 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_8 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_8 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '1' || $calificacionesDT->c_dimension_8 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '2' || $calificacionesDT->c_dimension_8 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_8 <= '4' || $calificacionesDT->c_dimension_8 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_8 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">25</th>

                        <td scope="row">Cargas contradictorias o inconsistentes</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_9 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_9 }}</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '1' || $calificacionesDT->c_dimension_9 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_9 }}</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '2' || $calificacionesDT->c_dimension_9 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_9 }}</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '4' || $calificacionesDT->c_dimension_9 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_9 }}</span>
                            @elseif ($calificacionesDT->c_dimension_9 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_9 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_9 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '1' || $calificacionesDT->c_dimension_9 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '2' || $calificacionesDT->c_dimension_9 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_9 <= '4' || $calificacionesDT->c_dimension_9 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_9 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">26</th>

                        <td scope="row">Falta de control y autonomía sobre el trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_10 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_10 }}</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '4' || $calificacionesDT->c_dimension_10 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_10 }}</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '6' || $calificacionesDT->c_dimension_10 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_10 }}</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '8' || $calificacionesDT->c_dimension_10 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_10 }}</span>
                            @elseif ($calificacionesDT->c_dimension_10 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_10 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_10 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '4' || $calificacionesDT->c_dimension_10 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '6' || $calificacionesDT->c_dimension_10 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_10 <= '8' || $calificacionesDT->c_dimension_10 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_10 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">27</th>

                        <td scope="row">Limitada o nula posibilidad de desarrollo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_11 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_11 }}</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '1' || $calificacionesDT->c_dimension_11 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_11 }}</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '2' || $calificacionesDT->c_dimension_11 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_11 }}</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '4' || $calificacionesDT->c_dimension_11 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_11 }}</span>
                            @elseif ($calificacionesDT->c_dimension_11 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_11 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_11 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '1' || $calificacionesDT->c_dimension_11 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '2' || $calificacionesDT->c_dimension_11 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_11 <= '4' || $calificacionesDT->c_dimension_11 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_11 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">28</th>

                        <td scope="row">Insuficiente participación y manejo del cambio</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_12 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_12 }}</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '1' || $calificacionesDT->c_dimension_12 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_12 }}</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '2' || $calificacionesDT->c_dimension_12 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_12 }}</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '4' || $calificacionesDT->c_dimension_12 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_12 }}</span>
                            @elseif ($calificacionesDT->c_dimension_12 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_12 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_12 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '1' || $calificacionesDT->c_dimension_12 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '2' || $calificacionesDT->c_dimension_12 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_12 <= '4' || $calificacionesDT->c_dimension_12 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_12 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">29</th>

                        <td scope="row">Limitada o inexistente capacitación</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_13 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_13 }}</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '1' || $calificacionesDT->c_dimension_13 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_13 }}</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '2' || $calificacionesDT->c_dimension_13 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_13 }}</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '4' || $calificacionesDT->c_dimension_13 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_13 }}</span>
                            @elseif ($calificacionesDT->c_dimension_13 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_13 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_13 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '1' || $calificacionesDT->c_dimension_13 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '2' || $calificacionesDT->c_dimension_13 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_13 <= '4' || $calificacionesDT->c_dimension_13 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_13 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">30</th>

                        <td scope="row">Jornadas de trabajo extensas</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_14 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_14 }}</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '1' || $calificacionesDT->c_dimension_14 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_14 }}</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '2' || $calificacionesDT->c_dimension_14 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_14 }}</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '4' || $calificacionesDT->c_dimension_14 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_14 }}</span>
                            @elseif ($calificacionesDT->c_dimension_14 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_14 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_14 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '1' || $calificacionesDT->c_dimension_14 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '2' || $calificacionesDT->c_dimension_14 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_14 <= '4' || $calificacionesDT->c_dimension_14 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_14 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">31</th>

                        <td scope="row">Influencia del trabajo fuera del centro laboral</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_15 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_15 }}</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '1' || $calificacionesDT->c_dimension_15 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_15 }}</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '2' || $calificacionesDT->c_dimension_15 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_15 }}</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '4' || $calificacionesDT->c_dimension_15 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_15 }}</span>
                            @elseif ($calificacionesDT->c_dimension_15 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_15 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_15 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '1' || $calificacionesDT->c_dimension_15 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '2' || $calificacionesDT->c_dimension_15 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_15 <= '4' || $calificacionesDT->c_dimension_15 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_15 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">32</th>

                        <td scope="row">Influencia de las responsabilidades familiares</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_16 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_16 }}</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '1' || $calificacionesDT->c_dimension_16 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_16 }}</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '2' || $calificacionesDT->c_dimension_16 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_16 }}</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '4' || $calificacionesDT->c_dimension_16 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_16 }}</span>
                            @elseif ($calificacionesDT->c_dimension_16 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_16 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_16 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '1' || $calificacionesDT->c_dimension_16 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '2' || $calificacionesDT->c_dimension_16 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_16 <= '4' || $calificacionesDT->c_dimension_16 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_16 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">33</th>

                        <td scope="row">Escaza claridad de funciones</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_17 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_17 }}</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '4' || $calificacionesDT->c_dimension_17 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_17 }}</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '6' || $calificacionesDT->c_dimension_17 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_17 }}</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '8' || $calificacionesDT->c_dimension_17 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_17 }}</span>
                            @elseif ($calificacionesDT->c_dimension_17 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_17 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_17 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '4' || $calificacionesDT->c_dimension_17 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '6' || $calificacionesDT->c_dimension_17 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_17 <= '8' || $calificacionesDT->c_dimension_17 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_17 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">34</th>

                        <td scope="row">Características del liderazgo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_6 < '5')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_6 }}</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '5' || $calificacionesDT->c_cat_6 < '9')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_6 }}</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '9' || $calificacionesDT->c_cat_6 < '11')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_6 }}</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '11' || $calificacionesDT->c_cat_6 < '14')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_6 }}</span>
                            @elseif ($calificacionesDT->c_cat_6 >= '14')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_6 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_6 < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '5' || $calificacionesDT->c_cat_6 < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '9' || $calificacionesDT->c_cat_6 < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_6 <= '11' || $calificacionesDT->c_cat_6 < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_6 >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">35</th>

                        <td scope="row">Relaciones sociales en el trabajo</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_cat_7 < '5')
                                <span class="badge badge-success">{{ $calificacionesDT->c_cat_7 }}</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '5' || $calificacionesDT->c_cat_7 < '9')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_cat_7 }}</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '9' || $calificacionesDT->c_cat_7 < '11')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_cat_7 }}</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '11' || $calificacionesDT->c_cat_7 < '14')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_cat_7 }}</span>
                            @elseif ($calificacionesDT->c_cat_7 >= '14')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_cat_7 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_cat_7 < '5')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '5' || $calificacionesDT->c_cat_7 < '9')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '9' || $calificacionesDT->c_cat_7 < '11')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_cat_7 <= '11' || $calificacionesDT->c_cat_7 < '14')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_cat_7 >= '14')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">36</th>

                        <td scope="row">Deficiente relación con los colaboradores que supervisa</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_18 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_18 }}</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '4' || $calificacionesDT->c_dimension_18 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_18 }}</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '6' || $calificacionesDT->c_dimension_18 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_18 }}</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '8' || $calificacionesDT->c_dimension_18 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_18 }}</span>
                            @elseif ($calificacionesDT->c_dimension_18 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_18 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_18 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '4' || $calificacionesDT->c_dimension_18 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '6' || $calificacionesDT->c_dimension_18 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_18 <= '8' || $calificacionesDT->c_dimension_18 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_18 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">37</th>

                        <td scope="row">Violencia laboral</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_19 < '7')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_19 }}</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '7' || $calificacionesDT->c_dimension_19 < '10')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_19 }}</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '10' || $calificacionesDT->c_dimension_19 < '13')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_19 }}</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '13' || $calificacionesDT->c_dimension_19 < '16')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_19 }}</span>
                            @elseif ($calificacionesDT->c_dimension_19 >= '16')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_19 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_19 < '7')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '7' || $calificacionesDT->c_dimension_19 < '10')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '10' || $calificacionesDT->c_dimension_19 < '13')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_19 <= '13' || $calificacionesDT->c_dimension_19 < '16')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_19 >= '16')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">38</th>

                        <td scope="row">Escasa o nula retroalimentación del desempeño</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_20 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_20 }}</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '1' || $calificacionesDT->c_dimension_20 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_20 }}</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '2' || $calificacionesDT->c_dimension_20 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_20 }}</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '4' || $calificacionesDT->c_dimension_20 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_20 }}</span>
                            @elseif ($calificacionesDT->c_dimension_20 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_20 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_20 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '1' || $calificacionesDT->c_dimension_20 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '2' || $calificacionesDT->c_dimension_20 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_20 <= '4' || $calificacionesDT->c_dimension_20 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_20 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">39</th>

                        <td scope="row">Escaso o nulo reconocimiento y compensación</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_21 < '4')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_21 }}</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '4' || $calificacionesDT->c_dimension_21 < '6')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_21 }}</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '6' || $calificacionesDT->c_dimension_21 < '8')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_21 }}</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '8' || $calificacionesDT->c_dimension_21 < '10')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_21 }}</span>
                            @elseif ($calificacionesDT->c_dimension_21 >= '10')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_21 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_21 < '4')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '4' || $calificacionesDT->c_dimension_21 < '6')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '6' || $calificacionesDT->c_dimension_21 < '8')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_21 <= '8' || $calificacionesDT->c_dimension_21 < '10')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_21 >= '10')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">40</th>

                        <td scope="row">Limitado sentido de pertenencia</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_22 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_22 }}</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '1' || $calificacionesDT->c_dimension_22 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_22 }}</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '2' || $calificacionesDT->c_dimension_22 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_22 }}</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '4' || $calificacionesDT->c_dimension_22 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_22 }}</span>
                            @elseif ($calificacionesDT->c_dimension_22 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_22 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_22 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '1' || $calificacionesDT->c_dimension_22 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '2' || $calificacionesDT->c_dimension_22 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_22 <= '4' || $calificacionesDT->c_dimension_22 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_22 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center">

                        <th scope="row">41</th>

                        <td scope="row">Inestabilidad laboral</td>

                        <td scope="row">

                            @if ($calificacionesDT->c_dimension_23 < '1')
                                <span class="badge badge-success">{{ $calificacionesDT->c_dimension_23 }}</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '1' || $calificacionesDT->c_dimension_23 < '2')
                                <span class="badge badge-success-low">{{ $calificacionesDT->c_dimension_23 }}</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '2' || $calificacionesDT->c_dimension_23 < '4')
                                <span class="badge badge-warning-low">{{ $calificacionesDT->c_dimension_23 }}</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '4' || $calificacionesDT->c_dimension_23 < '6')
                                <span class="badge badge-warning">{{ $calificacionesDT->c_dimension_23 }}</span>
                            @elseif ($calificacionesDT->c_dimension_23 >= '6')
                                <span class="badge badge-danger">{{ $calificacionesDT->c_dimension_23 }}</span>
                            @endif

                        </td>

                        <td>

                            @if ($calificacionesDT->c_dimension_23 < '1')
                                <span class="badge badge-success">Nulo o despreciable</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '1' || $calificacionesDT->c_dimension_23 < '2')
                                <span class="badge badge-success-low">Bajo</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '2' || $calificacionesDT->c_dimension_23 < '4')
                                <span class="badge badge-warning-low">Medio</span>
                            @elseif ($calificacionesDT->c_dimension_23 <= '4' || $calificacionesDT->c_dimension_23 < '6')
                                <span class="badge badge-warning">Alto</span>
                            @elseif ($calificacionesDT->c_dimension_23 >= '6')
                                <span class="badge badge-danger">Muy alto</span>
                            @endif

                        </td>

                    </tr>

                    <tr class="text-center bg-custom text-white">
                        <td colspan="4"><b>Eventos Traumáticos</b></td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">42</th>
                        <td scope="row">¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una
                            lesión grave?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_1 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">43</th>
                        <td scope="row">¿Asaltos?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_2 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">44</th>
                        <td scope="row">¿Actos violentos que derivaron en lesiones graves?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_3 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">45</th>
                        <td scope="row">¿Secuestro?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_4 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">46</th>
                        <td scope="row">¿Amenazas?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_5 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">47</th>
                        <td scope="row">¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?
                        </td>
                        <td colspan="2" scope="row">{{ $registro->ets_6 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">48</th>
                        <td scope="row">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan
                            malestares?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_7 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">49</th>
                        <td scope="row">¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le
                            producen malestar?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_8 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">50</th>
                        <td scope="row">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o
                            situaciones que le puedan recordar el acontecimiento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_9 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">51</th>
                        <td scope="row">¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que
                            motivan recuerdos del acontecimiento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_10 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">52</th>
                        <td scope="row">¿Ha tenido dificultad para recordar alguna parte importante del evento?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_11 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">53</th>
                        <td scope="row">¿Ha disminuido su interés en sus actividades cotidianas?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_12 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">54</th>
                        <td scope="row">¿Se ha sentido usted alejado o distante de los demás?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_13 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">55</th>
                        <td scope="row">¿Ha notado que tiene dificultad para expresar sus sentimientos?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_14 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">56</th>
                        <td scope="row">¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que
                            otras personas o que tiene un futuro limitado?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_15 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">57</th>
                        <td scope="row">¿Ha tenido usted dificultades para dormir?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_16 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">58</th>
                        <td scope="row">¿Ha estado particularmente irritable o le han dado arranques de coraje?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_17 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">59</th>
                        <td scope="row">¿Ha tenido dificultad para concentrarse?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_18 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">60</th>
                        <td scope="row">¿Ha estado nervioso o constantemente en alerta?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_19 }}</td>
                    </tr>
                    <tr class="text-center">
                        <th scope="row">61</th>
                        <td scope="row">¿Se ha sobresaltado fácilmente por cualquier cosa?</td>
                        <td colspan="2" scope="row">{{ $registro->ets_20 }}</td>
                    </tr>

                </tbody>

            </table>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>



    <script>
        $(function() {


        });
    </script>
@endsection
