<style>

    #stepsBar {

        display: none!important;

    }

</style>

<div class="titulo text-center">

    <div class="row">

        <div class="col-12 col-md-8 mx-auto">

            <div>

                <img src="{{Request::root()}}/storage/{{$empresa->logo}}" class="img-fluid w-50" alt="Logo de la empresa">

                <h2 class="mt-4">Empresa: {{$empresa->nombre}}</h2>

                <p>{!! $configuraciones->mensaje_bienvenida !!}</p>

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
        var emailval  = $("#email").val();
        var mailvalid = validateEmail(emailval);

        if ( mailvalid == false)
        {
            $("#respuesta2").html("<div class='errormsg'>El correo no es válido</div>");  
            $("#email").addClass("errorinput");
            $("#comenzarEncuesta").hide();
        }else{

            $("#comenzarEncuesta").show();
        }


	});

    function validateEmail(email) {
        var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return reg.test(email);
    }

</script>