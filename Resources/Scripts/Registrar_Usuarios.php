<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script> 

<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div class="card-form-alta">
            <form name="registerform" id="Alta_usuario_form" method="post"  enctype="multipart/form-data" onsubmit="return Alta('Alta_usuario_form', '../Scripts/insert/re_usuarios.php', 'respuesta_alta_usuarios', 'loading_reg_usuarios')" >
                
                <div class="contenedor-inputs-alta">
                    <!--<label class="etiqueta-textview-alta" for="avatar">Avatar</label>-->
                    <div class="div-cotenedor-avatar">
                        <img id="preview_alta_avatar" class="imagen_vista_avatar" src="../../System/avatar/avatar.png">
                    </div>
                    <div class="div-contenedor-input-file ">
                        <input class="boton-file-input" type="file" accept="image/*" name="file" id="file1">
                        <label for="file1"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Seleccionar Imagen</span></label>
                        <img src="../img/loading.gif" alt="loading..." height="42" width="42" style="display: none" id="loading_reg_usuarios">
                    </div>
                </div>
                
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="nombre">Nombre Completo</label>
                    <input name="nombre" type="text" onblur="convertir_mayusculas('Reg_usuario_nombre_completo')" value="" size="8" tabindex="1" id="Reg_usuario_nombre_completo">
                </div>  
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="email">E-mail</label> 
                    <input id="email" onblur="convertir_mayusculas('email')"  name="email" type="text" value="" size="8" tabindex="1">
                </div>  
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="user">Nombre de Usuario</label>
                    <input id="user" onblur="convertir_mayusculas('user')" name="user" type="text" value="" size="8" tabindex="1">
                </div>  
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="pass">PIN</label>
                    <input id="pass" onblur="convertir_mayusculas('pass')" name="pass" type="password" value="" size="8" tabindex="1">
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta">Seleccionar tipo de cuenta</label>
                    <select name="admin" class="selector-group">
                        <option value="0">Seleccionar</option>
                        <option value="1">Usuario</option>
                        <option value="2">Administrador</option>
                    </select>
                </div>

                <!--<div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title1" for="admin">Dar permisos de administrador</label>
                    <div class=" md-radio md-radio-inline">
                        <div class="md-radio md-radio-inline">
                            <input id="alta-usuarios-permisos1" type="radio" name="admin" value="2">
                            <label for="alta-usuarios-permisos1">Si</label>
                        </div>
                        <div class="md-radio md-radio-inline">
                            <input id="alta-usuarios-permisos2" type="radio" name="admin" value="1" checked>
                            <label for="alta-usuarios-permisos2">No</label>
                        </div>
                    </div>
                </div>-->

                <div class="contenedor-inputs-alta">
                    <input  name="registrar" type="submit" value="Registrar Usuario" onclick="">
                </div>	
            </form>
            <script>
                previewImg('Alta_usuario_form', 'file1', 'preview_alta_avatar');
            </script>
        </div>
        <div id="respuesta_alta_usuarios">

        </div>
    </div>

</div>


