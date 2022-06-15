@extends('admin.layouts.app')
{{-- waitme --}}
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card p-4">
            <div class="row justify-content-between">
                <h2>Reportes</h2>
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
@endsection
@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script>
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
                            return `<a href="empresa/${row.token}">${row.nombre}</a>`
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
        });
    </script>
@endsection
