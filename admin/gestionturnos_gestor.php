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

            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            

           
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
                <nav class="navbar navbar-expand navbar-light bg-bar-ges topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar buscar -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Gestion de turnos</h1>
                        
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
                            <div  id="tabla_turnos_gestor" class="table-responsive">                                
                            </div>
                        </div>
                    </div>
                     
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->  
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tramites</h6>
                        </div>
                        <div class="card-body">
                            <div  id="tabla_tramites_gestor" class="table-responsive">
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

<script type="text/javascript">
	$(document).ready(function(){
          
        $('#elimina').click(function(){
        id_el=$('#validationTextarea11').val();
        observacion=$('#validationTextarea22').val();
        cambiarFactura2(id_el,observacion) 
        });
                  
        $('#tabla_turnos_gestor').load('tablas/tabla_turnos_gestor.php'); 
        $('#tabla_tramites_gestor').load('tablas/tabla_tramites_gestor.php'); 
        $('#tabla_datos_cliente').load('tablas/tabla_datos_cliente.php');
     });
</script>

<!---------------------------------------------------Modal Gestionar----------------------------------------------------------->
<div class="modal fade" id="tramitesGestionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Gestion de tramite</h3>        
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
                                <div class="col-md-6 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputLista" class="form-label">Poner en lista de espera</label>
                                        <select id="inputListaEspera" class="form-select">
                                            <option selected>SI</option>
                                            <option selected>NO</option>
                                        </select>
                                    </div>                    
                                </div>
                        <div id="gestiondisplay" style="display: block;"> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="nombreprofecional" class="form-control  " placeholder="Nombre Profesional ">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="date" id="fechacita" class="form-control  " placeholder="Fecha Cita " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Hora Cita</label>
                                        <select id="horacita" class="form-select">
                                        <option selected>7 am</option>
                                        <option selected>8 am</option>
                                        <option selected>9 am</option>
                                        <option selected>10 am</option>
                                        <option selected>11 am</option>
                                        <option selected>12 pm</option>
                                        <option selected>1 pm</option>
                                        <option selected>2 pm</option>
                                        <option selected>3 pm</option>
                                        <option selected>4 pm</option>
                                        <option selected>5 pm</option>
                                        <option selected>6 pm</option>
                                        </select>
                                     </div>
                                     
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Minutos</label>
                                        <select id="minutoscita" class="form-select">
                                        <option selected>10</option>
                                        <option selected>20</option>
                                        <option selected>30</option>
                                        <option selected>40</option>
                                        <option selected>50</option>
                                        <option selected>00</option>
                                        </select>
                                     </div>
                                </div>                               
                                                               
                                <div class="col-md-3">
                                </div>
                            
                                <div class=" row no-guters">
                                    <div class="col-md-2"></div>
                                    <div class=" col-md-10 mb-2">
     

                                
                                    <button id="gestionar" type="button"
                                        class="mx-5 col-md-8 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Gestionar
                                    </button>
                                    
                                    
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                        </div>
                        <div id="listaEsperadisplay" style="display: none;"> 
                                
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="date" id="fechaentregacita" class="form-control  " placeholder="Fecha entrega" required>
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                                                            
                                <div class=" row no-guters">
                                    <div class="col-md-2"></div>
                                    <div class=" col-md-10 mb-2">
     

                                
                                    <button id="listadeespera" type="button"
                                        class="mx-5 col-md-12 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Poner lista de espera
                                    </button>
                                    
                                    
                                    </div>
                                </div>
                                <div class="col-md-3"></div>
                        </div>        

                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
<!---------------------------------------------------FIN Modal ------------------------------------------------------------------------>

<!---------------------------------------------------Modal  Gestionar examenes--------------------------------------------------------->
<div class="modal fade" id="gestionarexamenes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mx-5 section-heading text-uppercase">Gestión de Examenes</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="mx-5">Subir el trámite en formato PDF</h6>
                <div class="container-Agregar">
                    <div class="col-12 col-md-12 mx-4 text-center"></div>
                    <form id="upload-form" method="post" enctype="multipart/form-data">
                        <!-- Botones Inicio -->
                        <div class="row no-gutters">
                            <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-10">
                                        <input type="text" id="observacionexam" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                            </div>
                            <div class="col-md-12 mb-2 my-2 mx-5">
                                <div class="input-group col-md-9">
                                    <input type="file" id="pdf-file" class="form-control"  name="pdf-file">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="row no-gutters">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mb-2">
                                <button id="gestionarexam" type="button" style="margin-bottom: 10px;" class="btn btn-primary">Gestionar</button>
                                    
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
<!---------------------------------------------------FIN Modal ------------------------------------------------------------------------>
<!---------------------------------------------------Modal  Gestionar medicamentos--------------------------------------------------------->
<div class="modal fade" id="gestionarmedicamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mx-5 section-heading text-uppercase">Gestión Medicamentos</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                
                <div class="container-Agregar">
                    <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-10">
                                        <input type="text" id="observacionMed" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                    </div>
                    <div class="col-12 col-md-12 mx-4 text-center"></div>
                    <form id="upload-form" method="post" ">
                        <!-- Botones Inicio -->
                        <div class="row no-gutters">
                            <div class="col-md-4"></div>
                            <div class="row no-gutters">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mb-2">
                                <button id="gesmedicamentos" type="button" style="margin-bottom: 10px;" class="btn btn-primary">Gestionar</button>
                                    
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
<!---------------------------------------------------FIN Modal ------------------------------------------------------------------------>
<!---------------------------------------------------Modal  Gestionar otros--------------------------------------------------------->
<div class="modal fade" id="gestionarotro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mx-5 section-heading text-uppercase">Gestión de Tramite</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-Agregar">
                    <div class="col-12 col-md-12 mx-4 text-center"></div>
                    <form id="upload-form" method="post" enctype="multipart/form-data">
                        <!-- Botones Inicio -->
                            <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-10">
                                        <input type="text" id="observacionOtro" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                            </div>
                        <div class="row no-gutters">
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputLista" class="form-label">Desea subir un archivo ?</label>
                                        <select id="inputArchivo" class="form-select">
                                            <option selected>SI</option>
                                            <option selected>NO</option>
                                        </select>
                                    </div>                    
                                </div>
                        </div>
                        <div id="sinarchivo" style="display: block;" class="row no-gutters">
                            
                            <div class="col-md-4"></div>
                            <div class="row no-gutters">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mb-2">
                                <button id="gestionarotrotramite" type="button" style="margin-bottom: 10px;" class="btn btn-primary">Gestionar</button>
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                        <!-- Botones Inicio -->
                        <div id="conarchivo" style="display: none;" class="row no-gutters">
                            <div class="col-md-12 mb-2 my-2 mx-5">
                                <div class="input-group col-md-9">
                                    <input type="file" id="pdf-file_otro" class="form-control"  name="pdf-file">
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                            <div class="row no-gutters">
                                <div class="col-md-2"></div>
                                <div class="col-md-10 mb-2">
                                <button id="gestionarotroarchivo" type="button" style="margin-bottom: 10px;" class="btn btn-primary">Gestionar</button>
                                    
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
<<!---------------------------------------------------Modal agregar Autorizar--------------------------------------------------------->
<div class="modal fade" id="tramitesAutorizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Gestionar Autorizacion</h3>        
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
                                                               
                                                                
                                <?php 
                                     $sql="SELECT * FROM eps ORDER BY EPS_ID desc";
                                     $result=mysqli_query($conexion,$sql);
                                     
                                ?>
                                
                        
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Tipo_Autorizacion</label>
                                        <select id="tipoautorizacion" class="form-select">
                                            <option selected>Apoyo DX</option>
                                            <option selected>Primera Vez</option>
                                            <option selected>Control </option>
                                            <option selected>Procedimiento </option>                                            
                                            <option selected>Apoyo Diagnostico </option>
                                        </select>
                                    </div>                    
                                </div>
                            <div id="control" style="display: none;">                      
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="percontrol" class="form-control  " placeholder="Periodo Control" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <label for="inputState" class="form-label">Fecha proximo control</label>
                                    <div class="input-group col-md-9">
                                        <input type="date" id="fechacontrol" class="form-control  " placeholder="Proximo Control" >
                                    </div>
                                </div>
                            </div>                
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="requerimiento" class="form-control  " placeholder="Requerimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Lugar_de_Gestion</label>
                                        <select id="municipio" class="form-select">
                                        <option selected>Pasto</option> 
                                        <option selected>La Union</option>
                                        <option selected>La Cruz</option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <?php 
                                     $sql2="SELECT * FROM ips ORDER BY IPS_NOMBRE asc";
                                     $result2=mysqli_query($conexion,$sql2);
                                     
                                ?>
                        
                                
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">IPS</label>
                                        <select id="inputips" class="form-select">
                                         <?php while($ver=mysqli_fetch_row($result2)){?>
                                        <option selected><?php echo$ver[1]?></option>
                                        <?php }?>
                                                                                                         
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-10">
                                        <input type="text" id="observacion" class="form-control  " placeholder="Observaciones">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="autorizar" type="button"
                                        class="mx-5 col-md-7 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Gestionar
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
<!---------------------------------------------------Modal agregar Informar--------------------------------------------------------->
<div class="modal fade" id="tramitesInformar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Informar a Cliente</h3>        
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
                                        <input type="text" id="nom_informado" class="form-control  " placeholder="A quien se informo ? " required>
                                    </div>
                                </div>                           
                                
                                
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="informar" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Informar
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
<!---------------------------------------------------Modal agregar Suspendida--------------------------------------------------------->
<div class="modal fade" id="tramitesQsuspendidad" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="mx-5 section-heading text-uppercase">Quitar de Espera</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-Agregar">
                    <!---->
                    <div class="col-12 col-md-12 mx-4 text-center">
                    </div>
                    <form class="was-validated">
                        <!--Botones Inicio -->
                        <div class="row no-gutters">
                            <div class="col-md-12 mb-2 my-2 mx-5">
                                <div class="input-group col-md-9">
                                    <input type="text" id="observacionespera" class="form-control" placeholder="Observacion">
                                </div>
                            </div>
                            <div class="row no-gutters">
                                
                            </div>
                            <div class="col-md-12 text-center">
                                        <button type="button" class="mx-5 col-md-6 btn btn-secondary" onclick="preguntarSiNoQuitarEspera('<?php echo $usuario?>')" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                                                    Confirmar
                                        </button>
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
<!---------------------------------------------------Modal Acciones Citas--------------------------------------------------------->
<div class="modal fade" id="accionescitasGes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Acciones del Tramite</h3>        
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

                            <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="obacciones" class="form-control  " placeholder="Observacion">
                                    </div>
                            </div>
                            <div class="row no-gutters">
                                            <div class="col-md-12 text-center"> <!-- Agregado: clase text-center -->
                                                    <button type="button"
                                                        class="mx-5 col-md-6 btn btn-secondary " onclick="preguntarSiNocambioAutorizacion('<?php echo $usuario?>')"  data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" required>
                                                        Cambio de autorizacion 
                                                    </button> 
                                                    <h6>si hay cambio de autorizacion se recomienda poner el lugar en la observacion </h6>
                                            </div>                                                         
                            </div>

                            <div class="my-3"></div>
                           
                            <div class="row no-gutters">
                                            <div class="col-md-12 text-center"> <!-- Agregado: clase text-center -->
                                                    <button type="button"
                                                        class="mx-5 col-md-6 btn btn-secondary " onclick="preguntarSiNoPonerenespera('<?php echo $usuario?>')"  data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" required>
                                                        Poner tramite en espera 
                                                    </button> 
                                            </div>                                                         
                            </div>

                            

                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
<!---------------------------------------------------FIN Modal --------------------------------------------------------->
<!---------------------------------------------------Modal Acciones Otros--------------------------------------------------------->
<div class="modal fade" id="accionesotrosGes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Acciones del Tramite</h3>        
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

                            <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="obacciones" class="form-control  " placeholder="Observacion">
                                    </div>
                            </div>
                                                      
                            <div class="row no-gutters">
                                            <div class="col-md-12 text-center"> <!-- Agregado: clase text-center -->
                                                    <button type="button"
                                                        class="mx-5 col-md-6 btn btn-secondary " onclick="preguntarSiNoPonerenespera('<?php echo $nombre_usuario?>')"  data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false" required>
                                                        Poner tramite en espera 
                                                    </button> 
                                            </div>                                                         
                            </div>

                            

                            </div>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>
<!---------------------------------------------------FIN Modal --------------------------------------------------------->

</body>

</html>

<script type="text/javascript">
	$(document).ready(function(){                
        $('#informar').click(function(){
        nombre_informado=$('#nom_informado').val();
        informarTramite(nombre_informado, '<?php echo $usuario?>') 
        });
     });
     $(document).ready(function(){                
        $('#gestionar').click(function(){
        gestionarTramite('<?php echo $usuario?>', 1) 
        });
     });
     $(document).ready(function(){                
        $('#autorizar').click(function(){
        autorizarTramite('<?php echo $usuario?>', 4) 
        });
    });
    $(document).ready(function() {
        $('#gesmedicamentos').click(function() { 
        gestionarTramite('<?php echo $usuario?>', 2)
        });         
    });
    $(document).ready(function() {
        $('#gestionarotrotramite').click(function() { 
        gestionarTramite('<?php echo $usuario?>', 3)
        });         
    });
    
    $(document).ready(function() {
        $('#listadeespera').click(function() { 
        gestionarListaEspera('<?php echo $usuario?>')
        });         
    });
$(document).ready(function() {
  $('#gestionarexam').click(function() { 
 
  const fileInput = document.getElementById('pdf-file');
  const file = fileInput.files[0];
  
  if (!file) {
    alert('Por favor, selecciona un archivo PDF.');
    return;
  }

  const formData = new FormData();
  formData.append('pdf-file', file);

  fetch('php/procesar_examenes.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error al subir archivo.');
    }
    alert('Archivo subido con éxito.');
    gestionarExamenes('<?php echo $usuario?>') 
  })
  .catch(error => {
    console.error(error);
    alert('Error al subir archivo.');
  });

  });
});
$(document).ready(function() {
  $('#gestionarotroarchivo').click(function() { 
 
  const fileInput = document.getElementById('pdf-file_otro');
  const file = fileInput.files[0];
  
  if (!file) {
    alert('Por favor, selecciona un archivo PDF.');
    return;
  }

  const formData = new FormData();
  formData.append('pdf-file', file);

  fetch('php/procesar_examenes.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Error al subir archivo. 1');
    }
    alert('Archivo subido con éxito.');
    gestionarOtros('<?php echo $usuario?>') 
  })
  .catch(error => {
    console.error(error);
    alert('Error al subir archivo. 2');
  });

  });
});
</script>

<script type="text/javascript">
    const tipoAuto = document.querySelector('#tipoautorizacion');
    const divControl = document.querySelector('#controldisplay');
    const tipoGestion = document.querySelector('#inputListaEspera');
    const divlistaEspera = document.querySelector('#listaEsperadisplay');
    const divGestion = document.querySelector('#gestiondisplay');

    const tipoArchivo = document.querySelector('#inputArchivo');
    const divConArchivo = document.querySelector('#conarchivo');
    const divSinArchivo = document.querySelector('#sinarchivo');
   

  tipoAuto.addEventListener('change', function() {
    
    if (this.value === 'Control') {
      divControl.style.display = 'block'; // o 'inline-block'
    } else {
      divControl.style.display = 'none';
    }
    });

  tipoGestion.addEventListener('change', function() {
    
    if (this.value === 'NO') {
        divGestion.style.display = 'block';
        divlistaEspera.style.display = 'none';// o 'inline-block'
    } else {
        divGestion.style.display = 'none';
        divlistaEspera.style.display = 'block';
        
    }
    });
    
   tipoArchivo.addEventListener('change', function() {
    
    if (this.value === 'SI') {
        divConArchivo.style.display = 'block';
        divSinArchivo.style.display = 'none';// o 'inline-block'
    } else {
        divConArchivo.style.display = 'none';
        divSinArchivo.style.display = 'block';
    }
    });
</script>

<?php
} 
?>