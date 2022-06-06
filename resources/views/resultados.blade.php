@extends('layouts.app')
<style>
    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            @php
                $cookieGlobal = $_COOKIE['cookieCalificaciones'];
                $registroID = App\Registro::where('token', $cookieGlobal)->first();
            @endphp

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Resultados</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-info">
                                <p>Sexo: <span>{{ $registroID->sexo }}</span></p>
                                <p>Estado civil: <span>{{ $registroID->estado_civil }}</span></p>
                                <p>Edad en años: <span>{{ $registroID->edad }}</span></p>
                                <p>Antigüedad en puesto actual: <span>{{ $registroID->antiguedad }}</span></p>
                                <p>Estudios: <span>{{ $registroID->estudios }}</span></p>
                                <p>Tipo de puesto: <span>{{ $registroID->tipo_puesto }}</span></p>
                                <p>Área: <span>{{ $registroID->area }}</span></p>
                                <p>Tipo de contratación: <span>{{ $registroID->tipo_contratacion }}</span></p>
                                <p>Jornada de trabajo: <span>{{ $registroID->jornada_trabajo }}</span></p>
                                <p>Rotación de turnos: <span>{{ $registroID->rotacion_turnos }}</span></p>
                                <p>Experiencia Laboral: <span>{{ $registroID->experiencia_laboral }}</span></p>
                                <p>1.- ¿El espacio donde trabajo me permite realizar mis actividades de manera segura e higiénica?: 
                                    @if ($registroID->item_1 == '0')
                                        <span>Siempre</span>
                                    @elseif ($registroID->item_1 == '1')
                                        <span>Casi siempre</span>
                                    @elseif ($registroID->item_1 == '2')
                                        <span>Algunas veces</span>
                                    @elseif ($registroID->item_1 == '3')    
                                        <span>Casi nunca</span>
                                    @elseif ($registroID->item_1 == '4')
                                        <span>Nunca</span>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
@endsection