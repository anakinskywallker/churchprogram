<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	

    $id=$_POST['id'];
    $sql="DELETE FROM informacion WHERE ID_INFORMACION = '$id'";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?> 