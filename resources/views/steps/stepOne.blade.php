<style>
    #stepsBar {
        display: none!important;
    }
</style>
<div class="titulo text-center">
    <div class="row">
        <div class="col-12 col-md-6 mx-auto">
            <img src="https://logodownload.org/wp-content/uploads/2020/01/grupo-bimbo-logo.png" class="img-fluid w-25" alt="Logo de la empresa">
            <h2 class="mt-4">¡Bienvenido!</h2>
            <div class="form-group">
                <label for="email_registro">Para comenzar, ingresa tu correo electrónico</label>
                <input type="email" class="form-control" name="email_registro" id="email_registro" placeholder="Correo electrónico">
                <small>Una vez que ingreses tu correo electrónico, se habilitará el botón para comenzar la encuesta</small>
                <div class="d-flex justify-content-center">
                    <button type="button" class="btn_siguiente" id="comenzarEncuesta" style="display: none;" onclick="cambiarSeccion('step_Two', 'stepTwo')">Comenzar encuesta</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $("#email_registro").keyup(function(){
        var email = $("#email_registro").val();
        if(email.includes(".com") && email.includes("@")){
            $("#comenzarEncuesta").show();
        }else{
            $("#comenzarEncuesta").hide();
        }
	});
</script>