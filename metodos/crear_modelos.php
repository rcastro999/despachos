<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO catalogomodelos(descripcion_modelo) VALUES(:descripcion)");

        $resultado = $stmt->execute(
            array(
                ':descripcion' => $_POST["descripcion"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro creado!';
        }
    }

    if($_POST["operacion"] == "Editar"){
        $stmt = $conexion->prepare("UPDATE catalogomodelos SET descripcion_modelo=:descripcion_modelo WHERE id_modelo=:id_modelo");

        $resultado = $stmt->execute(
            array(
                ':descripcion_modelo' => $_POST["descripcion"],
                ':id_modelo' => $_POST["id_modelo"]
            )
        );

        
        if(!empty($resultado)){
            echo 'Registro actualizado con exito!';
        }
    }