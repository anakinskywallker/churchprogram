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
    f.nombre_apellido_contacto,
    f.identificacion,
    f.celular_contacto,
    r.fecha_misa,
    r.hora_misa,
    r.lugar_evento,
    r.ministro,
    r.causa,
    f.Observacion,
    f.id_factura
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

<label id="facturaLabel">Numero de factura <?php echo $ver[10]?></label>
<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">

                    
                                      
                                    <thead>
                                       <tr>
                                            <th>Imprimir</th>                                          
                                            <th>Evento</th>
                                            <th>Nombre Contacto</th>
                                            <th>Identificacion</th>
                                            <th>Celular</th>
                                            <th>Fecha_Evento</th>
                                            <th>Hora_evento</th>
                                            <th>Lugar</th>
                                            <th>Ministro</th>
                                            <th>Intencion</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>                                       
                                        <tr>
    <td>
        <button onclick="imprimirMisa(this)" type="button" class="btn btn-secondary btn-sm">Descargar</button>
    </td>
    <td data-label="Evento"><?php echo $ver[0]?></td>
    <td data-label="Nombre Contacto"><?php echo $ver[1]?></td>
    <td data-label="Identificación"><?php echo $ver[2]?></td>
    <td data-label="Celular"><?php echo $ver[3]?></td>
    <td data-label="Fecha Evento"><?php echo $ver[4]?></td>
    <td data-label="Hora Evento"><?php echo $ver[5]?></td>
    <td data-label="Lugar"><?php echo $ver[6]?></td>
    <td data-label="Ministro"><?php echo $ver[7]?></td>
    <td data-label="Intención"><?php echo $ver[8]?></td>
</tr>
    </tbody>
</table>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>
