<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];
$sql3="SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3=mysqli_query($conexion,$sql3);
$var=mysqli_fetch_row($result3);
$id_turno = $var[1];

$sql2="SELECT 
    ti.nombre_tipo AS nombre_tipo_ingreso,
    ru.nombre AS nombre_rubro,
    r.*
   
FROM 
    factura f
JOIN 
    registro r ON f.id_registro = r.id_registro
LEFT JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
LEFT JOIN 
    rubro ru ON f.id_rubro = ru.id
WHERE 
    f.id_factura = '$id_turno'
ORDER BY 
    f.fecha_diligenciamiento DESC    
"; 
$result2=mysqli_query($conexion,$sql2);
$ver=mysqli_fetch_row($result2);

   ?>
   
<script src="../librerias/alertifyjs/alertify.js"></script>  


<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr> 
                                         
                                            <th>Tipo_Tramite</th>
                                            <th>libro_registro</th>
                                            <th>Folio_registro</th>
                                            <th>Numero_registro</th>
                                            <th>Nombre_Apellido</th>
                                            <th>Lugar_nacimiento</th>
                                            <th>Fecha_nacimiento</th>
                                            <th>Fecha_muerte</th>
                                            <th>Edad</th>
                                            <th>Estado_Civil</th>
                                            <th>Nombre_Conyugue</th>
                                            <th>Nombre_Hijos</th>
                                            <th>Nombre_padre</th>
                                            <th>Nombre_madre</th>
                                            <th>Nombre_padrino</th>
                                            <th>Nombre_madrina</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>                                       
                                        <tr>                                    
                                    
                                           
                                           
                                            <td><?php echo $ver[0]?></td>
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
                                            <td><?php echo $ver[17]?></td>
                                            <td><?php echo $ver[18]?></td>
                                            <td><?php echo $ver[19]?></td>                                             
                                                                                   
                                        </tr>
                                       
                                       
    </tbody>
</table>
