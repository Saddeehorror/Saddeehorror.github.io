function boton_menu() {
    $('#sidebar_admin').toggleClass('hide-all');
    $('#content-all').toggleClass('hide-all');
}

function convertir_mayusculas(id) {
    var campo = document.getElementById(id);
    campo.value = campo.value.toUpperCase();
}

function erroresalert(variable) {
    var msj = variable;
    alertify.alert(msj).setHeader('<h3> Error</h3>');
}

function aviso(name) {
    var msj = name;
    alertify.alert(msj, function (e) {
        if (e) {
            location.href = "../../index.php";
        }
    }).setHeader('<h3> Exito</h3>');
}
function aviso_noreload(name) {
    var msj = name;
    alertify.alert(msj).setHeader('<h3> Exito</h3>');
}

/*FUNCIONES PARA CUESTIONARIO*/


//Funciones para menu.............................................................................................................................................
function mostrar_hijos_menu(id_hijo, id_padre, id_sidebar) {
    document.getElementById(id_sidebar).classList.add(id_padre);
    var clase = document.getElementsByClassName("background-modulo-sidebar");
    var active = document.getElementsByClassName("itsactive");
    for (var i = 0; i < clase.length; i++) {
        clase[i].classList.remove("background-modulo-sidebar");
    }
    var nombre = document.getElementById(id_hijo).className;

    if (nombre == "itsactive") {
        $(".itsactive").slideToggle();
        for (var i = 0; i < active.length; i++) {
            active[i].classList.remove("itsactive");
        }
    } else {
        if (active.length != 0) {
            $(".itsactive").slideToggle();
            for (var i = 0; i < active.length; i++) {
                active[i].classList.remove("itsactive");
            }
            $("#" + id_hijo).slideToggle();
            document.getElementById(id_padre).classList.add("background-modulo-sidebar");
            document.getElementById(id_hijo).classList.add("itsactive");
        } else {
            $("#" + id_hijo).slideToggle();
            document.getElementById(id_padre).classList.add("background-modulo-sidebar");
            document.getElementById(id_hijo).classList.add("itsactive");
        }
    }


}
/*CHECAR*/


//TOOLBAR-----------------------------------------------------------------------
function TOOLBAR(titulo,span,show,hide){
   if (titulo=="") {        
    }else{
        var titulo_toolbar=document.getElementById("title_span_toolbar");
        var Span=document.getElementById("toolbar_arrow_icon");
        titulo_toolbar.innerHTML=titulo;
        if (span!=0) {
            Span.style.display="block";
            document.getElementById("toolbar_arrow_icon").addEventListener("click", flechatras);
            
        }else{
            Span.style.display="none";
        }
    }
}
function flechatras(){
//Actualizar--------------------------------------------------------------------    
if($('#form_data_group').is(":visible")){
    document.getElementById("contenedor_update_grupoTab").style.display="block";
    document.getElementById("form_data_group").style.display="none";
    asignar_titulos("form_data_group");    
}else if ($('#contenedor_form_update_es').is(":visible")){
    document.getElementById("contenedor_update_es").style.display="block";
    document.getElementById("contenedor_form_update_es").style.display="none";
    asignar_titulos("contenedor_form_update_es"); 
}else if ($('#form_data_user').is(":visible")){
    document.getElementById("div_update_user_tab").style.display="block";
    document.getElementById("form_data_user").style.display="none";
    asignar_titulos("form_data_user"); 
}
//TABLA-------------------------------------------------------------------------
/*if($('#Caracteristicas_tramites_seguimiento').is(":visible")){
    document.getElementById("seguimiento_tables_container").style.display = "block";
    document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "none";
    asignar_titulos("Caracteristicas_tramites_seguimiento");
}*/
    
/*if($('#descripcion_tramite').is(":visible")){
   document.getElementById("table_caracteristicas").style.display = "table";
    document.getElementById("descripcion_tramite").style.display = "none";
    asignar_titulos("info_tramite");
}else if($('#Caracteristicas_tramites_seguimiento').is(":visible")){
    document.getElementById("seguimiento_tables_container").style.display = "block";
    document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "none";
    asignar_titulos("Caracteristicas_tramites_seguimiento")
    
}*/
    if ($('#form_registro_tramite').is(":visible")) {
        document.getElementById("Caracteristicas_tramites_seguimiento").style.display = "none";
        document.getElementById("seguimiento_tables_container").style.display = "block";
        asignar_titulos("Caracteristicas_tramites_seguimiento");        
    }    
    if ($('#descripcion_de_tramite').is(":visible")) {
        document.getElementById("descripcion_de_tramite").style.display = "none";
        document.getElementById("form_registro_tramite").style.display = "block";
        asignar_titulos("info_tramite");
    }
    if ($('#Alta_tramites_success').is(":visible")) {
        document.getElementById("Alta_tramites_success").style.display = "none";
        document.getElementById("form_registro_tramite").style.display = "block";
        asignar_titulos("info_tramite");        
    }    
    
    
//S.A.S.I.S.O.P.A---------------------------------------------------------------
if($('#contenedor_sasisopa_es_files').is(":visible")){
    document.getElementById("documentacion_sasisopa_container_es_folder").style.display="block";
    document.getElementById("contenedor_sasisopa_es_files").style.display="none";
    asignar_titulos("documentacion_sasisopa_container_es_folder");    
}else if ($('#documentacion_sasisopa_container_es_folder').is(":visible")){
    document.getElementById("contenedor_sasisopa_es_").style.display="none";
          if ($('#documentacionsasisopacontaineres').length) {
        document.getElementById("documentacionsasisopacontaineres").style.display="block";
        asignar_titulos("documentacionsasisopacontaineres"); 
    } else {
        document.getElementById("documentacionsasisopacontaineres_client").style.display="block";
        asignar_titulos("documentacionsasisopacontaineres_client"); 
    }
}else if ($('#documentacionsasisopacontaineres').is(":visible")){
   document.getElementById("documentacion_sasisopa_container_group").style.display="block";
   document.getElementById("contenedor_sasisopa_es").style.display="none";
   asignar_titulos("documentacion_sasisopa_container_group");
}
//Documentacion-----------------------------------------------------------------
if ($('#Documentacion_estaciones').is(':visible')){
   document.getElementById("Gestion_estaciones").style.display="block";
   document.getElementById("Documentacion_estaciones").style.display="none";
   asignar_titulos("Gestion_estaciones"); 
}else if ($('#Gestion_estaciones').is(':visible')){
       document.getElementById("Gestion_estaciones").style.display="none";
    if ($('#Estaciones_de_servicio_container').length) {
        document.getElementById("Estaciones_de_servicio_container").style.display="block";
        asignar_titulos("Estaciones_de_servicio_container"); 
    } else {
        document.getElementById("Estaciones_de_servicio_container_clientes").style.display="block";
        asignar_titulos("Estaciones_de_servicio_container_clientes"); 
    }     
}else if ($('#Estaciones_de_servicio_container').is(':visible')){
   document.getElementById("Razonsocial_usuario").style.display="block";
   document.getElementById("Estaciones_de_servicio_container").style.display="none";
   asignar_titulos("Razonsocial_usuario");
}else if ($('#es_content_files').is(':visible')){
        document.getElementById("es_content_files").style.display="none";
        document.getElementById("Gestion_estaciones").style.display="block";
        asignar_titulos("Gestion_estaciones"); 
}


}
//FIN TOOLBAR-------------------------------------------------------------------

//FUNCTION TITULOS--------------------------------------------------------------
function asignar_titulos(id) {
    //alert(id);
var titulo="";
var arrow=0;
var show="";
var hide="";
    var array = [];
    switch (id) { //Relacion estados sector comercial
        case 'Alta_grupos':
            titulo = "Alta de Grupos Corporativo";
            arrow = 0;
            break;
            
        case 'Alta_Estaciones':
            titulo= "Alta de Estacion de Servicio";
            arrow = 0;
            break;
            
        case 'Cuestionario':
            titulo= "Alta de Cuestionario";
            arrow = 0;
            break;
            
        case 'Levantamiento':
            titulo= "Levantamiento de Campo";
            arrow = 0;
            break;
            
        case 'Documentacion':
           titulo= "Documentacion";
           arrow = 0;
            break; 
            
        case 'Add_user':
            titulo= "Alta de Usuarios";
            arrow = 0;
            break;
            
        case 'Modificacion_Grupos': //MOD_GPO
            titulo= "Actualizar Grupo";
            arrow= 0;
            break;
            
        case 'Mod_grupos': //MOD_GPO
            titulo= "Actualizar Grupo";
            arrow= 1;
            show="contenedor_update_grupoTab";
            hide="form_data_group"
            break;
            
        case 'form_data_group': //MOD_GPO
            titulo= "Actualizar Grupo";
            arrow= 0;
            show="contenedor_update_grupoTab";
            hide="form_data_group"
            break;
            
        case 'Modificacion_Estacion_de_Servicio': //MOD_ES
            titulo= "Actualizar Estacion de Servicio";
            arrow= 0;
           show="";
            hide="";
            break;
        
        case 'Mod_estaciones': //MOD_GPO
            var titulo="Actualizar Estacion de Servicio";
            var arrow=1;
            var show="contenedor_update_es";
            var hide="contenedor_form_update_es";
            break;
        case 'contenedor_form_update_es': //MOD_GPO
            var titulo="Actualizar Estacion de Servicio";
            var arrow=0;
            var show="contenedor_update_es";
            var hide="contenedor_form_update_es";
            break;
        
        case 'Modificacion_Usuarios'://MOD_USER
            var titulo="Actualizar Usuarios";
            var arrow=0;
            var show="";
            var hide="";
            break;
            
        case 'Mod_users'://MOD_USER
            var titulo="Actualizar Usuarios";
            var arrow=1;
            var show="div_update_user_tab";
            var hide="form_data_user";
            break;
            
        case 'form_data_user'://MOD_USER
            var titulo="Actualizar Usuarios";
            var arrow=0;
            var show="form_data_user";
            var hide="div_update_user_tab";
            break;
            
        case 'Baja_Grupo':
            var titulo="Eliminar Grupos";
            var arrow=0;
            var show="";
            var hide="";
            break;
            

        case 'Baja_Estacion_de_Servicio':
            var titulo="Eliminar Estacion de servicio";
            var arrow=0;
            var show="";
            var hide="";
            break;     
        
        case 'Baja_Usuario':
            var titulo="Eliminar Usuarios";
            var arrow=0;
            var show="";
            var hide="";
            break;
        
        case 'Documentos_sasisopa': //SASISOPA #1
           titulo="Documentacion de Sasisopa";
            arrow=0;
            show="";
            hide="";
            break;
        case 'Documentos_sasisopa_client':
                   titulo="Documentacion de Sasisopa";
            arrow=0;
            show="";
            hide="";
            break;
        case 'sasisopa_es': //SASISOPA #1
             titulo="Documentacion de Sasisopa";
             arrow=1;
            show="documentacion_sasisopa_container_group";
             hide="contenedor_sasisopa_es";
            break;
        
        case 'documentacion_sasisopa_container_group': //SASISOPA #1
             titulo="Documentacion de Sasisopa";
             arrow=0;
             show="";
           hide="";
            break;        
        
        case 'sasisopa_es_folder': //SASISOPA #2
           titulo="Documentacion de Sasisopa";
            arrow=1;
            show="documentacionsasisopacontaineres";
            hide="contenedor_sasisopa_es_";
            break;
            
        case 'documentacionsasisopacontaineres': //SASISOPA #2
           titulo="Documentacion de Sasisopa";
            arrow=1;
            show="documentacion_sasisopa_container_group";
            hide="contenedor_sasisopa_es_";
            break;
        case 'documentacionsasisopacontaineres_client': //SASISOPA #2
           titulo="Documentacion de Sasisopa";
            arrow=0;
            show="documentacion_sasisopa_container_group";
            hide="contenedor_sasisopa_es_";
            break;                   
        
        case 'Seguimiento'://Calendario
            titulo="Calendario";
            arrow=0;
            break;
        
        case 'info_tramite':
            titulo="Información del Tramite";
            arrow=1;
            break;
        case 'info_tramite_2':
            titulo="Información del Tramite";
            arrow=1;
            break;
        case 'Caracteristicas_tramites_seguimiento':
            titulo="Calendario";
            arrow=0;
            break;
        
        case 'Estaciones_servicio':
            titulo="Grupos Corporativos";
            arrow=0;
            break;
        case 'razon_social':
            titulo="Estaciones de Servicio";
            arrow=1;
            break;
        case 'table_main':
            titulo="Grupos Corporativos";
            arrow=0;
            break;
        case 'estacion_docs':
            titulo="Gestion de la Estación";
            arrow=1;
            break;
        //estaciones de Servicio
        case 'Razon_Social':
            titulo="Gestion de las Estaciones";
            arrow=0;
            break;
        case 'Estaciones_de_servicio':
            titulo="Gestion de las Estaciones";
            arrow=0;
            break;            
        case 'show_es_usuarios':
            titulo="Gestion de las Estaciones";
            arrow=1;
            break;        
        case 'show_opciones_estacion':
            titulo="Gestion de las Estaciones";
            arrow=1;
            break;
        case 'show_files_documentacion':
            titulo="Gestion de las Estaciones";
            arrow=1;
            break;
        case 'Gestion_estaciones':
            titulo="Gestion de las Estaciones";
            arrow=1;
            break;
        case 'Estaciones_de_servicio_container':
            titulo="Gestion de las Estaciones";
            arrow=1;
            break;    
        case 'Razonsocial_usuario':
            titulo="Gestion de las Estaciones";
            arrow=0;
            break;        
        case 'Estaciones_de_servicio_container_clientes':
            titulo="Gestion de las Estaciones";
            arrow=0;
            break;        
    }
       TOOLBAR(titulo,arrow,show,hide);
       
}
//FIN FUNCTION TITULOS----------------------------------------------------------

function checar_visibilidad(id){
    if (id=="Modificacion_Grupos") {
        if( $('#contenedor_update_grupoTab').is(":visible") ){
        }else{
            document.getElementById("contenedor_update_grupoTab").style.display = "block"
            document.getElementById("form_data_group").style.display = "none";
        }
    }else if (id=="Modificacion_Estacion_de_Servicio"){
        if( $('#contenedor_update_es').is(":visible") ){
        }else{
            document.getElementById("contenedor_update_es").style.display = "block"
            document.getElementById("contenedor_form_update_es").style.display = "none";
        }        
    }else if (id=="Modificacion_Usuarios"){
               if( $('#div_update_user_tab').is(":visible") ){
        }else{
            document.getElementById("div_update_user_tab").style.display = "block"
            document.getElementById("form_data_user").style.display = "none";         
        }
    }else if (id=="Documentos_sasisopa"|| id=="Documentos_sasisopa_client"){//S.A.S.I.S.O.P.A--------------
        if ($('#documentacionsasisopacontaineres_client').length) {//SI ES CLIENTE
            if ($('#contenedor_sasisopa_es_files').is(":visible")) {
            document.getElementById("contenedor_sasisopa_es_files").style.display="none";
            document.getElementById("contenedor_sasisopa_es_").style.display="none";
            document.getElementById("documentacionsasisopacontaineres_client").style.display="block";
            }else if($('#contenedor_sasisopa_es_').is(":visible")){
            document.getElementById("contenedor_sasisopa_es_").style.display="none";
            document.getElementById("documentacionsasisopacontaineres_client").style.display="block";                
            }
        } else {//SI NO ES CLIENTE
            if ($('#contenedor_sasisopa_es_files').is(":visible")) {
            document.getElementById("documentacion_sasisopa_container_group").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("contenedor_sasisopa_es_files").style.display="none";
            document.getElementById("contenedor_sasisopa_es_").style.display="none";
            document.getElementById("contenedor_sasisopa_es").style.display="none";
            }else if($('#contenedor_sasisopa_es_').is(":visible")){
            document.getElementById("documentacion_sasisopa_container_group").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("contenedor_sasisopa_es_").style.display="none";
            document.getElementById("contenedor_sasisopa_es").style.display="none";                
            }else if ($('#contenedor_sasisopa_es').is(":visible")){
            document.getElementById("documentacion_sasisopa_container_group").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("contenedor_sasisopa_es").style.display="none";                  
            }
        }        
    }else if (id=="Estaciones_de_servicio"){
            if ($('#Documentacion_estaciones').is(":visible")) {
            document.getElementById("Estaciones_de_servicio_container_clientes").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("Documentacion_estaciones").style.display="none";
            }else if ($("#Gestion_estaciones").is(":visible")){
            document.getElementById("Estaciones_de_servicio_container_clientes").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("Gestion_estaciones").style.display="none";               
            }        
    }else if (id=="Razon_Social"){
            if ($('#Documentacion_estaciones').is(":visible")) {
            document.getElementById("Razonsocial_usuario").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("Documentacion_estaciones").style.display="none";
            }else if ($("#Gestion_estaciones").is(":visible")){
            document.getElementById("Razonsocial_usuario").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("Gestion_estaciones").style.display="none";               
            }else if ($("#Estaciones_de_servicio_container").is(":visible")){
            document.getElementById("Razonsocial_usuario").style.display = "block"//Documentos_sasisopa_cliente.php
            document.getElementById("Estaciones_de_servicio_container").style.display="none";                 
            }        
    }
    
    
    
    
}

function opentab(evt, Name) {
    asignar_titulos(Name);
    $('#sidebar_admin').toggleClass('hide-all');
    $('#content-all').toggleClass('hide-all');
    var i, tabcontent, tablinks;
    evt.preventDefault();
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace("active", "");
    }


    document.getElementById(Name).style.display = "block";
    checar_visibilidad(Name);
    evt.currentTarget.className += " active";
    var elemento = document.getElementById("logo");
    elemento.className += "logo2";



}
var numero = 2;
//cuestionario.......................................................................................................................................
function add_colum_productos() {
      // Obtener la referencia del elemento body
      var body = document.getElementsByName("table_cuestionario_productos")[0];
 
      // Crea un elemento <table> y un elemento <tbody>
      var tabla   = document.createElement("table");
      var tblBody = document.createElement("tbody");
//inputs
    //SELECT DE PRODUCTOS//////////////////////////////////////////////////////////
    var select_producto = document.createElement("Select");
    var option1 = document.createElement("option");
    option1.innerHTML = 'Selecciona';
    option1.value = 'Selecciona';
    var option2 = document.createElement("option");
    option2.innerHTML = 'Gasolina Magna';
    option2.value = 'Gasolina Magna';
    var option3 = document.createElement("option");
    option3.innerHTML = 'Gasolina Premium';
    option3.value = 'Gasolina Premium';
    var option4 = document.createElement("option");
    option4.innerHTML = 'Diesel';
    option4.value = 'Diesel';
    var option5 = document.createElement("option");
    option5.innerHTML = 'Diesel Marino';
    option5.value = 'Diesel Marino';
    select_producto.appendChild(option1);
    select_producto.appendChild(option2);
    select_producto.appendChild(option3);
    select_producto.appendChild(option4);
    select_producto.appendChild(option5);
    select_producto.name = 'producto' + numero;
    //INPUT NUM TANK /////////////////////////////////////////////////////////////
    var input = document.createElement("input");
    input.name = 'numtank' + numero;
    //SELECT NUM TANK PLANO////////////////////////////////////////////////////////
      var select_plano_tank = document.createElement("Select");
    var select_plano_tank_op1 = document.createElement("option");
    select_plano_tank_op1.innerHTML = 'Selecciona';
    select_plano_tank_op1.value = 'Selecciona';
    var select_plano_tank_op2 = document.createElement("option");
    select_plano_tank_op2.innerHTML = 'No';
    select_plano_tank_op2.value = 'No';
    var select_plano_tank_op3 = document.createElement("option");
    select_plano_tank_op3.innerHTML = 'Si';
    select_plano_tank_op3.value = 'Si';
    select_plano_tank.name = 'numtank_p' + numero;
    select_plano_tank.appendChild(select_plano_tank_op1);
    select_plano_tank.appendChild(select_plano_tank_op2);
    select_plano_tank.appendChild(select_plano_tank_op3);
    //INPUT CAP TANK///////////////////////////////////////////////////////////////
    var cap_tank_input = document.createElement("input");
    cap_tank_input.name = 'captank' + numero;
    //SELECT CAP TANK/////////////////////////////////////////////////////////////
    var select_plano_cap = document.createElement("Select");
    var select_plano_cap_op1 = document.createElement("option");
    select_plano_cap_op1.innerHTML = 'Selecciona';
    select_plano_cap_op1.value = 'Selecciona';
    var select_plano_cap_op2 = document.createElement("option");
    select_plano_cap_op2.innerHTML = 'No';
    select_plano_cap_op2.value = 'No';
    var select_plano_cap_op3 = document.createElement("option");
    select_plano_cap_op3.innerHTML = 'Si';
    select_plano_cap_op3.value = 'Si';
    select_plano_cap.name = 'captank_p' + numero;
    select_plano_cap.appendChild(select_plano_cap_op1);
    select_plano_cap.appendChild(select_plano_cap_op2);
    select_plano_cap.appendChild(select_plano_cap_op3);
    //TEXT AREA OBS///////////////////////////////////////////////////////////////
    var obs_input = document.createElement("textarea");
    obs_input.name = 'obs' + name;
      // Crea las celdas
        // Crea las hileras de la tabla
        var hilera = document.createElement("tr");

          // Crea un elemento <td> y un nodo de texto, haz que el nodo de
          // texto sea el contenido de <td>, ubica el elemento <td> al final
          // de la hilera de la tabla
    var producto = document.createElement("td");
    producto.className = 'th_producto';
    var num_tanques = document.createElement("td");
    num_tanques.className = 'th_nt';
    var num_tanques_p = document.createElement("td");
    num_tanques_p.className = 'th_p';
    var cap_tank = document.createElement("td");
    cap_tank.className = 'th_ct';
    var cap_tank_p = document.createElement("td");
    cap_tank_p.className = 'th_p';
    var obs = document.createElement("td");
    obs.className = 'obs';
    producto.innerHTML = '2.' + numero + " ";
    producto.appendChild(select_producto);
    num_tanques.appendChild(input);
    num_tanques_p.appendChild(select_plano_tank);
    cap_tank.appendChild(cap_tank_input);
    cap_tank_p.appendChild(select_plano_cap);
    obs.appendChild(obs_input);
      
    hilera.appendChild(producto);
    hilera.appendChild(num_tanques);
    hilera.appendChild(num_tanques_p);
    hilera.appendChild(cap_tank);
    hilera.appendChild(cap_tank_p);
    hilera.appendChild(obs);

    

        // agrega la hilera al final de la tabla (al final del elemento tblbody)
        tblBody.appendChild(hilera);
  
    numero += 1;
 
      // appends <table> into <body>
      body.appendChild(hilera);
      // modifica el atributo "border" de la tabla y lo fija a "2";
      tabla.setAttribute("border", "2");
}


function tablas() {
//TABLAS--------------------------------------------------------    
    var table = "<table class=table_proyectos>\n\
<tr>\n\
<th>Proyecto</th>\n\
<th>arrendado</th>\n\
<th>propio</th>\n\
</tr>\n\
";
    var n = document.getElementById("num_proyectos").value;
    if (n != "") {
        for (var i = 0; i < n; i++) {
            table = table + "<tr>\n\
<td>6." + parseInt(i + 1) + "<input name=\"proyecto" + i + "\" type=text id=\"proyecto" + i + "\"></td>\n\
<td>\n\
<select name=\"arrendado" + i + "\" id=\"arrendado" + i + "\">\n\
<option value=\"Selecciona\">Selecciona</option>\n\
<option value=\"1\">si</option>\n\
<option value=\"0\">no</option>\n\
</select>\n\
</td>\n\
<td>\n\
<select name=\"propio" + i + "\" id=\"propio" + i + "\">\n\
<option value=\"Selecciona\">Selecciona</option>\n\
<option value=\"1\">si</option>\n\
<option value=\"0\">no</option>\n\
</select>\n\
</td>\n\
</tr>\n\
";
        }
        document.getElementById("table_proyectos").innerHTML = table + "</table>";
    }

//TABLAS ADM--------------------------------------------------
    var table_adm = "<table class=table_proyectos>\n\
<tr>\n\
<th>Nombre</th>\n\
<th>Puesto</th>\n\
<th>Horario</th>\n\
<th>Dia de descanso</th>\n\
</tr>\n\
";

    var n1 = document.getElementById("num_adm").value;
    if (n1 != "") {
        for (var j = 0; j < n1; j++) {
            table_adm = table_adm + "<tr>\n\
<td><input type=text id=\"nombre" + j + "\"></td>\n\
<td><input type=text id=\"puesto" + j + "\"></td>\n\
<td><input type=text id=\"hora" + j + "\"></td>\n\
<td><input type=text id=\"Dia_de_descanso" + j + "\"></td>\n\
</tr>\n\
";
        }
        document.getElementById("table_adm").innerHTML = table_adm + "</table>";
    }
//Tablas despachadores-----------------------------------------------
    var table_despachadores = "<table class=table_proyectos>\n\
<tr>\n\
<th>Nombre</th>\n\
<th>Puesto</th>\n\
<th>Horario</th>\n\
<th>Dia de descanso</th>\n\
</tr>\n\
";
    var n2 = document.getElementById("despachadores").value;
    if (n2 != "") {
        for (var j = 0; j < n2; j++) {
            table_despachadores = table_despachadores + "<tr>\n\
<td><input type=text id=\"nombre" + j + "\"></td>\n\
<td><input type=text id=\"puesto" + j + "\"></td>\n\
<td><input type=text id=\"hora" + j + "\"></td>\n\
<td><input type=text id=\"Dia_de_descanso" + j + "\"></td>\n\
</tr>\n\
";
        }
        document.getElementById("table_despachadores").innerHTML = table_despachadores + "</table>";
    }
//total-------------------------------------------------------------

    var n3 = document.getElementById("proyecto_asociado").value;
    if (n1 != "" && n1 > 0) {

    } else {
        n1 = 0;
    }
    if (n2 != "" && n2 > 0) {

    } else {
        n2 = 0;
    }
    if (n3 != "" && n3 > 0) {

    } else {
        n3 = 0;
    }


    var n1 = parseInt(n1) + parseInt(n2) + parseInt(n3);
    document.getElementById("total_empleosgenerados").innerHTML = n1;
//num equipos....................................................................

    var num_equipos = "<table class=table_equipo>\n\
<tr>\n\
<th>Nombre</th>\n\
<th>Capacidad</th>\n\
<th>Tipo de quemador</th>\n\
<th>Tipo de combustible</th>\n\
<th>Se Precalienta</th>\n\
<th>Consumo anual</th>\n\
<th>Frecuencia de uso <small>(último año)</small></th>\n\
</tr>\n\
";
    var n4 = document.getElementById("num_equipos").value;
    if (n4 != "") {
        for (var i = 0; i < n4; i++) {
            num_equipos = num_equipos + "<tr>\n\
<td><input type=text id=\"nombre" + i + "\"></td>\n\
<td><input type=text id=\"capacidad" + i + "\"></td>\n\
<td><input type=text id=\"tipo_de_quemador" + i + "\"></td>\n\
<td><input type=text id=\"tipo_de_combustible" + i + "\"></td>\n\
<td><input type=text id=\"se_precalienta" + i + "\"></td>\n\
<td><input type=text id=\"consumo_anual" + i + "\"></td>\n\
<td><input type=text id=\"frecuencia_de_uso" + i + "\"></td>\n\
</tr>\n\
";
        }
        document.getElementById("tabla_equipo").innerHTML = num_equipos + "</table>";
    }
}



//table_tramites.................................................................
function mostrar_tramites(mes) {
    var month = mes
    var mess = [];
    mess = mess + month;
    for (var i = 0; i < mess.length; i++) {

        document.getElementById('d' + mess[i]).innerHTML = 'hola';
        alert(mess[i]);
    }
}

//funciones sasisopa
function  sasisopa_es() {
    var select = document.getElementById("select_sasisopa").value;
    if (select != 'Seleccione una estación') {
        document.getElementById("select_es_sasisopa").style.display = "none";
        document.getElementById("sasisopa_directorios").style.display = "block";
    } else {
    }
    $.ajax({
        type: 'POST',
        //url: '../Scripts/insert/menu_asisopa.php',
        url: '../Scripts/insert/Sasisopa/Sasisopa_menu.php',

        data: {selectes: select},
        success: function (resp) {
            $("#sasisopa_directorios").html(resp);
        }
    });
    return false;
}

function s_s(num_menu, num_es) {        //alert("../"+ESTACION+"/"+num_menu);
    //document.getElementById("asisopa_list").style.display="none";        
    alert(num_es)
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Sasisopa/doc_sasisopa.php',
        data: {num_es: num_es, nummenu: num_menu},
        success: function (resp) {
            $("#documentos_asisopa").html(resp);
        }
    });
    // $("#documentos_asisopa").load("../Scripts/insert/doc_sasisopa.php");
    //  document.getElementById("documentos_asisopa").innerHTML="<h2><?php echo $estacion?></h2>";
    return false;
}

function info_folder(folder, es) {
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/upload_documentos_asisopa.php',
        data: {num_es: es, nummenu: folder},
        success: function (resp) {
            $("#documentos_asisopa_client").html(resp);
            $("#barra_de_progreso");
        }
    });
    // $("#documentos_asisopa").load("../Scripts/insert/doc_sasisopa.php");
    //  document.getElementById("documentos_asisopa").innerHTML="<h2><?php echo $estacion?></h2>";
    return false;

}

function upload_files_sasisopa() {
    var datos = $(this).serializeArray(); //datos serializados
    var imagen = new FormData($("#upload_files_sasisopa")[0]);

    //agergaremos los datos serializados al objecto imagen
    $.each(datos, function (key, input) {
        imagen.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Sasisopa/upload_documentos_asisopa.php',
        data: imagen, //enviamos imagen
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#doc_sasisopa_upload").html(valor);
    }).fail(function (data) {
        alert("Error");

    });
    return false;
}

function FUN_SEGUIMIENTO(valor) {

    document.getElementById("tabla").style.display = "none";
    document.getElementById("PH1").style.display = "none";
    document.getElementById("IT1").style.display = "none";
    document.getElementById("Coa1").style.display = "none";
    document.getElementById("uva1").style.display = "none";
    document.getElementById("iACRE1").style.display = "none";
    document.getElementById("Nom16").style.display = "none";

    document.getElementById(valor).style.display = "block";

}

//DOCUMENTACION..........................................................................................................
function Select_es_documentacion() {
    var select = document.getElementById("documentacion_select").value;

    if (select != "Seleccione una estación") {
        document.getElementById("Doc_list_name").innerHTML = "Documentación ES:" + select;
        document.getElementById("Doc_list").style.display = "block";
        document.getElementById("documentacion_select_form").style.display = "none";
    }
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Documentacion/re_doc.php',
        data: {selectes: select},
        success: function (resp) {
            $("#respa").html(resp);
            $("#barra_de_progreso");
        }
    });

    return false;
}
var doc_num_es;
function get_es(num_es) {
    doc_num_es = num_es;
}

function get_num_folder(num_carpeta) {

    $.ajax({
        type: 'POST',
        url: '..',
        data: {num_es: doc_num_es, nummenu: num_carpeta},
        success: function (resp) {
            $("#documentos_asisopa").html(resp);
            $("#barra_de_progreso");
        }
    });
    // $("#documentos_asisopa").load("../Scripts/insert/doc_sasisopa.php");
    //  document.getElementById("documentos_asisopa").innerHTML="<h2><?php echo $estacion?></h2>";
    return false;
}


function documentos_necesarios(carpeta, num_carpeta, es, tramite) {//TRAMITES 3
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Tramites/mostrar_documentos.php',
        data: {carpeta: carpeta, num_carpeta: num_carpeta, num_es: es, tramite: tramite},
        success: function (resp) {
            $("#show_docs").html(resp);
            $("#barra_de_progreso");
        }
    });
}
function back_alta_tramites() { //boton de regreso..........................................................
    document.getElementById("import_tramite").style.display = "none";
    document.getElementById("Alta_tramites_form").style.display = "block";
}
function upload_doc_tramites() {//TRAMITE 4.............................................
    var datos = $(this).serializeArray(); //datos serializados
    var imagen = new FormData($("#upload_doc_tramites")[0]);

    //agergaremos los datos serializados al objecto imagen
    $.each(datos, function (key, input) {
        imagen.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Tramites/uploadfiles.php',
        data: imagen, //enviamos imagen
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#doc_sasisopa_upload").html(valor);
    }).fail(function (data) {
        alert("Error");

    });
    return false;
}
function autorizar_doc(dir, id_tramite, name_db, tramite, estado) {
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Tramites/verificar_doc.php',
        data: {dir: dir, id_tramite: id_tramite, name_db: name_db, tramite: tramite, estado: estado},
        success: function (resp) {
            $("#validar_doccc").html(resp);
            $("#barra_de_progreso");
        }
    });

    return false;

}
//eva.......................................................................................
function Continuar_eva(format) {

    if (format) {
        document.getElementById('continuar_eva').disabled = "";

    } else {
        document.getElementById('continuar_eva').disabled = "true";
    }
}






//SEGUIMIENTO.....................................................................................
function filtros(archivo, id) {
    var select_value = document.getElementById(id).value;
    var test = document.getElementById('div_filtro_es');
    while (test.hasChildNodes())
        test.removeChild(test.firstChild);
    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/' + archivo + '.php',
        data: {select_value: select_value},
        success: function (resp) {
            $("#div_filtro_es").html(resp);
        }
    });
}

function tabla_show(arrtramite, arrestatus, arrfecha_ing_sistema, arrfecha_ing_dep, arrbitacoras, arrfecha_boletin_notif, arrfecha_recoleccion, arrnum_oficio, arrfecha_alarma, arrid_ess, arrnombre_ess) {
    var tramite = arrtramite.split(",");
    var estatus = arrestatus.split(",");
    var fecha_ing_sistema = arrfecha_ing_sistema.split(",");
    var fecha_ing_dep = arrfecha_ing_dep.split(",");
    var bitacoras = arrbitacoras.split(",");
    var fecha_boletin_notif = arrfecha_boletin_notif.split(",");
    var fecha_recoleccion = arrfecha_recoleccion.split(",");
    var num_oficio = arrnum_oficio.split(",");
    var fecha_alarma = arrfecha_alarma.split(",");
    var id_es = arrid_ess.split(",");
    var nombre_es = arrnombre_ess.split(",");

    var clase = "";
    var contenido = "";
    for (var i = 0; i < id_es.length; i++) {
        switch (estatus[i]) {
            case 'Recopilación de información':
                clase = "urgente_status";
                break;
            case 'En_espera de ser_ingresado':
                clase = "urgente_status";
                break;
            case 'Ingresado':
                clase = "tramite_status";
                break;
            case 'Respuesta lista_para recoger':
                clase = "tramite_status";
                break;
            case 'Resolutivo':
                clase = "finalizado_status";
                break;
            case 'inf al alcance':
                clase = "urgente_status";
                break;
            case 'desechamiento':
                clase = "desechado_status";
                break;
        }



        var mes = fecha_ing_sistema[i].substr(5, 2);
        for (var j = 0; j < nombre_es[i].length; j++) {
            contenido += (nombre_es[i].charAt(j) == " ") ? "_" : nombre_es[i].charAt(j);
        }
        document.getElementById(mes + 'Asea' + id_es[i]).innerHTML =
                document.getElementById(mes + 'Asea' + id_es[i]).innerHTML +
                "<div class=" + clase + " onclick=ver_info_tramite()><a href=# >" + tramite[i] + "</a></div>";
        contenido = "";
    }



}

function ver_info_tramite(num_es, proceso, est, fecha, bitacora, fecha_final, nombre_es) {

    alert(num_es);
    document.getElementById('tabla_seguimiento_cont').style.display = "none";
    document.getElementById('div_caracteristicas_tramite').style.display = "block";

    $.ajax({
        type: 'POST',
        url: '../Scripts/insert/Seguimiento/especificacion_tramite.php',
        data: {num_es: num_es, proceso: proceso, est: est, fecha: fecha, bitacora: bitacora, fecha_final: fecha_final, nombre_es: nombre_es},
        success: function (resp) {
            $("#div_caracteristicas_tramite").html(resp);
        }
    });
}


function show_table_cnt() {
    document.getElementById('tabla_seguimiento_cont').style.display = "block";
    document.getElementById('div_caracteristicas_tramite').style.display = "none";
}
//SEGUIMIENTO/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function filtro(id_form, filtro_name) {
    var datos = $(this).serializeArray(); //datos serializados
    var form = new FormData($("#" + id_form + "")[0]);

    if (filtro_name == "gpo_corporativo") {
        var contenedor = ["Filtro_numes", "Filtro_Alias", "Filtro_Estado", "Tables_seguimiento"];
        for (var i = 0; i < contenedor.length; i++) {
            var id = contenedor[i];

            //alert(contenedor[i]);
            var container = document.getElementById(id);
            while (container.hasChildNodes()) {
                container.removeChild(container.firstChild);
            }
        }
        $.each(datos, function (key, input) {
            form.append(input.name, input.value);
        });
        //Filtro_numes...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_numes.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_numes").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
        //Filtro_Alias...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Alias.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Alias").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
        //Filtro_Estado...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Estado.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Estado").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
//TABLA.PHP
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Seguimiento/Tables.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Tables_seguimiento").html(valor);
        }).fail(function (data) {
            alert("Error");

        });


    }
    if (filtro_name == "num_es") {
        var contenedor = ["Filtro_gpo", "Filtro_Alias", "Filtro_Estado", "Tables_seguimiento"];
        for (var i = 0; i < contenedor.length; i++) {
            var id = contenedor[i];

            //alert(contenedor[i]);
            var container = document.getElementById(id);
            while (container.hasChildNodes()) {
                container.removeChild(container.firstChild);
            }
        }
        $.each(datos, function (key, input) {
            form.append(input.name, input.value);
        });
        //Filtro_gpo...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_gpo.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_gpo").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

        //Filtro_Alias...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Alias.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Alias").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

        //Filtro_Estado...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Estado.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Estado").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

//TABLA.PHP
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Seguimiento/Tables.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Tables_seguimiento").html(valor);
        }).fail(function (data) {
            alert("Error");

        });


    }
    if (filtro_name == "alias") {
        var contenedor = ["Filtro_gpo", "Filtro_numes", "Filtro_Estado", "Tables_seguimiento"];
        for (var i = 0; i < contenedor.length; i++) {
            var id = contenedor[i];

            //alert(contenedor[i]);
            var container = document.getElementById(id);
            while (container.hasChildNodes()) {
                container.removeChild(container.firstChild);
            }
        }
        $.each(datos, function (key, input) {
            form.append(input.name, input.value);
        });
        //Filtro_gpo...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_gpo.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_gpo").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

        //Filtro_numes...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_numes.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_numes").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

        //Filtro_Estado...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Estado.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Estado").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

//TABLA.PHP
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Seguimiento/Tables.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Tables_seguimiento").html(valor);
        }).fail(function (data) {
            alert("Error");

        });


    }
    //estado-------------------------------------------------------------------estado
    if (filtro_name == "estado") {
        var contenedor = ["Filtro_gpo", "Filtro_numes", "Filtro_Alias", "Tables_seguimiento"];
        for (var i = 0; i < contenedor.length; i++) {
            var id = contenedor[i];

            //alert(contenedor[i]);
            var container = document.getElementById(id);
            while (container.hasChildNodes()) {
                container.removeChild(container.firstChild);
            }
        }
        $.each(datos, function (key, input) {
            form.append(input.name, input.value);
        });
        //Filtro_gpo...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_gpo.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_gpo").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
        //Filtro_numes...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_numes.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_numes").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
        //Filtro_Alias...........................       
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Filtro/Filtro_Alias.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Filtro_Alias").html(valor);
        }).fail(function (data) {
            alert("Error");

        });
//TABLA.PHP
        $.ajax({
            type: 'post',
            url: '../Scripts/insert/Seguimiento/Tables.php',
            data: form, //enviamos imagen
            contentType: false,
            processData: false
        }).done(function (valor) {
            $("#Tables_seguimiento").html(valor);
        }).fail(function (data) {
            alert("Error");

        });

    }

    return false;
}




function mostrar_hijos_seguimiento(padre, num, id, num_es) {
    
    //alert(padre+" "+num+" "+id+" "+num_es);
    var icon = document.getElementById(padre);
    var row_span = document.getElementById(id).rowSpan;
    //alert(row_span);
    if (icon.className == 'fas fa-angle-double-down') {
        icon.className = 'fas fa-angle-double-up';
        row_span = row_span + parseInt(num)
    } else {
        icon.className = 'fas fa-angle-double-down';
        row_span = row_span - parseInt(num)
    }


    document.getElementById(id).rowSpan = row_span;
    //alert(row_span);
    var contenido = document.getElementsByClassName(padre);
    for (var i = 0; i < contenido.length; i++) {
        if (contenido[i].style.display == "none") {
            contenido[i].style.display = "table-row";

        } else {
            contenido[i].style.display = "none";

        }
    }
}


function tiempo_restante() {
    momentoActual = new Date()
    hora = momentoActual.getHours()
    minuto = momentoActual.getMinutes()
    segundo = momentoActual.getSeconds()
    horaimprimible = hora + ":" + minuto + ":" + segundo;
    document.getElementById("clock").innerHTML = horaimprimible + 'Hrs';
    setTimeout("tiempo_restante()", 1000);
}
function  showtable_informacionenalcance() {
    var icon = document.getElementById("button_resp_inf");
    var tr = document.getElementsByClassName("informacion_en_alcance");
    //alert(row_span);
    if (icon.className == 'fas fa-angle-double-down') {
        icon.className = 'fas fa-angle-double-up';
        document.getElementById("btn_save").style.display = "none"
        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "table-row"
        }
    } else {
        icon.className = 'fas fa-angle-double-down';
        document.getElementById("btn_save").style.display = "table-row"
        for (var i = 0; i < tr.length; i++) {
            tr[i].style.display = "none"
        }
    }
}







function habilitar_input_info_tramite(id, num_es, estado) {
    if (id  == "seccion1") {
        document.getElementById("ingreso_asea"+num_es).removeAttribute("disabled");
        document.getElementById("ingreso_asea"+num_es).style.borderColor ="#FF4081";
        document.getElementById("num_bitacora"+num_es).removeAttribute("disabled");
        document.getElementById("num_bitacora"+num_es).style.borderColor ="#FF4081";
        document.getElementById("file_acucerecibo"+num_es).removeAttribute("disabled");
        document.getElementById("file_acucerecibo"+num_es).classList.remove("inputfile_caracteristicastramite_disabled");
        document.getElementById("file_acucerecibo"+num_es).classList.add("inputfile_caracteristicastramite");
    }
    if (id == "seccion2") {
        document.getElementById("fecha_boletin"+num_es).removeAttribute("disabled");
        document.getElementById("fecha_boletin"+num_es).style.borderColor ="#FF4081";
    }
    if (id == "seccion3") {
        var estatus_tramite = document.getElementById("select_estatus" + num_es);
        while (estatus_tramite.hasChildNodes()) {
        estatus_tramite.removeChild(estatus_tramite.firstChild);
        }
        estatus_tramite.removeAttribute("disabled");
        var options_arr = ["Selecciona", "Asunto", "Resolutivo"];
        for (var i = 0; i < options_arr.length; i++) {
            var option1 = document.createElement("option");
            option1.text = options_arr[i];
            option1.value = options_arr[i];
            estatus_tramite.add(option1);
        }
        estatus_tramite.style.borderColor="#FF4081";
        var input1 = document.getElementById("fecha_recepcion" + num_es);
        input1.removeAttribute("disabled");
        input1.style.borderColor="#FF4081";
        var input2 = document.getElementById("no_oficio" + num_es);
        input2.removeAttribute("disabled");
        input2.style.borderColor="#FF4081";
        var input3 = document.getElementById("file_resolutivo" + num_es);
        input3.removeAttribute("disabled");
        input3.classList.remove("inputfile_caracteristicastramite_disabled");
        input3.classList.add("inputfile_caracteristicastramite");
    }
        if (id == "entrega") {

        if (estado == "Asunto") {
            show_informacion_al_alcance(num_es);
        }
    }
    if (id== "seccion4_no_info") {
        document.getElementById("fecha_Reingreso_asea").removeAttribute("disabled");
        document.getElementById("fecha_Reingreso_asea").style.borderColor ="#FF4081";
        document.getElementById("comprobante_reingreso").removeAttribute("disabled");
        document.getElementById("comprobante_reingreso").classList.remove("inputfile_caracteristicastramite_disabled");
        document.getElementById("comprobante_reingreso").classList.add("inputfile_caracteristicastramite");
    }
    if (id=="seccion5") {
        document.getElementById("reaparicion_boletin").removeAttribute("disabled");
        document.getElementById("reaparicion_boletin").style.borderColor ="#FF4081";
    }
    if (id=="seccion6") {
        var estatus = document.getElementById("select_statustramite_inf"+num_es);
            estatus.removeAttribute("disabled");
            estatus.style.borderColor ="#FF4081";
        while (estatus.hasChildNodes()) {
        estatus.removeChild(estatus.firstChild);
        }
        var options_arr = ["Selecciona", "Resolutivo", "Desechamiento"];
        for (var i = 0; i < options_arr.length; i++) {
            var option1 = document.createElement("option");
            option1.text = options_arr[i];
            option1.value = options_arr[i];
            estatus.add(option1);
        }
        
        
        document.getElementById("recepcion_resolutivo_desechamiento").removeAttribute("disabled");
        document.getElementById("recepcion_resolutivo_desechamiento").style.borderColor ="#FF4081";
        document.getElementById("No_resolutivo").removeAttribute("disabled");
        document.getElementById("No_resolutivo").style.borderColor ="#FF4081";        
        
    }
}

function deshabilitar_input_info_tramite(id, num_es, estado) {
    if (id  == "seccion1") {
        document.getElementById("ingreso_asea"+num_es).setAttribute("disabled",true);
        document.getElementById("num_bitacora"+num_es).setAttribute("disabled",true);
        document.getElementById("file_acucerecibo"+num_es).setAttribute("disabled",true);
        document.getElementById("file_acucerecibo"+num_es).classList.remove("inputfile_caracteristicastramite");
        document.getElementById("file_acucerecibo"+num_es).classList.add("inputfile_caracteristicastramite_disabled");
        document.getElementById("guardar_informacion").setAttribute("disabled",true);
        
    }
}

function actualizartramite() {


}
function actualizar_tabla(id_es, tramite) {
    var container = document.getElementById("Aseaphp");
    while (container.hasChildNodes()) {
        container.removeChild(container.firstChild);
    }
    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Seguimiento/Dependencia/ASEA/ASEA.php',
        data: {id_es: id_es, tramite: tramite}, //enviamos imagen
    }).done(function (valor) {
        $("#Aseaphp").html(valor);
    }).fail(function (data) {
        alert("Error");

    });
}
function seguimiento_table(fecha, tramite, es, estado) {
    //alert("ASD")
    var clean = document.getElementsByClassName("cleanall");
    for (var j = 0; j < clean.length; j++) {
        clean[j].style.backgroundColor = "#f5f5f5";
    }
    tramite = tramite.replace(' ', '_');
    var fechas = fecha.split(",");
    var tramites = tramite.split(",");
    var num_es = es.split(",");
    var estados = estado.split(",");

    for (var i = 0; i < estados.length; i++) {
        if (estados[i] == "Resolutivo") {
            var fecha_completa = fechas[i];
            //alert(fecha_completa);
            var id = fecha_completa[5] + fecha_completa[6] + "" + tramites[i] + "" + num_es[i] + fecha_completa[0] + fecha_completa[1] + fecha_completa[2] + fecha_completa[3];
            document.getElementById(id).style.backgroundColor = "#4CAF50";
            if ((tramites[i] == "MIA") || (tramites[i] = "IP")) {
                var fecha_completa = fechas[i];
                //alert(fecha_completa);
                var id = fecha_completa[5] + fecha_completa[6] + "IA" + num_es[i] + fecha_completa[0] + fecha_completa[1] + fecha_completa[2] + fecha_completa[3];
                document.getElementById(id).style.backgroundColor = "#4CAF50";
            }

        } else {
            var fecha_completa = fechas[i];
            //alert(fecha_completa);
            var id = fecha_completa[5] + fecha_completa[6] + "" + tramites[i] + "" + num_es[i] + fecha_completa[0] + fecha_completa[1] + fecha_completa[2] + fecha_completa[3];
            // alert(id);
            document.getElementById(id).style.backgroundColor = "#FFC107";
        }
    }

}



//BETO----------------------------------------------------------------------------------------------------------BETO-----------------------------------





//enviar datos del formulario de ALTA DE ESTACIONES DE SERVICIO


//Funciones de la Tabla............................
function show_informacion_al_alcance(es){
    var informacion = document.getElementsByClassName("informacion_en_alcance");
    for (var i = 0; i < informacion.length; i++) {
        informacion[i].style.display = "table-row";
    }
    document.getElementById("save1").style.display = "none";
    var celda = document.getElementById("respuesta_info" + es);
    celda.style.display = "table-cell";    
}

function informacion_al_alcance(es) {
    var informacion = document.getElementsByClassName("informacion_en_alcance");
    for (var i = 0; i < informacion.length; i++) {
        informacion[i].style.display = "table-row";
    }
    document.getElementById("save1").style.display = "none";
    var celda = document.getElementById("respuesta_info" + es);
    celda.style.display = "table-cell";
    
    document.getElementById("tiempo_contestacion"+es).removeAttribute("disabled");
    document.getElementById("tiempo_contestacion"+es).style.borderColor="#ff4081";
    document.getElementById("addrowinformacion").removeAttribute("disabled");
    document.getElementById("addrowinformacion").classList.remove("inputfile_caracteristicastramite_disabled");
    document.getElementById("addrowinformacion").classList.add("inputfile_caracteristicastramite");
}

function intervalo_tyc_select(es) {
    var select = document.getElementById("select_estatus" + es).value;
    if (select == "Resolutivo") {
        document.getElementById("intervalo_tyc_select").style.display = "table-row";
        document.getElementById("intervalo_tyc").style.display = "table-row";

        var input1 = document.getElementById("preiodoanual" + es);
        input1.removeAttribute("disabled");
        input1.style.color = "black";
        var input2 = document.getElementById("preiodosemestral" + es);
        input2.removeAttribute("disabled");
        input2.style.color = "black";
        var input3 = document.getElementById("preiodona" + es);
        input3.removeAttribute("disabled");
        input3.style.color = "black";
        var input4 = document.getElementById("fecha0" + es);
        input4.removeAttribute("disabled");
        input4.style.color = "black";
        var input5 = document.getElementById("fecha1" + es);
        input5.removeAttribute("disabled");
        input5.style.color = "black";



    } else {

        var input1 = document.getElementById("preiodoanual" + es);
        input1.disabled = true;
        input1.style.color = "gray";
        var input2 = document.getElementById("preiodosemestral" + es);
        input2.disabled = true;
        input2.style.color = "gray";
        var input3 = document.getElementById("preiodona" + es);
        input3.disabled = true;
        input3.style.color = "gray";
        var input4 = document.getElementById("fecha0" + es);
        input4.disabled = true;
        input4.style.color = "gray";
        var input5 = document.getElementById("fecha1" + es);
        input5.disabled = true;
        input5.style.color = "gray";
        document.getElementById("intervalo_tyc_select").style.display = "none";
        document.getElementById("intervalo_tyc").style.display = "none";
    }
}




function intervalo_tyc(INTERVALO) {
    var container = document.getElementById("intervalo_tyc");
    while (container.hasChildNodes()) {
        container.removeChild(container.firstChild);
    }
    var contenedor = document.getElementById("intervalo_tyc");


    var td1 = document.createElement("td");
    var td2 = document.createElement("td");
    var spanarr = ["De: ", " A ", "De: ", " A "];
    if (INTERVALO == "Anual") {
        var textoCelda = document.createTextNode("Periodo Anual");
        td1.appendChild(textoCelda);

        for (var i = 0; i < 2; i++) {
            var span = document.createElement("span");
            var txt = document.createTextNode(spanarr[i]);
            span.appendChild(txt);
            td2.appendChild(span);
            var fecha = document.createElement("input");
            fecha.name = "fecha" + i;
            fecha.type = "date";
            var year = new Date().getFullYear();
            //fecha.setAttribute("min", year + "-01-01");
            //fecha.setAttribute("max", year + "-12-31");


            td2.appendChild(fecha);
        }

    } else if (INTERVALO == "Semestral") {
        var textoCelda = document.createTextNode("Periodo Semestral");
        td1.appendChild(textoCelda);
        for (var i = 1; i < 3; i++) {
            var br = document.createElement("br");
            td1.appendChild(br);
            var span = document.createElement("span");
            var txt = document.createTextNode("Periodo " + i);
            span.appendChild(txt);
            td1.appendChild(span);
        }
        var br = document.createElement("br");
        td2.appendChild(br);
        for (var i = 0; i < 4; i++) {
            var span = document.createElement("span");
            var txt = document.createTextNode(spanarr[i]);
            span.appendChild(txt);
            td2.appendChild(span);
            var fecha = document.createElement("input");
            fecha.name = "fecha" + i;
            fecha.type = "date";
            var year = new Date().getFullYear();
            //fecha.setAttribute("min", year + "-01-01");
            //fecha.setAttribute("max", year + "-12-31");

            td2.appendChild(fecha);
            if (i == 1) {
                var br = document.createElement("br");
                td2.appendChild(br);
            }
        }
    }
    contenedor.appendChild(td1);
    contenedor.appendChild(td2);
}
function check_status(es, tramite) {
    var informacion = document.getElementsByClassName("informacion_en_alcance");
    for (var i = 0; i < informacion.length; i++) {
        informacion[i].style.display = "none";
    }
    document.getElementById("save1").style.display = "table-row";
    var celda = document.getElementById("respuesta_info" + es);
    celda.style.display = "none";
    if (tramite == "IP" || tramite == "MIA") {
        document.getElementById("intervalo_tyc_select").style.display = "none";
        document.getElementById("intervalo_tyc").style.display = "none";
    }


    var select = document.getElementById("select_estatus" + es).value;
    if (select == "Resolutivo") {
        intervalo_tyc_select(es);
    } else if (select == "Asunto") {
        informacion_al_alcance(es);
    }
}

//sasisopa files----------------------------------------------------------------------------------------------------------------------------------------------------------
function sasisopa_onclick(id, es) {

    var eliminar = document.getElementsByClassName("td_click");

    for (var i = 0; i < eliminar.length; i++) {
        eliminar[i].classList.add("tr");
        eliminar[i].classList.remove("td_click");
    }

    var td = document.getElementById(id + es);
    td.classList.remove("tr");
    td.classList.add("td_click");


}
function sasisopa_ondblckick(id, es, folder, head, recive) {
    document.getElementById(head).style.display = "none";
    document.getElementById(recive).style.display = "block";
    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Sasisopa/' + id + '.php',
        data: {es: es, folder: folder}, //enviamos imagen
    }).done(function (valor) {
        $("#" + recive).html(valor);
    }).fail(function (data) {
        alert("Error");
    });
}
function show_sasisopa_cliente(id, div) {
    document.getElementById(id).style.display = "block"
    document.getElementById(div).style.display = "none";
}

/*card*/
function nombre(fic, name) {
    fic = fic.split('\\');
    document.getElementById(name).innerHTML = fic[fic.length - 1];

}

/*------------------------------------------------ASEA.PHP------------------------------------------------------------*/

/*-----------------------------------------INFORMACION EN ALCANCE-----------------------------------------------------*/
function removerceldas(num) {/*-REMOVERCELDAS-*/
    document.getElementById("tdinformacionenalcance" + num).style.display = "none";
    var index = arrayid.indexOf(num);
    if (index > -1) {
        arrayid.splice(index, 1);
    }
    total_celdas--;
    document.getElementById("id_celdas").value = arrayid;
}/*-FIN REMOVERCELDAS-*/
var num_celdas_informacion = 0;
var total_celdas = 0;
var arrayid = [];
function Dom_addrowinformacion() { /*--------- ---AGREGAR CELDAS A LA TABLA DE INFORMACION EN ALCANCE------------------*/
    //Icrementamos las variables globales
    num_celdas_informacion++;
    total_celdas++;
    var id = num_celdas_informacion;
    arrayid.push(id);
    // Obtener la referencia del elemento body
    var table = document.getElementById("solicitud_de_informacion");
    // Crea un elemento <tr>
        var tr   = document.createElement("tr");
    tr.id = "tdinformacionenalcance" + id;
        for (var i = 1; i <= 4; i++) {
        var td = document.createElement("td");
        if (i == 1) {
            var input = document.createElement("input");
            input.style.outline = "none";
            input.style.border = "none";
            input.name = "nombre_informacion_requerida" + id;
            var label = document.createElement("label");
            label.className = "fas fa-times";
            label.addEventListener('click', function () {
                removerceldas(id)
            }, false);
            label.style.color = "red";
            td.appendChild(label);
            td.appendChild(input);
            tr.appendChild(td);
        } else if (i == 2) {
            var textarea = document.createElement("textarea");
            textarea.name = "descripcion" + id;
            td.appendChild(textarea);
            tr.appendChild(td);

        } else if (i == 3 || i == 4) {
            var span = document.createElement("span");
            if (i == 3) {
                span.id = "carga" + id;
            } else if (i == 4) {
                span.id = "estatus" + id;
            }

            td.appendChild(span);
            tr.appendChild(td);
        }
    }
    table.appendChild(tr);
    document.getElementById("id_celdas").value = arrayid;

    var inputhidden = document.getElementById("id_celdas").value;
}/*-------------AGREGAR CELDAS A LA TABLA DE INFORMACION EN ALCANCE------------------*/

/*----TABLA CLIENTE------*/
function documentacion_cliente(number,value){
    console.log(number+" "+value);
}




















































































/*-------------------------Estaciones de Servicio.PHP-------------------------*/

function show_content(type,id,recive,id_table,file){
    //alert(id_table);
    document.getElementById(id_table).style.display="none";
    
       $.ajax({
        type: 'post',
        url: '../Scripts/insert/Contenido_gpo/'+file+'.php',
        data: {type: type,id: id},
    }).done(function (valor) {
        $("#" + recive).html(valor);
    }).fail(function (data) {
        alert("Error");
    }); 
}

function back_arrow_table(id1,id2){
    document.getElementById(id1).style.display="table";
    document.getElementById(id2).style.display="none";
}

function es_content(doc,id){
    document.getElementById("estaciones_servicio_table").style.display="none";
           $.ajax({
        type: 'post',
        url: '../Scripts/insert/Contenido_gpo/es_content.php',
        data: {doc: doc,id: id},
    }).done(function (valor) {
        $("#es_content").html(valor);
    }).fail(function (data) {
        alert("Error");
    }); 
}

function request_files(){
    alert("add")
}
function send_files_documents_es(){
    
    var datos = $(this).serializeArray(); //datos serializados
    var form = new FormData($("#form_upload_files_content")[0]);

    //agergaremos los datos serializados al objecto imagen
    $.each(datos, function (key, input) {
        form.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Contenido_gpo/save_files.php',
        data: form, //enviamos imagen
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#es_content_files").html(valor);
    }).fail(function (data) {
        alert("Error");
    });

    return false;
}



function current_time(id){
    var n = 0;
var l = document.getElementById(id);
window.setInterval(function(){
  l.innerHTML = n;
  n++;
},1000);
}

//SASISOPA ALERTIFY-------------------------------------------------------------
function add_files_alert_sasisopa(nombrecaperta,carpeta,es){

 alertify.alert().set({'transition':'fade','startMaximized':true, 'message':'\
<h3> Seleccione los documentos para subir a la carpeta: '+nombrecaperta+' de la E.S.'+es+'</h3>\n\
<form name=\"form_sasisopa_upload_files\" class=\"form_sasisopa_upload_files\" id=\"form_sasisopa_upload_files\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return upload_files_sasisopa()\">\n\
    <div class=\"col-sm-8\">\n\
        <input  type=\"file\" accept=\"application/pdf\" id=\"input_file_sasisopa\" name=\"input_file_sasisopa[]\" multiple=\"\" class=\"inputfile_caracteristicastramite\"> \n\
        <label  for=\"input_file_sasisopa\"><svg aria-hidden=\"true\" data-prefix=\"fas\" data-icon=\"file-import\" class=\"svg-inline--fa fa-file-import fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"17\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M16 288c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h112v-64H16zm336-152V0H152c-13.3 0-24 10.7-24 24v264h127.99v-65.18c0-14.28 17.29-21.41 27.36-11.27l95.7 96.43c6.6 6.65 6.6 17.39 0 24.04l-95.7 96.42c-10.06 10.14-27.36 3.01-27.36-11.27V352H128v136c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H376c-13.2 0-24-10.8-24-24zm153-31L407.1 7c-4.5-4.5-10.6-7-17-7H384v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z\"></path></svg> Elige un archivo</label>\n\
    </div>\n\
    <input type=\"hidden\" value='+carpeta+' name=\"sasisopa_folder\">\n\
    <input type=\"hidden\" value='+es+' name=\"es_sasisopa_file\">\n\
    <output id=\"show_files_input\"></output>\n\
    <input type=\"submit\" id=\"submit_files_sasisopa\" class=\"inputfile_caracteristicastramite\" value=\"Subir\">\n\
    <label  for=\"submit_files_sasisopa\"><svg aria-hidden=\"true\" data-prefix=\"fas\" data-icon=\"upload\" class=\"svg-inline--fa fa-upload fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"17\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z\"></path></svg> Subir</label>\n\
    </form>\n\
'}).show().setHeader('<div class=\"tooblar-header_alertify\"><span class=\"toolbar_span\">Gargar Documentos</span> </div>').set('label', 'Cerrar'); 
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object
    var tamaño=0;
    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
        if (f.type!="application/pdf") {
      output.push('<li><strong class=\"text_to_red\">', escape(f.name), ' Formato incorrecto</strong></li>');                
        }else{
      output.push('<li><strong class=\"text_to_green\">', escape(f.name), ' :</strong> ',
      (f.size/1048576).toFixed(2), ' MB</li>');   
            }
        

      
      tamaño=tamaño+(f.size/1048576);
    }
        output.push('<strong > Tamaño Total : ',tamaño,' MB </strong><br>');
        if (validar_peso_archivos(tamaño)!="") {
            alertify.confirm(validar_peso_archivos(tamaño)).setHeader('Limite Excedido');
            document.getElementById("submit_files_sasisopa").className = "inputfile_caracteristicastramite_disabled";
            document.getElementById("submit_files_sasisopa").disabled=true;
        }else{
            document.getElementById("submit_files_sasisopa").className = "inputfile_caracteristicastramite";
            document.getElementById("submit_files_sasisopa").disabled=false; 
         }
    document.getElementById('show_files_input').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('input_file_sasisopa').addEventListener('change', handleFileSelect, false);

}
 function upload_files_sasisopa(){
alertify.confirm('<div class=\"alert_upload_files\"><h3>Subiendo Documentos...</h3><span class=\"fas fa-spinner faa-spin animated loading-icon\" ></span> <div id=\"time_alert\"></div> <div>').set('basic', true).set('closable', false).setHeader('Subiendo Documentos');
current_time('time_alert');
    var datos = $(this).serializeArray(); //datos serializados
    var form = new FormData($("#form_sasisopa_upload_files")[0]);
    $.each(datos, function (key, input) {
        form.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Sasisopa/files_sasisopa_upload.php',
        data: form,
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#upload_files_message").html(valor);
    }).fail(function (data) {
        alert("Error");
    });
     return false;
 }
 
 function reload_folder(num_carpeta,es){
 alertify.confirm().destroy();
 alertify.alert().destroy();
 document.getElementById("documentacion_sasisopa_container_es_folder_files").style.display="none";
           $.ajax({
        type: 'post',
        url: '../Scripts/insert/Sasisopa/sasisopa_es_folder_files.php',
        data: {es: es,folder: num_carpeta},
    }).done(function (valor) {
        $("#upload_files_message").html(valor);
    }).fail(function (data) {
        alert("Error");
    });
    return false;
 }
//FIN SASISOPA ALERTIFY--------------------------------------------------------

//DOCUMENTACION ALERTIFY--------------------------------------------------------
function validar_peso_archivos(tamaño){
    if (tamaño>250) {
        var cadena ="<strong class=\"text_to_red\">El Tamaño Maximo de envios Simultaneos es de 250MB</strong>";
    }else{
        var cadena="";
    }
    return cadena;
}

function add_files_alert_document(nombrecaperta,carpeta,es){
    alertify.alert().set({'transition':'fade','startMaximized':true, 'message':'\<h3> Documentación para : '+nombrecaperta+' E.S.'+es+'</h3>\n\
<form name=\"form_documentos_upload_files\" class=\"form_documentos_upload_files\" id=\"form_documentos_upload_files\" method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return upload_files_documentos()\">\n\
    <div class=\"col-sm-8\">\n\
        <input  type=\"file\" id=\"input_file_documentacion\" name=\"input_file_documentacion[]\" multiple=\"\" class=\"inputfile_caracteristicastramite\"> \n\
        <label  for=\"input_file_documentacion\"><svg aria-hidden=\"true\" data-prefix=\"fas\" data-icon=\"file-import\" class=\"svg-inline--fa fa-file-import fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"17\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M16 288c-8.84 0-16 7.16-16 16v32c0 8.84 7.16 16 16 16h112v-64H16zm336-152V0H152c-13.3 0-24 10.7-24 24v264h127.99v-65.18c0-14.28 17.29-21.41 27.36-11.27l95.7 96.43c6.6 6.65 6.6 17.39 0 24.04l-95.7 96.42c-10.06 10.14-27.36 3.01-27.36-11.27V352H128v136c0 13.3 10.7 24 24 24h336c13.3 0 24-10.7 24-24V160H376c-13.2 0-24-10.8-24-24zm153-31L407.1 7c-4.5-4.5-10.6-7-17-7H384v128h128v-6.1c0-6.3-2.5-12.4-7-16.9z\"></path></svg> Elige un archivo</label>\n\
    </div>\n\
    <input type=\"hidden\" value='+carpeta+' name=\"sasisopa_folder\">\n\
    <input type=\"hidden\" value='+es+' name=\"numero_estacion_files\">\n\
    <output id=\"show_files_input\"></output>\n\
    <input type=\"submit\" id=\"submit_files_documentacion\" class=\"inputfile_caracteristicastramite\" value=\"Subir\">\n\
    <label  for=\"submit_files_documentacion\"><svg aria-hidden=\"true\" data-prefix=\"fas\" data-icon=\"upload\" class=\"svg-inline--fa fa-upload fa-w-16\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"17\" viewBox=\"0 0 512 512\"><path fill=\"currentColor\" d=\"M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z\"></path></svg> Subir</label>\n\
    </form>\n\
'}).show().setHeader('<div class=\"tooblar-header_alertify\"><span class=\"toolbar_span\">Gargar Documentos</span> </div>').set('label', 'Cerrar'); 
  function handleFileSelect(evt) {
      //       
    var files = evt.target.files; // FileList object
    var tamaño=0;
    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), ' :</strong> ',
      f.size/1048576, ' MB', '</li>');
      
      tamaño=tamaño+(f.size/1048576);
    }
   
    output.push('<strong > Tamaño Total : ',tamaño,' MB </strong><br>');
        if (validar_peso_archivos(tamaño)!="") {
            alertify.confirm(validar_peso_archivos(tamaño)).setHeader('Limite Excedido');
            document.getElementById("submit_files_documentacion").className = "inputfile_caracteristicastramite_disabled";
            document.getElementById("submit_files_documentacion").disabled=true;
        }else{
            document.getElementById("submit_files_documentacion").className = "inputfile_caracteristicastramite";
            document.getElementById("submit_files_documentacion").disabled=false; 
         }
    
    document.getElementById('show_files_input').innerHTML = '<ul>' + output.join('') + '</ul>';
  }
  document.getElementById('input_file_documentacion').addEventListener('change', handleFileSelect, false);
}

function upload_files_documentos(){
    alertify.confirm('<div class=\"alert_upload_files\"><h3>Subiendo Documentos...</h3><span class=\"fas fa-spinner faa-spin animated loading-icon\" ></span><div>').set('basic', true).set('closable', false).setHeader('Subiendo Documentos');

        var datos = $(this).serializeArray(); //datos serializados
    var form = new FormData($("#form_documentos_upload_files")[0]);
    $.each(datos, function (key, input) {
        form.append(input.name, input.value);
    });

    $.ajax({
        type: 'post',
        url: '../Scripts/insert/Contenido_gpo/save_files.php',
        data: form,
        contentType: false,
        processData: false
    }).done(function (valor) {
        $("#es_content_files").html(valor);
    }).fail(function (data) {
        alert("Error");
    });
     return false;
}

function reload_folder_documents(es){
    alertify.confirm().destroy();
 alertify.alert().destroy();
 document.getElementById("Documentacion_estaciones").style.display="none";
           $.ajax({
        type: 'post',
        url: '../Scripts/insert/Contenido_gpo/Documentacion.php',
        data: {es: es},
    }).done(function (valor) {
        $("#es_content_files").html(valor);
    }).fail(function (data) {
        alert("Error");
    });
    return false; 
}


//FIN DOCUMENTACION ALERTIFY----------------------------------------------------

