<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos por POST
$id_rubro                   = $_POST['id_rubro'];
$id_tipo_ingreso           = $_POST['id_tipo_ingreso'];
$bol_con_parroquia         = $_POST['bol_con_parroquia'];
$bol_con_nombre_y_apellido = $_POST['bol_con_nombre_y_apellido'];
$bol_con_lugar_bautizo     = $_POST['bol_con_lugar_bautizo'];
$bol_con_fecha_bautismo    = $_POST['bol_con_fecha_bautismo'];
$bol_con_bautismo_libro    = $_POST['bol_con_bautismo_libro'];
$bol_con_fecha_confirmacion= $_POST['bol_con_fecha_confirmacion'];
$bol_con_nombre_padre      = $_POST['bol_con_nombre_padre'];
$bol_con_nombre_madre      = $_POST['bol_con_nombre_madre'];
$bol_con_ministro          = $_POST['bol_con_ministro'];
$bol_con_nombre_contacto   = $_POST['bol_con_recibido'];
$bol_con_identificacion    = $_POST['bol_con_identificacion'];
$bol_con_celular           = $_POST['bol_con_celular'];

// Obtener valor de la ofrenda
$sql_ofrenda = "SELECT nombre_tipo, valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$var_ofrenda = mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[1];

// Insertar en tabla registro
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso,
    lugar_evento,
    nombre_apellido,
    lugar_bautismo_cnf,
    fecha_bautismo_cnf,
    nombre_padre,
    fecha_misa,
    nombre_madre,
    informacion_bautismo,
    ministro
) VALUES (
    '$id_tipo_ingreso',
    '$bol_con_parroquia',
    '$bol_con_nombre_y_apellido',
    '$bol_con_lugar_bautizo',
    '$bol_con_fecha_bautismo',
    '$bol_con_nombre_padre',
    '$bol_con_fecha_confirmacion',
    '$bol_con_nombre_madre',
    '$bol_con_bautismo_libro',
    '$bol_con_ministro'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion); // Obtener ID del registro

    // Insertar en factura
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
        '$bol_con_nombre_contacto',
        NULL,
        NULL,
        '$bol_con_celular',
        '$bol_con_celular',
        NULL,
        '$bol_con_nombre_contacto',
        '$bol_con_identificacion',
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
