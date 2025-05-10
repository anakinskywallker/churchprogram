<?php 
session_start();
require_once "../php/conexion.php";
$conexion = conexion();

// Asegúrate de que el usuario esté definido en la sesión
if (!isset($_SESSION["nombre_usuario"])) {
    die("Error: Usuario no autenticado.");
}

$usuario = $_SESSION["nombre_usuario"];

// Consulta para obtener las fechas desde la tabla buscar
$sqlfechas = "SELECT fecha_inicial, fecha_final FROM buscar WHERE Usuario = '$usuario'";
$resultfecha = mysqli_query($conexion, $sqlfechas);

if (!$resultfecha || mysqli_num_rows($resultfecha) == 0) {
    die("Error: No se encontraron fechas para el usuario.");
}

$rowfecha = mysqli_fetch_row($resultfecha);

// Consulta principal usando las fechas obtenidas
$sql = "SELECT 
    DATE(fecha_diligenciamiento) AS fecha,
    SUM(ofrenda) AS total_ingresos
FROM 
    factura
WHERE 
    DATE(fecha_diligenciamiento) BETWEEN '$rowfecha[0]' AND '$rowfecha[1]'
    AND id_rubro = 1
GROUP BY 
    DATE(fecha_diligenciamiento)
ORDER BY 
    fecha ASC;";
?>

<script src="js/funciones.js"></script>
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>DIA</th>
            <th>VALOR</th>
            <th>DIA</th>
            <th>VALOR</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $result = mysqli_query($conexion, $sql);
        $rows = [];
        $ofrendas = 0;

        while($row = mysqli_fetch_row($result)){
            $rows[] = $row; // Almacena las filas para procesarlas por pares
            $ofrendas = $ofrendas + $row[1] ;
        }
        $sqlin="UPDATE contabilidad SET REP_DESPACHO = '$ofrendas'  
                                         WHERE ID_CONTABILIDAD = '2';";
                                         $resultin=mysqli_query($conexion,$sqlin);

        $total = count($rows);
        for ($i = 0; $i < $total; $i += 2) {
            echo "<tr>";
            // Primer par
            echo "<td>{$rows[$i][0]}</td>";
            echo "<td>$ " . number_format($rows[$i][1]) . "</td>";

            // Segundo par (si existe)
            if (isset($rows[$i + 1])) {
                echo "<td>{$rows[$i + 1][0]}</td>";
                echo "<td>$ " . number_format($rows[$i + 1][1]) . "</td>";
            } else {
                // Si no hay segundo, deja las celdas vacías
                echo "<td></td><td></td>";
            }

            echo "</tr>";
        }
        ?>
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
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".number_format($ofrendas)?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
 


