<?php
require_once "conexion.php";
$conexion = conexion();

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    $sql = "UPDATE usuarios SET USR_ESTADO = 2 WHERE USR_ID = '$id'";

    if (mysqli_query($conexion, $sql)) {
        echo 1; // Éxito
    } else {
        echo 0; // Error al ejecutar
    }
} else {
    echo 0; // No se recibió el ID
}
?>
