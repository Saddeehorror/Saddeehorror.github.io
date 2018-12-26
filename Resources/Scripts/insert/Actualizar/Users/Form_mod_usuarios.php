<?php
//echo '<script language = "javascript">alert("'.$_POST['id_usuario_selected'].'");</script>';
//'"
//recuperar la data 
require '../../../Conect.php';
$query = mysqli_query($conexion, "select * from usuarios where id = '" . $_POST['id_usuario_selected'] . "'");

while ($row = mysqli_fetch_assoc($query)) {
    $campoNombre = $row['nombre'];
    $campoID = $row['id'];
    $avatar = $row['avatar'];
    $nombre = $row['nombre'];
    $nickname = $row['logname'];
    $email = $row['email'];
    $pass = $row['pass'];
    $tipo_cuenta = $row['gpo_id'];
    $avatar_viejo = $row['avatar'];
    $nombre_tipo_cuenta;
    switch ($tipo_cuenta) {
        case 3:
            $nombre_tipo_cuenta = "Cliente";
            break;
        case 2:
            $nombre_tipo_cuenta = "Administrador";
            break;
        case 1:
            $nombre_tipo_cuenta = "Usuario";
            break;
    }
}
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div id="form_data_user" class="div-contenedor-cuerpo">
    
    
    <div class="div-subcontenedor-form">
        
        <div class="card-form">
            <form id = "form_update_data"  class="formulario-update" name="actualizar_form_usuario"  method="post" enctype="multipart/form-data" onsubmit="return ActualizarDatos('form_update_data', '../Scripts/insert/Actualizar/Users/mod_update_usuarios.php', 'update_respuesta_form');">
                <div class="div-cotenedor-avatar">
                    <img id="imagen_vista_avatar" class="imagen_vista_avatar" src="<?php echo $avatar ?>" alt="avatar_usuario"  > 
                </div>
                <div class="div-contenedor-input-file ">
                    <input id="update_img_avatar" class="boton-file-input" name="update_img_avatar" type="file"  accept="image/*"  >
                        <label for="update_img_avatar"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Actualizar Imagen</span></label>
                </div>
                <div class="contenedor-inputs">
                    <label id="user-lb1" for="nombre-completo" class="etiqueta-texto">Nombre Completo</label>
                    <input id="update_campo_nombre" onblur="convertir_mayusculas('update_campo_nombre')"  name="update_campo_nombre" type="text" value="<?php echo $nombre ?>"   disabled="true" >
                        <label id="user-lbpen1" class="fas fa-pencil-alt label_pen "  onclick="habilitar_grupo_edicion('user-lb1', 'update_campo_nombre', 'user-lbpen1')"></label>                    
                </div >
                <div class="contenedor-inputs" >
                    <label id="user-lb2" class="etiqueta-texto">E-mail</label>                    
                    <input id="update_campo_email" onblur="convertir_mayusculas('update_campo_email')" name="update_campo_email" type="email" value="<?php echo $email ?>" disabled="true" >                            
                        <label id="user-lbpen2" class="fas fa-pencil-alt label_pen"  onclick="habilitar_grupo_edicion('user-lb2', 'update_campo_email', 'user-lbpen2')"></label>                   
                </div >
                <div class="contenedor-inputs">
                    <label id="user-lb3" class="etiqueta-texto">Nombre de Usuario</label>                    
                    <input id="update_campo_nickname" onblur="convertir_mayusculas('update_campo_nickname')" name="update_campo_nickname" type="text" value="<?php echo $nickname ?>" disabled="true" >
                        <label id="user-lbpen3" class="fas fa-pencil-alt label_pen"  onclick="habilitar_grupo_edicion('user-lb3', 'update_campo_nickname', 'user-lbpen3')"></label>                 
                </div>
                <div class="contenedor-inputs">
                    <label id="user-lb4" class="etiqueta-texto">Nuevo PIN</label>                   
                    <input id="update_campo_nuevopin" onblur="convertir_mayusculas('update_campo_nuevopin')" name="update_campo_nuevopin" type="password" value="" disabled="true" >
                        <label id="user-lbpen4" class="fas fa-pencil-alt label_pen"  onclick="habilitar_grupo_edicion('user-lb5', 'update_campo_confirmarpin', 'user-lbpen4'); habilitar_grupo_edicion('user-lb4', 'update_campo_nuevopin', 'user-lbpen4');"></label>                  
                </div>
                <div class="contenedor-inputs">
                    <label id="user-lb5" class="etiqueta-texto">Confirmar PIN</label>                   
                    <input id="update_campo_confirmarpin" onblur="convertir_mayusculas('update_campo_confirmarpin')"  name="update_campo_confirmarpin" type="password" value="" disabled="true" >                    
                </div>
                <div class="contenedor-inputs">
                    <label id="user-lb6" class="etiqueta-texto">Permisos de Cuenta</label>                    
                    <select id="update_selected_permisos" class="selector-group" name="update_selected_permisos" disabled="true" >
                        <option value="Administrador" <?= $nombre_tipo_cuenta == 'Administrador' ? ' selected="selected"' : ''; ?>>Administrador</option>
                        <option value="Usuario" <?= $nombre_tipo_cuenta == 'Usuario' ? ' selected="selected"' : ''; ?>>Usuario</option>
                        <option value="Cliente" <?= $nombre_tipo_cuenta == 'Cliente' ? ' selected="selected"' : ''; ?>>Cliente</option>
                    </select>
                    <label id="user-lbpen6" class="fas fa-pencil-alt label_pen" onclick="habilitar_grupo_edicion('user-lb6', 'update_selected_permisos', 'user-lbpen6')"></label>                   
                </div>
                <div class="contenedor-inputs">
                    <input id="send_update_data" name = "send_update_data" type="submit"  value="Actualizar Datos" >
                </div>                
                <input id="send_update_campoid" name="send_update_campoid" type="hidden" value="<?php echo $campoID ?>">
                <input id="send_update_camponombre" name="send_update_camponombre" type="hidden" value="<?php echo $campoNombre ?>">
                <input id="send_old_avatar" name="send_old_avatar" type="hidden" value="<?php echo $avatar_viejo; ?>">
            </form>
        </div>
        
    </div>
    <div id="update_respuesta_form">
    </div>
    <script>
        previewImg('form_update_data','update_img_avatar','imagen_vista_avatar');
    </script>
</div>




