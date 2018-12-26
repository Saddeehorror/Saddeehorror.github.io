<?php
$sql_user_delete = "SELECT * FROM usuarios";
$query_users = mysqli_query($conexion, $sql_user_delete);
?>


<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor" >
        
        <div style="overflow-x: auto;">
            <table class="formato-tabla">
                <tr>
                    <th class="formato-th formato-td-th">Nombre</th>
                    <th class="formato-th formato-td-th">Nickname</th>
                    <th class="formato-th formato-td-th">Email</th>
                    <th class="formato-th formato-td-th">Eliminar</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($query_users, MYSQLI_ASSOC)) { ?>
                    <tr>
                        <td class="formato-td-th"><?php echo $row['nombre'] ?></td>
                        <td class="formato-td-th"><?php echo $row['logname'] ?></td>
                        <td class="formato-td-th"><?php echo $row['email'] ?></td>
                        <td class="formato-td-th"><label class="fas fa-times etiqueta_lapiz label_pen" style="font-size: 19px; color: #f44336;" onclick=" alerta_delete_usuario('<?php echo $row['id'] ?>')"></label></td>
                    </tr>
                    <?php
                }
                ?>
               
            </table>
        </div>


    </div>

    <div id="delete_usuario_respuesta">

    </div>
</div>