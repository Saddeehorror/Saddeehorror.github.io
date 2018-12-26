<?php
$query = "select * from gpo_corp where nombre != 'Pendiente'";
$result = mysqli_query($conexion, $query);
?>

<div id="contenedor_update_grupoTab" class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div style="overflow-x:auto;">
            <table id="tabla_mod_grupos" class="formato-tabla">
                <tr>
                    <th class="formato-th formato-td-th">Razon Social</th>
                    <th class="formato-th formato-td-th">Rrepresentante Legal</th>
                    <th class="formato-th formato-td-th">R.F.C</th>
                    <th class="formato-th formato-td-th">CURP</th>
                    <th class="formato-th formato-td-th">E-Mail</th>
                    <th class="formato-th formato-td-th">Modificar</th>
                </tr>
                </tr>
                <?php
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td class="formato-td-th"><?php echo $row['nombre'] ?></td>
                        <td class="formato-td-th"><?php echo $row['nombre_rp_legal'] ?></td>
                        <td class="formato-td-th"><?php echo $row['rfc_rp_legal'] ?></td>
                        <td class="formato-td-th"><?php echo $row['curp_rp_legal'] ?></td>
                        <td class="formato-td-th"><?php echo $row['email'] ?></td>
                        <td class="formato-td-th"><label class="fas fa-pencil-alt etiqueta_lapiz label_pen" style="font-size: 19px; color: #1976D2;" onclick="mostrar_editar_grupos('<?php echo $row['id_gpo_corp'] ?>') & asignar_titulos('Mod_grupos')"></label></td>
                    </tr><?php }
                ?>
            </table>
        </div>

    </div>
</div>

<div id="contenedor_mod_grupos">

</div>

