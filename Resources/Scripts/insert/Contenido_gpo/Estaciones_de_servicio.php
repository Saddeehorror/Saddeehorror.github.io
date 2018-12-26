<?php
session_start();
if ($_SESSION['session_group'] != 3) {
    require '../../Conect.php';
    $query_estacion=mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE id_gpo='". $_POST['id'] . "'");
    $id_tabla="Estaciones_de_servicio_container";
}else{
    $query_group = mysqli_query($conexion, "SELECT * FROM gpo_corp where id_usuario= '" . $_SESSION['session_id'] . "'");
    while ($row_group = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $id_gpo = $row_group['id_gpo_corp'];
    }
    $query_estacion=mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE id_gpo='". $id_gpo. "'");
    $id_tabla="Estaciones_de_servicio_container_clientes";
}?>
<div class="div-contenedor-cuerpo" id="<?php echo $id_tabla?>">
    <div class="div-subcontenedor">
    <table class="table_sasisopa" id="estaciones_servicio_table"> 
        <tr>  
            <th>Nombre de Estación</th>
            <th>No Estación</th>
            <th class="no-display">Alias</th>
        </tr>
        <?php while ($row = mysqli_fetch_array($query_estacion, MYSQLI_ASSOC)) { ?>
            <tr class="td"id="estacion<?php echo $row['es']?>">
                <td class="" id="grupo_estaciones<?php echo $row['id'] ?>" 
                    onclick="sasisopa_onclick('grupo_estaciones', '<?php echo $row['id'] ?>')" 
                    ondblclick="show_content('estacion','<?php echo $row['id']?>','Show_gestion_estaciones','<?php echo $id_tabla?>','Gestion_de_estaciones') 
                                & asignar_titulos('show_opciones_estacion')" >
                    <span class="fas fa-folder"></span>
                    <span><?php echo $row['nombre_es'] ?></span>
                </td>
                                <td class="" ><?php echo $row['es'] ?></td>
                <td class="no-display"> <?php echo $row['alias'] ?> </td>
            </tr>
            
            <!--function show_content(type,id,recive,id_table,file){ -->
        <?php } ?>
    </table>
    </div>
</div>

<div id="Show_gestion_estaciones"> </div>

        