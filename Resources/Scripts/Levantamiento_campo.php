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
            <form id="Alta_levantamiento_campo_es" enctype="multipart/form-data" onsubmit="return Alta('Alta_levantamiento_campo_es', '../Scripts/insert/re_levcampo.php', 'Alta_levantamiento_campo_es');">  
            <div>
                <label class="desc" id="title4" for="gpo">Seleccione la estación: </label>
                <div>
                    <select id="select_es" class="select_es" name="select_es">
                        <option value="Seleccione una estación">Seleccione una estación</option>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                            <option value="<?php echo $row['es'] ?>"> <?php echo$row['nombre_es'] . " ES:" . $row['es'] ?></option><?php }
                        ?>
                    </select>
                </div>
            </div>
            <div class="list_container c1">
                <div class="label">
                    <label class="desc" id="title3" for="Field3">1.- Pedir plano conjunto:</label>
                </div>
                <div class="check">
                    <input type="checkbox" name="plano_conjunto" value="1">Si
                    <input id="subir" name="subir" type="submit" value="Registrar">
                </div>
            </div>
            <div class="list_container c2">    
                <div class="label">
                    <label class="desc" id="title3" for="Field3">2.- Tablero Principal<small>(Anuncio)</small>:</label>
                </div>
                <div class="take_foto">
                    <input class="lev_campo_02" type="file" accept="image/*" id="lev_campo_02" name="lev_campo_02"capture="camera">
                    <input id="subir" name="subir" type="submit" value="Subir">    
                </div>
            </div>    
            <div class="list_container c1">      
                <div class="label">
                    <label class="desc" id="title3" for="Field3">3.- E.S.<small>(Completa)</small>:</label>
                </div>
                <div class="take_foto">
                    <input class="lev_campo_03" type="file" accept="image/*" id="lev_campo_03" name="lev_campo_03"capture="camera"> 
                    <input id="subir" name="subir" type="submit" value="Subir">
                </div>
            </div> 
            <div class="list_container c2">      
                <div class="label">
                    <label class="desc" id="title3" for="Field3">4.- Area de RP<br><small>(Tres tanques con sus respectivas etiquetas, asi como base)</small>:</label>
                </div>
                <div class="take_foto">
                    <input class="lev_campo_04" type="file" accept="image/*" id="lev_campo_04" name="lev_campo_04"capture="camera"> 
                    <input id="subir" name="subir" type="submit" value="Subir">
                </div>
            </div>
            <div class="list_container c1">      
                <div class="label">
                    <label class="desc" id="title3" for="Field3">5.- Islas<small>(Dispensarios foto por cada cara)</small>:</label>
                </div>
                <div class="take_foto">
                    <input class="cam_capture" type="file" accept="image/*" id="capture" name="capture_2"capture="camera"> 
                    <input id="subir" name="subir" type="submit" value="Subir">
                </div>
            </div>

            <p id='Alta_levantamiento_campo_es'></p>    
        </form>
        </div>
    </div>

    </div>

