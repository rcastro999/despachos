<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_modelo"])){
        $stmt = $conexion->prepare("DELETE FROM catalogomodelos WHERE id_modelo = :id_modelo");
        $resultado =$stmt->execute(
            array(
                ':id_modelo' => $_POST["id_modelo"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro borrado';
        }
    }