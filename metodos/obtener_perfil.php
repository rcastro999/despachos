<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_perfil"])){
        $salida = array();
        $stmt = $conexion->prepare("SELECT * FROM catalogoperfiles WHERE id_perfil='".$_POST["id_perfil"]."' LIMIT 1");
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        foreach($resultado as $fila){
            $salida["descripcion_perfil"] = $fila["descripcion_perfil"];
        }

        echo json_encode($salida);

    }