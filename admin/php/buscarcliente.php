<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $cedula=$_POST['cedula'];
    $usuario=$_POST['usuario'];

    $sqlr="DELETE FROM busquedas WHERE USUARIO = '$usuario'";
    $resultr=mysqli_query($conexion,$sqlr);

    $sql1="SELECT CL_ID, CL_NOMBRE FROM clientes WHERE CL_DOCUMENTO = '$cedula'";
    $result4=mysqli_query($conexion,$sql1);    
    $fila = mysqli_fetch_row($result4);
    $ideunico = $fila[0];
    $nombrecliente = $fila[1];

    $sql="INSERT INTO busquedas (ID_UNICO, CEDULA, NOMBRE_CLIENTE, `USUARIO`) 
                            VALUES ('$ideunico','$cedula','$nombrecliente','$usuario')";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>