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
        <form method="POST" action="{{ route('libretatiempo.store') }}">
            @csrf
            <label>
                Semana:
                <br>
                <input type="text" id="semana" name="semana" value="{{ date('W') }}" readonly>
            </label>
            <br>

            <label>
                Nombres:
                <br>
                <input type="text" name="nombres">
            </label>
            <br>

            <label>
                Apellidos:
                <br>
                <input type="text" name="apellidos">
            </label>
            <br>

            <label>
                Día:
                <br>
                <select name="dia">
                    <option value="lunes">Lunes</option>
                    <option value="martes">Martes</option>
                    <option value="miercoles">Miércoles</option>
                    <option value="jueves">Jueves</option>
                    <option value="viernes">Viernes</option>
                    <option value="sabado">Sábado</option>
                    <option value="domingo">Domingo</option>
                </select>
            </label>
            <br>

            <label>
                Horas:
                <br>
                <input type="time">
            </label>
            <br>

            <label>
                Proyecto:
                <br>
                <select id="obra_trabajador" name="obra_id">
                    <option value="Ampliacion Proserla">Ampliacion Proserla</option>
                    <option value="Construccion de Packing de Arandanos">Construccion de Packing de Arandanos</option>
                    <option value="Packing de Arandanos">Packing de Arandanos</option>
                    <!-- Puedes agregar más opciones aquí -->
                </select>
            </label>
            <br>

            <label>
                Asignado por:
                <br>
                <input type="text" name="user" value="{{ $user->name }}" readonly>
            </label>

            <button type="submit">Guardar</button>
        </form>
    @stop

    @section('footer')
        @include('footer')
    @stop

    @section('css')

    @stop

    @section('js')

    @stop
