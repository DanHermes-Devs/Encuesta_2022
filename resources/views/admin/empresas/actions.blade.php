{{-- Crear botones para insertar en datatables --}}
<a href="/empresa/{{ $token }}" target="_blank" title="Ver encuesta" class="btn btn-success"><i class="fas fa-eye"></i></a>

<a href="{{ route("empresas.getGraficas", $id) }}" data-toggle="tooltip" title="Ver datos generales" class="btn btn-info"><i class="fas fa-clipboard-list"></i></a>

<a href="{{ route("empresas.edit", $id) }}" data-toggle="tooltip" title="Editar empresa" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>

{{-- <a href="{{ route("empresas.getGraficas", $id) }}" data-toggle="tooltip" title="Ver graficas" class="btn btn-info"><i class="fas fa-chart-pie"></i></a> --}}

<button type="button" name="delete" data-id="{{ $id }}" title="Eliminar empresa" class="delete btn btn-danger"><i class="fas fa-trash-alt"></i></button>
