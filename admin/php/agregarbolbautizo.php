<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Datos recibidos por POST desde JS
$id_rubro                    = $_POST['id_rubro'];
$id_tipo_ingreso            = $_POST['id_tipo_ingreso'];
$bol_ba_nombre_y_apellido   = $_POST['bol_ba_nombre_y_apellido'];
$bol_ba_lugar_nacimiento    = $_POST['bol_ba_lugar_nacimiento'];
$bol_ba_fecha_nacimiento    = $_POST['bol_ba_fecha_nacimiento'];
$bol_ba_nombre_padre        = $_POST['bol_ba_nombre_padre'];
$bol_ba_nombre_madre        = $_POST['bol_ba_nombre_madre'];
$bol_ba_nombre_padrino      = $_POST['bol_ba_nombre_padrino'];
$bol_ba_nombre_madrina      = $_POST['bol_ba_nombre_madrina'];
$bol_ba_abuelos_paternos    = $_POST['bol_ba_abuelos_paternos'];
$bol_ba_abuelos_maternos    = $_POST['bol_ba_abuelos_maternos'];
$bol_ba_ministro_bautizo    = $_POST['bol_ba_ministro_bautizo'];
$bol_ba_recibido            = $_POST['bol_ba_recibido'];
$bol_ba_identificacion      = $_POST['bol_ba_identificacion'];
$ent_ultimos_sacramentos    = $_POST['ent_ultimos_sacramentos'];
$bol_ba_celular             = $_POST['bol_ba_celular'];

// Obtener valor de la ofrenda desde tipo_ingreso
$sql_ofrenda = "SELECT nombre_tipo, valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$var_ofrenda = mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[1];

// Insertar en la tabla registro
$sql_registro = "INSERT INTO registro (
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
    ultimos_sacramentos,
    ministro
) VALUES (
    '$id_tipo_ingreso',
    '$bol_ba_nombre_y_apellido',
    '$bol_ba_lugar_nacimiento',
    '$bol_ba_fecha_nacimiento',
    '$bol_ba_nombre_padre',
    '$bol_ba_nombre_madre',
    '$bol_ba_nombre_padrino',
    '$bol_ba_nombre_madrina',
    '$bol_ba_abuelos_paternos',
    '$bol_ba_abuelos_maternos',
    '$ent_ultimos_sacramentos',
    '$bol_ba_ministro_bautizo'
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
        '$bol_ba_recibido',
        NULL,
        NULL,
        '$bol_ba_celular',
        '$bol_ba_celular',
        NULL,
        '$bol_ba_recibido',
        '$bol_ba_identificacion',
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
