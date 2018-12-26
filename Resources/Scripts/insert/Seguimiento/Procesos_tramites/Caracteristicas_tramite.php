<?php
require '../../../Conect.php';
session_start();
if (!empty($_POST['nombre_tramite'])) {
$nombre_tramite=$_POST['nombre_tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_es'];
}else{
$nombre_tramite=$_POST['tramite'];
$dependencia=$_POST['dependencia'];
$tipo_tramite=$_POST['tipo_tramite'];
$numero_es=$_POST['numero_estacion'];
}
$Consultar_tramites= mysqli_query($conexion, "Select * from estacion_servicio INNER JOIN tramites ON estacion_servicio.id = tramites.id_es where estacion_servicio.es='".$numero_es."' and  tramites.nombre_tramite='".$nombre_tramite."' and tramites.eliminado=0");
$filas_devueltas= mysqli_num_rows($Consultar_tramites);
?>
<div class="div-contenedor-cuerpo">
    <div class="div-subcontenedor" >
        <?php 
        if ($filas_devueltas==0) { ?>
            <div class="alta_tramite" id="form_registro_tramite">   
                <div class="div-contenedor-cuerpo" id="contenedor_alta_tramite_asea">
                    <div class="div-subcontenedor">
                        <h2>Actualmente el tramite no esta dado de Alta</h2>
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <button name="guardar_informacion" class="guardar_informacion"></button>
                            <label for="guardar_informacion" onclick="alta_tramites('<?php echo $nombre_tramite?>','<?php echo $tipo_tramite?>','<?php echo $dependencia?>','<?php echo $numero_es?>')">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>Dar de alta</label>       
                        <?php } ?>         
                    </div>
                </div>
                </div>
        <?php }else{ ?>
            <div id="form_registro_tramite">
                <table class="table_caracteristicas" id="table_caracteristicas">
                    <tr>
                        <th colspan="5" class="Encabezado">Registro</th>
                    </tr> 
                    <tr>
                        <th class="Encabezados_secundarios_table">No.</th>
                        <th class="Encabezados_secundarios_table">Tramite</th>
                        <th class="Encabezados_secundarios_table">Estatus</th>
                        <th class="Encabezados_secundarios_table">Numero de Bitacora</th>
                        <th class="Encabezados_secundarios_table">Eliminar</th>    
                    </tr>
                        <?php while ($resultado= mysqli_fetch_array($Consultar_tramites)){ 
                            $class_name=$resultado['es'].$resultado['id_tramite'];
                            ?>
                    <tr>
                        <td onclick="show_information('<?php echo $resultado['id_tramite']?>')" onmouseover="hover_row('<?php echo $class_name?>','over')" onmouseout="hover_row('<?php echo $class_name ?>','out')" class="<?php echo $class_name?>" >#<?php echo $resultado['id_tramite']?></td>
                        <td onclick="show_information('<?php echo $resultado['id_tramite']?>')" onmouseover="hover_row('<?php echo $class_name?>','over')" onmouseout="hover_row('<?php echo $class_name ?>','out')" class="<?php echo $class_name?>" ><?php echo $resultado['nombre_tramite']?></td>
                        <td onclick="show_information('<?php echo $resultado['id_tramite']?>')" onmouseover="hover_row('<?php echo $class_name?>','over')" onmouseout="hover_row('<?php echo $class_name ?>','out')" class="<?php echo $class_name?>" ><?php echo $resultado['estado_tramite']?></td>
                        <td onclick="show_information('<?php echo $resultado['id_tramite']?>')" onmouseover="hover_row('<?php echo $class_name?>','over')" onmouseout="hover_row('<?php echo $class_name ?>','out')" class="<?php echo $class_name?>" ><?php echo $resultado['num_bitacora']?></td>
                        <td onmouseover="hover_row('<?php echo $class_name?>','over')" onmouseout="hover_row('<?php echo $class_name ?>','out')" class="<?php echo $class_name?>" >
                        <span class="fas fa-times delete_tramite" style="font-size: 19px; color: #f44336" onclick="delete_tramite('<?php echo $resultado['id_tramite']?>','<?php echo $nombre_tramite?>','<?php echo $dependencia?>','<?php echo $tipo_tramite?>','<?php echo $numero_es?>')"></span></td>
                    </tr>
                       <?php } ?>
                    <tr>
                        <td colspan="5">
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <button name="guardar_informacion" class="guardar_informacion"></button>
                            <label for="guardar_informacion" onclick="alta_tramites('<?php echo $nombre_tramite?>','<?php echo $tipo_tramite?>','<?php echo $dependencia?>','<?php echo $numero_es?>')">
                            <svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>Dar de alta</label>       
                        <?php } ?>                 
                        </td>
                    </tr>
                </table>
            </div>
        <?php } ?>
        <div id="Alta_tramites_success" style="display: none"></div>
        <div id="descripcion_de_tramite" style="display: none"></div>
        <div id="update_tramite_answer" style=""></div>
    </div>
</div>