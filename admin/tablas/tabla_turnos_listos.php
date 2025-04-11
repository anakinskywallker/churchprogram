<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    $sql="SELECT DISTINCT T.TR_ID, C.CL_DOCUMENTO, T.TR_FECHA, T.TR_PAGO, T.TR_PRECIO, P.EMP_NOMBRE, P.EMP_APELLIDOS, C.CL_MUNICIPIO
    FROM turno T
    INNER JOIN clientes C ON T.TR_CL_ID = C.CL_ID
    INNER JOIN personal P ON P.EMP_ID = T.TR_EMP_ID
    INNER JOIN tramite TM ON TM.GS_TURNO = T.TR_ID
    WHERE (TM.GS_ESTADO = 5 OR TM.GS_ESTADO = 8)
    ORDER BY T.TR_FECHA DESC";
    
  
?>
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr>
                                        <th>Mirar </th>
                                            <th>No. Turno</th>
                                            <th>Cedula Cliente</th>
                                            <th>Municipio</th>
                                            <th>Fecha Creado</th>
                                            <th>Pago</th>
                                            <th>Precio</th>
                                            <th>Creado Por</th>
                                            <th>Pagar Saldo</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                        <th>Mirar</th>
                                        <th>No. Turno</th>
                                            <th>Cedula Cliente</th>
                                            <th>Municipio</th>
                                            <th>Fecha Creado</th>
                                            <th>Pago</th>
                                            <th>Precio</th>
                                            <th>Creado Por</th>
                                            <th>Pagar Saldo</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                            $saldo = $ver[4] - $ver[3];                                          
                                        ?>
                                        <tr>
                                            <td> <button onclick="mostrarTramites('<?php echo $ver[0]?>','<?php echo $_SESSION["nombre_usuario"]?>')"type="button" class="btn btn-secondary btn-sm">Mirar</button></td>
                                            <td><?php echo 'TR'.$ver[0]?></td>
                                            <td><?php echo $ver[1]?></td>
                                            <td><?php echo $ver[7]?></td>
                                            <td><?php echo $ver[2]?></td>
                                            <td><?php echo $ver[3]?></td>
                                            <td><?php echo $ver[4]?></td>
                                            <td><?php echo $ver[5]; echo ' '.$ver[6];?></td>
                                            <td><?php if($saldo > 0) {echo '<button onclick="pagarSaldoTramites('.$ver[4].','.$ver[0].')"type="button" class="btn btn-secondary btn-sm">Pagar Saldo</button>';}else{echo '<button class="btn btn-secondary-green btn-sm">Cancelado</button>';}?></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
    </tbody>
</table>
 <!-- Page level plugins -->
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
    <script type="text/javascript">
    
