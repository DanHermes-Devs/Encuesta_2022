@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

@section('content')

<div class="content">

    <div class="container-fluid">

        <div class="card p-4">

            <div class="row justify-content-between align-items-center">

                <h2>Reportes</h2>

                <a href="{{ route('registro.export') }}" class="btn btn-success"><i class="fas fa-file-excel mr-2"></i>Exportar todo</a>

            </div>

            <div class="mt-5">

                <table class="table table-stripped">

                    <thead>

                        <tr>

                            <td width="20%">Empresa</td>

                            <td>Correo</td>

                            <td>Resultados</td>

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

                ajax: '{{ route('registro.index') }}',

                columns: [{

                        data: 'id_empresa',

                        name: 'id_empresa'

                    },

                    {

                        data: 'email',

                        name: 'email'

                    },

                    {

                        data: 'token',

                        name: 'token'

                    },

                ],

                columnDefs: [

                    {

                        targets: 0,

                        render: function(data, type, row) {

                            return `<a href="empresa/${row.empresa.token}">${row.empresa.nombre}</a>`

                        }

                    },

                    {

                        targets: 2,

                        render: function(data, type, row) {

                            return `<a target="_blank" href="resultados/${row.token}" class="btn btn-success">Ver resultados</a>`

                        }

                    }

                ],

                "language": {

                    "url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"

                }

            });

        });

    </script>

@endsection

