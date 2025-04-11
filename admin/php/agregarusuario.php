<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $nombrecliente=$_POST['nombrecliente'];
    $apellidocliente=$_POST['apellidocliente'];
    $tipocedula=$_POST['tipocedula'];
    $epscl=$_POST['epscl'];
    $rhcl=$_POST['rhcl'];
    $escolaridad=$_POST['escolaridad'];
    $estadocivil=$_POST['estadocivil'];
    $municipio=$_POST['municipio'];
    $documento=$_POST['documento'];
    $barrio=$_POST['barrio'];
    $acudiente=$_POST['acudiente'];
    $madre=$_POST['madre'];
    $contacto1=$_POST['contacto1'];
    $contacto2=$_POST['contacto2'];
    $regimen=$_POST['regimen'];
    $fechanaci=$_POST['fechanaci'];


    $sql="INSERT INTO clientes (CL_NOMBRE, CL_APELLIDO, CL_TIPO_DOCUMENTO, CL_DOCUMENTO, CL_FECHA_NACIMIENTO, CL_RH, CL_ESTADO_CIVIL, CL_ESCOLARIDAD, CL_MUNICIPIO, CL_BARRIO, CL_NOMBRE_ACUDIENTE, CL_NOMBRE_MADRE, CL_CONTACTO1, CL_CONTACTO2, CL_EPS, CL_REGIMEN) 
                            VALUES ('$nombrecliente','$apellidocliente','$tipocedula','$documento','$fechanaci','$rhcl','$estadocivil','$escolaridad','$municipio','$barrio','$acudiente','$madre','$contacto1','$contacto2','$epscl','$regimen')";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>
