@extends('layouts.app')
<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">
<style>
    nav.navbar.navbar-expand-md.navbar-light.bg-white.shadow-sm {
        display: none;
    }
</style>
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2><b>Graficas</b></h2>
        </div>
        <div class="col-12 col-md-4 mt-5">
            <canvas id="chart_1" width="100%" height="100%"></canvas>
        </div>
        <div class="col-12 col-md-4 mt-5">
            <canvas id="chart_2" width="100%" height="100%"></canvas>
        </div>
        <div class="col-12 col-md-4 mt-5">
            <canvas id="chart_3" width="100%" height="100%"></canvas>
        </div>
        <div class="col-12 col-md-4 mt-5">
            <canvas id="chart_4" width="100%" height="100%"></canvas>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    const ctx = $('#chart_1');
    const chart_1 = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Sexo', 'Antiguedad', 'Edad', 'Estado civil', 'Estudios', 'Area'],
            datasets: [{
                label: 'Datos generales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    const ctx_2 = $('#chart_2');
    const chart_2 = new Chart(ctx_2, {
        type: 'bar',
        data: {
            labels: ['Sexo', 'Antiguedad', 'Edad', 'Estado civil', 'Estudios', 'Area'],
            datasets: [{
                label: 'Datos generales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    const ctx_3 = $('#chart_3');
    const chart_3 = new Chart(ctx_3, {
        type: 'line',
        data: {
            labels: ['Sexo', 'Antiguedad', 'Edad', 'Estado civil', 'Estudios', 'Area'],
            datasets: [{
                label: 'Datos generales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });

    const ctx_4 = $('#chart_4');
    const chart_4 = new Chart(ctx_4, {
        type: 'polarArea',
        data: {
            labels: ['Sexo', 'Antiguedad', 'Edad', 'Estado civil', 'Estudios', 'Area'],
            datasets: [{
                label: 'Datos generales',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
    });
</script>
@endsection