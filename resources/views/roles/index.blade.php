@extends('adminlte::page')

@section('title', 'Roles')
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
                        <li class="breadcrumb-item active"><i class="fas fa-user-lock mr-2"></i>Roles</li>
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

            <!-- crud para modulo de estados de obras -->
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">

                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Roles de Usuario</h4>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <!-- This will cause the card to be removed when clicked -->
                        </div>
                        <!-- /.card-tools -->

                    </div>

                    <div class="card-body">

                        @can('crear-rol')
                            <a class="btn btn-primary mb-1" href="{{ route('roles.create') }}"><i class="fas fa-file"></i>
                                Nuevo</a>
                        @endcan

                        <hr>

                        <table id="tbuser"
                            class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                            style="width:100%">
                            <thead class="text-white" style="background-color:#6777ef">
                                <tr class="active">
                                    <th width="15px">#</th>
                                    <th>Rol</th>
                                    <th width="30px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @can('editar-rol')
                                                <a class="btn btn-warning btn-sm" href="{{ route('roles.edit', $role->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan

                                            @can('borrar-rol')
                                                <!-- boton para eliminar -->
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['roles.destroy', $role->id],
                                                    'class' => 'formulario-eliminar',
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {{ Form::button('<i class="far fa-trash-alt icon-size"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) }}
                                                {!! Form::close() !!}
                                                <!-- fin boton eliminar -->
                                            @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('footer')
    @include('footer')
@stop

<!-- links para estilos css -->
@section('css')
    @include('roles.partials.css')
@stop

<!-- links de scripts -->
@section('js')
    @include('roles.partials.scripts')
@stop
