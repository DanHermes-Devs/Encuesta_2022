{{-- Crear botones para insertar en datatables --}}
<a href="{{ route("empresas.edit", $id) }}" data-toggle="tooltip" title="Botón de acción para editar" class="btn btn-warning"><i class="fa fa-pencil-alt"></i></a>

<button type="button" name="delete" data-id="{{ $id }}" title="Eliminar empresa" class="delete btn btn-danger"><i class="fas fa-trash-alt"></i></button>

<a href="/empresa/{{ $token }}" target="_blank" title="Ver encuesta" class="btn btn-success"><i class="fas fa-eye"></i></a>