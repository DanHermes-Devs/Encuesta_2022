@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>

<style>

    trix-editor {

        min-height: 100px!important;

    }

    .content-wrapper {
        margin-bottom: 3rem;
    }

</style>

@section('content')

<div class="content">

    <div class="container-fluid">

        <div class="card p-4">

            <div class="row justify-content-between">

                <div class="col-12">

                    <h2>Aviso de privacidad</h2>

                    <small>Aquí puede editar el aviso de privacidad.</small>

                </div>

            </div>

            <div class="mt-5">

                <form enctype="multipart/form-data">

                    @csrf

                    <input id="aviso" type="hidden" name="aviso">

                    <trix-editor input="aviso"></trix-editor>

                    <button class="btn btn-success mt-4" id="editAviso">Editar Aviso de pivacidad</button>

                </form>

            </div>

        </div>

    </div>

</div>

@endsection

@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>



    <script>

        $(document).ready(function() {

            // Ajaxsetup

            $.ajaxSetup({

                headers: {

                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

                }

            });



            // Traer aviso de privacidad

            $.ajax({

                url: '{{ route('aviso-privacidad.mostrarAviso') }}',

                type: 'GET',

                dataType: 'json',

                success: function(data) {

                    $('trix-editor').val(data.aviso);

                    $('#editAviso').attr('data-id', data.id);

                }

            }); 



            // Enviar por ajax el aviso de privacidad

            $('body').on('click', '#editAviso', function(e) {

                e.preventDefault();

                var id = $(this).attr('data-id');

                var data = {

                    aviso: $('#aviso').val()

                };

                $.ajax({

                    url: 'update-aviso/' + id,

                    type: 'PUT',

                    data: data,

                    dataType: 'json',

                    beforeSend: function() {

                        $('#editAviso').waitMe();

                    },

                    success: function(data) {

                        $('#editAviso').waitMe('hide');

                        if(data.status == 200){

                            Swal.fire({

                                title: '¡Listo!',

                                icon: 'success',

                                text: 'El aviso de privacidad se ha editado correctamente.',

                                type: 'success',

                                confirmButtonText: 'Aceptar'

                            }).then(function() {

                                window.location.reload();

                            });

                        }else{

                            Swal.fire({

                                title: '¡Error!',

                                icon: 'error',

                                text: 'Ha ocurrido un error al editar el aviso de privacidad.',

                                type: 'error',

                                confirmButtonText: 'Aceptar'

                            });

                        }

                        

                    },

                    error: function(data) {

                        $('#editAviso').waitMe('hide');

                        Swal.fire({

                            title: '¡Error!',

                            icon: 'error',

                            text: 'Ha ocurrido un error al editar el aviso de privacidad.',

                            type: 'error',

                            confirmButtonText: 'Aceptar'

                        });

                    }

                });

            });



                

        });

    </script>

@endsection

