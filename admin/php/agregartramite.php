<?php 
	require_once "conexion.php";
	$conexion=conexion();
//-----------------------------------------------------------------------------------------------	
    $autorizacion=$_POST['autorizacion'];
    $lugarAtrz=$_POST['lugarAtrz'];
    $percontrol=$_POST['percontrol'];
    $observacion=$_POST['observacion'];    
    $fechacontrol=$_POST['fechacontrol'];
    $municipio=$_POST['municipio'];
    $idcliente=$_POST['idcliente'];    
    $tipotramite=$_POST['tipotramite'];
    $idturno=$_POST['idturno'];
    $requerimiento=$_POST['requerimiento'];
    $inputips=$_POST['inputips'];
    $tipoautorizacion=$_POST['tipoautorizacion'];

    if ($autorizacion == 'NO' ){
        $estado=2;
    }else{
        $estado=1;
    }

    $sql3= " SELECT * FROM ips WHERE IPS_NOMBRE = '$inputips'";
    $result3=mysqli_query($conexion,$sql3);
    $var=mysqli_fetch_row($result3);
    $id_ips = $var[0];
    
 //-------------------
    $sql="INSERT INTO tramite (GS_TURNO, GS_TIPO_TRAMITE, GS_AUTORIZACION, GS_LUGAR_AUTORIZACION, GS_TIPO_AUTORIZACION, GS_PERIODO_CONTROL, GS_FECHA_CONTROL, GS_REQUERIMIENTOS_CITA, GS_OBSERVACIONES, GS_MUNICIPIO, GS_IPS_ASIGNADA, GS_ESTADO) 
                            VALUES ('$idturno','$tipotramite','$estado', '$lugarAtrz', '$tipoautorizacion','$percontrol','$fechacontrol','$requerimiento','$observacion','$municipio','$id_ips','$estado')";
    echo $result=mysqli_query($conexion,$sql);
//------------------------------------------------------------------------------------------------------------------------	
 ?>