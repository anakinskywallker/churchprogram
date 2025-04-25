<?php
require_once "conexion.php";
$conexion = conexion();

// Datos recibidos
$id_tipo_ingreso        = $_POST['id_tipo_ingreso'];
$nombre_apellido        = $_POST['reg_ba_nombre_y_apellido'];
$lugar_nacimiento       = $_POST['reg_ba_lugar_nacimiento'];
$fecha_nacimiento       = $_POST['reg_ba_fecha_nacimiento'];
$nombre_padre           = $_POST['reg_ba_nombre_padre'];
$nombre_madre           = $_POST['reg_ba_nombre_madre'];
$nombre_padrino         = $_POST['reg_ba_nombre_padrino'];
$nombre_madrina         = $_POST['reg_ba_nombre_madrina'];
$abuelos_paternos       = $_POST['reg_ba_abuelos_paternos'];
$abuelos_maternos       = $_POST['reg_ba_abuelos_maternos'];
$ministro               = $_POST['reg_ba_ministro_bautizo'];
$libro                  = $_POST['reg_ba_libro'];
$folio                  = $_POST['reg_ba_folio'];
$numero_reg             = $_POST['reg_ba_numero_reg'];

// Insertar en la tabla
$sql = "INSERT INTO registro (
    id_tipo_ingreso,
    nombre_apellido,
    lugar_nacimiento,
    fecha_nacimiento,
    nombre_padre,
    nombre_madre,
    nombre_padrino,
    nombre_madrina,
    abuelos_paternos,
    abuelos_maternos,
    ministro,
    libro_reg,
    folio_reg,
    numero_reg
) VALUES (
    '$id_tipo_ingreso',
    '$nombre_apellido',
    '$lugar_nacimiento',
    '$fecha_nacimiento',
    '$nombre_padre',
    '$nombre_madre',
    '$nombre_padrino',
    '$nombre_madrina',
    '$abuelos_paternos',
    '$abuelos_maternos',
    '$ministro',
    '$libro',
    '$folio',
    '$numero_reg'
)";

if (mysqli_query($conexion, $sql)) {
    echo 1; // éxito
} else {
    echo 0; // error
}
?>
