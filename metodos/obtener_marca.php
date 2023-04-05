<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_marca"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM catalogomarcas WHERE id_marca = '".$_POST["id_marca"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["descripcion_marca"] = $fila["descripcion_marca"];
        }

        echo json_encode($salida);
    }