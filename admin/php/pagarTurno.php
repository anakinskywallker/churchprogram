<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $pago=$_POST['pago'];
    $id=$_POST['id'];

 //-------------------
    $sql="UPDATE turno SET TR_PAGO='$pago' WHERE TR_ID = '$id'";
    echo $result=mysqli_query($conexion,$sql);
//------------------------------------------------------------------------------------------------------------------------	
 ?>