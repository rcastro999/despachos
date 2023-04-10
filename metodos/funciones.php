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


function obtener_todas_rutas(){
    include('../includes/bd/conexion.php');
    $stmt =$conexion->prepare("SELECT * FROM catalogorutas");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}


function obtener_todos_perfiles(){
    include("../includes/bd/conexion.php");
    $stmt = $conexion->prepare("SELECT * FROM catalogoperfiles");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}

function obtener_todos_vehiculos(){
    include("../includes/bd/conexion.php");
    $stmt = $conexion->prepare("SELECT catalogovehiculos.id_vehiculo, catalogovehiculos.codigo_vehiculo, catalogomarcas.descripcion_marca, catalogomodelos.descripcion_modelo, catalogovehiculos.placa, catalogovehiculos.capacidad_vehiculo, catalogovehiculos.fecha_creacion FROM catalogovehiculos INNER JOIN catalogomarcas ON catalogomarcas.id_marca = catalogovehiculos.id_marca INNER JOIN catalogomodelos ON catalogovehiculos.id_modelo = catalogomodelos.id_modelo");
    $stmt->execute();
    $resultado = $stmt->fetchAll();
    return $stmt->rowCount();
}