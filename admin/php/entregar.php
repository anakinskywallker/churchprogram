<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $usuario=$_POST['usuario'];
    $idetramite=$_POST['idetramite'];
    $estado=$_POST['estado'];

    date_default_timezone_set('America/Bogota');
    $fecha_actual = date ("Y-m-d H:i:s");

    $sql3= " SELECT EMP_APELLIDOS FROM personal WHERE EMP_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $apellido = $var[0];
    
    $nombreCompleto = $usuario . ' ' . $apellido; 

    $sql="UPDATE tramite SET GS_ESTADO = '$estado', GS_INFORMADO_POR = '$nombreCompleto', GS_FEHCA_ENTREGADO = '$fecha_actual' WHERE GS_ID = '$idetramite'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>