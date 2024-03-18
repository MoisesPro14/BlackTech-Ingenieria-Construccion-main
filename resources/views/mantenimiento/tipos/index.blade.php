@extends('adminlte::page')

@section('title', 'Tipo de Productos')
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
                        <li class="breadcrumb-item active"><i class="fas fa-fw fa-share mr-2"></i>Tipos</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    @include('mensaje.confirmación')

    <div class="section-body">
        <div class="row justify-content-center">

            <!-- crud para modulo de estados de obras -->
            <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Listado de Tipo de Productos</h4>

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
                        @can('crear-tipo')
                            <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#crear"><strong>Nuevo</strong>
                                <i class="fas fa-file"></i>
                            </button>

                            <!--Ventana Modal para Crear--->
                            @include('mantenimiento.tipos.modal.crear')
                        @endcan

                        <hr>

                        <table id="tbmantenimiento"
                            class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                            style="width:100%">
                            <thead class="text-white" style="background-color:#6777ef">
                                <tr class="active">
                                    <th width="15px">#</th>
                                    <th>Descripción</th>
                                    <th>Estado</th>
                                    <th>Categoría</th>
                                    <th width="15px">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tipos as $tipo)
                                    <tr>
                                        <td>{{ $tipo->id }}</td>
                                        <td>{{ $tipo->descripcion }}</td>
                                        <td>
                                            @if ($tipo->estado)
                                                <span type="button" class="btn btn-block btn-success btn-sm">Activo</span>
                                            @else
                                                <span type="button" class="btn btn-block btn-danger btn-sm">Inactivo</span>
                                            @endif
                                        </td>
                                        <td>{{ $tipo->categoria->descripcion }}</td>
                                        <td>
                                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#mostrar{{ $tipo->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            @can('editar-tipo')
                                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                    data-target="#editar{{ $tipo->id }}">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                            @endcan
                                            @can('borrar-tipo')
                                                {!! Form::open([
                                                    'method' => 'DELETE',
                                                    'route' => ['tipos.destroy', $tipo->id],
                                                    'class' => 'formulario-eliminar',
                                                    'style' => 'display:inline',
                                                ]) !!}
                                                {{ Form::button('<i class="far fa-trash-alt icon-size"></i>', ['type' => 'submit', 'class' => 'btn btn-sm btn-danger']) }}
                                                {!! Form::close() !!}
                                            @endcan
                                        </td>

                                        <!--Ventana Modal para la Alerta de mostrar--->
                                        @include('mantenimiento.tipos.modal.mostrar')
                                        <!--Ventana Modal para Editar--->
                                        @include('mantenimiento.tipos.modal.editar')
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

@section('css')
    <!-- estilos para tablas profesionales datatable-->
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">

    <!-- estilos para botones de exportación-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
@stop

@section('js')
    <!-- scripts para tablas profesionales-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <!-- scripts para exportación de archivos-->
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>

    <!-- scripts para funcionalidad de tabla profesional-->
    <script>
        $(document).ready(function() {
            $('#tbmantenimiento').DataTable({

                //traduccion datatable

                "language": {
                    "lengthMenu": "Mostrar " +
                        '<select class="custom-select custom-select-sm form-control form-control-sm"> <option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="-1">All</option></select>' +
                        " registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "Mostrando la página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros totales)",
                    "search": "Buscar :",
                    "paginate": {
                        "next": "siguiente",
                        "previous": "Anterior"
                    }
                },

                //paginacion
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ]
            });

        });
        //funcion para la alerta de eliminar
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "Estas a punto de eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        })
    </script>

    <!--Condicionales para las alertas , con las variables del (with) de los controladores-->

    @if (session('delete') == 'Registro eliminado correctamente')
        <script>
            Swal.fire(
                'Eliminado!',
                'Se eliminó correctamente.',
                'error'
            )
        </script>
    @endif
    @if (session('create') == 'Registro agregado correctamente')
        <script>
            Swal.fire(
                'Registrado!',
                'Se Registró correctamente.',
                'success'
            )
        </script>
    @endif
    @if (session('update') == 'Registro actualizado correctamente')
        <script>
            Swal.fire(
                'Actualizado!',
                'Se Actualizó correctamente.',
                'success'
            )
        </script>
    @endif
@stop
