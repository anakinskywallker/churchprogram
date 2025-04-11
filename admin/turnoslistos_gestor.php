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

    <title>Gestion de Turnos</title>

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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-login sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="gestor.php">
                <img width="40px" src="../componentes/img/icono.png" alt="">
                <div class="sidebar-brand-text mx-3">GestiónPlus<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
           

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Solicitudes
            </div>

            <!-------- Nav Item - Pages Collapse Menu ---------->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Turnos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Solicitud:</h6>
                        <a class="collapse-item" href="clientes_gestor.php">Clientes</a>
                        <a class="collapse-item" href="agregar_turnos_gestor.php">Nuevo Turno</a>
                        <a class="collapse-item" href="gestionturnos_gestor.php">Gestion de Turnos</a>
                        <a class="collapse-item" href="turnoslistos_gestor.php">Turnos Listos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            

            <!-- Nav Item - Pages Collapse Menu -->
            

           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="../componentes/img/undraw_rocket.png" alt="...">
            </div>

        </ul>

       
        <!---------------------------------------------------- End of Sidebar ---------------------------------------->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-bar-ready topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar buscar -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Turnos Listos</h1>
                        
                </div>

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
                

                   
                    <!------------------------------------------------- DataTales Turnos ------------------------------------------->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Turnos</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_turnos_listos_gestor" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Turnos</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_tramites_listos_gestor" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tramites Entregados</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_tramites_entregados_gestor" class="table-responsive">
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Datos Clinete</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_datos_cliente" class="table-responsive">
                            </div>
                        </div>
                    </div>

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
                <div class="modal-body">Seleccione "Cerrar Sesion" para cerrar Gestio Plus</div>
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

<!---------------------------------------------------Modal agregar Entregar--------------------------------------------------------->
<div class="modal fade" id="entregargestor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Entregar Tramite</h3>        
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
                                  
                                                         
                                
                                
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="botonentregar" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Entregar
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
<!---------------------------------------------------FIN Modal --------------------------------------------------------->
<script type="text/javascript">
	$(document).ready(function(){
          
        $('#elimina').click(function(){
        id_el=$('#validationTextarea11').val();
        observacion=$('#validationTextarea22').val();
        cambiarFactura2(id_el,observacion) 
        });
    $(document).ready(function(){                
        $('#botonentregar').click(function(){
        entregarTramite('<?php echo $usuario?>') 
        });
     });
                  
        $('#tabla_turnos_listos_gestor').load('tablas/tabla_turnos_listos_gestor.php'); 
        $('#tabla_tramites_listos_gestor').load('tablas/tabla_tramites_listos_gestor.php'); 
        $('#tabla_tramites_entregados_gestor').load('tablas/tabla_tramites_entregados_gestor.php');
        $('#tabla_datos_cliente').load('tablas/tabla_datos_cliente.php');
     });
</script>


</body>

</html>

<?php
} 
?>

