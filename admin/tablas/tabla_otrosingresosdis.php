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
    f.id_factura,
    f.correo_contacto,
    f.nombre_apellido_contacto,
    f.Observacion ,
    f.telefono_contacto,
    f.fecha_diligenciamiento,
    f.ofrenda
FROM 
    factura f
INNER JOIN 
    registro r ON f.id_registro = r.id_registro
INNER JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
WHERE 
    id_rubro IN (3, 4, 5, 6)
    AND DATE(fecha_diligenciamiento) BETWEEN '$rowfecha[0]' AND '$rowfecha[1]'
ORDER BY 
    fecha_diligenciamiento ASC;";
?>

<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
                                    <thead>
                                       <tr>
                                            <th>Tipo </th>
                                            <th>Factura </th>
                                            <th>Nombre</th>
                                            <th>Observacion</th>
                                            <th>Telefono</th>
                                            <th>Fecha</th>
                                            <th>Ofrenda</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Tipo</th>
                                            <th>Factura </th>
                                            <th>Nombre</th>
                                            <th>Observacion</th>
                                            <th>Telefono</th>
                                            <th>Fecha</th>
                                            <th>Ofrenda</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $utilidad = 0;
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                            $utilidad= $ver[6] + $utilidad;                                                                                       
                                        ?>
                                        <tr>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo 'FA'.$ver[0]?></td>
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
 


