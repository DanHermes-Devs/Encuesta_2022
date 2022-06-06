@extends('layouts.app')
<style>
    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }
</style>
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
@section('content')
<div class="container-fluid bg-white mt-5">
    <div class="row justify-content-center">
        <div class="col-12">
            @php
                use App\Registro;
                $cookieGlobal = $_COOKIE['cookieCalificaciones'];
                $registroID = Registro::where('token', $cookieGlobal)->first();
                dump($registroID);
            @endphp
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/waitMe.min.js') }}"></script>
@endsection