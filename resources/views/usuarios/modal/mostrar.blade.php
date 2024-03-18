<!-- Ventana modal para mostrar -->

<div class="modal fade" id="mostrar{{ $usuario->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info">

                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Detalle de Usuario
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mt-4 text-left">
                <p><strong>Nombres: </strong> {{ $usuario->name }} </p>
                <p><strong>Email: </strong> {{ $usuario->email }}</p>
                <p><strong>Estado: </strong>
                    @if ($usuario->estado)
                        <h5>
                            <span class="badge badge-success">Activo</span>
                        </h5>
                    @else
                        <h5>
                            <span class="badge badge-danger">Inactivo</span>
                        </h5>
                    @endif
                </p>
                <p><strong>Rol: </strong>
                    @if (!empty($usuario->getRoleNames()))
                        @foreach ($usuario->getRoleNames() as $rolNombre)
                            <h5>
                                <span class="badge badge-danger">{{ $rolNombre }}</span>
                            </h5>
                        @endforeach
                    @endif
                </p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
            </div>


        </div>
    </div>
</div>
<!---fin ventana mostrar--->
