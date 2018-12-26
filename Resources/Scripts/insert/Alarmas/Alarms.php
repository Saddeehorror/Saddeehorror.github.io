<?php
/* Fecha actual-----------------------------------------------------------------*/

$Mes_actual=date("m");
$Dia_actual=date("d");
$Año_actual=date("Y");
$hoy = date("Y-m-d"); 
/*Verificar si es usuario o cliente*/
if ($_SESSION['session_group'] != 3) {
   $query_estacion_servicio="SELECT * FROM estacion_servicio"; 
}else{
    require_once 'insert/mysqli-scripts/scriptsmysql.php';
$id_gpo=consultar_id_gpo_corp($_SESSION['session_id'],$conexion);

$query_estacion_servicio="SELECT * FROM estacion_servicio where id_gpo='".$id_gpo."'";
}


$SELECT_Estacion_Servicio= mysqli_query($conexion, $query_estacion_servicio);
while ($row_SELECT_Estacion_Servicio = mysqli_fetch_array($SELECT_Estacion_Servicio, MYSQLI_ASSOC)) {
  $var_SELECT_Estacion_Servicio=$row_SELECT_Estacion_Servicio['id'];
  $var_SELECT_Estacion_Servicio_numes=$row_SELECT_Estacion_Servicio['es'];
  
$SELECT_Alarmas_Sasisopa= mysqli_query($conexion, "SELECT * FROM alarmas_sasisopa where id_es='".$var_SELECT_Estacion_Servicio."'");
    while ($row_SELECT_Alarmas_Sasisopa = mysqli_fetch_array($SELECT_Alarmas_Sasisopa, MYSQLI_ASSOC)){
        $var_id_alarmas_sasisopa=$row_SELECT_Alarmas_Sasisopa['id_alarma'];
        $var_Primer_mes=$row_SELECT_Alarmas_Sasisopa['Primer_mes'];
        $var_Primer_año=$row_SELECT_Alarmas_Sasisopa['Primer_año'];
        $var_Segundo_mes=$row_SELECT_Alarmas_Sasisopa['Segundo_mes'];
        $var_Segundo_año=$row_SELECT_Alarmas_Sasisopa['Segundo_año'];        
        $var_Tercer_mes=$row_SELECT_Alarmas_Sasisopa['Tercer_mes'];
        $var_Tercer_año=$row_SELECT_Alarmas_Sasisopa['Tercer_año'];        
        }
        
if ($Mes_actual==$var_Primer_mes) {
$mes=$var_Primer_mes;
$año=$var_Primer_año;
}elseif ($Mes_actual==$var_Segundo_mes) {
$mes=$var_Segundo_mes;
$año=$var_Segundo_año;
}elseif ($Mes_actual==$var_Tercer_mes) {
$mes=$var_Tercer_mes;
$año=$var_Tercer_año;
}else{
$mes='';
$año='';}   


if ($mes != '') {
    if ($mes != $var_Tercer_mes) {
        if ($_SESSION['session_group'] != 3) {
           $query_fechas_alarma= "SELECT * FROM fechas_alarmas where MONTH(fecha)= $mes  and YEAR(fecha)= $año and id_alarma='".$var_id_alarmas_sasisopa."'";
        }else{
           $query_fechas_alarma= "SELECT * FROM fechas_alarmas where MONTH(fecha)= $mes  and YEAR(fecha)= $año and estado=false and id_alarma='".$var_id_alarmas_sasisopa."'";
        }
    $SELECT_FECHAS_ALARMA = mysqli_query($conexion, $query_fechas_alarma);    
                while ($row_SELECT_FECHAS_ALARMA = mysqli_fetch_array($SELECT_FECHAS_ALARMA, MYSQLI_ASSOC)) {

            if ($hoy == $row_SELECT_FECHAS_ALARMA['fecha']) {
            $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"); 
            $mensaje="Apartir del 01 de ".$meses[intval($var_Tercer_mes)-1]." del ".$var_Tercer_año." se debera de realizar el Registro de Sasisopa para la estacion ".$var_SELECT_Estacion_Servicio_numes;   
                    ?>
        <script language="javascript">
            alarmas_sistema('Notificación Sasisopa','<?php echo $mensaje?>');
            badge_mensaje('Notificación Sasisopa','<?php echo $mensaje?>');
        </script>
                    <?php                
            }

            // echo '<script language="javascript">alert("'.$row_SELECT_FECHAS_ALARMA['fecha'].'");</script>';   
        }
    } else {
        $query_verificar_alta_sasisopa= mysqli_query($conexion, "SELECT * from tramites_asea where tipo_tramite='SASISOPA' and id_es='".$var_SELECT_Estacion_Servicio."'");
        
      /*  while ($row_SELECT_FECHAS_ALARMA = mysqli_fetch_array($query_verificar_alta_sasisopa, MYSQLI_ASSOC)) {
            echo '<script language="javascript">alert("'.$row_SELECT_FECHAS_ALARMA['id_tramite'].'");</script>';
        } */
        
                    $mensaje="Apartir del hoy se debera de realizar el Registro de Sasisopa para la estacion ".$var_SELECT_Estacion_Servicio_numes;                   
                    ?>
        <script language="javascript">
            alarmas_sistema('Notificación Sasisopa','<?php echo $mensaje?>');
            badge_mensaje('Notificación Sasisopa','<?php echo $mensaje?>');
        </script>
                    <?php 
    }
}
}