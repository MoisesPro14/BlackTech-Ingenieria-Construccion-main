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
                        <li class="breadcrumb-item active"><i class="	fas fa-dolly-flatbed mr-2"></i>Registros</li>
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
                        <h4 class="card-title">Nuevo Ingreso :</h4>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                        </div>
                        <!-- /.card-tools -->

                    </div>

                    <!-- formulario para ingresar productos en almacen -->
                    {!! Form::open(['route' => 'almacen.create', 'method' => 'POST']) !!}
                    {{ Form::token() }}

                    <div class="card-body">

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="obra_id">Proyecto :</label>
                                    <select name="obra_id" id="obra_id" class="form-control">
                                        @foreach ($obras as $obra)
                                            <option value="{{ $obra->id }}">{{ $obra->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="semana">Semana :</label>
                                    <input type="number" name="semana" id="semana" value="{{ old('semana') }}"
                                        class="form-control" placeholder="Número de semana">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                <div class="form-group">
                                    <label for="numero_guia">N° Guía :</label>
                                    <input type="text" name="numero_guia" id="numero_guia" required
                                        value="{{ old('semana') }}" class="form-control" placeholder="Serie de Guía">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="card card-info card-outline">

                                    <div class="card-header">
                                        <h4 class="card-title">Detalle de Ingreso :</h4>
                                    </div>

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                                <label for="pcatalogo">Catalogo :</label>
                                                <select name="pcatalogo" id="pcatalogo" class="form-control">
                                                    @foreach ($catalagos as $catalago)
                                                        <option value="{{ $catalago->id }}">{{ $catalago->catalogo }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <label for="pmarca">Marca :</label>
                                                <select name="pmarca" id="pmarca" class="form-control">
                                                    @foreach ($marcas as $marca)
                                                        <option value="{{ $marca->id }}">{{ $marca->marca }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <label for="pprecio">Precio :
                                                </label>
                                                <input type="number" name="pprecio" id="pprecio" class="form-control"
                                                    placeholder="Precio del Producto">

                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <label for="pcantidad">Cantidad :</label>
                                                <input type="number" name="pcantidad" id="pcantidad" class="form-control"
                                                    placeholder="Cantidad de Unidades">
                                            </div>

                                            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
                                                <label for="">Accion :</label>
                                                <button type="button" id="bt_add"
                                                    class="btn btn-primary form-control"><i class="fas fa-cart-plus"></i>
                                                    Agregar</button>
                                            </div>

                                        </div>

                                        <div class="row mt-4">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <table id="detalles"
                                                    class="table table-sm table-striped table-bordered table-condensed table-hover ">
                                                    <thead class="text-white" style="background-color:#6777ef">
                                                        <th>Opciones</th>
                                                        <th>Producto</th>
                                                        <th>Marca</th>
                                                        <th>Precio</th>
                                                        <th>Cantidad</th>
                                                        <th>Subtotal</th>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                    <tfoot>
                                                        <th>TOTAL</th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th></th>
                                                        <th>
                                                            <h6 id="total">s/. 0.00</h6>
                                                        </th>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                            <div class="form-group">
                                <!-- token para trabajar con transacciones-->
                                <input name="_token" value="{{ csrf_token() }}" type="hidden">
                                <button type="submit" class="btn btn-primary">Guardar</button>
                                <button type="reset" class="btn btn-danger">Cancelar</button>
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}
                    <!-- fin de formulario -->
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
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <!-- Estilos para Select2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@section('js')
    <!-- scripts para tablas profesionales-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <!-- scripts para Select2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
        integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        // funcionalidad de select avanzado
        $(document).ready(function() {
            $('#pcatalogo').select2({
                theme: "classic",
            })

            $('#obra_id').select2({
                theme: "classic",
            })

            $('#pmarca').select2({
                theme: "classic",
            })

        });

        //funcion para el boton agregar de la tabla de detalles
        $(document).ready(function() {
            $('#bt_add').click(function() {
                agregar();
            });
        });
        //declaracion de variable
        var cont = 0;
        total = 0;
        subtotal = [];
        $("#guardar").hide();

        //funcionalidad para guardar
        function agregar() {
            catalogo_id = $("#pcatalogo").val();
            catalogo = $("#pcatalogo option:selected").text();
            marca_id = $("#pmarca").val();
            marca = $("#pmarca option:selected").text();
            precio = $("#pprecio").val();
            ingresos = $("#pcantidad").val();

            //validar campos vacios
            if (catalogo_id != "" && marca_id != "" && precio != "" && ingresos != "" && ingresos > 0) {
                subtotal[cont] = (ingresos * precio);
                total = total + subtotal[cont];

                //agregar fila para luego evaluar filas a eliminar
                var fila = '<tr class="selected" id="fila' + cont +
                    '"><td><button type="button" class="btn btn-warning btn-sm" onclick="eliminar(' +
                    cont +
                    ');"><i class="far fa-trash-alt icon-size"></button></td><td><input type="hidden" name="catalogo_id[]" value="' +
                    catalogo_id +
                    '">' + catalogo +
                    '</td><td><input type="hidden" name="marca_id[]" value="' + marca_id +
                    '">' + marca +
                    '</td><td><input type="number" name="precio[]" value="' + precio +
                    '"></td><td><input type="number" name="ingresos[]" value="' + ingresos +
                    '"></td><td>' + subtotal[cont] +
                    '</td></tr>';
                cont++;
                limpiar();
                $("#total").html("s/. " + total);
                evaluar();
                $('#detalles').append(fila);
            } else {
                alert("Error al registrar el detalle de ingreso, revise los datos del producto")
            }
        }

        //limpiar datos
        function limpiar() {
            $("#pcatalogo").val("");
            $("#pmarca").val("");
            $("#pprecio").val("");
            $("#pcantidad").val("")
        }

        //validar si existen detalles
        function evaluar() {
            if (total > 0) {
                $("#guardar").show();
            } else {
                $("#guardar").hide();
            }
        }

        //funcion eliminar
        function eliminar(index) {
            total = total - subtotal[index];
            $("#total").html("s/. " + total);
            $("#fila" + index).remove();
            evaluar();
        }
    </script>
@stop
