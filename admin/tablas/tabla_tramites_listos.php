<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];
$sql3="SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3=mysqli_query($conexion,$sql3);
$var=mysqli_fetch_row($result3);
$id_turno = $var[1];

//Seleccionar el turno para ver el PDF
$sql2="SELECT * FROM turno WHERE TR_ID = '$id_turno'"; 
$result2=mysqli_query($conexion,$sql2);
$var2=mysqli_fetch_row($result2);
$ruta_1 = $var2[5];
$ruta_2 = $var2[6];
$ruta_3 = $var2[7];

$sql="SELECT tramite.*, ips.IPS_NOMBRE
      FROM tramite
      JOIN ips ON tramite.GS_IPS_ASIGNADA = ips.IPS_ID
      WHERE tramite.GS_TURNO = '$id_turno' AND tramite.GS_ESTADO = '5';";

   ?>
   
    <script src="../librerias/alertifyjs/alertify.js"></script>  

<div class="d-sm-flex align-items-center justify-content-between mb-4">
                                 <h1 class="h3 mb-0 text-gray-800">Archivos del Turno <?php echo $id_turno?></h1>
                                    <?php if($ruta_1 == "undefined" || $ruta_1 == ""){}else { 
                                    echo'<a href="../admin/archivospdf/'.$ruta_1.'" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i> Ver PDF 1
                                    </a>';
                                    }?>
                                    <?php if($ruta_2 == "undefined" || $ruta_2 == ""){}else { 
                                    echo'<a href="../admin/archivospdf/'.$ruta_2.'" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i> Ver PDF 2
                                    </a>';
                                    }?>
                                    <?php if($ruta_3 == "undefined" || $ruta_3 == ""){}else { 
                                    echo'<a href="../admin/archivospdf/'.$ruta_3.'" target="_blank" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                                            <i class="fas fa-download fa-sm text-white-50"></i> Ver PDF 3
                                    </a>';
                                    }?>
</div>
<table class="table table-bordered" id="tramiteslistos" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                            <th>Estado</th>
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
                                        <?php if($ver[20]==5){
                                                echo  '<td> <button  data-toggle="modal"  data-target="#entregarmodal" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-orange btn-sm">Lista</button></td>';
                                              }
                                              
                                        ?>
                                       
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
                                            else{if (empty($ver[22])) { echo 'Otros'; } else { echo '<a href="../admin/examenespdf/'.$ver[22].'" target="_blank"> <button data-target="#entregarmodal" type="button" class="btn btn-primary btn-sm">Otro</button> </a>'; }
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
                                            <?php if($ver[20]==1){ 
                                              echo $ver[17];
                                              }elseif($ver[20]==2){
                                                echo 'no disponible';
                                              }elseif($ver[20]==3){
                                                echo $ver[18];
                                              }elseif($ver[20]==5){
                                                echo $ver[19];
                                              }
                                        ?></td>
                                                                                      
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>


