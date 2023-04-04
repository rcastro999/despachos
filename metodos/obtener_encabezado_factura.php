<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_control"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM control_despachos WHERE id_control = '".$_POST["id_control"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["fecha_salida"] = $fila["fecha_salida"];
            $salida["hora_salida"] = $fila["hora_salida"];
            $salida["hora_entrada"] = $fila["hora_entrada"];
            $salida["id_vehiculo"] = $fila["id_vehiculo"];
            $salida["id_motorista"] = $fila["id_motorista"];
            $salida["id_ruta"] = $fila["id_ruta"];
            $salida["numero_viaje"] = $fila["numero_viaje"];
            $salida["numero_factura"] = $fila["numero_factura"];
        }
        echo json_encode($salida);
    }