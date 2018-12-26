<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createFilexxxxxxx($nombreArchivo) {
    $contenidoArchivo = "<?php
    session_start();
    header('Location: ./Home.php');
    ";
    if (!file_exists($nombreArchivo)) {
        if ($file = fopen($nombreArchivo, "a")) {
            if (fwrite($file, $contenidoArchivo)) {
                echo '<scrip language = "javascript">console.log("archivo creado con exito");</script>';
            }else{
                echo '<scrip language = "javascript">console.log("error al escribir en el archivo");</script>';
            }
        }
    } else {
        echo '<scrip language = "javascript">console.log("el archivo existe");</script>';
    }

}
