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
                    <h2>Datos generales de la empresa</h2>
                </div>
                <div class="row mt-4">
                    <div class="col-12 col-md-6 mx-auto">
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
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script></script>
@endsection
