<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM catalogomarcas ";

    if (isset($_POST["search"]["value"])) {
        $query .= 'WHERE descripcion_marca LIKE "%' . $_POST["search"]["value"] . '%" ';
     }
 
     if (isset($_POST["order"])) {
         $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
     }else{
         $query .= 'ORDER BY id_marca DESC ';
     }
 
     if($_POST["length"] != ''){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }
    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();

    foreach($resultado as $fila){
        $sub_array = array();
        $sub_array[] = $fila["id_marca"];
        $sub_array[] = $fila["descripcion_marca"];
        $sub_array[] = $fila["fecha_creacion"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_marca"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_marca"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todas_marcas(),
        "data"               => $datos
    );

    echo json_encode($salida);