<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();

$usuario = $_SESSION["nombre_usuario"];
$conexion=conexion();
$sqlfechas = "SELECT fecha_inicial, fecha_final FROM buscar WHERE Usuario = '$usuario'";
$resultfecha = mysqli_query($conexion, $sqlfechas);


$rowfecha = mysqli_fetch_row($resultfecha);
    
$where_fecha = date("Y-m-d", strtotime($rowfecha[1])); // convierte DATETIME a DATE

$sql = "SELECT
    f.id_factura,
    ti.nombre_tipo AS nombre_tipo_ingreso,
    f.ofrenda,
    c.abono_valor,
    c.abono_saldo,
    f.fecha_diligenciamiento
FROM 
    factura f
JOIN (
    SELECT c1.*
    FROM cementerio c1
    INNER JOIN (
        SELECT id_factura, MAX(abono_fecha) AS ultima_fecha
        FROM cementerio
        GROUP BY id_factura
    ) c2 ON c1.id_factura = c2.id_factura AND c1.abono_fecha = c2.ultima_fecha
) c ON f.id_factura = c.id_factura
LEFT JOIN 
    registro r ON f.id_registro = r.id_registro
LEFT JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
LEFT JOIN 
    rubro ru ON f.id_rubro = ru.id
WHERE
    f.id_rubro = 5
    AND c.abono_saldo > 0
ORDER BY 
    f.fecha_diligenciamiento DESC;
";

    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
                                    <thead>
                                       <tr>
                                            <th>Mirar</th>
                                            <th>Abonar</th>
                                            <th>No. Factura</th>
                                            <th>Tipo</th>
                                            <th>Ofrenda</th>
                                            <th>Ultimo Abono</th>
                                            <th>Saldo</th>
                                            <th>Fecha Diligenciamiento</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Mirar</th>
                                            <th>Abonar</th>
                                            <th>No. Factura</th>
                                            <th>Tipo</th>
                                            <th>Ofrenda</th>
                                            <th>Ultimo Abono</th>
                                            <th>Saldo</th>
                                            <th>Fecha Diligenciamiento</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $utilidad = 0;
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                            $utilidad= $ver[2] + $utilidad;                                                                                       
                                        ?>
                                        <tr>
                                        <td> <button onclick="mostrarTramites('<?php echo $ver[0]?>','<?php echo $_SESSION["nombre_usuario"]?>')"type="button" class="btn btn-primary btn-sm">Mirar</button></td>
                                        <td>
                                            <button onclick="agregaform('<?php echo $ver[0]?>')"type="submit" href="#hacerabono" data-toggle="modal" class="btn btn-primary btn-sm">Abonar</button>
                                        </td> 
                                        <td><?php echo 'FA'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[3]?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo $ver[5]?></td>
                                            </tr>
                                        <?php
                                        }
                                        $sqlin="UPDATE contabilidad SET UTIL_TOTAL = '$utilidad'  
                                         WHERE ID_CONTABILIDAD = '1';";
                                         $resultin=mysqli_query($conexion,$sqlin);
                                        ?>
                                       
    </tbody>
</table>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

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
 


