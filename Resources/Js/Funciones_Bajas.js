function delete_grupo_send_data(id_grupo_selected){
    //document.getElementById("tabla_delete_grupos").style.display = 'none';
    //document.getElementById("mod_grupos_h2").style.display = 'none';
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Bajas/Grupo/delete_grupo.php',
        data:{id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
          $("#respuesta_contenedor_delete_grupos").html(respuesta);
        }
    });
}

function delete_usuario_send_data(id_grupo_selected){
    //document.getElementById("tabla_delete_grupos").style.display = 'none';
    //document.getElementById("mod_grupos_h2").style.display = 'none';
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Bajas/Usuarios/delete_usuario.php',
        data:{id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
          $("#delete_usuario_respuesta").html(respuesta);
        }
    });
}

function delete_estacion_send_data(id_grupo_selected){
    //document.getElementById("tabla_delete_grupos").style.display = 'none';
    //document.getElementById("mod_grupos_h2").style.display = 'none';
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Bajas/Estacion/delete_estacion.php',
        data:{id_grupo_selected: id_grupo_selected},
        success: function (respuesta) {
          $("#delete_estacion_respuesta").html(respuesta);
        }
    });
}

function alerta_delete(id_elemeto_eliminar){
    var id = id_elemeto_eliminar;
    alertify.confirm("Eliminar Elemento",function (e){
        if(e){
            delete_grupo_send_data(id);
        }else{
            alertify.error("Error");
        }
    });
}

function alerta_delete_usuario(id_elemeto_eliminar){
    var id = id_elemeto_eliminar;
    alertify.confirm("Eliminar Elemento",function (e){
        if(e){
            delete_usuario_send_data(id);
        }else{
            alertify.error("Error");
        }
    });
}

function alerta_delete_estacion(id_elemeto_eliminar){
    var id = id_elemeto_eliminar;
    alertify.confirm("Eliminar Elemento",function (e){
        if(e){
            delete_estacion_send_data(id);
        }else{
            alertify.error("Error");
        }
    });
}

function warningAlert(variable) {
    var msj = variable;
    alertify.alert(msj);
}


/*function reload_tabla_usuarios(id_tabla,id_es,tramite){
              var container=document.getElementById(id_tabla);
            while (container.hasChildNodes()){
                container.removeChild(container.firstChild);
            } 
       $.ajax({
       type:'post', 
       url:'../Scripts/insert/Seguimiento/Dependencia/ASEA/ASEA.php',
       data:{id_es:id_es,tramite:tramite}, //enviamos imagen
     }).done(function(valor){
       $("#Aseaphp").html(valor);
     }).fail(function(data){
        alert("Error");
        
     });   
}*/

