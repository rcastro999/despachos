<?php

    include("../includes/bd/conexion.php");
    include("funciones.php");


    if(isset($_POST["id_perfil"])){
        $stmt = $conexion->prepare("DELETE FROM catalogoperfiles WHERE id_perfil= :id_perfil");
        $resultado = $stmt->execute(
            array(
                ':id_perfil' => $_POST["id_perfil"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro borrado';
            
        }

    
    }