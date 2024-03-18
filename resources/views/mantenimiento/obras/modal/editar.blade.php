<!-- Ventana modal para Editar -->

<div class="modal fade" id="editar{{ $obra->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Editar Obra
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::model($obra, ['method' => 'PATCH', 'route' => ['obras.update', $obra->id]]) !!}
            @csrf
            @method('PUT')

            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Nombre de la Obra:</label>
                        {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Fecha de Inicio de la Obra:</label>
                                {!! Form::date('fecha_inicio', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="">Fecha de Fin de la Obra:</label>
                                {!! Form::date('fecha_fin', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Lugar de la Obra:</label>
                        {!! Form::text('lugar', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Cliente de la Obra:</label>
                        {!! Form::text('cliente', null, ['class' => 'form-control']) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="">Estado de la Obra:</label>
                        {{ Form::select('estado_id', $estado, $obra->estado_id, ['class' => 'form-control' . ($errors->has('estado_id') ? 'is-invalid' : ''), 'placeholder' => 'estado_id']) }}
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
