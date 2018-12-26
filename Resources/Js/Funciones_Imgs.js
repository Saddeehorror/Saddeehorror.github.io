/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function cambiarBackgroundSidebar(id_contenedor,url_img){
    //alert("Entra?¿");
    var elemento = document.getElementById(id_contenedor);
    //alert(""+id_contenedor+"");
    elemento.style.background = "url('"+url_img+"')";
    elemento.style.backgroundSize = "100%";
}


function previewImg(div_carga, id_button_file, id_img_container) {
    $("#" + div_carga).on('change', "#" + id_button_file, function () {
        if (this.files && this.files[0]) {
            /* Seleccionamos el contenedor IMG por su id*/
            var img_container = $("#" + id_img_container);
            /* Asignamos el atributo source , haciendo uso del método createObjectURL*/
            img_container.attr('src', URL.createObjectURL(this.files[0]));
        }
    });
}

