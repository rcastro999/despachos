<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_ruta"])){
        $stmt = $conexion->prepare("DELETE FROM catalogorutas WHERE id_ruta = :id_ruta");
        $resultado = $stmt->execute(
            array(
                ':id_ruta' => $_POST["id_ruta"]
            )
        );

        if(!empty($resultado)){
            echo 'Registro borrado';
        }
    }