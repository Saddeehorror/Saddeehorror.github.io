<?php
$query = mysqli_query($conexion, "SELECT * FROM gpo_corp");
?>
<div class="div-contenedor-cuerpo" id="Razonsocial_usuario">
    <div class="div-subcontenedor">
        <table class="table_sasisopa" id="table_main">  
            <tr> <th>Razon Social</th> </tr>
                <?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class=" td" onclick="sasisopa_onclick('razonsocial', '<?php echo $row['id_gpo_corp'] ?>')" 
                            ondblclick="show_content('grupo','<?php echo $row['id_gpo_corp']?>','Show_estaciones_servicio','Razonsocial_usuario','Estaciones_de_servicio') 
                                        & asignar_titulos('show_es_usuarios')" id="razonsocial<?php echo $row['id_gpo_corp'] ?>">
                            <span class="fas fa-folder"></span>
                            <span><?php echo $row['nombre'] ?></span>
                        </td>
                    </tr>
                <?php
                }
            ?>
        </table>
        
    </div>
</div>
<div id="Show_estaciones_servicio"></div>
<!--
function show_content(type,id,recive,id_table,file){
-->