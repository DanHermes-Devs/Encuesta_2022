<div class="col-12 col-md-4 mt-4">
    <canvas id="cargascontradictorias" width="400" height="400"></canvas>
</div>
@php
    $nulo = 0;
    $bajo = 0;
    $medio = 0;
    $alto = 0;
    $muyalto = 0;

    foreach($Ccontradictorias as $value){
        if ($value->c_dimension_9 < 1){
            $nulo+=1;
        }else if ($value->c_dimension_9 <= 1 || $value->c_dimension_9 < 2){
            $bajo+=1;
        }else if ($value->c_dimension_9 <= 2 || $value->c_dimension_9 < 4){
            $medio+=1;
        }else if ($value->c_dimension_9 <= 4 || $value->c_dimension_9 < 6){
            $alto+=1;
        }else if ($value->c_dimension_9 >= 6){
            $muyalto+=1;
        }
    }

@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>

    var estudios = document.getElementById('cargascontradictorias').getContext('2d');
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: [
                'NULO',
                'BAJO',
                'MEDIA',
                'ALTO',
                'MUY ALTO'
            ],
            datasets: [{
                label: 'Resultados de <?php echo count($estudios); ?> registros de usuarios',
                data: [
                    <?php
                        echo $nulo.",";
                        echo $bajo.",";
                        echo $medio.",";
                        echo $alto.",";
                        echo $muyalto;
                    ?>
                ],
                backgroundColor: [
                    'rgba(0, 255, 255, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                ],
                borderColor: [
                    'rgba(0, 255, 255, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: true,
                },
                title: {
                    display: true,
                    text: 'Cargas contradictorias o inconsistentes',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>