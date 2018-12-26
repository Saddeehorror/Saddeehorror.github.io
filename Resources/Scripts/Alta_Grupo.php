<div class="div-contenedor-cuerpo">

    <div class="div-subcontenedor">
        <div class="card-form-alta">
            <form  name="gpo_alta" id="Alta_grupo_corporativo_form"  method="post" onsubmit="return Alta('Alta_grupo_corporativo_form', '../Scripts/insert/Alta/Grupo/re_grupo.php', 'RESPUESTA_GRUPOPHP');">

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="razon_social">Razon Social*: <small>(No Poner Punto al final)</small></label>
                    <input id="alta_grupo_razon_social" name="razon_social" type="text"  value="" onblur="convertir_mayusculas('alta_grupo_razon_social')"  tabindex="1">
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="rep_legal">Rep. Legal*:</label>
                    <input id="alta_grupo_rep_legal" name="rep_legal" type="text"  spellcheck="false" value="" onblur="convertir_mayusculas('alta_grupo_rep_legal')" tabindex="2"> 
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" for="rfc_replegal">R.F.C <small>(Rep. Legal)</small>:</label>
                    <input id="alta_grupo_rfc_replegal" name="rfc_replegal" type="text" value="" onblur="convertir_mayusculas('alta_grupo_rfc_replegal')" tabindex="3"> 
                </div>

                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title5" for="curp_replegal">Curp <small>(Rep. Legal)</small>:</label>
                    <input id="alta_grupo_curp_replegal" name="curp_replegal" type="text" class="curp_replegal" value="" onblur="convertir_mayusculas('alta_grupo_curp_replegal')" tabindex="4"> 

                </div>
                
                <div class="contenedor-inputs-alta">
                    <label class="etiqueta-textview-alta" id="title6" for="curp_replegal">Email <small>(Rep. Legal)</small>*:</label>
                    <input id="alta_grupo_email_repegal" name="email_repegal" type="email" class="email_repegall" value="" onblur="convertir_mayusculas('alta_grupo_email_repegal')" tabindex="4"> 
                </div>
                
                <div class="contenedor-inputs-alta" >
                    <label class="etiqueta-textview-alta">Fondo <small>(Tamaño de imagen 427x240)</small> </label>
                    
                    <div class="contenedor_img_preview">
                        <img id="img_preview_fondo" src="../../System/Grupos/Pendiente/Fondo/background_default.png" class="img_tamaño_background"> 
                    </div>
                    <div class="div-contenedor-input-file ">
                        <input id="alta_grupo_fondo" class="boton-file-input" name="alta_grupo_fondo" type="file"  accept="image/*" >
                        <label for="alta_grupo_fondo"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Upload Fondo</span></label>
                    </div>
                </div>

                <div class="contenedor-inputs-alta" >
                    <label class="etiqueta-textview-alta">Foto</label>
                    <div class="contenedor_img_preview" >
                        <img id="img_preview_foto" src="../../System/Grupos/Pendiente/Foto/card_img_default.png" class="img_tamaño_background"> 
                    </div>
                    <div class="div-contenedor-input-file ">
                        <input id="alta_grupo_foto" class="boton-file-input" name="alta_grupo_foto" type="file"  accept="image/*" >
                        <label for="alta_grupo_foto"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg><span>  Upload Foto</span></label>
                    </div>
                </div>


                <div class="contenedor-inputs-alta">
                    <input  name="reg_grupo"  type="submit" value="Registrar Grupo Nuevo">
                </div>

            </form>

        </div>
        <div id='RESPUESTA_GRUPOPHP'></div>
    </div>
    <script>
        previewImg('Alta_grupo_corporativo_form', 'alta_grupo_fondo', 'img_preview_fondo');
    </script>
    <script>
        previewImg('Alta_grupo_corporativo_form', 'alta_grupo_foto', 'img_preview_foto');
    </script>
</div>



