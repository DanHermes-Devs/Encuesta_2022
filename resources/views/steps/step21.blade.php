<div class="alert alert-warning text-left">

    <p class="m-0 text-left"><b>4.- Afectación (durante el último mes):</b></p>

</div>

<div class="item_1_1 mb-4">

    <label for="tituloa-item__1"><b>1.- ¿Ha tenido usted dificultades para dormir?</b></label>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_16" id="ets_31" value="Sí">

        <label class="form-check-label" for="ets_31">

            Sí

        </label>

    </div>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_16" id="ets_32" value="No">

        <label class="form-check-label" for="ets_32">

            No

        </label>

    </div>

</div>



<div class="item_1_2 mb-4">

    <label for="tituloa-item__1"><b>2.- ¿Ha estado particularmente irritable o le han dado arranques de
            coraje?</b></label>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_17" id="ets_33" value="Sí">

        <label class="form-check-label" for="ets_33">

            Sí

        </label>

    </div>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_17" id="ets_34" value="No">

        <label class="form-check-label" for="ets_34">

            No

        </label>

    </div>

</div>



<div class="item_1_2 mb-4">

    <label for="tituloa-item__1"><b>3.- ¿Ha tenido dificultad para concentrarse?</b></label>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_18" id="ets_35" value="Sí">

        <label class="form-check-label" for="ets_35">

            Sí

        </label>

    </div>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_18" id="ets_36" value="No">

        <label class="form-check-label" for="ets_36">

            No

        </label>

    </div>

</div>



<div class="item_1_2 mb-4">

    <label for="tituloa-item__1"><b>4.- ¿Ha estado nervioso o constantemente en alerta?</b></label>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_19" id="ets_37" value="Sí">

        <label class="form-check-label" for="ets_37">

            Sí

        </label>

    </div>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_19" id="ets_38" value="No">

        <label class="form-check-label" for="ets_38">

            No

        </label>

    </div>

</div>



<div class="item_1_2 mb-4">

    <label for="tituloa-item__1"><b>5.- ¿Se ha sobresaltado fácilmente por cualquier cosa?</b></label>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_20" id="ets_39" value="Sí">

        <label class="form-check-label" for="ets_39">

            Sí

        </label>

    </div>

    <div class="form-check">

        <input class="form-check-input" type="radio" name="ets_20" id="ets_40" value="No">

        <label class="form-check-label" for="ets_40">

            No

        </label>

    </div>

</div>



<div class="item_1_2 mb-4">

    <div class="form-check">

        <input class="form-check-input" type="checkbox" name="sinName" id="aviso_privacidad" value="No">

        <label class="form-check-label" for="aviso_privacidad">

            Tus datos están protegidos. He leído y acepto <a data-toggle="collapse" href="#avisoPrivacidad"
                role="button" aria-expanded="false" aria-controls="avisoPrivacidad">Aviso de privacidad</a>

        </label>

    </div>

</div>



<div class="collapse" id="avisoPrivacidad">

    <div class="card card-body">

        @if ($aviso)
            {!! $aviso->aviso !!}
        @else
            <p>No hay aviso de privacidad</p>
        @endif

    </div>

</div>



<div class="d-flex justify-content-between">

    <button type="button" class="btn_atras" onclick="cambiarSeccion('step_20', 'step20')">Atrás</button>

    <button type="submit" class="btn_siguiente btn_finalizar">Finalizar encuesta</button>

</div>
