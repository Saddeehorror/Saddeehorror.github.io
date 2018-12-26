<?php
require '../../../funcionesPHP/Funciones.php';
function tramite_name($tramite){
        switch ($tramite) {
        case 'MIA':
            $titulo = "Manifestación de Impacto Ambiental";
            break;
        case 'IP':
            $titulo = "Informe Preventivo";
            break;
        case 'AIO':
            $titulo = "Aviso de Inicio Opereraciónes antes 1988";
            break;
        case 'MPA':
            $titulo = "Modificación de Proyectos Autorizados";
            break;
        case 'CDT':
            $titulo = "Cambio de Titularidad";
            break;
        case 'tyc':
            $titulo = "Terminos y Condicionantes";
            break;
        case 'LUA':
            $titulo = "Licencia Ambiental Unica";
            break;
        case 'MOD LUA':
            $titulo = "Modificación de la LAU";
            break;
        case 'COA':
            $titulo = "Cédula de Operación Anual";
            break;
        case 'AEG':
            $titulo = "Alta Como Empresa Generadora";
            break;
        case 'MOD AEG':
            $titulo = "Modificación de la AEG";
            break;
        default:
        $titulo = "No value found";
    }
    return $titulo;
}


function get_razon_social($id_gpo,$conexion){
    $query_gpo_corp= mysqli_query($conexion, "SELECT * FROM gpo_corp where id_gpo_corp='".$id_gpo."'");
    while ($answer_query_gpo= mysqli_fetch_array($query_gpo_corp)){
        $name=$answer_query_gpo['nombre'];
    }
    return noEspacios($name);
}