<?php

    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO catalogovehiculos (codigo_vehiculo, id_marca, id_modelo, placa, capacidad_vehiculo) VALUES(:codigo_vehiculo, :id_marca, :id_modelo, :placa, :capacidad_vehiculo)");
        
        $resultado = $stmt->execute(
            array(
                ':codigo_vehiculo' => $_POST["codigo_vehiculo"],
                ':id_marca' => $_POST["select_marca"],
                ':id_modelo' => $_POST["select_modelo"],
                ':placa' => $_POST["placa"],
                ':capacidad_vehiculo' => $_POST["capacidad"]
            )
        );

        if(!empty($resultado)){
            echo 'Vehiculo creado con exito!';
        }
    }

    if($_POST["operacion"] == "Editar"){
        $stmt = $conexion->prepare("UPDATE catalogovehiculos SET codigo_vehiculo=:codigo_vehiculo, id_marca=:id_marca, id_modelo=:id_modelo, placa=:placa, capacidad_vehiculo=:capacidad_vehiculo WHERE id_vehiculo= :id_vehiculo");
        $resultado =$stmt->execute(
            array(
                ':codigo_vehiculo' => $_POST["codigo_vehiculo"],
                ':id_marca' => $_POST["select_marca"],
                ':id_modelo' => $_POST["select_modelo"],
                ':placa' => $_POST["placa"],
                ':capacidad_vehiculo' => $_POST["capacidad"],
                ':id_vehiculo' => $_POST["id_vehiculo"] 
            )
        );

        if(!empty($resultado)){
            echo 'Vehiculo actualizado con exito!';
        }
    }