<?php
session_start();
require '../../../Conect.php';
require '../../../funcionesPHP/Funciones.php';
$arrayacadena = "";
$errores = array();
$warning = array();

$campoIdentificadorgpo = $_POST['send_campoid_grupo'];

if (!empty($_POST['update_campo_razon-social'])) {
    $grupoNombreUpdate = $_POST['update_campo_razon-social'];
}

if (!empty($_POST['update_campo_representante-legal'])) {
    $grupoNombre_rp_legalUpdate = $_POST['update_campo_representante-legal'];
}

if (!empty($_POST['update_campo_rfc'])) {
    $grupoRfcUpdate = $_POST['update_campo_rfc'];
}

if (!empty($_POST['update_campo_curp'])) {
    $grupoCurpUpdate = $_POST['update_campo_curp'];
}

if (!empty($_POST['update_campo_grupo-email'])) {
    $grupoEmailUpdate = $_POST['update_campo_grupo-email'];
}

$grupoFondoUpdate = null;
$grupoFotoUpdate = null;

$sentencia_update_grupo_sql = "update gpo_corp set ";

$grupo_c_nombreUpdate = '';
$grupo_c_grupoNombre_rp_legalUpdate = '';
$grupo_c_grupoRfcUpdate = '';
$grupo_c_grupoCurpUpdate = '';
$grupo_c_grupoEmailUpdate = '';

$old_fondo = $_POST['send_campo_old_fondo'];


if (empty($grupoNombreUpdate)) {
    array_push($warning, "No se Actualizara Razon Social");
    //echo '<script language = "javascript"> alert("ingresa nombre completo");</script>';
} else {
    $patron_nombre_us = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ.\s])*$/";
    if (preg_match($patron_nombre_us, $grupoNombreUpdate) == 0) {
        array_push($errores, "Nombre de usuario invalido");
    }
    if (!empty($grupoNombreUpdate)) {
        $grupo_c_nombreUpdate = "nombre = '" . $grupoNombreUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_nombreUpdate;
    }
}

if (empty($grupoNombre_rp_legalUpdate)) {
    array_push($warning, "No se Actualizara Representante Legal");
    //echo '<script language = "javascript"> alert("nel perro ingresa representante");</script>';
} else {
    $patron_replegal = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ.\s])*$/";
    if (preg_match($patron_replegal, $grupoNombre_rp_legalUpdate) == 0) {
        array_push($errores, "Nombre del Rep. legal invalido");
    }
    if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && !empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else {
        $grupo_c_grupoNombre_rp_legalUpdate = ",nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    }
}

if (empty($grupoRfcUpdate)) {
    array_push($warning, "No se Actualizara RFC");
    //echo '<script language = "javascript"> alert("nel perro ingresa RFC");</script>';
} else {
    if (strlen($grupoRfcUpdate) > 13 && strlen($grupoRfcUpdate) < 12) {
        array_push($errores, "RFC invalido");
    } else {
        $patron_rfcreplegal = "/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$/";
        if (preg_match($patron_rfcreplegal, $grupoRfcUpdate) == 0) {
            array_push($errores, "RFC invalido");
        }
    }

    if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && !empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoNombre_rp_legalUpdate = "nombre_rp_legal = '" . $grupoNombre_rp_legalUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoNombre_rp_legalUpdate;
    } else {
        $grupo_c_grupoRfcUpdate = ",rfc_rp_legal = '" . $grupoRfcUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoRfcUpdate;
    }
}

if (empty($grupoCurpUpdate)) {
    array_push($warning, "No se Actualizara CURP");
    //echo '<script language = "javascript"> alert("nel perro ingresa curp");</script>';
} else {
    $patron_curpreplegal = "/^([A-Za-z]{4})([0-9]{6})([A-Za-z]{6})([0-9]{2})$/";
    if (preg_match($patron_curpreplegal, $grupoCurpUpdate) == 0) {
        array_push($errores, "Curp invalido");
        echo '<script language = "javascript"> alert("' . $grupoCurpUpdate . '");</script>';
    }

    if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $grupo_c_grupoCurpUpdate = "curp_rp_legal = '" . $grupoCurpUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoCurpUpdate;
    } else if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && !empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoCurpUpdate = "curp_rp_legal = '" . $grupoCurpUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoCurpUpdate;
    } else {
        $grupo_c_grupoCurpUpdate = ",curp_rp_legal = '" . $grupoCurpUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoCurpUpdate;
    }
}


if (empty($grupoEmailUpdate)) {
    array_push($warning, "No se Actualizara E-mail");
    //echo '<script language = "javascript"> alert("nel perro ingresa email");</script>';
} else {

    $patron_correo = "/\S+@\S+\.\S+/";
    if (preg_match($patron_correo, $grupoEmailUpdate) == 0) {
        array_push($errores, "Email invalido");
    }

    if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && !empty($grupoEmailUpdate)) {
        $grupo_c_grupoEmailUpdate = "email = '" . $grupoEmailUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoEmailUpdate;
    } else {
        $grupo_c_grupoEmailUpdate = ",email = '" . $grupoEmailUpdate . "'";
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . $grupo_c_grupoEmailUpdate;
    }
}



//validar fondo no este vacio y img valida;
if (!empty($_FILES["update_grupo_input_fondo"])) {
    //validar tamaño del archivo
    if ($_FILES['update_grupo_input_fondo']['size'] != 0) {
        //si no esta vacio el campo archivo lo guardamos para utilizarlo mas delante
        $archivo_fondoUpdate = $_FILES['update_grupo_input_fondo'];
        $nombre_archivo = $archivo_fondoUpdate['name'];

        if (!empty($nombre_archivo)) {
            //obtenemos la extencion del archivo
            $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
            //validamos si es un archivo valido
            if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif') {
                //consultamos el grupo para obtener campo de razon social viejo
                $query = mysqli_query($conexion, "select * from gpo_corp where id_gpo_corp = '" . $campoIdentificadorgpo . "'");
                if ($query) {
                    echo '<script language = javascript> console.log("Consulta ejecutada");</script>';
                    while ($row = mysqli_fetch_assoc($query)) {
                        $razonSocial = $row['nombre'];
                    }
                } else {
                    echo '<script language = javascript> console.log("Error en la consulta");</script>';
                }


                $old_rs_SN = noEspacios($razonSocial);

                $root_path = '../../../../../System/Grupos/' . $old_rs_SN . "/";
                if (file_exists($root_path) && empty($grupoNombreUpdate)) {
                    //no se actualiza rs pero si el fondo
                    $root_path = $root_path."/Fondo/";
                    $nuevo_nombre = 'background_'.$old_rs_SN;
                    if(file_exists($root_path.$nuevo_nombre.".".$ext)){
                        unlink($root_path.$nuevo_nombre.".".$ext);
                    }
                    redimencionarImagen($archivo_fondoUpdate, 640, $root_path, $ext, $nuevo_nombre);
                    
                } else if (file_exists($root_path) && !empty($grupoNombreUpdate)) {
                    
                    //se actualiza rs y el fondo
                    $nombre_SE = noEspacios($grupoNombreUpdate);
                    $nuevo_nombre_ruta = '../../../../../System/Grupos/' . $nombre_SE . "/";
                    rename($root_path, $nuevo_nombre_ruta);
                    $root_path = $nuevo_nombre_ruta."/Fondo/";
                    $old_name = 'background_'.$old_rs_SN;
                    $nuevo_nombre = 'background_'.$nombre_SE;
                    if(file_exists($root_path.$old_name.".".$ext)){
                        unlink($root_path.$old_name.".".$ext);
                    }
                    
                    redimencionarImagen($archivo_fondoUpdate, 640, $root_path, $ext, $nuevo_nombre);
                }else{
                    
                }
                /*
                  if(!empty($grupoNombreUpdate)){

                  if(!file_exists($root_path.$nombre_SE."/")){
                  mkdir($root_path."/".$nombre_SE."/");
                  }

                  }else{

                  } */
            } else {
                //si no es valido mandamos un alert y un error 
                echo '<script language = "javascript"> console.log("formato no valido");</script>';
                array_push($errores, "Formato no valido");
            }
        }
    } else {
        
    }


    //echo '<script language = "javascript"> console.log("' . $tamaño_file . '");</script>';
    echo '<script language = "javascript"> console.log("' . $old_fondo . '");</script>';
}
/*
  //validar Foto no este vacio y img valida;
  if (!empty($_FILES["alta_grupo_foto"])) {

  $archivo = $_FILES["alta_grupo_foto"];
  $nombre = $archivo["name"];

  //echo '<script language = "javascript"> alert("' . $nombre . '");</script>';


  if (!empty($nombre)) {
  $file = $_FILES["alta_grupo_foto"];
  $nombre = $file["name"];
  $tipo = $file["type"];
  $ruta_provisional = $file["tmp_name"];
  $size = $file["size"];
  $dimensiones = getimagesize($ruta_provisional);
  $width = $dimensiones[0];
  $height = $dimensiones[1];

  $root_folder = '../../../../../System/Grupos/';
  if (!file_exists($root_folder)) {
  mkdir($root_folder, 0777);
  }

  $RS_SN_ESPACIOS = noEspacios($razonsocial);

  $path_folder = '../../../../../System/Grupos/' . $RS_SN_ESPACIOS;
  if (!file_exists($path_folder)) {
  mkdir($path_folder, 0777);
  }

  $carpeta = $path_folder . "/Foto/";
  if (!file_exists($carpeta)) {
  mkdir($carpeta, 0777);
  }

  $carpeta_es = $path_folder . "/ES/";
  if (!file_exists($carpeta_es)) {
  mkdir($carpeta_es, 0777);
  }

  $path_backgrond_insertDB = '../../System/Grupos/' . $RS_SN_ESPACIOS . '/Foto/';

  $ext = pathinfo($nombre, PATHINFO_EXTENSION);

  //echo '<script language = "javascript"> alert("' . $ext . '");</script>';


  /* $imgname = $username . $tipoimg;
  if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif') {
  echo "Error, el archivo no es una imagen";
  } else {
  $src = $carpeta . $imgname;
  move_uploaded_file($ruta_provisional, $src);
  //echo "<img src='$src'>";
  $avatar = "../../System/avatar/" . $imgname;
  } */
//$foto = $path_backgrond_insertDB . $nombre;
//$path_backgrond = $carpeta . $nombre;
//echo '<script language = "javascript"> alert("' . $foto . '");</script>';
//echo '<script language = "javascript"> alert("' . $path_backgrond . '");</script>';
//move_uploaded_file($ruta_provisional, $path_backgrond);
//} else {
//$avatar = "../../System/avatar/avatar.png";
//}
//}


if (empty($errores)) {
    if (empty($grupoNombreUpdate) && empty($grupoNombre_rp_legalUpdate) && empty($grupoRfcUpdate) && empty($grupoCurpUpdate) && empty($grupoEmailUpdate)) {
        $warning = array();
        array_push($warning, "No se Actualizara El Grupo");
    } else {
        $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . " where id_gpo_corp = '" . $campoIdentificadorgpo . "'";
        $result = mysqli_query($conexion, $sentencia_update_grupo_sql);
        if ($result) {
            if (!empty($warning)) {
                $max = sizeof($warning);
                $string = "";
                if ($max > 0) {
                    $string = "<h4>Campos que no se Actualizaran:</h4><br>";
                    for ($i = 0; $i < $max; $i++) {
                        $string = $string . "<a class=\"msj_gpo_warr fas fa-exclamation-triangle\" id=\"error_datosgenerales\">" . $warning[$i] . "</a><br>";
                    }
                    ?>
                    <script language="javascript">
                        warningAlert('<?php echo $string ?>');
                    </script> <?php
                    $warning = array();
                }
            }
            //echo '<script language = "javascript"> alert("Funciono");</script>';
            ?>
            <script language="javascript">
                aviso("<a class=\"msj_es_ex fas fa-check\" id=\"succes\">Usuario Actualizado</a>");
            </script><?php
        } else {
            echo '<script language = "javascript"> alert("No Funciono");</script>';
            array_push($errores, "Error al ingresar datos de la informacion!");
        }
    }
} else {
    $max = sizeof($errores);
    $string = "";
    if ($max > 0) {
        $string = "<h4>Ocurrieron los siguientes errores:</h4><br>";
        for ($i = 0; $i < $max; $i++) {
            $string = $string . "<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">" . $errores[$i] . "</a><br>";
        }
        ?>
        <script language="javascript">
            erroresalert('<?php echo $string ?>');
        </script>

        <?php
        $errores = array();
    }
}


$max = sizeof($errores);
$string = "";
if ($max > 0) {
    $string = "<h4>Ocurrieron los siguientes errores:</h4><br>";
    $warning = array();
    for ($i = 0; $i < $max; $i++) {
        $string = $string . "<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">" . $errores[$i] . "</a><br>";
    }
    ?>
    <script language="javascript">
        erroresalert('<?php echo $string ?>');
    </script>

    <?php
}


$max = sizeof($warning);
$string = "";
if ($max > 0) {
    $string = "<h4>Campos que no se Actualizaran:</h4><br>";
    for ($i = 0; $i < $max; $i++) {
        $string = $string . "<a class=\"msj_gpo_warr fas fa-exclamation-triangle\" id=\"error_datosgenerales\">" . $warning[$i] . "</a><br>";
    }
    ?>
    <script language="javascript">
        warningAlert('<?php echo $string ?>');
    </script> <?php
}

/* $arrayacadena = implode(",", $warning);
  mostrarWarnings($arrayacadena,"Advertencia"); */

//echo '<script language = "javascript"> alert("'.$sentencia_update_grupo_sql.'");</script>';


/* $sentencia_update_grupo_sql = $sentencia_update_grupo_sql . " where id = '" . $campoIdentificadorgpo . "'";
  $query = mysqli_query($conexion, $sql_script);
  if ($query) {
  echo '<script language = "javascript"> alert("simon");</script>';
  } else {
  echo '<script language = "javascript"> alert("nel perro");</script>';
  }
 */
/* echo '<script language = "javascript"> alert("' . $campoIdentificadorgpo . '");</script>';
  echo '<script language = "javascript"> alert("' . $grupoNombreUpdate . '");</script>';
  echo '<script language = "javascript"> alert("' . $grupoNombre_rp_legalUpdate . '");</script>';
  echo '<script language = "javascript"> alert("' . $grupoRfcUpdate . '");</script>';
  echo '<script language = "javascript"> alert("' . $grupoCurpUpdate . '");</script>';
  echo '<script language = "javascript"> alert("' . $grupoEmailUpdate . '");</script>'; */
?>

