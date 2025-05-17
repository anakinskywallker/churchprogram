<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos desde JS
$id_tipo_ingreso       = $_POST['id_tipo_ingreso'];
$id_rubro              = $_POST['id_rubro'];
$res_nombre_ofrece     = $_POST['res_nombre_ofrece'];
$res_lugar             = $_POST['res_lugar'];
$res_fecha             = $_POST['res_fecha'];
$res_hora              = $_POST['res_hora'];
$res_intencion         = $_POST['res_intencion']; 
$res_nombre_contacto   = $_POST['res_nombre_contacto'];
$res_identificacion   = $_POST['res_identificacion'];
$res_celular_contacto  = $_POST['res_celular_contacto'];

// Obtener valor de la ofrenda desde tipo_ingreso
$sql_ofrenda = "SELECT nombre_tipo, valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$var_ofrenda = mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[1];

// Insertar en la tabla registro (ya no se usa id_rubro)
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso,
    nombre_apellido,
    lugar_evento,
    fecha_misa,
    hora_misa,
    causa
) VALUES (
    '$id_tipo_ingreso',
    '$res_nombre_ofrece',
    '$res_lugar',
    '$res_fecha',
    '$res_hora',
    '$res_intencion'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion); // ID del nuevo registro

    // Insertar en la tabla factura
    $sql_factura = "INSERT INTO factura (
        id_rubro,
        id_registro,
        nombre_apellido_contacto,
        correo_contacto,
        direccion_contacto,
        telefono_contacto,
        celular_contacto,
        celular_adicional,
        recibido_de,
        identificacion,
        ofrenda,
        Observacion,
        fecha_ofrenda,
        fecha_diligenciamiento
    ) VALUES (
        '$id_rubro',
        '$id_registro',
        '$res_nombre_contacto',
        NULL,
        NULL,
        '$res_celular_contacto',
        '$res_celular_contacto',
        NULL,
        '$res_nombre_contacto',
        '$res_identificacion',
        '$valor_ofrenda',
        NULL,
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
