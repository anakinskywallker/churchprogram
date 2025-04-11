<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $autorizacion=1;
    $percontrol=$_POST['percontrol'];
    $observacion=$_POST['observacion'];    
    $fechacontrol=$_POST['fechacontrol'];
    $municipio=$_POST['municipio'];
    $requerimiento=$_POST['requerimiento'];
    $inputips=$_POST['inputips'];
    $tipoautorizacion=$_POST['tipoautorizacion'];
    $idetramite=$_POST['idetramite'];
    $usuario=$_POST['usuario'];
    $estado=1;

    $sql3= " SELECT EMP_APELLIDOS FROM personal WHERE EMP_NOMBRE = '$usuario'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $apellido = $var[0];
    
    $nombreCompleto = $usuario . ' ' . $apellido; 

    $sql4= " SELECT * FROM ips WHERE IPS_NOMBRE = '$inputips'";
    $result4=mysqli_query($conexion,$sql4);
    $ver=mysqli_fetch_row($result4);
    $id_ips = $ver[0];

    $sql="UPDATE tramite SET GS_AUTORIZACION = '$autorizacion', 
                             GS_PERIODO_CONTROL = '$percontrol',
                             GS_OBSERVACIONES = '$observacion',
                             GS_FECHA_CONTROL = '$fechacontrol',
                             GS_MUNICIPIO = '$municipio',
                             GS_REQUERIMIENTOS_CITA = '$requerimiento',
                             GS_IPS_ASIGNADA = '$id_ips', 
                             GS_TIPO_AUTORIZACION = '$tipoautorizacion',
                             GS_AUTORIZADO_POR = '$nombreCompleto',
                             GS_ESTADO = '$estado'                             
                             WHERE GS_ID = '$idetramite'";
    echo $result=mysqli_query($conexion,$sql);
    
?>