<?php
require_once "conexion.php";
$conexion = conexion();

// Datos recibidos por POST
$id_rubro                         = $_POST['id_rubro']; // aunque no se guarda, lo recibimos por compatibilidad
$id_tipo_ingreso                  = $_POST['id_tipo_ingreso'];
$reg_con_parroquia                = $_POST['reg_con_parroquia'];
$reg_con_nombre_y_apellido        = $_POST['reg_con_nombre_y_apellido'];
$reg_con_lugar_bautizo            = $_POST['reg_con_lugar_bautizo'];
$reg_con_fecha_bautismo           = $_POST['reg_con_fecha_bautismo'];
$reg_con_informacion_bautizo      = $_POST['reg_con_informacion_bautizo'];
$reg_con_fecha_confirmacion       = $_POST['reg_con_fecha_confirmacion'];
$reg_con_nombre_padre             = $_POST['reg_con_nombre_padre'];
$reg_con_nombre_madre             = $_POST['reg_con_nombre_madre'];
$reg_con_nombre_padrino_madrina   = $_POST['reg_con_nombre_padrino_madrina'];
$reg_con_ministro                 = $_POST['reg_con_ministro'];
$reg_con_libro                    = $_POST['reg_con_libro'];
$reg_con_folio                    = $_POST['reg_con_folio'];
$reg_con_numero_reg               = $_POST['reg_con_numero_reg'];

// Insertar en tabla registro
$sql = "INSERT INTO registro (
    id_tipo_ingreso,
    lugar_evento,
    nombre_apellido,
    lugar_bautismo_cnf,
    fecha_bautismo_cnf,
    informacion_bautismo,
    fecha_misa,
    nombre_padre,
    nombre_madre,
    nombre_padrino,
    ministro,
    libro_reg,
    folio_reg,
    numero_reg
) VALUES (
    '$id_tipo_ingreso',
    '$reg_con_parroquia',
    '$reg_con_nombre_y_apellido',
    '$reg_con_lugar_bautizo',
    '$reg_con_fecha_bautismo',
    '$reg_con_informacion_bautizo',
    '$reg_con_fecha_confirmacion',
    '$reg_con_nombre_padre',
    '$reg_con_nombre_madre',
    '$reg_con_nombre_padrino_madrina',
    '$reg_con_ministro',
    '$reg_con_libro',
    '$reg_con_folio',
    '$reg_con_numero_reg'
)";

// Ejecutar y devolver resultado
if (mysqli_query($conexion, $sql)) {
    echo "1"; // Éxito
} else {
    echo "Error al insertar el registro: " . mysqli_error($conexion);
}
?>
