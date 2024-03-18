<!-- Ventana modal para Editar -->

<div class="modal fade" id="editar{{ $catalogo->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Editar Producto
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::model($catalogo, ['method' => 'PATCH', 'route' => ['catalogos.update', $catalogo->id]]) !!}
            @csrf
            @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $catalogo->nombre }}">
                    </div>
                    <div class="form-group">
                        <label for="">Unidad:</label>
                        <input type="text" name="unidad" class="form-control" value="{{ $catalogo->unidad }}">
                    </div>
                    <div class="form-group">
                        <label for="">Tipo:</label>
                        {{ Form::select('tipo_id', $tipo, $catalogo->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? 'is-invalid' : ''), 'id' => 'edittipo', 'style' => 'width: 100%', 'placeholder' => '']) }}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<!---fin ventana Editar--->
