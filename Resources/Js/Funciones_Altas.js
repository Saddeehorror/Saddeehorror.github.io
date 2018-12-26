function Alta(id_form, url, id_div, loading) {
    if (loading != null) {
        document.getElementById(loading).style.display = "block";
    }
    var datos = $(this).serializeArray(); //datos serializados
    var data = new FormData($("#" + id_form)[0]);
    //agergaremos los datos serializados al objecto imagen
    $.each(datos, function (key, input) {
        data.append(input.name, input.value);
    });
    $.ajax({
        type: 'post',
        url: url,
        data: data, //enviamos imagen
        contentType: false,
        processData: false
    }).done(function (valor) {
        if (loading != null) {
            document.getElementById(loading).style.display = "none";
        }
        $("#" + id_div).html(valor);
    }).fail(function (data) {
        alert(data);

    });
    return false;
}
//globales para conteo de campos email telefonos--------------------------------
var valorInc = parseInt(2);
var valorInc2 = parseInt(2);

//envia numero de campos de email o telefonos-----------------------------------
function enviarNum_campos(valor_id) {
    var elemento = document.getElementById(valor_id);
    if (valor_id == "send_num_campos_email") {
        elemento.setAttribute("value", valorInc);
    } else if (valor_id == "send_num_campos_telefono") {
        elemento.setAttribute("value", valorInc2);
    }
}

//Agrega campos emailextra------------------------------------------------------
function agregar_campo_email() {
    var elementolabel = document.createElement("label");
    var elementobr2 = document.createElement("br");
    elementolabel.innerHTML = "E-mail " + valorInc + " (Opcional) ";
    elementolabel.setAttribute("class","etiqueta-textview-alta");
    var elementoinput = document.createElement("input");
    var elementobr = document.createElement("br");
    elementoinput.setAttribute("type", "email");
    elementoinput.setAttribute("name", "correo" + valorInc);
    document.getElementById("contenedor-email").appendChild(elementobr2);
    document.getElementById("contenedor-email").appendChild(elementolabel);
    document.getElementById("contenedor-email").appendChild(elementoinput);
    document.getElementById("contenedor-email").appendChild(elementobr);
    enviarNum_campos("send_num_campos_email");
    valorInc++;
}

//Agrega campos telefonoextra---------------------------------------------------
function agregar_campo_telefono() {
    var elementolabel = document.createElement("label");
    var elementobr2 = document.createElement("br");
    elementolabel.innerHTML = "Telefono " + valorInc2 + " (Opcional) ";
    elementolabel.setAttribute("class","etiqueta-textview-alta");
    var elementoinput = document.createElement("input");
    var elementobr = document.createElement("br");
    elementoinput.setAttribute("type", "number");
    elementoinput.setAttribute("name", "telefono" + valorInc2);
    document.getElementById("contenedor-telefono").appendChild(elementobr2);
    document.getElementById("contenedor-telefono").appendChild(elementolabel);
    document.getElementById("contenedor-telefono").appendChild(elementoinput);
    document.getElementById("contenedor-telefono").appendChild(elementobr);
    enviarNum_campos("send_num_campos_telefono");
    valorInc2++;
}

function cambiarColorOver(id_label){
    var elemento = document.getElementById(id_label);
    elemento.style.color = "#4caf50";
}

function cambiarColorOut(id_label){
    var elemento = document.getElementById(id_label);
    elemento.style.color = "#ff4081";
}


