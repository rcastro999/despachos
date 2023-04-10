<?php require_once("./includes/header.php"); ?>
    <section class="container stn_principal">

    <article class="art_titulos_pantallas">
            <h4 class="text-center">Perfiles de colaboradores</h4>
        </article>
        <article class="col-2 offset-10 art-btn-crearEncabezado">
                <article class="text-center">
                    <button type="buttom" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalCrearPerfiles" id="botonCrearPerfiles"><i class="bi bi-plus-circle"></i> Crear Perfil</button>
                </article>
        </article>

        <!-- TABLA DE MARCAS -->
        <article class="table-responsive">
            <table id="tabla_perfiles" class="table table-bordered table-striped">
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




        <!-- MODAL CREAR PERFILES -->


        <article class="container">
            <div class="modal fade" id="modalCrearPerfiles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Crear Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                        <form method="POST" id="formulario_crearPerfil">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <article class="row">
                                        <article class="col">
                                            <label for="descripcion">Descripcion Perfil:</label>
                                            <input type="text" name="descripcion" class="form-control" id="descripcion">
                                        </article>
                                    </article>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="id_perfil" id="id_perfil">
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
           

            $("#botonCrearPerfiles").click(function(){
                $("#formulario_crearPerfil")[0].reset();
                $(".modal-title").text("Crear Perfil de Colaborador");
                $("#action").val("Crear");
                $("#operacion").val("Crear");
            });


            //CARGANDO DATATABLES CON REGISTROS EXISTENTES EN LA BD
            var dataTable = $('#tabla_perfiles').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order":[],
                    "ajax":{
                        url: "./metodos/obtener_perfiles.php",
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


            //INSERTAR PERFILES
            $(document).on('submit', '#formulario_crearPerfil', function(event){
                event.preventDefault();

                var descripcion = $('#descripcion').val();

                if(descripcion != ''){
                    $.ajax({
                        url:"./metodos/crear_perfiles.php",
                        method:"POST",
                        data: new FormData(this),
                        contentType: false,
                        processData: false,
                        success:function(data){
                            alert(data);
                            $('#formulario_crearPerfil')[0].reset();
                            $('#modalCrearPerfiles').modal('hide');
                            dataTable.ajax.reload();
                        }
                    });
                }else{
                    alert("Algunos campos son obligadorios");
                }
            });


            //EDITAR PERFILES
            $(document).on('click', '.editar', function(){
                var id_perfil = $(this).attr("id");

                $.ajax({
                    url:"./metodos/obtener_perfil.php",
                    method:"POST",
                    data:{id_perfil:id_perfil},
                    dataType:"json",
                    success:function(data){
                        $('#modalCrearPerfiles').modal('show');
                        $('#descripcion').val(data.descripcion_perfil);
                        $('.modal-title').text("Editar Perfil de Colaborador");
                        $('#id_perfil').val(id_perfil);
                        $('#action').val("Editar");
                        $('#operacion').val("Editar");
                    },
                    error: function(jqXHR, textStatus, errorThrown){
                        console.log(textStatus, errorThrown);
                    }
                })
            });


            //BORRAR PERFILES

            $(document).on('click', '.borrar', function(){
                var id_perfil = $(this).attr("id");

                if(confirm("Esta seguro de borrar el registro: " + id_perfil)){

                    $.ajax({
                        url:"./metodos/borrar_perfil.php",
                        method:"POST",
                        data:{id_perfil:id_perfil},
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
