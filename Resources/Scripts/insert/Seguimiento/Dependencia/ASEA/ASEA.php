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
$rowfecha_aparicion_boletin="";

//INNER JOIN GRUPO Y ESTACION
$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.es= '".$num_es."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_gpo=$row_grpo['nombre'];   
}
$name=noEspacios($nombre_gpo);

//FIN ESTACION------------------------------------------------------------------
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
    $consultarnotificacion_o_resolutivo = mysqli_query($conexion, "SELECT * FROM notificacion_o_resolutivo where id_tramite='" . $id_tramite . "'");
    $rows = mysqli_num_rows($consultarnotificacion_o_resolutivo);
    if ($rows != 0) {
        while ($resultado_consultarnotificacion_o_resolutivo = mysqli_fetch_assoc($consultarnotificacion_o_resolutivo)) {
            $id_notificacion_o_resolutivo = $resultado_consultarnotificacion_o_resolutivo['id'];
            $no_oficio = $resultado_consultarnotificacion_o_resolutivo['no_oficio'];
            $tipo_resolucion = $resultado_consultarnotificacion_o_resolutivo['tipo_resolucion'];
            $notificacion_resolutivo = $resultado_consultarnotificacion_o_resolutivo['notificacion_resolutivo'];
            $id_tramite = $resultado_consultarnotificacion_o_resolutivo['id_tramite'];
        }
    }
$rowfecha_ingreso_asea="";
$rowsello_de_recibido="";
    /* CONSULTAR ASUNTO(informacion_alcance_asea) */
    $rowdias_habiles = "";
    $row_id_informacion_alcance_asea = "";
    $rowestatus_reingreso = $estatus;
    $consultar_asunto_ = mysqli_query($conexion, "SELECT * FROM informacion_alcance_asea WHERE id_tramite='" . $id_tramite . "'");
    $rows_consultar_asunto = mysqli_num_rows($consultar_asunto_);
    if ($rows_consultar_asunto != 0) {
        while ($resultado_consultar_asunto_ = mysqli_fetch_assoc($consultar_asunto_)) {
            $row_id_informacion_alcance_asea = $resultado_consultar_asunto_['id'];
            $rowestatus_reingreso = $resultado_consultar_asunto_['estatus_reingreso'];
            $rowdias_habiles = $resultado_consultar_asunto_['tiempo_contestacion'];
            $rowfecha_ingreso_asea = $resultado_consultar_asunto_['fecha_ingreso_asea'];
            $rowsello_de_recibido = $resultado_consultar_asunto_['sello_de_recibido'];
            $rowfecha_aparicion_boletin = $resultado_consultar_asunto_['fecha_aparicion_boletin'];
            $rowfecha_recepcion_notificación = $resultado_consultar_asunto_['fecha_recepcion_notificación'];
            $rowNo_resolutivo = $resultado_consultar_asunto_['no_resolutivo'];
            $rowResolutivo = $resultado_consultar_asunto_['resolutivo_desechamiento'];
            $rowidtramite = $resultado_consultar_asunto_['id_tramite'];
        }
    }
    /* CONSULTAR solicitud_informacion */

    $consultar_solicitud_informacion = mysqli_query($conexion, "SELECT * FROM solicitud_informacion WHERE id_informacion='" . $row_id_informacion_alcance_asea . "'");
    $rows_consultar_solicitud_informacion = mysqli_num_rows($consultar_solicitud_informacion);
    
    if (empty($ingreso_asea)) {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion1", "<?php echo $num_es ?>");
        </script>
        <?php        
    }
    if ($ingreso_asea != "" && $no_bitacora != "" && empty($fecha_aparicion_boletin)) {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion2", "<?php echo $num_es ?>");
        </script>
        <?php
    }
        if ($fecha_aparicion_boletin != "" && empty($fecha_recepcion_resolutivo)) {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion3", "<?php echo $num_es ?>");
        </script>
        <?php
    }
        if ($fecha_recepcion_resolutivo != "") {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("entrega", "<?php echo $num_es ?>", "<?php echo $tipo_resolucion ?>");
        </script>
        <?php
    }
    if ($rowdias_habiles!="" && $rows_consultar_solicitud_informacion > 0 && empty ($rowfecha_ingreso_asea)) {
             ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion4_info", "<?php echo $num_es ?>");
        </script>
        <?php     
    }else if ($rowdias_habiles!="" && $rows_consultar_solicitud_informacion == 0 && empty ($rowfecha_ingreso_asea)){ 
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion4_no_info", "<?php echo $num_es ?>");
        </script>
        <?php        
    }
    if ($rowfecha_ingreso_asea!="" && empty($rowfecha_aparicion_boletin)) {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion5", "<?php echo $num_es ?>");
        </script>
        <?php
    }
    
        if ($rowfecha_aparicion_boletin!="" && empty($rowfecha_recepcion_notificación)) {
        ?>
        <script language="javascript">
            habilitar_input_info_tramite("seccion6", "<?php echo $num_es ?>");
        </script>
        <?php
    }

    switch ($_POST['tramite']) {
        case 'MIA':
            $titulo = "Manifestación de Impacto Ambiental";
            break;
        case 'IP':
            $titulo = "Informe Preventivo";
            break;
        case 'AIO':
            $titulo = "Aviso de Inicio Opereraciónes antes 1988";
            break;
        case 'MPA':
            $titulo = "Modificación de Proyectos Autorizados";
            break;
        case 'CDT':
            $titulo = "Cambio de Titularidad";
            break;
        case 'TyC':
            $titulo = "Terminos y Condicionantes";
            break;
        case 'LUA':
            $titulo = "Licencia Ambiental Unica";
            break;
        case 'MOD LUA':
            $titulo = "Modificación de la LAU";
            break;
        case 'COA':
            $titulo = "Cédula de Operación Anual";
            break;
        case 'AEG':
            $titulo = "Alta Como Empresa Generadora";
            break;
        case 'MOD AEG':
            $titulo = "Modificación de la AEG";
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
                        <td><input type="date" disabled="true" class="input" name="ingreso_asea" id="ingreso_asea<?php echo $num_es ?>" value="<?php echo $ingreso_asea ?>" ></td>
                    </tr>
                    <tr>
                        <td>No. de Bitacora asignado por la asea</td> <!-- No Bitacora PARTE 1-->
                        <td><input type="text" disabled="true" class="input" name="numero_bitacora" id="num_bitacora<?php echo $num_es ?>" value="<?php echo $no_bitacora ?>" onblur="convertir_mayusculas('num_bitacora<?php echo $num_es ?>')" class="inputfile_caracteristicastramite" ></td>
                    </tr>
                    <tr>
                        <td>Acuce de recibo: <br>
                            <?php if ($_SESSION['session_group'] != 3) { ?><!--ACUCE DE RECIBO PARTE 1-->
                                <input type="file" disabled="true" id="file_acucerecibo<?php echo $num_es ?>"  name="file_acucerecibo" class="inputfile_caracteristicastramite_disabled" onchange="nombre(this.value, 'name_acuce_recibo_upload')" >
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
                    <tr>
                        <td>Fecha de aparición en el boletin de notificaciones:</td><!-- APARICION EN BOLETIN  PARTE 2-->
                        <td><input disabled="true" class="input" type="date"  id="fecha_boletin<?php echo $num_es ?>" name="fecha_boletin" value="<?php echo $fecha_aparicion_boletin ?>" ></td>
                    </tr>
                    <tr>
                        <td>Fecha de recepcción de la notificación o resolutivo: </td><!-- RECEPCION NOTIFICACION PARTE 3-->
                        <td><input disabled="true" class="input" type="date" name="fecha_recepcion" id="fecha_recepcion<?php echo $num_es ?>" value="<?php echo $fecha_recepcion_resolutivo ?>" ></td>
                    </tr>
                    <tr>
                        <td>No. oficio de la notificación o resolutivo: </td><!-- NO OFICIO PARTE 3-->
                        <td><input disabled="true" class="input" type="text" name="no_oficio" id="no_oficio<?php echo $num_es ?>" value="<?php echo $no_oficio ?>" ></td>
                    </tr>
                    <tr>
                        <td>Notificación o resolutivo: <br> <!-- NOT O RESOLUTIVO PARTE 3-->
                            <?php if ($_SESSION['session_group'] != 3) { ?>
                                <input  disabled="true" type="file"  id="file_resolutivo<?php echo $num_es ?>" name="file_resolutivo" class="inputfile_caracteristicastramite_disabled" onchange="nombre(this.value, 'name_resolutivo_upload')" >
                                <label  for="file_resolutivo<?php echo $num_es ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>

                            <?php } ?>         
                        </td>
                        <td>
                            <?php if ($rows != 0) { ?>
                                <span  class="far fa-file-pdf" ></span>
                                <label class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $notificacion_resolutivo ?>')"><?php echo $notificacion_resolutivo ?></label>
                            <?php } else { ?>
                                <span id="name_resolutivo_upload"></span>
                            <?php }
                            ?>
                        </td>
                    </tr>
                    <?php if ($tipo_tramite == "MIA" || $tipo_tramite == "IP") { ?>
                        <tr id="intervalo_tyc_select" style="display: none">
                            <td>Periodo de cumplimiento del Informe de Terminos y Condicionantes: </td> 
                            <td>  <input disabled="true" class="disable_inputs"  id="preiodoanual<?php echo $num_es ?>" type="radio" name="periodo" value="Anual" checked onchange="intervalo_tyc('Anual')"> Anual<br>
                                <input disabled="true" class="disable_inputs"  id="preiodosemestral<?php echo $num_es ?>"type="radio" name="periodo" value="Semestral" onchange="intervalo_tyc('Semestral')"> Semestral<br>
                                <input disabled="true" class="disable_inputs"  id="preiodona<?php echo $num_es ?>"type="radio" name="periodo" value="NA" onchange="intervalo_tyc('NA')"> No Aplica        
                            </td>
                        </tr>
                        <tr id="intervalo_tyc" style="display: none">
                            <td>Periodo Anual</td>
                            <td><span>De: </span><input disabled="true" class="date_tyc disable_inputs" id="fecha0<?php echo $num_es ?>" name="fecha0" type="date"><span> A </span><input disabled="true" class="date_tyc disable_inputs" id="fecha1<?php echo $num_es ?>" name="fecha1" type="date"></td>
                        </tr>
                    <?PHP } ?>

                    <tr id="save1">
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <td colspan="2">
                                <input type="submit" id="guardar_informacion" name="guardar_informacion" class="guardar_informacion" >
                                <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
                            </td>
                        <?php } ?> 
                    </tr>
                    <tr><!--informacion en alcance-------------------------------------------------------------------------------------------------------------------------------------------------> 
                        <th Colspan = "2" class="Encabezado informacion_en_alcance" style="display: none" id="respuesta_info<?php echo $num_es ?>">Respuesta de información en alcance 
                        </th> 
                    </tr>
                    <tr class="informacion_en_alcance" style="display: none">
                        <td>Tiempo para dar contestación <small>(Dias habiles)</small>:</td> <!--DIAS HABILES-->
                        <td><input type="number" disabled="true" class="input" name="tiempo_contestacion" id="tiempo_contestacion<?php echo $num_es ?>" value="<?php echo $rowdias_habiles ?>" ></td>      
                    </tr>
                    <tr class="informacion_en_alcance" style="display: none"><!--TABLA INFORMACION EN ALCANCE------------------------------------------------------------------------------------->
                        <td colspan="2">
                            <table class="solicitud_de_informacion" id="solicitud_de_informacion">
                                <tr><th colspan="4" class="Encabezado_solicitud_de_informacion">Solicitud de información </th></tr>
                                <tr>
                                    <th  class="Encabezados_tabla_carga">Nombre</th>
                                    <th  class="Encabezados_tabla_carga">Descripción</th>
                                    <th  class="Encabezados_tabla_carga">Area de Carga</th>
                                    <th  class="Encabezados_tabla_carga">Estatus</th> 
                                </tr>
                                <?php
                                /* CONSULTAR solicitud_informacion */

                                if ($rows_consultar_solicitud_informacion != 0) {

                                    $i = 1;
                                    while ($resultado_consultar_solicitud_informacion = mysqli_fetch_assoc($consultar_solicitud_informacion)) {
                                        $rows_nombre = $resultado_consultar_solicitud_informacion['nombre'];
                                        $rows_descripcion = $resultado_consultar_solicitud_informacion['descripcion'];
                                        $rows_archivo = $resultado_consultar_solicitud_informacion['archivo'];
                                        $rows_estatus = $resultado_consultar_solicitud_informacion['estatus'];
                                        ?>
                                        <tr>
                                        <input type="hidden" name="number_of_rows_consultar_solicitud_informacion" value="<?php echo $rows_consultar_solicitud_informacion ?>">
                                        <td  class="Encabezados_tabla_carga"><?php echo $rows_nombre ?></td>
                                        <td  class="Encabezados_tabla_carga"><?php echo $rows_descripcion ?></td>
                                        <?php if ($_SESSION['session_group'] != 3) { ?>
                                            <td  class="Encabezados_tabla_carga"><?php echo $rows_archivo ?></td>
                                            <?php
                                        } else {
                                            if (!empty($rows_archivo)) {
                                                ?>
                                                <td>
                                                    <span  class="far fa-file-pdf" ></span>
                                                    <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $num_es ?>/Temporal/<?php echo $rows_archivo ?>')"><?php echo $rows_archivo ?> </span> 
                                                </td>

                                                <?php
                                            } else {
                                                $name_inputfile = "documentos_solicitados" . $i;
                                                ?>
                                                <td>
                                                    <input  type="file"  id="<?php echo $name_inputfile ?>" name="<?php echo $name_inputfile ?>" class="inputfile_caracteristicastramite" onchange="nombre(this.value, 'nombre_documento_solicitado<?php echo $i ?>')"> 
                                                    <label for="<?php echo $name_inputfile ?>" ><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label><br>
                                                    <span id="nombre_documento_solicitado<?php echo $i ?>">Actualmente no se ha seleccionado un archivo</span>            
                                                </td>
                                                <?php
                                                $i += 1;
                                            }
                                        }
                                        ?>                             
                                        <?php if (!empty($rows_archivo) && $_SESSION['session_group'] != 3) { ?>
                                            <td  class="Encabezados_tabla_carga">
                                                <select name="">
                                                    <option value="Selecciona">Selecciona</option>
                                                    <option value="Aprovar">Aprovar</option>
                                                    <option value="Rechazar">Rechazar</option>
                                                </select>
                                            </td>         
                                        <?php } else {
                                            ?>
                                            <td  class="Encabezados_tabla_carga"><?php echo $rows_estatus ?></td>                      
                                        <?php }
                                        ?>
                            </tr>                    
                            <?php
                        }
                    }
                    ?>
                </table> 
                </td>
                <input type="hidden" name="id_celdas" id="id_celdas" value="0">
                </tr><!-- FIN TABLA INFORMACION EN ALCANCE ----------------------------------------------------------------------------------------------------->
                <tr class="informacion_en_alcance" style="display: none">
                    <?php if ($_SESSION['session_group'] != 3) { ?>
                        <td colspan="4">
                            <input  type="button"  disabled="true" id="addrowinformacion" name="addrowinformacion" class="inputfile_caracteristicastramite_disabled" onclick="Dom_addrowinformacion()"> 
                            <label for="addrowinformacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="13" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> Agregar</label>             
                        </td>
                    <?php } else {
                        ?>
                        <td colspan="2">
                            <input  type="submit" id="save_files" name="save_files" class="guardar_informacion" >
                            <label for="save_files" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>                         
                        </td>
                        <?php
                    }
                    ?>     
                </tr>        
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Estado del tramite:</td><!--SELECT ESTADO TRAMITE 2-->
                    <td><select class="select_statustramite" disabled="true" id="select_statustramite_inf<?php echo $num_es ?>" name="select_statustramite_inf" onchange="check_status('<?php echo $num_es ?>', '<?php echo $tipo_tramite ?>')">
                            <option><?php echo $rowestatus_reingreso ?></option>
                        </select>  
                    </td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Fecha de ingreso de la información requerida: </td>
                    <td><input type="date" class="input" disabled="true" value="<?php echo $rowfecha_ingreso_asea ?>"id="fecha_Reingreso_asea" name="fecha_Reingreso_asea" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Comprobante de ingreso: <br>
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <input  type="file"  disabled="true" id="comprobante_reingreso" name="comprobante_reingreso" class="inputfile_caracteristicastramite_disabled" onchange="nombre(this.value, 'comprobante_reingreso_upload')"> 
                            <label for="comprobante_reingreso" ><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>

                        <?php } ?>     
                    </td>
                    <td>
                        <?php if ($rowsello_de_recibido != "") { ?>
                            <span  class="far fa-file-pdf" ></span>
                            <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $rowsello_de_recibido ?>')"><?php echo $rowsello_de_recibido ?> </span>
                        <?php } else {
                            ?>
                            <span id="comprobante_reingreso_upload"></span>
                        <?php }
                        ?>
                    </td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none"><!--FECHA DE REAPARICION EN EL BOLETIN-->
                    <td>Fecha de aparición en el boletin de notificaciones:</td>
                    <td><input  type="date" class="input" disabled="true" id="reaparicion_boletin" name="reaparicion_boletin" value="<?php echo $rowfecha_aparicion_boletin ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Fecha de recepcción de la notificación o resolutivo: </td>
                    <td><input type="date"  class="input" disabled="true" id="recepcion_resolutivo_desechamiento" value="<?php echo $rowfecha_recepcion_notificación ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>No. oficio de la notificación o resolutivo: </td>
                    <td><input type="text" class="input" disabled="true" id="No_resolutivo" value="<?php echo $rowNo_resolutivo ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Notificación o resolutivo:<br>
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <input  type="file" disabled="true" id="file_caracteristicastramite" name="file_caracteristicastramite" class="inputfile_caracteristicastramite_disabled"> 
                            <label for="file_caracteristicastramite" ><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>

                        <?php } ?>                            
                    </td>
                    <td>$rowResolutivo</td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td colspan="2" id="save2">
                        <?php if ($_SESSION['session_group'] != 3) { ?>
                            <input  type="submit" name="guardar_informacion" class="guardar_informacion" >
                            <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>

                        <?php } ?>                             
                    </td>

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
                    <label for="guardar_informacion" onclick="alta_tramites('<?php echo $id_es ?>', '<?php echo $num_es ?>', '<?php echo $tipo_tramite ?>', '<?php echo $id_user ?>', 'ASEA', 'tramite')">
                        <svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
                        Dar de alta</label>       
                <?php } ?>         

            </div>
        </div>
        <div id="Alta_tramites_sucses"></div>    
    </div>
    <?php
}
?>
