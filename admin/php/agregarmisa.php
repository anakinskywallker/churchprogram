<?php 
require_once "conexion.php";
$conexion = conexion();

    date_default_timezone_set('America/Bogota');
    $fecha_actual = date ("Y-m-d H:i:s");

$id_tipo_ingreso    = $_POST['id_tipo_ingreso'];
$id_rubro           = $_POST['id_rubro'];
$misa_nombreofrece  = $_POST['misa_nombreofrece'];
$misa_lugar         = $_POST['misa_lugar'];
$misa_fecha         = $_POST['misa_fecha'];    
$misa_hora          = $_POST['misa_hora'];
$municipio          = $_POST['municipio'];
$misa_intencion     = $_POST['misa_intencion'];

$nombre_contacto     = $_POST['nombre_contacto'];
$identificacion     = $_POST['identificacion'];
$celular_contacto     = $_POST['celular_contacto'];

$sql_ofrenda = "SELECT nombre_tipo, valor_tipo FROM `tipo_ingreso` WHERE id_tipo_ingreso = '$id_tipo_ingreso'";
$result_ofrenda=mysqli_query($conexion,$sql_ofrenda);
$var_ofrenda=mysqli_fetch_row($result_ofrenda);
$valor_ofrenda = $var_ofrenda[1];

$sql_registro = "INSERT INTO `registro` (
    `id_tipo_ingreso`,
    `libro_reg`,
    `folio_reg`,
    `numero_reg`,
    `nombre_apellido`,
    `lugar_nacimiento`,
    `fecha_nacimiento`,
    `fecha_muerte`,
    `edad`,
    `estado_civil`,
    `nombre_conyugue`,
    `nombre_hijos`,
    `nombre_padre`,
    `nombre_madre`,
    `nombre_padrino`,
    `nombre_madrina`,
    `abuelos_paternos`,
    `abuelos_maternos`,
    `fecha_misa`,
    `hora_misa`,
    `lugar_evento`,
    `causa`,
    `ultimos_sacramentos`,
    `ministro`,
    `lugar_bautismo_cnf`,
    `fecha_bautismo_cnf`,
    `informacion_bautismo`,
    `biagrafia`
) VALUES (
    '$id_tipo_ingreso',
    NULL,
    NULL,
    NULL,
    '$misa_nombreofrece',
    '$municipio',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    '$misa_fecha',
    '$misa_hora',
    '$misa_lugar',
    '$misa_intencion',
    NULL,
    NULL,
    NULL,
    NULL,
    NULL,
    NULL
)";
    if (mysqli_query($conexion, $sql_registro)) {
		$id_registro = mysqli_insert_id($conexion); // obtener el ID del registro insertado

		// 2. Insertar en factura
		$sql_factura = "INSERT INTO `factura` (
            `id_rubro`,                `id_registro`,             `nombre_apellido_contacto`, 
            `correo_contacto`,         `direccion_contacto`,      `telefono_contacto`, 
            `celular_contacto`,        `celular_adicional`,       `recibido_de`, 
            `identificacion`,          `ofrenda`,                 `Observacion`, 
            `fecha_ofrenda`,           `fecha_diligenciamiento`
        ) VALUES (
            '$id_rubro',               '$id_registro',            '$nombre_contacto',
            NULL,                      NULL,                      '$celular_contacto',
            '$celular_contacto',       NULL,                      '$nombre_contacto',
            '$identificacion',         '$valor_ofrenda',          NULL,
            '$fecha_actual',           '$fecha_actual'
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


 
 