<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO catalogomarcas (descripcion_marca) VALUES(:descripcion)");

        $resultado = $stmt->execute(
            array(
                ':descripcion' => $_POST["descripcion"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro creado!';
        }
    }