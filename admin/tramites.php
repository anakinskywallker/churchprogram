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

    <title>Tramites</title>

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

        <!-- Sidebar -->
        <ul class="navbar-nav bg-login sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
            <img width="40px" src="../componentes/img/icono.png" alt="">
                <div class="sidebar-brand-text mx-3">Tramites<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-church"></i>
                    <span>Inicio</span></a>
            </li>

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
                    <i class="fas fa-fw fa-book-medical"></i>
                    <span>Despacho</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Solicitud:</h6>
                        <a class="collapse-item" href="tramites.php">Trámites</a>
                        <a class="collapse-item" href="registrar_egresos.php">Registrar Egreso</a>
                        <a class="collapse-item" href="registro.php">Registro</a>
                        
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-comment-dollar"></i>
                    <span>Contabilidad</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">gestion contable</h6>
                        <a class="collapse-item" href="ingresos.php">Facturas</a>
                        <a class="collapse-item" href="ingresos.php">Diario</a>
                        <a class="collapse-item" href="egresos.php">Egresos</a>
                        <a class="collapse-item" href="reportes.php">Reportes</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion Iglesia
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-people-arrows"></i>
                    <span>Colaboradores</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestion</h6>
                        <a class="collapse-item" href="usuarios.php">Agregar</a>
                    </div>
                </div>
            </li>

           
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message 
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="" alt="...">
            </div>
            -->

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
            <div class="container-fluid">
                <div class="row">   
                       <!-- Content Column -->
                       <div class="col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Misas </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#misas" data-toggle="modal" class="btn btn-primary">Misas</button>
                                        <button type="submit" href="#entierro" data-toggle="modal" class="btn btn-primary">Entierro</button>   
                                </div>
                                                                 
                            </div>
                        </div>                  
                       <!-- Content Column -->
                       <div class="col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Responsos </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Normal</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Semana Santa</button>
                                          
                                </div>
                                                                 
                            </div>
                        </div>
                                                
                    
                </div>
            </div>
            
<!-------------------------------------------------------- Boletas ------------------------------------------------------------>
            
                <div class="container-fluid">
                   <div class="row">
                       <!-- Content Column -->
                       <div class="col-lg-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Boletas </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Bautizo</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Primera Comunión</button>
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Confirmación</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Matrimonio</button>  
                                </div>
                                                                 
                            </div>
                        </div>                        
                    </div>
                </div>
            
<!------------------------------------------------------- Partidas ------------------------------------------------------------>               
           
            <div class="container-fluid">
                <div class="row">   
                       <!-- Content Column -->
                       <div class="col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Partidas Actuales</h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Bautismo</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Confirmacion</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Matrimonio</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Defuncion</button>   
                                </div>
                                                                 
                            </div>
                        </div>                  
                       <!-- Content Column -->
                       <div class="col-md-6 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Partidas Viejas (1950) </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Partida</button>
                                        

                                          
                                </div>
                                                                 
                            </div>
                        </div>
                                                
                    
                </div>
            </div>
<!------------------------------------------------------- Otros ------------------------------------------------------------> 
                <div class="container-fluid">
                   <div class="row">
                       <!-- Content Column -->
                       <div class="col-lg-12 mb-4">
                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Otros </h6> 
                                </div>                                      
                                
                                <div class="col-12 flex-wrap p-3">
                                
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Locales parroquiales</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Ofrendas parroquiales</button>
                                        <button type="submit" href="#agregarcita" data-toggle="modal" class="btn btn-primary">Cementerio</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Tienda</button>
                                        <button type="submit" href="#retiroexam" data-toggle="modal" class="btn btn-primary">Otros Ingresos</button>   
                                </div>
                                                                 
                            </div>
                        </div>                        
                    </div>
                </div>
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

    <!-- Custom scripts for all pages-->
    <script src="../componentes/js/sb-admin-2.js"></script>

    <!-- Page level plugins -->
    <script src="../componentes/vendor/datatables/jquery.dataTables.js"></script>
    <script src="../componentes/vendor/datatables/dataTables.bootstrap4.js"></script>

    <!-- Page level custom scripts -->
    <script src="../componentes/js/demo/datatables-demo.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $('#botonbuscar').click(function(){
    cedulaCliente=$('#busquedacedula').val();
    usuario = '<?php echo $usuario?>';
    buscarcliente(cedulaCliente, usuario)            
    });  
        $('#tabla_tramites_nuevo').load('tablas/tabla_tramites_nuevo.php');
        $('#ingresardatos').load('tablas/cargar_cliente.php'); 
        $('#informacionturno').load('tablas/informacion_turno.php');  
        const selectOpciones = document.querySelector('#autorizacion');
        const tipoAuto = document.querySelector('#tipoautorizacion');
        const divAocultar = document.querySelector('#lugarAtrz');
        const divNoAutorizado = document.querySelector('#autorizada');
        const divControl = document.querySelector('#control');
  
    selectOpciones.addEventListener('change', function() {
    if (this.value === 'NO') {
      divNoAutorizado.style.display = 'none';
      divAocultar.style.display = 'block'; // o 'inline-block'
    } else if (this.value === 'SI') {
      divAocultar.style.display = 'none';
      divNoAutorizado.style.display = 'block';
    }
     });

    tipoAuto.addEventListener('change', function() {
    if (this.value === 'Control') {
      divControl.style.display = 'block'; // o 'inline-block'
    } else {
      divControl.style.display = 'none';
    }
    });

 	});
</script>
</body>
</html>



<!---------------------------------------------------Modal agregar misa------------------------------------------------------------------>
<div class="modal fade" id="misas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Misas</h3>        
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
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Tipo Misa</label>
                                        <select id="tipomisa" class="form-select">
                                        <option selected>Particular</option> 
                                        <option selected>Santisimo</option>
                                        <option selected>Oficio</option>
                                        <option selected></option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="nombreofrece" class="form-control  " placeholder="Nombre Ofrece" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="lugar" class="form-control  " placeholder="Lugar" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Misa</label>
                                        <input type="date" id="fechamisa" class="form-control  " placeholder="Fecha Misa " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Hora</label>
                                        <input type="time" id="horamisa" class="form-control  " placeholder="Hora Misa" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Intencion" rows="3" required></textarea>
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
<!-------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="entierro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Entuuyro</h3>        
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
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Tipo Misa</label>
                                        <select id="tipomisa" class="form-select">
                                        <option selected>Particular</option> 
                                        <option selected>Santisimo</option>
                                        <option selected>Oficio</option>
                                        <option selected></option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="nombreofrece" class="form-control  " placeholder="Nombre Ofrece" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="lugar" class="form-control  " placeholder="Lugar" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Misa</label>
                                        <input type="date" id="fechamisa" class="form-control  " placeholder="Fecha Misa " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Hora</label>
                                        <input type="time" id="horamisa" class="form-control  " placeholder="Hora Misa" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Intencion" rows="3" required></textarea>
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
<!---------------------------------------------------Modal retiro medicamentos--------------------------------------------------------->
<div class="modal fade" id="retiromed" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Retiro Medicamentos</h3>        
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
                                        <input type="text" id="requerimientomed" class="form-control  " placeholder="Requerimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Municipio</label>
                                        <select id="municipiomed" class="form-select">
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
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="observacionmed" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">IPS</label>
                                        <select id="inputipsmed" class="form-select">
                                         <?php while($ver=mysqli_fetch_row($result2)){?>
                                        <option selected><?php echo$ver[1]?></option>
                                        <?php }?>
                                                                                                         
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="retiromedicamentos" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
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
<!----------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------Modal otros tramites--------------------------------------------------------->
<div class="modal fade" id="agregarotro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Otros Tramites</h3>        
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
                                    <div id="lugaraut" class="col-md-4">
                                        
                                    </div>
                                
                                     
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="requerimientootr" class="form-control  " placeholder="Requerimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Municipio</label>
                                        <select id="municipiootr" class="form-select">
                                        <option selected>Pasto</option> 
                                        <option selected>La Union</option>
                                        <option selected>La Cruz</option>                                     
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="observacionotr" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="otrotramite" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
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
<!--------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------Modal retiro examenes--------------------------------------------------------->
<div class="modal fade" id="retiroexam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Retiro de Examenes</h3>        
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
                                        <input type="text" id="requerimientoexam" class="form-control  " placeholder="Requerimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Municipio</label>
                                        <select id="municipioexam" class="form-select">
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
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="observacionexam" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">IPS</label>
                                        <select id="inputipsexam" class="form-select">
                                         <?php while($ver=mysqli_fetch_row($result2)){?>
                                        <option selected><?php echo$ver[1]?></option>
                                        <?php }?>
                                                                                                         
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="retiroexamenes" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
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


<div class="modal fade" id="modalaayuda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Misa particular</h3>        
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

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Autorizado</label>
                                        <select id="autorizacion" class="form-select">
                                            <option selected>SI</option>
                                            <option selected>NO</option>                                        
                                        </select>
                                     </div>
                                
                                     
                                </div>
                                <div id="lugarAtrz" style="display: block;" class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Lugar_Autorizacion</label>
                                        <select id="lugarAtu" class="form-select">
                                        
                                            <option selected>Pasto </option>
                                            <option selected>La Union</option>
                                            <option selected>La Cruz </option>
                                        </select>
                                    </div>                    
                                </div>
                               
                                
                        <div id="autorizada" style="display: none;">
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Tipo_Autorizacion</label>
                                        <select id="tipoautorizacion" class="form-select">
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
                                        <label for="inputState" class="form-label">Lugar_de_gestion</label>
                                        <select id="municipio" class="form-select">
                                            <option selected>Pasto </option>
                                            <option selected>La Union</option>
                                            <option selected>La Cruz </option>                                      
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
                        </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-10">
                                        <input type="text" id="observacion" class="form-control  " placeholder="Observaciones" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="agregartrm" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
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
<!------------------------------------------------------------------------------------------------------------------------------------->
<?php
} 
?>


