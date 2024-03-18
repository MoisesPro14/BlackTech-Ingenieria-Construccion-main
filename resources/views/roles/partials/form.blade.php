<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="">Nombre del Rol:</label>
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <h3>Lista de permisos :</h3>
        <hr>
        <br />
        @foreach ($permission as $value)
            <label>{{ Form::checkbox('permission[]', $value->id, false, ['class' => 'name']) }}
                {{ $value->name }}</label>

            <br />
        @endforeach
    </div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a type="button" class="btn btn-secondary" href="{{ route('roles.index') }}"> Cancelar</a>
</div>
