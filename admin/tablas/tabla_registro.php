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
    r.fecha_muerte,
    r.edad,
    r.estado_civil,
    r.nombre_conyugue,
    r.nombre_hijos,
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
WHERE r.id_tipo_ingreso IN (4, 5, 8, 9, 10, 11)
ORDER BY r.id_registro DESC;";
    
    
?>
<script src="js/funciones.js"></script>

<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    
       <thead>
        <tr>
            <th>Descargar</th>
            <th>Tipo de Sacramento</th>
            <th>Libro</th>
            <th>Folio</th>
            <th>Número Registro</th>
            <th>Nombre_y_Apellido</th>
            <th>Lugar Nacimiento</th>
            <th>Fecha Nacimiento</th>
            <th>Fecha Muerte</th>
            <th>Edad</th>
            <th>Estado Civil</th>
            <th>Nombre Conyugue</th>
            <th>Nombre Hijos</th>
            <th>Nombre Padre</th>
            <th>Nombre Madre</th>
            <th>Nombre Padrino</th>
            <th>Nombre Madrina</th>
            <th>Abuelos Paternos</th>
            <th>Abuelos Maternos</th>
            <th>Fecha Misa</th>
            <th>Hora Misa</th>
            <th>Lugar Evento</th>
            <th>Causa</th>
            <th>Últimos Sacramentos</th>
            <th>Ministro</th>
            <th>Lugar Bautismo/Cnf</th>
            <th>Fecha Bautismo/Cnf</th>
            <th>Información Bautismo</th>
            <th>Biografía</th>
        </tr>
    </thead>
    <tfoot>
    <tr>
            <th>Descargar</th>
            <th>Tipo de Sacramento</th>
            <th>Libro</th>
            <th>Folio</th>
            <th>Número Registro</th>
            <th>Nombre_y_Apellido</th>
            <th>Lugar Nacimiento</th>
            <th>Fecha Nacimiento</th>
            <th>Fecha Muerte</th>
            <th>Edad</th>
            <th>Estado Civil</th>
            <th>Nombre Conyugue</th>
            <th>Nombre Hijos</th>
            <th>Nombre Padre</th>
            <th>Nombre Madre</th>
            <th>Nombre Padrino</th>
            <th>Nombre Madrina</th>
            <th>Abuelos Paternos</th>
            <th>Abuelos Maternos</th>
            <th>Fecha Misa</th>
            <th>Hora Misa</th>
            <th>Lugar Evento</th>
            <th>Causa</th>
            <th>Últimos Sacramentos</th>
            <th>Ministro</th>
            <th>Lugar Bautismo/Cnf</th>
            <th>Fecha Bautismo/Cnf</th>
            <th>Información Bautismo</th>
            <th>Biografía</th>
        </tr>
    </tfoot>
    <tbody>
        <?php
        $result = mysqli_query($conexion, $sql);
        while($ver = mysqli_fetch_row($result)){
        ?>
        <tr>
    <td><button onclick="imprimirBoleta4(this)" type="button" class="btn btn-primary btn-sm">Descargar</button></td>
    <!--   <td><button onclick="realizarAccion(<?php echo $ver[0]; ?>)" type="button" class="btn btn-primary btn-sm">Mirar</button></td> -->

    <td data-label="Tipo de Sacramento"><?php if($ver[1]==4 || $ver[1]==5){echo 'Boleta Defuncion';}else{echo $ver[29];}?></td> 
    <td data-label="Libro">             <?php echo $ver[2]?></td> 
    <td data-label="Folio">             <?php echo $ver[3]?></td> 
    <td data-label="Número Registro">   <?php echo $ver[4]?></td> 
    <td data-label="Nombre y Apellido"> <?php echo $ver[5]?></td> 
    <td data-label="Lugar Nacimiento">  <?php echo $ver[6]?></td> 
    <td data-label="Fecha Nacimiento">  <?php echo $ver[7]?></td> 
    <td data-label="Fecha Muerte">      <?php echo $ver[8]?></td> 
    <td data-label="Edad">              <?php echo $ver[9]?></td> 
    <td data-label="Estado Civil">      <?php echo $ver[10]?></td> 
    <td data-label="Nombre Conyugue">   <?php echo $ver[11]?></td> 
    <td data-label="Nombre Hijos">      <?php echo $ver[12]?></td> 
    <td data-label="Nombre Padre">      <?php echo $ver[13]?></td>
    <td data-label="Nombre Madre">      <?php echo $ver[14]?></td>  
    <td data-label="Nombre Padrino">    <?php echo $ver[15]?></td>
    <td data-label="Nombre Madrina">    <?php echo $ver[16]?></td> 
    <td data-label="Abuelos Paternos">  <?php echo $ver[17]?></td> 
    <td data-label="Abuelos Maternos">  <?php echo $ver[18]?></td> 
    <td data-label="Fecha Misa">        <?php echo $ver[19]?></td> 
    <td data-label="Hora Misa">         <?php echo $ver[20]?></td>
    <td data-label="Lugar Evento">      <?php echo $ver[21]?></td> 
    <td data-label="Causa">             <?php echo $ver[22]?></td> 
    <td data-label="Últimos Sacramentos"><?php echo $ver[23]?></td> 
    <td data-label="Ministro">          <?php echo $ver[24]?></td> 
    <td data-label="Lugar Bautismo/Cnf"><?php echo $ver[25]?></td> 
    <td data-label="Fecha Bautismo/Cnf"><?php echo $ver[26]?></td> 
<td data-label="Información Bautismo">  <?php echo $ver[27]?></td>
    <td data-label="Biografia">         <?php echo $ver[28]?></td>      
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
 


