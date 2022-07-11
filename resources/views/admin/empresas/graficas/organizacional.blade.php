<div class="col-12 col-md-4">
    <canvas id="organizacional" width="400" height="400"></canvas>
</div>

@php
    error_reporting(0);
    $arrayEstudios = array();
    $sumEstudios = array();
    
    foreach ($estudios as $key => $value){
        $estudio = $value->item_47+$value->item_48+$value->item_49+$value->item_50+$value->item_51+$value->item_52+$value->item_53+$value->item_54+$value->item_55+$value->item_56;
        
        // Introducir los estudios en el arreglo arrayEstudios
        array_push($arrayEstudios, $estudio);

        // Capturar cuantos son del mismo nivel academico
        $estudios_academicos = array($estudio => count($value->item_47+$value->item_48+$value->item_49+$value->item_50+$value->item_51+$value->item_52+$value->item_53+$value->item_54+$value->item_55+$value->item_56));
        // echo "<pre>"; print_r($estudios_academicos); echo "</pre>";
        foreach($estudios_academicos as $index => $item){
            $sumEstudios[$index] += $item;
        }
    }

    

    // echo "<pre>"; print_r($sumEstudios); echo "</pre>";
    $dataNoRepeat = array_unique($arrayEstudios);
    // echo "<pre>"; print_r($dataNoRepeat); echo "</pre>";
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>

    var estudios = document.getElementById('organizacional').getContext('2d');
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: [<?php
                    foreach($dataNoRepeat as $key => $value){
                        if($value < '14'){
                            echo "'NULO',";
                        }else if($value <= '14' || $value < '29'){
                            echo "'BAJO',";
                        }else if($value <= '29' || $value < '42'){
                            echo "'MEDIO',";
                        }else if($value <= '42' || $value < '58'){
                            echo "'ALTO',";
                        }else if($value >= '58'){
                            echo "'MUY ALTO',";
                        }
                    }
                ?>],
            datasets: [{
                label: 'Resultados de <?php echo count($estudios); ?> registros de usuarios',
                data: [
                    <?php
                        foreach($dataNoRepeat as $key => $value){
                            echo "'".$sumEstudios[$value]."',";
                        }
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
                    text: 'Entorno Organizacional',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>