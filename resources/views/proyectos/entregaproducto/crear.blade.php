@extends('adminlte::page')

@section('title', 'Entrega de Producto')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i
                                    class="nav-icon fas fa-th mr-2"></i>Escritorio</a></li>
                        <li class="breadcrumb-item active"><i class="nav-icon fa fa-table mr-2"></i>Mantenimiento</li>
                        <li class="breadcrumb-item active"><i class="fas fa-toolbox mr-2"></i>Almacén</li>
                        <li class="breadcrumb-item active"><i class="	fas fa-dolly-flatbed mr-2"></i>Registros</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')


@stop

@section('footer')
    @include('footer')
@stop

@section('css')

@stop

@section('js')



@stop
