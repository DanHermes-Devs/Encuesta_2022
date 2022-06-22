@extends('admin.layouts.app')
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

<style>
    trix-editor {
        min-height: 200px;
    }
</style>

@section('content')
    <div class="content">

        <div class="container-fluid">

            <div class="card p-4">
                <div class="row">
                    <div class="col-12">
                        <form method="post" enctype="multipart/form">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" id="id" name="id" value="{{ $data->id }}">
                                    <div class="form-group mb-5">
                                        <label>Mensaje de Bienvenida</label>
                                        <input type="hidden" name="mensaje_bienvenida" id="mensaje_bienvenida"
                                            value="{{ $data->mensaje_bienvenida }}">
                                        <trix-editor input="mensaje_bienvenida"></trix-editor>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Instrucciones 1</label>
                                        <input type="hidden" name="instrucciones1" id="instrucciones1"
                                            value="{{ $data->instrucciones1 }}">
                                        <trix-editor input="instrucciones1"></trix-editor>
                                    </div>
                                    <div class="form-group mb-5">
                                        <label>Instrucciones 2</label>
                                        <input type="hidden" name="instrucciones2" id="instrucciones2"
                                            value="{{ $data->instrucciones2 }}">
                                        <trix-editor input="instrucciones2"></trix-editor>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success" id="btnEditar">Editar configuraciones</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(".trix-button-group--file-tools").remove();

            $('body').on('click', '#btnEditar', function(e) {
                e.preventDefault();
                var id = $("#id").val();
                var data = {
                    'id': $("#id").val(),
                    'mensaje_bienvenida': $("#mensaje_bienvenida").val(),
                    'instrucciones1': $("#instrucciones1").val(),
                    'instrucciones2': $("#instrucciones2").val(),
                }

                $.ajax({
                    url: "/configuraciones/" + id,
                    method: 'PUT',
                    data: data,
                    type: 'JSON',
                    beforeSend: function(data) {
                        $('#btnEditar').waitMe();
                    },
                    success: function(data) {
                        console.log(data)
                        if (data.status == 200) {
                            Swal.fire({
                                title: '¡Éxito!',
                                icon: 'success',
                                text: 'La configuración se editó correctamente',
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.value) {
                                    window.location.reload();
                                    $('#btnEditar').waitMe('hide');
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Hubo un error, favor de rectificar valores del formulario.',
                                type: 'error',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.value) {
                                    window.reload();
                                    $('#btnEditar').waitMe('hide');
                                }
                            });
                        }
                    },
                    error: function(data) {
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Error',
                            type: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                        
                        $('#btnEditar').waitMe('hide');
                    }
                });

            });
        });
    </script>
@endsection
