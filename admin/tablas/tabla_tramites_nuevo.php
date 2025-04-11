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
    <div class="d-sm-flex align-items-center justify-content-end mb-4">
    <button type="submit" href="#agregarotro" onclick="terminarTurno()"class="btn btn-primary-green">Nuevo Turno</button>
</div>

<table class="table table-bordered" id="tramitesnuevos" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                            
                                            <th>Tipo Tramite</th>
                                            <th>Autorizada</th>
                                            <th>Lugar Autorizacion</th>
                                            <th>Tipo_Autorizacion</th>
                                            <th>Periodo Control</th>
                                            <th>Fecha_control</th>
                                            <th>Requerimientos Cita</th>
                                            <th>Observaciones</th>
                                            <th>Municipio</th>
                                            <th>IPS</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                        
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
                                            <td><?php echo $ver[10]?></td>
                                            <td><?php  
                                            if ($ver[2]==4 || $ver[3]==2){echo 'No aplica';}
                                            else{echo $ver[23];}?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>
