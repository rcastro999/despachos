<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO catalogoperfiles (descripcion_perfil) VALUES(:descripcion)");

        $resultado = $stmt->execute(
            array(
                ':descripcion' => $_POST["descripcion"]
            )
        );

        if(!empty($resultado)){
            echo 'Perfil de Colaborador creado con exito!';
        }

    }


    if($_POST["operacion"] == "Editar"){
        $stmt = $conexion->prepare("UPDATE catalogoperfiles  SET descripcion_perfil=:descripcion_perfil WHERE id_perfil=:id_perfil");
        $resultado = $stmt->execute(
            array(
                ':descripcion_perfil' => $_POST["descripcion"],
                ':id_perfil' => $_POST["id_perfil"]
            )
        );


        if(!empty($resultado)){
            echo 'Perfil actualizado con exito!';
        }
    }
