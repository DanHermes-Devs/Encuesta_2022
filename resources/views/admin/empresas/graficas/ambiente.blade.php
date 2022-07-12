<div class="col-12 col-md-4">
    <canvas id="ambiente" width="400" height="400"></canvas>
</div>

@php
    $nulo = 0;
    $bajo = 0;
    $medio = 0;
    $alto = 0;
    $muyalto = 0;

    foreach($Atrabajo as $value){
        if ($value->c_cat_1 < 5){
            $nulo+=1;
        }else if ($value->c_cat_1 <= 5 || $value->c_cat_1 < 9){
            $bajo+=1;
        }else if ($value->c_cat_1 <= 9 || $value->c_cat_1 < 11){
            $medio+=1;
        }else if ($value->c_cat_1 <= 11 || $value->c_cat_1 < 14){
            $alto+=1;
        }else if ($value->c_cat_1 >= 14){
            $muyalto+=1;
        }
    }
@endphp
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>
<script>
    var estudios = document.getElementById('ambiente').getContext('2d');
    const labelAmbiente = [
        'NULO',
        'BAJO',
        'MEDIA',
        'ALTO',
        'MUY ALTO'
    ];
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
                        echo $nulo.",";
                        echo $bajo.",";
                        echo $medio.",";
                        echo $alto.",";
                        echo $muyalto;
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
