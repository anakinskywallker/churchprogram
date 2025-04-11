<?php
session_start();

include ("conexion.php"); 
if(isset($_POST['login'])){
  $username = $_POST['user'];
  $contra = $_POST['pass'];
  
  $passCodificado = md5($contra);
  
  $mysqli = new mysqli($host, $user, $pw, $db);
                
  $sql = "SELECT * from personal where EMP_LOGIN_NOMBRE='$username'";
  $result1 = $mysqli->query($sql);
  $row1 = $result1->fetch_array(MYSQLI_NUM);
  $numero_filas = $result1->num_rows;
  
     
  if ($numero_filas > 0)
    {
      $password = $row1[9]; 
      $habilitado = $row1[10];
    
      if($habilitado == '1'){
        
        if ($password == $contra)      
          {      
                $_SESSION["autenticado"]= "SI";
                $tipo_usuario = $row1[6];
                $nombre_usuario = $row1[1];
                $_SESSION["Usuario"] = $username;
                
                //revisar que puede afectar
                if ($tipo_usuario == 1){
                      $_SESSION["tipo_usuario"]= "Administrador";
                      $_SESSION["nombre_usuario"]= $nombre_usuario; 
  
                        ?>
        
                      <script type="text/javascript"> 
                                window.location="admin/admin.php"; 
                      </script>
                      <?php
                           
                }
                if ($tipo_usuario == 2){
                      $_SESSION["tipo_usuario"]= "gestror";
                      $_SESSION["nombre_usuario"]= $nombre_usuario; 

                        ?>
        
                      <script type="text/javascript"> 
                                window.location="admin/gestor.php"; 
                      </script>
                      <?php
                    
                }
                if ($tipo_usuario == 3){
                        $_SESSION["tipo_usuario"]= "lector";
                        $_SESSION["nombre_usuario"]= $nombre_usuario; 
                          ?>
          
                        <script type="text/javascript"> 
                                  window.location="../Panadero/panadero.php"; 
                        </script>
                        <?php
                                
                    
                }
         }
         else{
          echo'<script type="text/javascript">
          alert("Usuario o contraseña incorrecta");      
         </script>
         <script type="text/javascript"> 
                            window.location="index.php"; 
                  </script>
         ';
               
         }
  	  }
      
      else{
        echo'<script type="text/javascript">
                                alert("Usuario Suspendido");
                                window.location="index.php"; 
         </script>';
       } 
  
    } 
    else{
        echo'<script type="text/javascript">
                              alert("Usuario no encontrado");
                              window.location="index.php"; 
                              
                              
      </script>';
    }
 }
 else{
    
  echo'<script type="text/javascript">
  alert("No existe una conexion con la BD");
 
  </script>';

 }

?>