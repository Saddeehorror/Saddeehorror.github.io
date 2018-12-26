
    <tr style="display: none" class="inf_alcance_table show_extra">
        <th Colspan = "2" class="Encabezado">Información en Alcance</th>
    </tr>
    <tr style="display: none" class="inf_alcance_table">
        <td>Dias habiles para presentar informacion: </td>
        <td>
            <input type="number" disabled="true" name="dias_habiles_info_alcance" id="dias_habiles_info_alcance" value="">         
        </td>
    </tr>
    <tr style="display: none" class="inf_alcance_table show_extra">
        <td>Dia limite para presentar la información</td>
        <td>
            <input type="date" disabled="true" name="" value="<?php echo $dias_habiles?>">
        </td>
    </tr>
    <tr  style="display: none" class="inf_alcance_table show_extra">
        <td>Fecha de Reingreso a dependencia: </td>
        <td><input type="date" disabled="true" name="fecha_reingreso_dependencia" id="fecha_reingreso_dependencia" value="<?php echo $fecha_reingreso_asea ?>"></td>
    </tr>
    <tr  style="display: none" class="inf_alcance_table show_extra">
        <td>Acuce de Recibo: <br>
            <input type="file" disabled id="file_comprobante_reingreso"  name="file_comprobante_reingreso" class="inputfile_caracteristicastramite_disabled" onchange="file_name('file_comprobante_reingreso', 'show_name_comprobante_reingreso')" >
            <label  for="file_comprobante_reingreso" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                                
        </td>
            <?php            if ($sello_recibido==null) { ?>
            <td class="table_data" id="show_name_comprobante_reingreso"></td>
           <?php
           }else{ ?>
            <td class="table_data" id="show_name_comprobante_reingreso">
            <span  class="far fa-file-pdf" ></span>
            <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $razon_social?>/ES/E.S.<?php echo $numero_es ?>/Tramites/<?php echo $sello_recibido ?>')"><?php echo $sello_recibido ?> </span></td>     
                <?php  } ?>        
    </tr>
    <tr  style="display: none" class="inf_alcance_table show_extra">
        <td>Fecha de aparición en el boletin de notificaciones: </td>
        <td><input type="date" disabled="true" name="fecha_reaparicion_boletin" id="fecha_reaparicion_boletin" value="<?php echo $fecha_reaparicion_boletin ?>"></td>
    </tr>
    <tr  style="display: none" class="inf_alcance_table show_extra">
        <td>Fecha de recepción de la notificación o resolutivo: </td>
        <td><input type="date" disabled="true" name="fecha_rerecepcion_resolutivo" id="fecha_rerecepcion_resolutivo"></td>
    </tr>
    <tr style="display: none" class="inf_alcance_table show_extra">
            <td>No. oficio:</td>
            <td class="table_data"><input type="text" disabled id="num_oficio_inf_alcance" name="num_oficio_inf_alcance" value="<?php echo $num_oficio_resultante ?>"></td>
        </tr>
        <tr style="display: none" class="inf_alcance_table show_extra">
            <td>Respuesta: <br>
                <input type="file" disabled="true" id="file_respuesta_inf_alcance"  name="file_respuesta_inf_alcance" class="inputfile_caracteristicastramite_disabled" onchange="file_name('file_respuesta_inf_alcance', 'show_name_respuesta_inf_alcance')" >
                <label  for="file_respuesta_inf_alcance" class="inputfile" o><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>                                         
            </td>            
                        <?php            if ($tipo_resolutivo==null) { ?>
            <td class="table_data" id="show_name_respuesta_inf_alcance"></td>
           <?php
           }else{ ?>
            <td class="table_data" id="show_name_respuesta_inf_alcance">
            <span  class="far fa-file-pdf" ></span>
            <span class="file_open_ resolutivo_span" onclick="window.open('../../System/Grupos/<?php echo $razon_social?>/ES/E.S.<?php echo $numero_es ?>/Tramites/<?php echo $tipo_resolutivo ?>')"><?php echo $tipo_resolutivo ?> </span></td>     
                <?php  } ?>     
            
        </tr>
<?php

