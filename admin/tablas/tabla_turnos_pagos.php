<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    $sql="SELECT DISTINCT T.TR_ID, C.CL_DOCUMENTO, T.TR_FECHA, T.TR_PAGO, T.TR_PRECIO, P.EMP_NOMBRE, P.EMP_APELLIDOS
    FROM turno T
    INNER JOIN clientes C ON T.TR_CL_ID = C.CL_ID
    INNER JOIN personal P ON P.EMP_ID = T.TR_EMP_ID
    INNER JOIN tramite TM ON TM.GS_TURNO = T.TR_ID
    WHERE T.TR_PAGO = T.TR_PRECIO
    ORDER BY T.TR_FECHA ASC;
    ";
    
    
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr>
                                        
                                            <th>No. Turno</th>
                                            <th>Cedula Cliente</th>
                                            <th>Fecha Creado</th>
                                            <th>Precio</th>
                                            <th>Creado Por</th>
                                            <th>Pagar Saldo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        
                                        <th>No. Turno</th>
                                            <th>Cedula Cliente</th>
                                            <th>Fecha Creado</th>
                                            <th>Precio</th>
                                            <th>Creado Por</th>
                                            <th>Pagar Saldo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $count = 0;
                                       
                                        $utilidad = 0;
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                            $utilidad= $ver[4] + $utilidad; 
                                            $count = $count + 1; 
                                        ?>
                                        <tr>
                                            <td><?php echo 'TR'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo $ver[5]; echo ' '.$ver[6];?></td>
                                            <td><?php echo '<button class="btn btn-secondary-green btn-sm">Cancelado</button>';?></td>
                                        </tr>
                                        <?php
                                        }
                                         $sqlin="UPDATE contabilidad SET UTIL_TOTAL = '$utilidad',
                                         NUM_PAGAS = '$count'    
                                         WHERE ID_CONTABILIDAD = '1';";
                                         $resultin=mysqli_query($conexion,$sqlin);
                                        ?>
                                       
    </tbody>
</table>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Utilidad por turnos Pagos </div>
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
    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Total de turnos Pagos </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800" id="sumaTotalElemento"><?php echo $count ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
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
 


