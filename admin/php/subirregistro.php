<?php
require_once "conexion.php";
$conexion = conexion();

$id_registro = $_POST['id_registro'];
$libro       = $_POST['mod_libro'];
$folio       = $_POST['mod_folio'];
$num_reg     = $_POST['mod_num_reg'];

$sql = "UPDATE registro SET 
            libro_reg = '$libro',
            folio_reg = '$folio',
            numero_reg = '$num_reg'
        WHERE id_registro = '$id_registro'";

if (mysqli_query($conexion, $sql)) {
    echo 1;
} else {
    echo 0;
}
?>
