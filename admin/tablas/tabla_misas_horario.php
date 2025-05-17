<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();

$usuario = $_SESSION["nombre_usuario"];
$sqlfechas = "SELECT fecha_inicial, fecha_final FROM buscar WHERE Usuario = '$usuario'";
$resultfecha = mysqli_query($conexion, $sqlfechas);


$rowfecha = mysqli_fetch_row($resultfecha);
    
$where_fecha = date("Y-m-d", strtotime($rowfecha[1])); // convierte DATETIME a DATE

$sql = "SELECT
            f.id_factura,
            ti.nombre_tipo AS nombre_tipo_ingreso,
            f.ofrenda,
            r.fecha_misa,
            r.lugar_evento,
            r.hora_misa,
            r.nombre_apellido,
            r.causa
        FROM 
            factura f
        JOIN 
            registro r ON f.id_registro = r.id_registro
        LEFT JOIN 
            tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
        LEFT JOIN 
            rubro ru ON f.id_rubro = ru.id
        WHERE
            r.id_tipo_ingreso < 8
            AND DATE(r.fecha_misa) = '$where_fecha'
        ORDER BY 
            r.hora_misa ASC, r.lugar_evento ASC";

$result = mysqli_query($conexion, $sql);

$misas = [];

// Agrupamos por fecha + hora + lugar
while ($row = mysqli_fetch_assoc($result)) {
    $clave = $row['fecha_misa'] . '|' . $row['hora_misa'] . '|' . $row['lugar_evento'];

    if (!isset($misas[$clave])) {
        $misas[$clave] = [
            'tipo_ingreso' => $row['nombre_tipo_ingreso'],
            'ofrenda' => $row['ofrenda'],
            'fecha' => $row['fecha_misa'],
            'hora' => $row['hora_misa'],
            'lugar' => $row['lugar_evento'],
            'intenciones' => []
        ];
    }

    $misas[$clave]['intenciones'][] = [
        'nombre' => $row['nombre_apellido'],
        'causa' => $row['causa']
    ];
}
foreach ($misas as $misa) {
    echo "<h3>Misa – " . $misa['fecha'] . " | " . date("g:i A", strtotime($misa['hora'])) . " | " . $misa['lugar'] . "</h3>";
    echo "<p><strong>Tipo:</strong> " . $misa['tipo_ingreso'] . "</p>";
    echo "<p><strong>Intenciones:</strong></p>";
    echo "<ul>";
    foreach ($misa['intenciones'] as $intencion) {
        echo "<li><strong>" . $intencion['nombre'] . "</strong> – " . $intencion['causa'] . "</li>";
    }
    echo "</ul><hr>";
}

 
?>
<script src="js/funciones.js"></script>
