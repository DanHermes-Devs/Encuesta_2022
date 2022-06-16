@extends('layouts.app')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<style>

    body {

        background: url({{ asset('images/bg.jpg') }}) no-repeat center center fixed;

        background-repeat: no-repeat;

        background-size: cover;

        background-attachment: fixed;
        display: flex;
        justify-content: center;
        align-items: center;

    }

    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }


</style>

@section('content')

    <div class="container mt-5">

        <div class="row justify-content-center align-items-center">

            <div class="col-12 col-md-12">
                <div class="alert alert-danger">
                    <h1 class="text-center">¡No se ah encontrado este registro!</h1>
                </div>
            </div>

        </div>

    </div>

@endsection



@section('scripts')
    <script>


    </script>

@endsection

