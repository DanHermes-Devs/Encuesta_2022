@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css" />

<style>

</style>

@section('content')
    <div class="content">

        <div class="container-fluid">

            <div class="card p-4">

                <div class="row justify-content-between">
                    <h2>Datos generales de la empresa</h2>
                </div>
                {{dump($empresas)}}
            </div>
        </div>
    </div>
@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

    <script></script>
@endsection
