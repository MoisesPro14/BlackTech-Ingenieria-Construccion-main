@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dash') }}"><i
                                    class="nav-icon fas fa-th mr-2"></i>Escritorio</a></li>
                        <li class="breadcrumb-item active"><i class="fas fa-chart-line mr-2"></i>Reportes</li>
                        <li class="breadcrumb-item active">
                            <h2 class="badge badge-dark">{{ $obra->nombre }}</h2>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@stop

@section('content')

    <div class="section-body">

        <div class="row">

            <!-- se requiere pasar rutas por cada grafico en los card filtrando el id seleccionado de la obra -->

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card card-dark">

                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-solid fa-signal"></i> Gestión de Proyectos</h4>

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

                        <!-- Small Box (Stat card) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h4>Report 1</h4>

                                        <p>EPP/TRABAJADOR</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="inicio/epptrabajador" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h4>Report 2</h4>

                                        <p>HORAS/SEMANA</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="inicio/horassemana" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h4>Report 3</h4>

                                        <p>ACUMULADO HORAS</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="inicio/acumuladohoras"  class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h4>Report 4</h4>

                                        <p>EPP/SEMANA</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="inicio/eppsemana" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->


                        <!-- Small Box (Stat card) -->
                        <div class="row">
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-dark">
                                    <div class="inner">
                                        <h4>Report 5</h4>

                                        <p>ACUMULADO/EPP</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="inicio/acumuladoepp" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h4>Report 6</h4>

                                        <p>EPC/SEMANA</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="inicio/epcsemana" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-light">
                                    <div class="inner">
                                        <h4>Report 7</h4>

                                        <p>ACUMULADO/EPC</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="inicio/acumuladoepc" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        <h4>Report 8</h4>

                                        <p>s/Hh</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->


                        <!-- Small Box (Stat card) -->
                        <div class="row">
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-success">
                                    <div class="inner">
                                        <h4>Report 9</h4>

                                        <p>S/Hh SEMANAL</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-warning">
                                    <div class="inner">
                                        <h4>Report 10</h4>

                                        <p>S/Hh ACUMULADO</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                        <!-- /.row -->

                    </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-dark">

                    <div class="card-header">
                        <h4 class="card-title"><i class="fas fa-chart-pie"></i> Gestion de Logistica</h4>

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

                        <!-- Small Box (Stat card) -->
                        <div class="row">
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-danger">
                                    <div class="inner">
                                        <h4>Report 11</h4>

                                        <p>COSTO EPP/Hh</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-chart-pie"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                            <div class="col-lg-3 col-6">
                                <!-- small card -->
                                <div class="small-box bg-primary">
                                    <div class="inner">
                                        <h4>Report 12</h4>

                                        <p>TOTAL MARCA EPP</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-solid fa-signal"></i>
                                    </div>
                                    <a href="#" class="small-box-footer">
                                        Ingresar <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- ./col -->
                        </div>
                        <!-- /.row -->

                    </div>
                </div>
            </div>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="js/chartjs_mas_datalabels.min.js"></script>
    <script src="js/FileSaver.min.js"></script>

@stop
