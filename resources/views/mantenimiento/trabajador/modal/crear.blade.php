<!-- Ventana modal para Crear -->

<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header" style="background-color: #0085e0 !important;">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Crear Trabajador
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::open(['route' => 'trabajador.store', 'method' => 'POST']) !!}

            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Nombre:</label>
                        <input type="text" name="nombres" class="form-control" value="{{ old('nombres') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="titulo">Apellidos:</label>
                        <input type="text" name="apellidos" class="form-control" value="{{ old('apellidos') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="titulo">DNI:</label>
                        <input type="text" name="documento" class="form-control" value="{{ old('documento') }}">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Categoria de Trabajador:</label>
                        {{ Form::select('categoria_id', $categoriatrabajadore, $trabajador->categoria_id, ['class' => 'form-control' . ($errors->has('categoria_id') ? 'is-invalid' : ''), 'id' => 'trabajadorcrear', 'style' => 'width: 100%', 'placeholder' => 'Elegir Categoria de Trabajador']) }}
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
