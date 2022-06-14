@extends('admin.layouts.app')
{{-- waitme --}}
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
<style>
    .badge.badge-danger {
        cursor: pointer;
    }
</style>
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="card p-4">
                <div class="row justify-content-between">
                    <h2>Empresas</h2>
                    <button class="btn btn-info" data-toggle="modal" data-target="#addEmpresa"><i
                            class="fas fa-plus mr-2"></i>Añadir empresa</button>
                </div>
                <div class="mt-5">
                    <table class="table table-stripped">
                        <thead>
                            <tr>
                                <td width="20%">Nombre de la empresa</td>
                                <td>Logo</td>
                                <td>Imagen fondo</td>
                                <td>Colores principales</td>
                                <td>Descripción</td>
                                <td>Activo</td>
                                <td width="10%">Acciones</td>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal addEmpresa -->
    <div class="modal fade" id="addEmpresa" tabindex="-1" aria-labelledby="addEmpresaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmpresaLabel">Añadir empresa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="form_add_empresa" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre <small class="text-red">(Requerido)</small></label>
                                    <input type="text" class="form-control" id="nombre" name="nombre"
                                        placeholder="Nombre">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo">Logo <small class="text-red">(Requerido)</small></label>
                                    {{-- Solo aceptar jpg y png --}}
                                    <input type="file" class="form-control" id="logo" name="logo"
                                        accept="image/png, image/jpeg">
                                    <small>Tamaño máximo: 2MB</small>
                                    <small>Formato: jpg o png</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo">Imagen de fondo <small
                                            class="text-red">(Requerido)</small></label>
                                    <input type="file" class="form-control" id="imagen_fondo" name="imagen_fondo"
                                        accept="image/png, image/jpeg">
                                    <small>Tamaño máximo: 2MB</small>
                                    <small>Formato: jpg o png</small>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo">Color principal <small
                                            class="text-red">(Requerido)</small></label>
                                    <input type="color" class="form-control" id="colores_principales"
                                        name="colores_principales" placeholder="Color principal">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo">Descripción <small class="text-red">(Requerido)</small></label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="logo">Activo <small class="text-red">(Requerido)</small></label>
                                    <select class="form-control" id="activo" name="activo">
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Tipo de puesto</label>
                                    <input type="hidden" name="tipo_puesto" value="1">
                                    <div class="form-group__content input-group mb-3 tipo_puesto">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="badge badge-danger" onclick="removeInput(0,'tipo_puesto')"><i class="fas fa-times"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="summaryPuesto_0">
                                    </div>
                                    <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                        onclick="addInput(this, 'tipo_puesto')"><i
                                            class="fas fa-plus mr-2"></i>Añadir</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Área</label>
                                    <input type="hidden" name="area" value="1">
                                    <div class="form-group__content input-group mb-3 area">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="badge badge-danger" onclick="removeInput(0,'area')"><i class="fas fa-times"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="summaryArea_0">
                                    </div>
                                    <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                        onclick="addInput(this, 'area')"><i
                                            class="fas fa-plus mr-2"></i>Añadir</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Tipo de contratación</label>
                                    <input type="hidden" name="tipo_contratacion" value="1">
                                    <div class="form-group__content input-group mb-3 tipo_contratacion">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="badge badge-danger" onclick="removeInput(0,'tipo_contratacion')"><i class="fas fa-times"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="summaryContratacion_0">
                                    </div>
                                    <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                        onclick="addInput(this, 'tipo_contratacion')"><i
                                            class="fas fa-plus mr-2"></i>Añadir</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Jornada de trabajo</label>
                                    <input type="hidden" name="jornada_trabajo" value="1">
                                    <div class="form-group__content input-group mb-3 jornada_trabajo">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="badge badge-danger" onclick="removeInput(0,'jornada_trabajo')"><i class="fas fa-times"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="summaryJornada_0">
                                    </div>
                                    <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                        onclick="addInput(this, 'jornada_trabajo')"><i
                                            class="fas fa-plus mr-2"></i>Añadir</button>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="my-input">Rotacion de turnos</label>
                                    <input type="hidden" name="rotacion_turnos" value="1">
                                    <div class="form-group__content input-group mb-3 rotacion_turnos">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <span class="badge badge-danger" onclick="removeInput(0,'rotacion_turnos')"><i class="fas fa-times"></i></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control" name="summaryRotacion_0">
                                    </div>
                                    <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                        onclick="addInput(this, 'rotacion_turnos')"><i
                                            class="fas fa-plus mr-2"></i>Añadir</button>
                                </div>
                            </div>
                            {{-- <input type="hidden" class="form-control" name="token" id="token" value="{{ Str::uuid() }}"> --}}
                            <input type="hidden" class="form-control" name="token" id="token" value="">
                        </div>
                        <div class="modal-footer px-0">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-success guardarEmpresa">Guardar empresa</button>
                        </div>
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
    <script>
        function addInput(elem, type) {
            var inputs = $("."+type);
            
            if(inputs.length < 15){
                if(type == "tipo_puesto"){
                    $(elem).before(`
                        <div class="form-group__content input-group mb-3 tipo_puesto">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'tipo_puesto')"><i class="fas fa-times"></i></span>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="summaryPuesto_${inputs.length}">
                        </div>
                    `);
                }
                if(type == "area"){
                    $(elem).before(`
                        <div class="form-group__content input-group mb-3 area">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'area')"><i class="fas fa-times"></i></span>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="summaryArea_${inputs.length}">
                        </div>
                    `);
                }
                if(type == "tipo_contratacion"){
                    $(elem).before(`
                        <div class="form-group__content input-group mb-3 tipo_contratacion">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'tipo_contratacion')"><i class="fas fa-times"></i></span>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="summaryContratacion_${inputs.length}">
                        </div>
                    `);
                }
                if(type == "jornada_trabajo"){
                    $(elem).before(`
                        <div class="form-group__content input-group mb-3 jornada_trabajo">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'jornada_trabajo')"><i class="fas fa-times"></i></span>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="summaryJornada_${inputs.length}">
                        </div>
                    `);
                }
                if(type == "rotacion_turnos"){
                    $(elem).before(`
                        <div class="form-group__content input-group mb-3 rotacion_turnos">
                            <div class="input-group-append">
                                <span class="input-group-text">
                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'rotacion_turnos')"><i class="fas fa-times"></i></span>
                                </span>
                            </div>
                            <input type="text" class="form-control" name="summaryRotacion_${inputs.length}">
                        </div>
                    `);
                }

                $('[name="'+type+'"]').val(inputs.length+1);
            }else{
                alert("Maximo 15 opciones");
                return;
            }
        }

        function removeInput(index, type){
            var inputs = $("."+type);

            if(inputs.length > 1){
                inputs.each(i=>{
                    if(i == index){
                        $(inputs[i]).remove();
                    }
                });
                $('[name="'+type+'"]').val(inputs.length-1);
            }else{
                alert('Esta entrada no se puede eliminar');
                return;
            }
        }

        $(document).ready(function() {
            $('.table').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                autoWidth: false,
                ajax: '{{ route('empresas') }}',
                columns: [{
                        data: 'nombre',
                        name: 'nombre'
                    },
                    {
                        data: 'logo',
                        name: 'logo'
                    },
                    {
                        data: 'imagen_fondo',
                        name: 'imagen_fondo'
                    },
                    {
                        data: 'colores_principales',
                        name: 'colores_principales'
                    },
                    {
                        data: 'descripcion',
                        name: 'descripcion'
                    },
                    {
                        data: 'activo',
                        name: 'activo'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                columnDefs: [{
                        targets: 0,
                        render: function(data, type, row) {
                            return `<a href="empresa/${row.token}">${row.nombre}</a>`;
                        }
                    },
                    {
                        targets: 1,
                        render: function(data, type, row) {
                            return `<img src="http://encuesta_2022.test/storage/${row.logo}" class="img-fluid w-25">`
                        }
                    },
                    {
                        targets: 2,
                        render: function(data, type, row) {
                            return `<img src="http://encuesta_2022.test/storage/${row.imagen_fondo}" class="img-fluid w-25">`
                        }
                    },
                ],
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
                }
            });

            

            const generateId = () => Math.random().toString(36).substr(2, 8) + '-' + Math.random().toString(36)
                .substr(2, 4) + '-' + Math.random().toString(36).substr(2, 4) + '-' + Math.random().toString(36)
                .substr(2, 4) + '-' + Math.random().toString(36).substr(2, 12);
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

            // Añadir empresa
            $("#form_add_empresa").on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var formData = new FormData(form[0]);
                $.ajax({
                    url: '{{ route('empresas.store') }}',
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function() {
                        // Waitme
                        $('.guardarEmpresa').waitMe();
                    },
                    success: function(data) {
                        $('#addEmpresa').modal('hide');
                        $('#form_add_empresa')[0].reset();
                        $('body').removeClass('modal-open');
                        $('.modal-backdrop').remove();
                        $('#form_add_empresa').find('input[type="file"]').val('');
                        if (data.status == 'success') {
                            Swal.fire({
                                title: 'Empresa añadida',
                                icon: 'success',
                                text: 'La empresa se ha añadido correctamente',
                                type: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.value) {
                                    $('.table').DataTable().ajax.reload();
                                }

                                // waitme
                                $('.guardarEmpresa').waitMe('hide');
                            });
                        } else {
                            Swal.fire({
                                title: 'Error',
                                icon: 'error',
                                text: 'Ha ocurrido un error al añadir la empresa, verifica que los datos sean correctos',
                                type: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        }
                    },
                    error: function(data) {
                        console.log(data);
                    }
                });
            });

            // Eliminar empresa
            $(document).on('click', '.delete', function(e) {
                e.preventDefault();
                var id = $(this).data('id');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: '/empresas/delete/' + id,
                            type: 'GET',
                            success: function(data) {
                                if (data.status == 'success') {
                                    Swal.fire({
                                        title: 'Empresa eliminada',
                                        icon: 'success',
                                        text: 'La empresa se ha eliminado correctamente',
                                        type: 'success',
                                        confirmButtonText: 'Aceptar'
                                    }).then((result) => {
                                        if (result.value) {
                                            $('.table').DataTable().ajax
                                            .reload();
                                        }
                                    });
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        icon: 'error',
                                        text: 'Ha ocurrido un error al eliminar la empresa, verifica que los datos sean correctos',
                                        type: 'error',
                                        confirmButtonText: 'Aceptar'
                                    });
                                }
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
