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
$cem_nomtip       = $_POST['cem_nomtip'];

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
        celular_adicional, 
        nombre_apellido_contacto,
        identificacion,
        ofrenda,
        Observacion,
        fecha_ofrenda,
        fecha_diligenciamiento,
        correo_contacto
    ) VALUES (
        '$id_rubro',
        '$id_registro',
        '$cem_celular',
        '$valor_ofrenda',
        '$cem_recibido',
        '$cem_cedula',
        '$valor_ofrenda',
        '$cem_observacion',
        '$fecha_actual',
        '$fecha_actual',
        '$cem_nomtip'
    )";

    if (mysqli_query($conexion, $sql_factura)) {
        $id_factura = mysqli_insert_id($conexion); // ID generado en factura

        // Calcular saldo
        $abono_valor = floatval($valor_ofrenda);
        $abono_saldo = floatval($valor_ofrenda) - $abono_valor;

        // Insertar en cementerio
        $sql_cementerio = "INSERT INTO cementerio (
            id_factura,
            observacion,
            abono_valor,
            abono_saldo,
            abono_fecha
        ) VALUES (
            '$id_factura',
            '$cem_observacion',
            '$abono_valor',
            '$abono_saldo',
            '$fecha_actual'
        )";

        if (mysqli_query($conexion, $sql_cementerio)) {
            echo "Registro, factura y abono insertados correctamente.";
        } else {
            echo "Error al insertar en cementerio: " . mysqli_error($conexion);
        }

    } else {
        echo "Error al insertar en factura: " . mysqli_error($conexion);
    }

} else {
    echo "Error al insertar en registro: " . mysqli_error($conexion);
}
?>
