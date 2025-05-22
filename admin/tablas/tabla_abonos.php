<?php 
session_start();
require_once "../php/conexion.php";
$conexion = conexion();
$nombre_usuario = $_SESSION["nombre_usuario"];

$sql3 = "SELECT * FROM auxsg WHERE USUARIO = '$nombre_usuario'"; 
$result3 = mysqli_query($conexion, $sql3);
$var = mysqli_fetch_row($result3);
$id_turno = $var[1];

$sql2 = "SELECT * FROM cementerio
WHERE id_factura = '$id_turno'
ORDER BY abono_fecha DESC"; // mostrar en orden desde el primer abono

$result2 = mysqli_query($conexion, $sql2);
?>

<script src="../librerias/alertifyjs/alertify.js"></script>  

<label>Factura N°: <?php echo $id_turno; ?></label>

<table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>#</th> <!-- número de abono -->
            <th>Observación</th>
            <th>Valor abonado</th>
            <th>Saldo restante</th>
            <th>Fecha de abono</th>
        </tr>
    </thead>
    <tbody> 
        <?php 
        $total= 0;
        $contador = 1;
        while($ver = mysqli_fetch_assoc($result2)) { 
        ?>
            <tr>
                <td><?php echo $contador++; ?></td>
                <td><?php echo $ver['observacion']; ?></td>
                <td><?php echo number_format($ver['abono_valor'], 0, ',', '.'); ?></td>
                <td><?php echo number_format($ver['abono_saldo'], 0, ',', '.'); ?></td>
                <td><?php echo $ver['abono_fecha']; ?></td>
            </tr>
        <?php 
        $total = $total + $ver['abono_valor'];
        }

        ?>
    </tbody>
</table>
<div class="row">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-6 col-md-12 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-s font-weight-bold text-success text-uppercase mb-1">
                            Total Abonos</div>
                        <div class="h4 mb-0 font-weight-bold text-gray-800"><?php echo "$ ".number_format($total) ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
