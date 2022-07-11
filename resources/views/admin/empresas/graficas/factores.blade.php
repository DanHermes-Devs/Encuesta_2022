<div class="col-12 col-md-4">
    <canvas id="factores" width="400" height="400"></canvas>
</div>

@php
error_reporting(0);
$arrFactores = [];
$sumFactores = [];

foreach ($estudios as $key => $value) {
    $estudio = $value->item_1 + $value->item_2 + $value->item_3 + $value->item_4 + $value->item_5 + $value->item_6 + $value->item_7 + $value->item_8 + $value->item_9 + $value->item_10 + $value->item_11 + $value->item_12 + $value->item_13 + $value->item_14 + $value->item_15 + $value->item_16 + $value->item_23 + $value->item_24 + $value->item_25 + $value->item_26 + $value->item_27 + $value->item_28 + $value->item_29 + $value->item_30 + $value->item_35 + $value->item_36 + $value->item_65 + $value->item_66 + $value->item_67 + $value->item_68;

    // echo $estudio, "<br>";

    // Introducir los estudios en el arreglo arrFactores
    array_push($arrFactores, $estudio);

    // Capturar cuantos son del mismo nivel academico
    $estudios_academicos = [$estudio => count($value->item_1 + $value->item_2 + $value->item_3 + $value->item_4 + $value->item_5 + $value->item_6 + $value->item_7 + $value->item_8 + $value->item_9 + $value->item_10 + $value->item_11 + $value->item_12 + $value->item_13 + $value->item_14 + $value->item_15 + $value->item_16 + $value->item_23 + $value->item_24 + $value->item_25 + $value->item_26 + $value->item_27 + $value->item_28 + $value->item_29 + $value->item_30 + $value->item_35 + $value->item_36 + $value->item_65 + $value->item_66 + $value->item_67 + $value->item_68)];
    // echo "<pre>"; print_r($estudios_academicos); echo "</pre>";
    foreach ($estudios_academicos as $index => $item) {
        $sumFactores[$index] += $item;
    }
}

// echo "<pre>"; print_r($sumFactores); echo "</pre>";
$dataNoRepeat = array_unique($arrFactores);

// echo "<pre>"; print_r($dataNoRepeat); echo "</pre>";
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    var estudios = document.getElementById('factores').getContext('2d');
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: [<?php
                    foreach ($dataNoRepeat as $key => $value) {
                        if ($value < 15) {
                            echo "'NULO',";
                        } elseif ($value <= 15 || $value < 30) {
                            echo "'BAJO',";
                        } elseif ($value <= 30 || $value < 45) {
                            echo "'MEDIO',";
                        } elseif ($value <= 45 || $value < 60) {
                            echo "'ALTO',";
                        } elseif ($value >= 60) {
                            echo "'MUY ALTO',";
                        }
                    }
            ?>],
            datasets: [{
                label: 'Resultados de <?php echo count($estudios); ?> registros de usuarios',
                data: [
                    <?php
                    foreach ($dataNoRepeat as $key => $value) {
                        echo "'" . $sumFactores[$value] . "',";
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
                    text: 'Factores propios de la actividad',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>
