<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// ✅ Datos recibidos por POST
$id_rubro                             = $_POST['id_rubro'];
$id_tipo_ingreso                      = $_POST['id_tipo_ingreso'];
$reg_matri_nombrenovio                = $_POST['reg_matri_nombrenovio'];
$reg_matri_nombrenovia                = $_POST['reg_matri_nombrenovia'];
$reg_matri_padresnovio                = $_POST['reg_matri_padresnovio'];
$reg_matri_padresnovia                = $_POST['reg_matri_padresnovia'];
$reg_matri_testigouno                 = $_POST['reg_matri_testigouno'];
$reg_matri_testigodos                 = $_POST['reg_matri_testigodos'];
$reg_matri_infobautisonovio           = $_POST['reg_matri_infobautisonovio'];
$reg_matri_infobautisonovio_fecha     = $_POST['reg_matri_infobautisonovio_fecha'];
$reg_matri_infobautisonovia           = $_POST['reg_matri_infobautisonovia'];
$reg_matri_infobautisonovia_fecha     = $_POST['reg_matri_infobautisonovia_fecha'];
$reg_matri_ministro                   = $_POST['reg_matri_ministro'];
$reg_matri_libro                      = $_POST['reg_matri_libro'];
$reg_matri_folio                      = $_POST['reg_matri_folio'];
$reg_matri_numero_reg                 = $_POST['reg_matri_numero_reg'];

// ✅ Insertar en tabla registro
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso,
    libro_reg,
    folio_reg,
    numero_reg,
    nombre_apellido,
    nombre_padre,
    nombre_madre,
    nombre_padrino,
    nombre_madrina,
    fecha_nacimiento,          -- usado como fecha bautismo del novio
    fecha_muerte,              -- usado como fecha bautismo de la novia
    ministro,
    fecha_bautismo_cnf,
    informacion_bautismo
) VALUES (
    '$id_tipo_ingreso',
    '$reg_matri_libro',
    '$reg_matri_folio',
    '$reg_matri_numero_reg',
    '$reg_matri_nombrenovio y $reg_matri_nombrenovia',
    '$reg_matri_padresnovio',
    '$reg_matri_padresnovia',
    '$reg_matri_testigouno',
    '$reg_matri_testigodos',
    '$reg_matri_infobautisonovio_fecha',
    '$reg_matri_infobautisonovia_fecha',
    '$reg_matri_ministro',
    '$reg_matri_infobautisonovio_fecha',
    'Bautizo Novio: $reg_matri_infobautisonovio, Bautizo Novia: $reg_matri_infobautisonovia '
)";

if (mysqli_query($conexion, $sql_registro)) {
    echo "1"; // ✅ Inserción exitosa
} else {
    echo "❌ Error al insertar en registro: " . mysqli_error($conexion);
}
?>
