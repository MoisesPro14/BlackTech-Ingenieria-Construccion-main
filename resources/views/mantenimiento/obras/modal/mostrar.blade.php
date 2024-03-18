<!-- Ventana modal para mostrar -->

<div class="modal fade" id="mostrar{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Detalle de Obra
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mt-4 text-left">
                <p><strong>Nombre: </strong> {{ $obra->nombre }} </p>
                <p><strong>Fecha de Inicio: </strong>{{ $obra->fecha_inicio }}</p>
                <p><strong>Fecha de Fin: </strong> {{ $obra->fecha_fin }}</p>
                <p><strong>Lugar: </strong> {{ $obra->lugar }}</p>
                <p><strong>Cliente: </strong> {{ $obra->cliente }}</p>
                <p><strong>Estado de la Obra: </strong> {{ $obra->estado->descripcion }}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
            </div>
        </div>
    </div>
</div>
<!---fin ventana mostrar--->
