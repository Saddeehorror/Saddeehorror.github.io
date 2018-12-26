<?php
require '../../../Conect.php';
date_default_timezone_set("America/Mexico_City");
$fecha_actual=date("d/m/Y-H:i:s");
$fecha_sistema= date("m/Y");
$nombre_tramite=$_POST['tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_es']; 
$estatus_tramite="En espera de ser ingresado en dependencia";


$consultar_estacion_servicio= mysqli_query($conexion, "Select * from estacion_servicio where es='".$numero_es."'");
while ($resultado= mysqli_fetch_array($consultar_estacion_servicio)){
    $id_estacion=$resultado['id'];
}

$alta_tramite= mysqli_query($conexion, "Insert into tramites (tipo_tramite,nombre_tramite,estado_tramite,fecha_ingreso_sistema,id_es) values ('$tipo_tramite','$nombre_tramite','En espera de ser ingresado en dependencia','$fecha_actual','$id_estacion')");

if ($alta_tramite) {
    ?>
    <script>
    reload_page('<?php echo $nombre_tramite?>','<?php echo $dependencia ?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>');
    </script>

    <script>
    alta_exitosa('<?php echo $nombre_tramite?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>');
    </script>
    
    <script>
    paint_rows('<?php echo $nombre_tramite?>','En espera de ser ingresado en dependencia','<?php echo $numero_es?>','<?php echo $fecha_sistema?>');
    </script> 
        <?php
    
}else{
    ?><script>
    alta_fracasada('<?php echo $nombre_tramite?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>');
    </script><?php
}