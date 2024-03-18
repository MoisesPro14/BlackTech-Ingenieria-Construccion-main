<!-- Ventana modal para mostrar -->

<div class="modal fade " id="mostrar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Selecciona un Proyecto
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mt-4 text-left">

                <div class="row justify-content-center">

                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
                        <table id="tbmantenimiento"
                            class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                            style="width:100%">
                            <thead class="text-white" style="background-color:#6777ef">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Accion</th>
                            </thead>
                            <tbody>
                                @php
                                    use App\Models\Obra;
                                    $proyectos = Obra::all();
                                @endphp
                                @foreach ($proyectos as $proyecto)
                                    <tr>
                                        <td>{{ $proyecto->id }}</td>
                                        <td>{{ $proyecto->nombre }}</td>
                                        <td>
                                            <a type="button" class="btn btn-sm btn-success"
                                                href="{{ route('reportes.pages.inicio', $proyecto->id) }}">Seleccionar</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!---fin ventana mostrar--->
