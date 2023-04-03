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
                        <th>Cliente</th>
                        <th>Motorista</th>
                        <th>Vehiculo</th>
                        <th>Producto</th>
                        <th>Cantidad Producto</th>
                        <th>Costo unit</th>
                        <th>Total Factura</th>
                        <th>Viaje</th>
                        <th>Ruta</th>
                        <th>Numero Factura</th>
                        <th>Fecha Creacion</th>
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
                                            <label for="hora_entrada">Hora entrada: </label>
                                            <input type="time" class="form-control" name="hora_entrada" id="hora_entrada">
                                        </article>
                                        <article class="col-3">
                                            <label for="select_motorista">Motorista: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_motorista" id="select_motorista">
                                                <option value="0" selected>Elija el motorista 1</option>
                                                <option value="1" selected>Motorista 2</option>
                                            </select>
                                        </article>
                                        <article class="col-3">
                                            <label for="select_vehiculo">Vehiculo: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_vehiculo" id="select_vehiculos">
                                                <option value="0" selected>Elija el vehiculo</option>
                                                <option value="1" selected>Vehiculo 2</option>
                                            </select>
                                        </article>
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

    </section>
    <?php include("./includes/links_footer.php"); ?>
    <script type="text/javascript">
            $(document).ready(function(){
                $("#botonCrearFacturaEncabezado").click(function(){
                    $("#formulario_crearFacturaEncabezado")[0].reset();
                    $(".modal-title").text("Crear Encabezado");
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

            //INSERTAR registros

            $(document).on('submit', '#formulario_crearFacturaEncabezado', function(event){
                event.preventDefault();
                var fecha_salida = $('#fecha_factura').val();
                var hora_salida = $('#hora_salida').val();
                var hora_entrada = $('#hora_entrada').val();
                var id_motorista = $('#select_motorista').val();
                var id_vehiculo = $('#select_vehiculo').val();

                if(fecha_salida != '' && hora_salida != '' && hora_entrada != '' && id_motorista != '' && id_vehiculo != ''){
                    $.ajax({
                        url:"./metodos/crear_encabezado_factura.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(data){
                            alert(data);
                            $('#formulario_crearFacturaEncabezado')[0].reset();
                            $('#modalCrearFactura').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligatorios");
                }
            

            });

            //EDITAR registros

            $(document).on('click', '.editar', function(){
                var id_control = $(this).attr("id");
                $.ajax({
                    url: "./metodos/obtener_encabezado_factura.php",
                    method:"POST",
                    data:{id_control:id_control},
                    dataType:"json",
                    success:function(data){
                        $('#modalCrearFactura').modal('show');
                        $('#fecha_factura').val(data.fecha_salida);
                        $('#hora_salida').val(data.hora_salida);
                        $('#hora_entrada').val(data.hora_entrada);
                        $('#select_vehiculo').val(data.id_vehiculo);
                        $('#select_motorista').val(data.id_motorista);
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                })
            });


        }); 

        </script>
<?php require_once("./includes/footer.php"); ?>
