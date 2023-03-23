<?php

function obtener_todos_encabezados_facturas(){
    include('conexion.php');
    $stmt = $conexion->prepare("SELECT * FROM control_despachos");
    $stmt->execute();
    $resultado = $stmt->fetchAll(); 
    return $stmt->rowCount();
}