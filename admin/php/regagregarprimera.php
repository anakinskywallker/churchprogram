<?php
require_once "conexion.php";
$conexion = conexion();

// Recibir datos del formulario
$id_tipo_ingreso        = $_POST['id_tipo_ingreso'];
$nombre_apellido        = $_POST['reg_pri_nombre_y_apellido'];
$lugar_nacimiento       = $_POST['reg_pri_lugar_nacimiento'];
$fecha_nacimiento       = $_POST['reg_pri_fecha_nacimiento'];
$nombre_padre           = $_POST['reg_pri_nombre_padre'];
$nombre_madre           = $_POST['reg_pri_nombre_madre'];
$nombre_padrino         = $_POST['reg_pri_nombre_padrino'];
$nombre_madrina         = $_POST['reg_pri_nombre_madrina'];
$libro                  = $_POST['reg_pri_libro'];
$folio                  = $_POST['reg_pri_folio'];
$numero_reg             = $_POST['reg_pri_numero_reg'];
$ministro               = $_POST['reg_pri_ministro'];

// Insertar en la base de datos
$sql = "INSERT INTO registro (
    id_tipo_ingreso,
    nombre_apellido,
    lugar_nacimiento,
    fecha_nacimiento,
    nombre_padre,
    nombre_madre,
    nombre_padrino,
    nombre_madrina,
    libro_reg,
    folio_reg,
    numero_reg,
    ministro
) VALUES (
    '$id_tipo_ingreso',
    '$nombre_apellido',
    '$lugar_nacimiento',
    '$fecha_nacimiento',
    '$nombre_padre',
    '$nombre_madre',
    '$nombre_padrino',
    '$nombre_madrina',
    '$libro',
    '$folio',
    '$numero_reg',
    '$ministro'
)";

if (mysqli_query($conexion, $sql)) {
    echo 1;
} else {
    echo 0;
}
?>
