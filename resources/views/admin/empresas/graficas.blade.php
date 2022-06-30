@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

<style>

</style>

@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="card p-4">
                <div class="row justify-content-between">
                    <h2>Datos generales de la empresa: <b>{{ $NombreEmpresa->empresa->nombre }}</b></h2>
                </div>

                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <a class="nav-link " id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab"
                                    aria-controls="nav-home" aria-selected="false">Tabla general</a>
                                <a class="nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile"
                                    role="tab" aria-controls="nav-profile" aria-selected="true">Graficas</a>
                                <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact"
                                    role="tab" aria-controls="nav-contact" aria-selected="false">Tabla de usuarios</a>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="col-12 col-md-12 mt-4">
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

                                            <tr class="text-center bg-dark text-white">
                                                <td colspan="4"><b>Calificacion Final</b></td>
                                            </tr>
                                            <tr class="text-center">

                                                <th scope="row">1</th>

                                                <td scope="row">Calificación final de los cuestionarios</td>

                                                <td scope="row">

                                                    @if ($c_final < '50')
                                                        <span class="badge badge-success">{{ $c_final }}</span>
                                                    @elseif ($c_final <= '50' || $c_final < '75')
                                                        <span class="badge badge-success-low">{{ $c_final }}</span>
                                                    @elseif ($c_final <= '75' || $c_final < '99')
                                                        <span class="badge badge-warning-low">{{ $c_final }}</span>
                                                    @elseif ($c_final <= '99' || $c_final < '140')
                                                        <span class="badge badge-warning">{{ $c_final }}</span>
                                                    @elseif ($c_final >= '140')
                                                        <span class="badge badge-danger">{{ $c_final }}</span>
                                                    @endif

                                                </td>

                                                <td>

                                                    @if ($c_final < '50')
                                                        <span class="badge badge-success">Nulo o despreciable</span>
                                                    @elseif ($c_final <= '50' || $c_final < '75')
                                                        <span class="badge badge-success-low">Bajo</span>
                                                    @elseif ($c_final <= '75' || $c_final < '99')
                                                        <span class="badge badge-warning-low">Medio</span>
                                                    @elseif ($c_final <= '99' || $c_final < '140')
                                                        <span class="badge badge-warning">Alto</span>
                                                    @elseif ($c_final >= '140')
                                                        <span class="badge badge-danger">Muy alto</span>
                                                    @endif

                                                </td>

                                            </tr>

                                            <tr class="text-center bg-dark text-white">
                                                <td colspan="4"><b>Calificacion por Categorías</b></td>
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

                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show active" id="nav-profile" role="tabpanel"
                                aria-labelledby="nav-profile-tab">
                                <div class="col-12 col-md-12 mt-4">
                                    <div class="row" style="gap: 5rem;">
                                        @include('admin.empresas.graficas.estudios')
                                        @include('admin.empresas.graficas.sexo')
                                        @include('admin.empresas.graficas.estado_civil')
                                        @include('admin.empresas.graficas.evento_traumatico')
                                        @include('admin.empresas.graficas.edad')
                                        @include('admin.empresas.graficas.tipo_puesto')
                                        @include('admin.empresas.graficas.area')
                                        @include('admin.empresas.graficas.experiencia')
                                        @include('admin.empresas.graficas.antiguedad')
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="nav-contact" role="tabpanel"
                                aria-labelledby="nav-contact-tab">
                                <div class="col-12 col-md-12 mt-4">
                                    <table class="table table-stripped table-bordered w-100">

                                        <thead class="thead-dark">

                                            <tr>

                                                <th scope="col" class="text-center">#</th>

                                                <th scope="col" class="text-center">Correo Electrónico</th>

                                                <th scope="col" class="text-center">Edad</th>

                                                <th scope="col" class="text-center">Estudios</th>

                                                <th scope="col" class="text-center">Tipo de puesto</th>

                                                <th scope="col" class="text-center">Área</th>

                                                <th scope="col" class="text-center">Antigüedad</th>

                                                <th scope="col" class="text-center">Estado Civil</th>
                                                <th scope="col" class="text-center" width="10%">Tiempo que tardo en
                                                    contestar la encuesta</th>

                                            </tr>

                                        </thead>

                                        <tbody>
                                            @foreach ($registros as $registro)
                                                <tr>
                                                    <td>{{ $registro->id }}</td>
                                                    <td>{{ $registro->email }}</td>
                                                    <td>{{ $registro->edad }}</td>
                                                    <td>{{ $registro->estudios }}</td>
                                                    <td>{{ $registro->tipo_puesto }}</td>
                                                    <td>{{ $registro->area }}</td>
                                                    <td>{{ $registro->antiguedad }}</td>
                                                    <td>{{ $registro->estado_civil }}</td>
                                                    {{-- <td>{{$registro->fecha_inicio->format('h:i:s')}}</td>
                                                    <td>{{$registro->created_at->format('h:i:s')}}</td> --}}
                                                    <td>@php
                                                        $time2 = strtotime($registro->fecha_inicio->format('h:i:s'));
                                                        $time1 = strtotime($registro->created_at->format('h:i:s'));
                                                        
                                                        echo date('H:i:s', $time1 - $time2);
                                                    @endphp</td>

                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

@endsection
