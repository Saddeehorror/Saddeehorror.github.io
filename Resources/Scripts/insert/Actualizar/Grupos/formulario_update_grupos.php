
<?php
//echo '<script language = "javascript">alert("'.$_POST['id_usuario_selected'].'");</script>';
//'"
//recuperar la data /*
require '../../../Conect.php';
$query = mysqli_query($conexion, "select * from gpo_corp where id_gpo_corp = '" . $_POST['id_grupo_selected'] . "'");

while ($row = mysqli_fetch_assoc($query)) {
    $campoID = $row['id_gpo_corp'];
    $campoNombre = $row['nombre'];
    $campoNombre_rp_legal = $row['nombre_rp_legal'];
    $campoRFC = $row['rfc_rp_legal'];
    $campoCurp = $row['curp_rp_legal'];
    $campoEmail = $row['email'];
    $campoFondo = $row['fondo'];
    $campoFoto = $row['foto'];
}
?>

<div id="form_data_group" class="div-contenedor-cuerpo">

    <div class="div-subcontenedor-form">
        <div class="card-form">
            <form id = "form_update_data_grupos" name="actualizar_form_grupo"  method="post" enctype="multipart/form-data" onsubmit="return ActualizarDatos('form_update_data_grupos', '../Scripts/insert/Actualizar/Grupos/update_modificacion_grupos.php', 'respuesta_grupo_update');">

                <div class="contenedor-inputs">
                    <label id="update_rs-label" class="etiqueta-textview" >Razon Social</label>
                    <input id="update_campo_razon-social" name="update_campo_razon-social" disabled="true" type="text" onblur="convertir_mayusculas('update_campo_razon-social')" value="<?php echo $campoNombre ?>">
                    <label id="label-pen1" class="fas fa-pencil-alt label_pen " style="color: #757575;" onclick="habilitar_grupo_edicion('update_rs-label', 'update_campo_razon-social', 'label-pen1')"></label>
                </div>

                <div class="contenedor-inputs">
                    <label id="update_rl-label" class="etiqueta-textview">Representante Legal</label>
                    <input id="update_campo_representante-legal" name="update_campo_representante-legal" disabled="true" onblur="convertir_mayusculas('update_campo_representante-legal')" type="text" value="<?php echo $campoNombre_rp_legal ?>">
                    <label id="label-pen2" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('update_rl-label', 'update_campo_representante-legal', 'label-pen2')"></label>
                </div>

                <div class="contenedor-inputs">
                    <label id="update-rfc-label" class="etiqueta-textview">RFC</label>
                    <input id="update_campo_rfc" name="update_campo_rfc" type="text" onblur="convertir_mayusculas('update_campo_rfc')" disabled="true" value="<?php echo $campoRFC ?>">
                    <label id="label-pen3" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('update-rfc-label', 'update_campo_rfc', 'label-pen3')"></label>
                </div>

                <div class="contenedor-inputs">
                    <label id="update-curp-label" class="etiqueta-textview">Curp</label>
                    <input id="update_campo_curp" name="update_campo_curp" type="text" disabled="true" onblur="convertir_mayusculas('update_campo_curp')" value="<?php echo $campoCurp ?>">
                    <label id="label-pen4" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('update-curp-label', 'update_campo_curp', 'label-pen4')"></label>
                </div>

                <div class="contenedor-inputs">
                    <label id="update-email-label" class="etiqueta-textview">E-mail</label>
                    <input id="update_campo_grupo-email" name="update_campo_grupo-email" type="email" onblur="convertir_mayusculas('update_campo_grupo-email')" disabled="true" value="<?php echo $campoEmail ?>">
                    <label id="label-pen5" class="fas fa-pencil-alt label_pen " onclick="habilitar_grupo_edicion('update-email-label', 'update_campo_grupo-email', 'label-pen5')"></label>
                </div>

                <div class="contenedor-inputs" >
                    <label class="etiqueta-textview">Fondo <small>(Tamaño de imagen 427x240)</small> </label>

                    <div class="contenedor_img_preview">
                        <img id="update_fondo_preview_container" src="<?php echo $campoFondo; ?>" class="img_tamaño_background"> 
                    </div>
                    <div class="div-contenedor-input-file ">
                        <input id="update_grupo_input_fondo" class="boton-file-input" name="update_grupo_input_fondo" type="file"  accept="image/*" >
                        <label for="update_grupo_input_fondo"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Upload Fondo</span></label>
                    </div>
                </div>

                <div class="contenedor-inputs" >
                    <label class="etiqueta-textview">Foto</label>
                    <div class="contenedor_img_preview" >
                        <img id="update_foto_preview_container" src="<?php echo $campoFoto; ?>" class="img_tamaño_background"> 
                    </div>
                    <div class="div-contenedor-input-file ">
                        <input id="update_grupo_input_foto" class="boton-file-input" name="update_grupo_input_foto" type="file"  accept="image/*" >
                        <label for="update_grupo_input_foto"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Upload Foto</span></label>
                    </div>
                </div>

                <div class="contenedor-inputs">
                    <input type="submit" name="submit" value="Actualizar grupos" >
                </div>
                <input id="send_campoid_grupo" name="send_campoid_grupo" type="hidden" value="<?php echo $campoID ?>"  >
                <input id="send_campo_old_fondo" name="send_campo_old_fondo" type="hidden" value="<?php echo $campoFondo;?>">
                <script>
                    previewImg('form_update_data_grupos', 'update_grupo_input_fondo', 'update_fondo_preview_container');
                </script>
                <script>
                    previewImg('form_update_data_grupos', 'update_grupo_input_foto', 'update_foto_preview_container');
                </script>
            </form>


            <div id="respuesta_grupo_update"></div>

        </div>
    </div>


</div>

