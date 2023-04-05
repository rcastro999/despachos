<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if(isset($_POST["id_marca"])){
        $stmt = $conexion->prepare("DELETE FROM catalogomarcas WHERE id_marca = :id_marca");
        $resultado = $stmt->execute(
            array(':id_marca' => $_POST["id_marca"])
        );

        if(!empty($resultado)){
            echo 'Registro borrado';
        }
    }