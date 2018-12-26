<?php
$query_sql_es = "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp = estacion_servicio.id_gpo";
$result = mysqli_query($conexion, $query_sql_es);
?>

<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div style="overflow-x: auto;">
            <table class="formato-tabla">
                <tr>
                    <th class="formato-th formato-td-th">Nombre de estacion</th>
                    <th class="formato-th formato-td-th">Numero de estacion</th>
                    <th class="formato-th formato-td-th">Alias</th>
                    <th class="formato-th formato-td-th">RFC</th>
                    <th class="formato-th formato-td-th">Direccion</th>
                    <th class="formato-th formato-td-th">Nombre del grupo</th>
                    <th class="formato-th formato-td-th">Representante Legal</th>
                    <th class="formato-th formato-td-th">Eliminar</th>
                </tr>
<?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="formato-td-th"><?php echo $row['nombre_es'] ?></td>
                        <td class="formato-td-th"><?php echo $row['es'] ?></td>
                        <td class="formato-td-th"><?php echo $row['alias'] ?></td>
                        <td class="formato-td-th"><?php echo $row['rfc'] ?></td>
                        <td class="formato-td-th"><?php echo $row['direccion'] ?></td>
                        <td class="formato-td-th"><?php echo $row['nombre'] ?></td>
                        <td class="formato-td-th"><?php echo $row['nombre_rp_legal'] ?></td>
                        <td class="formato-td-th"><label class="fas fa-times etiqueta_lapiz label_pen" style="font-size: 19px; color: #f44336;" onclick="alerta_delete_estacion('<?php echo $row['id'] ?>', '../Scripts/insert/Actualizar/Estaciones/formulario_update_estaciones.php', 'contenedor_mod_estaciones', 'tabla_mod_estaciones')"></label></td>
                    </tr>
    <?php
}
?>

            </table>
        </div>

        <div id="delete_estacion_respuesta"></div>
    </div>

</div>

