<?php
require '../../../Conect.php';
session_start();
$id_array=array();
$tramites_dependientes=false;
$tramite_dependiente_id=array();
$fechas=array();

if (!empty($_POST['success'])) {
    $numero_es=$_POST['id_tramite'];
}else if (!empty($_POST['tramite'])) {
$nombre_tramite=$_POST['tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_estacion'];
}else{
$nombre_tramite=$_POST['tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_estacion'];
}

$consultar_estaciones_tramites = mysqli_query($conexion, 
        "SELECT * from estacion_servicio INNER JOIN tramites ON "
        . "estacion_servicio.id = tramites.id_es "
        . "where estacion_servicio.es='".$numero_es."' and tramites.eliminado=0");

?>
<div class="div-contenedor-cuerpo">
    <div class="div-subcontenedor" >
        <div id="form_registro_tramite">
            <table class="table_caracteristicas" id="table_caracteristicas">
                    <tr>
                        <th colspan="5" class="Encabezado">Registro</th>
                    </tr> 
                    <tr>
                        <th class="Encabezados_secundarios_table">No.</th>
                        <th class="Encabezados_secundarios_table">Tramite</th>
                        <th class="Encabezados_secundarios_table">Estatus</th>
                        <th class="Encabezados_secundarios_table">Fecha de cumplimiento</th>
                        <th class="Encabezados_secundarios_table">Eliminar</th>    
                    </tr>
<?php 
    while ($resultado= mysqli_fetch_array($consultar_estaciones_tramites)){ 
    array_push($id_array,$resultado['id_tramite']);  
}
    if (!empty($id_array)) {
        $size_array= sizeof($id_array);
        for ($i=0;$i<$size_array;$i++){
            $id_tramite=$id_array[$i];
            $periodo_cumplimiento_query= mysqli_query($conexion, 
                    "SELECT * FROM periodos_cumplimiento INNER JOIN tramites_dependientes ON"
                    . " periodos_cumplimiento.id_periodo = tramites_dependientes.id_periodo "
                    . "WHERE periodos_cumplimiento.id_tramite='".$id_tramite."'");
            $filas_devueltas_IJ_pc_ON_td= mysqli_num_rows($periodo_cumplimiento_query);

            if ($filas_devueltas_IJ_pc_ON_td>0) {
                
                while ($resultado_td= mysqli_fetch_array($periodo_cumplimiento_query)){
                    $class_name=$numero_es.$resultado_td['id_td'];
                    ?>
                <tr>
                    <td onclick="show_tramites_dependientes_content('<?php echo $resultado_td['id_td']?>')" 
                        onmouseover="hover_row('<?php echo $class_name?>','over')" 
                        onmouseout="hover_row('<?php echo $class_name ?>','out')" 
                        class="<?php echo $class_name?>" >#<?php echo $resultado_td['id_td']?></td>
                    
                    <td onclick="show_tramites_dependientes_content('<?php echo $resultado_td['id_td']?>')" 
                        onmouseover="hover_row('<?php echo $class_name?>','over')" 
                        onmouseout="hover_row('<?php echo $class_name ?>','out')" 
                        class="<?php echo $class_name?>" ><?php echo $resultado_td['nombre_tramite_td']?></td>
                    
                    <td onclick="show_tramites_dependientes_content('<?php echo $resultado_td['id_td']?>')" 
                        onmouseover="hover_row('<?php echo $class_name?>','over')" 
                        onmouseout="hover_row('<?php echo $class_name ?>','out')" 
                        class="<?php echo $class_name?>" ><?php echo $resultado_td['estado_tramite_td']?></td>
                    
                    <td onclick="show_tramites_dependientes_content('<?php echo $resultado_td['id_td']?>')" 
                        onmouseover="hover_row('<?php echo $class_name?>','over')" 
                        onmouseout="hover_row('<?php echo $class_name ?>','out')" 
                        class="<?php echo $class_name?>" ><?php echo $resultado_td['fecha_cumplimiento']?></td>
                    
                    <td onmouseover="hover_row('<?php echo $class_name?>','over')" 
                        onmouseout="hover_row('<?php echo $class_name ?>','out')" 
                        class="<?php echo $class_name?>" > <span class="fas fa-times delete_tramite" 
                          style="font-size: 19px; color: #f44336" 
                          onclick="delete_tramite('<?php echo $resultado_td['id_tramite']?>','<?php echo $nombre_tramite?>',
                                                  '<?php echo $dependencia?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>')"></span></td>
                </tr>                     
                    <?php
                }                
            }
        }
    }
?>          </table>
        </div>
                <div id="Alta_tramites_success" style="display: none"></div>
        <div id="descripcion_de_tramite" style="display: none"></div>
        <div id="update_tramite_answer" style=""></div>
    </div>    
</div>



