<!-- Ventana modal para Crear -->

<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #0085e0 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Alta de Producto
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::open(['route' => 'catalogos.store', 'method' => 'POST']) !!}
            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombre" class="form-control" value="{{ old('nombre') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Unidad:</label>
                        <input type="text" name="unidad" class="form-control" value="{{ old('unidad') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Tipo:</label>
                        {{ Form::select('tipo_id', $tipo, $catalogo->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id') ? 'is-invalid' : ''), 'id' => 'tipocrear', 'style' => 'width: 100%', 'placeholder' => '']) }}
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
<!---fin ventana Crear--->
