@extends('adminlte::page')

@section('title', 'Usuarios')
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
                        <li class="breadcrumb-item active"><i class="fas fa-users fa-fw mr-2"></i>Usuarios</li>
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
            <div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">

                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Lista de Usuarios</h4>

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

                        @can('crear-usuario')
                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#crear"><strong>Nuevo</strong>
                                <i class="fas fa-file"></i>
                            </button>
                            <!--Ventana Modal para crear--->
                            @include('usuarios.modal.crear')
                        @endcan

                        <hr>

                        <table id="tbuser"
                            class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                            style="width:100%">

                            <thead class="text-white" style="background-color:#6777ef">
                                <tr class="active">
                                    <th width="15px">#</th>
                                    <th>Nombre</th>
                                    <th>E-mail</th>
                                    <th>Estado</th>
                                    <th>Rol</th>
                                    <th width="15px">Acciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario->id }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            @if ($usuario->estado)
                                                <span class="badge badge-success">
                                                    <form method="post"
                                                        action="{{ url('/camestadousu/' . $usuario->id) }}">
                                                        @csrf
                                                        <button class="btn btn-sm btn-block btn-success">Activo <i
                                                                class="fas fa-check-circle"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            @else
                                                <span class="badge badge-danger">
                                                    <form method="post"
                                                        action="{{ url('/camestadousu/' . $usuario->id) }}">
                                                        @csrf
                                                        <button class="btn btn-sm btn-block btn-danger">Inactivo <i
                                                                class="fas fa-ban"></i>
                                                        </button>
                                                    </form>
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            @if (!empty($usuario->getRoleNames()))
                                                @foreach ($usuario->getRoleNames() as $rolNombre)
                                                    <h5>
                                                        <span class="badge badge-dark">{{ $rolNombre }}</span>
                                                    </h5>
                                                @endforeach
                                            @endif
                                        </td>

                                        <td>
                                            <!-- boton para editar -->
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#mostrar{{ $usuario->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <!-- boton para editar -->

                                            <!-- boton para editar -->
                                            @can('editar-usuario')
                                                <a class="btn btn-warning btn-sm"
                                                    href="{{ route('usuarios.edit', $usuario->id) }}"><i
                                                        class="fas fa-edit"></i></a>
                                            @endcan
                                            <!-- fin boton editar -->

                                            <!-- boton para eliminar -->
                                            @can('borrar-usuario')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['usuarios.destroy', $usuario->id],
                                                    'class' => 'formulario-eliminar',
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {{ Form::button('<i class="far fa-trash-alt icon-size"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) }}
                                                {!! Form::close() !!}
                                            @endcan
                                            <!-- fin boton eliminar -->
                                        </td>
                                        <!--Ventana Modal para la Alerta de Eliminar--->
                                        @include('usuarios.modal.crear')
                                        <!--Ventana Modal para la Alerta de Eliminar--->
                                        @include('usuarios.modal.mostrar')
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
