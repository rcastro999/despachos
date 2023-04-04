<?php
    include("../includes/bd/conexion.php");
    include("funciones.php");

    if($_POST["operacion"] == "Crear"){
        $stmt = $conexion->prepare("INSERT INTO control_despachos (fecha_salida, hora_salida, hora_entrada, id_motorista, id_vehiculo, numero_viaje, id_ruta, numero_factura) 
        VALUES(:fecha_salida, :hora_salida, :hora_entrada, :id_motorista, :id_vehiculo, :numero_viaje, :id_ruta, :numero_factura)");

        $facturas = $_POST["select_facturas"];
        $facturas_string = implode(";",$facturas);

        $resultado = $stmt->execute(
            array(
                ':fecha_salida' => $_POST["fecha_factura"],
                ':hora_salida' => $_POST["hora_salida"],
                ':hora_entrada' => $_POST["hora_entrada"],
                ':id_motorista' => $_POST["select_motorista"],
                ':id_vehiculo' => $_POST["select_vehiculo"],
                ':numero_viaje' => $_POST["numero_viaje"],
                ':id_ruta' => $_POST["select_ruta"],
                ':numero_factura' => $facturas_string
            )
        );

        if(!empty($resultado)){
            echo 'Registro creado!';
        }

    }


    if($_POST["operacion"] == "Editar"){
        $stmt = $conexion->prepare("UPDATE control_despachos 
        SET fecha_salida=:fecha_factura, hora_salida=:hora_salida, hora_entrada=:hora_entrada, id_motorista=:select_motorista, id_vehiculo=:select_vehiculo, numero_viaje=:numero_viaje, id_ruta=:id_ruta, numero_factura=:numero_factura
        WHERE id_control = :id_control");

        $facturas = $_POST["select_facturas"];
        $facturas_string = implode(";",$facturas);

        $resultado = $stmt->execute(
            array(
                ':fecha_factura' => $_POST["fecha_factura"],
                ':hora_salida' => $_POST["hora_salida"],
                ':hora_entrada' => $_POST["hora_entrada"],
                ':select_motorista' => $_POST["select_motorista"],
                ':select_vehiculo' => $_POST["select_vehiculo"],
                ':numero_viaje' => $_POST["numero_viaje"],
                ':id_ruta' => $_POST["select_ruta"],
                ':numero_factura' => $facturas_string,
                ':id_control' => $_POST["id_control"]
            )
        );
        if(!empty($resultado)){
            echo 'Registro actualizado con exito!';
        }
    }
