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

    $sqlofrendas="SELECT 
    SUM(ofrenda) AS total_ofrendas
    FROM 
    factura
    WHERE 
    id_rubro = 4
    AND DATE(fecha_diligenciamiento) BETWEEN '$rowfecha[0]' AND '$rowfecha[1]';
    ";
    $resultofrendas = mysqli_query($conexion, $sqlofrendas);  

    $aux = mysqli_fetch_row($resultofrendas);
    $ofrendas = $aux[0];  

    $sql = "SELECT * FROM `contabilidad` WHERE ID_CONTABILIDAD = 2";
    $result = mysqli_query($conexion, $sql);  
    $ver = mysqli_fetch_row($result);  

    $total = $ver[1] + $ver[2] + $ver[3] + $ofrendas;
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Locales Parroquiales</th>
            <th>$ <?php echo number_format($ver[1]); ?></th>
        </tr>
        <tr>
            <th>Despacho</th>
            <th>$ <?php echo number_format($ver[2]); ?></th>
        </tr>
        <tr>
            <th>Otros Ingresos</th>
            <th>$ <?php echo number_format($ver[3]); ?></th>
        </tr>
        <tr>
            <th>Ofrendas</th>
            <th>$ <?php echo number_format($ofrendas); ?></th>
        </tr>
    </thead>
</table>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                                Total <?php
                                                    echo date('Y-m-d', strtotime($rowfecha[0])) . '-' . date('Y-m-d', strtotime($rowfecha[1]));
                                                ?>
                            </div>
                            <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".number_format($total)?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
 


