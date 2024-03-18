@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i
                                    class="nav-icon fas fa-th mr-2"></i>Escritorio</a></li>
                        <li class="breadcrumb-item active"><i class="nav-icon fa fa-table mr-2"></i>Mantenimiento</li>
                        <li class="breadcrumb-item active"><i class="fas fa-user-lock mr-2"></i>Roles</li>
                        <li class="breadcrumb-item active"><i class="fas fa-edit mr-2"></i>Actualizar Rol</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <!-- incluir mensajes de acciones -->
    @include('mensaje.confirmación')

    <section class="section">
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card card-info">


                        <div class="card-header">
                            <h4 class="card-title">Actualización de Roles</h4>
                        </div>

                        <div class="card-body">

                            {!! Form::model($role, ['method' => 'PATCH', 'route' => ['roles.update', $role->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del Rol:</label>
                                        {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="">Permisos para este Rol:</label>
                                        <br />
                                        @foreach ($permission as $value)
                                            <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, ['class' => 'name']) }}
                                                {{ $value->name }}</label>
                                            <br />
                                        @endforeach
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a type="button" class="btn btn-secondary ml-2" href="{{ route('roles.index') }}">
                                    Cancelar</a>

                            </div>
                            {!! Form::close() !!}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('footer')
    @include('footer')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        console.log('Hi!');
    </script>
@stop
