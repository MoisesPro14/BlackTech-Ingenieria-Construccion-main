<!-- Ventana modal para Editar -->

<div class="modal fade" id="editar{{ $marca->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h5 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Editar Marca de Producto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>




            {!! Form::model($marca, ['method' => 'PATCH', 'route' => ['marcas.update', $marca->id]]) !!}
            @csrf
            @method('PUT')
            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="titulo">Descripción de Marca:</label>
                        <input type="text" name="descripcion" class="form-control" value="{{ $marca->descripcion }}">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
    </div>
</div>
</div>
<!---fin ventana Editar--->
