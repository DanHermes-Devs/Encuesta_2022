<div class="col-12 col-md-4">
    <canvas id="ambiente" width="400" height="400"></canvas>
</div>

@php
error_reporting(0);
$arrayEstudios = [];
$sumEstudios = [];

foreach ($estudios as $key => $value) {
    $estudio = $value->item_1 + $value->item_2 + $value->item_3 + $value->item_4 + $value->item_5;

    // Introducir los estudios en el arreglo arrayEstudios
    array_push($arrayEstudios, $estudio);

    // Capturar cuantos son del mismo nivel academico
    $estudios_academicos = [$estudio => count($value->item_1 + $value->item_2 + $value->item_3 + $value->item_4 + $value->item_5)];
    // echo "<pre>"; print_r($estudios_academicos); echo "</pre>";
    foreach ($estudios_academicos as $index => $item) {
        $sumEstudios[$index] += $item;
    }
}

// echo "<pre>"; print_r($sumEstudios); echo "</pre>";
$dataNoRepeat = array_unique($arrayEstudios);
// echo "<pre>"; print_r($dataNoRepeat); echo "</pre>";
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    var estudios = document.getElementById('ambiente').getContext('2d');
    const labelAmbiente = [<?php
    foreach ($dataNoRepeat as $key => $value) {
        if ($value < 5) {
            echo "'NULO',";
        } elseif ($value <= '5' || $value < '9') {
            echo "'BAJO',";
        } elseif ($value <= '9' || $value < '11') {
            echo "'MEDIO',";
        } elseif ($value <= '11' || $value < '14') {
            echo "'ALTO',";
        } elseif ($value >= '14') {
            echo "'MUY ALTO',";
        }
    }
    ?>];
    const backColor2 = [];
    const borderColor2 = [];
    for (i = 0; i < labelAmbiente.length; i++) {
        const r = Math.floor(Math.random() * 255);
        const g = Math.floor(Math.random() * 255);
        const b = Math.floor(Math.random() * 255);
        backColor2.push('rgba(' + r + ',' + g + ',' + b + ', 0.2)');
        borderColor2.push('rgba(' + r + ',' + g + ',' + b + ', 1)');
    }
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: labelAmbiente,
            datasets: [{
                label: 'Resultados de <?php echo count($estudios); ?> registros de usuarios',
                data: [
                    <?php
                    foreach ($dataNoRepeat as $key => $value) {
                        echo "'" . $sumEstudios[$value] . "',";
                    }
                    ?>
                ],
                backgroundColor: backColor2,
                borderColor: borderColor2,
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
                    text: 'Ambiente de trabajo',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>
