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
                        <li class="breadcrumb-item active"><i class="fas fa-file mr-2"></i>Altas de Roles</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <!-- incluir mensajes de acciones -->
    @include('mensaje.confirmación')

    <div class="section-body">
        <div class="row justify-content-center">
            <div class="col-sm-10">
                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Alta de Roles</h4>
                    </div>

                    <div class="card-body">

                        {!! Form::open(['route' => 'roles.store', 'method' => 'POST']) !!}

                        <!-- formulario--->
                        @include('roles.partials.form')

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
