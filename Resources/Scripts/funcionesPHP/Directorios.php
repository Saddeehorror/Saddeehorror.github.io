<?php

function createFile($nombreArchivo) {
    $contenidoArchivo = "<?php
    session_start();
    header('Location: https://www.ambientalistascale.com');
    ";
    if (!file_exists($nombreArchivo)) {
        if ($file = fopen($nombreArchivo, "a")) {
            if (fwrite($file, $contenidoArchivo)) {
            }else{
            }
        }
    } else {
    }

}

function crearCarpetasGrupo($razonSocial, $raiz) {
    //$raiz = '../../../../../System/Grupos/';
    //directorio raiz grupos
    $array_folders = array();
    if (!file_exists($raiz)) {
        mkdir($raiz, 0777);
    }
    
    //directorio razon social
    $path_folder = $raiz. $razonSocial;
    echo '<script language="javascript">alert("'.$path_folder.'");</script>';
    if (!file_exists($path_folder)) {
        mkdir($path_folder, 0777);
        createFile($path_folder."/index.php");
    }
    
    //directorio Fondo
    $carpeta_fondo = $path_folder . "/Fondo/";
    if (!file_exists($carpeta_fondo)) {
        mkdir($carpeta_fondo, 0777);
        createFile($carpeta_fondo."index.php");
    }
    array_push($array_folders, $carpeta_fondo);
    
    //directorio Foto
    $carpeta_foto = $path_folder . "/Foto/";
    if (!file_exists($carpeta_foto)) {
        mkdir($carpeta_foto, 0777);
        createFile($carpeta_foto."index.php");
    }
    array_push($array_folders, $carpeta_foto);
    
    //directorio ES
    $carpeta_es = $path_folder . "/ES/";
    if (!file_exists($carpeta_es)) {
        mkdir($carpeta_es, 0777);
        createFile($carpeta_es."index.php");
    }
    array_push($array_folders, $carpeta_es);
    
    return $array_folders;
}
?>

