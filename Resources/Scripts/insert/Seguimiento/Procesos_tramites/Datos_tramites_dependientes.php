<?php
require './funciones_tramite.php';
session_start();

if (!empty($_POST['id_td'])) {
    require '../../../Conect.php';

    $id_tramite_td = $_POST['id_td'];
    
    $consultar_todo = mysqli_query($conexion, "SELECT * FROM tramites_dependientes "
        . "INNER JOIN periodos_cumplimiento ON periodos_cumplimiento.id_periodo = tramites_dependientes.id_periodo "
        . "INNER JOIN tramites ON periodos_cumplimiento.id_tramite = tramites.id_tramite "
        . "INNER JOIN estacion_servicio ON tramites.id_es = estacion_servicio.id "
        . "INNER JOIN gpo_corp ON estacion_servicio.id_gpo= gpo_corp.id_gpo_corp WHERE tramites_dependientes.id_td='".$id_tramite_td."'");
      
}else if(!empty ($_POST['success'])){
        require '../../../Conect.php';

    $id_tramite_td = $_POST['id_tramite'];
    
    $consultar_todo = mysqli_query($conexion, "SELECT * FROM tramites_dependientes "
        . "INNER JOIN periodos_cumplimiento ON periodos_cumplimiento.id_periodo = tramites_dependientes.id_periodo "
        . "INNER JOIN tramites ON periodos_cumplimiento.id_tramite = tramites.id_tramite "
        . "INNER JOIN estacion_servicio ON tramites.id_es = estacion_servicio.id "
        . "INNER JOIN gpo_corp ON estacion_servicio.id_gpo= gpo_corp.id_gpo_corp WHERE tramites_dependientes.id_td='".$id_tramite_td."'");
}
while ($res_gral = mysqli_fetch_array($consultar_todo)){
    /*TRAMITES DEPENDIENTES*/
    $id_td = $res_gral['id_td'];
    $nombre_tramite_td = $res_gral['nombre_tramite_td'];
    $fecha_ingreso_dependencia_td=$res_gral['fecha_ingreso_dependencia_td'];
    $fecha_cumplimiento= $res_gral['fecha_cumplimiento'];
    $acuce_de_recibo_td = $res_gral['acuce_de_recibo_td'];
    /*PERIODOS_CUMPLIMIENTO*/
    
    /*TRAMITES*/
    $id_tramite=$res_gral['id_tramite'];
    /*ESTACION_SERVICIO*/
    $nombre_estacion =  $res_gral['nombre_es'];
    $numero_estacion = $res_gral['es'];
    /*GPO_CORP*/
    $id_gpo =  $res_gral['id_gpo_corp'];
    $nombre_grupo= $res_gral['nombre'];
}
$name = noEspacios($nombre_grupo);
$nombre_tramite_str = tramite_name($nombre_tramite_td);
$razon_social = get_razon_social($id_gpo,$conexion);
?>
<div>
    <form name="actualizar_tramite_td" id="actualizar_tramite_td" method="post" class="actualizar_tramite" enctype="multipart/form-data" onsubmit="return update_tramite('Update_tramite_td','actualizar_tramite_td')">
        <input type="hidden" value="<?php echo $id_tramite_td?>" name="id_td">        
        <table class="table_caracteristicas" id="descripcion_tramite">
            <tr>
                <th colspan="2" class="Encabezado"><?php echo $nombre_tramite_str ?></th>
            </tr>
            
            <tr> 
                <th class="Encabezados_secundarios"><?php echo $nombre_estacion; ?></th>
                <th class="Encabezados_secundarios"><?php echo $numero_estacion; ?></th> 
            </tr>
            <tr>
                <td>Fecha de cumplimiento</td>
                <td><?php echo  $fecha_cumplimiento?></td>
            </tr>
            <tr> <!--INICIO PARTE 1-->
                <td>Fecha de Ingreso en Dependencia:</td>
                <td class="table_data"><input type="date" disabled value="<?php echo $fecha_ingreso_dependencia_td?>" id="input_fecha_ingreso_dependencia_td" name="input_fecha_ingreso_dependencia_td"></td>
            </tr>
            <tr>
                <td>Acuce de Recibo: <br>
                    <input type="file" disabled id="file_acuce_recibo_td"  name="file_acuce_recibo_td" class="inputfile_caracteristicastramite_disabled" onchange="file_name('file_acuce_recibo_td', 'show_name_acuce_recibo_td')" >
                    <label  for="file_acuce_recibo_td" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                                
                </td>
                <?php 
                    if ($acuce_de_recibo_td==null) { ?>
                    <td class="table_data" id="show_name_acuce_recibo_td"></td>     
                <?php
                    }else{ ?>
                    <td class="table_data" id="show_name_acuce_recibo">
                    <span  class="far fa-file-pdf" ></span>
                    <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $razon_social?>/ES/E.S.<?php echo $numero_estacion ?>/Tramites/<?php echo $acuce_de_recibo_td ?>')"><?php echo $acuce_de_recibo_td ?> </span></td>     
                <?php  } ?>
            </tr><!--FIN PARTE 1-->
        <?php 
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
        if ($_SESSION['session_group']!=3){
            if ($fecha_ingreso_dependencia_td==null) { ?>
    <script>
        enable_table_inputs_td(); 
    </script>
<?php              
            }
        }
?>