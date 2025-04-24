<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $informacion=$_POST['informacion'];
    $usuario=$_POST['usuario'];

    date_default_timezone_set('America/Bogota');
    $fecha_actual = date ("Y-m-d H:i:s");

    $sql3= " SELECT * FROM usuarios WHERE USR_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $id_p = $var[0];
 //-------------------
    $sql="INSERT INTO informacion (FECHA_CREADO, INFORMACION, CREADOR) 
                            VALUES ('$fecha_actual','$informacion', '$id_p')";
    echo $result=mysqli_query($conexion,$sql);
//------------------------------------------------------------------------------------------------------------------------	
 ?> 