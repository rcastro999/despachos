<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_modelo"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM catalogomodelos WHERE id_modelo = '".$_POST["id_modelo"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();

        foreach($resultado as $fila){
            $salida["descripcion_modelo"] = $fila["descripcion_modelo"];
        }


        echo json_encode($salida);

    }