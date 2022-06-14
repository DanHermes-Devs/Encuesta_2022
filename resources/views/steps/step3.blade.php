<div class="form-group">
    <label>Tipo de contratación</label>
    <select class="form-control" id="tipo_contratacion" name="tipo_contratacion">
        <option value="x">--Elige una opción--</option>
        @foreach ($tipo_contratacion as $contratos)
            <option value="{{ $contratos }}">{{ $contratos }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Jornada de trabajo</label>
    <select class="form-control" id="jornada_trabajo" name="jornada_trabajo">
        <option value="x">--Elige una opción--</option>
        @foreach ($jornada_trabajo as $jornada)
            <option value="{{ $jornada }}">{{ $jornada }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Rotación de turnos</label>
    <select class="form-control" id="rotacion_turnos" name="rotacion_turnos">
        <option value="x">--Elige una opción--</option>
        @foreach ($rotacion_turnos as $rotacion)
            <option value="{{ $rotacion }}">{{ $rotacion }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label>Experiencia Laboral</label>
    <select class="form-control" id="experiencia_laboral" name="experiencia_laboral">
        <option value="x">--Elige una opción--</option>
        <option value="Menos de 1 año">Menos de 1 año</option>
        <option value="1 - 5 años">1 - 5 años</option>
        <option value="6 - 10 años">6 - 10 años</option>
        <option value="11 - 15 años">11 - 15 años</option>
        <option value="16 - 20 años">16 - 20 años</option>
        <option value="21 - 25 años">21 - 25 años</option>
        <option value="Más de 25 años">Más de 25 años</option>
    </select>
</div>

<div class="d-flex justify-content-between">
    <button type="button" class="btn_atras" onclick="cambiarSeccion('step_2', 'step2')">Atras</button>
    <button type="button" class="btn_siguiente" onclick="cambiarSeccion('step_4', 'step4')">Siguiente</button>
</div>