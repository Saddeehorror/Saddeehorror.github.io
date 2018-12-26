
//envia la id al formulario usuarios para edicion-------------------------------
function mostrar_editar_usuarios(id_usuario_selected) {
    document.getElementById("div_update_user_tab").style.display = 'none';
    /*document.getElementById("tabla_mod_usuarios").style.display = 'none';
    document.getElementById("mod_usuarios_h2").style.display = 'none';*/
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Actualizar/Users/Form_mod_usuarios.php',
        data: {id_usuario_selected: id_usuario_selected},
        success: function (respuesta) {
            $("#contenedor_mod_usuarios").html(respuesta);
        }
    });

}
//fin---------------------------------------------------------------------------

//envia la id al formulario grupos para edicion---------------------------------
function mostrar_editar_grupos(id_grupo_selected) {
    document.getElementById("contenedor_update_grupoTab").style.display = 'none';
    /*document.getElementById("tabla_mod_grupos").style.display = 'none';
    document.getElementById("mod_grupos_h2").style.display = 'none';*/
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Actualizar/Grupos/formulario_update_grupos.php',
        data: {id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
            $("#contenedor_mod_grupos").html(respuesta);
        }
    });
}
//fin---------------------------------------------------------------------------

//envia la id al formulario estaciones para edicion-----------------------------
function mostrar_editar_estaciones(id_grupo_selected) {
    document.getElementById("contenedor_update_es").style.display = 'none';
    /*document.getElementById("tabla_mod_estaciones").style.display = 'none';
    document.getElementById("toolbar-title-mod-es").style.display = 'none';*/
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Actualizar/Estaciones/formulario_update_estaciones.php',
        data: {id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
            $("#contenedor_mod_estaciones").html(respuesta);
        }
    });
}
//fin---------------------------------------------------------------------------

/* ya no esta en uso
 //enviar datos formulario modificar usuarios------------------------------------
 function enviar_datos(){
 var datos = $(this).serializeArray();
 var capture_data = new FormData($("#form_update_data")[0]);
 
 $.each(datos,function(key,input){
 capture_data.append(input.name,input.value);
 });
 
 $.ajax({
 type:'post',
 url:'../Scripts/insert/Actualizar/Users/mod_update_usuarios.php',
 data:capture_data,
 contentType:false,
 processData: false
 }).done(function(valor){
 $("#update_respuesta_form").html(valor);
 }).fail(function(data){
 alert("Error: "+data);
 });
 
 return false;
 }
 //fin---------------------------------------------------------------------------
 */

/*no se utiliza
 //enviar datos formulario modificar grupos--------------------------------------
 function enviar_datos_form_grupo(){
 var datos = $(this).serializeArray();
 var capture_data = new FormData($("#form_update_data_grupos")[0]);
 
 $.each(datos,function(key,input){
 capture_data.append(input.name,input.value);
 });
 
 $.ajax({
 type:'post',
 url:'../Scripts/insert/Actualizar/Grupos/update_modificacion_grupos.php',
 data:capture_data,
 contentType:false,
 processData: false
 }).done(function(valor){
 $("#respuesta_grupo_update").html(valor);
 }).fail(function(data){
 alert("Error: "+data);
 });
 
 return false;
 }
 //fin---------------------------------------------------------------------------
 */

//solo para inputs--------------------------------------------------------------
function habilitar_campo_actualizar(valor_id) {
    var campo = document.getElementById(valor_id);
    if (campo.disabled != false) {
        campo.disabled = false;
        campo.focus();
        //nuevo.disabled = false;
    } else {
        campo.disabled = true;
        //nuevo.disabled = true;
    }
}
//fin---------------------------------------------------------------------------

//funcion para ocultar elementos------------------------------------------------
function ocultarElementos(id_elemento) {
    var elemento = document.getElementById(id_elemento);
    if (elemento.style.display !== 'none') {
        elemento.style.display = 'none';
    } else {
        elemento.style.display = 'block';
    }
}


//funcion enviar datos al php para actualizar campos----------------------------
function ActualizarDatos(id_form, path_php, div_respuesta) {
    var datos = $(this).serializeArray();
    var capture_data = new FormData($("#" + id_form)[0]);

    $.each(datos, function (key, input) {
        capture_data.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: path_php,
        data: capture_data,
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#" + div_respuesta).html(valor);
    }).fail(function (data) {
        alert("Error: " + data);
    });

    return false;
}


//funcion pasar id de usuario seleccionado a el formulario para edicion---------
function send_id_selected(id_grupo_selected, path_php, div_respuesta, id_elementos_array) {
    /*for(var i = 0; i < id_elementos_array; i++){
     ocultarElementos(id_elementos_array[i]);
     }*/
    ocultarElementos(id_elementos_array);
    $.ajax({
        type: 'POST',
        url: path_php,
        data: {id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
            $("#" + div_respuesta).html(respuesta);
        }
    });
}

/*------------------funcion para habilitar campos---------------------------------*/
function habilitar_grupo_edicion(id_label, id_input, id_label_pen) {
    var label = document.getElementById(id_label);
    var labelpen = document.getElementById(id_label_pen);
    var input = document.getElementById(id_input);
    if (input.disabled != false) {
        input.disabled = false;
        input.focus();
        label.style.color = "#4caf50";
        labelpen.style.color = "#ff4081";
    } else {
        input.disabled = true;
        label.style.color = "#757575";
        labelpen.style.color = "#757575";
    }
}


function show_update_userTab(id,div) {
    alert(id);
    document.getElementById(id).style.display = "block"
    document.getElementById(div).style.display = "none";
    
    asignar_titulos(id);
}