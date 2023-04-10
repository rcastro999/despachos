<?php

    include("../includes/bd/conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT catalogovehiculos.id_vehiculo, catalogovehiculos.codigo_vehiculo, catalogomarcas.descripcion_marca, catalogomodelos.descripcion_modelo, catalogovehiculos.placa, catalogovehiculos.capacidad_vehiculo, catalogovehiculos.fecha_creacion FROM catalogovehiculos INNER JOIN catalogomarcas ON catalogomarcas.id_marca = catalogovehiculos.id_marca INNER JOIN catalogomodelos ON catalogovehiculos.id_modelo = catalogomodelos.id_modelo ";

    if (isset($_POST["search"]["value"])) {
        $query .= 'WHERE catalogovehiculos.codigo_vehiculo LIKE "%' . $_POST["search"]["value"] . '%" ';
     }
 
     if (isset($_POST["order"])) {
         $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
     }else{
         $query .= 'ORDER BY catalogovehiculos.id_vehiculo DESC ';
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
        $sub_array[] = $fila["id_vehiculo"];
        $sub_array[] = $fila["codigo_vehiculo"];
        $sub_array[] = $fila["descripcion_marca"];
        $sub_array[] = $fila["descripcion_modelo"];
        $sub_array[] = $fila["placa"];
        $sub_array[] = $fila["capacidad_vehiculo"];
        $sub_array[] = $fila["fecha_creacion"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_vehiculo"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_vehiculo"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_vehiculos(),
        "data"               => $datos
    );

    echo json_encode($salida);