<?php
/****** INFORMACION EN ALCANCE ****/
$query_informacion_alcance = mysqli_query($conexion, "Select * from informacion_alcance_asea where id_tramite='".$num_tramite."'");
$rows_informacion_alcance= mysqli_num_rows($query_informacion_alcance);
if ($rows_informacion_alcance >0) {
 ?>
<script>
    show_informacion_alcance("Acuerdo de apercibimiento");
</script>
<?php

while ($resultado_informacion_alcance = mysqli_fetch_array($query_informacion_alcance)) {
$num_info = $resultado_informacion_alcance['id'];
$dias_habiles = $resultado_informacion_alcance['tiempo_contestacion'];
$fecha_reingreso_asea = $resultado_informacion_alcance['fecha_reingreso_asea'];
$sello_recibido=$resultado_informacion_alcance['sello_de_recibido'];
$fecha_reaparicion_boletin=$resultado_informacion_alcance['fecha_reaparicion_boletin'];
$fecha_rerecepcion=$resultado_informacion_alcance['fecha_recepcion'];
$num_oficio_resultante=$resultado_informacion_alcance['no_resolutivo'];
$tipo_resolutivo=$resultado_informacion_alcance['resolutivo_desechamiento'];
}

}else{
 $num_info = "";
$dias_habiles = "";
$fecha_reingreso_asea = "";
$sello_recibido= "";
$fecha_reaparicion_boletin= "";
$fecha_rerecepcion= "";
$num_oficio_resultante= "";
$tipo_resolutivo= "";  
}
/****** FIN INFORMACION EN ALCANCE ****/