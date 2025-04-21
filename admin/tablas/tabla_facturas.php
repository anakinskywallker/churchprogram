<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    $sql="SELECT
    f.id_factura, 
    f.nombre_apellido_contacto,
    f.telefono_contacto,
    ti.nombre_tipo AS nombre_tipo_ingreso,
    ru.nombre AS nombre_rubro,
    f.ofrenda,
    f.fecha_diligenciamiento
FROM 
    factura f
JOIN 
    registro r ON f.id_registro = r.id_registro
LEFT JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
LEFT JOIN 
    rubro ru ON f.id_rubro = ru.id
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
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Rubro</th>
                                            <th>Ofrenda</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mirar</th>
                                        <th>No. Factura</th>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Tipo</th>
                                            <th>Rubro</th>
                                            <th>Ofrenda</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                                                                       
                                        
                                        ?>
                                        <tr>
                                        <td> <button onclick="mostrarTramites('<?php echo $ver[0]?>','<?php echo $_SESSION["nombre_usuario"]?>')"type="button" class="btn btn-secondary btn-sm">Mirar</button></td>
                                            <td><?php echo 'FA'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[3]?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo $ver[5]?></td>
                                            <td><?php echo $ver[6]?></td>                                           
                                            </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>

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
 


