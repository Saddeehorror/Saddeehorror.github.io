<?php
require '../../../../funcionesPHP/Funciones.php';
if (empty($_POST['reg'])) {
    require '../../../../Conect.php';
}
session_start();
$id_es = $_POST['id_es'];


$tipo_tramite = $_POST['tramite'];
$id_user = $_SESSION['session_id'];
$consultar_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE id='" . $_POST['id_es'] . "'");
while ($row = mysqli_fetch_assoc($consultar_es)) {
    $id_gpo = $row['id'];
    $nombre = $row['nombre_es'];
    $num_es = $row['es'];
}

$id_tramite = "";
$no_bitacora = "";
$estatus = "";
$no_oficio = "";
$reingreso_asea = "2014-08-23";
//INNER JOIN GRUPO Y ESTACION
$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.es= '".$num_es."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_gpo=$row_grpo['nombre'];   
}
$name=noEspacios($nombre_gpo);


$consultar_tramites = mysqli_query($conexion, "SELECT * FROM tramites_asea WHERE id_es='" . $_POST['id_es'] . "' and tipo_tramite='" . $tipo_tramite . "'");
$numero_filas = mysqli_num_rows($consultar_tramites);
if ($numero_filas != 0) {
    while ($resultado_consultar_tramites = mysqli_fetch_assoc($consultar_tramites)) {
        $id_tramite = $resultado_consultar_tramites['id_tramite'];
        $tipo_tramite = $resultado_consultar_tramites['tipo_tramite'];
        $estatus = $resultado_consultar_tramites['estado_tramite'];
        $fecha_registro = $resultado_consultar_tramites['fecha_ingreso_sistema'];
        $ingreso_asea = $resultado_consultar_tramites['fecha_ingreso_asea'];
        $no_bitacora = $resultado_consultar_tramites['num_bitacora'];
        $acuce_de_recibo = $resultado_consultar_tramites['acuce_de_recibo'];
        $fecha_aparicion_boletin = $resultado_consultar_tramites['fecha_aparicion_boletin'];
        $fecha_recepcion_resolutivo = $resultado_consultar_tramites['fecha_recepcion_notificacion'];
        $fecha_entrega_resolutivo = $resultado_consultar_tramites['fecha_entrega'];
    }
    
        if (!empty($ingreso_asea)) {
        ?>
        <script language="javascript">
            deshabilitar_input_info_tramite("seccion1", "<?php echo $num_es ?>");
        </script>
        <?php        
    }
    
    
     switch ($_POST['tramite']) {
                case 'SASISOPA':
            $titulo="Sistema de Administración de Seguridad Industrial, Seguridad Operativa y Protección al Medio Ambiente (SASISOPA)";
            break;
    }
    ?>
   <div class="div-contenedor-cuerpo Contenedor_caracteristicas" id="Aseaphp">
        <div class="div-subcontenedor" >
            <!--TODO CONTENT HERE-->
            <form name="actualizar_info_tramite" id="actualizar_info_tramite" method="post" class="actualizar_info_tramite" enctype="multipart/form-data" onsubmit="return actualizartramite()">
                <input type="hidden" name="id_es" value="<?php echo $id_es ?>">
                <input type="hidden" name="tipo_tramite" value="<?php echo $tipo_tramite ?>" >
                <table class="table_caracteristicas">
                    <tr> <th Colspan = "2" class="Encabezado"><?php echo $titulo ?> </th> </tr>
                    <tr> <th class="Encabezados_secundarios"><?php echo $nombre; ?></th>
                        <th class="Encabezados_secundarios"><?php echo $num_es; ?></th> </tr>
                    <tr>
                        <td>Estado del tramite:</td> <!--SELECT ESTADO TRAMITE-->
                        <td><select class="select_statustramite" disabled="true" id="select_estatus<?php echo $num_es ?>" name="select_estatus" onchange="check_status('<?php echo $num_es ?>', '<?php echo $tipo_tramite ?>')">
                                <option><?php echo $estatus ?></option>
                            </select>  
                        </td>
                    </tr>
                    <?php if ($_SESSION['session_group'] != 3) { ?>
                        <tr>
                            <td>Fecha de ingreso en el sistema</td>
                            <td><?php echo $fecha_registro; ?></td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td>Fecha de ingreso en Asea:</td> <!--  INGRESO ASEA  PARTE 1-->
                        <td><input type="date"  class="input" name="ingreso_asea" id="ingreso_asea<?php echo $num_es ?>" value="<?php echo $ingreso_asea ?>" ></td>
                    </tr>
                    <tr>
                        <td>No. de Bitacora asignado por la asea</td> <!-- No Bitacora PARTE 1-->
                        <td><input type="text"  class="input" name="numero_bitacora" id="num_bitacora<?php echo $num_es ?>" value="<?php echo $no_bitacora ?>" onblur="convertir_mayusculas('num_bitacora<?php echo $num_es ?>')" class="inputfile_caracteristicastramite" ></td>
                    </tr>
                    <tr>
                        <td>Acuce de recibo: <br>
                            <?php if ($_SESSION['session_group'] != 3) { ?><!--ACUCE DE RECIBO PARTE 1-->
                                <input type="file" id="file_acucerecibo<?php echo $num_es ?>"  name="file_acucerecibo" class="inputfile_caracteristicastramite" onchange="nombre(this.value, 'name_acuce_recibo_upload')" >
                                <label  for="file_acucerecibo<?php echo $num_es ?>" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                    
                            <?php } ?>                    
                        </td>
                        <td>
                            <?php if ($acuce_de_recibo != "") { ?>
                                <span  class="far fa-file-pdf" ></span>
<span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $acuce_de_recibo ?>')"><?php echo $acuce_de_recibo ?> </span>
                             <?php } else { ?>
                                <span id="name_acuce_recibo_upload"></span>
                            <?php } ?>
                        </td>
                    </tr>


                    <tr id="save1">
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <td colspan="2">
                                <input type="submit" id="guardar_informacion" name="guardar_informacion" class="guardar_informacion" >
                                <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
                            </td>
                        <?php } ?> 
                    </tr>


   


                    </table>
                    <!--COMENTARIOS--------------------------------------------------------------------------------------------------------------------->
                <table class="table_comentarios">
                    <tr>
                        <th Colspan = "2" class="Encabezado">Comentarios</th>
                    </tr>
                    <tr>
                        <th class="Encabezados_secundarios">Gestor</th>
                        <th class="Encabezados_secundarios">Comentario</th>
                    </tr>
                    <tr>
                        <td>Tramite:</td>
                        <td><textarea></textarea></td>
                    </tr>            
                </table>        
            </form>
            <div id="update_contenido"></div>
            <!--TODO CONTENT HERE-->
        </div>
    </div>
<?php
} else {
    ?>
    <div class="alta_tramite">   
        <div class="div-contenedor-cuerpo" id="contenedor_alta_tramite_asea">
            <div class="div-subcontenedor">
                <h2>Actualmente el tramite no esta dado de Alta</h2>
                <?php if ($_SESSION['session_group'] != 3) { ?>
                    <button name="guardar_informacion" class="guardar_informacion"></button>
                    <label for="guardar_informacion" onclick="alta_tramites('<?php echo $id_es ?>','<?php echo $num_es ?>','<?php echo $tipo_tramite ?>','<?php echo $id_user ?>','ASEA','tramite')">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        Dar de alta</label>       
                <?php } ?>         

            </div>
        </div>
        <div id="Alta_tramites_sucses"></div>    
    </div>
    <?php
}