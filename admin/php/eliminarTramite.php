<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	

    $idetramite=$_POST['idetramite'];
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
                             GS_OBSERVACIONES = '$observacion'                            
                             WHERE GS_ID = '$idetramite'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>