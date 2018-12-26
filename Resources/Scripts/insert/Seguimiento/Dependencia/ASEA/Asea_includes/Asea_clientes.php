<?php
?>
<div class="div-contenedor-cuerpo Contenedor_caracteristicas" id="Aseaphp">
    <header class="tooblar-header">
        <div class="span_menu_container">
            <span class="fas fa-bars btn-toggle-menu" onclick="boton_menu()"></span>
        </div>
        <span class="fas fa-arrow-left arrow-icon" onclick="show_table_seguimiento()"></span>
        <span class="title_span"> Información del Tramite</span>
        <span class="fas fa-bell bell-icon"></span>     
    </header>
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
            <td>Estado del tramite:</td>
            <td><select class="select_statustramite" disabled="true" id="select_estatus<?php echo $num_es?>" name="select_estatus" onchange="check_status('<?php echo $num_es?>','<?php echo $tipo_tramite?>')">
                <option><?php echo $estatus ?></option>
                </select>  
            </td>
        </tr>
        <tr>
            <td>Fecha de ingreso en el sistema</td>
            <td><?php echo $fecha_registro; ?></td>
        </tr>
                <tr>
                    <td>Fecha de ingreso en Asea:</td>
                    <td><input type="date" class="input" name="ingreso_asea" id="ingreso_asea<?php echo $num_es?>" value="<?php echo $ingreso_asea ?>" ></td>
                </tr>
                <tr>
                    <td>No. de Bitacora asignado por la asea</td>
                    <td><input type="text" class="input" name="numero_bitacora" id="num_bitacora<?php echo $num_es?>" value="<?php echo $no_bitacora ?>" onblur="convertir_mayusculas('num_bitacora<?php echo $num_es?>')" class="inputfile_caracteristicastramite" ></td>
                </tr>
                                <tr>
                    <td>Acuce de recibo: <br>
                        <input type="file" id="file_acucerecibo<?php echo $num_es ?>"  name="file_acucerecibo" class="inputfile_caracteristicastramite" onchange="nombre(this.value,'name_acuce_recibo_upload')" >
                        <label  for="file_acucerecibo<?php echo $num_es ?>" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>
                    </td>
                    <td>
                        <?php         
                    
                 if ($acuce_de_recibo!="") { ?>
                        <span  class="far fa-file-pdf" ></span>
                        <span class="file_open_ resolutivo_span" onclick="window.open('../../System/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $acuce_de_recibo ?>')"><?php echo $acuce_de_recibo ?> </span>
                   <?php  
                 }else{?>
                        <span id="name_acuce_recibo_upload"></span>
                      
                <?php }   
                    ?>
                    </td>
                </tr>

                <tr>
                    <td>Fecha de aparición en el boletin de notificaciones:</td>
                    <td><input disabled="true" class="disable_inputs input" type="date"  id="fecha_boletin<?php echo $num_es?>" name="fecha_boletin" value="<?php echo $fecha_aparicion_boletin ?>" ></td>
                </tr>
                <tr>
                    <td>Fecha de recepcción de la notificación o resolutivo: </td>
                    <td><input disabled="true" class="disable_inputs input" type="date" name="fecha_recepcion" id="fecha_recepcion<?php echo $num_es?>" value="<?php echo $fecha_recepcion_resolutivo ?>" ></td>
                </tr>
                <tr>
                    <td>No. oficio de la notificación o resolutivo: </td>
                    <td><input disabled="true" class="disable_inputs input" type="text" name="no_oficio" id="no_oficio<?php echo $num_es?>" value="<?php echo $no_oficio ?>" ></td>
                </tr>
                <tr>
                    <td>Notificación o resolutivo: <br>
                    <input  disabled="true" type="file"  id="file_resolutivo<?php echo $num_es ?>" name="file_resolutivo" class="inputfile_caracteristicastramite_disabled" onchange="nombre(this.value,'name_resolutivo_upload')" >
                    <label  for="file_resolutivo<?php echo $num_es ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>
                    </td>
                    <td>
                        <?php         
                    
                 if ($rows!=0) { ?>
                        <span  class="far fa-file-pdf" ></span>
                        <label class="file_open_ resolutivo_span" onclick="window.open('../../System/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $notificacion_resolutivo?>')"><?php echo $notificacion_resolutivo ?></label>
                   <?php }else{ ?>
                        <span id="name_resolutivo_upload"></span>
               <?php  }   
                    
                    ?>
                    </td>
                </tr>
                <?php if ($tipo_tramite=="MIA" || $tipo_tramite=="IP") { ?>
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
                         <?PHP    }?>

                <tr id="save1">
                    <td colspan="2">
                        <input type="submit" id="guardar_informacion" name="guardar_informacion" class="guardar_informacion" >
                        <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
                    </td>
                </tr>
                <tr><!--informacion en alcance-------------------------------------------------------------------------------------------------------------------------------------------------> 
                    <th Colspan = "2" class="Encabezado informacion_en_alcance" style="display: none" id="respuesta_info<?php echo $num_es?>">Respuesta de información en alcance 
                    </th> 
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Tiempo para dar contestación <small>(Dias habiles)</small>:</td>
                    <td><input type="number" class="input" name="tiempo_contestacion" id="tiempo_contestacion<?php echo $num_es?>" value="<?php echo $rowdias_habiles ?>" ></td>      
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
    /*CONSULTAR solicitud_informacion*/

if ($rows_consultar_solicitud_informacion!=0) {
        while ($resultado_consultar_solicitud_informacion= mysqli_fetch_assoc($consultar_solicitud_informacion)){
            $rows_nombre=$resultado_consultar_solicitud_informacion['nombre'];
            $rows_descripcion=$resultado_consultar_solicitud_informacion['descripcion'];
            $rows_archivo=$resultado_consultar_solicitud_informacion['archivo'];
            $rows_estatus=$resultado_consultar_solicitud_informacion['estatus'];
     ?>
            <tr>
                               <th  class="Encabezados_tabla_carga"><?php echo $rows_nombre ?></th>
                               <th  class="Encabezados_tabla_carga"><?php echo $rows_descripcion ?></th>
    <?php if (!empty($rows_archivo)) {?>
                               <th  class="Encabezados_tabla_carga">
                                   <select>
                                       <option value="Selecciona">Selecciona</option>
                                       <option value="Aprovar">Aprovar</option>
                                       <option value="Rechazar">Rechazar</option>
                                   </select>
                               </th>         
        
    <?php    
    }else{?>
                                <th  class="Encabezados_tabla_carga"><?php echo $rows_archivo ?></th>
<?php    }
?>
                               <th  class="Encabezados_tabla_carga"><?php echo $rows_estatus ?></th> 
                            </tr>                    
     <?php
    }
}
?>
                        </table> 
                    </td>
                <input type="hidden" name="id_celdas" id="id_celdas" value="0">
                </tr><!-- FIN TABLA INFORMACION EN ALCANCE --------------------------------------------------------------------------------------------------------------------------------->
                <tr class="informacion_en_alcance" style="display: none">
                    <td colspan="4">
                        <input  type="button"  id="addrowinformacion" name="addrowinformacion" class="inputfile_caracteristicastramite" onclick="Dom_addrowinformacion()"> 
                        <label for="addrowinformacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="13" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg> Agregar</label>             
                    </td>
                </tr>        
                <tr class="informacion_en_alcance" style="display: none">
            <td>Estado del tramite:</td>
            <td><select class="select_statustramite_inf" disabled="true" id="select_statustramite_inf<?php echo $num_es?>" name="select_statustramite_inf" onchange="check_status('<?php echo $num_es?>','<?php echo $tipo_tramite?>')">
                <option><?php echo $estatus ?></option>
                </select>  
            </td>
        </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Fecha de ingreso de información requerida: </td>
                    <td><input type="date" disabled="true" value="<?php echo $reingreso_asea ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Comprobante de ingreso: <br>
                    <input  type="file"  id="comprobante_reingreso" name="comprobante_reingreso" class="inputfile_caracteristicastramite_disabled"> 
                    <label for="comprobante_reingreso" ><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>
                    </td>
                    <td></td>
                </tr>
                
                  <tr class="informacion_en_alcance" style="display: none">
                    <td>Fecha de aparición en el boletin de notificaciones:</td>
                    <td><input  type="date" disabled="true" value="<?php echo $fecha_aparicion_boletin ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Fecha de recepcción de la notificación o resolutivo: </td>
                    <td><input type="date"  disabled="true" value="<?php echo $fecha_recepcion_resolutivo ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>No. oficio de la notificación o resolutivo: </td>
                    <td><input type="text" disabled="true" value="<?php echo $no_oficio ?>" ></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td>Notificación o resolutivo:<br>
                    <input  type="file" disabled="true" id="file_caracteristicastramite" name="file_caracteristicastramite" class="inputfile_caracteristicastramite_disabled"> 
                    <label for="file_caracteristicastramite" ><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>
                    </td>
                    <td></td>
                </tr>
                <tr class="informacion_en_alcance" style="display: none">
                    <td colspan="2" id="save2">
                        <input  type="submit" name="guardar_informacion" class="guardar_informacion" >
                        <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
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