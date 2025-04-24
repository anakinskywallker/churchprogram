<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $nombre=$_POST['nombre'];
    $apellido=$_POST['apellido'];
    $tipousuario=$_POST['tipousuario'];
    $lugartrabajo=$_POST['lugartrabajo'];
    $documento=$_POST['documento'];
    $contacto=$_POST['contacto'];
    $salario=$_POST['salario'];
    $nombreUsuario=$_POST['nombreUsuario'];
    $psw=$_POST['psw'];

    $sql="INSERT INTO personal (EMP_NOMBRE, EMP_APELLIDOS, EMP_CEDULA, EMP_CELULAR, EMP_SALARIO, EMP_TIPO, EMP_LOGIN_NOMBRE, EMP_PASSWORD, EMP_ESTADO, EMP_LUGAR) 
                            VALUES ('$nombre','$apellido','$documento','$contacto','$salario','$tipousuario','$nombreUsuario','$psw','1','$lugartrabajo')";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>
