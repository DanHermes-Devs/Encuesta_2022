<style>
    #stepsBar {
        display: none!important;
    }
</style>
<div class="titulo text-center">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <div>
                <img src="{{Request::root()}}/storage/{{$empresa->logo}}" class="img-fluid w-50" alt="Logo de la empresa">
                <h2 class="mt-4">¡Bienvenido a {{$empresa->nombre}}!</h2>
                <p>A continuación encontraras una serie de reactivos en la que no existen respuestas buenas ni malas, solo son respuestas que hacen alusión a la experiencia que tienes dentro de trabajo, recuerda contestar lo primero que se te venga a la mente,  considerando las condiciones ambientales de su centro de trabajo.</p>
            </div>
            <div class="form-group mt-3 alert alert-info text-left">
                <small class="mb-5">Para poder contestar los cuestionarios será importante agregues tu correo institucional. Recuerda que los datos obtenidos en los cuestionarios son confidenciales.</small>
                <input type="email" class="form-control mt-3" name="email" id="email" placeholder="Correo electrónico">
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn_siguiente" id="comenzarEncuesta" style="display: none;" onclick="cambiarSeccion('step_Two', 'stepTwo')">Comenzar encuesta</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#email").keyup(function(){
        var email = $("#email").val();
        if(email.includes(".com") && email.includes("@")){
            $("#comenzarEncuesta").show();
        }else{
            $("#comenzarEncuesta").hide();
        }
	});
</script>