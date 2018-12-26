/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var NumTRs = 1;

function addProducto(id_tabla){
    var arrayNombresTh = [null,null,null,null,null,null,null];
    var Tabla = document.getElementById(id_tabla);
    var opciones = ["Seleccionar","Gasolina Magna","Gasolina Premium","Diesel","Diesel Marino"];
    var confirmacion = ["Seleccionar","si","no"];
    
    var arrayTd = [];
 
    var Tr2 = document.createElement("tr");
   
    //creando elementos td
    for(var i = 0; i < arrayNombresTh.length;i++){
        arrayTd[i]=crearElemento("td");
    }
    
    for(var i = 0; i < arrayNombresTh.length;i++){
        arrayTd[i].setAttribute("class","formato-td-th-cuestionario");
    }
   
    var label = crearElemento("label","fas fa-times remove_icon_estilo");
    
    arrayTd[0].appendChild(elementoSelect("select",opciones,"cuestionario-selector-tabla"));
    arrayTd[1].appendChild(crearElemento("input","cuestionario-input-tabla"));
    arrayTd[2].appendChild(elementoSelect("select",confirmacion,"cuestionario-selector-tabla"));
    arrayTd[3].appendChild(crearElemento("input","cuestionario-input-tabla"));
    arrayTd[4].appendChild(elementoSelect("select",confirmacion,"cuestionario-selector-tabla"));
    arrayTd[5].appendChild(crearElemento("textarea"));
    arrayTd[6].appendChild(label);
  
    //añadir elementos td a tr
    for(var i = 0;i < arrayNombresTh.length; i++){
        Tr2.appendChild(arrayTd[i]);
    }
    
    //Tr2.setAttribute("id","tableTr"+NumTRs);
    
    //Tabla.appendChild(Tr1);
    Tabla.appendChild(Tr2);
    NumTRs++;
}

function agregarProyectos(id_tabla){
    var arrayNombresTh = [null,null,null,null];
    var Tabla = document.getElementById(id_tabla);
    var confirmacion = ["Seleccionar","si","no"];
    
    var arrayTd = [];
 
    var Tr2 = document.createElement("tr");
   
    //creando elementos td
    for(var i = 0; i < arrayNombresTh.length;i++){
        arrayTd[i]=crearElemento("td");
    }
    
    for(var i = 0; i < arrayNombresTh.length;i++){
        arrayTd[i].setAttribute("class","formato-td-th-cuestionario");
    }
   
    var label = crearElemento("label","fas fa-times remove_icon_estilo");
    
    arrayTd[0].appendChild(crearElemento("input","cuestionario-input-tabla"));
    arrayTd[1].appendChild(elementoSelect("select",confirmacion,"cuestionario-selector-tabla"));
    arrayTd[2].appendChild(elementoSelect("select",confirmacion,"cuestionario-selector-tabla"));
    arrayTd[3].appendChild(label);
  
    //añadir elementos td a tr
    for(var i = 0;i < arrayNombresTh.length; i++){
        Tr2.appendChild(arrayTd[i]);
    }
    
    //Tr2.setAttribute("id","tableTr"+NumTRs);
    
    //Tabla.appendChild(Tr1);
    Tabla.appendChild(Tr2);
    NumTRs++;
}

function crearElemento(type_element,setclass){
    var elemento = document.createElement(type_element);
    elemento.setAttribute("class",""+setclass+"");
    return elemento;
}

function elementoSelect(type,opciones,setclass){
    var main = document.createElement(type);
    var optionsele = [];
    main.setAttribute("class",""+setclass+"");
    for(var i = 0;i < opciones.length;i++){
        optionsele.push(crearElemento("option"));
    }
    for(var i = 0;i<opciones.length;i++){
        optionsele[i].setAttribute("value",""+opciones[i]+"");
    }
    
    for(var i = 0;i<opciones.length;i++){
        optionsele[i].innerHTML = ""+opciones[i]+"";
    }
    
    for(var i = 0;i<opciones.length;i++){
        main.appendChild(optionsele[i]);
    }
    return main;
}


function eliminarFila(id){
    alert(id);
    var elementoaEliminar = document.getElementById(id);
    elementoaEliminar.display = 'none';
}


