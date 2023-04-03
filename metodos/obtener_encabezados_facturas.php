<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    $query = "";
    $salida = array();
    $query = "SELECT * FROM control_despachos ";

    if (isset($_POST["search"]["value"])) {
        $query .= 'WHERE fecha_salida LIKE "%' . $_POST["search"]["value"] . '%" ';
    }

    if (isset($_POST["order"])) {
        $query .= 'ORDER BY' . $_POST['order']['0']['column'] .' '.$_POST["order"][0]['dir'] . ' ';        
    }else{
        $query .= 'ORDER BY id_control DESC ';
    }

    if($_POST["length"] != -1){
        $query .= 'LIMIT ' . $_POST["start"] . ','. $_POST["length"];
    }


    $stmt = $conexion->prepare($query);
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    $datos = array();
    $filtered_rows = $stmt->rowCount();

    foreach($resultado as $fila){
        $sub_array = array();
        $sub_array[] = $fila["id_control"];
        $sub_array[] = $fila["fecha_salida"];
        $sub_array[] = $fila["hora_salida"];
        $sub_array[] = $fila["hora_entrada"];
        $sub_array[] = $fila["id_cliente"];
        $sub_array[] = $fila["id_motorista"];
        $sub_array[] = $fila["id_vehiculo"];
        $sub_array[] = $fila["id_producto"];
        $sub_array[] = $fila["cantidad_producto"];
        $sub_array[] = $fila["costo_unit"];
        $sub_array[] = $fila["total_factura"];
        $sub_array[] = $fila["numero_viaje"];
        $sub_array[] = $fila["id_ruta"];
        $sub_array[] = $fila["numero_factura"];
        $sub_array[] = $fila["fecha_creacion"];
        $sub_array[] = '<button type="button" name="editar" id="'.$fila["id_control"].'" class="btn btn-warning btn-xs editar">Editar</button>';
        $sub_array[] = '<button type="button" name="borrar" id="'.$fila["id_control"].'" class="btn btn-danger btn-xs borrar">Borrar</button>';
        $datos[] = $sub_array;
    }

    $salida = array(
        "draw"               => intval($_POST["draw"]),
        "recordsTotal"       => $filtered_rows,
        "recordsFiltered"    => obtener_todos_encabezados_facturas(),
        "data"               => $datos
    );
    
    echo json_encode($salida);