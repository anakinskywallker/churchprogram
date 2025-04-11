<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$usuario = $_SESSION["nombre_usuario"];
?>

<script src="../../librerias/alertifyjs/alertify.js"></script>  
<script src="../js/funciones.js"></script>
</script>
                                <?php 
                                $sql= " SELECT * FROM informacion";
                                $result=mysqli_query($conexion,$sql);
                                while($ver=mysqli_fetch_row($result)){
                                        $sql3= " SELECT * FROM personal WHERE EMP_ID = '$ver[3]'";
                                        $result3=mysqli_query($conexion,$sql3);
                                        $var=mysqli_fetch_row($result3);
                                        $nombre = $var[1]." ".$var[2];
                                ?>
                        <div class="card-body">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                        <p><?php echo $nombre?></p>
                        <p class="mb-0"><?php echo $ver[1]?></p>
                        <button onclick="eliminariformacion('<?php echo $ver[0]?>')" type="button" class="btn btn-secondary btn-sm">Eliminar</button>
                        </div>
                        <p class="mb-0"><?php echo $ver[2]?></p>
                        </div>
                        <?php
                        }
                        ?>
                  <!-- Bootstrap core JavaScript-->
    <script src="../../componentes/vendor/jquery/jquery.js"></script>
    <script src="../../componentes/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    

    <!-- Core plugin JavaScript-->
    <script src="../../componentes/vendor/jquery-easing/jquery.easing.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../componentes/js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="../../componentes/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../../componentes/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Page level custom scripts -->
    <script src="../../componentes/js/demo/datatables-demo.js"></script>

