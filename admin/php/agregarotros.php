<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos por POST
$id_rubro           = $_POST['id_rubro'];
$otros_tipo         = $_POST['otros_tipo'];
$otros_recibido     = $_POST['otros_recibido'];
$otros_cedula       = $_POST['otros_cedula'];
$otros_ofrenda      = $_POST['otros_ofrenda'];
$otros_observacion  = $_POST['otros_observacion'];
$otros_celular      = $_POST['otros_celular'];
$otros_ciudad       = $_POST['otros_ciudad'];



    
    $sql_factura = "INSERT INTO factura (
        id_rubro,
        id_registro,
        nombre_apellido_contacto,
        telefono_contacto,
        recibido_de,
        identificacion,
        ofrenda,
        Observacion,
        correo_contacto,
        fecha_ofrenda,
        fecha_diligenciamiento
    ) VALUES (
        '$id_rubro',
        20,
        '$otros_recibido',
        '$otros_celular',
        '$otros_recibido',
        '$otros_cedula',
        '$otros_ofrenda',
        '$otros_observacion',
        '$otros_tipo',
        '$fecha_actual',
        '$fecha_actual'
    )";

    if (mysqli_query($conexion, $sql_factura)) {
        echo "Registro y factura insertados correctamente.";
    } else {
        echo "Error al insertar en factura: " . mysqli_error($conexion);
    }

?>
