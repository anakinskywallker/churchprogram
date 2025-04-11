<!-- autor: JORGE ARMANDO MUÑOZ O -->                                                
<?php

// PROGRAMA DE FINALIZACION DE SESION
                   
  session_start();
  unset($_SESSION["nombre_usuario"]); 
  unset($_SESSION["tipo_usuario"]);
  unset($_SESSION["autenticado"]);
  session_destroy();

?>
    
        <script type="text/javascript"> 
                  window.location="index.php"; 
        </script>
        <?php
  //header('Location: ../index.php');
?>
