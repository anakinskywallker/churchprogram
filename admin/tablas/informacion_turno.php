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
                                $sql3= " SELECT * FROM personal WHERE EMP_NOMBRE = '$usuario'";
                                $result3=mysqli_query($conexion,$sql3);
                                $var=mysqli_fetch_row($result3);
                                $id_p = $var[0];
 
                                        $sqlr="SELECT * FROM turno WHERE TR_EMP_ID = '$var[0]' ORDER BY TR_ID DESC LIMIT 1";
                                        $result=mysqli_query($conexion,$sqlr);
                                        $fila = mysqli_fetch_row($result);                                         
                                        $saldo = $fila[4] - $fila[3];

                                $sql2= " SELECT * FROM clientes WHERE CL_ID = '$fila[1]'";
                                $result2=mysqli_query($conexion,$sql2);
                                $var2=mysqli_fetch_row($result2);
                                ?>

                <div class="row">
                       <!-- Content Column -->
                       <div class="col-lg-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Datos turno actual </h6> 
                                    </div>
                                        
                                <div class="card-body"> <!-- area de ingreso de datos -->
                                        <ul class="list-inline">
                                        <li class="list-inline-item"><strong>Identificador turno :</strong></li>
                                        <li class="list-inline-item"><?php echo 'TR'.$fila[0];?></li>
                                        <li class="list-inline-item"><strong>Creado Por :</strong></li>
                                        <li class="list-inline-item"><?php echo $usuario;?></li>
                                        <li class="list-inline-item"><strong>Fecha :</strong></li>
                                        <li class="list-inline-item"><?php echo $fila[2];?></li>
                                        </ul>
                                        
                                        <ul class="list-inline">
                                        <?php if($fila[9]==2){?>
                                        <li class="list-inline-item"><strong>Saldo:</strong></li>
                                        <li class="list-inline-item"><?php echo '$'.$saldo;?></li>
                                        <?php }?>
                                        <li class="list-inline-item"><strong>Nombre Cliente :</strong></li>
                                        <li class="list-inline-item"><?php echo $var2[1].' '.$var2[2];?></li>
                                        </ul>
                                        <ul class="list-inline">                                        
                                        </ul>
                                </div>

                                <div class="col-12">
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Agendar Cita</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Retiro Examenes</button>
                                        <button type="submit" href="#retiromed" data-toggle="modal" class="btn btn-primary">Retiro Medicamentos</button>
                                        <button type="submit" href="#agregarotro" data-toggle="modal" class="btn btn-primary">Otro Tramite</button>   
                                </div>
                                <div class="card-body"> <!-- area de ingreso de datos -->
                        

                                    
                                </div>                                 
                            </div>
                        </div>
                </div>
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
  

$(document).ready(function(){
    $('#agregartrm').click(function(){
    idcliente = '<?php echo $fila[1] ?>';     
    idturno =  '<?php echo $fila[0] ?>';
    usuario = '<?php echo $usuario?>';
    tipotramite = 1;
    creartramite(idcliente, tipotramite, idturno) 
    });
    $('#retiroexamenes').click(function(){
    idcliente = '<?php echo $fila[1] ?>';     
    idturno =  '<?php echo $fila[0] ?>';
    usuario = '<?php echo $usuario?>';
    tipotramite = 2;
    creartramiteexam(idcliente, tipotramite, idturno) 
    });
    $('#retiromedicamentos').click(function(){
    idcliente = '<?php echo $fila[1] ?>';     
    idturno =  '<?php echo $fila[0] ?>';
    usuario = '<?php echo $usuario?>';
    tipotramite = 3;
    creartramitemed(idcliente, tipotramite, idturno) 
    });
    $('#otrotramite').click(function(){
    idcliente = '<?php echo $fila[1] ?>';     
    idturno =  '<?php echo $fila[0] ?>';
    usuario = '<?php echo $usuario?>';
    tipotramite = 4;
    creartramiteotro(idcliente, tipotramite, idturno) 
    });
 });
</script>
