<?php require_once("./includes/header.php"); ?>
    <section class="container stn_principal">


    <article class="art_titulos_pantallas">
        <h4 class="text-center">Rutas de despacho</h4>
    </article>
    <article class="col-2 offset-10 art-btn-crearEncabezado">
        <article class="text-center">
            <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearRutas" id="botonCrearRuta"><i class="bi bi-plus-circle"></i> Crear Ruta</button>
        </article>
    </article>


        <!-- TABLA DE RUTAS -->
        <article class="table-responsive">
            <table id="tabla_rutas" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Fecha Creación</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </article>



        <!-- MODAL CREAR MARCAS -->


        <article class="container">
            <div class="modal fade" id="modalCrearRutas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Ruta</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_crearRuta">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <article class="row">
                                        <article class="col">
                                            <label for="descripcion">Descripcion Ruta:</label>
                                            <input type="text" name="descripcion" class="form-control" id="descripcion">
                                        </article>
                                    </article>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_ruta" id="id_ruta">
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


            $("#botonCrearRuta").click(function(){
                $("#formulario_crearRuta")[0].reset();
                $(".modal-title").text("Crear Ruta");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
            });




            //CARGANDO LOS REGISTROS DE LA TABLA
            var dataTable = $('#tabla_rutas').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url: "./metodos/obtener_rutas.php",
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



            //INSERTAR RUTAS
            $(document).on('submit', '#formulario_crearRuta', function(event){
                event.preventDefault();
                var descripcion = $('#descripcion').val();

                if(descripcion != ''){
                    $.ajax({
                        url:"./metodos/crear_rutas.php",
                        method:"POST",
                        data:new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(data){
                            alert(data);
                            $('#formulario_crearRuta')[0].reset();
                            $('#modalCrearRutas').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligatorios");
                }
            });


            //EDITAR RUTAS

            $(document).on('click', '.editar', function(){
                var id_ruta = $(this).attr("id");

                $.ajax({
                    url:"./metodos/obtener_ruta.php",
                    method:"POST",
                    data:{id_ruta:id_ruta},
                    dataType:"json",
                    success:function(data){
                        console.log(data);
                        $('#modalCrearRutas').modal('show');
                        $('#descripcion').val(data.descripcion_ruta);
                        $('.modal-title').text("Editar ruta de despacho");
                        $('#id_ruta').val(id_ruta);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                })
            });



            //BORRAR RUTAS
            $(document).on('click', '.borrar', function(){
                var id_ruta = $(this).attr("id");

                if(confirm("Esta seguro de eliminar este registro: " + id_ruta)){
                    $.ajax({
                        url:"./metodos/borrar_ruta.php",
                        method:"POST",
                        data:{id_ruta:id_ruta},
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
