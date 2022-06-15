<style>
    .badge-success-low {
        color: #000;
        background-color: #92d050;
    }
    .badge-warning-low {
        color: #000;
        background-color: #ffff00;
    }
</style>
<table>
    <thead>
    <tr>
        <th style="width: 25px;">ID</th>
        <th style="width: 100px;">Empresa</th>
        <th style="width: 100px;">Email</th>
        <th style="width: 100px;">Sexo</th>
        <th style="width: 100px;">Estado civil</th>
        <th style="width: 100px;">Edad</th>
        <th style="width: 100px;">Antiguedad</th>
        <th style="width: 100px;">Estudios</th>
        <th style="width: 100px;">Tipo de puesto</th>
        <th style="width: 100px;">Área</th>
        <th style="width: 100px;">Tipo de contratacion</th>
        <th style="width: 100px;">Jornada de trabajo</th>
        <th style="width: 100px;">Rotacion de turnos</th>
        <th style="width: 100px;">Experiencia laboral</th>
        <th style="width: 100px;">Calificación final</th>
        <th style="width: 100px;">Ambiente de trabajo</th>
        <th style="width: 100px;">Factores propios de la actividad</th>
        <th style="width: 100px;">Organización del tiempo de trabajo</th>
        <th style="width: 100px;">Liderazgo y relaciones en el trabajo</th>
        <th style="width: 100px;">Entorno organizacional</th>
        <th style="width: 100px;">Características del liderazgo</th>
        <th style="width: 100px;">Relaciones sociales en el trabajo</th>
        <th style="width: 100px;">Condiciones en el ambiente de trabajo</th>
        <th style="width: 100px;">Carga de trabajo</th>
        <th style="width: 100px;">Falta de control sobre el trabajo</th>
        <th style="width: 100px;">Jornada de trabajo</th>
        <th style="width: 100px;">Interferencia en la relación trabajo-familia</th>
        <th style="width: 100px;">Liderazgo</th>
        <th style="width: 100px;">Relaciones en el trabajo</th>
        <th style="width: 100px;">Violencia</th>
        <th style="width: 100px;">Reconocimiento del desempeño</th>
        <th style="width: 100px;">Insuficiente sentido de pertenencia e, inestabilidad</th>

    </tr>
    </thead>
    <tbody>

    @foreach($registros as $registro)
        <tr>
            <td>{{ $registro->id }}</td>
            <td>{{ $registro->empresa->nombre }}</td>
            <td>{{ $registro->email }}</td>
            <td>{{ $registro->sexo }}</td>
            <td>{{ $registro->estado_civil }}</td>
            <td>{{ $registro->edad }}</td>
            <td>{{ $registro->antiguedad }}</td>
            <td>{{ $registro->estudios }}</td>
            <td>{{ $registro->tipo_puesto }}</td>
            <td>{{ $registro->area }}</td>
            <td>{{ $registro->tipo_contratacion }}</td>
            <td>{{ $registro->jornada_trabajo }}</td>
            <td>{{ $registro->rotacion_turnos }}</td>
            <td>{{ $registro->experiencia_laboral }}</td>

            {{-- Calificación final del cuestionario --}}
            @if ($registro->calificaciones->c_final < '50')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_final <= '50' || $registro->calificaciones->c_final < '75')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_final <= '75' || $registro->calificaciones->c_final < '99')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_final <= '99' || $registro->calificaciones->c_final < '140')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_final >= '140')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Ambiente de trabajo --}}
            @if ($registro->calificaciones->c_cat_1 < '5')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_1 <= '5' || $registro->calificaciones->c_cat_1 < '9')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_1 <= '9' || $registro->calificaciones->c_cat_1 < '11')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_1 <= '11' || $registro->calificaciones->c_cat_1 < '14')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_1 >= '14')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Factores propios de la actividad --}}
            @if ($registro->calificaciones->c_cat_2 < '15')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_2 <= '15' || $registro->calificaciones->c_cat_2 < '30')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_2 <= '30' || $registro->calificaciones->c_cat_2 < '45')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_2 <= '45' || $registro->calificaciones->c_cat_2 < '60')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_2 >= '60')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif


            {{-- Organización del tiempo de trabajo --}}
            @if ($registro->calificaciones->c_cat_3 < '5')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_3 <= '5' || $registro->calificaciones->c_cat_3 < '7')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_3 <= '7' || $registro->calificaciones->c_cat_3 < '10')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_3 <= '10' || $registro->calificaciones->c_cat_3 < '13')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_3 >= '13')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Liderazgo y relaciones en el trabajo --}}
            @if ($registro->calificaciones->c_cat_4 < '14')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_4 <= '14' || $registro->calificaciones->c_cat_4 < '29')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_4 <= '29' || $registro->calificaciones->c_cat_4 < '42')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_4 <= '42' || $registro->calificaciones->c_cat_4 < '58')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_4 >= '58')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Entorno organizacional --}}
            @if ($registro->calificaciones->c_cat_5 < '10')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_5 <= '10' || $registro->calificaciones->c_cat_5 < '14')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_5 <= '14' || $registro->calificaciones->c_cat_5 < '18')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_5 <= '18' || $registro->calificaciones->c_cat_5 < '23')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_5 >= '23')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Características del liderazgo --}}
            @if ($registro->calificaciones->c_cat_6 < '5')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_6 <= '5' || $registro->calificaciones->c_cat_6 < '9')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_6 <= '9' || $registro->calificaciones->c_cat_6 < '11')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_6 <= '11' || $registro->calificaciones->c_cat_6 < '14')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_6 >= '14')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif


            {{-- Relaciones sociales en el trabajo --}}
            @if ($registro->calificaciones->c_cat_7 < '5')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_cat_7 <= '5' || $registro->calificaciones->c_cat_7 < '9')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_cat_7 <= '9' || $registro->calificaciones->c_cat_7 < '11')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_cat_7 <= '11' || $registro->calificaciones->c_cat_7 < '14')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_cat_7 >= '14')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Condiciones en el ambiente de trabajo --}}
            @if ($registro->calificaciones->c_dominio_1 < '5')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_1 <= '5' || $registro->calificaciones->c_dominio_1 < '9')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_1 <= '9' || $registro->calificaciones->c_dominio_1 < '11')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_1 <= '11' || $registro->calificaciones->c_dominio_1 < '14')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_1 >= '14')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Carga de trabajo --}}
            @if ($registro->calificaciones->c_dominio_2 < '15')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_2 <= '15' || $registro->calificaciones->c_dominio_2 < '21')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_2 <= '21' || $registro->calificaciones->c_dominio_2 < '27')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_2 <= '27' || $registro->calificaciones->c_dominio_2 < '37')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_2 >= '37')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Falta de control sobre el trabajo --}}
            @if ($registro->calificaciones->c_dominio_3 < '11')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_3 <= '11' || $registro->calificaciones->c_dominio_3 < '16')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_3 <= '16' || $registro->calificaciones->c_dominio_3 < '21')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_3 <= '21' || $registro->calificaciones->c_dominio_3 < '25')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_3 >= '25')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Jornada de trabajo --}}
            @if ($registro->calificaciones->c_dominio_4 < '1')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_4 <= '1' || $registro->calificaciones->c_dominio_4 < '2')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_4 <= '2' || $registro->calificaciones->c_dominio_4 < '4')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_4 <= '4' || $registro->calificaciones->c_dominio_4 < '6')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_4 >= '6')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Interferencia en la relación trabajo-familia --}}
            @if ($registro->calificaciones->c_dominio_5 < '4')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_5 <= '4' || $registro->calificaciones->c_dominio_5 < '6')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_5 <= '6' || $registro->calificaciones->c_dominio_5 < '8')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_5 <= '8' || $registro->calificaciones->c_dominio_5 < '10')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_5 >= '10')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif
        
            {{-- Liderazgo --}}
            @if ($registro->calificaciones->c_dominio_6 < '9')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_6 <= '9' || $registro->calificaciones->c_dominio_6 < '12')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_6 <= '12' || $registro->calificaciones->c_dominio_6 < '16')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_6 <= '16' || $registro->calificaciones->c_dominio_6 < '20')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_6 >= '20')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Relaciones en el trabajo --}}
            @if ($registro->calificaciones->c_dominio_7 < '10')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_7 <= '10' || $registro->calificaciones->c_dominio_7 < '13')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_7 <= '13' || $registro->calificaciones->c_dominio_7 < '17')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_7 <= '17' || $registro->calificaciones->c_dominio_7 < '21')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_7 >= '21')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Violencia --}}
            @if ($registro->calificaciones->c_dominio_8 < '7')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_8 <= '7' || $registro->calificaciones->c_dominio_8 < '10')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_8 <= '10' || $registro->calificaciones->c_dominio_8 < '13')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_8 <= '13' || $registro->calificaciones->c_dominio_8 < '16')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_8 >= '16')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Reconocimiento del desempeño --}}
            @if ($registro->calificaciones->c_dominio_9 < '6')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_9 <= '6' || $registro->calificaciones->c_dominio_9 < '10')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_9 <= '10' || $registro->calificaciones->c_dominio_9 < '14')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_9 <= '14' || $registro->calificaciones->c_dominio_9 < '18')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_9 >= '18')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif

            {{-- Insuficiente sentido de pertenencia e, inestabilidad --}}
            @if ($registro->calificaciones->c_dominio_10 < '4')
                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>
            @elseif ($registro->calificaciones->c_dominio_10 <= '4' || $registro->calificaciones->c_dominio_10 < '6')
                <td style="color: #212529;background-color: #92d050;">Bajo</td>
            @elseif ($registro->calificaciones->c_dominio_10 <= '6' || $registro->calificaciones->c_dominio_10 < '8')
                <td style="color: #212529;background-color: #ffff00;">Medio</td>
            @elseif ($registro->calificaciones->c_dominio_10 <= '8' || $registro->calificaciones->c_dominio_10 < '10')
                <td style="color: #212529;background-color: #ffc107;">Alto</td>
            @elseif ($registro->calificaciones->c_dominio_10 >= '10')
                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>