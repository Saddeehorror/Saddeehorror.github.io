<?php
$query = "select * from usuarios";
$result = mysqli_query($conexion, $query);
?>

<div id="div_update_user_tab" class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div style="overflow-x: auto;">
            <table id="tabla_mod_usuarios"class="formato-tabla">
                <tr>
                    <th class="formato-th formato-td-th">Nombre</th>
                    <th class="formato-th formato-td-th">Nickname</th>
                    <th class="formato-th formato-td-th">E-mail</th>
                    <th class="formato-th formato-td-th">Editar</th>
                </tr>
                <?php
                $indice = 1;
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                    ?>
                    <tr>
                        <td class="formato-td-th"><?php echo $row['nombre'] ?></td>
                        <td class="formato-td-th"><?php echo $row['logname'] ?></td>
                        <td class="formato-td-th"><?php echo $row['email'] ?></td>
                        <td class="formato-td-th"><label class="fas fa-pencil-alt label_pen" style="font-size: 19px; color: #1976D2;" onclick="mostrar_editar_usuarios('<?php echo $row['id'] ?>') & asignar_titulos('Mod_users')"></label></td>
                    <?php }
                    ?>
                </tr>

            </table>
        </div>
    </div>

</div>

<div class="div-contenedor-cuerpo" id="contenedor_mod_usuarios">

</div>




