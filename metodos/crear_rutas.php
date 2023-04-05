<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO catalogorutas (descripcion_ruta) VALUES(:descripcion)");

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
        $stmt = $conexion->prepare("UPDATE catalogorutas SET descripcion_ruta=:descripcion_ruta WHERE id_ruta= :id_ruta");


        $resultado = $stmt->execute(
            array(
                ':descripcion_ruta' => $_POST["descripcion"],
                ':id_ruta' => $_POST["id_ruta"]
            )
        );


        if(!empty($resultado)){
            echo 'Registro actualizado con exito!';
        }
    }