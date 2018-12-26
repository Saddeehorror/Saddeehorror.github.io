<?php
    $query_group = mysqli_query($conexion, "SELECT * FROM gpo_corp where id_usuario= '" . $_SESSION['session_id'] . "'");
    while ($row_group = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
        $id_gpo = $row_group['id_gpo_corp'];
    }

    $query = mysqli_query($conexion, "SELECT * FROM estacion_servicio where id_gpo = '" . $id_gpo . "'");
?>

<div class="div-contenedor-cuerpo" id="Razonsocial_cliente">
    <div class="div-subcontenedor">
        <table class="table_sasisopa" id="table_main">  
                <tr>
                    <th>Estaciones de Servico</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class=" td" onclick="sasisopa_onclick('estaciones_es', '<?php echo $row['id'] ?>')" 
                            ondblclick="show_content('estacion','<?php echo $row['id']?>','contenedor_contenido','table_main','Contenido') 
                                        & asignar_titulos('show_opciones_estacion_cliente')" id="estaciones_es<?php echo $row['id'] ?>">
                            <span class="fas fa-folder"></span>
                            <span><?php echo $row['nombre_es'] ?></span>
                        </td>
                    </tr>
                    <?php
                }
                ?>
        </table>
        <div id="contenedor_contenido"></div>
    </div>
</div>

<!--
function show_content(type,id,recive,id_table,file){
-->