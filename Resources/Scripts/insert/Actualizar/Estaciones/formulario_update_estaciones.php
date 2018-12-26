<?php
require '../../../Conect.php';

$id_es_mod = $_POST['id_grupo_selected'];
$query_selected_es = "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo WHERE estacion_servicio.id = '" . $id_es_mod . "'";
$result_es = mysqli_query($conexion, $query_selected_es);

while ($rows = mysqli_fetch_array($result_es)) {
    $update_campo_nombreES = $rows['nombre_es'];
    $update_campo_numES = $rows['es'];
    $update_campo_alias = $rows['alias'];
    $update_campo_rfc = $rows['rfc'];
    $update_campo_dirreccion = $rows['direccion'];
    $update_campo_nacionalidad = $rows['nacionalidad'];
    $update_campo_estado = $rows['estado'];
    $update_campo_municipio = $rows['municipio'];
    $update_campo_cp = $rows['cp'];
    $update_actividad_principal = $rows['act_principal'];
    $update_inicio_operaciones = $rows['inicio_operaciones'];
    $update_hora_inicio = $rows['hora_inicio_act'];
    $update_hora_fin = $rows['hora_fin_act'];
    $update_gpo_id = $rows['id_gpo'];
}

$query = "SELECT * FROM gpo_corp";
$result = mysqli_query($conexion, $query);

$query_tel = "SELECT * FROM telefono WHERE id_es = '" . $id_es_mod . "'";
$result_tels = mysqli_query($conexion, $query_tel);

$query_email = "SELECT * FROM correo WHERE id_es = '" . $id_es_mod . "'";
$result_email = mysqli_query($conexion, $query_email);

$id_gpo_corp = '';
?>

<div id="contenedor_form_update_es" class="div-contenedor-cuerpo">

    <div class="div-subcontenedor-form">
        <div class="card-form">

            <form id="update_es_formulario" name="update_es_formulario" method="post" enctype="multipart/form-data" onsubmit="return ActualizarDatos('update_es_formulario', '../Scripts/insert/Actualizar/Estaciones/update_estacion_servicio.php', 'respuesta_update_es');">
                <div class="contenedor-inputs">
                    <label id="labeles1" class="etiqueta-texto">Grupo al que pertenece</label>
                    <select id="mod_grupo_es" name="mod_grupo_es" disabled="true" class="selector-group">
                        <?php
                        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                            $id_gpo_corp = $row['id_gpo_corp'];
                            ?>
                            <option value="<?php echo $id_gpo_corp; ?>" <?= $id_gpo_corp == $update_gpo_id ? ' selected="selected"' : ''; ?> ><?php echo $row['nombre']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label id="label-pen-es1" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles1', 'mod_grupo_es', 'label-pen-es1')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles2" class="etiqueta-texto">Nombre de Estacion de servicio</label>
                    <input id="update_campo_es_nombrees" name="update_campo_es_nombrees" disabled="true" type="text" value="<?php echo $update_campo_nombreES; ?>">
                    <label id="label-pen-es2" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles2', 'update_campo_es_nombrees', 'label-pen-es2')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles3" class="etiqueta-texto">Alias (Opcional)</label>
                    <input id="update_campo_es_alias" disabled="true" type="text"  value="<?php echo $update_campo_alias; ?>">
                    <label id="label-pen-es3" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles3', 'update_campo_es_alias', 'label-pen-es3')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles4" class="etiqueta-texto">E.S.</label>
                    <input id="update_campo_es_numes" disabled="true" type="text" value="<?php echo $update_campo_numES; ?>">
                    <label id="label-pen-es4" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles4', 'update_campo_es_numes', 'label-pen-es4')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles5" class="etiqueta-texto">R.F.C</label>
                    <input id="update_campo_es_rfc" disabled="true" type="text" value="<?php echo $update_campo_rfc; ?>">
                    <label id="label-pen-es5" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles5', 'update_campo_es_rfc', 'label-pen-es5')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles6" class="etiqueta-texto">Direccion</label>
                    <input id="update_campo_es_dir" disabled="true" type="text" value="<?php echo $update_campo_dirreccion; ?>">
                    <label id="label-pen-es6" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles6', 'update_campo_es_dir', 'label-pen-es6')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles7" class="etiqueta-texto">Nacionalidad</label>
                    <select id="update_select_es_nacionalidad" class="selector-group" disabled="true">
                        <option value="Mexicana" <?= $update_campo_nacionalidad == 'Mexicana' ? ' selected="selected"' : ''; ?>>Mexicana</option>
                        <option value="Otra" <?= $update_campo_nacionalidad == 'Otra' ? ' selected="selected"' : ''; ?>>Otra</option>
                    </select>
                    <label id="label-pen-es7" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles7', 'update_select_es_nacionalidad', 'label-pen-es7')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles8" class="etiqueta-texto">Estado</label>
                    <select id="update_select_es_estado" disabled="true" id="estado_update" onchange="actualizarCiudades('estado_update')" class="selector-group" >
                        <option value="Aguascalientes" <?= $update_campo_estado == 'Aguascalientes' ? ' selected="selected"' : ''; ?>>Aguascalientes</option>
                        <option value="Baja_California" <?= $update_campo_estado == 'Baja_California' ? ' selected="selected"' : ''; ?>>Baja California</option>
                        <option value="Baja_California_Sur" <?= $update_campo_estado == 'Baja_California_Sur' ? ' selected="selected"' : ''; ?>>Baja California Sur</option>
                        <option value="Campeche" <?= $update_campo_estado == 'Campeche' ? ' selected="selected"' : ''; ?>>Campeche</option>
                        <option value="Coahuila_de_Zaragoza" <?= $update_campo_estado == 'Coahuila_de_Zaragoza' ? ' selected="selected"' : ''; ?>>Coahuila de Zaragoza</option>
                        <option value="Colima" <?= $update_campo_estado == 'Colima' ? ' selected="selected"' : ''; ?>>Colima</option>
                        <option value="Chiapas" <?= $update_campo_estado == 'Chiapas' ? ' selected="selected"' : ''; ?>>Chiapas</option>
                        <option value="Chihuahua" <?= $update_campo_estado == 'Chihuahua' ? ' selected="selected"' : ''; ?>>Chihuahua</option>
                        <option value="Distrito_Federal" <?= $update_campo_estado == 'Distrito_Federal' ? ' selected="selected"' : ''; ?>>Distrito Federal</option>
                        <option value="Durango" <?= $update_campo_estado == 'Durango' ? ' selected="selected"' : ''; ?>>Durango</option>
                        <option value="Guanajuato" <?= $update_campo_estado == 'Guanajuato' ? ' selected="selected"' : ''; ?>>Guanajuato</option>
                        <option value="Guerrero" <?= $update_campo_estado == 'Guerrero' ? ' selected="selected"' : ''; ?>>Guerrero</option>
                        <option value="Hidalgo" <?= $update_campo_estado == 'Hidalgo' ? ' selected="selected"' : ''; ?>>Hidalgo</option>
                        <option value="Jalisco" <?= $update_campo_estado == 'Jalisco' ? ' selected="selected"' : ''; ?>>Jalisco</option>
                        <option value="México" <?= $update_campo_estado == 'México' ? ' selected="selected"' : ''; ?>>M&eacute;xico</option>
                        <option value="Michoacan_de_Ocampo" <?= $update_campo_estado == 'Michoacan_de_Ocampo' ? ' selected="selected"' : ''; ?>>Michoac&aacute;n de Ocampo</option>
                        <option value="Morelos" <?= $update_campo_estado == 'Morelos' ? ' selected="selected"' : ''; ?>>Morelos</option>
                        <option value="Nayarit" <?= $update_campo_estado == 'Nayarit' ? ' selected="selected"' : ''; ?>>Nayarit</option>
                        <option value="Nuevo_León" <?= $update_campo_estado == 'Nuevo_León' ? ' selected="selected"' : ''; ?>>Nuevo Le&oacute;n</option>
                        <option value="Oaxaca" <?= $update_campo_estado == 'Oaxaca' ? ' selected="selected"' : ''; ?>>Oaxaca</option>
                        <option value="Puebla" <?= $update_campo_estado == 'Puebla' ? ' selected="selected"' : ''; ?>>Puebla</option>
                        <option value="Querétaro" <?= $update_campo_estado == 'Querétaro' ? ' selected="selected"' : ''; ?>>Quer&eacute;taro</option>
                        <option value="Quintana_Roo" <?= $update_campo_estado == 'Quintana_Roo' ? ' selected="selected"' : ''; ?>>Quintana Roo</option>
                        <option value="San_Luis_Potosí" <?= $update_campo_estado == 'San_Luis_Potosí' ? ' selected="selected"' : ''; ?>>San Luis Potos&iacute;</option>
                        <option value="Sinaloa" <?= $update_campo_estado == 'Sinaloa' ? ' selected="selected"' : ''; ?>>Sinaloa</option>
                        <option value="Sonora" <?= $update_campo_estado == 'Sonora' ? ' selected="selected"' : ''; ?>>Sonora</option>
                        <option value="Tabasco" <?= $update_campo_estado == 'Tabasco' ? ' selected="selected"' : ''; ?>>Tabasco</option>
                        <option value="Tamaulipas" <?= $update_campo_estado == 'Tamaulipas' ? ' selected="selected"' : ''; ?>>Tamaulipas</option>
                        <option value="Tlaxcala" <?= $update_campo_estado == 'Tlaxcala' ? ' selected="selected"' : ''; ?>>Tlaxcala</option>
                        <option value="Veracruz" <?= $update_campo_estado == 'Veracruz' ? ' selected="selected"' : ''; ?>>Veracruz</option>
                        <option value="Yucatán" <?= $update_campo_estado == 'Yucatán' ? ' selected="selected"' : ''; ?>>Yucat&aacute;n</option>
                        <option value="Zacatecas" <?= $update_campo_estado == 'Zacatecas' ? ' selected="selected"' : ''; ?>>Zacatecas</option>
                    </select>
                    <label id="label-pen-es8" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles8', 'update_select_es_estado', 'label-pen-es8')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles9" class="etiqueta-texto">Municipio</label>
                    <select id="update_select_es_municipios" disabled="true" name="municipios" class="selector-group"></select>
                    <label id="label-pen-es9" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles9', 'update_select_es_municipios', 'label-pen-es9')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles10" class="etiqueta-texto">Codigo Postal</label>
                    <input id="update_campo_es_cp" type="number" disabled="true" value="<?php echo $update_campo_cp; ?>">
                    <label id="label-pen-es10" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles10', 'update_campo_es_cp', 'label-pen-es10')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles11" class="etiqueta-texto">E-mail</label>
                    <br/>
                    <table class="formato-tabla">
                        <tr>
                            <th class="formato-th formato-td-th">E-mail</th>
                            <th class="formato-th formato-td-th">Editar</th>
                        </tr>
                        <?php
                        while ($rowemail = mysqli_fetch_array($result_email)) {
                            ?>
                            <tr>
                                <td class="formato-td-th"><input id="update_campo_es_email" disabled="true" class="einput-tabla" type="email" value="<?php echo $rowemail['correo']; ?>"></td>
                                <td id="label-pen-es11" class="formato-td-th"><label class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles11', 'update_campo_es_email', 'label-pen-es11')"></label></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles12" class="etiqueta-texto">Telefonos</label>

                    <table class="formato-tabla">
                        <tr>
                            <th class="formato-th formato-td-th">Telefonos</th>
                            <th class="formato-th formato-td-th">Editar</th>
                        </tr>
                        <?php
                        while ($rowtel = mysqli_fetch_array($result_tels)) {
                            ?>
                            <tr>
                                <td class="formato-td-th"><input id="update_campo_es_telefono" disabled="true" class="einput-tabla" type="number" value="<?php echo $rowtel['num']; ?>"></td>
                                <td class="formato-td-th"><label id="label-pen-es12"  class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles12', 'update_campo_es_telefono', 'label-pen-es12')"></label></td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles13" class="etiqueta-texto">Actividad Principal</label>
                    <input id="update_campo_es_actprin" disabled="false" type="text" value="<?php echo $update_actividad_principal; ?>">
                    <label id="label-pen-es13" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles13', 'update_campo_es_actprin', 'label-pen-es13')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles14" class="etiqueta-texto">Inicio de operaciones</label>
                    <input id="update_campo_es_inioper" disabled="false" type="date" value="<?php echo $update_inicio_operaciones; ?>">
                    <label id="label-pen-es14" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles14', 'update_campo_es_inioper', 'label-pen-es14')"></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="labeles15" class="etiqueta-texto">Horario de atencion</label>
                    <input id="update_campo_es_horario1" disabled="false" type="time" value="<?php echo $update_hora_inicio; ?>">
                    <span>   A   </span>
                    <input id="update_campo_es_horario2" disabled="false" type="time" value="<?php echo $update_hora_fin; ?>">
                    <label id="label-pen-es15" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('labeles15', 'update_campo_es_horario1', 'label-pen-es15')"></label>
                </div>
                <div class="contenedor-inputs">
                    <input type="submit" value="Actualizar">
                </div>
            </form>
        </div>
        
    </div>
    
    <div id="respuesta_update_es"></div>

</div>


