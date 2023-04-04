<?php require_once("./includes/header.php"); ?>
    <?php include("./includes/bd/conexion.php"); ?>
    <section class="container stn_principal">
        <article class="art_titulos_pantallas">
            <h4 class="text-center">Marcas de vehículos</h4>
        </article>
        <article class="col-2 offset-10 art-btn-crearEncabezado">
                <article class="text-center">
                    <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearMarcas" id="botonCrearMarca"><i class="bi bi-plus-circle"></i> Crear Marca</button>
                </article>
        </article>

        <!-- TABLA DE MARCAS -->
        <article class="table-responsive">
            <table id="tabla_marcas" class="table table-bordered table-striped">
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
            <div class="modal fade" id="modalCrearMarcas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Marca</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_crearMarca">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <article class="row">
                                        <article class="col">
                                            <label for="descripcion">Descripcion Marca:</label>
                                            <input type="text" name="descripcion" class="form-control" id="descripcion">
                                        </article>
                                    </article>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_marca" id="id_marca">
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
           
            $("#botonCrearMarca").click(function(){
                $("#formulario_crearMarca")[0].reset();
                $(".modal-title").text("Crear Marca");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
            });

            var dataTable = $('#tabla_marcas').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url: "./metodos/obtener_marcas.php",
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
