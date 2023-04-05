<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_ruta"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM catalogorutas WHERE id_ruta='".$_POST["id_ruta"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["descripcion_ruta"] = $fila["descripcion_ruta"];
        }

        echo json_encode($salida);
    }