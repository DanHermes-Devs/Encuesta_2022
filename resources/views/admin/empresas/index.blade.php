@extends('admin.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card p-4">
            <div class="row justify-content-between">
                <h2>Empresas</h2>
                <button class="btn btn-info" data-toggle="modal" data-target="#addEmpresa">Añadir empresa</button>
            </div>
            <div class="mt-5">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <td width="20%">Nombre</td>
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
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="logo">Logo <small class="text-red">(Requerido)</small></label>
                        <input type="file" class="form-control" id="logo" name="logo" placeholder="Logo">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="logo">Imagen de fondo</label>
                        <input type="file" class="form-control" id="imagen_fondo" name="imagen_fondo" placeholder="Imagen de fondo">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="logo">Color principal</label>
                        <input type="color" class="form-control" id="colores_principales" name="colores_principales" placeholder="Color principal">
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="logo">Descripción <small class="text-red">(Requerido)</small></label>
                        <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción"></textarea>
                    </div>
                </div>
                <input type="hidden" class="form-control" name="token" id="token" value="{{ Str::uuid() }}">
            </div>
            <div class="modal-footer px-0">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar empresa</button>
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

<script>
    $(document).ready(function() {
        $('.table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            autoWidth: false,
            ajax: '{{ route('empresas') }}',
            columns: [
                {data: 'nombre', name: 'nombre'},
                {data: 'logo', name: 'logo'},
                {data: 'imagen_fondo', name: 'imagen_fondo'},
                {data: 'colores_principales', name: 'colores_principales'},
                {data: 'descripcion', name: 'descripcion'},
                {data: 'activo', name: 'activo'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ],
            columnDefs: [
                {
                    targets: 0, render: function(data, type, row){
                        return `<a href="empresa/${row.token}">${row.nombre}</a>`
                    }
                },
                {
                    targets: 1, render: function(data, type, row){
                        return `<img src="http://encuesta_2022.test/storage/${row.logo}" class="img-fluid w-25">`
                    }
                },
                {
                    targets: 2, render: function(data, type, row){
                        return `<img src="http://encuesta_2022.test/storage/${row.imagen_fondo}" class="img-fluid w-25">`
                    }
                },
            ],
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });

        // Mandamos los datos por ajax
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Añadir empresa
        $("#form_add_empresa").on('submit', function(e){
            e.preventDefault();
            var form = $(this);
            var formData = new FormData(form[0]);
            $.ajax({
                url: '{{ route('empresas.store') }}',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(data){
                    $('#addEmpresa').modal('hide');
                    $('#form_add_empresa')[0].reset();
                    $('body').removeClass('modal-open');
                    $('.modal-backdrop').remove();
                    $('#form_add_empresa').find('input[type="file"]').val('');
                    if(data.status == 'success'){
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
                        });
                    }else{
                        Swal.fire({
                            title: 'Error',
                            icon: 'error',
                            text: 'Ha ocurrido un error al añadir la empresa, verifica que los datos sean correctos',
                            type: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    }
                },
                error: function(data){
                    console.log(data);
                }
            });
        });
    });
</script>
@endsection
