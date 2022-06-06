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
                $cookieGlobal = $_COOKIE['cookieCalificaciones'];
                $registroID = App\Registro::where('token', $cookieGlobal)->first();
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
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
@endsection
