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



    <div id="contenedor h-screen">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <table id="example" class="display" style="width:100%">
                    <thead class="text-white" style="background-color:#6777ef">
                        <tr class="active">
                            <th>SEMANA</th>
                            <th>ACUMULADO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $dato)
                            <tr>
                                <td>{{ $dato->semana }}</td>
                                <td>{{ $dato->acumulado }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>


@stop

@section('footer')
    @include('footer')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.1.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.5.0/css/select.dataTables.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/searchpanes/2.1.0/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.min.js"></script>

    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/highcharts-3d.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>


    <script>
        $(document).ready(function() {
            // Create DataTable
            var table = $('#example').DataTable({
                dom: 'Pfrtip',
               
            });
            
            let getData = table.rows().data().toArray()
            
            let newDataConvert = [
                {
                    name: "Acumulado EPP",
                    data: getData.map((newItem, index)=> {
                        return Number(newItem[1])
                    })
                }
            ]
            
            let array = getData.map((i)=> {
                return {
                    name: i[0] ,
                    data: getData.map((newItem, index)=> {
                        return Number(newItem[1])
                    })
                }
            })

            var container = $('<div />').insertBefore(table.table().container()).addClass("vh-900");
            
            var chart = Highcharts.chart(container[0], {
                chart: {
                    type: 'line',
                },
                title: {
                    text: 'TOTAL EPP ACUMULADO',
                },
                xAxis: {
                    categories: getData.map((i, idx)=> {
                            return  i[0]
                    }),
                    title: {
                        text: 'SEMANAS'
                    }
                },
                yAxis: {
                        min: 0,
                        title: {
                            text: 'TOTAL EPP',
                        },
                        labels: {
                            overflow: 'justify'
                        }
                    },
                    plotOptions: {
                        bar: {
                            dataLabels: {
                                enabled: true
                            }
                        }
                    },
                    legend: {
                        layout: 'vertical',
                        align: 'right',
                        verticalAlign: 'top',
                        x: -40,
                        y: 80,
                        floating: true,
                        borderWidth: 1,
                        backgroundColor:
                            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
                        shadow: true
                    },
                    credits: {
                        enabled: false
                    },
                series: newDataConvert,
            });
        });
    </script>

@stop
