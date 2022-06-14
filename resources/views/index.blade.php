@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
<style>
    body {
        background: url({{ Request::root() }}/storage/{{ $empresa->imagen_fondo ?? asset('img/bg.jpg') }}) no-repeat center center fixed;
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }

    label {
        font-size: 1rem;
        font-weight: bold;
        color: {{$empresa->colores_principales ?? '#6200ea' }};
        /* #6200ea */
    }

    label.form-check-label {
        color: #000;
        font-weight: normal;
    }

    .font-color-tab {
        background: #e6e6e6;
        font-weight: bold;
        height: 10px;
        display: inline-block;
        width: 100%;
        border-radius: 1rem;
    }

    .card_steps .alert-warning {
        color: #000000;
        background-color: #fff;
        border-color: #fff;
        font-size: 20px;
    }

    .subtitulo {
        font-size: 17.5px;
        color: #222;
        font-weight: bold;
    }


    .font-color-tab-selected {
        font-weight: bold;
        background: {{$empresa->colores_principales ?? '#6200ea' }};
        height: 10px;
        display: inline-block;
        width: 100%;
        border-radius: 1rem;
    }

    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }

    .card_steps {
        background: #fff;
        padding: 2.5rem;
        border-radius: 0px;
    }

    .btn_siguiente {
        padding: 1rem 3rem;
        border: none;
        align-items: center;
        background: {{$empresa->colores_principales  ?? '#6200ea' }};
        cursor: pointer;
        color: #fff !important;
        text-decoration: none;
        transition-duration: 0.3s;
        font-weight: 400;
        margin-top: 2rem;
    }

    .btn_atras {
        padding: 1rem 3rem;
        border: none;
        align-items: center;
        background: transparent;
        border: 1px solid {{$empresa->colores_principales  ?? '#6200ea' }};
        cursor: pointer;
        color: {{$empresa->colores_principales  ?? '#6200ea' }} !important;
        text-decoration: none;
        transition-duration: 0.3s;
        font-weight: 400;
        margin-top: 2rem;
    }

    #radio_input_1,
    #radio_input_2 {
        display: none;
    }
</style>
@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12">
                @php
                    $tipo_puesto = json_decode($empresa->tipo_puesto);
                    $area = json_decode($empresa->area);
                    $tipo_contratacion = json_decode($empresa->tipo_contratacion);
                    $jornada_trabajo = json_decode($empresa->jornada_trabajo);
                    $rotacion_turnos = json_decode($empresa->rotacion_turnos);
                @endphp
                @if ($empresa)
                    <div class="card_steps">
                        <div class="row">
                            <div class="w-100" style="display: flex;" id="">
                                {{-- stepsBar --}}
                                <a href="javascript:void(0)"
                                    class="display-section font-color-tab font-color-tab-selected mx-2" id="stepOne"
                                    onclick="cambiarSeccion('step_One', 'stepOne')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="stepTwo"
                                    onclick="cambiarSeccion('step_Two', 'stepTwo')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step1"
                                    onclick="cambiarSeccion('step_1', 'step1')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step2"
                                    onclick="cambiarSeccion('step_2', 'step2')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step3"
                                    onclick="cambiarSeccion('step_3', 'step3')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step4"
                                    onclick="cambiarSeccion('step_4', 'step4')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step5"
                                    onclick="cambiarSeccion('step_5', 'step5')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step6"
                                    onclick="cambiarSeccion('step_6', 'step6')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step7"
                                    onclick="cambiarSeccion('step_7', 'step7')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step8"
                                    onclick="cambiarSeccion('step_8', 'step8')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step9"
                                    onclick="cambiarSeccion('step_9', 'step9')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step10"
                                    onclick="cambiarSeccion('step_10', 'step10')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step11"
                                    onclick="cambiarSeccion('step_11', 'step11')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step12"
                                    onclick="cambiarSeccion('step_12', 'step12')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step13"
                                    onclick="cambiarSeccion('step_13', 'step13')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step14"
                                    onclick="cambiarSeccion('step_14', 'step14')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step15"
                                    onclick="cambiarSeccion('step_15', 'step15')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step16"
                                    onclick="cambiarSeccion('step_16', 'step16')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step17"
                                    onclick="cambiarSeccion('step_17', 'step17')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step18"
                                    onclick="cambiarSeccion('step_18', 'step18')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step19"
                                    onclick="cambiarSeccion('step_19', 'step19')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step20"
                                    onclick="cambiarSeccion('step_20', 'step20')"></a>
                                <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step21"
                                    onclick="cambiarSeccion('step_21', 'step21')"></a>
                            </div>
                        </div>
                        <section class="box-typical mt-5">
                            <form method="POST" id="form-step1" enctype="multipart/form-data">
                                @csrf
                                @method('post')
                                <div class="tab-personal" id="step_One">
                                    @include('steps.stepOne')
                                </div>
                                <div class="tab-personal" id="step_Two" style="display: none">
                                    @include('steps.stepTwo')
                                </div>
                                <div class="tab-personal" id="step_1" style="display: none">
                                    @include('steps.step1')
                                </div>
                                <div class="tab-personal" id="step_2" style="display: none">
                                    @include('steps.step2')
                                </div>
                                <div class="tab-personal" id="step_3" style="display: none">
                                    @include('steps.step3')
                                </div>
                                <div class="tab-personal" id="step_4" style="display: none">
                                    @include('steps.step4')
                                </div>
                                <div class="tab-personal" id="step_5" style="display: none">
                                    @include('steps.step5')
                                </div>
                                <div class="tab-personal" id="step_6" style="display: none">
                                    @include('steps.step6')
                                </div>
                                <div class="tab-personal" id="step_7" style="display: none">
                                    @include('steps.step7')
                                </div>
                                <div class="tab-personal" id="step_8" style="display: none">
                                    @include('steps.step8')
                                </div>
                                <div class="tab-personal" id="step_9" style="display: none">
                                    @include('steps.step9')
                                </div>
                                <div class="tab-personal" id="step_10" style="display: none">
                                    @include('steps.step10')
                                </div>
                                <div class="tab-personal" id="step_11" style="display: none">
                                    @include('steps.step11')
                                </div>
                                <div class="tab-personal" id="step_12" style="display: none">
                                    @include('steps.step12')
                                </div>
                                <div class="tab-personal" id="step_13" style="display: none">
                                    @include('steps.step13')
                                </div>
                                <div class="tab-personal" id="step_14" style="display: none">
                                    @include('steps.step14')
                                </div>
                                <div class="tab-personal" id="step_15" style="display: none">
                                    @include('steps.step15')
                                </div>
                                <div class="tab-personal" id="step_16" style="display: none">
                                    @include('steps.step16')
                                </div>
                                <div class="tab-personal" id="step_17" style="display: none">
                                    @include('steps.step17')
                                </div>
                                <div class="tab-personal" id="step_18" style="display: none">
                                    @include('steps.step18')
                                </div>
                                <div class="tab-personal" id="step_19" style="display: none">
                                    @include('steps.step19')
                                </div>
                                <div class="tab-personal" id="step_20" style="display: none">
                                    @include('steps.step20')
                                </div>
                                <div class="tab-personal" id="step_21" style="display: none">
                                    @include('steps.step21')
                                </div>
                                {{-- <input type="hidden" name="token" value="{{ Str::uuid()->toString() }}"> --}}
                                <input type="hidden" class="form-control" name="token" id="token" value="">
                                <input type="hidden" name="id_empresa" id="id_empresa" value="{{$empresa->id}}">
                            </form>
                        </section>
                    </div>
                    @else
                    <div class="col-md-12">
                        <div class="alert alert-danger">
                            <h4>No se encontro la empresa</h4>
                            <p>Por favor, contacte con el administrador del sitio.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    @parent
    <script>
        const generateId = () => Math.random().toString(36).substr(2, 8) + '-' + Math.random().toString(36).substr(2, 4) + '-' + Math.random().toString(36).substr(2, 4) + '-' + Math.random().toString(36).substr(2, 4) + '-' + Math.random().toString(36).substr(2, 12);
        // asignar uuid al campo token
        $('#token').val(generateId());
        
        // Actualizar token cada 5 segundos
        setInterval(() => {
            $('#token').val(generateId());
        }, 10000);
        // Mandamos los datos por ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        function cambiarSeccion(valor, idBoton) {
            $('.display-section').removeClass("font-color-tab-selected");
            $('#' + idBoton).addClass('font-color-tab-selected');

            $('.tab-personal').hide();
            $('#' + valor).show();
        }


        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#form-step1').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]);
                $.ajax({
                    url: '/registroDatos',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        $('#step_21').waitMe({
                            text: 'Registrando...',
                        })
                    },
                    success: function(data) {
                        console.log(data.data.token);
                        if (data.status == 201) {
                            Swal.fire({
                                title: '¡Gracias por tu tiempo!',
                                icon: 'success',
                                text: 'Tus respuestas se almacenaron correctamente',
                                type: 'success',
                                confirmButtonText: 'Continuar',
                            }).then((result) => {
                                if (result.value) {
                                    // window.location.href = `/resultados/${data.data.token}`;
                                    window.location.href = `/`;
                                }
                            });
                        } else {
                            Swal.fire({
                                title: '¡Error!',
                                icon: 'error',
                                text: 'Tus respuestas no se almacenaron',
                                type: 'error',
                                confirmButtonText: 'Reiniciar formulario'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.href = '/';
                                }
                            });
                        }
                    },
                    complete: function() {
                        $('#step_21').waitMe('hide');
                    }
                });
            });

            $("input[name='item_jefe']").change(function() {
                var valor = $(this).val();

                if (valor == 'Sí') {
                    $("#radio_input_1").css("display", "block");
                } else {
                    $("#radio_input_1").css("display", "none");
                }
            });

            $("input[name='item_sc']").change(function() {
                var valor = $(this).val();

                if (valor == 'Sí') {
                    $("#radio_input_2").css("display", "block");
                } else {
                    $("#radio_input_2").css("display", "none");
                }
            });
        })
    </script>
@endsection
