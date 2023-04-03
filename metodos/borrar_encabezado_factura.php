<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");


    if(isset($_POST["id_control"])){
        $stmt = $conexion->prepare("DELETE FROM control_despachos WHERE id_control = :id_control");
        $resultado = $stmt->execute(
            array(':id_control' => $_POST["id_control"])
        );

        if(!empty($resultado)){
            echo 'Registro Borrado';
        }
    }
