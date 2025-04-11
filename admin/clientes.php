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
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin.php">
                <img width="40px" src="../componentes/img/icono.png" alt="">
                <div class="sidebar-brand-text mx-3">GestiónPlus<sup></sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="admin.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
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
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Turnos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Solicitud:</h6>
                        <a class="collapse-item" href="clientes.php">Clientes</a>
                        <a class="collapse-item" href="agregar_turnos.php">Nuevo Turno</a>
                        <a class="collapse-item" href="gestionturnos.php">Gestion de Turnos</a>
                        <a class="collapse-item" href="turnoslistos.php">Turnos Listos</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Contabilidad</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Gestrion de Facturas</h6>
                        <a class="collapse-item" href="contabilidadPendientes.php">Pendientes </a>
                        <a class="collapse-item" href="contabilidadPagos.php">Pagos </a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Gestion Empresarial
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
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
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>
                    <div class="col-xs-2 col-md-3">
                        <a class="btn btn-secondary col" href="#clientes" role="button" data-toggle="modal">
                            <i class="fas fa-user-plus"></i> Agregar Cliente</a>
                    </div>

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

                        <!-- Nav Item - Alerts -->
                       

                        <!-- Nav Item - Messages -->
                        

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
                            <div  id="tabla_clientes" class="table-responsive">
                            </div>
                        </div>
                    </div>
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->
                    
                    <!------------------------------------------------ DataTales Tramites -------------------------------------------->
                    

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
    <script src="../componentes/vendor/jquery/jquery.min.js"></script>
    <script src="../componentes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../componentes/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../componentes/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../componentes/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../componentes/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../componentes/js/demo/datatables-demo.js"></script>
    <script type="text/javascript">

	$(document).ready(function(){
          
        $('#botonbuscar').click(function(){
        cedulaCliente=$('#busquedacedula').val();
        usuario = '<?php echo $_SESSION["nombre_usuario"]?>';
        buscarcliente(cedulaCliente, usuario)            
        });
        limpiarModalUsuario();
        $('#tabla_clientes').load('tablas/tabla_clientes.php'); 
      

 	});
</script>

</body>

</html>
<!---------------------------------------------------Modal agregar clientes--------------------------------------------------------->
<div class="modal fade" id="clientes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Nuevo Cliente</h3>        
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
                                        <input type="text" id="nombrecliente" class="form-control  " placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="apellidocliente" class="form-control  " placeholder="Apellido" required>
                                    </div>
                                </div>
                                
				    <?php 
                                     $sql="SELECT * FROM eps ORDER BY EPS_ID desc";
                                     $result=mysqli_query($conexion,$sql);
                                     
                                    ?>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">EPS</label>
                                        <select id="epscl" class="form-select">
                                         <?php while($ver=mysqli_fetch_row($result)){?>
                                        <option selected><?php echo$ver[1]?></option>
                                        <?php }?>
                                                                                                         
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Regimen</label>
                                        <select id="regimen" class="form-select">
                                        <option selected>Contributivo</option>
                                        <option selected>Subsidiado</option>
                                        </select>
                                     </div>
                                
                                     
                                </div>
                                <?php 
                                     $sql="SELECT * FROM eps";
                                     $result=mysqli_query($conexion,$sql);
                                     
                                ?>
				<div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Tipo de documento</label>
                                        <select id="tipocedula" class="form-select">
                                        
                                        <option selected>TI</option>
                                        <option selected>CE</option>                                        
                                        <option selected>RC</option>
                                        <option selected>NUIP</option>
                                        <option selected>CC</option>
                                        </select>
                                     </div>                               
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="documento" class="form-control  " placeholder="Documento" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="municipio" class="form-control  " placeholder="Municipio" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="barrio" class="form-control  " placeholder="Barrio o Vereda" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="contacto1" class="form-control  " placeholder="Contacto" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
				    <label for="inputState" class="form-label">Fecha de Nacimiento</label>
                                    <div class="input-group col-md-9">
                                        <input type="date" id="fechanaci" class="form-control  " placeholder="Fecha Nacimiento DD/MM/AA" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">RH</label>
                                        <select id="rhcl" class="form-select">                                        
                                        <option selected>A Positivo</option>
                                        <option selected>B Positivo</option>
                                        <option selected>O Positivo</option>                                        
                                        <option selected>AB Positivo</option>
                                        <option selected>O Negativo</option>
                                        <option selected>B Negativo</option>
                                        <option selected>A Negativo</option>
                                        <option selected>AB Negativo</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Estado Civil</label>
                                        <select id="estadocivil" class="form-select">
                                        <option selected>Ninguno</option>                                        
                                        <option selected>Casado</option>
                                        <option selected>Union Libre</option>                                        
                                        <option selected>Separado</option>
                                        <option selected>Soltero</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Escolaridad</label>
                                        <select id="escolaridad" class="form-select">
                                        <option selected>Ninguna</option>                                        
                                        <option selected>Primaria</option>
                                        <option selected>Secundaria</option>                                        
                                        <option selected>Tecnico</option>
                                        <option selected>Profesional</option>
                                        </select>
                                     </div>
                                </div>


                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="acudiente" class="form-control  " placeholder="Nombre Acudiente" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="madre" class="form-control  " placeholder="Nombre Madre" >
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="contacto2" class="form-control  " placeholder="Otro Contacto" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="agregar" type="button"
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
<!---------------------------------------------------FIN Modal agregar clientes--------------------------------------------------------->
<!---------------------------------------------------Modal agregar clientes--------------------------------------------------------->
<div class="modal fade" id="modcliente" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Modificar Cliente</h3>        
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
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="mnombrecliente" class="form-control  " placeholder="Nombre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="mapellidocliente" class="form-control  " placeholder="Apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Tipo de documento</label>
                                        <select id="mtipocedula" class="form-select">
                                        
                                        <option selected>TI</option>
                                        <option selected>CE</option>                                        
                                        <option selected>RC</option>
                                        <option selected>NUIP</option>
                                        <option selected>CC</option>
                                        </select>
                                     </div>
                                
                                     <?php 
                                     $sql="SELECT * FROM eps ORDER BY EPS_ID desc";
                                     $result=mysqli_query($conexion,$sql);
                                     
                                    ?>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">EPS</label>
                                        <select id="mepscl" class="form-select">
                                         <?php while($ver=mysqli_fetch_row($result)){?>
                                        <option selected><?php echo$ver[1]?></option>
                                        <?php }?>
                                                                                                         
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Regimen</label>
                                        <select id="mregimen" class="form-select">
                                        <option selected>Contributivo</option>
                                        <option selected>Subsidiado</option>
                                        </select>
                                     </div>
                                
                                     <?php 
                                     $sql="SELECT * FROM eps";
                                     $result=mysqli_query($conexion,$sql);
                                     
                                    ?>
                                </div>
                                
                                    

                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="mdocumento" class="form-control  " placeholder="Documento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="date" id="mfechanaci" class="form-control  " placeholder="Fecha Nacimiento DD/MM/AA" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="mmunicipio" class="form-control  " placeholder="Municipio" required>
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="mbarrio" class="form-control  " placeholder="Barrio" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="mcontacto1" class="form-control  " placeholder="Contacto" required>
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">RH</label>
                                        <select id="mrhcl" class="form-select">                                        
                                        <option selected>A Positivo</option>
                                        <option selected>B Positivo</option>
                                        <option selected>O Positivo</option>                                        
                                        <option selected>AB Positivo</option>
                                        <option selected>O Negativo</option>
                                        <option selected>B Negativo</option>
                                        <option selected>A Negativo</option>
                                        <option selected>AB Negativo</option>
                                        </select>
                                     </div>
                                </div>
                                

                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Estado Civil</label>
                                        <select id="mestadocivil" class="form-select">                                        
                                        <option selected>Casado</option>
                                        <option selected>Union Libre</option>                                        
                                        <option selected>Separado</option>
                                        <option selected>Soltero</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">

                                    <div class="col-md-4">
                                        <label for="inputState" class="form-label">Escolaridad</label>
                                        <select id="mescolaridad" class="form-select">                                        
                                        <option selected>Primaria</option>
                                        <option selected>Secundaria</option>                                        
                                        <option selected>Tecnico</option>
                                        <option selected>Profesional</option>
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="macudiente" class="form-control  " placeholder="Nombre Acudiente" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="text" id="mmadre" class="form-control  " placeholder="Nombre Madre" >
                                    </div>
                                </div>
                                
                                <div class="col-md-12 mb-2 mx-5">

                                    <div class="input-group col-md-9">
                                        <input type="number" id="mcontacto2" class="form-control  " placeholder="Otro Contacto" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
     

                                
                                    <button id="modificar" type="button"
                                        class="mx-5 col-md-6 btn btn-secondary " data-dismiss="modal" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false" requerid>
                                        
                                        Modificar
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
<!---------------------------------------------------FIN Modal agregar clientes--------------------------------------------------------->

<script type="text/javascript">
	
    $('#agregar').click(function(){
        agregarcliente();
        limpiarModalUsuario();
        });
    $('#modificar').click(function(){
        editarcliente();
        });
</script>

<?php
} 
?>