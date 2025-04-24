<?php 
require_once "conexion.php";
$conexion = conexion();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Habilita errores claros

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// Recibir variables
$nombre_difunto         = $_POST['ent_nombre_difunto'];
$fecha_muerte           = $_POST['ent_fecha_muerte'];
$edad                   = $_POST['ent_edad'];
$fecha_misa             = $_POST['ent_fecha_misa'];
$hora_misa              = $_POST['ent_hora_misa'];
$lugar_funeral          = $_POST['ent_lugar_del_funeral'];
$nombre_padre           = $_POST['ent_nombre_padre'];
$nombre_madre           = $_POST['ent_nombre_madre'];
$causa_muerte           = $_POST['ent_causa_de_muerte'];
$estado_civil           = $_POST['ent_estado_civil'];
$nombre_conyugue        = $_POST['ent_nombre_conyugue'];
$nombre_hijos           = $_POST['ent_nombre_hijos'];
$ultimos_sacramentos    = $_POST['ent_ultimos_sacramentos'];
$biografia              = $_POST['ent_biografia'];
//$telefono_contacto      = $_POST['ent_telefono'];
$nombre_contacto        = $_POST['ent_nombre_contacto'];
$identificacion         = $_POST['ent_identificacion'];
$celular_contacto       = $_POST['ent_celular_contacto'];

// Datos auxiliares fijos (debes validar si los obtienes por POST)
$id_tipo_ingreso = $_POST['id_tipo_ingreso'];
$id_rubro = $_POST['id_rubro'] ; // rubro asociado al tipo de ingreso

// Obtener valor de ofrenda
$sql_ofrenda = "SELECT valor_tipo FROM tipo_ingreso WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda = mysqli_query($conexion, $sql_ofrenda);
$valor_ofrenda = ($row = mysqli_fetch_row($result_ofrenda)) ? $row[0] : 0;

// Insertar en registro
$sql_registro = "INSERT INTO registro (
    id_tipo_ingreso, nombre_apellido, fecha_muerte, edad, estado_civil, 
    nombre_conyugue, nombre_hijos, nombre_padre, nombre_madre, causa,
    ultimos_sacramentos, fecha_misa, hora_misa, lugar_evento, biagrafia
) VALUES (
    '$id_tipo_ingreso', '$nombre_difunto', '$fecha_muerte', '$edad', '$estado_civil',
    '$nombre_conyugue', '$nombre_hijos', '$nombre_padre', '$nombre_madre', '$causa_muerte',
    '$ultimos_sacramentos', '$fecha_misa', '$hora_misa', '$lugar_funeral', '$biografia'
)";

if (mysqli_query($conexion, $sql_registro)) {
    $id_registro = mysqli_insert_id($conexion);

    // Insertar en factura
    $sql_factura = "INSERT INTO factura (
        id_rubro, id_registro, nombre_apellido_contacto, correo_contacto,
        direccion_contacto, telefono_contacto, celular_contacto, celular_adicional,
        recibido_de, identificacion, ofrenda, Observacion,
        fecha_ofrenda, fecha_diligenciamiento
    ) VALUES (
        '$id_rubro', '$id_registro', '$nombre_contacto', NULL,
        NULL, '$celular_contacto', '$celular_contacto', NULL,
        '$nombre_contacto', '$identificacion', '$valor_ofrenda', NULL,
        '$fecha_actual', '$fecha_actual'
    )";

    if (mysqli_query($conexion, $sql_factura)) {
        echo "✅ Registro y factura guardados correctamente.";
    } else {
        echo "❌ Error al guardar factura: " . mysqli_error($conexion);
    }
} else {
    echo "❌ Error al guardar registro: " . mysqli_error($conexion);
}
?>



 
 