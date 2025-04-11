<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];

$sql3="SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3=mysqli_query($conexion,$sql3);
$var=mysqli_fetch_row($result3);
$id_turno = $var[1];
$sql4="SELECT TR_CL_ID FROM turno WHERE TR_ID = '$id_turno'"; 
$result4=mysqli_query($conexion,$sql4);
$var2=mysqli_fetch_row($result4);
$id_usuario = $var2[0];
$sql="SELECT * FROM clientes WHERE CL_ID = '$id_usuario' ";
   ?>
   
<script src="../librerias/alertifyjs/alertify.js"></script>  
 <table class="table table-bordered" id="dataTableCliente" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr>
                                          
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>TD.</th>
                                            <th>Cedula</th>
                                            <th>Fecha_de_nacimiento</th>
                                            <th>RH</th>
                                            <th>Estado Civil</th>
                                            <th>Escolaridad</th>
                                            <th>Municipio</th>
                                            <th>Barrio</th>
                                            <th>Nombre acudiente</th>
                                            <th>Nombre Madre</th>
                                            <th>Telefono</th>
                                            <th>Telefono_2</th>
                                            <th>EPS</th>
                                            <th>Regimen</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                        
                                        ?>
                                        <tr>
                                  
                                                <td><?php echo $ver[1]?></td>
                                                <td><?php echo $ver[2]?></td>
                                                <td><?php echo $ver[3]?></td>
                                                <td><?php echo $ver[4]?></td>
                                                <td><?php echo $ver[5]?></td>
                                                <td><?php echo $ver[6]?></td>
                                                <td><?php echo $ver[7]?></td>
                                                <td><?php echo $ver[8]?></td>
                                                <td><?php echo $ver[9]?></td>
                                                <td><?php echo $ver[10]?></td>
                                                <td><?php echo $ver[11]?></td>
                                                <td><?php echo $ver[12]?></td>
                                                <td><?php echo $ver[13]?></td>
                                                <td><?php echo $ver[14]?></td>
                                                <td><?php echo $ver[15]?></td>
                                                <td><?php echo $ver[16]?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>

