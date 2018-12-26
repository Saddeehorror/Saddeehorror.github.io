<script
src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>        
<script src="js/municipios.js"></script>
<?php
$query = "SELECT * from estacion_servicio";
$result = mysqli_query($conexion, $query);
?>




<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div class="card-form-candl">
            <form name="Cuestionario_select" id="Cuestionario_es" method="post" onsubmit="return Alta('Cuestionario_es', '../Scripts/insert/Alta/Cuestionario/re_cuestionario.php', 'alta_cuestionario_es');">

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title4" for="gpo">1.- Seleccione una estación: </label>
                    <select id="select_es" class="selector-group" name="select_es">
                        <option value="Seleccione una estación">Seleccione una estación</option>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $row['es'] ?>"> <?php echo$row['nombre_es'] . " ES:" . $row['es'] ?></option><?php }
                        ?>
                    </select>
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta">2.- Productos: <br><small>(En caso de tener varios tanques del mismo producto con diferentes capacidades especificarlos independientemente)</small></label>
                    <div id="div_contenedor_productos">
                        <table id="tabla_productos" class="formato-tabla-cuestionario">
                            <tr>
                                <th class="formato-th-cuestionario">Productos</th>
                                <th class="formato-th-cuestionario">Tanques</th>
                                <th class="formato-th-cuestionario">¿Coincide el Plano?</th>
                                <th class="formato-th-cuestionario">Capacidad</th>
                                <th class="formato-th-cuestionario">¿Coincide el Plano?</th>
                                <th class="formato-th-cuestionario">Observacion</th>
                                <th class="formato-th-cuestionario" ><label class="fas fa-plus label_pen" style="color: #B2EBF2;" onclick="addProducto('tabla_productos')"><span style="padding-left: 5px; color: white; font-family: sans-serif;">Añadir</span></label></th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="inv_estimada">3.- Inversión estimada:</label>
                    <div>
                        <input id="inv_estimada" name="inv_estimada" type="text" class="inv_estimada" value="" tabindex="1">
                    </div>
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="Domicilio_oiryrecibir">4.- Domicilio para recibir y oír notificaciones:</label>
                    <div>
                        <input id="Domicilio_oiryrecibir" name="Domicilio_oiryrecibir" type="text" class="Domicilio_oiryrecibir" value="" tabindex="1">
                    </div>
                </div>   
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="camara_pertenece">5.- Camara y/o asociacion a la que pertenece la empresa:</label>
                    <div>
                        <input id="camara_pertenece" name="camara_pertenece" type="text" class="camara_pertenece" value="" tabindex="1">
                    </div>
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta">6.- Proyectos asociados: </label>
                    <div id="div_contenedor_productos">
                        <table id="tabla_proyectos_asociados" class="formato-tabla-cuestionario">
                            <tr>
                                <th class="formato-th-cuestionario">Proyecto</th>
                                <th class="formato-th-cuestionario">Arrendado</th>
                                <th class="formato-th-cuestionario">Propio</th>
                                <th class="formato-th-cuestionario" ><label class="fas fa-plus label_pen" style="color: #B2EBF2;" onclick="agregarProyectos('tabla_proyectos_asociados')"><span style="padding-left: 5px; color: white; font-family: sans-serif;">Añadir</span></label></th>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">7.- Número de empleos y puestos generados:</label>    
                    <table>
                        <tr>
                            <td>Administrativos</td>
                            <td><input id="num_adm" name="num_adm" type="text" onchange="tablas()"></td>
                        </tr>
                        <tr>
                            <td>Obreros</td>
                            <td><input id="despachadores" name="despachadores" type="text" onchange="tablas()"></td>
                        </tr>
                        <tr>
                            <td>Personal de proyecto asociado</td>
                            <td><input id="proyecto_asociado" name="proyecto_asociado" type="text" onchange="tablas()"></td>
                        </tr>
                        <tr>
                            <td>Total</td>
                            <td id="total_empleosgenerados">0</td>
                        </tr>
                    </table>       
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">8.- Identificación de personal Administrativo:</label>
                    <div id="table_adm">

                    </div>

                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">9.- Identificacion de despachadores:</label>
                    <div id="table_despachadores">

                    </div>

                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">10.- El servicio de abastecimiento de agua es por:</label>
                    <div>

                        <select class="selector-group" name="abs_agua">
                            <option value="Seleccione">Seleccione</option>
                            <option value="1" >Comision Municipal de Agua Potable</option>
                            <option value="2" >Pipas</option>
                        </select>
                    </div>
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">11.- En caso de contar con fosa séptica especificar la capacidad:</label>
                    <div>
                        <input id="" name="cap_fosa" type="text">
                    </div>
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">12.- Número Contrato de limpieza de fosa séptica <small>(en caso de tener fosa)</small> :</label>
                    <div>
                        <input id="" name="num_contrato" type="text">
                    </div>
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">13.- Cantidad de equipos que utilicen algún tipo de combustible:</label>
                    <div>
                        <input id="num_equipos" name="num_equipos" type="text" onchange="tablas()">
                        <img src="../img/add_table.png" height="32" width="32" class="add_tables">
                    </div>
                    <div id="tabla_equipo">
                    </div>
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">Fichas  técnica de equipos :</label><br>
                    <label class="etiqueta-textview-alta" id="title1" for="">14.- Motobombas:</label>

                    <div>
                        <table>
                            <tr>
                                <td>Num. de motobombas</td>
                                <td><input type="text" name="num_motobombas"></td>
                            </tr>
                            <tr>
                                <td>Capacidad</td>
                                <td><input type="text" name="cap_motobombas"></td>
                            </tr>
                        </table>  
                    </div>

                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title1" for="">15.- Dispensarios:</label>
                        <div>
                            <table>
                                <tr>
                                    <td>Num. de dispensarios</td>
                                    <td><input type="text" name="num_dispensarios"></td>
                                </tr>
                            </table>  
                        </div>
                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title1" for="">16.- Tipo de modulo:</label>
                        <table class="table_cuestionario">
                            <tr>
                                <th>Sencillo</th>
                                <th>Doble</th>
                                <th>Satélite</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="mod_sencillo"></td>
                                <td><input type="text" name="mod_doble"></td>
                                <td><input type="text" name="mod_satellite"></td>
                            </tr>
                        </table >
                        <table class="table_cuestionario">
                            <tr>
                                <th>Num. mangueras magna</th>
                                <th>Num. mangueras Premium</th>
                                <th>Num. mangueras Diesel</th>
                            </tr>
                            <tr>
                                <td><input type="text" name="num_mag_magna"></td>
                                <td><input type="text" name="num_mag_prem"></td>
                                <td><input type="text" name="num_mag_diesel"></td>
                            </tr>
                        </table>
                    </div>
                    <div class="contenedor-inputs-alta">
                        <label class="etiqueta-textview-alta" id="title1" for="">17.- Flujo volumétrico en las mangueras:</label>
                        <table class="table_equipo">
                            <tr>
                                <th>Gasolina magna</th>
                                <th>Gasolina Premium</th>
                                <th>Diesel</th>
                                <th>Diesel Marino</th>

                            </tr>
                            <tr>
                                <td><input type="text" name="fv_magna"></td>
                                <td><input type="text" name="fv_prem"></td>
                                <td><input type="text" name="fv_diesel"></td>
                                <td><input type="text" name="fv_dieselmarino"></td>

                            </tr>
                        </table>
                    </div>
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">18.- Cisterna o Rotoplas:</label>
                    <div class="radio">
                        <input type="radio" name="admin" class="radiobtn" id="admin" value="2">
                        <span>Cisterna</span>
                        <input type="radio" name="admin" class="radiobtn" id="admin" value="1" checked>
                        <span>Rotoplas</span>
                    </div>
                    <label class="etiqueta-textview-alta" id="title1" for=""> Capacidad:</label><br>
                    <input type="text" name="cap_cisterna">
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">19.- Ventas anuales de cada producto<small>(en litros)</small>:</label>
                    <table class="table_cuestionario">
                        <tr>
                            <th>Producto</th>
                            <th>Venta en Litros Anual</th>
                        </tr>
                        <tr>
                            <td>Magna</td>
                            <td><input type="text" name="vent_magna"></td>
                        </tr>
                        <tr>
                            <td>Premium</td>
                            <td><input type="text" name="vent_premium"></td>
                        </tr>
                        <tr>
                            <td>Diesel</td>
                            <td><input type="text" name="vent_diesel"></td>
                        </tr>
                        <tr>
                            <td>Diesel Marino</td>
                            <td><input type="text" name="vent_dieselmarino"></td>
                        </tr>
                    </table>     
                </div>
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="">20.- Planos:</label><br>
                    <input type="checkbox" name="plano_conj" value="si"> Plano de conjunto<br>
                    <input type="checkbox" name="plano_hidro" value="si">Plano Hidrosanitario<br><small>(Que muestre conexión de rejillas con trampa de combustible)</small><br>      
                    <input type="checkbox" name="plano_areas" value="si"> Plano de areas peligrosas<br>

                </div>
                <div class="contenedor-inputs-alta">
                    <input name="select" type="submit" value="Registrar Cuestionario">
                </div>

            </form>

        </div>
        <div id='RESPUESTA_GRUPOPHP'></div>
    </div>
</div>

<div id="alta_cuestionario_es"></div>