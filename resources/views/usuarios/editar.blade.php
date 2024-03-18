@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <div class="content-header row">
        <div class="content-header-left col-md-12 col-12 mb-1">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i
                                    class="fas fa-fw fa-home mr-2"></i>Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('usuarios.index') }}"><i
                                    class="fas fa-users fa-fw mr-2"></i>Usuarios</a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-edit mr-2"></i>Actualización de Usuarios</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

    <!-- incluir mensajes de acciones -->
    @include('mensaje.confirmación')

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Actualización de Usuario</h4>
                    </div>

                    <div class="card-body">

                        {!! Form::model($user, ['method' => 'PATCH', 'route' => ['usuarios.update', $user->id]]) !!}
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="name">Nombre</label>
                                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="">Roles</label>
                                    {!! Form::select('roles[]', $roles, $userRole, ['class' => 'form-control']) !!}
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <a class="btn btn-secondary m-2" href="{{ route('usuarios.index') }}">Cancelar</a>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    </div>
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
