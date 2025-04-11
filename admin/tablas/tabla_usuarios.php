<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    //$sql2="SELECT * from aux2 WHERE id='1'"; con esta linea se puede discriminar para la parte de contable
    $sql="SELECT * from personal where EMP_ESTADO = '1'";
    
  
?>
<script src="../librerias/alertifyjs/alertify.js"></script>  
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Documento</th>
                                            <th>Celular</th>
                                            <th>Salario</th>
                                            <th>Tipo</th>
                                            <th>Lugar</th>
                                            <th>Nombre Usuario</th>
                                            <th>Suspender</th>

                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $ver[1]?></td>
                                                <td><?php echo $ver[2]?></td>
                                                <td><?php echo $ver[3]?></td>
                                                <td><?php echo $ver[4]?></td>
                                                <td><?php echo $ver[5]?></td>
                                                <td><?php if($ver[6] == 1) {echo 'Administrador';}else{echo 'Gestionador Citas';} ?></td>
                                                <td><?php echo $ver[11]?></td>
                                                <td><?php echo $ver[8]?></td>
                                            <td> <button onclick=" preguntarSiNosuspenderUsuario('<?php echo $ver[0]?>')"type="button" class="btn btn-secondary btn-sm">Suspender</button></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                       
    </tbody>
</table>
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

