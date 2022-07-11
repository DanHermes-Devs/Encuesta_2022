<div class="col-12 col-md-4">
    <canvas id="liderazgo" width="400" height="400"></canvas>
</div>

@php
    error_reporting(0);
    $arrayEstudios = array();
    $sumEstudios = array();
    
    foreach ($estudios as $key => $value){
        $estudio = $value->item_31+$value->item_32+$value->item_33+$value->item_34+$value->item_35+$value->item_36+$value->item_37+$value->item_38+$value->item_39+$value->item_40+$value->item_41+$value->item_42+$value->item_43+$value->item_44+$value->item_45+$value->item_46+$value->item_57+$value->item_58+$value->item_59+$value->item_60+$value->item_61+$value->item_62+$value->item_63+$value->item_64+$value->item_65+$value->item_66+$value->item_67+$value->item_68+$value->item_69+$value->item_70+$value->item_71+$value->item_72;
        
        // Introducir los estudios en el arreglo arrayEstudios
        array_push($arrayEstudios, $estudio);

        // Capturar cuantos son del mismo nivel academico
        $estudios_academicos = array($estudio => count($value->item_31+$value->item_32+$value->item_33+$value->item_34+$value->item_35+$value->item_36+$value->item_37+$value->item_38+$value->item_39+$value->item_40+$value->item_41+$value->item_42+$value->item_43+$value->item_44+$value->item_45+$value->item_46+$value->item_57+$value->item_58+$value->item_59+$value->item_60+$value->item_61+$value->item_62+$value->item_63+$value->item_64+$value->item_65+$value->item_66+$value->item_67+$value->item_68+$value->item_69+$value->item_70+$value->item_71+$value->item_72));
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

    var estudios = document.getElementById('liderazgo').getContext('2d');
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
                    text: 'Liderazgo y relaciones en el trabajo',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>