<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $nombreprofecional=$_POST['nombreprofecional'];
    $idetramite=$_POST['idetramite'];
    $fechacita=$_POST['fechacita'];
    $horacita=$_POST['horacita'];
    $usuario=$_POST['usuario'];
    $estado=$_POST['estado'];
    $observacion=$_POST['observacion'];

    $sql3= " SELECT EMP_APELLIDOS FROM personal WHERE EMP_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $apellido = $var[0];
    
    $nombreCompleto = $usuario . ' ' . $apellido; 

    $sql="UPDATE tramite SET GS_ESTADO = '$estado', 
                             GS_GESTIONADO_POR = '$nombreCompleto',
                             GS_NOMBRE_PROFECIONAL = '$nombreprofecional', 
                             GS_FECHA_DE_CITA = '$fechacita',
                             GS_OBSERVACIONES = '$observacion', 
                             GS_HORA_CITA = '$horacita'                             
                             WHERE GS_ID = '$idetramite'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>