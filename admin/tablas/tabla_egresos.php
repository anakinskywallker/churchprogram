<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    
    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead>
    <tr>
        <th>N° Egreso</th>
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
        <th>N° Egreso</th>
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
$sql = "SELECT e.id_egresos, te.nombre_tipo_egreso, e.nombre_apellido, e.egreso_celular, e.Cedula, e.fecha_egreso, e.observacion, e.valor_egreso
FROM egresos e
JOIN tipo_egreso te ON e.id_tipo_egreso = te.id_tipo_egreso ORDER BY e.fecha_egreso DESC;";
$result = mysqli_query($conexion, $sql);
while ($ver = mysqli_fetch_row($result)) {
?>
    <tr>
        <td><?php echo 'EG' . $ver[0] ?></td>
        <td><?php echo $ver[2] ?></td>
        <td><?php echo $ver[4] ?></td>
        <td><?php echo $ver[3] ?></td>
        <td><?php echo $ver[1] ?></td>
        <td><?php echo $ver[6] ?></td>
        <td>$<?php echo number_format($ver[7]) ?></td>
        <td><?php echo $ver[5] ?></td>
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
 


