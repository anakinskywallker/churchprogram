<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $inputPago=$_POST['inputPago'];
    $inputPrecio=$_POST['inputPrecio'];
    $usuario=$_POST['usuario'];
    $idcliente=$_POST['idcliente'];    
    $inputDocumentos1=$_POST['inputDocu'];
    $inputDocumentos2=$_POST['inputDocumen'];
    $inputDocumentos3=$_POST['inputDocumentos'];

    if ($inputPago < $inputPrecio ){
        $estado=2;
    }else{
        $estado=1;
    }

    date_default_timezone_set('America/Bogota');
    $fecha_actual = date ("Y-m-d H:i:s");

    $sql3= " SELECT * FROM personal WHERE EMP_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $id_p = $var[0];
 //-------------------
    $sql="INSERT INTO turno (TR_CL_ID, TR_FECHA, TR_PAGO, TR_PRECIO, TR_DOCUMENTOS, TR_DOCUMENTOS_2, TR_DOCUMENTOS_3, TR_EMP_ID, TR_ESTADO) 
                            VALUES ('$idcliente','$fecha_actual','$inputPago', '$inputPrecio','$inputDocumentos1','$inputDocumentos2','$inputDocumentos3','$id_p','$estado')";
    echo $result=mysqli_query($conexion,$sql);
//------------------------------------------------------------------------------------------------------------------------	
 ?>