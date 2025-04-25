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
                <div class="sidebar-brand-text mx-3">Registro<sup></sup></div>
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
                        <a class="collapse-item" href="facturas.php">Facturas</a>
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
          
            
<!-------------------------------------------------------- Boletas ------------------------------------------------------------>
            
           
<!------------------------------------------------------- Tabla ------------------------------------------------------------> 

            <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Facturas</h6>
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
    $(document).ready(function(){
    $('#agregarmisa').click(function(){
        creartramite()
    });   
    });
    $(document).ready(function(){
    $('#agregarentierro').click(function(){       
        agregarentierro()
    });   
    });
    $(document).ready(function(){
    $('#agregarresponso').click(function(){       
        agregarresponso()
    });   
    });
    $(document).ready(function(){
    $('#agregarbolbautizo').click(function(){       
        agregarbolbautizo()
    });   
    });

    $(document).ready(function(){
    $('#agregarbolprimera').click(function(){       
        agregarbolprimera()
    });   
    });

    $(document).ready(function(){
    $('#agregarbolconfirma').click(function(){       
        agregarbolconfirma()
    });   
    });
    $(document).ready(function(){
    $('#agregarbolmatri').click(function(){       
        agregarbolmatri()
    });   
    });
    $(document).ready(function(){
    $('#agregarpartidas').click(function(){       
        agregarpartidas()
    });   
    }); 
    $(document).ready(function(){
    $('#agregarotros').click(function(){       
        agregarotros()
    });   
    });  
    $(document).ready(function(){
    $('#agregarcem').click(function(){       
        agregarcem()
    });   
    });  

    

   
    
</script>

<!---------------------------------------------------Modal agregar misa------------------------------------------------------------------>


<!---------------------------------------------------Modal agregar misa------------------------------------------------------------------>

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
                                        <option selected>Oficio sin pago</option>
                                        <option selected></option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="misa_nombreofrece" class="form-control  " placeholder="Nombre Ofrece" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="misa_lugar" class="form-control  " placeholder="Lugar" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Misa</label>
                                        <input type="date" id="misa_fecha" class="form-control  " placeholder="Fecha Misa " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Hora</label>
                                        <input type="time" id="misa_hora" class="form-control  " placeholder="Hora Misa" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="misa_intencion" placeholder="Intencion" rows="3" required></textarea>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="nombre_contacto" class="form-control  " placeholder="Nombre y apellido " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="celular_contacto" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                                                                 
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarmisa" type="button"
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
<!-----------------------------------------------modal entierro--------------------------------------------------------------------------------------->
<div class="modal fade" id="entierro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Exequias</h3>        
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
                                        <label for="inputState" class="form-label">Tipo exequias</label>
                                        <select id="ent_tipo_exequia" class="form-select">
                                        <option selected>Rural</option> 
                                        <option selected>Urbana</option>                                      
                                        </select>
                                     </div>
                                </div>                                 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_difunto" class="form-control  " placeholder="Nombre difunto" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de muerte</label>
                                        <input type="date" id="ent_fecha_muerte" class="form-control  " placeholder="Fecha Muerte " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="number" id="ent_edad" class="form-control  " placeholder="Edad" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha misa</label>
                                        <input type="date" id="ent_fecha_misa" class="form-control  " placeholder="Fecha Misa " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Hora misa</label>
                                        <input type="time" id="ent_hora_misa" class="form-control  " placeholder="Hora Misa" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_lugar_del_funeral" class="form-control  " placeholder="Lugar del funeral" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="ent_causa_de_muerte" placeholder="Causa de muerte" rows="3" required></textarea>
                                    </div>
                                </div>  
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_estado_civil" class="form-control  " placeholder="Estado civil" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_conyugue" class="form-control  " placeholder="Nombre conyugue" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_hijos" class="form-control  " placeholder="Nombre hijos" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <input type="text" class="form-control"  id="ent_ultimos_sacramentos" placeholder="Ultimos sacramentos" rows="3" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="ent_biografia" placeholder="Biografia" rows="3" required></textarea>
                                    </div>
                                </div> 
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_nombre_contacto" class="form-control  " placeholder="Recibido de " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="ent_celular_contacto" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                                                             
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarentierro" type="button"
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
<!-------------------------------------------------------modal responso normal----------------------------------------------------->
<div class="modal fade" id="res_normal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Responso Normal </h3>        
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
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Tipo responso</label>
                                        <select id="res_tipo_responso" class="form-select">
                                        <option selected>Semana Santa</option>   
                                        <option selected>Normal</option>                                                                            
                                        </select>
                                     </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="res_nombre_ofrece" class="form-control  " placeholder="Nombre Ofrece" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="res_lugar" class="form-control  " placeholder="Lugar" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha Misa</label>
                                        <input type="date" id="res_fecha" class="form-control  " placeholder="Fecha Misa " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Hora</label>
                                        <input type="time" id="res_hora" class="form-control  " placeholder="Hora Misa" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="res_intencion" placeholder="Intencion" rows="3" required></textarea>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="res_nombre_contacto" class="form-control  " placeholder="Nombre y apellido " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="res_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="res_celular_contacto" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                                                                 
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarresponso" type="button"
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
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------------------------------------------------->
<div class="modal fade" id="bautizo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <input type="text" id="bol_ba_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_lugar_nacimiento" class="form-control  " placeholder="Lugar de nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" id="bol_ba_fecha_nacimiento" class="form-control  " placeholder="Fecha nacimiento " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_nombre_padrino" class="form-control  " placeholder="Nombre padrino" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_nombre_madrina" class="form-control  " placeholder="Nombre madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_abuelos_paternos" class="form-control  " placeholder="Abuelos paternos" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_abuelos_maternos" class="form-control  " placeholder="Abuelos maternos" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_ministro_bautizo" class="form-control  " placeholder="Ministro de bautizo" required>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_recibido" class="form-control  " placeholder="Recibido de " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_ba_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                               
                                                             
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarbolbautizo" type="button"
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
<div class="modal fade" id="primeracomunion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <input type="text" id="bol_pri_nombre_y_apellido" class="form-control  " placeholder="Nombre y apellido" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_lugar_nacimiento" class="form-control  " placeholder="Lugar de nacimiento" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="col-md-9">
                                        <label for="inputState" class="form-label">Fecha de nacimiento</label>
                                        <input type="date" id="bol_pri_fecha_nacimiento" class="form-control  " placeholder="Fecha nacimiento " required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_nombre_padre" class="form-control  " placeholder="Nombre padre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_nombre_madre" class="form-control  " placeholder="Nombre madre" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_nombre_padrino" class="form-control  " placeholder="Nombre padrino" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_nombre_madrina" class="form-control  " placeholder="Nombre madrina" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_ministro" class="form-control  " placeholder="Ministro" required>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_recibido" class="form-control  " placeholder="Recibido de " >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="bol_pri_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                               
                                                             
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarbolprimera" type="button"
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
<div class="modal fade" id="confirmacion" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                                        <button id="agregarbolconfirma" type="button"
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
<div class="modal fade" id="matrimonio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
<!---------------------------------------------------Modal partidas --------------------------------------------------------->
<div class="modal fade" id="partidasactuales" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Partidas</h3>        
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
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Tipo de partida</label>
                                        <select id="partida_tipo" class="form-select">
                                        <option selected>Bautismo</option>
                                        <option selected>Bautismo sacramento</option>
                                        <option selected>Comunión</option>
                                        <option selected>Confirmacion</option>
                                        <option selected>Matrimonio</option>
                                        <option selected>Defunción</option>
                                        <option selected>Partida Vieja</option>
                                        <option selected></option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_observacion" class="form-control  " placeholder="Observacion" required>
                                    </div>
                                </div>
                                <h6 class="mx-5">------------------- Datos recibo --------------------</h6>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_recibido" class="form-control  " placeholder="Recibido de" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_identificacion" class="form-control  " placeholder="Identificacion" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_con_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarpartidas" type="button"
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



   
<!--------------------------------------------------------modal partidas viejas----------------------------------------------------------------------------->
<div class="modal fade" id="partidasviejas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Partidas viejas </h3>        
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
                                        <label for="inputState" class="form-label">Tipo de partida</label>
                                        <select id="partida_tipo" class="form-select">
                                        <option selected>Bautismo</option> 
                                        <option selected>Comunión</option>
                                        <option selected>Matrimonio</option>
                                        <option selected>Defunción</option>
                                        <option selected></option>                                      
                                        </select>
                                     </div>
                                </div> 
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_vieja_recibido" class="form-control  " placeholder="Recibido de" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="partida_vieja_concepto" class="form-control  " placeholder="Por concepto de" required>
                                    </div>
                                </div>
                               
                                                                 
                            </div>
                            
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarmisa" type="button"
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
<!--------------------------------------------------------modal otros----------------------------------------------------------------------------->
<div class="modal fade" id="registraringreso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Registrar Ingreso</h3>        
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
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Tipo de ingreso</label>
                                        <select id="otros_tipo" class="form-select">
                                        <option selected>Locales parroquiales</option> 
                                        <option selected>Ofrendas parroquiales</option>
                                        <option selected>Tienda</option> 
                                        <option selected>Otros Ingresos</option>  
                                        </select>
                                     </div>
                                </div>  
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="otros_recibido" class="form-control  " placeholder="Recibido de" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="otros_cedula" class="form-control  " placeholder="Cedula o Nit" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="number" id="otros_ofrenda" class="form-control  " placeholder="Ofrenda" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="otros_observacion" placeholder="Concepto" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="otros_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="otros_ciudad" class="form-control  " placeholder="Ciudad" >
                                    </div>
                                </div>
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarotros" type="button"
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
<div class="modal fade" id="registrarcementerio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" 
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content ">
                <div class="modal-header">
                    <h3 class="mx-5 section-heading text-uppercase ">Cementerio</h3>        
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
                                    <div class="col-md-6">
                                        <label for="inputState" class="form-label">Tipo</label>
                                        <select id="cem_tipo" class="form-select">
                                        <option selected>Osarios</option>
                                        <option selected>Bobedas</option> 
                                        </select>
                                     </div>
                                </div>  
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="cem_recibido" class="form-control  " placeholder="Recibido de" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="cem_cedula" class="form-control  " placeholder="Cedula o Nit" required>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group  col-md-9">                                        
                                        <textarea class="form-control" id="cem_observacion" placeholder="Onservacion" rows="3" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="cem_celular" class="form-control  " placeholder="Celular" >
                                    </div>
                                </div>
                                <div class="col-md-12 mb-2 my-2 mx-5">
                                    <div class="input-group col-md-9">
                                        <input type="text" id="cem_ciudad" class="form-control  " placeholder="Ciudad" >
                                    </div>
                                </div>                            
                            </div>
                            <div class=" row no-guters">
                                <div class="col-md-2"></div>
                                <div class=" col-md-10 mb-2">
                                        <button id="agregarcem" type="button"
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


<?php
} 
?>


