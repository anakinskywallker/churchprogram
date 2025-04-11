<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];

$sql3="SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3=mysqli_query($conexion,$sql3);
$var=mysqli_fetch_row($result3);
$id_turno = $var[1];

$sql4= "SELECT EMP_ID, EMP_LUGAR FROM personal WHERE EMP_NOMBRE = '$nombre_usuario'";
    $result4=mysqli_query($conexion,$sql4);
    $res=mysqli_fetch_row($result4);
    $id_p = $res[0];
    $lugar_p = $res[1];

$sql="SELECT tramite.*, ips.IPS_NOMBRE
      FROM tramite
      JOIN ips ON tramite.GS_IPS_ASIGNADA = ips.IPS_ID
      WHERE tramite.GS_TURNO = '$id_turno' AND (tramite.GS_ESTADO = '8' AND tramite.GS_MUNICIPIO = '$lugar_p');";

   ?>
   
    <script src="../librerias/alertifyjs/alertify.js"></script>  
<table class="table table-bordered" id="tramiteslistos" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                            <th>Estado</th>
                                            <th>Fecha_entregado</th>
                                            <th>Tipo Tramite</th>
                                            <th>Tipo_Autorizacion</th>
                                            <th>Periodo Control</th>
                                            <th>Fecha_control</th>
                                            <th>Requerimientos Cita</th>
                                            <th>Observaciones</th>
                                            <th>Municipio</th>
                                            <th>IPS</th>
                                            <th>Nombre Profecional</th>
                                            <th>Fecha_de_Cita</th>
                                            <th>Hora_Cita</th>
                                            <th>Informado_a</th>
                                            <th>Tramitador</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                        
                                        ?>
                                        <tr>
                                        <?php if($ver[20]==8){
                                                echo  '<td> <div  type="button" class=" btn-secondary-green btn-sm">Entregado</div></td>';
                                              }
                                              
                                        ?>
                                           <td><?php echo $ver[21]?></td>
                                           <td>
                                              <?php 
                                            if ($ver[2]==1){echo 'Cita';}
                                            elseif($ver[2]==2)
                                            {
                                                echo '
                                              <a href="../admin/examenespdf/'.$ver[22].'" target="_blank">
                                                  <button  data-target="#entregarmodal" type="button" class="btn btn-primary btn-sm">Examen</button>
                                              </a>
                                              ';  
                                            }
                                            elseif($ver[2]==3){echo 'Medicamentos'; }
                                            else{
                                              if($ver[22] == ""){echo 'Otros';  
                                              }else{echo  ' <a href="../admin/examenespdf/'.$ver[22].'" target="_blank">
                                                            <button  data-target="#entregarmodal" type="button" class="btn btn-primary btn-sm">Otro</button>
                                                            </a>';
                                              }
                                            }?>
                                            </td> 
                                            
                                            
                                            <td><?php echo $ver[5]?></td>
                                            <td><?php echo $ver[6]?></td>
                                            <td><?php if($ver[7] == "0000-00-00"){echo 'no disponible'; }else{echo $ver[7];}?></td>
                                            <td><?php echo $ver[8]?></td>
                                            <td><?php echo $ver[9]?></td>
                                            <td><?php if ($ver[3]==1){echo $ver[10];}else{echo 'No disponible'; }?></td>
                                            <td><?php if ($ver[3]==2 || $ver[2]==4){echo 'No disponible'; }else{ echo $ver[23];}?></td>
                                            <td><?php echo $ver[12]?></td>
                                            <td><?php echo $ver[13]?></td>                                            
                                            <td><?php echo $ver[14]?></td>
                                            <td><?php echo $ver[16]?></td>
                                            <td>
                                            <?php if($ver[20]==8){ 
                                              echo $ver[19];
                                              }
                                        ?></td>
                                                                                      
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>


