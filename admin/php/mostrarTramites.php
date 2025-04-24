<?php 

	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $ide=$_POST['id'];
    $nombre_usuario=$_POST['nus'];

    $sqlr="DELETE FROM auxsg WHERE USUARIO = '$nombre_usuario'";
    $result=mysqli_query($conexion,$sqlr);
    $sql="INSERT into auxsg (NUMERO_TURNO,USUARIO)
								values ('$ide','$nombre_usuario')";
    echo $result3=mysqli_query($conexion,$sql);
//------------------------------------------------------------------------------------------------------------------------	
 ?>