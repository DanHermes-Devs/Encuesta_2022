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

            <th style="width: 350px;">Empresa</th>

            <th style="width: 250px;">Email</th>

            <th style="width: 100px;">Sexo</th>

            <th style="width: 100px;">Estado civil</th>

            <th style="width: 100px;">Edad</th>

            <th style="width: 100px;">Antiguedad</th>

            <th style="width: 100px;">Estudios</th>

            <th style="width: 180px;">Tipo de puesto</th>

            <th style="width: 180px;">Área</th>

            <th style="width: 180px;">Tipo de contratacion</th>

            <th style="width: 180px;">Jornada de trabajo</th>

            <th style="width: 180px;">Experiencia laboral</th>

            <th style="width: 180px;">Calificación final</th>

            <th style="width: 180px;">Ambiente de trabajo</th>

            <th style="width: 180px;">Factores propios de la actividad</th>

            <th style="width: 180px;">Organización del tiempo de trabajo</th>

            <th style="width: 180px;">Liderazgo y relaciones en el trabajo</th>

            <th style="width: 180px;">Entorno organizacional</th>

            <th style="width: 180px;">Condiciones en el ambiente de trabajo</th>

            <th style="width: 180px;">Carga de trabajo</th>

            <th style="width: 180px;">Falta de control sobre el trabajo</th>

            <th style="width: 180px;">Jornada de trabajo</th>

            <th style="width: 180px;">Interferencia en la relación trabajo-familia</th>

            <th style="width: 180px;">Liderazgo</th>

            <th style="width: 180px;">Relaciones en el trabajo</th>

            <th style="width: 180px;">Violencia</th>

            <th style="width: 180px;">Reconocimiento del desempeño</th>

            <th style="width: 180px;">Insuficiente sentido de pertenencia e, inestabilidad</th>

            <th style="width: 180px;">Condiciones peligrosas e inseguras</th>

            <th style="width: 180px;">Condiciones deficientes e insalubres</th>

            <th style="width: 180px;">Trabajos peligrosos</th>

            <th style="width: 180px;">Cargas cuantitativas</th>

            <th style="width: 180px;">Ritmos de trabajo acelerado</th>

            <th style="width: 180px;">Carga mental</th>

            <th style="width: 180px;">Cargas psicológicas emocionales</th>

            <th style="width: 180px;">Cargas de alta responsabilidad</th>

            <th style="width: 180px;">Cargas contradictorias o inconsistentes</th>

            <th style="width: 180px;">Falta de control y autonomía sobre el trabajo</th>

            <th style="width: 180px;">Limitada o nula posibilidad de desarrollo</th>

            <th style="width: 180px;">Insuficiente participación y manejo del cambio</th>

            <th style="width: 180px;">Limitada o inexistente capacitación</th>

            <th style="width: 180px;">Jornadas de trabajo extensas</th>

            <th style="width: 180px;">Influencia del trabajo fuera del centro laboral</th>

            <th style="width: 180px;">Influencia de las responsabilidades familiares</th>

            <th style="width: 180px;">Escaza claridad de funciones</th>

            <th style="width: 180px;">Características del liderazgo</th>

            <th style="width: 180px;">Relaciones sociales en el trabajo</th>

            <th style="width: 180px;">Deficiente relación con los colaboradores que supervisa</th>

            <th style="width: 180px;">Violencia laboral</th>

            <th style="width: 180px;">Escasa o nula retroalimentación del desempeño</th>

            <th style="width: 180px;">Escaso o nulo reconocimiento y compensación</th>

            <th style="width: 180px;">Limitado sentido de pertenencia</th>

            <th style="width: 180px;">Inestabilidad laboral</th>

            <th style="width: 180px;">¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave?</th>
            <th style="width: 180px;">¿Asaltos?</th>
            <th style="width: 180px;">¿Actos violentos que derivaron en lesiones graves?</th>
            <th style="width: 180px;">¿Secuestro?</th>
            <th style="width: 180px;">¿Amenazas?</th>
            <th style="width: 250px;">¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas?</th>
            <th style="width: 250px;">¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares?</th>
            <th style="width: 250px;">¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar?</th>
            <th style="width: 250px;">¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento?</th>
            <th style="width: 250px;">¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento?</th>
            <th style="width: 250px;">¿Ha tenido dificultad para recordar alguna parte importante del evento?</th>
            <th style="width: 250px;">¿Ha disminuido su interés en sus actividades cotidianas?</th>
            <th style="width: 250px;">¿Se ha sentido usted alejado o distante de los demás?</th>
            <th style="width: 250px;">¿Ha notado que tiene dificultad para expresar sus sentimientos?</th>
            <th style="width: 250px;">¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado?</th>
            <th style="width: 250px;">¿Ha tenido usted dificultades para dormir?</th>
            <th style="width: 250px;">¿Ha estado particularmente irritable o le han dado arranques de coraje?</th>
            <th style="width: 250px;">¿Ha tenido dificultad para concentrarse?</th>
            <th style="width: 250px;">¿Ha estado nervioso o constantemente en alerta?</th>
            <th style="width: 250px;">¿Se ha sobresaltado fácilmente por cualquier cosa?</th>



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

            <td>{{ $registro->tipo_contratacion }}</td>

            <td>{{ $registro->area }}</td>

            <td>{{ $registro->tipo_contratacion_two }}</td>

            @if ( $registro->jornada_trabajo === 'Otro' )
                <td>{{ $registro->jornada_trabajo }}: {{ $registro->jornada_trabajo_opcional }}</td>
                @else
                <td>{{ $registro->jornada_trabajo }}</td>
            @endif

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



            {{-- Condiciones peligrosas e inseguras --}}

            @if ($registro->calificaciones->c_dimension_1 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_1 <= '1' || $registro->calificaciones->c_dimension_1 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_1 <= '2' || $registro->calificaciones->c_dimension_1 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_1 <= '4' || $registro->calificaciones->c_dimension_1 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_1 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Condiciones deficientes e insalubres --}}

            @if ($registro->calificaciones->c_dimension_2 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_2 <= '1' || $registro->calificaciones->c_dimension_2 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_2 <= '2' || $registro->calificaciones->c_dimension_2 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_2 <= '4' || $registro->calificaciones->c_dimension_2 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_2 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Trabajos peligrosos --}}

            @if ($registro->calificaciones->c_dimension_3 = '0')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_3 = '1')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_3 = '2')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_3 < '3')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_3 = '4')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Cargas cuantitativas --}}

            @if ($registro->calificaciones->c_dimension_4 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_4 <= '1' || $registro->calificaciones->c_dimension_4 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_4 <= '2' || $registro->calificaciones->c_dimension_4 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_4 <= '4' || $registro->calificaciones->c_dimension_4 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_4 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Ritmos de trabajo acelerado --}}

            @if ($registro->calificaciones->c_dimension_5 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_5 <= '1' || $registro->calificaciones->c_dimension_5 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_5 <= '2' || $registro->calificaciones->c_dimension_5 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_5 <= '4' || $registro->calificaciones->c_dimension_5 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_5 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Carga mental --}}

            @if ($registro->calificaciones->c_dimension_6 < '3')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_6 <= '3' || $registro->calificaciones->c_dimension_6 < '5')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_6 <= '5' || $registro->calificaciones->c_dimension_6 < '7')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_6 <= '7' || $registro->calificaciones->c_dimension_6 < '9')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_6 >= '9')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Cargas psicológicas emocionales --}}

            @if ($registro->calificaciones->c_dimension_7 < '4')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_7 <= '4' || $registro->calificaciones->c_dimension_7 < '6')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_7 <= '6' || $registro->calificaciones->c_dimension_7 < '8')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_7 <= '8' || $registro->calificaciones->c_dimension_7 < '10')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_7 >= '10')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Cargas de alta responsabilidad --}}

            @if ($registro->calificaciones->c_dimension_8 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_8 <= '1' || $registro->calificaciones->c_dimension_8 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_8 <= '2' || $registro->calificaciones->c_dimension_8 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_8 <= '4' || $registro->calificaciones->c_dimension_8 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_8 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Cargas contradictorias o inconsistentes --}}

            @if ($registro->calificaciones->c_dimension_9 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_9 <= '1' || $registro->calificaciones->c_dimension_9 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_9 <= '2' || $registro->calificaciones->c_dimension_9 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_9 <= '4' || $registro->calificaciones->c_dimension_9 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_9 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Falta de control y autonomía sobre el trabajo --}}

            @if ($registro->calificaciones->c_dimension_10 < '4')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_10 <= '4' || $registro->calificaciones->c_dimension_10 < '6')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_10 <= '6' || $registro->calificaciones->c_dimension_10 < '8')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_10 <= '8' || $registro->calificaciones->c_dimension_10 < '10')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_10 >= '10')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Limitada o nula posibilidad de desarrollo --}}

            @if ($registro->calificaciones->c_dimension_11 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_11 <= '1' || $registro->calificaciones->c_dimension_11 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_11 <= '2' || $registro->calificaciones->c_dimension_11 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_11 <= '4' || $registro->calificaciones->c_dimension_11 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_11 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Insuficiente participación y manejo del cambio --}}

            @if ($registro->calificaciones->c_dimension_12 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_12 <= '1' || $registro->calificaciones->c_dimension_12 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_12 <= '2' || $registro->calificaciones->c_dimension_12 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_12 <= '4' || $registro->calificaciones->c_dimension_12 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_12 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Limitada o inexistente capacitación --}}

            @if ($registro->calificaciones->c_dimension_13 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_13 <= '1' || $registro->calificaciones->c_dimension_13 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_13 <= '2' || $registro->calificaciones->c_dimension_13 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_13 <= '4' || $registro->calificaciones->c_dimension_13 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_13 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Jornadas de trabajo extensas --}}

            @if ($registro->calificaciones->c_dimension_14 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_14 <= '1' || $registro->calificaciones->c_dimension_14 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_14 <= '2' || $registro->calificaciones->c_dimension_14 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_14 <= '4' || $registro->calificaciones->c_dimension_14 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_14 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Influencia del trabajo fuera del centro laboral --}}

            @if ($registro->calificaciones->c_dimension_15 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_15 <= '1' || $registro->calificaciones->c_dimension_15 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_15 <= '2' || $registro->calificaciones->c_dimension_15 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_15 <= '4' || $registro->calificaciones->c_dimension_15 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_15 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Influencia de las responsabilidades familiares --}}

            @if ($registro->calificaciones->c_dimension_16 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_16 <= '1' || $registro->calificaciones->c_dimension_16 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_16 <= '2' || $registro->calificaciones->c_dimension_16 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_16 <= '4' || $registro->calificaciones->c_dimension_16 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_16 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Escaza claridad de funciones --}}

            @if ($registro->calificaciones->c_dimension_17 < '4')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_17 <= '4' || $registro->calificaciones->c_dimension_17 < '6')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_17 <= '6' || $registro->calificaciones->c_dimension_17 < '8')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_17 <= '8' || $registro->calificaciones->c_dimension_17 < '10')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_17 >= '10')

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



            {{-- Deficiente relación con los colaboradores que supervisa --}}

            @if ($registro->calificaciones->c_dimension_18 < '4')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_18 <= '4' || $registro->calificaciones->c_dimension_18 < '6')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_18 <= '6' || $registro->calificaciones->c_dimension_18 < '8')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_18 <= '8' || $registro->calificaciones->c_dimension_18 < '10')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_18 >= '10')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Violencia laboral --}}

            @if ($registro->calificaciones->c_dimension_19 < '7')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_19 <= '7' || $registro->calificaciones->c_dimension_19 < '10')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_19 <= '10' || $registro->calificaciones->c_dimension_19 < '13')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_19 <= '13' || $registro->calificaciones->c_dimension_19 < '16')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_19 >= '16')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Escasa o nula retroalimentación del desempeño --}}

            @if ($registro->calificaciones->c_dimension_20 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_20 <= '1' || $registro->calificaciones->c_dimension_20 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_20 <= '2' || $registro->calificaciones->c_dimension_20 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_20 <= '4' || $registro->calificaciones->c_dimension_20 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_20 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Escaso o nulo reconocimiento y compensación --}}

            @if ($registro->calificaciones->c_dimension_21 < '4')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_21 <= '4' || $registro->calificaciones->c_dimension_21 < '6')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_21 <= '6' || $registro->calificaciones->c_dimension_21 < '8')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_21 <= '8' || $registro->calificaciones->c_dimension_21 < '10')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_21 >= '10')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Limitado sentido de pertenencia --}}

            @if ($registro->calificaciones->c_dimension_22 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_22 <= '1' || $registro->calificaciones->c_dimension_22 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_22 <= '2' || $registro->calificaciones->c_dimension_22 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_22 <= '4' || $registro->calificaciones->c_dimension_22 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_22 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif



            {{-- Inestabilidad laboral --}}

            @if ($registro->calificaciones->c_dimension_23 < '1')

                <td style="color: #fff;background-color: #28a745;">Nulo o despreciable</td>

            @elseif ($registro->calificaciones->c_dimension_23 <= '1' || $registro->calificaciones->c_dimension_23 < '2')

                <td style="color: #212529;background-color: #92d050;">Bajo</td>

            @elseif ($registro->calificaciones->c_dimension_23 <= '2' || $registro->calificaciones->c_dimension_23 < '4')

                <td style="color: #212529;background-color: #ffff00;">Medio</td>

            @elseif ($registro->calificaciones->c_dimension_23 <= '4' || $registro->calificaciones->c_dimension_23 < '6')

                <td style="color: #212529;background-color: #ffc107;">Alto</td>

            @elseif ($registro->calificaciones->c_dimension_23 >= '6')

                <td style="color: #fff;background-color: #dc3545;">Muy alto</td>

            @endif

            {{-- ¿Accidente que tenga como consecuencia la muerte, la pérdida de un miembro o una lesión grave? --}}
            <td>{{ $registro->ets_1 }}</td>

            {{-- ¿Asaltos? --}}
            <td>{{ $registro->ets_2 }}</td>

            {{-- ¿Actos violentos que derivaron en lesiones graves? --}}
            <td>{{ $registro->ets_3 }}</td>

            {{-- ¿Secuestro? --}}
            <td>{{ $registro->ets_4 }}</td>

            {{-- ¿Amenazas? --}}
            <td>{{ $registro->ets_5 }}</td>

            {{-- ¿Cualquier otro que ponga en riesgo su vida o salud, y/o la de otras personas? --}}
            <td>{{ $registro->ets_6 }}</td>

            {{-- ¿Ha tenido recuerdos recurrentes sobre el acontecimiento que le provocan malestares? --}}
            <td>{{ $registro->ets_7 }}</td>

            {{-- ¿Ha tenido sueños de carácter recurrente sobre el acontecimiento, que le producen malestar? --}}
            <td>{{ $registro->ets_8 }}</td>

            {{-- ¿Se ha esforzado por evitar todo tipo de sentimientos, conversaciones o situaciones que le puedan recordar el acontecimiento? --}}
            <td>{{ $registro->ets_9 }}</td>

            {{-- ¿Se ha esforzado por evitar todo tipo de actividades, lugares o personas que motivan recuerdos del acontecimiento? --}}
            <td>{{ $registro->ets_10 }}</td>

            {{-- ¿Ha tenido dificultad para recordar alguna parte importante del evento? --}}
            <td>{{ $registro->ets_11 }}</td>

            {{-- ¿Ha disminuido su interés en sus actividades cotidianas? --}}
            <td>{{ $registro->ets_12 }}</td>

            {{-- ¿Se ha sentido usted alejado o distante de los demás? --}}
            <td>{{ $registro->ets_13 }}</td>

            {{-- ¿Ha notado que tiene dificultad para expresar sus sentimientos? --}}
            <td>{{ $registro->ets_14 }}</td>

            {{-- ¿Ha tenido la impresión de que su vida se va a acortar, que va a morir antes que otras personas o que tiene un futuro limitado? --}}
            <td>{{ $registro->ets_15 }}</td>

            {{-- ¿Ha tenido usted dificultades para dormir? --}}
            <td>{{ $registro->ets_16 }}</td>

            {{-- ¿Ha estado particularmente irritable o le han dado arranques de coraje? --}}
            <td>{{ $registro->ets_17 }}</td>

            {{-- ¿Ha tenido dificultad para concentrarse? --}}
            <td>{{ $registro->ets_18 }}</td>

            {{-- ¿Ha estado nervioso o constantemente en alerta? --}}
            <td>{{ $registro->ets_19 }}</td>

            {{-- ¿Se ha sobresaltado fácilmente por cualquier cosa? --}}
            <td>{{ $registro->ets_20 }}</td>

        </tr>

    @endforeach

    </tbody>

</table>
