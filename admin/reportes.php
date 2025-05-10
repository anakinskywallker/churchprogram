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

    <title>Reportes</title>

    <!-- Custom fonts for this template -->
    <link href="../componentes/vendor/fontawesome-free/css/all.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../componentes/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="../librerias/alertifyjs/css/themes/default.css">


    <script src="../librerias/jquery-3.2.1.min.js"></script>
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

                <!-- Begin Page Content -->
                <div class="container-fluid">
                <div class="col-12 flex-wrap p-3">
                                <button type="submit" href="#ingresarfechas" data-toggle="modal" class="btn btn-primary">Generar reporte por fecha</button>
                                <button type="submit" href="#" data-toggle="modal" class="btn btn-primary">Generar PDF del reporte  </button>
                </div>

                   
                    <!------------------------------------------------- Informe financiero ------------------------------------------->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Locales Parroquiales</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_localesparroquiales" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Ingreso Diario ( DESPACHO )</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_reportediario" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Descripcion despacho parroquial</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_despacho" class="table-responsive">                                
                            </div>
                        </div>
                    </div>                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Otros Ingresos discriminado</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_otrosingresosdis" class="table-responsive">                                
                            </div>
                        </div>
                    </div>                    
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Egresos</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_egresosreporte" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Reportes Finales</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_reportetotal" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
    <!------------------------------------------------ DataTales Evento y Contacto -------------------------------------------->
                    
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; QCodely 2023</span>
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

    <script src="../componentes/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../componentes/vendor/datatables/dataTables.bootstrap4.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="../componentes/js/sb-admin-2.js"></script>

<script type="text/javascript">
	$(document).ready(function(){
        $('#accordionSidebar').load('tablas/accordionSidebar.php');                       
        $('#tabla_reportediario').load('tablas/tabla_reportediario.php'); 
        $('#tabla_localesparroquiales').load('tablas/tabla_localesparroquiales.php');
        $('#tabla_despacho').load('tablas/tabla_despacho.php');        
        $('#tabla_otrosingresosdis').load('tablas/tabla_otrosingresosdis.php');   
        $('#tabla_egresosreporte').load('tablas/tabla_egresosreporte.php');  
        $('#tabla_reportetotal').load('tablas/tabla_reportetotal.php');

        
     });
</script>
<script type="text/javascript">
	$(document).ready(function(){                
        $('#agregarfechas').click(function(){
            agregarfechas('<?php echo $usuario?>') 
        });
     });
</script>

<!---------------------------------------------------Modal Gestionar----------------------------------------------------------->
<div class="modal fade" id="ingresarfechas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Generar Reporte</h3>        
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="mx-5">Recuerde quer la fecha final debe ser posterior a la inicial</h6>
                <div class="modal-body ">
                    <div class=" container-Agregar">
                        <!---->
                        <div class="col-12 col-md-12 mx-4 text-center">

                        </div>
                        <form class="was-validated">
                            <!--Botones Inicio -->
                            <div class=" row no-guters ">
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Inicial</label>
                                        <input type="date" id="fecha_inical" class="form-control  " placeholder="Fecha Inicial" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Final</label>
                                        <input type="date" id="fecha_final" class="form-control  " placeholder="Fecha Final " required>
                                    </div>
                                </div>                                                                 
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarfechas" type="button"
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
<!---------------------------------------------------FIN Modal ------------------------------------------------------------------------>

</body>

</html>
<?php
} 
?>