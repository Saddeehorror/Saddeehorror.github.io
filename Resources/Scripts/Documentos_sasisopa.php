<?php
$query= mysqli_query($conexion, "SELECT * FROM gpo_corp");
?>

<div class="div-contenedor-cuerpo" id="documentacion_sasisopa_container_group">
    <div class="div-subcontenedor">
        <table class="table_sasisopa">
            <tr>
                <th>Razon Social</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) { ?>
                <tr>
                    <td class=" td" onclick="sasisopa_onclick('grupo','<?php echo $row['id_gpo_corp'] ?>')" 
                        ondblclick="sasisopa_ondblckick('sasisopa_es', '<?php echo $row['id_gpo_corp'] ?>', '', 'documentacion_sasisopa_container_group', 'contenedor_sasisopa_es')
                          & asignar_titulos('sasisopa_es')" 
                        id="grupo<?php echo $row['id_gpo_corp'] ?>">
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

<div id="contenedor_sasisopa_es" style="display: none"></div> 





