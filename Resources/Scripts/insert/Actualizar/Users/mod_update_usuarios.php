<?php
//include_once '../../Conect.php';

session_start();


require "../../../Conect.php";
require '../../../funcionesPHP/Funciones.php';

$errores = array();
$warning = array();

$sql_script = "update usuarios set ";

$campoIdentificador = $_POST['send_update_campoid'];

if (!empty($_POST['update_campo_nombre'])) {
    $nombreUpdate = $_POST['update_campo_nombre'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_POST['update_campo_email'])) {
    $emailUpdate = $_POST['update_campo_email'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_POST['update_campo_nickname'])) {
    $nicknameUpdate = $_POST['update_campo_nickname'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_POST['update_campo_nuevopin'])) {
    $nuevoPin = $_POST['update_campo_nuevopin'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_POST['update_campo_confirmarpin'])) {
    $confirmarPin = $_POST['update_campo_confirmarpin'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_POST['update_selected_permisos'])) {
    $permisoUpdate = $_POST['update_selected_permisos'];
} else {
    //array_push($warning, "No se Actualizara el campo");
}

if (!empty($_FILES['update_img_avatar'])) {
    $archivo = $_FILES['update_img_avatar'];
    if ($archivo['size'] == 0) {
        array_push($warning, "No se actualiza el Avatar");
    }
}


$avatarUpdate = '';
$noAvatarUpdate = '';
$oldcampoNombre = $_POST['send_update_camponombre'];
$old_avatar_campo = $_POST['send_old_avatar'];
//$old_pin = $POST['send_old_pin'];

$actualizar_permiso = '';
$actualizar_Pin = '';


$columna_nombreUpdate = '';
$columna_email = '';
$columna_nickname = '';
$columa_pin = '';
$columna_permisoUpdate = '';
$columna_avatarUpdate = '';


//validacion del nombre
if (empty($nombreUpdate)) {
    array_push($warning, "No se actualiza el Nombre");
} else {
    $patron_nombre_us = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s])*$/";
    if (preg_match($patron_nombre_us, $nombreUpdate) == 0) {
        array_push($errores, "Nombre de usuario invalido");
    }
    if (!empty($nombreUpdate)) {
        $columna_nombreUpdate = "nombre = '" . $nombreUpdate . "'";
        $sql_script = $sql_script . $columna_nombreUpdate;
    }
}

if (empty($emailUpdate)) {
    array_push($warning, "No se actualiza el E-mail");
} else {
    $query_consulta = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='" . $emailUpdate . "'");
    $numrows = mysqli_num_rows($query_consulta);
    if ($numrows != 0) {
        array_push($errores, "El correo ya se encuentra registrado");
    } else {
        $patron_correo = "/\S+@\S+\.\S+/";
        if (preg_match($patron_correo, $emailUpdate) == 0) {
            array_push($errores, "Email invalido");
        }

        if (empty($nombreUpdate) && !empty($emailUpdate) && empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && empty($nicknameUpdate) && !empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && empty($nicknameUpdate) && !empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else if (empty($nombreUpdate) && !empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columna_email = "email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        } else {
            $columna_email = ",email = '" . $emailUpdate . "'";
            $sql_script = $sql_script . $columna_email;
        }
    }
}

if (empty($nicknameUpdate)) {
    array_push($warning, "No se actualiza el Nickname");
} else {
    $patron_username = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s])*$/";
    if (preg_match($patron_username, $nicknameUpdate) == 0) {
        array_push($errores, "Nombre de usuario invalido");
    }
    if (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && !empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] != 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } elseif (empty($nombreUpdate) && empty($emailUpdate) && !empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && ($archivo['size'] != 0)) {
        $columna_nickname = "logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    } else {
        $columna_nickname = ",logname = '" . $nicknameUpdate . "'";
        $sql_script = $sql_script . $columna_nickname;
    }
}


if (!empty($nuevoPin) && empty($confirmarPin)) {
    //echo '<script language = "javascript"> alert("campo confirmar vacio");</script>';
} else if (empty($nuevoPin) && !empty($confirmarPin)) {
    //echo '<script language = "javascript"> alert("campo nuevo vacio");</script>';
} else if (empty($nuevoPin) && empty($confirmarPin)) {
    //echo '<script language = "javascript"> alert("campos vacios");</script>';
    array_push($warning, "No se actualiza el Pin");
} else {
    $patron_password = "/^[0-9]{4}$/";
    if ($nuevoPin == $confirmarPin) {
        $actualizar_Pin = $nuevoPin;
        if (preg_match($patron_password, $actualizar_Pin) == 0) {
            array_push($errores, "Pin invalido");
        }
        if (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && !empty($actualizar_Pin) && empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columa_pin = "pass = '" . $actualizar_Pin . "'";
            $sql_script = $sql_script . $columa_pin;
        } elseif (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && !empty($actualizar_Pin) && !empty($permisoUpdate) && ($archivo['size'] == 0)) {
            $columa_pin = "pass = '" . $actualizar_Pin . "'";
            $sql_script = $sql_script . $columa_pin;
        } elseif (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && !empty($actualizar_Pin) && !empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columa_pin = "pass = '" . $actualizar_Pin . "'";
            $sql_script = $sql_script . $columa_pin;
        } elseif (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && !empty($actualizar_Pin) && empty($permisoUpdate) && ($archivo['size'] != 0)) {
            $columa_pin = "pass = '" . $actualizar_Pin . "'";
            $sql_script = $sql_script . $columa_pin;
        } else {
            $columa_pin = ",pass = '" . $actualizar_Pin . "'";
            $sql_script = $sql_script . $columa_pin;
        }
    } else {
        echo '<script language = "javascript"> alert("campos no coinciden");</script>';
    }
}


if (empty($permisoUpdate)) {
    //echo '<script language = "javascript"> alert("Permisos Vacio");</script>';
    array_push($warning, "No se actualiza el Permiso de cuenta");
} else {
    switch ($permisoUpdate) {
        case "Administrador":
            $actualizar_permiso = 2;
            break;
        case "Usuario":
            $actualizar_permiso = 1;
            break;
        case "Cliente":
            $actualizar_permiso = 2;
            break;
    }
    if (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && empty($actualizar_Pin) & !empty($permisoUpdate) && ($archivo['size'] == 0)) {
        $columna_permisoUpdate = "gpo_id = '" . $actualizar_permiso . "'";
        $sql_script = $sql_script . $columna_permisoUpdate;
    } else if (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && empty($actualizar_Pin) & !empty($permisoUpdate) && ($archivo['size'] != 0)) {
        $columna_permisoUpdate = "gpo_id = '" . $actualizar_permiso . "'";
        $sql_script = $sql_script . $columna_permisoUpdate;
    } else {
        $columna_permisoUpdate = ",gpo_id = '" . $actualizar_permiso . "'";
        $sql_script = $sql_script . $columna_permisoUpdate;
    }
}

//validar si el archivo no esta vacio
if (!empty($_FILES["update_img_avatar"])) {
    $archivo = $_FILES["update_img_avatar"];
    $nombre_archivo = $archivo["name"];
    
    //validamos el nombre del archivo no esta vacio
    if (!empty($nombre_archivo)) {
        
        //obtenemos la extencion del archivo
        $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
        
        //validamos si es un archivo valido
        if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif') {
            
            $nuevo_name = '';
            if (empty($nombreUpdate)) {
                $nuevo_name = $oldcampoNombre;
            } else {
                $nuevo_name = $nombreUpdate;
            }
            
            //carpeta raiz donde moveremos el archivo
            $carpeta = "../../../../../System/avatar/";
            
            //redimencionamos el archivo y se mueve a nueva ruta
            redimencionarImagen($archivo, 150, $carpeta, $ext, $nuevo_name);

            $avatarUpdate = "../../System/avatar/" . $nuevo_name . '.' . $ext;
            //echo '<script language = "javascript"> alert("' . $avatarUpdate . '");</script>';

            if (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && empty($actualizar_Pin) && empty($permisoUpdate) && !empty($avatarUpdate)) {
                $columna_avatarUpdate = "avatar = '" . $avatarUpdate . "'";
                $sql_script = $sql_script . $columna_avatarUpdate;
            } else {
                $columna_avatarUpdate = ",avatar = '" . $avatarUpdate . "'";
                $sql_script = $sql_script . $columna_avatarUpdate;
            }
        } else {
            echo '<script language = "javascript"> alert("Imagen no valida");</script>';
            array_push($errores, "Imagen no valida");
        }
    } else {
        $avatarUpdate = $old_avatar_campo;
    }
}

if (empty($errores)) {

    if (empty($nombreUpdate) && empty($emailUpdate) && empty($nicknameUpdate) && empty($nuevoPin) && empty($permisoUpdate) && $archivo['size'] == 0) {
        $warning = array();
        array_push($warning, "No se Actualizara Usuario");
    } else {
        $sql_script = $sql_script . " where id = '" . $campoIdentificador . "'";
        //echo '<script language = "javascript"> alert("' . $sql_script . '");</script>';
        $query = mysqli_query($conexion, $sql_script);
        if ($query) {
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
    //mostrarErrores($errores);
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

//mostrarErrores($errores);
?>