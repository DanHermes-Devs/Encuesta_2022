@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
<style>
    body {
        background: url({{ asset('images/bg.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
    .font-color-tab {
        background: #e6e6e6;
        font-weight: bold;
        height: 10px;
        display: inline-block;
        width: 100%;
        border-radius: 1rem;
    }

    .font-color-tab-selected {
        font-weight: bold;
        background: #6645eb;
        height: 10px;
        display: inline-block;
        width: 100%;
        border-radius: 1rem;
    }

    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }

    .card_steps{
        background: #fff; 
        padding: 2.5rem; 
        border-radius: 0px;
    }

    .btn_siguiente {
        padding: 1rem 3rem;
        border: none;
        align-items: center;
        background: #6200EA;
        cursor: pointer;
        color: #fff !important;
        text-decoration: none;
        transition-duration: 0.3s;
        font-weight: 400;
    }

    .btn_atras {
        padding: 1rem 3rem;
        border: none;
        align-items: center;
        background: transparent;
        border: 1px solid #6200EA;
        cursor: pointer;
        color: #6200EA !important;
        text-decoration: none;
        transition-duration: 0.3s;
        font-weight: 400;
    }
</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">

            <div class="card_steps">
                <div class="row">
                    <div class="w-100" style="display: flex;">
                        <a href="javascript:void(0)" class="display-section font-color-tab font-color-tab-selected mx-2" id="step1" onclick="cambiarSeccion('step_1', 'step1')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step2" onclick="cambiarSeccion('step_2', 'step2')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step3" onclick="cambiarSeccion('step_3', 'step3')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step4" onclick="cambiarSeccion('step_4', 'step4')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step5" onclick="cambiarSeccion('step_5', 'step5')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step6" onclick="cambiarSeccion('step_6', 'step6')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step7" onclick="cambiarSeccion('step_7', 'step7')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step8" onclick="cambiarSeccion('step_8', 'step8')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step9" onclick="cambiarSeccion('step_9', 'step9')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step10" onclick="cambiarSeccion('step_10', 'step10')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step11" onclick="cambiarSeccion('step_11', 'step11')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step12" onclick="cambiarSeccion('step_12', 'step12')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step13" onclick="cambiarSeccion('step_13', 'step13')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step14" onclick="cambiarSeccion('step_14', 'step14')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step15" onclick="cambiarSeccion('step_15', 'step15')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step16" onclick="cambiarSeccion('step_16', 'step16')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step17" onclick="cambiarSeccion('step_17', 'step17')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step18" onclick="cambiarSeccion('step_18', 'step18')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step19" onclick="cambiarSeccion('step_19', 'step19')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step20" onclick="cambiarSeccion('step_20', 'step20')"></a>
                        <a href="javascript:void(0)" class="display-section font-color-tab mx-2" id="step21" onclick="cambiarSeccion('step_21', 'step21')"></a>
                    </div>
                </div>
    
                <section class="box-typical mt-5">
                    <form method="POST" id="form-step1" enctype="multipart/form-data">    
                        @csrf
                        @method('post')
                        <div class="tab-personal" id="step_1">
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
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
    @parent
    <script>
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
                        if(data.status == 201){
                            Swal.fire({
                                title: '¡Bien hecho!',
                                text: 'El registro se hizo correctamente',
                                type: 'success',
                                confirmButtonText: 'Continuar'
                            }).then((result) => {
                                if (result.value) {
                                    cambiarSeccion('step_1', 'step1');
                                }
                            });
                        }else{
                            Swal.fire({
                                title: '¡Error!',
                                text: 'El registro no se hizo correctamente',
                                type: 'error',
                                confirmButtonText: 'Continuar'
                            }).then((result) => {
                                if (result.value) {
                                    cambiarSeccion('step_1', 'step1');
                                }
                            });
                        }
                    },
                    complete: function() {
                        $('#step_21').waitMe('hide');
                    }
                });
            });

            // $("input[name='item_65']").change(function(evento){
            //     var valor = $(this).val();
                
            //     if(valor == 'Siempre'){
            //         $("#respuesta_si_1").css("display", "block");
            //     }else{
            //         $("#respuesta_si_1").css("display", "none");
            //     }
            // });

            // $("input[name='item_70']").change(function(evento){
            //     var valor = $(this).val();
                
            //     if(valor == 'Siempre'){
            //         $("#respuesta_si_2").css("display", "block");
            //     }else{
            //         $("#respuesta_si_2").css("display", "none");
            //     }
            // });

            // $("input[name='item_71']").change(function(evento){
            //     var valor = $(this).val();
                
            //     if(valor == 'Siempre'){
            //         $("#respuesta_si_3").css("display", "block");
            //     }else{
            //         $("#respuesta_si_3").css("display", "none");
            //     }
            // });
        })
    </script>
@endsection