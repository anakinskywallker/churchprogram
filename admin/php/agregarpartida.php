<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos por POST
$id_rubro                = $_POST['id_rubro'];
$id_tipo_ingreso         = $_POST['id_tipo_ingreso'];
$partida_observacion     = $_POST['partida_observacion'];
$partida_recibido        = $_POST['partida_recibido'];
$partida_identificacion  = $_POST['partida_identificacion'];
$partida_con_celular     = $_POST['partida_con_celular'];

// Obtener valor de la ofrenda
$sql_ofrenda = "SELECT valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$var_ofrenda = mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[0];

// Insertar en tabla registro (puedes agregar más columnas si lo deseas)
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso
) VALUES (
    '$id_tipo_ingreso'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion); // ID generado en registro

    // Insertar en factura
    $sql_factura = "INSERT INTO factura (
        id_rubro,
        id_registro,
        telefono_contacto,
        celular_contacto,
        nombre_apellido_contacto,
        identificacion,
        ofrenda,
        Observacion,
        fecha_ofrenda,
        fecha_diligenciamiento
    ) VALUES (
        '$id_rubro',
        '$id_registro',
        '$partida_con_celular',
        '$partida_con_celular',
        '$partida_recibido',
        '$partida_identificacion',
        '$valor_ofrenda',
        '$partida_observacion',
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
