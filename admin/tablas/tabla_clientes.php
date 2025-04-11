<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    //$sql2="SELECT * from aux2 WHERE id='1'"; con esta linea se puede discriminar para la parte de contable
    $sql="SELECT * from clientes";
    
  
?>
<script src="../librerias/alertifyjs/alertify.js"></script>  
<script src="js/funciones.js"></script>
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
                                      
    <thead>
                                       <tr>
                                        <th>Editar </th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>T.Documento</th>
                                            <th>Numero</th>
                                            <th>Fecha_Nacimiento</th>
                                            <th>RH</th>
                                            <th>Estado Civil</th>
                                            <th>Escolaridad</th>
                                            <th>Muncipio</th>
                                            <th>Barrio</th>
                                            <th>Acudiente</th>
                                            <th>Nombre Mamá</th>
                                            <th>Contacto</th>
                                            <th>Contacto_2</th>
                                            <th>EPS</th>
                                            <th>Regimen</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $result=mysqli_query($conexion,$sql);
                                        while($ver=mysqli_fetch_row($result)){ 

                                            $datos=$ver[0]."||".
                                            $ver[1]."||".
                                            $ver[2]."||".
                                            $ver[3]."||".    
                                            $ver[4]."||".
                                            $ver[5]."||".
                                            $ver[6]."||".
                                            $ver[7]."||".
                                            $ver[8]."||".
                                            $ver[9]."||".
                                            $ver[10]."||".
                                            $ver[11]."||".
                                            $ver[12]."||".
                                            $ver[13]."||".
                                            $ver[14]."||".
                                            $ver[15]."||".
                                            $ver[16];
                                        
                                        ?>
                                        <tr>
                                    </a>
                                            <td> <button data-toggle="modal" data-target="#modcliente" onclick="agregaformCliente('<?php echo $datos?>')" type="button" class="btn btn-secondary btn-sm">Editar</button></td>
                                            <td><?php echo $ver[1]?></td>
                                                <td><?php echo $ver[2]?></td>
                                                <td><?php echo $ver[3]?></td>
                                                <td><?php echo $ver[4]?></td>
                                                <td><?php echo $ver[5]?></td>
                                                <td><?php if ($ver[6] == "null" ) {echo " ";} else{echo $ver[6];}?></td>
                                                <td><?php if ($ver[7] == "null" ) {echo " ";} else{echo $ver[7];}?></td>
                                                <td><?php if ($ver[8] == "null" ) {echo " ";} else{echo $ver[8];}?></td>
                                                <td><?php echo $ver[9]?></td>
                                                <td><?php echo $ver[10]?></td>
                                                <td><?php echo $ver[11]?></td>
                                                <td><?php echo $ver[12]?></td>
                                                <td><?php echo $ver[13]?></td>
                                                <td><?php echo $ver[14]?></td>
                                                <td><?php echo $ver[15]?></td>
                                                <td><?php echo $ver[16]?></td>
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

