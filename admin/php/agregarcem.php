<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos por POST
$id_rubro         = $_POST['id_rubro'];
$id_tipo_ingreso  = $_POST['id_tipo_ingreso'];
$cem_recibido     = $_POST['cem_recibido'];
$cem_cedula       = $_POST['cem_cedula'];
$cem_observacion  = $_POST['cem_observacion'];
$cem_celular      = $_POST['cem_celular'];
$cem_ciudad       = $_POST['cem_ciudad'];

// Obtener nombre y valor del tipo_ingreso
$sql_ofrenda = "SELECT nombre_tipo, valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$var_ofrenda = mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[1];

// Insertar en tabla registro
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso,
    lugar_evento
) VALUES (
    '$id_tipo_ingreso',
    '$cem_ciudad'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion); // ID generado en registro

    // Insertar en factura
    $sql_factura = "INSERT INTO factura (
        id_rubro,
        id_registro,
        telefono_contacto,
        nombre_apellido_contacto,
        identificacion,
        ofrenda,
        Observacion,
        fecha_ofrenda,
        fecha_diligenciamiento
    ) VALUES (
        '$id_rubro',
        '$id_registro',
        '$cem_celular',
        '$cem_recibido',
        '$cem_cedula',
        '$valor_ofrenda',
        '$cem_observacion',
        '$fecha_actual',
        '$fecha_actual'
    )";

    if (mysqli_query($conexion, $sql_factura)) {
        echo "Registro y factura insertados correctamente.";
    } else {
        echo "Error al insertar en factura: " . mysqli_error($conexion);
    }
} else {
    echo "Error al insertar en registro: " . mysqli_error($conexion);
}
?>
