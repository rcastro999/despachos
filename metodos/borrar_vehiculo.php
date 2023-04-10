<?php

    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_vehiculo"])){
        $stmt = $conexion->prepare("DELETE FROM catalogovehiculos WHERE id_vehiculo=:id_vehiculo");

        $resultado = $stmt->execute(
            array(
                ':id_vehiculo' => $_POST["id_vehiculo"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro borrado';
        }
    }