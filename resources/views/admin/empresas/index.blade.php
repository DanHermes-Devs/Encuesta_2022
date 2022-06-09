@extends('admin.layouts.app')
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card p-4">
            <div class="row justify-content-between">
                <h2>Empresas</h2>
                <button class="btn btn-success">Añadir empresa</button>
            </div>
            <div class="mt-5">
                <table class="table table-stripped">
                    <thead>
                        <tr>
                            <td>Nombre</td>
                            <td>Logo</td>
                            <td>Imagen fondo</td>
                            <td>Colores principales</td>
                            <td>Descripción</td>
                            <td>Activo</td>
                            <td>Acciones</td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
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
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            }
        });
    });
</script>
@endsection
