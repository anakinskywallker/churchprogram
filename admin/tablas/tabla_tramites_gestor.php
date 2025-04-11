<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];

$sql2= " SELECT EMP_ID, EMP_LUGAR FROM personal WHERE EMP_NOMBRE = '$nombre_usuario'";
$result2=mysqli_query($conexion,$sql2);
$var2=mysqli_fetch_row($result2);
$id_p = $var2[0];
$lugar_p = $var2[1];


$sql3="SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3=mysqli_query($conexion,$sql3);
$var=mysqli_fetch_row($result3);
$id_turno = $var[1];

$sql1="SELECT * FROM turno WHERE TR_ID = '$id_turno'"; 
$result1=mysqli_query($conexion,$sql1);
$var1=mysqli_fetch_row($result1);
$ruta_1 = $var1[5];
$ruta_2 = $var1[6];
$ruta_3 = $var1[7];

$sql="SELECT tramite.*, ips.IPS_NOMBRE
FROM tramite
JOIN ips ON tramite.GS_IPS_ASIGNADA = ips.IPS_ID
WHERE tramite.GS_TURNO = '$var[1]' AND
    ((tramite.GS_ESTADO = '2' AND tramite.GS_LUGAR_AUTORIZACION = '$var2[1]') OR
    (tramite.GS_ESTADO <> '2' AND tramite.GS_MUNICIPIO = '$var2[1]')) AND
    (tramite.GS_ESTADO = '1' OR tramite.GS_ESTADO = '2' OR tramite.GS_ESTADO = '3' OR tramite.GS_ESTADO = '4' OR tramite.GS_ESTADO = '7'  OR tramite.GS_ESTADO = '9');";
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
<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                            <th>Estado</th>
                                            <th>Tipo Tramite</th>
                                            <th>Autorizacion</th>
                                            <th>Lugar_Autorizacion</th>
                                            <th>Tipo_Autorizacion</th>
                                            <th>Periodo Control</th>
                                            <th>Fecha_control</th>
                                            <th>Requerimientos Cita</th>
                                            <th>Observaciones</th>
                                            <th>Municipio</th>
                                            <th>IPS</th>
                                            <th>Nombre Profecional</th>
                                            <th>Fecha_de_Cita</th>
                                            <th>Fecha_lista_de Espera</th>
                                            <th>Hora_Cita</th>
                                            <th>Tramitador</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                        
                                        ?>
                                        <tr>
                                        <?php 
                                        if($ver[2]==1){
                                          if($ver[20]==1){ 
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesGestionar"  onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-orange btn-sm">Gestionar</button></td>';
                                          }elseif($ver[20]==2){
                                            echo  '<td> <button  data-toggle="modal"  data-target="#tramitesAutorizar" onclick="agregaform('.$ver[0].')"   type="button" class="btn btn-secondary-dark-orange btn-sm">Ges_Auto</button></td>';
                                          }elseif($ver[20]==3 ){
                                            echo  '<td> <button  data-toggle="modal"  data-target="#tramitesInformar"  onclick="agregaform('.$ver[0].')"   type="button" class="btn btn-secondary-green btn-sm">Informar</button></td>';
                                          }elseif($ver[20]==4){
                                            echo  '<td> <button  data-toggle="modal"  data-target="#tramitesQsuspendidad" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-red btn-sm">Espera</button></td>';
                                          }elseif($ver[20]==7){
                                            echo  '<td> <button  data-toggle="modal"  data-target="#tramitesAutorizar" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-red-slou btn-sm">Cam_Auto</button></td>';
                                          }elseif($ver[20]==9){
                                            echo  '<td> <button  data-toggle="modal"  data-target="#tramitesGestionar"  onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-purple btn-sm">Lista de Espera</button></td>';
                                          }else{
                                            echo  '<td> <button  data-toggle="modal"  data-target="#lista" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary btn-sm">Lista</button></td>';
                                          }
                                    }elseif($ver[2]==2){
                                        if($ver[20]==1 || $ver[20]==2){ 
                                          echo  '<td> <button  data-toggle="modal"  data-target="#gestionarexamenes"  onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-orange btn-sm">Gestionar</button></td>';
                                        }elseif($ver[20]==4){
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesQsuspendidad" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-red btn-sm">Espera</button></td>';
                                        }else{
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesInformar"  onclick="agregaform('.$ver[0].')"   type="button" class="btn btn-secondary-green btn-sm">Informar</button></td>';
                                        }
                                    }elseif($ver[2]==3){
                                        if($ver[20]==1 || $ver[20]==2){ 
                                          echo  '<td> <button  data-toggle="modal"  data-target="#gestionarmedicamentos"  onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-orange btn-sm">Gestionar</button></td>';
                                        }elseif($ver[20]==4){
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesQsuspendidad" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-red btn-sm">Espera</button></td>';
                                        }else{
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesInformar"  onclick="agregaform('.$ver[0].')"   type="button" class="btn btn-secondary-green btn-sm">Informar</button></td>';
                                        }
                                    }
                                    elseif($ver[2]==4){
                                        if($ver[20]==1 || $ver[20]==2){ 
                                          echo  '<td> <button  data-toggle="modal"  data-target="#gestionarotro"  onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-orange btn-sm">Gestionar</button></td>';
                                        }elseif($ver[20]==4){
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesQsuspendidad" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary-red btn-sm">Espera</button></td>';
                                        }else{
                                          echo  '<td> <button  data-toggle="modal"  data-target="#tramitesInformar"  onclick="agregaform('.$ver[0].')"   type="button" class="btn btn-secondary-green btn-sm">Informar</button></td>';
                                        }
                                    }
                                    ?>
                                           
                                           <td>
                                              <?php 
                                            if ($ver[2]==1){echo 'Cita';}
                                            elseif($ver[2]==2){echo 'Examenes'; }
                                            elseif($ver[2]==3){echo 'Medicamentos'; }
                                            else{echo 'Otros';}?>
                                            </td> 
                                            <td><?php if ($ver[3]==1){echo 'Si';}else{echo 'No'; }?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo $ver[5]?></td>
                                            <td><?php echo $ver[6]?></td>
                                            <td><?php if($ver[7] == "0000-00-00"){echo 'no disponible'; }else{echo $ver[7];}?></td>
                                            <td><?php echo $ver[8]?></td>
                                            <td><?php echo $ver[9]?></td>
                                            <td><?php if ($ver[3]==1){echo $ver[10];}else{echo 'No disponible'; }?></td>
                                            <td><?php if ($ver[3]==2 || $ver[2]==4){echo 'No disponible'; }else{ echo $ver[23];}?></td>
                                            <td><?php echo $ver[12]?></td>
                                            <td><?php if ($ver[20]==9){echo 'No disponible';}else{echo $ver[13]; }?></td>
                                            <td><?php if ($ver[20]==9){echo ''.$ver[13];}else{echo 'No disponible'; }?></td>                                            
                                            <td><?php echo $ver[14]?></td>
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
                                        <?php if($ver[2]==1){
                                          echo '<td> <button  data-toggle="modal"  data-target="#accionescitasGes" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary btn-sm">Acciones</button></td>';
                                        }else{
                                          echo '<td> <button  data-toggle="modal"  data-target="#accionesotrosGes" onclick="agregaform('.$ver[0].')" type="button" class="btn btn-secondary btn-sm">Acciones</button></td>';
                                        }
                                        ?>
                                            
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>
