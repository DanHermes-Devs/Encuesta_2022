@extends('admin.layouts.app')

@section('content')
    <div class="content">

        {{-- Ve esta url papu https://es.stackoverflow.com/questions/159968/grafica-con-chartjs-y-filtrar --}}
        <div class="container-fluid">
            <div class="card p-4">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <h2>Gráficas generales</h2>
                            <div class="form-group w-100 mt-4">
                                {{-- Label --}}
                                <label for="empresa">Filtrar por empresa:</label>
                                <select class="form-control" id="empresa" name="empresa">
                                    <option value="0">--Elige una opción--</option>
                                    <option value="-1">Ver todo</option>
                                    @foreach ($empresas as $empresa)
                                        <option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-0 text-center">
                    <div class="col-12 mt-5" id="seleccionaEmpresa">
                        <h2 class="text-center">
                            Selecciona una empresa
                        </h2>
                    </div>
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

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="grupoAntiguedad" width="100%" height="100%"></canvas>
                    </div>

                    <div class="col-12 col-md-3 mt-5">
                        <canvas id="eventoTraumatico" width="100%" height="100%"></canvas>
                    </div>
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

        var sexoChart;
        var edo_civilChart;
        var edadChart;
        var estudiosChart;
        var experienciaAntiguedadChart;
        var eventoTraumaticoChart;

        // Selecciona una empresa


        // Filtrar graficas por empresa mediante ajax
        $('#empresa').change(function() {
            var empresa = $(this).val();
            // Limpiar graficas
            if (sexoChart) {
                sexoChart.destroy();
            }

            if (edo_civilChart) {
                edo_civilChart.destroy();
            }

            if (edadChart) {
                edadChart.destroy();
            }

            if (estudiosChart) {
                estudiosChart.destroy();
            }

            if (experienciaAntiguedadChart) {
                experienciaAntiguedadChart.destroy();
            }

            if (eventoTraumaticoChart) {
                eventoTraumaticoChart.destroy();
            }

            if (empresa == 0) {
                $('#seleccionaEmpresa').html('<h2 class="text-center">Selecciona una empresa</h2>');
                return;
            } else if (empresa > 0) {
                $('#seleccionaEmpresa').html('<h2 class="text-center">Cargando...</h2>');
            }

            $.ajax({
                type: 'GET',
                url: '/graficas/empresa/' + empresa,
                data: {
                    id: empresa,
                },
                success: function(data) {
                    $('#seleccionaEmpresa').html(data);
                    // Crear if ternario para validar existensia del nombre de la empresa
                    if (data.empresa) {
                        $('#seleccionaEmpresa').html(
                            `<h2 class="text-center">Datos de la empresa: <b>${data.empresa.nombre}</b></h2>`
                            );
                    } else {
                        $('#seleccionaEmpresa').html('<h2 class="text-center">Datos generales</h2>');
                    }
                    // $('#seleccionaEmpresa').html(`<h2 class="text-center">Datos de la empresa: ${data.empresa.nombre}</h2>`);
                    // Grafica de sexo
                    var sexo = document.getElementById('sexo').getContext('2d');
                    sexoChart = new Chart(sexo, {
                        type: 'pie',
                        data: {
                            labels: ['Hombres', 'Mujeres'],
                            datasets: [{
                                label: '# de usuarios',
                                data: [data.sexoMasculino, data.sexoFemenino],
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

                    // Grafica de estado civil
                    var edo_civil = document.getElementById('estado_civil').getContext('2d');
                    edo_civilChart = new Chart(edo_civil, {
                        type: 'pie',
                        data: {
                            labels: ['Casado', 'Soltero', 'Divorciado', 'Viudo'],
                            datasets: [{
                                label: '# de usuarios',
                                data: [data.estadoCivilCasado, data.estadoCivilSoltero,
                                    data.estadoCivilDivorciado, data
                                    .estadoCivilViudo
                                ],
                                backgroundColor: [
                                    'rgba(255, 99, 132, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                    'rgba(255, 206, 86, 0.2)',
                                    'rgba(75, 192, 192, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(255, 99, 132, 1)',
                                    'rgba(54, 162, 235, 1)',
                                    'rgba(255, 206, 86, 1)',
                                    'rgba(75, 192, 192, 1)',
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
                                    text: 'Estado civil',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },
                    });

                    // Grafica de edad
                    var edad = document.getElementById('edad').getContext('2d');
                    edadChart = new Chart(edad, {
                        type: 'bar',
                        data: {
                            labels: ['Menos de 18 años', '18-25 años', '26-30 años',
                                '31-35 años', '36-40 años', '41-45 años',
                                '46-50 años', '51-55 años', '56-60 años', '61-65 años',
                                '66-70 años', 'Más de 70 años'
                            ],
                            datasets: [{
                                label: '# de usuarios',
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
                                    data.edad70,
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
                                    display: true,
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

                    // Grafica de estudios
                    var estudios = document.getElementById('estudios').getContext('2d');
                    estudiosChart = new Chart(estudios, {
                        type: 'bar',
                        data: {
                            labels: ['Primaria', 'Secundaria', 'Preparatoria', 'Tec. Superior',
                                'Licenciatura', 'Maestría',
                                'Doctorado'
                            ],
                            datasets: [{
                                label: '# de usuarios',
                                data: [
                                    data.estudiosPrimaria,
                                    data.estudiosSecundaria,
                                    data.estudiosPreparatoria,
                                    data.estudiosTecSuperior,
                                    data.estudiosLicenciatura,
                                    data.estudiosMaestría,
                                    data.estudiosDoctorado,
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
                                    text: 'Estudios',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },
                    });

                    // Grafica de antiguedad / experiencia
                    var experienciaAntiguedad = document.getElementById('grupoAntiguedad').getContext('2d');
                    experienciaAntiguedadChart = new Chart(experienciaAntiguedad, {
                        type: 'bar',
                        data: {
                            labels: ['Menos de 1 año',
                                '1-5 años',
                                '6-10 años',
                                '11-15 años',
                                '16-20 años',
                                '21-25 años',
                                'Más de 25 años'],
                            datasets: [{
                                    label: 'Antigüedad',
                                    data: [data.antiguedad1, data.antiguedad2, data.antiguedad3, data.antiguedad4, data.antiguedad5, data.antiguedad6, data.antiguedad7],
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
                                },
                                {
                                    label: 'Experiencia',
                                    data: [data.experiencia1, data.experiencia2, data.experiencia3, data.experiencia4, data.experiencia5, data.experiencia6, data.experiencia7],
                                    backgroundColor: [
                                        'rgba(565, 19, 64, 0.2)',
                                        'rgba(255, 159, 64, 0.2)',
                                        'rgba(153, 102, 255, 0.2)',
                                        'rgba(75, 192, 192, 0.2)',
                                        'rgba(255, 206, 86, 0.2)',
                                        'rgba(54, 162, 235, 0.2)',
                                        'rgba(0, 255, 255, 0.2)',
                                    ],
                                    borderColor: [
                                        'rgba(565, 19, 64, 1)',
                                        'rgba(255, 159, 64, 1)',
                                        'rgba(153, 102, 255, 1)',
                                        'rgba(75, 192, 192, 1)',
                                        'rgba(255, 206, 86, 1)',
                                        'rgba(54, 162, 235, 1)',
                                        'rgba(0, 255, 255, 1)',
                                    ],
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            plugins: {
                                legend: {
                                    display: true,
                                },
                                title: {
                                    display: true,
                                    text: 'Antigüedad / Experiencia',
                                    font: {
                                        size: 20
                                    }
                                },
                            }
                        },
                    });

                    // Grafica eventos traumáticos
                    // Grafica de estudios
                    var eventoTraumatico = document.getElementById('eventoTraumatico').getContext('2d');
                    eventoTraumaticoChart = new Chart(eventoTraumatico, {
                        type: 'bar',
                        data: {
                            labels: ['Sí', 'No'],
                            datasets: [{
                                label: '# de usuarios',
                                data: [
                                    data.ets_Si,
                                    data.ets_No,
                                ],
                                backgroundColor: [
                                    'rgba(0, 255, 255, 0.2)',
                                    'rgba(54, 162, 235, 0.2)',
                                ],
                                borderColor: [
                                    'rgba(0, 255, 255, 1)',
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
                                    text: 'Eventos Traumáticos Severos',
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



        // $('#empresa').change(function() {
        //     var empresa = $('#empresa').val();
        //     // var url = '{{ route('graficas.empresa', ':empresa') }}';
        //     // url = url.replace(':empresa', empresa);
        //     // window.location.href = url;
        // });
    </script>
@endsection
