<?php

function obtener_todos_encabezados_facturas(){
    include('../includes/bd/conexion.php');
    $stmt = $conexion->prepare("SELECT * FROM control_despachos");
    $stmt->execute();
    $resultado = $stmt->fetchAll(); 
    return $stmt->rowCount();
}

function obtener_todas_marcas(){
    include('../includes/bd/conexion.php');
    $stmt =$conexion->prepare("SELECT * FROM catalogomarcas");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}


function obtener_todas_modelos(){
    include('../includes/bd/conexion.php');
    $stmt =$conexion->prepare("SELECT * FROM catalogomodelos");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}