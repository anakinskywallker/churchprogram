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
    f.id_factura,
    f.nombre_apellido_contacto,
    f.identificacion,
    f.celular_contacto,
    f.correo_contacto,
    f.direccion_contacto,
    f.recibido_de,
    f.celular_adicional,
    f.Observacion,
    ti.nombre_tipo AS nombre_tipo_ingreso,
    ru.nombre AS nombre_rubro
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
    f.fecha_diligenciamiento DESC;
"; 
$result2=mysqli_query($conexion,$sql2);
$ver=mysqli_fetch_row($result2);

   ?>
   
<script src="../librerias/alertifyjs/alertify.js"></script>  




<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
                                    <thead>
                                       <tr> 
                                         
                                            <th>Id_Factura</th>
                                            <th>Nombre_contacto</th>
                                            <th>Identificacion</th>
                                            <th>Celular</th>
                                            <th>Correo</th>
                                            <th>Direccion</th>
                                            <th>Recibido de</th>
                                            <th>Celular_adicional</th>
                                            <th>Observaciones</th>
                                            <th>Tipo</th>
                                            <th>Rubro</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>                                       
                                        <tr>                                    
                                    
                                           
                                           
                                            <td><?php echo $ver[0]?></td>
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
                                                                                   
                                        </tr>
    </tbody>
</table>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
