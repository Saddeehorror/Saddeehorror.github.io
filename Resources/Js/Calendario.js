





































//-----------------------------------------------------------------------------------------------------------------------------------------------------------------
function pintar_tramites(tipo, estado, ingreso_sistema, ingreso_asea, recepcion, es, añoactual) { //PINTAR TRAMITES------------------------------------------------
    if (recepcion != "") {
        if (estado == "Resolutivo") {//si el estado del tramite es resolutivo

            if ((tipo == "MIA") || (tipo == "IP")) {
                document.getElementById("IA" + es).style.backgroundColor = "#4CAF50";
                document.getElementById(tipo + es).style.backgroundColor = "#4CAF50";
                var num_mes = "";
                for (var i = 1; i < 13; i++) {
                    if (i < 10) {
                        num_mes = "0" + i;
                    } else {
                        num_mes = i;
                    }
                    document.getElementById(num_mes + "IA" + es + añoactual).style.backgroundColor = "#4CAF50";
                    //alert(num_mes+tipo+es+añoactual);
                    document.getElementById(num_mes + tipo + es + añoactual).style.backgroundColor = "#4CAF50";
                }
            }
            document.getElementById(tipo + es).style.backgroundColor = "#4CAF50";
            var num_mes = "";
            for (var j = 1; j < 13; j++) {
                if (j < 10) {
                    num_mes = "0" + j;
                } else {
                    num_mes = j;
                }
                document.getElementById(num_mes + tipo + es + añoactual).style.backgroundColor = "#4CAF50";
            }

        } else {//fin de resolutivo
            if ((tipo == "MIA") || (tipo == "IP")) {
                document.getElementById("IA" + es).style.backgroundColor = "red";
                var año_tramite = ingreso_sistema[0] + ingreso_sistema[1] + ingreso_sistema[2] + ingreso_sistema[3]
                if (parseInt(añoactual) == parseInt(año_tramite)) {
                    var id = ingreso_sistema[5] + ingreso_sistema[6] + "IA" + es + año_tramite;
                    document.getElementById(id).style.backgroundColor = "red";
                }
            }
            document.getElementById(tipo + es).style.backgroundColor = "red";
            var año_tramite = recepcion[0] + recepcion[1] + recepcion[2] + recepcion[3]
            if (parseInt(añoactual) == parseInt(año_tramite)) {
                var id = recepcion[5] + recepcion[6] + tipo + es + año_tramite;
                document.getElementById(id).style.backgroundColor = "red";
            }
        }
    } else {
        if (ingreso_asea != "") {
            if ((tipo == "MIA") || (tipo == "IP")) {
                document.getElementById("IA" + es).style.backgroundColor = "yellow";
                var año_tramite = ingreso_sistema[0] + ingreso_sistema[1] + ingreso_sistema[2] + ingreso_sistema[3]
                if (parseInt(añoactual) == parseInt(año_tramite)) {
                    var id = ingreso_sistema[5] + ingreso_sistema[6] + "IA" + es + año_tramite;
                    document.getElementById(id).style.backgroundColor = "yellow";
                }
            }
            document.getElementById(tipo + es).style.backgroundColor = "yellow";
            var año_tramite = ingreso_asea[0] + ingreso_asea[1] + ingreso_asea[2] + ingreso_asea[3]
            if (parseInt(añoactual) == parseInt(año_tramite)) {
                var id = ingreso_asea[5] + ingreso_asea[6] + tipo + es + año_tramite;
                document.getElementById(id).style.backgroundColor = "yellow";
            }
        } else {
            if (ingreso_sistema != "") {
                if ((tipo == "MIA") || (tipo == "IP")) {
                    document.getElementById("IA" + es).style.backgroundColor = "gray";
                    var año_tramite = ingreso_sistema[0] + ingreso_sistema[1] + ingreso_sistema[2] + ingreso_sistema[3]
                    if (parseInt(añoactual) == parseInt(año_tramite)) {
                        var id = ingreso_sistema[5] + ingreso_sistema[6] + "IA" + es + año_tramite;
                        document.getElementById(id).style.backgroundColor = "gray";
                    }
                }
                document.getElementById(tipo + es).style.backgroundColor = "gray";
                var año_tramite = ingreso_sistema[0] + ingreso_sistema[1] + ingreso_sistema[2] + ingreso_sistema[3]
                if (parseInt(añoactual) == parseInt(año_tramite)) {
                    var id = ingreso_sistema[5] + ingreso_sistema[6] + tipo + es + año_tramite;
                    document.getElementById(id).style.backgroundColor = "gray";
                }
            }
        }
    }
}
//PINTAR ASUNTOS ASEA-----------------------------------------------------------
function pintar_asuntos(nombre,estatus,ingreso_sist,ingreso_asea,acuce_recibo,num_es,año_actual){
    
    if (acuce_recibo!="") {
       
    }else{
        if (ingreso_asea!="") {
            
        }else{
            if (ingreso_sist!="") {
                document.getElementById(nombre+num_es).style.backgroundColor="gray";
            }
        } 
    }
}


function actualizar_seguimiento(tipo,num_es,ingreso_sistema,color,id_es){
    if ((tipo == "MIA") || (tipo == "IP")) {
    document.getElementById("IA" + num_es).style.backgroundColor = color;    
        if (tipo=="MIA") {//si es MIA------------------------------------------
    var desabilitar=document.getElementById("IP"+num_es); 
    desabilitar.style.backgroundColor="#e7e7e7";
    var desabilitarlabel=document.getElementById("IP"+"label"+num_es);
    desabilitarlabel.onclick=null;
    desabilitarlabel.style.color="white"; 
    }else if (tipo=="IP"){//SI ES IP---------------------------------------
        var desabilitar=document.getElementById("MIA"+num_es); 
    desabilitar.style.backgroundColor="#e7e7e7";
    var desabilitarlabel=document.getElementById("MIA"+"label"+num_es);
    desabilitarlabel.onclick=null;
    desabilitarlabel.style.color="white";     
    }
    }
    
    document.getElementById(tipo+num_es).style.backgroundColor = color;
    var año_tramite=ingreso_sistema[0]+ingreso_sistema[1]+ingreso_sistema[2]+ingreso_sistema[3]
    var id=ingreso_sistema[5]+ingreso_sistema[6]+tipo+num_es+año_tramite;
    document.getElementById(id).style.backgroundColor=color;  
}


var checar_tramite="";
//DESHABILITAR TRAMITE----------------------------------------------------------------------------------------------------------------------------------------------
function deshabilitar_tramites(inicio_op,num_es,tramiteia,estatusia,tramiteaeg,estatusaeg,tramitelua,estatuslua,fecha_resolutivo_lau,tramiteaio,statusaio,tramitesasisopa,statussasisopa){
    //alert(num_es);
//INICIO_OPERACIONES------------------------------------------------------------
   if( (new Date(inicio_op).getTime() < new Date('1988-01-28').getTime())){
        if (tramiteaio) {
    var td=document.getElementById("TyC"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("TyC"+"label"+num_es);
    label.onclick=null;
    label.style.color="white";    
        }

}else{
    var td=document.getElementById("AIO"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("AIO"+"label"+num_es);
    label.onclick=null;
    label.style.color="white";
    }
//IP || MIA---------------------------------------------------------------------
    if (tramiteia=="MIA") {//si es MIA------------------------------------------
    var desabilitar=document.getElementById("IP"+num_es); 
    desabilitar.style.backgroundColor="#e7e7e7";
    var desabilitarlabel=document.getElementById("IP"+"label"+num_es);
    desabilitarlabel.onclick=null;
    desabilitarlabel.style.color="white"; 
    checar_tramite=1;
    }else if (tramiteia=="IP"){//SI ES IP---------------------------------------
        var desabilitar=document.getElementById("MIA"+num_es); 
    desabilitar.style.backgroundColor="#e7e7e7";
    var desabilitarlabel=document.getElementById("MIA"+"label"+num_es);
    desabilitarlabel.onclick=null;
    desabilitarlabel.style.color="white";
    checar_tramite=1;
    }else if (tramiteia=="none") {//SI NO HAY TRAMITE---------------------------
    checar_tramite=0;
    var td=document.getElementById("LUA"+num_es);//deshabilitar Lau-------------
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("LUAlabel"+num_es);
    label.onclick=null;
    label.style.color="white";

    var td=document.getElementById("TyC"+num_es);//TYC
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("TyC"+"label"+num_es);
    label.onclick=null;
    label.style.color="white";
    
    var sasisopa=document.getElementById("SASISOPA"+num_es);//sasisopa
    sasisopa.style.backgroundColor="e7e7e7";
    var sasisopalabel=document.getElementById("SASISOPAlabel"+num_es);
    sasisopalabel.onclick=null;
    sasisopalabel.style.color="white";
    document.getElementById("sasisopa"+num_es).style.display="none";
    }
    if (estatusia!="Resolutivo") {//CHECAR ESTATUS DEL TRAMITE PARA APROBAR TYC-
    var hijosia = ["TyC", "AIO", "MPA","CDT"];
    
        for (var num = 0; num < hijosia.length; num++) {
             var td=document.getElementById(hijosia[num]+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById(hijosia[num]+"label"+num_es);
    label.onclick=null;
    label.style.color="white";   
        }    

    
    }
//AEG---------------------------------------------------------------------------
    if (tramiteaeg) {
            if (estatusaeg!="Resolutivo") {
    var td=document.getElementById("MOD_AEG"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("MOD_AEGlabel"+num_es);
    label.onclick=null;
    label.style.color="white";    
    }
    }else{
    var td=document.getElementById("MOD_AEG"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("MOD_AEGlabel"+num_es);
    label.onclick=null;
    label.style.color="white";
    
    var td=document.getElementById("LUA"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("LUAlabel"+num_es);
    label.onclick=null;
    label.style.color="white";
    }
//LUA---------------------------------------------------------------------------
    if (tramitelua) {//si hay lua-----------------------------------------------
        if (estatuslua!="Resolutivo") {
            var td=document.getElementById("MOD_LUA"+num_es);
            td.style.backgroundColor="#e7e7e7";
            var label=document.getElementById("MOD_LUAlabel"+num_es);
            label.onclick=null;
            label.style.color="white";    
        
    var td=document.getElementById("COA"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("COAlabel"+num_es);
    label.onclick=null;
    label.style.color="white"; 
    }else{
        var añoactual=document.getElementById("showyeartable"+num_es).textContent;

           var añoresolutivo=fecha_resolutivo_lau[0]+fecha_resolutivo_lau[1]+fecha_resolutivo_lau[2]+fecha_resolutivo_lau[3];      
        if (parseInt(añoresolutivo)<parseInt(añoactual)) {
            
           
    for (var i = 3; i < 7; i++) {
    var mes='0';
        if (i<10) {
        mes=mes+i;    
        }else{
            mes=i;
        }
    document.getElementById(mes+"COA"+num_es+añoactual).style.backgroundColor="red";
    }
    }    
    }
    }else{
    var td=document.getElementById("MOD_LUA"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("MOD_LUAlabel"+num_es);
    label.onclick=null;
    label.style.color="white";
    
    var td=document.getElementById("COA"+num_es);
    td.style.backgroundColor="#e7e7e7";
    var label=document.getElementById("COAlabel"+num_es);
    label.onclick=null;
    label.style.color="white";    
    }
    if (tramitesasisopa) { //si hay sasisopa------------------------------------
        alert(statussasisopa)
    }else{
        document.getElementById("sasisopa_conformacion"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_conformacion"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabelconformacion"+num_es).onclick=null;
        document.getElementById("SASISOPAlabelconformacion"+num_es).onmouseover = function() {this.style.color = "#fff";}
        
        document.getElementById("sasisopa_dictaminacion"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_dictaminacion"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabeldictaminacion"+num_es).onclick=null;
        document.getElementById("SASISOPAlabeldictaminacion"+num_es).onmouseover = function() {this.style.color = "#fff";}
        
        document.getElementById("sasisopa_resolucion"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_resolucion"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabelresolucion"+num_es).onclick=null;
        document.getElementById("SASISOPAlabelresolucion"+num_es).onmouseover = function() {this.style.color = "#fff";}
        
        document.getElementById("sasisopa_implementacion"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_implementacion"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabelimplementacion"+num_es).onclick=null;  
        document.getElementById("SASISOPAlabelimplementacion"+num_es).onmouseover = function() {this.style.color = "#fff";}
        
        document.getElementById("sasisopa_dictaminacion2"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_dictaminacion2"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabeldictaminacion2"+num_es).onclick=null;
        document.getElementById("SASISOPAlabeldictaminacion2"+num_es).onmouseover = function() {this.style.color = "#fff";}
        
        document.getElementById("sasisopa_informeanual"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("sasisopa_informeanual"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabelinformeanual"+num_es).onclick=null;
        document.getElementById("SASISOPAlabelinformeanual"+num_es).onmouseover = function() {this.style.color = "#fff";}
    }
    
}//FIN DESHABILITAR TRAMITE-----------------------------------------------------

//SASISOPA----------------------------------------------------------------------
function mostrar_mes_sasisopa(num_es,estado,sector){

    if (sector=="Comercial") {
         switch(estado) { //Relacion estados sector comercial
    case 'Coahuila':
            var mes=8;
            var año_inicio="2018"
    break;    
    case 'Nuevo León':
            var mes=9;
            var año_inicio="2018"
    break;        
    case 'Veracruz':
            var mes=10;
            var año_inicio="2018"
    break;     
    case 'Hidalgo':
            var mes=10;
            var año_inicio="2018"
    break;
    case 'Jalisco':
            var mes=11;
            var año_inicio="2018"
            
    break;
    case 'Estado de México':
            var mes=12;
            var año_inicio="2018"
    break;
    case 'Guanajuato':
            var mes=1;
            var año_inicio="2019"
    break;
    case 'Ciudad de México':
            var mes=1;
            var año_inicio="2019"
    break;
    case 'Campeche':
            var mes=1;
            var año_inicio="2019"
    break;
    case 'Sonora':
            var mes=2;
            var año_inicio="2019"
    break;
    case 'Oaxaca':
            var mes=2;
            var año_inicio="2019"
    break;        
    case 'Querétaro':
            var mes=2;
            var año_inicio="2019"
    break;
    case 'Chihuahua':
            var mes=3;
            var año_inicio="2019"
    break;
    case 'San Luis Potosí':
            var mes=3;
            var año_inicio="2019"
    break;    
    case 'Yucatán':
            var mes=3;
            var año_inicio="2019"
    break;    
    case 'Tamaulipas':
            var mes=4;
            var año_inicio="2019"
    break;    
    case 'Aguascalientes':
            var mes=4;
            var año_inicio="2019"
    break;    
    case 'Guerrero':
            var mes=4;
            var año_inicio="2019"
    break;    
    case 'Baja California':
            var mes=5;
            var año_inicio="2019"
    break;     
    case 'Morelos':
            var mes=5;
            var año_inicio="2019"
    break;    
    case 'Tabasco':
            var mes=5;
            var año_inicio="2019"
    break;
    case 'Puebla':
            var mes=6;
            var año_inicio="2019"
    break;
    case 'Nayarit':
            var mes=6;
            var año_inicio="2019"
    break;
    case 'Quintana Roo':
            var mes=6;
            var año_inicio="2019"
    break;    
    case 'Sinaloa':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'Tlaxcala':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'Baja California Sur':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'Zacatecas':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'Michoacán':
            var mes=8;
            var año_inicio="2019"
    break;    

    case 'Colima':
            var mes=8;
            var año_inicio="2019"
    break;
    case 'Durango':
            var mes=8;
            var año_inicio="2019"
    break;    
    case 'Chiapas':
            var mes=8;
            var año_inicio="2019"
    break;

}   
    }else{
            switch(estado) { //Relacion estados sector industrial
    case 'Coahuila':
            var mes=9;
            var año_inicio="2018"
    break;    
    case 'Nuevo León':
            var mes=11;
            var año_inicio="2018"
    break;        
    case 'Veracruz':
            var mes=11;
            var año_inicio="2018"
    break;     
    case 'Hidalgo':
            var mes=11;
            var año_inicio="2018"
    break;
    case 'Jalisco':
            var mes=8;
            var año_inicio="2018"
            
    break;
    case 'Estado de México':
            var mes=12;
            var año_inicio="2018"
    break;
    case 'Guanajuato':
            var mes=11;
            var año_inicio="2019"
    break;
    case 'Ciudad de México':
            var mes=10;
            var año_inicio="2018"
    break;
    case 'Campeche':
            var mes=2;
            var año_inicio="2019"
    break;
    case 'Sonora':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'Oaxaca':
            var mes=4;
            var año_inicio="2019"
    break;        
    case 'Querétaro':
            var mes=1;
            var año_inicio="2019"
    break;
    case 'Chihuahua':
            var mes=7;
            var año_inicio="2019"
    break;
    case 'San Luis Potosí':
            var mes=6;
            var año_inicio="2019"
    break;    
    case 'Yucatán':
            var mes=4;
            var año_inicio="2019"
    break;    
    case 'Tamaulipas':
            var mes=10;
            var año_inicio="2018"
    break;    
    case 'Aguascalientes':
            var mes=4;
            var año_inicio="2019"
    break;    
    case 'Guerrero':
            var mes=6;
            var año_inicio="2019"
    break;    
    case 'Baja California':
            var mes=6;
            var año_inicio="2019"
    break;     
    case 'Morelos':
            var mes=5;
            var año_inicio="2019"
    break;    
    case 'Tabasco':
            var mes=5;
            var año_inicio="2019"
    break;
    case 'Puebla':
            var mes=11;
            var año_inicio="2018"
    break;
    case 'Nayarit':
            var mes=4;
            var año_inicio="2019"
    break;
    case 'Quintana Roo':
            var mes=6;
            var año_inicio="2019"
    break;    
    case 'Sinaloa':
            var mes=6;
            var año_inicio="2019"
    break;
    case 'Tlaxcala':
            var mes=3;
            var año_inicio="2019"
    break;
    case 'Baja California Sur':
            var mes=4;
            var año_inicio="2019"
    break;
    case 'Zacatecas':
            var mes=6;
            var año_inicio="2019"
    break;
    case 'Michoacán':
            var mes=6;
            var año_inicio="2019"
    break;    

    case 'Colima':
            var mes=8;
            var año_inicio="2019"
    break;
    case 'Durango':
            var mes=6;
            var año_inicio="2019"
    break;    
    case 'Chiapas':
            var mes=4;
            var año_inicio="2019"
    break;

}
    }


var año_actual=document.getElementById("showyeartable"+num_es).textContent;
var año_mensaje1=0;
var año_mensaje2=0;


var full_date = new Date();
var actual_day=full_date.getDate()
var actual_month=full_date.getMonth()+1;
var actual_year=full_date.getFullYear();
//document.write(f.getDate() + "/" + (f.getMonth() +1) + "/" + f.getFullYear());
var primerDia = new Date(full_date.getFullYear(), full_date.getMonth(), 1);
var ultimoDia = new Date(full_date.getFullYear(), full_date.getMonth() + 1, 0);


    if (mes == 2) {
        var inicio_mensajes1 = 12;
        var inicio_mensajes2 = 1;
        año_mensaje1 = año_inicio - 1;
    } else if (mes == 1) {
        var inicio_mensajes1 = 11;
        var inicio_mensajes2 = 12;
        año_mensaje1 = año_inicio - 1;
        año_mensaje2 = año_inicio - 1;
    } else {
        var inicio_mensajes1 = mes - 2;
        var inicio_mensajes2 = mes - 1;
    }

    if (año_mensaje2 != 0) { //si toca en enero
        if (año_actual == año_mensaje2) {
            document.getElementById("sasisopa" + inicio_mensajes1 + num_es).style.backgroundColor = "#D6F1C9";
            document.getElementById("sasisopa" + inicio_mensajes2 + num_es).style.backgroundColor = "#D6F1C9";
        } else if (año_actual == año_inicio) {
            document.getElementById("sasisopa" + mes + num_es).style.backgroundColor = "green";
        }
    } else if (año_mensaje1 != 0) {//si toca en febrero
        if (año_actual == año_mensaje1) {
            document.getElementById("sasisopa" + inicio_mensajes1 + num_es).style.backgroundColor = "#D6F1C9";
        } else {
            if (año_actual == año_inicio) {
                document.getElementById("sasisopa" + inicio_mensajes2 + num_es).style.backgroundColor = "#D6F1C9";
                document.getElementById("sasisopa" + mes + num_es).style.backgroundColor = "green";
            }
        }
    } else {//resto del año-----------------------------------------------------
        if (año_inicio == año_actual) {
            document.getElementById("sasisopa" + inicio_mensajes1 + num_es).style.backgroundColor = "#D6F1C9";
            document.getElementById("sasisopa" + inicio_mensajes2 + num_es).style.backgroundColor = "#D6F1C9";
            document.getElementById("sasisopa" + mes + num_es).style.backgroundColor = "green";
               
        }
    }

    //desactivar sasisopa hasta que llegue su tiempo----------------------------
    if (año_inicio==actual_year) {
        if (actual_month==mes) {
            if (actual_day<22) {
                if (checar_tramite!=0) {
                                   var dias_restantes=22-actual_day;
 document.getElementById("SASISOPA"+num_es).style.backgroundColor="#ebebeb";
 document.getElementById("SASISOPAlabel"+num_es).style.color="#000";
  document.getElementById("sasisopa"+num_es).style.display="inline-block"; 
                }
                

  
            }else{
        document.getElementById("SASISOPA"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("SASISOPA"+num_es).style.color="#fff";  
        
                    document.getElementById("sasisopa" + inicio_mensajes1 + num_es).style.backgroundColor = "#fff";
            document.getElementById("sasisopa" + inicio_mensajes2 + num_es).style.backgroundColor = "#fff";
            document.getElementById("sasisopa" + mes + num_es).style.backgroundColor = "red";
            }
        }
        
    }else{
        document.getElementById("SASISOPA"+num_es).style.backgroundColor="#e7e7e7";
        document.getElementById("SASISOPA"+num_es).style.color="#fff";
        document.getElementById("SASISOPAlabel"+num_es).onclick=null;
    }    
    

}


var titulos= new Array();
var cuerpos= new Array();

function alarmas_sistema(titulo,cuerpo){
titulos.push(titulo);
cuerpos.push(cuerpo);
    
const title=titulo;
const options = {
      icon: '../img/logo_cale_very_very_small.png',
      body: cuerpo,
    };
            
        
    
          Notification.requestPermission()
                   .then(() => navigator.serviceWorker.register('../../sw.js'))
                    .then(registration => {
    setTimeout(() => {
        registration.showNotification(title, {
            body: cuerpo,
            badge: '../img/logo_cale_very_very_small.png',
            icon: '../img/logo_cale_very_very_small.png',
            renotify: false,
            requireInteraction: true,
            silent: false,
            vibrate: [200, 100, 200],
            dir: 'ltr',
            lang: 'en-US'
        });}, 300);
  })
  
  
}
/*----arlarmas y sidebar*/
function show_alertas_sidebar(){
    $("#Contenedor_principal_alertas_sidebar").fadeIn(300);
    document.getElementById('badgenotification').innerHTML=0;
    checar_badge();
    dom_alarmas(titulos,cuerpos); 
}
function hide_alertas_sidebar(){
    $("#Contenedor_principal_alertas_sidebar").fadeOut(300);
}
function checar_badge() {
    var badge = document.getElementById('badgenotification').innerHTML;
    if (parseInt(badge) != 0) {
        document.getElementById('badgenotification').style.display="block"
    } else {
        document.getElementById('badgenotification').style.display="none";  
    }
}


function badge_mensaje(title,mensaje){
    var contenido_badge=document.getElementById('badgenotification').innerHTML;
   // alert(document.getElementById('badgenotification').innerHTML);
   var nuevo_contenido=parseInt(contenido_badge);
   document.getElementById('badgenotification').innerHTML=nuevo_contenido+1;
   
   checar_badge();
}

function dom_alarmas(titulos,cuerpo){

        
    
    
var contenedor = document.getElementById("contenedor_alertas"); //obtenemos el contenedor de los mensajes
    while (contenedor.hasChildNodes())
        contenedor.removeChild(contenedor.firstChild); 
var tabla = document.createElement("table");
tabla.style.width="100%";
tabla.style.backgroundColor="#fff";
tabla.style.textAlign="justified";
    for (var i = 0; i < titulos.length; i++) {
var fecha = document.createElement("th");
fecha.innerHTML="fecha";
fecha.setAttribute("Colspan","2");

var tablerow=document.createElement("tr");
var titulo=document.createElement("td");
titulo.innerHTML=titulos[i];
//titulo.setAttribute("Colspan","2");
titulo.style.width="100%";
titulo.setAttribute("Colspan","2");
var tablerow2=document.createElement("tr");
var imgtd=document.createElement("td");
var img=document.createElement("IMG")
img.setAttribute("src","../img/logo_cale.png");
img.style.width="100%";
imgtd.style.width="20%";
imgtd.appendChild(img);

var contenido=document.createElement("td");
contenido.innerHTML=cuerpo[i];
contenido.style.width="80%"

tablerow.appendChild(titulo);
tablerow2.appendChild(imgtd);
tablerow2.appendChild(contenido);
tabla.appendChild(fecha);
tabla.appendChild(tablerow);
tabla.appendChild(tablerow2);
contenedor.appendChild(tabla);
}
}
