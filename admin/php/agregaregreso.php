<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Para ver qué llega por POST
echo "<pre>";
var_dump($_POST);
echo "</pre>";

// Datos recibidos por POST
$id_tipo_egreso        = $_POST['id_tipo_egreso'];
$egreso_nombreapellido = $_POST['egreso_nombreapellido'];
$egreso_cedula         = $_POST['egreso_cedula'];
$egreso_celular        = $_POST['egreso_celular'];
$egreso_observacion    = $_POST['egreso_observacion'];
$egreso_valor          = $_POST['egreso_valor'];

// Insertar en tabla egresos
$sql_egreso = "INSERT INTO egresos (
    id_tipo_egreso,
    nombre_apellido,
    egreso_celular,
    Cedula,
    fecha_egreso,
    observacion,
    valor_egreso
) VALUES (
    '$id_tipo_egreso',
    '$egreso_nombreapellido',
    '$egreso_celular',
    '$egreso_cedula',
    '$fecha_actual',
    '$egreso_observacion',
    '$egreso_valor'
)";

// Mostrar consulta para debug
echo "<pre>$sql_egreso</pre>";

if (mysqli_query($conexion, $sql_egreso)) {
    echo "✅ Egreso insertado correctamente.";
} else {
    echo "❌ Error al insertar en egresos: " . mysqli_error($conexion);
}
?>
