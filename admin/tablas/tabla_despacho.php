<?php 
session_start();
require_once "../php/conexion.php";

if (!isset($_SESSION["nombre_usuario"])) {
    die("Error: Usuario no autenticado.");
}

$usuario = $_SESSION["nombre_usuario"];
$conexion=conexion();
$sqlfechas = "SELECT fecha_inicial, fecha_final FROM buscar WHERE Usuario = '$usuario'";
$resultfecha = mysqli_query($conexion, $sqlfechas);

if (!$resultfecha || mysqli_num_rows($resultfecha) == 0) {
    die("Error: No se encontraron fechas para el usuario.");
}

$rowfecha = mysqli_fetch_row($resultfecha);
    
    $sql="SELECT 
    ti.nombre_tipo AS tipo_ingreso,
    COUNT(f.id_factura) AS cantidad_registros,
    SUM(f.ofrenda) AS total_ofrendas
FROM 
    factura f
INNER JOIN 
    registro r ON f.id_registro = r.id_registro
INNER JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
WHERE 
    f.id_rubro = 1 AND
    DATE(fecha_diligenciamiento) BETWEEN '$rowfecha[0]' AND '$rowfecha[1]'
GROUP BY 
    ti.nombre_tipo
ORDER BY 
    ti.nombre_tipo ASC;
";


    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
<thead>
        <tr>
            <th>Tipo de Ingreso</th>
            <th>Numero</th>
            <th>Total Ofrendas</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $utilidad = 0;
        $result = mysqli_query($conexion, $sql);
        while ($row = mysqli_fetch_assoc($result)) { 
            $utilidad += $row['total_ofrendas'];
        ?>
        <tr>
            <td><?php echo $row['tipo_ingreso']; ?></td>
            <td><?php echo $row['cantidad_registros']; ?></td>
            <td>$ <?php echo number_format($row['total_ofrendas']); ?></td>
        </tr>
        <?php } 
        $sqlin="UPDATE contabilidad SET REP_DESPACHO = '$utilidad '  
                                         WHERE ID_CONTABILIDAD = '2';";
        $resultin=mysqli_query($conexion,$sqlin);?>
    </tbody>
</table>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                Ofrendas Totales <?php
                                                    echo date('Y-m-d', strtotime($rowfecha[0])) . '-' . date('Y-m-d', strtotime($rowfecha[1]));
                                                ?>
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".number_format($utilidad)?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script>
    const usuario = "<?php echo $_SESSION['nombre_usuario']; ?>";
    const fechaInicio = "<?php echo $rowfecha[0]; ?>";
    const fechaFin = "<?php echo $rowfecha[1]; ?>";
</script>

    <!-- Earnings (Monthly) Card Example -->
    <!-- Pending Requests Card Example -->
   
</div>
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
 


