<?php 
require_once "conexion.php";
$conexion = conexion();


$nombre         = $_POST['nombre'];
$apellido       = $_POST['apellido'];
$lugartrabajo   = $_POST['lugartrabajo'];
$documento      = $_POST['documento'];
$contacto       = $_POST['contacto'];
$nombreUsuario  = $_POST['nombreUsuario'];
$psw            = $_POST['psw'];


$salario    = 0;              

// Construir e insertar
$sql = "INSERT INTO usuarios (
            USR_NOMBRE, 
            USR_APELLIDOS, 
            USR_CEDULA, 
            USR_CELULAR, 
            USR_SALARIO, 
            USR_TIPO, 
            USR_LOGIN_NOMBRE, 
            USR_PASSWORD, 
            USR_ESTADO, 
            USR_LUGAR
        ) VALUES (
            '$nombre',
            '$apellido',
            '$documento',
            '$contacto',
            '$salario',
            1,
            '$nombreUsuario',
            '$psw',
            1,
            '$lugartrabajo'
        )";

     echo $result=mysqli_query($conexion,$sql);
?>


    
//------------------------------------------------------------------------------------------------------------------------	
 ?>
