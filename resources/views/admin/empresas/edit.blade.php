@extends('admin.layouts.app')

{{-- waitme --}}

<link rel="stylesheet" href="{{ asset('css/waitMe.min.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css"/>

<style>
    .badge.badge-danger {

        cursor: pointer;

    }

    td:nth-child(7) {
        display: flex;
        justify-content: space-around;
    }

    trix-editor {

        min-height: 400px!important;

    }

    .cards{
        border: 1px solid #ccc;
        padding: 1rem!important;
    }
</style>

@section('content')
    @php
        $tipo_puestos = json_decode($empresas->tipo_puesto);
        $areas = json_decode($empresas->area);
        $tipo_contrataciones = json_decode($empresas->tipo_contratacion);
        $jornada_trabajos = json_decode($empresas->jornada_trabajo);
        $rotacion_turnos = json_decode($empresas->rotacion_turnos);
    @endphp
    <div class="content">

        <div class="container-fluid">

            <div class="card p-4">

                <div class="row justify-content-between">

                    <h2>Editar empresa: {{ $empresas->nombre }}</h2>

                </div>

                <div class="row mt-5">
                    <div class="col-12">

                        @if(session('update'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ session('update') }}</strong>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('empresas.update', $empresas->id) }}" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-12 col-md-6">
                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="nombre">Nombre <small class="text-red">(Requerido)</small></label>

                                            <input type="text" class="form-control" id="nombre" name="nombre"
                                                placeholder="Nombre" value="{{ $empresas->nombre }}">

                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="logo">Logo <small class="text-red">(Requerido)</small></label>

                                            {{-- Solo aceptar jpg y png --}}

                                            <input type="file" class="form-control" id="logo" name="logo"
                                                accept="image/png, image/jpeg">

                                            <div class="d-flex gap-1 mt-2">
                                                <small class="badge badge-warning">Tamaño máximo: 2MB</small>
    
                                                <small class="badge badge-warning">Formato: jpeg, jpg o png</small>
    
                                                <small class="badge badge-warning">Medidas: 300x300 pixeles</small>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <p>Logo actual:</p>
                                                <img src="{{ asset('storage/' . $empresas->logo) }}" alt="logo"
                                                    class="img-fluid" style="width: 100px;">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="logo">Imagen de fondo <small
                                                    class="text-red">(Requerido)</small></label>

                                            <input type="file" class="form-control" id="imagen_fondo" name="imagen_fondo"
                                                accept="image/png, image/jpeg, image/jpg">

                                            <div class="d-flex gap-1 mt-2">
                                                <small class="badge badge-warning">Tamaño máximo: 2MB</small>
    
                                                <small class="badge badge-warning">Formato: jpeg, jpg o png</small>
    
                                                <small class="badge badge-warning">Medidas: 1920x1080 pixeles</small>
                                            </div>

                                            <div class="d-flex flex-column">
                                                <p>Logo actual:</p>
                                                <img src="{{ asset('storage/' . $empresas->imagen_fondo) }}"
                                                    alt="Imagen de fondo" class="img-fluid" style="width: 100px;">
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="logo">Color principal <small
                                                    class="text-red">(Requerido)</small></label>

                                            <input type="color" class="form-control" id="colores_principales"
                                                name="colores_principales" placeholder="Color principal"
                                                value="{{ $empresas->colores_principales }}">

                                        </div>

                                    </div>

                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="logo">Descripción <small
                                                    class="text-red">(Requerido)</small></label>

                                            <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                                                {!! $empresas->descripcion !!}
                                            </textarea>

                                        </div>
                                    </div>

                                    <div class="col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="logo">Activo <small class="text-red">(Requerido)</small></label>

                                            <select class="form-control" id="activo" name="activo" value="{{ $empresas->activo }}">
                                                <option value="">-- Selecciona una opción --</option>
                                                <option value="1">Sí</option>
                                                <option value="0">No</option>
                                            </select>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-12 col-md-6">
                                    <div class="col-12 col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="my-input">Tipo de puesto</label>

                                            @foreach ($tipo_puestos as $key => $tipo_puesto)
                                                <input type="hidden" name="tipo_puesto" value="{{ $key + 1 }}">

                                                <div class="form-group__content input-group mb-3 tipo_puesto">

                                                    <div class="input-group-append">

                                                        <span class="input-group-text">

                                                            <span class="badge badge-danger" onclick="removeInput({{ $key }},'tipo_puesto')"><i class="fas fa-times"></i></span>

                                                        </span>

                                                    </div>

                                                    <input type="text" class="form-control"  name="summaryPuesto_{{ $key }}" value="{{ $tipo_puesto }}">

                                                </div>
                                            @endforeach

                                            <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                                onclick="addInput(this, 'tipo_puesto')"><i
                                                    class="fas fa-plus mr-2"></i>Añadir</button>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="my-input">Área</label>

                                            @foreach ($areas as $key => $area)
                                                <input type="hidden" name="area" value="{{ $key+1 }}">

                                                <div class="form-group__content input-group mb-3 area">

                                                    <div class="input-group-append">

                                                        <span class="input-group-text">

                                                            <span class="badge badge-danger"
                                                                onclick="removeInput({{ $key }},'area')"><i
                                                                    class="fas fa-times"></i></span>

                                                        </span>

                                                    </div>

                                                    <input type="text" class="form-control" name="summaryArea_{{ $key }}" value="{{ $area }}">

                                                </div>
                                            @endforeach

                                            <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                                onclick="addInput(this, 'area')"><i
                                                    class="fas fa-plus mr-2"></i>Añadir</button>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="my-input">Tipo de contratación</label>

                                            @foreach ($tipo_contrataciones as $key => $tipo_contratacion )
                                                <input type="hidden" name="tipo_contratacion" value="{{ $key+1 }}">

                                                <div class="form-group__content input-group mb-3 tipo_contratacion">

                                                    <div class="input-group-append">

                                                        <span class="input-group-text">

                                                            <span class="badge badge-danger"
                                                                onclick="removeInput({{ $key }},'tipo_contratacion')"><i
                                                                    class="fas fa-times"></i></span>

                                                        </span>

                                                    </div>

                                                    <input type="text" class="form-control" name="summaryContratacion_{{ $key }}" value="{{ $tipo_contratacion }}">

                                                </div>
                                            @endforeach

                                            <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                                onclick="addInput(this, 'tipo_contratacion')"><i
                                                    class="fas fa-plus mr-2"></i>Añadir</button>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="my-input">Jornada de trabajo</label>

                                            @foreach ($jornada_trabajos as $key => $jornada)
                                                <input type="hidden" name="jornada_trabajo" value="{{ $key+1 }}">

                                                <div class="form-group__content input-group mb-3 jornada_trabajo">

                                                    <div class="input-group-append">

                                                        <span class="input-group-text">

                                                            <span class="badge badge-danger"
                                                                onclick="removeInput({{ $key }},'jornada_trabajo')"><i
                                                                    class="fas fa-times"></i></span>

                                                        </span>

                                                    </div>

                                                    <input type="text" class="form-control" name="summaryJornada_{{ $key }}" value="{{ $jornada }}">
                                                </div>
                                            @endforeach


                                            <button class="btn btn-success btn-sm mb-2" type="button" id="addOption"
                                                onclick="addInput(this, 'jornada_trabajo')"><i
                                                    class="fas fa-plus mr-2"></i>Añadir</button>

                                        </div>

                                    </div>

                                    <div class="col-12 col-md-12 mb-4 cards">

                                        <div class="form-group">

                                            <label for="my-input">Rotacion de turnos</label>

                                            @foreach ($rotacion_turnos as $key => $rotacion)
                                                <input type="hidden" name="rotacion_turnos" value="{{ $key+1 }}">

                                                <div class="form-group__content input-group mb-3 rotacion_turnos">

                                                    <div class="input-group-append">

                                                        <span class="input-group-text">

                                                            <span class="badge badge-danger"
                                                                onclick="removeInput({{ $key }},'rotacion_turnos')"><i
                                                                    class="fas fa-times"></i></span>

                                                        </span>

                                                    </div>

                                                    <input type="text" class="form-control" name="summaryRotacion_{{ $key }}" value="{{ $rotacion }}">

                                                </div>
                                            @endforeach

                                            <button class="btn btn-success btn-sm mb-2" type="button" id="addOption" onclick="addInput(this, 'rotacion_turnos')"><i class="fas fa-plus mr-2"></i>Añadir</button>

                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="aviso_privacidad">Aviso de privacidad</label>
                                        <input id="aviso" type="hidden" name="aviso" value="{{ $empresas->aviso }}">
                                        <trix-editor input="aviso"></trix-editor>
                                    </div>
                                </div>


                                <input type="hidden" class="form-control" name="token" id="token" value="{{ $empresas->token }}">

                            </div>

                            <div class="col-12">
                                <div class="row justify-content-end">
                                    {{-- Enlace para ir atras --}}
                                    <a href="{{ route("empresas")}}" class="mr-4 btn btn-danger">Volver atras</a>

                                    <button type="submit" class="btn btn-success guardarEmpresa">Editar empresa</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection



@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('js/waitMe.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>

    <script>
        // Añadir campos
        function addInput(elem, type) {

            var inputs = $("." + type);

            if (inputs.length < 10) {

                if (type == "tipo_puesto") {

                    $(elem).before(`

                        <div class="form-group__content input-group mb-3 tipo_puesto">

                            <div class="input-group-append">

                                <span class="input-group-text">

                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'tipo_puesto')"><i class="fas fa-times"></i></span>

                                </span>

                            </div>

                            <input type="text" class="form-control" name="summaryPuesto_${inputs.length}">

                        </div>

                    `);

                }

                if (type == "area") {

                    $(elem).before(`

                        <div class="form-group__content input-group mb-3 area">

                            <div class="input-group-append">

                                <span class="input-group-text">

                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'area')"><i class="fas fa-times"></i></span>

                                </span>

                            </div>

                            <input type="text" class="form-control" name="summaryArea_${inputs.length}">

                        </div>

                    `);

                }

                if (type == "tipo_contratacion") {

                    $(elem).before(`

                        <div class="form-group__content input-group mb-3 tipo_contratacion">

                            <div class="input-group-append">

                                <span class="input-group-text">

                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'tipo_contratacion')"><i class="fas fa-times"></i></span>

                                </span>

                            </div>

                            <input type="text" class="form-control" name="summaryContratacion_${inputs.length}">

                        </div>

                    `);

                }

                if (type == "jornada_trabajo") {

                    $(elem).before(`

                        <div class="form-group__content input-group mb-3 jornada_trabajo">

                            <div class="input-group-append">

                                <span class="input-group-text">

                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'jornada_trabajo')"><i class="fas fa-times"></i></span>

                                </span>

                            </div>

                            <input type="text" class="form-control" name="summaryJornada_${inputs.length}">

                        </div>

                    `);

                }

                if (type == "rotacion_turnos") {

                    $(elem).before(`

                        <div class="form-group__content input-group mb-3 rotacion_turnos">

                            <div class="input-group-append">

                                <span class="input-group-text">

                                    <span class="badge badge-danger" onclick="removeInput(${inputs.length},'rotacion_turnos')"><i class="fas fa-times"></i></span>

                                </span>

                            </div>

                            <input type="text" class="form-control" name="summaryRotacion_${inputs.length}">

                        </div>

                    `);

                }

                $('[name="' + type + '"]').val(inputs.length + 1);

            } else {

                alert("Maximo 10 opciones");

                return;

            }

        }

        // Eliminar campos
        function removeInput(index, type) {

            var inputs = $("." + type);

            if (inputs.length > 1) {

                inputs.each(i => {

                    if (i == index) {

                        $(inputs[i]).remove();

                    }

                });

                $('[name="' + type + '"]').val(inputs.length - 1);

            } else {

                alert('Esta entrada no se puede eliminar');

                return;

            }

        }
    </script>
@endsection
