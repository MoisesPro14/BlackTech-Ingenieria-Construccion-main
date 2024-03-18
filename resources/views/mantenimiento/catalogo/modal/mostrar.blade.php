<!-- Ventana modal para mostrar -->

<div class="modal fade" id="mostrar{{ $catalogo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header bg-info">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Detalle de Producto
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mt-4 text-left">
                <p><strong>Nombres: </strong> {{ $catalogo->nombre }} </p>
                <p><strong>Tipo: </strong> {{ $catalogo->tipo->descripcion }}</p>
                <p><strong>Categoría: </strong> {{ $catalogo->tipo->categoria->descripcion }}</p>
                <p><strong>Unidad: </strong>{{ $catalogo->unidad }}</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!---fin ventana mostrar--->
