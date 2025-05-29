<?php 
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// ✅ Datos recibidos por POST
$id_rubro                             = $_POST['id_rubro'];
$id_tipo_ingreso                      = $_POST['id_tipo_ingreso'];
$bol_matri_nombrenovio                = $_POST['bol_matri_nombrenovio'];
$bol_matri_nombrenovia               = $_POST['bol_matri_nombrenovia'];
$bol_matri_padresnovio               = $_POST['bol_matri_padresnovio'];
$bol_matri_padresnovia               = $_POST['bol_matri_padresnovia'];
$bol_matri_testigouno                = $_POST['bol_matri_testigouno'];
$bol_matri_testigodos                = $_POST['bol_matri_testigodos'];
$bol_matri_infobautisonovio          = $_POST['bol_matri_infobautisonovio'];
$bol_matri_infobautisonovio_fecha    = $_POST['bol_matri_infobautisonovio_fecha'];
$bol_matri_infobautisonovia          = $_POST['bol_matri_infobautisonovia'];
$bol_matri_infobautisonovia_fecha    = $_POST['bol_matri_infobautisonovia_fecha'];
$bol_matri_ministro                  = $_POST['bol_matri_ministro'];
$bol_matri_recibido                  = $_POST['bol_matri_recibido'];
$bol_matri_identificacion            = $_POST['bol_matri_identificacion'];
$bol_matri_celular                   = $_POST['bol_matri_celular'];

// ✅ Obtener valor de la ofrenda
$sql_ofrenda = "SELECT valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$valor_ofrenda = 0;
if ($result_ofrenda && mysqli_num_rows($result_ofrenda) > 0) {
    $fila = mysqli_fetch_assoc($result_ofrenda);
    $valor_ofrenda = $fila['valor_tipo'];
}

// ✅ Insertar en tabla registro
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso,
    nombre_apellido,
    nombre_padre,
    nombre_madre,
    nombre_padrino,
    nombre_madrina,
    informacion_bautismo,
    fecha_nacimiento,
    fecha_muerte,
    ministro
) VALUES (
    '$id_tipo_ingreso',
    '$bol_matri_nombrenovio y $bol_matri_nombrenovia',
    '$bol_matri_padresnovio',
    '$bol_matri_padresnovia',
    '$bol_matri_testigouno',
    '$bol_matri_testigodos',
    'Bautizo Novio: $bol_matri_infobautisonovio ($bol_matri_infobautisonovio_fecha), Bautizo Novia: $bol_matri_infobautisonovia ($bol_matri_infobautisonovia_fecha)',
    '$bol_matri_infobautisonovio_fecha',
    '$bol_matri_infobautisonovia_fecha',
    '$bol_matri_ministro'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion);

    // ✅ Insertar en factura
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
        '$bol_matri_recibido',
        NULL,
        NULL,
        '$bol_matri_celular',
        '$bol_matri_celular',
        NULL,
        '$bol_matri_recibido',
        '$bol_matri_identificacion',
        '$valor_ofrenda',
        NULL,
        '$fecha_actual',
        '$fecha_actual'
    )";

    if (mysqli_query($conexion, $sql_factura)) {
        echo "1"; // ✅ Todo salió bien
    } else {
        echo "Error al insertar en factura: " . mysqli_error($conexion);
    }
} else {
    echo "Error al insertar en registro: " . mysqli_error($conexion);
}
?>
