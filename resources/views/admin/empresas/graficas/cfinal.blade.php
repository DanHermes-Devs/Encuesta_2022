<div class="col-12 col-md-2">
    <canvas id="cfinal" width="400" height="400"></canvas>
</div>

@php
    error_reporting(0);
    $arrayEstudios = array();
    $sumEstudios = array();
    
    foreach ($estudios as $key => $value){
        $estudio = $value->item_1+$value->item_2+$value->item_3+$value->item_4+$value->item_5+$value->item_6+$value->item_7+$value->item_8+$value->item_9+$value->item_10+$value->item_11+$value->item_12+$value->item_13+$value->item_14+$value->item_15+$value->item_16+$value->item_17+$value->item_18+$value->item_19+$value->item_20+$value->item_21+$value->item_22+$value->item_23+$value->item_24+$value->item_25+$value->item_26+$value->item_27+$value->item_28+$value->item_29+$value->item_30+$value->item_31+$value->item_32+$value->item_33+$value->item_34+$value->item_35+$value->item_36+$value->item_37+$value->item_38+$value->item_39+$value->item_40+$value->item_41+$value->item_42+$value->item_43+$value->item_44+$value->item_45+$value->item_46+$value->item_47+$value->item_48+$value->item_49+$value->item_50+$value->item_51+$value->item_52+$value->item_53+$value->item_54+$value->item_55+$value->item_56+$value->item_57+$value->item_58+$value->item_59+$value->item_60+$value->item_61+$value->item_62+$value->item_63+$value->item_64+$value->item_65+$value->item_66+$value->item_67+$value->item_68+$value->item_69+$value->item_70+$value->item_71+$value->item_72;
        
        // Introducir los estudios en el arreglo arrayEstudios
        array_push($arrayEstudios, $estudio);

        // Capturar cuantos son del mismo nivel academico
        $estudios_academicos = array($estudio => count($value->item_1+$value->item_2+$value->item_3+$value->item_4+$value->item_5+$value->item_6+$value->item_7+$value->item_8+$value->item_9+$value->item_10+$value->item_11+$value->item_12+$value->item_13+$value->item_14+$value->item_15+$value->item_16+$value->item_17+$value->item_18+$value->item_19+$value->item_20+$value->item_21+$value->item_22+$value->item_23+$value->item_24+$value->item_25+$value->item_26+$value->item_27+$value->item_28+$value->item_29+$value->item_30+$value->item_31+$value->item_32+$value->item_33+$value->item_34+$value->item_35+$value->item_36+$value->item_37+$value->item_38+$value->item_39+$value->item_40+$value->item_41+$value->item_42+$value->item_43+$value->item_44+$value->item_45+$value->item_46+$value->item_47+$value->item_48+$value->item_49+$value->item_50+$value->item_51+$value->item_52+$value->item_53+$value->item_54+$value->item_55+$value->item_56+$value->item_57+$value->item_58+$value->item_59+$value->item_60+$value->item_61+$value->item_62+$value->item_63+$value->item_64+$value->item_65+$value->item_66+$value->item_67+$value->item_68+$value->item_69+$value->item_70+$value->item_71+$value->item_72));
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

    var estudios = document.getElementById('cfinal').getContext('2d');
    var estudiosChart = new Chart(estudios, {
        type: 'bar',
        data: {
            labels: [<?php
                    foreach($dataNoRepeat as $key => $value){
                        echo "'".$value."',";
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
                    text: 'Resultado del cuestionario',
                    font: {
                        size: 20
                    }
                },
            }
        },
    });
</script>