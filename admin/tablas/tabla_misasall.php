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
    r.fecha_misa,
    r.lugar_evento,
    r.hora_misa
FROM 
    factura f
JOIN 
    registro r ON f.id_registro = r.id_registro
LEFT JOIN 
    tipo_ingreso ti ON r.id_tipo_ingreso = ti.id_tipo_ingreso
LEFT JOIN 
    rubro ru ON f.id_rubro = ru.id
WHERE
    r.id_tipo_ingreso < 8
ORDER BY 
    f.fecha_diligenciamiento DESC;
";

    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
                                    <thead>
                                       <tr>
                                        <th>Mirar </th>
                                            <th>No. Factura</th>
                                            <th>Tipo</th>
                                            <th>Ofrenda</th>
                                            <th>Fecha Evento</th>
                                            <th>Lugar</th>
                                            <th>Hora Misa</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mirar</th>
                                        <th>No. Factura</th>
                                            <th>Tipo</th>
                                            <th>Ofrenda</th>
                                            <th>Fecha Evento</th>
                                            <th>Lugar</th>
                                            <th>Hora Misa</th>
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
                                        <td> <button onclick="mostrarTramites('<?php echo $ver[0]?>','<?php echo $_SESSION["nombre_usuario"]?>')"type="button" class="btn btn-secondary btn-sm">Mirar</button></td>
                                            <td><?php echo 'FA'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[3]?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo date("h:i A", strtotime($ver[5])); ?></td>
                                            </tr>
                                        <?php
                                        }
                                        $sqlin="UPDATE contabilidad SET UTIL_TOTAL = '$utilidad'  
                                         WHERE ID_CONTABILIDAD = '1';";
                                         $resultin=mysqli_query($conexion,$sqlin);
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
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Ofrendas Totales</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".$utilidad ?></div>
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
 


