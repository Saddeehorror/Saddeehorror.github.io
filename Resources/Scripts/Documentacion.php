<?php
$query = "SELECT * from estacion_servicio";
$result = mysqli_query($conexion, $query);
?>

<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div class="Documentacion_es">
            <form name="select_es_sasisopa" id="documentacion_select_form" method="post" class="select_es_sasisopa"  onsubmit="return Select_es_documentacion();">
                <h2>Documentación de las E.S.</h2>   
                <div>
                    <label class="desc" id="title4" for="gpo">Seleccione una estación: </label>
                    <div>
                        <select id="documentacion_select" class="documentacion_select" name="documentacion_select" >
                            <option value="Seleccione una estación">Seleccione una estación</option>
                            <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                                <option value="<?php echo $row['es'] ?>"> <?php echo$row['nombre_es'] . " ES:" . $row['es'] ?></option><?php }
                            ?>
                        </select>
                    </div>
                </div>
                <input id="registrar" class="select_sasisopa" name="select" type="submit" value="Seleccionar Estación">	
            </form>
            <div id="Doc_list" style="display:none">
                <h2 id="Doc_list_name"></h2>
                <ul class="asisopa_list">
                    <li onclick="get_num_folder('1')">1.- ACTA CONSTITUTIVA</li>
                    <li  onclick="get_num_folder('2')">2.- RFC</li>
                    <li  onclick="get_num_folder('3')">3.- PODER DEL REP. LEGAL</li>
                    <li onclick="get_num_folder('4')">4.- INE DEL REP. LEGAL </li>
                    <li onclick="get_num_folder('5')">5.- PLANOS</li>
                    <li onclick="get_num_folder('6')">6.- USO DE SUELOS</li>

                </ul> 
            </div>
        </div>
    </div>

</div>

