<?php
include '../../../Conect.php';
$numero_tramite=$_POST['numero_tramite'];
$nombre_tramite=$_POST['nombre_tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_es']; 
$baja_tramite= mysqli_query($conexion, "update tramites set eliminado=1 where id_tramite='".$numero_tramite."'");
if ($baja_tramite) {
    ?> 
<script>
alertify.success('<div class=\"text_to_white\">Baja Realizada</div>');
</script>
<script>
    reload_page('<?php echo $nombre_tramite?>','<?php echo $dependencia?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>');
    </script>
    <?php
    
        
}else{
    ?> 
<script>
alertify.error('<div class=\"text_to_white\">No se realizo la baja del tramite</div>');
</script>
    <?php    
}