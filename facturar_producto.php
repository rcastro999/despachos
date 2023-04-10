<?php require_once("./includes/header.php"); ?>
    <?php include("./includes/bd/conexion.php"); ?>
    <section class="container stn_principal">
        <article class="art_titulos_pantallas">
            <h4 class="text-center">Facturar</h4>
        </article>
        <article class="col-2 offset-10 art-btn-crearEncabezado">
                <article class="text-center">
                    <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearFactura" id="botonCrearFacturaEncabezado"><i class="bi bi-plus-circle"></i> Crear Factura</button>
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
                        <th>Vehículo</th>
                        <th>Total Factura</th>
                        <th>Viaje</th>
                        <th>Ruta</th>
                        <th>Facturas asociadas</th>
                        <th>Fecha Creación</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </article>


         <!-- MODAL AGREGAR FACTURA ENCABEZADO -->
        <article class="container">
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
                                        <article class="col">
                                            <label for="fecha_factura">Fecha: </label>
                                            <input type="date" name="fecha_factura" id="fecha_factura" class="form-control">
                                        </article>
                                        <article class="col">
                                            <label for="select_motorista">Motorista: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_motorista" id="select_motorista">
                                                <option value="0" selected>Elija el motorista</option>
                                                <option value="1">Motorista 2</option>
                                            </select>
                                        </article>
                                        <article class="col">
                                            <label for="select_vehiculo">Vehículo: </label>
                                            <select class="form-select" aria-label="Default select example" name="select_vehiculo" id="select_vehiculo">
                                                <option value="0" selected>Elija el vehiculo</option>
                                                <option value="1">Vehículo 2</option>
                                            </select>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col">
                                            <label for="select_ruta">Ruta:</label>
                                            <select name="select_ruta" class="form-select" id="select_ruta">
                                                <option value="0" selected>Seleccione la ruta</option>
                                                <option value="1">Ruta 1</option>
                                                <option value="2">Ruta 2</option>
                                                <option value="3">Ruta 3</option>
                                                <option value="4">Ruta 4</option>
                                            </select>
                                        </article>
                                        <article class="col">
                                            <label for="hora_salida">Hora Salida: </label>
                                            <input type="time" class="form-control" name="hora_salida" id="hora_salida">
                                        </article>
                                        <article class="col">
                                            <label for="hora_entrada">Hora entrada: </label>
                                            <input type="time" class="form-control" name="hora_entrada" id="hora_entrada">
                                        </article>
                                        <article class="col">
                                            <label for="numero_viaje">Numero viaje:</label>
                                            <input type="text" name="numero_viaje" id="numero_viaje" class="form-control">
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col">
                                            <label for="select_facturas">Factura(s) asociada(s): </label>
                                            <select name="select_facturas[]" class="form-select" multiple aria-label="multiple select example" id="select_facturas">
                                                <option value="fact 1">Factura 1</option>
                                                <option value="fact 2">Factura 2</option>
                                                <option value="fact 3">Factura 3</option>
                                                <option value="fact 4">Factura 4</option>
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
                    $(".modal-title").text("Crear Factura");
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
                var numero_viaje = $('#numero_viaje').val();
                var id_ruta = $('#select_ruta').val();
                var numero_factura = $('#select_facturas').val();

                if(fecha_salida != '' && hora_salida != '' && hora_entrada != '' && id_motorista != '' && id_vehiculo != '' && numero_viaje != '' && id_ruta != '' && numero_factura != ''){
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
                        $('#select_ruta').val(data.id_ruta);
                        $('#numero_viaje').val(data.numero_viaje);
                        var facturas = data.numero_factura.split(";");
                        $("#select_facturas").val(facturas);
                        $('.modal-title').text("Editar encabezado de factura");
                        $('#id_control').val(id_control);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                })
            });




            //BORRAR REGISTROS
            $(document).on('click', '.borrar', function(){
                var id_control = $(this).attr("id");
                if(confirm("Esta seguro de borrar este registro: " + id_control)){
                    $.ajax({
                        url:"./metodos/borrar_encabezado_factura.php",
                        method:"POST",
                        data:{id_control:id_control},
                        success:function(data){
                            alert(data);
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    return false;
                }
            });

        }); 

        </script>
<?php require_once("./includes/footer.php"); ?>
