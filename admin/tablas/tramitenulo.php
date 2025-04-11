<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];

$sql3= " SELECT * FROM personal WHERE EMP_NOMBRE = '$nombre_usuario'";
                                $result3=mysqli_query($conexion,$sql3);
                                $var=mysqli_fetch_row($result3);
                                $id_p = $var[0];
 
                                $sqlr="SELECT * FROM turno WHERE TR_EMP_ID = '$var[0]' ORDER BY TR_ID DESC LIMIT 1";
                                $result=mysqli_query($conexion,$sqlr);
                                $fila = mysqli_fetch_row($result);                                         
                                $id_turno = $fila[0];

$sql="SELECT tramite.*, ips.IPS_NOMBRE
      FROM tramite
      JOIN ips ON tramite.GS_IPS_ASIGNADA = ips.IPS_ID
      WHERE tramite.GS_TURNO = '$id_turno';";

   ?>
   
    <script src="../librerias/alertifyjs/alertify.js"></script>  
   
</div>

<table class="table table-bordered" id="tramitesnuevos" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                            
                                            <th>Tipo Tramite</th>
                                            <th>Autorizada</th>
                                            <th>Lugar Autorizacion</th>
                                            <th>Tipo_Autorizacion</th>
                                            <th>Periodo Control</th>
                                            <th>Fecha control</th>
                                            <th>Requerimientos Cita</th>
                                            <th>Observaciones</th>
                                            <th>Municipio</th>
                                            <th>IPS</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        
                                       
    </tbody>
</table>
