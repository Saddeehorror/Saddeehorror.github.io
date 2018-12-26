<script
src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>        
<script src="../Js/municipios.js"></script>
<?php
$query = "SELECT * from gpo_corp";
$result = mysqli_query($conexion, $query);
?>

<div class="div-contenedor-cuerpo">
    <div class="div-subcontenedor">
        <div class="card-form-alta">
            <form id="alta_es_form" name="datos_generales"   method="Post"  onsubmit=" return Alta('alta_es_form', '../Scripts/insert/Alta/Estacion_servicio/re_estacion.php', 'alta_respuesta_es')">
                <div id="es">
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title1" for="gpo">Grupo al que pertenece </label>                       
                        <select id="Grupos_reg" class="selector-group" name="alta_gpo_select">
                            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo$row['id_gpo_corp'] ?>"> <?php echo$row['nombre'] ?></option><?php }
                            ?>
                        </select>
                        <label class="etiqueta-textview-alta" id="title2" for="gpo">Tipo de Sector </label>                       
                        <select id="Sector_select" class="selector-group" name="tipo_sector">
                            <option value="Seleccione">Seleccione</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Industrial">Industrial</option>
                        </select>                         
                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title3" for="nombrees">Nombre estacion de servicio</label>

                        <input id="nombrees" name="alta_nombre_es" type="text" class="nombrees" value="" tabindex="1" onblur="mayusculas()">

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="aliases">Alias<small>(*opcional)</small></label>

                        <input id="aliases" name="alta_alias_es" type="text" class="aliases" value="" tabindex="1" onblur="mayusculas()">

                    </div>         
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title5" for="numes">E.S</label>

                        <input id="numes" name="alta_num_es" type="text" class="numes" value="" tabindex="2" onblur="mayusculas()"> 

                    </div>  
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="rfc_es">R.F.C</label>

                        <input id="rfc_es" name="alta_rfc_es" type="text" class="rfc_es" value="" tabindex="3" onblur="mayusculas()"> 

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="dir">Dirección </label>

                        <input id="dir" name="alta_dir_es" type="text" value="" tabindex="4" onblur="mayusculas()"> 

                    </div> 
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="nacionalidad">Nacionalidad </label>

                        <select id="nacionalidad" class="selector-group" name="alta_nacionalidad_es" tabindex="6">
                            <option value="Mexicana">Mexicana</option>
                            <option value="Otra">Otra</option>
                        </select>

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" name="estado" id="estado"   for="estado">Estado </label>

                        <select id="estado" class="selector-group" name="alta_estado_es" onchange="ciudades('estado')" tabindex="7">
                            <option value="Selecciona">Selecciona</option>
                            <option value="Aguascalientes">Aguascalientes</option>
                            <option value="Baja_California">Baja California</option>
                            <option value="Baja_California_Sur">Baja California Sur</option>
                            <option value="Campeche">Campeche</option>
                            <option value="Coahuila">Coahuila</option>
                            <option value="Colima">Colima</option>
                            <option value="Chiapas">Chiapas</option>
                            <option value="Chihuahua">Chihuahua</option>
                            <option value="Ciudad_de_México">Ciudad de México</option>
                            <option value="Durango">Durango</option>
                            <option value="Guanajuato">Guanajuato</option>
                            <option value="Guerrero">Guerrero</option>
                            <option value="Hidalgo">Hidalgo</option>
                            <option value="Jalisco">Jalisco</option>
                            <option value="Estado_de_México">Estado de México</option>
                            <option value="Michoacan_de_Ocampo">Michoac&aacute;n de Ocampo</option>
                            <option value="Morelos">Morelos</option>
                            <option value="Nayarit">Nayarit</option>
                            <option value="Nuevo_León">Nuevo Le&oacute;n</option>
                            <option value="Oaxaca">Oaxaca</option>
                            <option value="Puebla">Puebla</option>
                            <option value="Querétaro">Quer&eacute;taro</option>
                            <option value="Quintana_Roo">Quintana Roo</option>
                            <option value="San_Luis_Potosí">San Luis Potos&iacute;</option>
                            <option value="Sinaloa">Sinaloa</option>
                            <option value="Sonora">Sonora</option>
                            <option value="Tabasco">Tabasco</option>
                            <option value="Tamaulipas">Tamaulipas</option>
                            <option value="Tlaxcala">Tlaxcala</option>
                            <option value="Veracruz">Veracruz</option>
                            <option value="Yucatán">Yucat&aacute;n</option>
                            <option value="Zacatecas">Zacatecas</option>
                        </select>

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="municipio">Municipio </label>

                        <select id="municipio" class="selector-group" name="alta_municipio_es" tabindex="8">
                            <option value="Selecciona un estado">Selecciona un estado</option>
                        </select>

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="codigo_postal">Codigo Postal </label>

                        <input type="number" name="alta_cp_es" value="">

                    </div>
                    <div class="contenedor-inputs">
                        <label class="etiqueta-noedicion-textview" id="title4" for="correo">E-mail </label>
                        <input id="correo" name="alta_email_es" type="email" value="" tabindex="9" onblur="mayusculas()">
                        <label id="icon-add-email" class="fas fa-plus label_pen" style="color: #ff4081" onmouseout="cambiarColorOut('icon-add-email')" onmouseover="cambiarColorOver('icon-add-email')" onclick="agregar_campo_email()"></label>
                        <div class="contenedor-inputs-alta" id="contenedor-email"></div>

                    </div>
                    <div class="contenedor-inputs">
                        <label class="etiqueta-noedicion-textview" id="title4" for="telefono">Telefono</label>

                        <input id="telefono" name="alta_tel_es"  type="number" value="" tabindex="10" >
                        <label id="icon-add-tel" class="fas fa-plus label_pen" style="color: #ff4081" onmouseover="cambiarColorOver('icon-add-tel')" onmouseout="cambiarColorOut('icon-add-tel')" onclick="agregar_campo_telefono()"></label>
                        <div class="contenedor-inputs-alta" id="contenedor-telefono"></div>

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="act">Actividad principal</label>

                        <input id="act" name="alta_actividad_es" type="text" value="" tabindex="11" onblur="mayusculas()"> 

                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="inicio_oper">Inicio de operaciones:</label>
                        <input id="inicio_oper" name="alta_init_oper_es" type="date" value="" tabindex="12"> 
                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title4" for="horario">Horario de atenci&oacute;n</label>
                        <input  name="alta_hrs1_es" type="time" value="" >
                        <span>A</span>
                        <input  name="alta_hrs2_es" type="time" value="" > 
                        
                    </div>
                </div>
                <div class="contenedor-inputs-alta">

                    <input name="registrar" type="submit" value="Registrar Nueva Estaci&oacute;n">
                    <input id="send_num_campos_email"  name="send_num_campos_email"  type="hidden">
                    <input id="send_num_campos_telefono" name="send_num_campos_telefono" type="hidden">

                </div>  
            </form>
        </div>
        <div id="alta_respuesta_es">

        </div>
    </div>
</div>


