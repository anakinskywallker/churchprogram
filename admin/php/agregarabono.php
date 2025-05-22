<?php
require_once "conexion.php";
$conexion = conexion();

date_default_timezone_set('America/Bogota');
$fecha_actual = date("Y-m-d H:i:s");

// 1. Recibir datos
$usuario      = $_POST['usuario'];
$id_factura   = $_POST['id_factura'];
$valor_abono  = floatval($_POST['valor_abono']);
$abono_observacion  = $_POST['abono_observacion'];

// 2. Obtener el último saldo actual para esa factura
$sql_ultimo = "SELECT abono_saldo FROM cementerio 
               WHERE id_factura = '$id_factura'
               ORDER BY abono_fecha DESC 
               LIMIT 1";
$result_ultimo = mysqli_query($conexion, $sql_ultimo);
$row_ultimo = mysqli_fetch_assoc($result_ultimo);

$saldo_actual = $row_ultimo ? floatval($row_ultimo['abono_saldo']) : 0;

// 3. Calcular nuevo saldo
$nuevo_saldo = $saldo_actual - $valor_abono;
if ($nuevo_saldo < 0) $nuevo_saldo = 0; // Evitar saldo negativo

// 4. Insertar nuevo abono
$sql_insert = "INSERT INTO cementerio (
                    id_factura,
                    observacion,
                    abono_valor,
                    abono_saldo,
                    abono_fecha
               ) VALUES (
                    '$id_factura',
                    '$abono_observacion',
                    '$valor_abono',
                    '$nuevo_saldo',
                    '$fecha_actual'
               )";

if (mysqli_query($conexion, $sql_insert)) {
    echo 1;
} else {
    echo 0;
}
?>
