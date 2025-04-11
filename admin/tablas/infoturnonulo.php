<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$usuario = $_SESSION["nombre_usuario"];
?>


<script src="../../librerias/alertifyjs/alertify.js"></script>  
<script src="../js/funciones.js"></script>

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


<script type="text/javascript">
  

