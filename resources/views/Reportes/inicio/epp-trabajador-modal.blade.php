<div class="modal fade" id="modal-epp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" v-text="trabajador"></h4>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Categoría</th>
                            <th>Tipo</th>
                            <th>Semana</th>
                            <th>Entrega</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="elemento in datos">
                            <td v-text="elemento.producto.catalogo.nombre"></td>
                            <td v-text="elemento.producto.catalogo.tipo.categoria.descripcion"></td>
                            <td v-text="elemento.producto.catalogo.tipo.descripcion"></td>
                            <td v-text="elemento.semana"></td>
                            <td>@{{ elemento.fecha_entrega | formatoFecha }}</td>
                            <td v-text="elemento.cantidad"></td>
                            <td>@{{ elemento.precio | formatoMoneda }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <strong>@{{ sumaTotal | formatoMoneda }}</strong>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
