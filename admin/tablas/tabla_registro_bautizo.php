<?php 
session_start();
require_once "../php/conexion.php";
$conexion=conexion();
    
    $sql="SELECT 
    r.id_registro,
    r.id_tipo_ingreso,    
    r.libro_reg,
    r.folio_reg,
    r.numero_reg,
    r.nombre_apellido,
    r.lugar_nacimiento,
    r.fecha_nacimiento,
    r.edad,
    r.nombre_padre,
    r.nombre_madre,
    r.nombre_padrino,
    r.nombre_madrina,
    r.abuelos_paternos,
    r.abuelos_maternos,
    r.fecha_misa,
    r.hora_misa,
    r.lugar_evento,
    r.causa,
    r.ultimos_sacramentos,
    r.ministro,
    r.lugar_bautismo_cnf,
    r.fecha_bautismo_cnf,
    r.informacion_bautismo,
    r.biagrafia,
    ti.nombre_tipo
FROM registro r
JOIN tipo_ingreso ti 
ON r.id_tipo_ingreso = ti.id_tipo_ingreso
WHERE r.id_tipo_ingreso = 8
ORDER BY r.id_registro DESC;";
    
    
?>
<script src="js/funciones.js"></script>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
       <thead>
        <tr>
            <th>Descargar</th>
            <th>Registrar</th>
            <th>Tipo de Sacramento</th>
            <th>Libro</th>
            <th>Folio</th>
            <th>Número Registro</th>
            <th>Nombre_y_Apellido</th>
            <th>Lugar Nacimiento</th>
            <th>Fecha Nacimiento</th>
            <th>Nombre Padre</th>
            <th>Nombre Madre</th>
            <th>Nombre Padrino</th>
            <th>Nombre Madrina</th>
            <th>Abuelos Paternos</th>
            <th>Abuelos Maternos</th>
            <th>Ministro</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
            <th>Descargar</th>
            <th>Registrar</th>
            <th>Tipo de Sacramento</th>
            <th>Libro</th>
            <th>Folio</th>
            <th>Número Registro</th>
            <th>Nombre_y_Apellido</th>
            <th>Lugar Nacimiento</th>
            <th>Fecha Nacimiento</th>
            <th>Nombre Padre</th>
            <th>Nombre Madre</th>
            <th>Nombre Padrino</th>
            <th>Nombre Madrina</th>
            <th>Abuelos Paternos</th>
            <th>Abuelos Maternos</th>
            <th>Ministro</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $result = mysqli_query($conexion, $sql);
        while($ver = mysqli_fetch_row($result)){
            $datos=$ver[0]."||".
            $ver[2]."||".
            $ver[3]."||".
            $ver[4]."||";    
        ?>
        <tr>
    <td><button onclick="imprimirBoleta4(this)" type="button" class="btn btn-primary btn-sm">Descargar</button></td>
    <td> <button data-toggle="modal" data-target="#modregistro" onclick="formaregistro('<?php echo $datos?>')" type="button" class="btn btn-primary btn-sm">Registrar</button></td>
    <td data-label="Tipo de Sacramento"><?php if($ver[1]==4 || $ver[1]==5){echo 'Boleta Defuncion';}else{echo $ver[25];}?></td> 
    <td data-label="Libro">             <?php echo $ver[2]?></td> 
    <td data-label="Folio">             <?php echo $ver[3]?></td> 
    <td data-label="Número Registro">   <?php echo $ver[4]?></td> 
    <td data-label="Nombre y Apellido"> <?php echo $ver[5]?></td> 
    <td data-label="Lugar Nacimiento">  <?php echo $ver[6]?></td> 
    <td data-label="Fecha Nacimiento">  <?php echo $ver[7]?></td>
    <td data-label="Nombre Padre">      <?php echo $ver[9]?></td>
    <td data-label="Nombre Madre">      <?php echo $ver[10]?></td>  
    <td data-label="Nombre Padrino">    <?php echo $ver[11]?></td>
    <td data-label="Nombre Madrina">    <?php echo $ver[12]?></td> 
    <td data-label="Abuelos Paternos">  <?php echo $ver[13]?></td> 
    <td data-label="Abuelos Maternos">  <?php echo $ver[14]?></td> 
    <td data-label="Ministro">          <?php echo $ver[20]?></td>   
</tr>

        <?php } ?>
    </tbody>    
</table>

                                       
    </tbody>
</table>
<script>

</script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>




<!-- Plugin AutoTable para jsPDF -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>


    <script src="../../componentes/vendor/jquery/jquery.min.js"></script>
    <script src="../componentes/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../componentes/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../componentes/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../../componentes/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="../../componentes/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../componentes/js/demo/datatables-demo.js"></script>
 


