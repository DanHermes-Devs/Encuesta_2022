<div class="form-group">

    <label>Estudios</label>

    <select class="form-control" id="estudios" name="estudios">

        <option value="">--Elige una opción--</option>

        <option value="Primaria">Primaria</option>

        <option value="Secundaria">Secundaria</option>

        <option value="Preparatoria">Preparatoria</option>

        <option value="Tec. Superior">Tec. Superior</option>

        <option value="Licenciatura">Licenciatura</option>

        <option value="Maestría">Maestría</option>

        <option value="Doctorado">Doctorado</option>

    </select>

</div>



<div class="form-group">

    <label>Tipo de puesto</label>

    <select class="form-control" id="tipo_puesto" name="tipo_puesto">

        <option value="">--Elige una opción--</option>

        @foreach ($tipo_puesto as $puesto)

            <option value="{{ $puesto }}">{{ $puesto }}</option>

        @endforeach

    </select>

</div>



<div class="form-group">

    <label>Área</label>

    <select class="form-control" id="area" name="area">

        <option value="">--Elige una opción--</option>

        @foreach ($area as $a)

            <option value="{{ $a }}">{{ $a }}</option>

        @endforeach

    </select>

</div>



<div class="d-flex justify-content-between">

    <button type="button" class="btn_atras" onclick="cambiarSeccion('step_1', 'step1')">Atrás</button>

    <button type="button" class="btn_siguiente" onclick="cambiarSeccion('step_3', 'step3')">Siguiente</button>

</div>