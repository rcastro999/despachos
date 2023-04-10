<?php require_once("./includes/header.php"); ?>
    <section class="container stn_principal">

    <article class="art_titulos_pantallas">
            <h4 class="text-center">Vehículos</h4>
        </article>
        <article class="col-2 offset-10 art-btn-crearEncabezado">
                <article class="text-center">
                    <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearVehiculos" id="botonCrearVehiculo"><i class="bi bi-plus-circle"></i> Crear Vehiculo</button>
                </article>
        </article>

        <!-- TABLA DE MARCAS -->
        <article class="table-responsive">
            <table id="tabla_vehiculos" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Código Vehículo</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>N° Placa</th>
                        <th>Capacidad (libras)</th>
                        <th>Fecha Creación</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </article>


        <!-- MODAL CREAR VEHICULOS -->


        <article class="container">
            <div class="modal fade" id="modalCrearVehiculos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Vehículo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_crearVehiculo">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <article class="row">
                                        <article class="col">
                                            <label for="codigo_vehiculo">Código Vehículo:</label>
                                            <input type="text" name="codigo_vehiculo" class="form-control" id="codigo_vehiculo">
                                        </article>
                                        <article class="col">
                                            <label for="marca">Marca:</label>
                                            <select name="select_marca" class="form-select" aria-label="Default select example" id="select_marca">
                                                <option value="0">Seleccione la marca</option>
                                                <option value="1">Marca 1</option>
                                                <option value="2">Marca 2</option>
                                            </select>
                                        </article>
                                        <article class="col">
                                        <label for="marca">Modelo:</label>
                                            <select name="select_modelo" class="form-select" aria-label="Default select example" id="select_modelo">
                                                <option value="0">Seleccione el modelo</option>
                                                <option value="1">Modelo 1</option>
                                                <option value="2">Modelo 2</option>
                                            </select>
                                        </article>
                                    </article>
                                    <article class="row">
                                        <article class="col">
                                            <label for="placa">N° Placa:</label>
                                            <input type="text" name="placa" id="placa" class="form-control">
                                        </article>
                                        <article class="col">
                                            <label for="capacidad">Capacidad Vehiculo (Libras):</label>
                                            <input type="number" class="form-control" name="capacidad" id="capacidad">
                                        </article>
                                    </article>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_vehiculo" id="id_vehiculo">
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

            $("#botonCrearVehiculo").click(function(){
                $("#formulario_crearVehiculo")[0].reset();
                $(".modal-title").text("Crear Vehiculo");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
            });


            //CARGAR EL DATATABLE CON LOS REGISTROS EXISTENTES EN LA BD

            var dataTable = $('#tabla_vehiculos').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url: "./metodos/obtener_vehiculos.php",
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


            //INSERTAR VEHICULOS
            $(document).on('submit', '#formulario_crearVehiculo', function(event){
                event.preventDefault();

                var codigo_vehiculo = $('#codigo_vehiculo').val();
                var select_marca = $('#select_marca').val();
                var select_modelo = $('#select_modelo').val();
                var placa = $('#placa').val();
                var capacidad = $('#capacidad').val();

                if(codigo_vehiculo != '' && select_marca != '' && select_modelo != '' && placa != '' && capacidad != ''){
                    $.ajax({
                        url:"./metodos/crear_vehiculos.php",
                        method:"POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success: function(data){
                            alert(data);
                            $('#formulario_crearVehiculo')[0].reset();
                            $('#modalCrearVehiculos').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert('Algunos campos son obligatorios!');
                }
            });


            //EDITAR VEHICULOS

            $(document).on('click', '.editar', function(){
                var id_vehiculo = $(this).attr("id");

                $.ajax({
                    url:"./metodos/obtener_vehiculo.php",
                    method:"POST",
                    data:{id_vehiculo:id_vehiculo},
                    dataType:"json",
                    success:function(data){
                        $('#modalCrearVehiculos').modal('show');
                        $('#codigo_vehiculo').val(data.codigo_vehiculo);
                        $('#select_marca').val(data.id_marca);
                        $('#select_modelo').val(data.id_modelo);
                        $('#placa').val(data.placa);
                        $('#capacidad').val(data.capacidad_vehiculo);
                        $('#id_vehiculo').val(id_vehiculo);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                })
            });

            
        });
    </script>
<?php require_once("./includes/footer.php"); ?>
