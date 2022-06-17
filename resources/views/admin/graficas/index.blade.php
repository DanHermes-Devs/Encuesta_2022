@extends('admin.layouts.app')

@section('content')
    <div class="content">

        <div class="container-fluid">

            <div class="card p-4">

                <div class="row">

                    <div class="col-12">
                        <div class="row justify-content-between">
                            <h2>Gráficas generales</h2>
                            <form class="filterCompany d-flex align-items-center" style="gap: 1rem;">
                                <div>
                                    <select class="form-control" id="empresa" name="empresa">
                                        <option value="">--Elige una opción--</option>
                                        @foreach ($data['empresas'] as $empresa)
                                            <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success" id="filterCompany">Filtrar por
                                    empresa</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row mt-0" id="con_filtro">
                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="sexo1" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="estado_civil1" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="edad1" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="estudios1" width="100%" height="100%"></canvas>
                    </div>
                </div>

                <div class="row mt-0" id="sin_filtro">
                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="sexo" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="estado_civil" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="edad" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="estudios" width="100%" height="100%"></canvas>
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="col-12 col-md-3 mt-5">
                        <canvas id="evento_traumatico" width="100%" height="100%"></canvas>
                    </div> --}}

                    {{-- <div class="col-12 col-md-3 mt-5">
                        <canvas id="antiguedad" width="100%" height="100%"></canvas>
                    </div> --}}
                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script>
        // Setup ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#con_filtro').hide();
        // Consultar empresa mediante ajax
        $('#filterCompany').click(function(e) {
            $('#sin_filtro').hide();
            $('#con_filtro').show();
            e.preventDefault();
            var empresa = $('#empresa').val();
            $.ajax({
                url: '/graficas/empresa/' + empresa,
                type: 'GET',
                data: {
                    id: empresa
                },
                success: function(data) {
                    console.log(data);
                    const ctx1 = $('#sexo1');

                    const sexo1 = new Chart(ctx1, {

                        type: 'doughnut',

                        data: {

                            labels: ['Masculino', 'Femenino'],

                            datasets: [{

                                label: 'Datos generales',

                                data: [
                                    data.sexoMasculino,
                                    data.sexoFemenino
                                ],

                                backgroundColor: [

                                    'rgba(255, 99, 132, 0.2)',

                                    'rgba(54, 162, 235, 0.2)',

                                ],

                                borderColor: [

                                    'rgba(255, 99, 132, 1)',

                                    'rgba(54, 162, 235, 1)',

                                ],

                                borderWidth: 1

                            }]

                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                },
                                title: {
                                    display: true,
                                    text: 'Sexo',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },

                    });

                    const ctx2 = $('#estado_civil1');

                    const estado_civil1 = new Chart(ctx2, {

                        type: 'doughnut',

                        data: {

                            labels: ['Soltero(a)', 'Casado(a)', 'Unión Libre', 'Divorciado',
                                'Viudo', 'Otro'
                            ],

                            datasets: [{

                                data: [
                                    data.estadoCivilSoltero,
                                    data.estadoCivilCasado,
                                    data.estadoUnionLibre,
                                    data.estadoCivilDivorciado,
                                    data.estadoCivilViudo,
                                    data.estadoOtro
                                ],

                                backgroundColor: [

                                    'rgba(255, 99, 132, 0.2)',

                                    'rgba(54, 162, 235, 0.2)',

                                    'rgba(255, 206, 86, 0.2)',

                                    'rgba(75, 192, 192, 0.2)',

                                    'rgba(153, 102, 255, 0.2)',

                                    'rgba(255, 159, 64, 0.2)'

                                ],

                                borderColor: [

                                    'rgba(255, 99, 132, 1)',

                                    'rgba(54, 162, 235, 1)',

                                    'rgba(255, 206, 86, 1)',

                                    'rgba(75, 192, 192, 1)',

                                    'rgba(153, 102, 255, 1)',

                                    'rgba(255, 159, 64, 1)'

                                ],

                                borderWidth: 1

                            }]

                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                },
                                title: {
                                    display: true,
                                    text: 'Estado Civil',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },

                    });

                    const ctx3 = $('#edad1');

                    const edad1 = new Chart(ctx3, {

                        type: 'bar',

                        data: {

                            labels: ['Menos de 18 años', '18-25 años', '26-30 años',
                                '31-35 años', '36-40 años', '41-45 años',
                                '46-50 años', '51-55 años', '56-60 años', '61-65 años',
                                '66-70 años', 'Más de 70 años'
                            ],

                            datasets: [{

                                label: ['Edad'],

                                data: [
                                    data.edad18,
                                    data.edad18_25,
                                    data.edad26_30,
                                    data.edad31_35,
                                    data.edad36_40,
                                    data.edad41_45,
                                    data.edad46_50,
                                    data.edad51_55,
                                    data.edad56_60,
                                    data.edad61_65,
                                    data.edad66_70,
                                    data.edad70
                                ],

                                backgroundColor: [

                                    'rgba(0, 255, 255, 0.2)',

                                    'rgba(54, 162, 235, 0.2)',

                                    'rgba(255, 206, 86, 0.2)',

                                    'rgba(75, 192, 192, 0.2)',

                                    'rgba(153, 102, 255, 0.2)',

                                    'rgba(255, 159, 64, 0.2)',

                                    'rgba(565, 19, 64, 0.2)',

                                    'rgba(125, 10, 30, 0.2)',

                                    'rgba(255, 40, 255, 0.2)',

                                    'rgba(25, 40, 255, 0.2)',

                                    'rgba(25, 140, 25, 0.2)',

                                    'rgba(5, 90, 185, 0.2)',

                                ],

                                borderColor: [

                                    'rgba(0, 255, 255, 1)',

                                    'rgba(54, 162, 235, 1)',

                                    'rgba(255, 206, 86, 1)',

                                    'rgba(75, 192, 192, 1)',

                                    'rgba(153, 102, 255, 1)',

                                    'rgba(255, 159, 64, 1)',

                                    'rgba(565, 19, 64, 1)',

                                    'rgba(125, 10, 30, 1)',

                                    'rgba(255, 40, 255, 1)',

                                    'rgba(25, 40, 255, 1)',

                                    'rgba(25, 140, 25, 1)',

                                    'rgba(5, 90, 185, 1)',

                                ],

                                borderWidth: 1

                            }]

                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                                title: {
                                    display: true,
                                    text: 'Edad',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },

                    });

                    const ctx4 = $('#estudios1');

                    const estudios1 = new Chart(ctx4, {

                        type: 'bar',

                        data: {

                            labels: ['Primaria', 'Secundaria', 'Preparatoria', 'Tec. Superior',
                                'Licenciatura', 'Maestría',
                                'Doctorado'
                            ],

                            datasets: [{

                                label: ['Edad'],

                                data: [
                                    data.estudiosPrimaria,
                                    data.estudiosSecundaria,
                                    data.estudiosPreparatoria,
                                    data.estudiosTecSuperior,
                                    data.estudiosLicenciatura,
                                    data.estudiosMaestría,
                                    data.estudiosDoctorado
                                ],

                                backgroundColor: [

                                    'rgba(0, 255, 255, 0.2)',

                                    'rgba(54, 162, 235, 0.2)',

                                    'rgba(255, 206, 86, 0.2)',

                                    'rgba(75, 192, 192, 0.2)',

                                    'rgba(153, 102, 255, 0.2)',

                                    'rgba(255, 159, 64, 0.2)',

                                    'rgba(565, 19, 64, 0.2)',

                                ],

                                borderColor: [

                                    'rgba(0, 255, 255, 1)',

                                    'rgba(54, 162, 235, 1)',

                                    'rgba(255, 206, 86, 1)',

                                    'rgba(75, 192, 192, 1)',

                                    'rgba(153, 102, 255, 1)',

                                    'rgba(255, 159, 64, 1)',

                                    'rgba(565, 19, 64, 1)',

                                ],

                                borderWidth: 1

                            }]

                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: false,
                                },
                                title: {
                                    display: true,
                                    text: 'Estudios',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },

                    });
                }
            });
        });

        const ctx = $('#sexo');

        const sexo = new Chart(ctx, {

            type: 'doughnut',

            data: {

                labels: ['Masculino', 'Femenino'],

                datasets: [{

                    label: 'Datos generales',

                    data: [
                        {{ $data['sexoMasculino'] }},
                        {{ $data['sexoFemenino'] }}
                    ],

                    backgroundColor: [

                        'rgba(255, 99, 132, 0.2)',

                        'rgba(54, 162, 235, 0.2)',

                    ],

                    borderColor: [

                        'rgba(255, 99, 132, 1)',

                        'rgba(54, 162, 235, 1)',

                    ],

                    borderWidth: 1

                }]

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                    title: {
                        display: true,
                        text: 'Sexo',
                        font: {
                            size: 20
                        }
                    },
                }
            },

        });

        const ctx_2 = $('#estado_civil');

        const estado_civil = new Chart(ctx_2, {

            type: 'doughnut',

            data: {

                labels: ['Soltero(a)', 'Casado(a)', 'Unión Libre', 'Divorciado', 'Viudo', 'Otro'],

                datasets: [{

                    data: [
                        {{ $data['estadoCivilSoltero'] }},
                        {{ $data['estadoCivilCasado'] }},
                        {{ $data['estadoUnionLibre'] }},
                        {{ $data['estadoCivilDivorciado'] }},
                        {{ $data['estadoCivilViudo'] }},
                        {{ $data['estadoOtro'] }}
                    ],

                    backgroundColor: [

                        'rgba(255, 99, 132, 0.2)',

                        'rgba(54, 162, 235, 0.2)',

                        'rgba(255, 206, 86, 0.2)',

                        'rgba(75, 192, 192, 0.2)',

                        'rgba(153, 102, 255, 0.2)',

                        'rgba(255, 159, 64, 0.2)'

                    ],

                    borderColor: [

                        'rgba(255, 99, 132, 1)',

                        'rgba(54, 162, 235, 1)',

                        'rgba(255, 206, 86, 1)',

                        'rgba(75, 192, 192, 1)',

                        'rgba(153, 102, 255, 1)',

                        'rgba(255, 159, 64, 1)'

                    ],

                    borderWidth: 1

                }]

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                    },
                    title: {
                        display: true,
                        text: 'Estado Civil',
                        font: {
                            size: 20
                        }
                    },
                }
            },

        });


        const ctx_4 = $('#edad');

        const edad = new Chart(ctx_4, {

            type: 'bar',

            data: {

                labels: ['Menos de 18 años', '18-25 años', '26-30 años', '31-35 años', '36-40 años', '41-45 años',
                    '46-50 años', '51-55 años', '56-60 años', '61-65 años', '66-70 años', 'Más de 70 años'
                ],

                datasets: [{

                    label: ['Edad'],

                    data: [{{ $data['edad18'] }}, {{ $data['edad18_25'] }}, {{ $data['edad26_30'] }},
                        {{ $data['edad31_35'] }},
                        {{ $data['edad36_40'] }}, {{ $data['edad41_45'] }}, {{ $data['edad46_50'] }},
                        {{ $data['edad51_55'] }},
                        {{ $data['edad56_60'] }}, {{ $data['edad61_65'] }}, {{ $data['edad66_70'] }},
                        {{ $data['edad70'] }}
                    ],

                    backgroundColor: [

                        'rgba(0, 255, 255, 0.2)',

                        'rgba(54, 162, 235, 0.2)',

                        'rgba(255, 206, 86, 0.2)',

                        'rgba(75, 192, 192, 0.2)',

                        'rgba(153, 102, 255, 0.2)',

                        'rgba(255, 159, 64, 0.2)',

                        'rgba(565, 19, 64, 0.2)',

                        'rgba(125, 10, 30, 0.2)',

                        'rgba(255, 40, 255, 0.2)',

                        'rgba(25, 40, 255, 0.2)',

                        'rgba(25, 140, 25, 0.2)',

                        'rgba(5, 90, 185, 0.2)',

                    ],

                    borderColor: [

                        'rgba(0, 255, 255, 1)',

                        'rgba(54, 162, 235, 1)',

                        'rgba(255, 206, 86, 1)',

                        'rgba(75, 192, 192, 1)',

                        'rgba(153, 102, 255, 1)',

                        'rgba(255, 159, 64, 1)',

                        'rgba(565, 19, 64, 1)',

                        'rgba(125, 10, 30, 1)',

                        'rgba(255, 40, 255, 1)',

                        'rgba(25, 40, 255, 1)',

                        'rgba(25, 140, 25, 1)',

                        'rgba(5, 90, 185, 1)',

                    ],

                    borderWidth: 1

                }]

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Edad',
                        font: {
                            size: 20
                        }
                    },
                }
            },

        });

        const ctx_5 = $('#estudios');

        const estudios = new Chart(ctx_5, {

            type: 'bar',

            data: {

                labels: ['Primaria', 'Secundaria', 'Preparatoria', 'Tec. Superior', 'Licenciatura', 'Maestría',
                    'Doctorado'
                ],

                datasets: [{

                    label: ['Edad'],

                    data: [{{ $data['estudiosPrimaria'] }}, {{ $data['estudiosSecundaria'] }},
                        {{ $data['estudiosPreparatoria'] }},
                        {{ $data['estudiosTecSuperior'] }}, {{ $data['estudiosLicenciatura'] }},
                        {{ $data['estudiosMaestría'] }},
                        {{ $data['estudiosDoctorado'] }}
                    ],

                    backgroundColor: [

                        'rgba(0, 255, 255, 0.2)',

                        'rgba(54, 162, 235, 0.2)',

                        'rgba(255, 206, 86, 0.2)',

                        'rgba(75, 192, 192, 0.2)',

                        'rgba(153, 102, 255, 0.2)',

                        'rgba(255, 159, 64, 0.2)',

                        'rgba(565, 19, 64, 0.2)',

                    ],

                    borderColor: [

                        'rgba(0, 255, 255, 1)',

                        'rgba(54, 162, 235, 1)',

                        'rgba(255, 206, 86, 1)',

                        'rgba(75, 192, 192, 1)',

                        'rgba(153, 102, 255, 1)',

                        'rgba(255, 159, 64, 1)',

                        'rgba(565, 19, 64, 1)',

                    ],

                    borderWidth: 1

                }]

            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: false,
                    },
                    title: {
                        display: true,
                        text: 'Estudios',
                        font: {
                            size: 20
                        }
                    },
                }
            },

        });
    </script>
@endsection
