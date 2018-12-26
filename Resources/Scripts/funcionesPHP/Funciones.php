<?php

function noEspacios($cadena) {
    $cadena_sin_espacios = str_replace(" ", "_", $cadena);
    return $cadena_sin_espacios;
}

function hexadecimalAzar($caracteres) {
    $caracteresPosibles = "0123456789abcdef";
    $azar = '';
    for ($i = 0; $i < $caracteres; $i++) {
        $azar .= $caracteresPosibles[rand(0, strlen($caracteresPosibles) - 1)];
    }
    return strtoupper($azar);
}

function eliminar_directorios($dir) {
    $resultDelete = false;
    if ($handle = opendir("$dir")) {
        $resultDelete = true;
        while ((($file = readdir($handle)) !== false) && ($resultDelete)) {
            if ($file != '.' && $file != '..') {
                if (is_dir("$dir/$file")) {
                    $resultDelete = eliminar_directorios("$dir/$file");
                } else {
                    $resultDelete = unlink("$dir/$file");
                }
            }
        }
        closedir($handle);
        if ($resultDelete) {
            $resultDelete = rmdir($dir);
        }
    }
    return $resultDelete;
}

function copiar($fuente, $destino) {
    if (is_dir($fuente)) {
        $dir = opendir($fuente);
        while ($archivo = readdir($dir)) {
            if ($archivo != "." && $archivo != "..") {
                if (is_dir($fuente . "/" . $archivo)) {
                    if (!is_dir($destino . "/" . $archivo)) {
                        mkdir($destino . "/" . $archivo);
                    }
                    copiar($fuente . "/" . $archivo, $destino . "/" . $archivo);
                } else {
                    copy($fuente . "/" . $archivo, $destino . "/" . $archivo);
                }
            }
        }
        closedir($dir);
    } else {
        copy($fuente, $destino);
    }
}

function redimencionarImagen($file,$ancho,$destino,$extencion,$renombrar){
    $imagen_original = null;
    switch($extencion){
        case "jpg":
            $img_original = imagecreatefromjpeg($file['tmp_name']);
            break;
        case "png":
            $img_original = imagecreatefrompng($file['tmp_name']);
            break;
        case "gif":
            $img_original = imagecreatefromgif($file['tmp_name']);
            break;
        default :
            
            break;
    }
    
    $ancho_original = imagesx($img_original);
    $alto_original = imagesy($img_original);
    
    //creamos lienzo vacio
    $ancho_nuevo = $ancho;
    $alto_nuevo = round($ancho_nuevo * $alto_original / $ancho_original);
    $img_copia = imagecreatetruecolor($ancho_nuevo, $alto_nuevo);
    
    //copiar original a copia
    imagecopyresampled($img_copia, $img_original, 0, 0, 0, 0, $ancho_nuevo, $alto_nuevo, $ancho_original, $alto_original);
    //exportar guardar imagen
    imagejpeg($img_copia, $destino.$renombrar.'.'.$extencion, 100);
}

function sumar_dias($fecha,$dias){
//Esta pequeña funcion me crea una fecha de entrega sin sabados ni domingos  
    $fechaInicial = $fecha; //obtenemos la fecha de hoy, solo para usar como referencia al usuario  
    $Segundos=0;
    $MaxDias = $dias-1; //Cantidad de dias maximo para el prestamo, este sera util para crear el for  
  
      
         //Creamos un for desde 0 hasta 3  
         for ($i=0; $i<$MaxDias; $i++)  {
        
                  //Acumulamos la cantidad de segundos que tiene un dia en cada vuelta del for  
        $Segundos = $Segundos + 86400;  
          
                  //Obtenemos el dia de la fecha, aumentando el tiempo en N cantidad de dias, segun la vuelta en la que estemos  
        $caduca = date("D",strtotime($fecha)+$Segundos);  
          
                           //Comparamos si estamos en sabado o domingo, si es asi restamos una vuelta al for, para brincarnos el o los dias...  
            if ($caduca == "Sat")  
            {  
                $i--;  
            }  
            else if ($caduca == "Sun")  
            {  
                $i--;  
            }  
            else  
            {  
                                    //Si no es sabado o domingo, y el for termina y nos muestra la nueva fecha  
                $FechaFinal = date("Y-m-d",strtotime($fecha)+$Segundos);  
            }  
    }  
return $FechaFinal;
    
}
?>