<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$sql = "SELECT 
    e.id_egresos,
    e.nombre_apellido, 
    e.Cedula, 
    e.egreso_celular, 
    te.nombre_tipo_egreso, 
    e.observacion, 
    e.valor_egreso,
    e.fecha_egreso
FROM 
    egresos e
JOIN 
    tipo_egreso te ON e.id_tipo_egreso = te.id_tipo_egreso
WHERE 
    DATE(e.fecha_egreso) = CURDATE()
ORDER BY 
    e.fecha_egreso DESC;
";   
    
    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>Imprimir</th>    
        <th>Egreso</th>
        <th>Nombre y Apellido</th>
        <th>Cédula</th>
        <th>Celular</th>
        <th>Tipo de Egreso</th>
        <th>Observación</th>
        <th>Valor</th>
        <th>Fecha</th>


    </tr>
</thead>
<tfoot>
    <tr>
        <th>Imprimir</th>
        <th>Egreso</th>
        <th>Nombre y Apellido</th>
        <th>Cédula</th>
        <th>Celular</th>
        <th>Tipo de Egreso</th>
        <th>Observación</th>
        <th>Valor</th>
        <th>Fecha</th>
    </tr>
</tfoot>
<tbody>
<?php
$egresos = 0;
$result = mysqli_query($conexion, $sql);
while ($ver = mysqli_fetch_row($result)) {
    $egresos = $egresos + $ver[6];
?>
    <tr>
        <td>Egreso</td>
        <td><?php echo $ver[0] ?></td>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[2] ?></td>
        <td><?php echo $ver[3] ?></td>
        <td><?php echo $ver[4] ?></td>
        <td><?php echo $ver[5] ?></td>
        <td>$ <?php echo number_format($ver[6]) ?></td>
        <td><?php echo $ver[7] ?></td>
    </tr>
<?php
}
?>
                                       
    </tbody>
</table>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-warning text-uppercase mb-1">
                            Egresos Totales <?php echo date('Y-m-d'); ?></div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".number_format($egresos) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>


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
 


