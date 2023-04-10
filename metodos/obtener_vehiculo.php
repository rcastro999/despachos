<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_vehiculo"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM catalogovehiculos WHERE id_vehiculo = '".$_POST["id_vehiculo"]."' LIMIT 1");
        $stmt ->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["codigo_vehiculo"] = $fila["codigo_vehiculo"];
            $salida["id_marca"] = $fila["id_marca"];
            $salida["id_modelo"] = $fila["id_modelo"];
            $salida["placa"] = $fila["placa"];
            $salida["capacidad_vehiculo"] = $fila["capacidad_vehiculo"];
        }

        echo json_encode($salida);
    }