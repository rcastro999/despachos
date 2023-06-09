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


    if($_POST["operacion"] == "Editar"){
        $stmt = $conexion->prepare("UPDATE catalogomarcas SET descripcion_marca=:descripcion_marca WHERE id_marca=:id_marca");

        $resultado = $stmt->execute(
            array(
                ':descripcion_marca' => $_POST["descripcion"],
                ':id_marca' => $_POST["id_marca"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro actualizado con exito!';
        }
    }