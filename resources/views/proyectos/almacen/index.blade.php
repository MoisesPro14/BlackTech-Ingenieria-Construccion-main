@extends('adminlte::page')

@section('title', 'Almacen')
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
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Listado de Almacen</h4>

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
                        @can('crear-almacen')
                            <a href="{{ route('almacen.create') }}" type="button" class="btn btn-primary mb-1"><i
                                    class="fas fa-file mr-2"></i>Nuevo</a>
                        @endcan

                        <hr>

                        <div>
                            <table id="tbmantenimiento"
                                class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                                style="width:100%">
                                <thead class="text-white" style="background-color:#6777ef">
                                    <tr class="active">
                                        <th>N°</th>
                                        <th>Guía</th>
                                        <th>Fecha</th>
                                        <th>Proyecto</th>
                                        <th>Producto</th>
                                        <th>Categoria</th>
                                        <th>Tipo</th>
                                        <th>Marcas</th>
                                        <th>Precio</th>
                                        <th>Cantidad</th>
                                        <th>Asignado por:</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal para mostrar el usuario que realizó el registro-->
        @include('proyectos.almacen.eliminar')
    </div>
@stop

@section('footer')
    @include('footer')
@stop

@section('css')
    <!-- estilos para tablas profesionales datatable-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">

    <!-- estilos para botones de exportación-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
@stop

@section('js')

    <!-- scripts para tablas profesionales-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <!-- scripts para exportación de archivos-->
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>


    <!-- scripts para funcionalidad de tabla profesional-->

    <script>
        $('#tbmantenimiento').DataTable({

            dom: 'Bfrtip',

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

            // traer datos del servidor con ajax
            processing: true,
            serverSide: true,
            "ajax": "{{ route('almacen.index') }}",

            "columns": [{
                    data: 'semana'
                },
                {
                    data: 'numero_guia'
                },
                {
                    data: 'fecha'
                },
                {
                    data: 'obra'
                },
                {
                    data: 'catalogo'
                },
                {
                    data: 'categoria'
                },
                {
                    data: 'marca'
                },
                {
                    data: 'tipo'
                },
                {
                    data: 'precio'
                },
                {
                    data: 'cantidad'
                },
                {
                    data: 'user'
                },
                {
                    data: 'btn'
                },


            ],
            /*
                        "columnDefs": [{
                            "targets": 10,
                            "sortable": false,
                            "render": function(data, type, row, meta) {
                                return "<center>" +
                                    "<button type='button' class='btn btn-warning btn-sm'>" +
                                    "<i class='fas fa-pencil-alt'></i>" +
                                    "</button>"
                                "<center>";

                            }


                        }]
            */
            // estilo para botones de exportacion
            buttons: [{
                    "extend": "excelHtml5",
                    "text": "<i class='fas fa-file-excel'></i> Excel",
                    "titleAttr": "Exportar a Excel",
                    "className": "btn btn-success"
                },
                {
                    "extend": "pdfHtml5",
                    "text": "<i class='fas fa-file-pdf'></i> PDF",
                    "titleAttr": "Exportar a PDF",
                    "className": "btn btn-danger"
                },
                {
                    "extend": "csvHtml5",
                    "text": "<i class='fas fa-file-pdf'></i> CSV",
                    "titleAttr": "Exportar a CSV",
                    "className": "btn btn-info"
                },
                {
                    "extend": "print",
                    "text": "<i class='fas fa-print'></i> Imprimir",
                    "titleAttr": "Imprimir",
                    "className": "btn btn-warning"
                }

            ]
        });
    </script>

@stop
