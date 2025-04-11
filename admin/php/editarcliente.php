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
    $idcliente=$_POST['idcliente'];


    $sql="UPDATE clientes SET CL_NOMBRE = '$nombrecliente',
     CL_APELLIDO = '$apellidocliente',
     CL_TIPO_DOCUMENTO = '$tipocedula',
    CL_EPS = '$epscl',
    CL_RH = '$rhcl',
    CL_ESCOLARIDAD = '$escolaridad',
    CL_ESTADO_CIVIL = '$estadocivil',
    CL_MUNICIPIO = '$municipio',
    CL_DOCUMENTO = '$documento',
    CL_BARRIO = '$barrio',
    CL_NOMBRE_ACUDIENTE = '$acudiente',
    CL_NOMBRE_MADRE = '$madre',
    CL_CONTACTO1 = '$contacto1',
    CL_CONTACTO2 = '$contacto2',
    CL_REGIMEN = '$regimen',
    CL_FECHA_NACIMIENTO = '$fechanaci'
          WHERE CL_ID = '$idcliente';";
    echo $result=mysqli_query($conexion,$sql);
    
//------------------------------------------------------------------------------------------------------------------------	
 ?>
