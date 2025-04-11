<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
$usuario = $_SESSION["nombre_usuario"];
?>

<script src="../../librerias/jquery-3.2.1.min.js"></script>
<script src="../../librerias/alertifyjs/alertify.js"></script>  
<script src="../js/funciones.js"></script>
        <div class="row">
                       <!-- Content Column -->
                <div class="col-lg-12 mb-4">
                            <!-- Approach -->
                    <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Informacion Turno</h6> 
                                </div>
                                
                        <div class="card-body"> <!-- area de ingreso de datos -->
                        <form id="formulario" class="row g-3" enctype="multipart/form-data"  method="post">
                                                    <div class="col-4">
                                                            <label for="inputAddress" class="form-label">Subir Documentos 1</label>
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" id="inputDocumentos1" name="documentos[]">
                                                            </div>
                                                    </div>
                                                    <div class="col-4">
                                                            <label for="inputAddress" class="form-label">Subir Documentos 2</label>
                                                            <div class="input-group mb-3">
                                                                <input type="file" class="form-control" id="inputDocumentos2" name="documentos[]">
                                                            </div>
                                                    </div>
                                                    <div class="col-4">
                                                            <label for="inputAddress" class="form-label">Subir Documentos 3</label>
                                                            <div class="input-group mb-3">
                                                                 <input type="file" class="form-control" id="inputDocumentos3" name="documentos[]">
                                                            </div>
                                                    </div>
                                                    <div style="display: block;" id="subirdocu" class="col-12">
                                                            <button id="subirdocumentos" type="button" style="margin-bottom: 10px;" class="btn btn-primary">Subir Documentos</button>
                                                    </div>
                                                    <div style="display: none;" id="docusubido" class="col-12">
                                                            <button id="subirdocumentosgreen" type="button" style="margin-bottom: 10px;" class="btn btn-primary-green">Documento Subido</button>
                                                    </div>
                            </form>
                            <form id="formulario" class="row g-3" enctype="multipart/form-data"  method="post">
                                                    <div id="" class="col-md-4 mb-3">
                                                        <label for="inputName" class="form-label">Identificador único cliente</label>
                                                        <input type="text" class="form-control" id="idcliente" readonly placeholder="<?php 
                                                            $sqlr = "SELECT * FROM busquedas WHERE USUARIO = '$usuario'";
                                                            $result = mysqli_query($conexion, $sqlr);
                                                            $fila = mysqli_fetch_row($result);
                                                            if ($fila[3] == null) {
                                                                    echo 'El cliente no existe en nuestra base de datos';
                                                            } else {
                                                                    echo 'CL'.$fila[3];
                                                            }
                                                            ?>">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                            <label for="inputEmail4" class="form-label">Abono del turno</label>
                                                            <input type="text" class="form-control" id="inputPago">
                                                    </div>
                                                    <div class="col-md-4 mb-3">
                                                            <label for="inputPassword4" class="form-label">Precio del turno</label>
                                                            <input type="text" class="form-control" id="inputPrecio">
                                                    </div>
                                                    <div class="col-12 mb-3">
                                                            <button id="crearTurno" type="submit" style="margin-bottom: 10px;" class="btn btn-primary">Crear turno</button>
                                                    </div>
                            </form>
                        </div>                                        
                    </div>    
                </div> 
        </div>

<script type="text/javascript">

$(document).ready(function(){
$('#crearTurno').click(function(){ 

idcliente=<?php if($fila[3] == null) {echo 333;} else {echo $fila[3];}?>;  
if(idcliente == 333){
    alert('No a seleccionado un cliente valido');
}else{    
usuario = '<?php echo $usuario?>';
crearturno(usuario, idcliente) 
}               
});
});
$(document).ready(function(){
  $('#subirdocumentos').click(function(){
    const fileInputs = document.querySelectorAll('input[name="documentos[]"]');
    const fileNames = [];
    const formData = new FormData();
    const divSubido = document.querySelector('#docusubido');
    const divNoSubido = document.querySelector('#subirdocu');

    fileInputs.forEach((input, index) => {
      const files = input.files;
      const file = input.files[0];

      if (file) {
        fileNames.push(file.name);
      }
   

      for (let i = 0; i < files.length; i++) {
        formData.append(`documentos[]`, files[i]);
      }
    });

    console.log(fileNames);

    if (formData.entries().next().done) {
      alert('Por favor, selecciona al menos un archivo y llene los campos de pago y precio');
      return;
    }

    fetch('php/procesar_formulario.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (!response.ok) {
        throw new Error('Error al subir archivos.');
      }
      return response.text();
    })
    .then(data => {
      alert(data);
      divSubido.style.display = 'block';
      divNoSubido.style.display = 'none';
      guardarRutas(fileNames[0], fileNames[1], fileNames[2]);     
    })
    .catch(error => {
      console.error(error);
      alert('Error al subir archivos.');
    });
    
  });
  
});

</script>
