<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $nombreinfo=$_POST['nombreinfo'];
    $usuario=$_POST['usuario'];
    $idetramite=$_POST['idetramite'];
    $estado=$_POST['estado'];

    date_default_timezone_set('America/Bogota');
    $fecha_actual = date ("Y-m-d H:i:s");


    $sql3= " SELECT EMP_APELLIDOS FROM personal WHERE EMP_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $apellido = $var[0];
  
    $sql2= "SELECT T.TR_ID, P.EMP_LUGAR
    FROM turno T
    INNER JOIN personal P ON P.EMP_ID = T.TR_EMP_ID
    INNER JOIN tramite TM ON TM.GS_TURNO = T.TR_ID
    WHERE TM.GS_ID = '$idetramite'";

    $result2=mysqli_query($conexion,$sql2);
    $var2=mysqli_fetch_row($result2);
    $nuevolugar = $var2[1];
    
    $nombreCompleto = $usuario . ' ' . $apellido; 

    $sql="UPDATE tramite SET GS_MUNICIPIO = '$nuevolugar', GS_ESTADO = '$estado', GS_INFORMADO_POR = '$nombreCompleto', GS_NOMBRE_INFORMADO = '$nombreinfo', GS_FECHA_INFORMADO = '$fecha_actual' WHERE GS_ID = '$idetramite'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>