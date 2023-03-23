<?php require_once("./includes/header.php"); ?>
    <?php include("./includes/bd/conexion.php"); ?>
    <section class="container stn_principal">
        <article class="art_titulos_pantallas">
            <h4 class="text-center">Facturar producto a clientes</h4>
        </article>
        <article class="col-2 offset-10">
                <article class="text-center">
                    <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearFactura" id="botonCrearFacturaEncabezado"><i class="bi bi-plus-circle"></i> Crear</button>
                </article>
        </article>




        <article class="table-responsive">
            <table id="facturas_encabezados" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora Salida</th>
                        <th>Hora Entrada</th>
                        <th>Motorista</th>
                        <th>Auxiliar</th>
                        <th>Ruta</th>
                        <th>Vehiculo</th>
                        <th>Viaje</th>
                        <th>Facturas</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </article>


         <!-- MODAL AGREGA   R FACTURA ENCABEZADO -->
        <article>
            <div class="modal fade" id="modalCrearFactura" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Factura</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_crearFacturaEncabezado">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <article class="row">
                                        <article class="col-3">
                                            <label for="fecha_factura">Fecha: </label>
                                            <input type="date" name="fecha_factura" id="fecha_factura" class="form-control">
                                            <label for="hora_salida">Hora Salida: </label>
                                            <input type="time" class="form-control" name="hora_salida" id="hora_salida">
                                            <label for="hora_entrada">Hora hora_entrada: </label>
                                            <input type="time" class="form-control" name="hora_entrada" id="hora_entrada">
                                        </article>
                                        <article class="col-3">
                                            <label for="select_motorista">Motorista: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_motorista" id="select_motorista">
                                                <option value="0" selected>Elija el motorista 1</option>
                                            </select>
                                        </article>
                                        <article class="col-3">
                                            <label for="select_vehiculo">Vehiculo: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_vehiculo" id="select_vehiculos">
                                                <option value="0" selected>Elija el vehiculo</option>
                                            </select>
                                        </article>
                                    </article>
                                    <article class="row">
                                            <span class="text-center">Agregar facturas enviadas: </span>
                                            <button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalAgregarFacturasDetalle"><i class="bi bi-node-plus"></i> Agregar Facturas</button>
                                    </article>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_control" id="id_control">
                                    <input type="hidden" name="operacion" id="operacion">             
                                    <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                                </div>
                            </div>
                        </form>
                    </div>     
                </div>
            </div>
        </article>


        <article>
            <!-- MODAL AGREGAR FACTURAS DETALLE -->
            <div class="modal fade" id="modalAgregarFacturasDetalle" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar facturas</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_agregar_facturas_asociadas" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-body">
                                <select class="form-select" multiple aria-label="multiple select example">
                                    <option selected>Open this select menu</option>
                                    <option value="1">One</option>
                                    <option value="2">Two</option>
                                    <option value="3">Three</option>
                                </select>
                                </div>

                                <div class="modal-footer">
                                    <input type="hidden" name="id_usuario" id="id_usuario">
                                    <input type="hidden" name="operacion" id="operacion">             
                                    <input type="submit" name="action" id="action" class="btn btn-success" value="Crear">
                                </div>
                            </div>
                        </form>
                    </div>     
                </div>
            </div>
        </article>

    </section>
    <?php include("./includes/links_footer.php"); ?>
    <script type="text/javascript">
            $(document).ready(function(){
                $("#botonCrearFacturaEncabezado").click(function(){
                    $("#formulario_crearFacturaEncabezado")[0].reset();
                    $("modal-title").text("Crear Encabezado");
                    $("#action").val("Crear");
                    $("#operacion").val("Crear");
                });



                var dataTable = $('#facturas_encabezados').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url: "./metodos/obtener_encabezados_facturas.php",
                        type: "POST"
                    },
                    "columnsDefs":[
                        {
                        "targets":[0, 3, 4],
                        "orderable":false,
                        },
                    ],
                    "language": {
                    "decimal": "",
                    "emptyTable": "No hay registros",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                }
            });
            

            });


        </script>
<?php require_once("./includes/footer.php"); ?>
