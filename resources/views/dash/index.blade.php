@extends('adminlte::page')

@section('title', 'Home')

@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i
                                    class="nav-icon fas fa-th mr-2"></i>Escritorio</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@stop

@section('content')

    <div class=" row">
        <div class="col-md-4 col-xl-6">
            <div class="card card-info">
                <div class="card-header">
                    <h4 class="card-title">Panel de Administración</h4>
                </div>
                <div class="card-body">
                    <p>Bienvenido {{ Auth::user()->name }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-4 col-xl-6">
            <div class="card card-info">
                <div class="card-header">
                    <h1 class="card-title">Buscar Reportes</h1>
                </div>
                <div class="card-body">
                    <span>Obras : <a class="btn  btn-dark ml-2" data-toggle="modal" data-target="#mostrar"><i
                                class="fas fa-chart-pie"></i> Reportes</a>
                    </span>
                </div>
                <!-- modal para mostrar lista de proyectos -->
                @include('dash.mostrar')
            </div>
        </div>
    </div>

    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">

                <div class="row">

                    <!-- tarjeta para conteo de usuarios-->
                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-gradient-info">
                            <div class="inner">
                                @php
                                    use App\Models\User;
                                    $cant_usuarios = User::count();
                                @endphp
                                <h3><span>{{ $cant_usuarios }}</span></h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-plus"></i>
                            </div>
                            <a href="/usuarios" class="small-box-footer">
                                Acceder <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- tarjeta para conteo de roles de usuarios-->
                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-gradient-success">
                            <div class="inner">
                                @php
                                    use Spatie\Permission\Models\Role;
                                    $cant_roles = Role::count();
                                @endphp
                                <h3><span>{{ $cant_roles }}</span></h3>
                                <p>Roles</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-user-lock"></i>
                            </div>
                            <a href="/roles" class="small-box-footer">
                                Acceder <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <!-- tarjeta para conteo de proyectos-->
                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-gradient-danger">
                            <div class="inner">
                                @php
                                    use App\Models\Obra;
                                    $cant_obras = Obra::count();
                                @endphp
                                <h3><span>{{ $cant_obras }}</span></h3>
                                <p>Proyectos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-regular fa-cubes"></i>
                            </div>
                            <a href="/obras" class="small-box-footer">
                                Acceder <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>

                    </div>

                    <!-- tarjeta para conteo de libretas-->
                    <div class="col-md-4 col-xl-3">
                        <div class="small-box bg-gradient-warning">
                            <div class="inner">
                                @php
                                    use App\Models\libretatiempo;
                                    $cant_libreta = libretatiempo::count();
                                @endphp
                                <h3><span>{{ $cant_libreta }}</span></h3>
                                <p>Libreta</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-solid fa-file-invoice"></i>
                            </div>
                            <a href="/libretatiempo" class="small-box-footer">
                                Acceder <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Area Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="areaChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->




        </div>
        <!-- /.col (LEFT) -->
        <div class="col-md-6">
            <!-- LINE CHART -->
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Line Chart</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas width="640" height="480" id="myChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->


            <!-- /.card -->



        </div>
        <!-- /.col (RIGHT) -->
    </div>
@stop

@section('footer')
    @include('footer')
@stop

@section('css')
    <link rel="stylesheet" ref="/css/admin_custom.css">
    <link rel="stylesheet" ref="/vendor/adminlte/dist/css/adminlte.css">
    <link rel="stylesheet" ref="vendor/chart.js/Chart.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- estilos para tablas profesionales datatable-->
    <link ref="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link rel="stylesheet" ref="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">

@stop

@section('js')

    <!-- scripts para tablas profesionales-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    $(function(){
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>});
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
        integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- ChartJS -->

    <script src="vendor/chart.js/Chart.min.js"></script>


    <!-- Alerta de bienvenida del panel de administración -->
    <script>
        Swal.fire(
            'Panel de Administración',
            'Haz Click en el boton!',
            'success'
        ) /*< />*/

        //scripts para funcionalidad de tabla profesional

        /* <
         script >*/
        $(document).ready(function() {
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
        });
        $(document).ready(function() {
            $('#tipocrear').select2({
                dropdownParent: $('#crear'),
                theme: "classic",
                placeholder: 'Selecciona un Tipo'
            })

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

    <!-- Script para la funcionalidad de reportes graficos -->
    <script>
        $(function() {
            /* ChartJS
             * -------
             * Here we will create a few charts using ChartJS
             */

            //--------------
            //- AREA CHART -
            //--------------

            // Get context with jQuery - using jQuery's .get() method.
            var areaChartCanvas = $('#areaChart').get(0).getContext('2d')

            var areaChartData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                datasets: [{
                        label: 'Digital Goods',
                        backgroundColor: 'rgba(60,141,188,0.9)',
                        borderColor: 'rgba(60,141,188,0.8)',
                        pointRadius: false,
                        pointColor: '#3b8bba',
                        pointStrokeColor: 'rgba(60,141,188,1)',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(60,141,188,1)',
                        data: [28, 48, 40, 19, 86, 27, 90]
                    },
                    {
                        label: 'Electronics',
                        backgroundColor: 'rgba(210, 214, 222, 1)',
                        borderColor: 'rgba(210, 214, 222, 1)',
                        pointRadius: false,
                        pointColor: 'rgba(210, 214, 222, 1)',
                        pointStrokeColor: '#c1c7d1',
                        pointHighlightFill: '#fff',
                        pointHighlightStroke: 'rgba(220,220,220,1)',
                        data: [65, 59, 80, 81, 56, 55, 40]
                    },
                ]
            }

            var areaChartOptions = {
                maintainAspectRatio: false,
                responsive: true,
                legend: {
                    display: false
                },
                scales: {
                    xAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }],
                    yAxes: [{
                        gridLines: {
                            display: false,
                        }
                    }]
                }
            }

            // This will get the first returned node in the jQuery collection.
            new Chart(areaChartCanvas, {
                type: 'line',
                data: areaChartData,
                options: areaChartOptions
            })

            //-------------
            //- LINE CHART -
            //--------------
            /*   var lineChartCanvas = $('#lineChart').get(0).getContext('2d')
               var lineChartOptions = $.extend(true, {}, areaChartOptions)
               var lineChartData = $.extend(true, {}, areaChartData)
               lineChartData.datasets[0].fill = false;
               lineChartData.datasets[1].fill = false;
               lineChartOptions.datasetFill = false

               var lineChart = new Chart(lineChartCanvas, {
                   type: 'line',
                   data: lineChartData,
                   options: lineChartOptions
               })*/

            //-------------
            //- DONUT CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            var donutChartCanvas = $('#myChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Chrome',
                    'IE',
                    'FireFox',
                    'Safari',
                    'Opera',
                    'Navigator',
                ],
                datasets: [{
                    data: [700, 500, 400, 600, 300, 100],
                    backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

            //-------------
            //- PIE CHART -
            //-------------
            // Get context with jQuery - using jQuery's .get() method.
            /* var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
             var pieData = donutData;
             var pieOptions = {
                 maintainAspectRatio: false,
                 responsive: true,
             }
             //Create pie or douhnut chart
             // You can switch between pie and douhnut using the method below.
             new Chart(pieChartCanvas, {
                 type: 'pie',
                 data: pieData,
                 options: pieOptions
             })*/

            //-------------
            //- BAR CHART -
            //-------------
            /*var barChartCanvas = $('#barChart').get(0).getContext('2d')
            var barChartData = $.extend(true, {}, areaChartData)
            var temp0 = areaChartData.datasets[0]
            var temp1 = areaChartData.datasets[1]
            barChartData.datasets[0] = temp1
            barChartData.datasets[1] = temp0

            var barChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                datasetFill: false
            }

            new Chart(barChartCanvas, {
                type: 'bar',
                data: barChartData,
                options: barChartOptions
            })*/

            //---------------------
            //- STACKED BAR CHART -
            //---------------------
            /*var stackedBarChartCanvas = $('#stackedBarChart').get(0).getContext('2d')
            var stackedBarChartData = $.extend(true, {}, barChartData)

            var stackedBarChartOptions = {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        stacked: true,
                    }],
                    yAxes: [{
                        stacked: true
                    }]
                }
            }

            new Chart(stackedBarChartCanvas, {
                type: 'bar',
                data: stackedBarChartData,
                options: stackedBarChartOptions
            })*/
        })
    </script>


@stop
