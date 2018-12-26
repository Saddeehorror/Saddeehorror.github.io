function calendar_year(es,action){
var año_actual=document.getElementById("showyeartable"+es).textContent;
    if (action=='-') {
        año_actual=parseInt(año_actual)-1;
    }else if (action=='+'){
        año_actual=parseInt(año_actual)+1;
    }
    document.getElementById("showyeartable"+es).innerHTML=año_actual;
} //FUNCION PARA AÑO DEL TRAMITE
function show_caracteristicas(tramite,dependencia,tipo_tramite,numero_estacion) {
    asignar_titulos('info_tramite');
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Caracteristicas_tramite.php',
        data: {tramite: tramite, dependencia:dependencia, tipo_tramite:tipo_tramite, numero_estacion:numero_estacion},
        success: function (result) {
            $("#Caracteristicas_tramites_seguimiento").html(result);
            document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "block";
            document.getElementById("seguimiento_tables_container").style.display = "none";
        }
    });
} //FUNCION PARA MOSTRAR LAS CARACTERISTICAS DEL TRAMITE
function alta_tramites(tramite,tipo_tramite,dependencia,numero_es) { //FUNCION PARA DAR DE ALTA EL TRAMITE
    alertify.confirm('<div class=\"contenido_mensaje\">¿Dar de alta ' + tramite + ' para la estación ' + numero_es + '?<div>', function () {
            alertify.success('<div class=\"text_to_white\">Realizando Alta</div>'); 
                registrar_tramite(tramite,tipo_tramite,dependencia,numero_es);
        }, function(){
             alertify.error('<div class=\"text_to_white\">Alta Cancelada</div>'); 
    }).setHeader("<div class=\"go_green\"><span class=\"fas fa-check\"></span><span>Confirmar alta de "+tipo_tramite+"</span></div>").set({'transition':'fade'}).set('labels', {ok:'Si', cancel:'No'});
} //FUNCION PARA CONFIRMAR EL ALTA
function registrar_tramite(tramite,tipo_tramite,dependencia,numero_es){
      $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Alta_tramites.php',
        data: {tramite:tramite,tipo_tramite:tipo_tramite,dependencia:dependencia,numero_es:numero_es},
        success: function (result) {
            document.getElementById("form_registro_tramite").style.display = "none";
            document.getElementById("Alta_tramites_success").style.display = "block";
            $("#Alta_tramites_success").html(result);
        }
    });  
} //FUNCION PARA MANDAR LA INFORMACION Y REALIZAR EL ALTA
function alta_exitosa(tramite,tipo_tramite,numero_es){
    alertify.alert().set({'transition':'fade','message':'<div class=\"contenido_mensaje\"> Se realizo el alta del '+tipo_tramite+' '+tramite+' de la estacion '+numero_es+'</div>'}).show()
        .setHeader("<div class=\"go_green\"><span>Alta de "+tipo_tramite+" exitosa</span></div>");
} //ALERTA DE REGISTRO EXITOSO
function alta_fracasada(tramite,tipo_tramite,dependencia,numero_es){
       alertify.alert().set({'transition':'fade','message':'<div class=\"contenido_mensaje\"> Ocurrio un error con el alta del '+tipo_tramite+' '+tramite+' de la estacion '+numero_es+'</div>'}).show()
        .setHeader("<div class=\"go_green\"><span>Error en alta de "+tipo_tramite+"</span></div>");
} //ALERTA DE ERROR DE REGISTRO
function hover_row(clase,estado){
    var fila=document.getElementsByClassName(clase);
    if (estado=='over') {
         for (var i = 0; i < fila.length; i++) {
             var r_a=0.5;
        fila[i].style.backgroundColor="rgba(76, 175, 80, 0.5)";
    }   
    }else if (estado='out'){
               for (var i = 0; i < fila.length; i++) {
        fila[i].style.backgroundColor="#e7e7e7";
    }   
    }


}
function delete_tramite(numero_tramite,nombre_tramite,dependencia,tipo_tramite,numero_es){
    alertify.confirm('<div class=\"contenido_mensaje\">¿Esta seguro que quiere eliminar el tramite?<div>', function () {
      $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Baja_tramites.php',
        data: {numero_tramite:numero_tramite,nombre_tramite:nombre_tramite,dependencia:dependencia,tipo_tramite:tipo_tramite,numero_es:numero_es},
        success: function (result) {
           //document.getElementById("table_caracteristicas").style.display = "none";
            $("#form_registro_tramite").html(result);
        }
    });            
         //   alertify.success('<div class=\"text_to_white\">Realizando Alta</div>'); 
        }, function(){
             alertify.error('<div class=\"text_to_white\">No se realizo la baja del tramite</div>'); 
        
        
    }).setHeader("<div class=\"go_yellow\"><span class=\"fas fa-exclamation-triangle\"></span><span>Confirmar baja</span></div>").set({'transition':'fade'}).set('labels', {ok:'Si', cancel:'No'}); ;
}
function reload_page (nombre_tramite,dependencia,tipo_tramite,numero_es){
       $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Caracteristicas_tramite.php',
        data: {nombre_tramite:nombre_tramite,dependencia:dependencia,tipo_tramite:tipo_tramite,numero_es:numero_es},
        success: function (result) {
            $("#Caracteristicas_tramites_seguimiento").html(result);
        }
    });    
}
function show_information(id_tramite){
        asignar_titulos('info_tramite_2');
         $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',
        data: {id_tramite:id_tramite},
        success: function (result) {
            document.getElementById("form_registro_tramite").style.display = "none";
            document.getElementById("Alta_tramites_success").style.display = "block";
            $("#Alta_tramites_success").html(result);
        }
    }); 
}
function show_tramites_dependientes_content(id_td){
            asignar_titulos('info_tramite_2');
         $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramites_dependientes.php',
        data: {id_td:id_td},
        success: function (result) {
            document.getElementById("form_registro_tramite").style.display = "none";
            document.getElementById("Alta_tramites_success").style.display = "block";
            $("#Alta_tramites_success").html(result);
        }
    }); 
}

function tramites_dependientes(tramite,dependencia,tipo_tramite,es){
    asignar_titulos('info_tramite');
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/Caracteristicas_tramite_dependiente.php',
        data: {tramite: tramite, dependencia:dependencia, tipo_tramite:tipo_tramite, numero_estacion:es},
        success: function (result) {
            $("#Caracteristicas_tramites_seguimiento").html(result);
            document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "block";
            document.getElementById("seguimiento_tables_container").style.display = "none";
        }
    }); 
}

function function_master(tramite,estatus,numero_es,fecha_alta_sistema){
    var fecha_alta=myfecha(fecha_alta_sistema)
    paint_rows(tramite,estatus,numero_es,fecha_alta);
}
function myfecha(fecha_alta_sistema){
    
    return fecha_alta_sistema[3]+""+fecha_alta_sistema[4]+"/"+fecha_alta_sistema[6]+""+fecha_alta_sistema[7]+""+fecha_alta_sistema[8]+""+fecha_alta_sistema[9];
}
function paint_rows(tramite,estatus,numero_es,fecha_alta_sistema){
    var array_tramite=tramite.split(",");
    var array_estatus=estatus.split(",");           
    for (var i = 0; i < array_estatus.length; i++) {
        alert(array_estatus[i]);
        switch(array_estatus[i]) {
            case "En espera de ser ingresado en dependencia":
               var id=array_tramite[i]+""+numero_es;
               document.getElementById(id).style.backgroundColor="#cfd8dc";
               document.getElementById(fecha_alta_sistema+""+array_tramite[i]+""+numero_es).style.backgroundColor="#cfd8dc";
               habilitar_tramite(array_tramite[i],numero_es,array_estatus[i]);
               break;
            case "En espera de publicacion del boletin":
               var id=array_tramite[i]+""+numero_es;
               document.getElementById(id).style.backgroundColor="#fff176";
               document.getElementById(fecha_alta_sistema+""+array_tramite[i]+""+numero_es).style.backgroundColor="#fff176";
               habilitar_tramite(array_tramite[i],numero_es,array_estatus[i]);
               break;
            case "Resolutivo":
                
               var id=array_tramite[i]+""+numero_es;
               document.getElementById(id).style.backgroundColor="#4CAF50";
               document.getElementById(fecha_alta_sistema+""+array_tramite[i]+""+numero_es).style.backgroundColor="#4CAF50";
               habilitar_tramite(array_tramite[i],numero_es,array_estatus[i]);
               break;
            case "Desechamiento":
                var id=array_tramite[i]+""+numero_es;
               document.getElementById(id).style.backgroundColor="#C70039";
               document.getElementById(fecha_alta_sistema+""+array_tramite[i]+""+numero_es).style.backgroundColor="#C70039";
               habilitar_tramite(array_tramite[i],numero_es,array_estatus[i]);
               break;
       }        
    }    
}
function habilitar_tramite(tramite,es,estatus){
    switch(tramite){
        case "MIA":
            if (estatus=="Resolutivo") {
               var terminos_condicionantes= document.getElementById("TyClabel"+es);
               terminos_condicionantes.style.color="#000";
               terminos_condicionantes.onclick=function(){
                    tramites_dependientes('TYC','ASEA','asunto',es);
                };
            }
        break;
        case "IP":
            if (estatus=="Resolutivo") {
               var terminos_condicionantes= document.getElementById("TyClabel"+es);
               terminos_condicionantes.style.color="#000";
               terminos_condicionantes.onclick=function(){
                    tramites_dependientes('TYC','ASEA','asunto',es);
                };
            }
        break;        
    }
}
function enable_table_inputs(seccion){
    switch(seccion){
        case "seccion1":
            document.getElementById("input_fecha_ingreso_dependencia").disabled=false;
            document.getElementById("input_no_bitacora").disabled=false;
            document.getElementById("file_acuce_recibo").disabled=false;
            document.getElementById("file_acuce_recibo").classList.remove("inputfile_caracteristicastramite_disabled");
            document.getElementById("file_acuce_recibo").classList.add("inputfile_caracteristicastramite");
        break;
        case "seccion2":
            document.getElementById("fecha_aparicion_boletin").disabled=false;
        break;
        case "seccion3":
            document.getElementById("fecha_recepcion_respuesta").disabled=false;
            document.getElementById("num_oficio").disabled=false;
            document.getElementById("file_respuesta").disabled=false;
            var select=document.getElementById("estado_tramite_update");
            select.disabled=false;
            while(select.hasChildNodes()){
                select.removeChild(select.firstChild);
            }

            var option = document.createElement("option");
            option.text="Seleccione";
            
            var option1= document.createElement("option");
            option1.text="Resolutivo";
            var option2= document.createElement("option");
            option2.text="Acuerdo de apercibimiento";
            var option3= document.createElement("option");
            option3.text="Desechamiento";
            
            select.appendChild(option);
            select.appendChild(option1);
            select.appendChild(option2);
            select.appendChild(option3);
            
            document.getElementById("file_respuesta").classList.remove("inputfile_caracteristicastramite_disabled");
            document.getElementById("file_respuesta").classList.add("inputfile_caracteristicastramite");            
        break;
        case "seccion4":
            document.getElementById("fecha_reingreso_dependencia").disabled=false;
            document.getElementById("file_comprobante_reingreso").disabled=false;
            document.getElementById("file_comprobante_reingreso").classList.remove("inputfile_caracteristicastramite_disabled");
            document.getElementById("file_comprobante_reingreso").classList.add("inputfile_caracteristicastramite");
        break;
        case "seccion5":
            document.getElementById("fecha_reaparicion_boletin").disabled=false;            
        break;
        case "seccion6":
            document.getElementById("fecha_rerecepcion_resolutivo").disabled=false;
            document.getElementById("num_oficio_inf_alcance").disabled=false;
            document.getElementById("file_respuesta_inf_alcance").disabled=false;
            document.getElementById("file_respuesta_inf_alcance").classList.remove("inputfile_caracteristicastramite_disabled");
            document.getElementById("file_respuesta_inf_alcance").classList.add("inputfile_caracteristicastramite");
            
            var select=document.getElementById("estado_tramite_update");
            select.disabled=false;
            select.onchange=null;
            select.onchange=function(){
      resolutivo();
    };
            while(select.hasChildNodes()){
                select.removeChild(select.firstChild);
            }
            var option = document.createElement("option");
            option.text="Seleccione";
            
            var option1 = document.createElement("option");
            option1.text="Resolutivo";
            
            var option2= document.createElement("option");
            option2.text="Desechamiento";
            
            select.appendChild(option);
            select.appendChild(option1);
            select.appendChild(option2);
        break;    
    }
}
function enable_table_inputs_td(){
                document.getElementById("input_fecha_ingreso_dependencia_td").disabled=false;
            document.getElementById("file_acuce_recibo_td").disabled=false;
            document.getElementById("file_acuce_recibo_td").classList.remove("inputfile_caracteristicastramite_disabled");
            document.getElementById("file_acuce_recibo_td").classList.add("inputfile_caracteristicastramite");
}
function file_name(id_input,id_show){
    var file_name=document.getElementById(id_input).files[0].name
    document.getElementById(id_show).innerHTML=file_name;
}
function update_tramite(file,id){
    var datos = $(this).serializeArray(); //datos serializados
    var form = new FormData($("#"+id)[0]);

    //agergaremos los datos serializados al objecto imagen
    $.each(datos, function (key, input) {
        form.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Seguimiento/Procesos_tramites/'+file+'.php',
        data: form, //enviamos imagen
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#update_tramite_answer").html(valor);
    }).fail(function (data) {
        alert("Error");

    });
    return false;
}
function estado_tramite(valor,tramite){
    //reset---------------------------------------------------------------------
    var table_extra=document.getElementsByClassName("inf_alcance_table");
    for (var i = 0; i < table_extra.length; i++) {
        table_extra[i].style.display="none";
    }
    
    var tyc_table=document.getElementsByClassName("tyc_table");
    for (var i = 0; i < tyc_table.length; i++) {
        tyc_table[i].style.display="none";
    }
    
    //INFORMACION EN ALCANCE----------------------------------------------------    
    if (valor=="Acuerdo de apercibimiento") {
        var table_extra=document.getElementsByClassName("inf_alcance_table");
        document.getElementById("dias_habiles_info_alcance").disabled=false;
        for (var i = 0; i < table_extra.length; i++) {
            table_extra[i].style.display="table-row";
        }
    }
    //RESOLUTIVO----------------------------------------------------------------
    if (valor=="Resolutivo" && tramite=="MIA" || tramite=="IP") {
        var tyc_table=document.getElementsByClassName("tyc_table");
        for (var i = 0; i < tyc_table.length; i++) {
            tyc_table[i].style.display="table-row";
        }
    }
}
function resolutivo(){
 var select=document.getElementById("estado_tramite_update");
    
    
        var tyc_table=document.getElementsByClassName("tyc_table");
    for (var i = 0; i < tyc_table.length; i++) {
        tyc_table[i].style.display="none";
    }
    if (select.value=="Resolutivo"){
        var tyc_table=document.getElementsByClassName("tyc_table");
        for (var i = 0; i < tyc_table.length; i++) {
            tyc_table[i].style.display="table-row";
        }        
    }
    
}
function draw_fechas_tyc(valor){
    
    var fecha1 = document.getElementById('fecha1_tyc_table');
    while (fecha1.hasChildNodes()){
        fecha1.removeChild(fecha1.firstChild);
    }
    var fecha2 = document.getElementById('fecha2_tyc_table');
    while (fecha2.hasChildNodes()){
        fecha2.removeChild(fecha2.firstChild);
    }
    
    if (valor=="semestral") {
        var td1=document.createElement("td");
        td1.innerHTML="Fecha de el primer periodo para presentar terminos y condicionantes: ";
        var td_fecha1=document.createElement("td");
        var input_fecha1=document.createElement("input");
        input_fecha1.type="date";
        input_fecha1.name="fecha1";
        
        var td2=document.createElement("td");
        td2.innerHTML="Fecha de el segundo periodo para presentar terminos y condicionantes: ";
        var td_fecha2=document.createElement("td");
        var input_fecha2=document.createElement("input");   
        input_fecha2.type="date";
        input_fecha2.name="fecha2";
        
        td_fecha1.appendChild(input_fecha1);
        fecha1.appendChild(td1);
        fecha1.appendChild(td_fecha1);
        
        td_fecha2.appendChild(input_fecha2);
        fecha2.appendChild(td2);
        fecha2.appendChild(td_fecha2);
        
    }else if (valor=="anual"){
        var td1=document.createElement("td");
        td1.innerHTML="Fecha para presentar terminos y condicionantes:  ";
        var td_fecha1=document.createElement("td");
        var input_fecha1=document.createElement("input");
        input_fecha1.type="date";
        input_fecha1.name="fecha1";
        
        td_fecha1.appendChild(input_fecha1);
        fecha1.appendChild(td1);        
        fecha1.appendChild(td_fecha1);
    }
    
}
function show_informacion_alcance(valor){
    var table_extra=document.getElementsByClassName("show_extra");
    for (var i = 0; i < table_extra.length; i++) {
        table_extra[i].style.display="none";
    }
    
    if (valor=="Acuerdo de apercibimiento") {
        var table_extra=document.getElementsByClassName("show_extra");
        for (var i = 0; i < table_extra.length; i++) {
            table_extra[i].style.display="table-row";
        }
    }
}






function alert_message(mensaje,tipo,titulo){

     switch(tipo){
        case "Error":
           var clase="go_red";
           var icon="fas fa-times";
        break;
        case "warning" :
           var clase="go_yellow";
           var icon="fas fa-exclamation-triangle";
        break;
        case "success":
            var clase="go_green";
            var icon="fas fa-check";
        break;
    } 
        var array_message=mensaje.split(",");
        var lista_message="<ul>";
        
        for (var i = 0; i < array_message.length; i++) {
           lista_message=lista_message+"<li>"+array_message[i]+"</li>"
        }
         lista_message=lista_message+"</ul>"
        alertify.alert('<div class=\"contenido_mensaje\">'+lista_message+'<div>').
        setHeader("<div class=\""+clase+"\"><span class=\""+icon+"\"></span><span>"+titulo+"</span></div>").
        set({'transition':'fade'}).show() ;
}

function reload_datos_tramite(file,id,numero_tramite){
    var success=".";
           $.ajax({
        type: 'POST',
        url: file,
        data: {success:success,id_tramite:numero_tramite},
        success: function (result) {
            $(id).html(result);
        }
    }); 
}


























////////////////////////////////////////////////////////////////////////////////

function show_table_seguimiento() {
    document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "none";
    document.getElementById("seguimiento_tables_container").style.display = "block";
}
//---------------------------------------------------------------------------------------------------
/*function Desabilitar_tramites(NUM_ESTACION){
    //IMPACTO AMBIENTAL
    document.getElementById("MPAlabel"+NUM_ESTACION).style.color = "white";
    document.getElementById("MPAlabel"+NUM_ESTACION).onclick=null;
    document.getElementById("CDTlabel"+NUM_ESTACION).style.color = "white";
    document.getElementById("CDTlabel"+NUM_ESTACION).onclick=null;
    document.getElementById("obligacion"+NUM_ESTACION).style.backgroundColor="#ebebeb";
    document.getElementById("TyC"+NUM_ESTACION).style.backgroundColor="#ebebeb";
    document.getElementById("TyClabel"+NUM_ESTACION).style.color = "white";
    document.getElementById("TyClabel"+NUM_ESTACION).onclick=null;
}
function disabled_elements(NUM_ESTACION){
    var array_elementos=document.getElementsByClassName("disable_me"+NUM_ESTACION);
    for (var i = 0; i < array_elementos.length; i++) {
            document.getElementById(array_elementos[i].id).style.color = "white";
    document.getElementById(array_elementos[i].id).onclick=null;
    }
}*/
function disabled_impacto_ambiental(NUM_ESTACION){
        document.getElementById("MPAlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("MPAlabel"+NUM_ESTACION).onclick=null;
        document.getElementById("CDTlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("CDTlabel"+NUM_ESTACION).onclick=null;
        document.getElementById("obligacion_ia"+NUM_ESTACION).style.backgroundColor="#ebebeb";
        document.getElementById("TyC"+NUM_ESTACION).style.backgroundColor="#ebebeb";
        document.getElementById("TyClabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("TyClabel"+NUM_ESTACION).onclick=null;    
}
function disabled_licencia_ambiental(NUM_ESTACION){
        document.getElementById("LUAlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("LUAlabel"+NUM_ESTACION).onclick=null;
        document.getElementById("MOD_LUAlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("MOD_LUAlabel"+NUM_ESTACION).onclick=null;
        document.getElementById("obligacion_lau"+NUM_ESTACION).style.backgroundColor="#ebebeb";
        document.getElementById("COA"+NUM_ESTACION).style.backgroundColor="#ebebeb";
        document.getElementById("COAlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("COAlabel"+NUM_ESTACION).onclick=null;
}
function disabled_sasisopa(NUM_ESTACION){
        document.getElementById("SASISOPAlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabel"+NUM_ESTACION).onclick=null;
        document.getElementById("SASISOPAlabelconformacion"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabelconformacion"+NUM_ESTACION).onclick=null; 
        document.getElementById("SASISOPAlabeldictaminacion"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabeldictaminacion"+NUM_ESTACION).onclick=null; 
        document.getElementById("SASISOPAlabelresolucion"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabelresolucion"+NUM_ESTACION).onclick=null; 
        document.getElementById("SASISOPAlabelimplementacion"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabelimplementacion"+NUM_ESTACION).onclick=null; 
        document.getElementById("SASISOPAlabeldictaminacion2"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabeldictaminacion2"+NUM_ESTACION).onclick=null; 
        document.getElementById("SASISOPAlabelinformeanual"+NUM_ESTACION).style.color = "white";
        document.getElementById("SASISOPAlabelinformeanual"+NUM_ESTACION).onclick=null; 
}

function Checar_tramites(ARRAY_TRAMITE,ARRAY_ESTADO,NUM_ESTACION){
    //disabled_elements(NUM_ESTACION)
    //Desabilitar_tramites(NUM_ESTACION)
    var Array_tramites=ARRAY_TRAMITE.split(",");
    var Array_estado=ARRAY_ESTADO.split(","); 
    for (i=0; i<Array_tramites.length; i++){
        if (Array_tramites[i]=="MIA"  || Array_tramites[i]=="IP"  || Array_tramites[i]=="AIO") {
            
        }else{
        //IMPACTO AMBIENTAL.....................................................
        disabled_impacto_ambiental(NUM_ESTACION);
        //LICENCIA AMBIENTAL....................................................
        disabled_licencia_ambiental(NUM_ESTACION);
        //SASISOPA....................................................
        disabled_sasisopa(NUM_ESTACION);
        }
        if (Array_tramites[i]=="AEG"){
            
        }else{
        document.getElementById("MOD_AEGlabel"+NUM_ESTACION).style.color = "white";
        document.getElementById("MOD_AEGlabel"+NUM_ESTACION).onclick=null;  
        }
    }
}
function pintar_estados_tramites(tramite,estado,NUM_ESTACION){
            if (estado=='Resolutivo'){
           document.getElementById(tramite+NUM_ESTACION).style.backgroundColor = "#7DCEA0";
           document.getElementById(tramite+"label"+NUM_ESTACION).style.color = "#F4F6F7"; 
        }else if(estado=='En espera de ser ingresado a Asea'){
           document.getElementById(tramite+NUM_ESTACION).style.backgroundColor = "#808B96";
           document.getElementById(tramite+"label"+NUM_ESTACION).style.color = "#F4F6F7";            
        }else if(estado=='En espera de publicacion del boletin'||estado=='En espera de recepcion de resolutivo o notificación'){ 
           document.getElementById(tramite+NUM_ESTACION).style.backgroundColor = "#F7DC6F";
           document.getElementById(tramite+"label"+NUM_ESTACION).style.color = "#F4F6F7";    
        }else if(estado=='Asunto'){
           document.getElementById(tramite+NUM_ESTACION).style.backgroundColor = "#D98880";
           document.getElementById(tramite+"label"+NUM_ESTACION).style.color = "#F4F6F7";         
        }
}

function Pintar_tramites_alta(ARRAY_TRAMITE,ARRAY_ESTADO,NUM_ESTACION){ //SE PINTARON LOS TRAMITES QUE ESTEN DADOS DE ALTA DEPENDIENDO SU ESTADO
    var Array_tramites=ARRAY_TRAMITE.split(",");
    var Array_estado=ARRAY_ESTADO.split(",");
    for (i=0;i<Array_tramites.length;i++){
        if (Array_tramites[i]=='MIA'||Array_tramites[i]=='IP') {
          pintar_estados_tramites(Array_tramites[i],Array_estado[i],NUM_ESTACION)   
        }else{
         pintar_estados_tramites(Array_tramites[i],Array_estado[i],NUM_ESTACION)  
        }
        
        

    } 
}

function Funciones_de_tabla(ARRAY_TRAMITE,ARRAY_ESTADO,NUM_ESTACION){
    Checar_tramites(ARRAY_TRAMITE,ARRAY_ESTADO,NUM_ESTACION)
    Pintar_tramites_alta(ARRAY_TRAMITE,ARRAY_ESTADO,NUM_ESTACION);
}
