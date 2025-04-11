<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	

    $idusuario=$_POST['id'];

    $sql="UPDATE personal SET EMP_ESTADO = '2'                            
                             WHERE EMP_ID = '$idusuario'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>