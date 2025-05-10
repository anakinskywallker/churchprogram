<?php 
require_once "conexion.php";
$conexion = conexion();

// Datos recibidos por POST
$usuario       = $_POST['usuario'];
$fecha_inicial = $_POST['fecha_inical'];
$fecha_final   = $_POST['fecha_final'];

// Inserta o actualiza si el usuario ya existe
$sql = "INSERT INTO buscar (
    fecha_inicial,
    fecha_final,
    Usuario
) VALUES (
    '$fecha_inicial',
    '$fecha_final',
    '$usuario'
) ON DUPLICATE KEY UPDATE 
    fecha_inicial = VALUES(fecha_inicial),
    fecha_final   = VALUES(fecha_final)";

if (mysqli_query($conexion, $sql)) {
    echo "1";
} else {
    echo "0";
}
?>
