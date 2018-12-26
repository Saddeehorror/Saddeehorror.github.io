<?php
require './funciones_tramite.php';
session_start();
if (!empty($_POST['id_tramite']) || !empty($_POST['success'])) {
    require '../../../Conect.php';
    $id_tramite = $_POST['id_tramite'];
   $Consultar_tramites = mysqli_query($conexion, "Select * from estacion_servicio "
           . "INNER JOIN tramites ON estacion_servicio.id = tramites.id_es "
           . "where tramites.id_tramite='" . $id_tramite . "'");
} else {
   $Consultar_tramites = mysqli_query($conexion, "Select * from estacion_servicio "
           . "INNER JOIN tramites ON estacion_servicio.id = tramites.id_es "
           . "where tramites.nombre_tramite='" . $nombre_tramite . "' and tramites.id_es='" . $id_estacion . "' and tramites.fecha_ingreso_sistema='" . $fecha_actual . "'");
}
while ($resultado = mysqli_fetch_array($Consultar_tramites)) {
    $num_tramite = $resultado['id_tramite'];
    $tipo_tramite = $resultado['tipo_tramite'];
    $nombre_tramite = $resultado['nombre_tramite'];
    $estatus_tramite = $resultado['estado_tramite'];
    $fecha_Alta_sistema = $resultado['fecha_ingreso_sistema'];
    $fecha_ingreso_dependencia = $resultado['fecha_ingreso_asea'];
    $bitacora = $resultado['num_bitacora'];
    $acuce_recibo = $resultado['acuce_de_recibo'];
    $fecha_boletin = $resultado['fecha_aparicion_boletin'];
    $fecha_recepcion = $resultado['fecha_recepcion_notificacion'];
    $num_oficio = $resultado['num_oficio'];
    $respuesta_tramite = $resultado['respuesta'];
    $fecha_entrega = $resultado['fecha_entrega'];
    $relacion_estacion = $resultado['id_es'];

    $nombre_estacion = $resultado['nombre_es'];
    $numero_es = $resultado['es'];
    $id_gpo = $resultado['id_gpo'];
}

$nombre_tramite_str = tramite_name($nombre_tramite);
$razon_social = get_razon_social($id_gpo,$conexion);

require './ext_info/informacion_alcance_query.php';

/***** Periodo de cumplimiento *****/
?>
<div>
    <form name="actualizar_tramite" id="actualizar_tramite" method="post" class="actualizar_tramite" enctype="multipart/form-data" onsubmit="return update_tramite('Update_tramite','actualizar_tramite')">
        <input type="hidden" value="<?php echo $num_tramite?>" name="numero_tramite">
    <table class="table_caracteristicas" id="descripcion_tramite">
        <tr>
            <th Colspan = "2" class="Encabezado"><?php echo $nombre_tramite_str ?> </th>
        </tr>
        <tr> 
            <th class="Encabezados_secundarios"><?php echo $nombre_estacion; ?></th>
            <th class="Encabezados_secundarios"><?php echo $numero_es; ?></th> 
        </tr>
        <tr>
            <td>Estado de tramite:</td>
            <td><select disabled id="estado_tramite_update" name="estado_tramite_update" onchange="estado_tramite(this.value,'<?php echo $nombre_tramite?>')">
                    <option><?php echo $estatus_tramite?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td>N° Tramite:</td>
            <td class="table_data">#<?php echo $num_tramite?></td>
        </tr>
        <tr>
            <td>Fecha de Alta en el sistema:</td>
            <td class="table_data"><?php echo $fecha_Alta_sistema ?></td>
        </tr>
        <tr> <!--INICIO PARTE 1-->
            <td>Fecha de Ingreso en Asea:</td>
            <td class="table_data"><input type="date" disabled value="<?php echo $fecha_ingreso_dependencia?>" id="input_fecha_ingreso_dependencia" name="input_fecha_ingreso_dependencia"></td>
        </tr>
        <tr>
            <td>No. Bitacora</td>
            <td class="table_data"><input type="text" disabled value="<?php echo $bitacora?>" id="input_no_bitacora" name="input_no_bitacora"></td>
        </tr>
        <tr>
            <td>Acuce de Recibo: <br>
                <input type="file" disabled id="file_acuce_recibo"  name="file_acuce_recibo" class="inputfile_caracteristicastramite_disabled" onchange="file_name('file_acuce_recibo', 'show_name_acuce_recibo')" >
                <label  for="file_acuce_recibo" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                                
            </td>
            <?php 
            if ($acuce_recibo==null) { ?>
           <td class="table_data" id="show_name_acuce_recibo"></td>     
           <?php
           }else{ ?>
           <td class="table_data" id="show_name_acuce_recibo">
            <span  class="far fa-file-pdf" ></span>
            <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $razon_social?>/ES/E.S.<?php echo $numero_es ?>/Tramites/<?php echo $acuce_recibo ?>')"><?php echo $acuce_recibo ?> </span></td>     
          <?php  }
            ?>
            
        </tr><!--FIN PARTE 1-->
        <tr><!--INICIO PARTE 2-->
            <td>Fecha de aparición en el boletin de notificaciones:</td>
            <td class="table_data"><input type="date" disabled id="fecha_aparicion_boletin" name="fecha_aparicion_boletin" value="<?php echo $fecha_boletin ?>"></td>
        </tr><!--FIN PARTE 2-->
        <tr><!-- INICIO PARTE 3-->
            <td>Fecha de recepción de la notificación o resolutivo:</td>
            <td class="table_data"><input type="date" disabled id="fecha_recepcion_respuesta" name="fecha_recepcion_notificacion" value="<?php echo $fecha_recepcion?>"></td>
        </tr>
        <tr>
            <td>No. oficio:</td>
            <td class="table_data"><input type="text" disabled id="num_oficio" name="num_oficio" value="<?php echo $num_oficio ?>"></td>
        </tr>
        <tr>
            <td>Respuesta: <br>
                <input type="file" disabled="true" id="file_respuesta"  name="file_respuesta" class="inputfile_caracteristicastramite_disabled" onchange="file_name('file_respuesta', 'show_name_respuesta')" >
                <label  for="file_respuesta" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                                         
            </td>
            <?php            if ($respuesta_tramite==null) { ?>
            <td class="table_data" id="show_name_respuesta"></td>
           <?php
           }else{ ?>
            <td class="table_data" id="show_name_respuesta">
            <span  class="far fa-file-pdf" ></span>
            <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $razon_social?>/ES/E.S.<?php echo $numero_es ?>/Tramites/<?php echo $respuesta_tramite ?>')"><?php echo $respuesta_tramite ?> </span></td>     
                <?php  }
            ?>
            
        </tr>
        <?php 

         include './stages/Informacion_alcance.php';
         include './stages/Resolutivo.php';
        
        if ($_SESSION['session_group'] != 3) { ?>
        <tr id="save_info_1">
            <td colspan="2">
                <input type="submit" id="guardar_informacion" name="guardar_informacion" class="guardar_informacion" >
                <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
            </td>
        </tr>
        <?php }

        ?> 
        
    </table>
    </form>
</div>
<?php
 if ($_SESSION['session_group'] != 3) {

if ($fecha_ingreso_dependencia==NULL) { ?>
    <script>
        enable_table_inputs("seccion1"); 
    </script>

<?php }else if ($fecha_boletin==NULL){
?>
    <script>
        enable_table_inputs("seccion2"); 
    </script>
<?php    
}else if ($fecha_recepcion==NULL){
?>
    <script>
        enable_table_inputs("seccion3"); 
    </script>
<?php      
 }else if ($rows_informacion_alcance>0){
    if ($fecha_reingreso_asea==NULL) {
        ?>
        <script>
            enable_table_inputs("seccion4"); 
        </script>
        <?php  
    }else if ($fecha_reaparicion_boletin==NULL){
        ?>
        <script>
            enable_table_inputs("seccion5"); 
        </script>
        <?php          
    }else if ($fecha_rerecepcion==NULL){
        ?>
        <script>
            enable_table_inputs("seccion6"); 
        </script>
        <?php           
    }
 }
 }
?>