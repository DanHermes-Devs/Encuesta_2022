<div class="col-12 col-md-4 mt-4">
    <canvas id="condicionespeligrosas" width="400" height="400"></canvas>
</div>
@php
    $nulo = 0;
    $bajo = 0;
    $medio = 0;
    $alto = 0;
    $muyalto = 0;

    foreach($Cpeligrosas as $value){
        if ($value->c_dimension_1 < 1){
            $nulo+=1;
        }else if ($value->c_dimension_1 <= 1 || $value->c_dimension_1 < 2){
            $bajo+=1;
        }else if ($value->c_dimension_1 <= 2 || $value->c_dimension_1 < 4){
            $medio+=1;
        }else if ($value->c_dimension_1 <= 4 || $value->c_dimension_1 < 6){
            $alto+=1;
        }else if ($value->c_dimension_1 >= 6){
            $muyalto+=1;
        }
    }
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>

    var estudios = document.getElementById('condicionespeligrosas').getContext('2d');
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
                    text: 'Condiciones peligrosas e inseguras',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>