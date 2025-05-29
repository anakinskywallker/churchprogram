<?php 
session_start();
require_once "php/conexion.php";
$conexion=conexion();
if ($_SESSION["nombre_usuario"] == null)
{
echo '<!DOCTYPE html>
<html>
<head>
    <title>Error de Sesión</title>
</head>
<body>
    <h1>Error de Sesión</h1>
    <p>No tienes permiso para acceder a esta página. Por favor, inicia sesión con una cuenta válida.</p>
</body>
</html>
';
}else{
$usuario = $_SESSION["nombre_usuario"];
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registro</title>

    <!-- Custom fonts for this template -->
    <link href="../componentes/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../componentes/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">

    
    <script src="js/funciones.js"></script>
    <script src="../librerias/bootstrap/js/bootstrap.js"></script>
    <script src="../librerias/alertifyjs/alertify.js"></script>  

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!------------------------------------------------------- Sidebar ----------------------------------------------------->
        <ul class="navbar-nav bg-login sidebar sidebar-dark accordion" id="accordionSidebar">

        </ul>
        <!------------------------------------------------------- End of Sidebar ------------------------------------------------------->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-bar-ges topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar buscar -->

                
                   

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - buscar Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="buscarDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-buscar fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="buscarDropdown">
                                <form class="form-inline mr-auto w-100 navbar-buscar">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="buscar for..." aria-label="buscar"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-buscar fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a  href="#" data-toggle="modal" data-target="#logoutModal" class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION["nombre_usuario"]?></span>
                                <img class="img-profile rounded-circle"
                                    src="../componentes/img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                       
<!---------------------------------------------------- Ingreso Missa ---------------------------------------------------------->
          
            
<!-------------------------------------------------------- Boletas ------------------------------------------------------------>
<div class="container-fluid">
                   <div class="row">
                       <!-- Content Column -->
                       <div class="col-md-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Boletas </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#regbautizo" data-toggle="modal" class="btn btn-primary">Registrar Bautizo</button>
                                        <button type="submit" href="#regprimeracomunion" data-toggle="modal" class="btn btn-primary">Registrar Comunión</button>
                                        <button type="submit" href="#regconfirmacion" data-toggle="modal" class="btn btn-primary">Registrar Confirmación</button>
                                        <button type="submit" href="#regmatrimonio" data-toggle="modal" class="btn btn-primary">Registrar Matrimonio</button>  
                                </div>
                                                                 
                            </div>
                        </div>
                    </div>
            </div>
           
<!------------------------------------------------------- Tabla ------------------------------------------------------------> 

            <div class="card shadow mb-4">
                        <div class="card-header py-3 d-flex justify-content-between align-items-center">
                             <h5 class="m-0 font-weight-bold text-primary">Registros</h5>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_registro" class="table-responsive">                                
                            </div>
                        </div>
            </div>
            <!------------------------------------------------ Mas Datos Facturas -------------------------------------------->  
            
<!------------------------------------------------------- Termina pagina centro ------------------------------------------------------------> 
         
        </div>
            <!-- Footer -->
            <footer class="sticky-footer bg-white-brownd">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; QCodely 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cerrar sesion es muy importante, ¡Nos vemos despues!</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Seleccione "Cerrar Sesion" para cerrar Despacho</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="../cerrar_sesion.php">Cerrar Sesion</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../componentes/vendor/jquery/jquery.js"></script>
    <script src="../componentes/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    

    <!-- Core plugin JavaScript-->
    <script src="../componentes/vendor/jquery-easing/jquery.easing.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../componentes/js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="../componentes/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../componentes/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Page level custom scripts -->
    <script src="../componentes/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
    $('#tabla_registro').load('tablas/tabla_registro.php');
    $('#accordionSidebar').load('tablas/accordionSidebar.php');
    $(document).ready(function(){
    $('#regagregarbautizo').click(function(){ 
        regagregarbautizo()
    });   
    });

    $(document).ready(function(){
    $('#regagregarprimera').click(function(){       
        regagregarprimera()
    });   
    });

    $(document).ready(function(){
    $('#regagregarconfirma').click(function(){       
        regagregarconfirma()
    });   
    });
    $(document).ready(function(){
    $('#regagregarmatri').click(function(){       
        regagregarmatri()
    });   
    });
    
    $(document).ready(function(){
    $('#modificar').click(function(){
        subirregistro();
    });  
    });

</script>

<!---------------------------------------------------Modal agregar misa------------------------------------------------------------------>


<!---------------------------------------------------Modal agregar misa------------------------------------------------------------------>

</body>
</html>

<!---------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="regbautizo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Bautizo</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="mx-5">Los campos en rojo son obligatorios</h6>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">
                                 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_lugar_nacimiento" class="form-control  " placeholder="Lugar de nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" id="reg_ba_fecha_nacimiento" class="form-control  " placeholder="Fecha nacimiento " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_nombre_padrino" class="form-control  " placeholder="Nombre padrino" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_nombre_madrina" class="form-control  " placeholder="Nombre madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_abuelos_paternos" class="form-control  " placeholder="Abuelos paternos" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_abuelos_maternos" class="form-control  " placeholder="Abuelos maternos" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_ministro_bautizo" class="form-control  " placeholder="Ministro de bautizo" required>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------ Datos del registro ------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_libro" class="form-control  " placeholder="Libro" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_folio" class="form-control  " placeholder="Folio" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_ba_numero_reg" class="form-control  " placeholder="Numero Registro" required>
                                    </div>
                                </div>
                            </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>                                                     
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="regagregarbautizo" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>                                        
                                        Registrar
                                        </button>                                   
                                </div>
                            </div>
                            
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>

<!------------------------------------------------------modal primera comunion-------------------------------------------------------------------------------->
<div class="modal fade" id="regprimeracomunion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Primera Comunión</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="mx-5">Los campos en rojo son obligatorios</h6>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">
                                 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_lugar_nacimiento" class="form-control  " placeholder="Lugar de nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" id="reg_pri_fecha_nacimiento" class="form-control  " placeholder="Fecha nacimiento " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_nombre_padrino" class="form-control  " placeholder="Nombre padrino" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_nombre_madrina" class="form-control  " placeholder="Nombre madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_ministro" class="form-control  " placeholder="Ministro" required>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------ Datos del registro ------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_libro" class="form-control  " placeholder="Libro" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_folio" class="form-control  " placeholder="Folio" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_pri_numero_reg" class="form-control  " placeholder="Numero Registro" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="regagregarprimera" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>                                        
                                        Registrar
                                        </button>                                   
                                </div>
                            </div>
                            
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
<!----------------------------------------------------------modal confirmacion------------------------------------------------------------------------------->
<div class="modal fade" id="regconfirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Confirmación</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="mx-5">Los campos en rojo son obligatorios</h6>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">

                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_parroquia" class="form-control  " placeholder="Parroquia" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_lugar_bautizo" class="form-control  " placeholder="Lugar de bautismo" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de bautismo</label>
                                        <input type="date" id="reg_con_fecha_bautismo" class="form-control  " placeholder="Fecha de bautismo " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_informacion_bautizo" class="form-control  " placeholder="Informacion de Bautizo" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de confirmación</label>
                                        <input type="date" id="reg_con_fecha_confirmacion" class="form-control  " placeholder="Fecha de confirmación " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_nombre_padrino_madrina" class="form-control  " placeholder="Nombre padrino o madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_ministro" class="form-control  " placeholder="Ministro" required>
                                    </div>
                                </div>                               
                                
                                <h6 class="mx-5">------------------ Datos del registro -------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_libro" class="form-control  " placeholder="Libro" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_folio" class="form-control  " placeholder="Folio" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="reg_con_numero_reg" class="form-control  " placeholder="Numero Registro" required>
                                    </div>
                                </div>
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="regagregarconfirma" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>                                        
                                        Registrar
                                        </button>                                   
                                </div>
                            </div>
                            
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
<!---------------------------------------------------Modal matrimonio --------------------------------------------------------->
<div class="modal fade" id="regmatrimonio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Matrimonio</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="mx-5">Los campos en rojo son obligatorios</h6>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">

                                  <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_parroquia" class="form-control  " placeholder="Parroquia" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_lugar_bautizo" class="form-control  " placeholder="Lugar de bautismo" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de bautismo</label>
                                        <input type="date" id="bol_con_fecha_bautismo" class="form-control  " placeholder="Fecha de bautismo " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" id="bol_con_bautismo_libro" class="form-control  " placeholder="Bautismo (libro y folio) " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de confirmación</label>
                                        <input type="date" id="bol_con_fecha_confirmacion" class="form-control  " placeholder="Fecha de confirmación " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_nombre_padrino_madrina" class="form-control  " placeholder="Nombre padrino o madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_ministro" class="form-control  " placeholder="Ministro" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_ministro" class="form-control  " placeholder="Nombre y apellido del contacto" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_correo" class="form-control  " placeholder="Correo del contacto" required>
                                    </div>
                                </div> <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_direccion" class="form-control  " placeholder="Direccion del contacto" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_celular" class="form-control  " placeholder="Celular del contacto" required>
                                    </div>
                                </div>
                                
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_recibido" class="form-control  " placeholder="Recibido de " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_con_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarmisaparticular" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>                                        
                                        Registrar
                                        </button>                                   
                                </div>
                            </div>
                            
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div> 
<!--------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="modregistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Agregar Registro</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">
                                <div class="col-md-12 mb-2 mx-5">
                                    <label class="From-label">Libro del registro</label>
                                    <div class="input-group col-md-9">
                                        <input type="text" id="mod_libro" class="form-control  " placeholder="Libro" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <label class="From-label">Folio del registro</label>
                                    <div class="input-group col-md-9">
                                        <input type="text" id="mod_folio" class="form-control  " placeholder="Folio" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">
                                    <label class="From-label">Numero de registro</label>
                                    <div class="input-group col-md-9">
                                        <input type="text" id="mod_num_reg" class="form-control  " placeholder="Numero de registro" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-20 mb-10">
                                    <button id="modificar" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary" data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        Agregar
                                    </button>
                                </div>
                            </div>
                                <div class="col-md-3"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
} 
?>


