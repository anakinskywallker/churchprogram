<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    $sql="SELECT
    f.id_factura, 
    f.nombre_apellido_contacto,
    f.identificacion,
    f.telefono_contacto,
    ti.nombre_tipo AS nombre_tipo_ingreso,
    ru.nombre AS nombre_rubro,
    f.ofrenda,
    f.fecha_diligenciamiento,
    f.correo_contacto,
    f.id_registro,
    f.Observacion
FROM 
    factura f
JOIN 
    registro r ON f.id_registro = r.id_registro
LEFT JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
LEFT JOIN 
    rubro ru ON f.id_rubro = ru.id
WHERE r.id_tipo_ingreso IN (8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 20, 21, 22) 
ORDER BY 
    f.fecha_diligenciamiento DESC;";
    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                       <tr>
                                        <th>Mirar </th>
                                            <th>No. Factura</th>
                                            <th>Nombre</th>
                                            <th>Identificacion</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Rubro</th>
                                            <th>Ofrenda</th>
                                            <th>Observacion</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mirar</th>
                                        <th>No. Factura</th>
                                            <th>Nombre</th>
                                            <th>Identificacion</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Rubro</th>
                                            <th>Ofrenda</th>
                                            <th>Observacion</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){                                                                                       
                                        ?>
                                        <tr>
                                        <td> <button onclick="imprimirFila(this)" type="button" class="btn btn-secondary btn-sm">Descargar</button></td>
                                            <td><?php echo 'FA'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[3]?></td>
                                            <td><?php if($ver[9] == 20){echo $ver[8];}else{echo $ver[4];}?></td>                                            
                                            <td><?php echo $ver[5]?></td>
                                            <td><?php echo $ver[6]?></td>
                                            <td><?php echo $ver[10]?></td>    
                                            <td><?php echo $ver[7]?></td>                                             
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>
<script>

</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>



<!-- Plugin AutoTable para jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>


    <script src="../../componentes/vendor/jquery/jquery.min.js"></script>
    <script src="../componentes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../componentes/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../componentes/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../componentes/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../componentes/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../componentes/js/demo/datatables-demo.js"></script>
 


