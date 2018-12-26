<?php
session_start();
require '../../../Conect.php';
//require '../../../funcionesPHP/MakeFile.php';
require '../../../funcionesPHP/Funciones.php';
require '../../../funcionesPHP/Directorios.php';
include './Funciones_grupo.php';
$errores = array();

//variables para el registro del grupro
$razonsocial = $_POST['razon_social'];
$replegal = $_POST['rep_legal'];
$rfcreplegal = $_POST['rfc_replegal'];
$curpreplegal = $_POST['curp_replegal'];
$emailreplegal = $_POST['email_repegal'];

//ruta de la carpeta destino
$root_folder = '../../../../../System/Grupos/';
if(!file_exists($root_folder)){
    mkdir($root_folder,0777);
}
createFile($root_folder."index.php");

//variables para fondosidebar y fotocardview
$fondo = null;
$foto = null;

//validar razonsocial------------------------------------------------------------------------------------------------------------------------
if (empty($razonsocial)) {
    array_push($errores, "Nombre de razon social vacio");
}

//crea la razon social sin espacios para crear carpeta
$RazonSocial_SESPACIOS = noEspacios($razonsocial);

//rep legal..............................................................................................................................
if (empty($replegal)) {
    array_push($errores, "Nombre Rep.Legal vacio");
} else {
    $patron_replegal = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ.\s])*$/";
    if (preg_match($patron_replegal, $replegal) == 0) {
        array_push($errores, "Nombre del Rep. legal invalido");
    }
}

//rfc replegal.........................................................................................................................
if (empty($rfcreplegal)) {
    $rfcreplegal = "Pendiente";
} else {
    if (strlen($rfcreplegal) > 13 && strlen($rfcreplegal) < 12) {
        array_push($errores, "RFC invalido");
    } else {
        $patron_rfcreplegal = "/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$/";
        if (preg_match($patron_rfcreplegal, $rfcreplegal) == 0) {
            array_push($errores, "RFC invalido");
        }
    }
}

//curp replegal........................................................................................................................
if (empty($curpreplegal)) {
    $curpreplegal = "Pendiente";
} else {
    $patron_curpreplegal = "/^([A-Za-z]{4})([0-9]{6})([A-Za-z]{6})([0-9]{2})$/";
    if (preg_match($patron_curpreplegal, $curpreplegal) == 0) {
        array_push($errores, "Curp invalido");
    }
}

//validar email....................................................................................................................................................................
if (empty($emailreplegal)) {
    array_push($errores, "Email vacio");
} else {
    $patron_correo = "/\S+@\S+\.\S+/";
    if (preg_match($patron_correo, $emailreplegal) == 0) {
        array_push($errores, "Email invalido");
    }
}

//validar fondosidebar no este vacio......................................................................................
if ($_FILES['alta_grupo_fondo']['size'] != 0) {

    $archivo = $_FILES["alta_grupo_fondo"];
    $nombre = $archivo["name"];

    //crear directorios de almacenamiento
    $folders = crearCarpetasGrupo($RazonSocial_SESPACIOS, $root_folder);
    

    //new Name
    $nuevo_nombre = 'background_' . $RazonSocial_SESPACIOS;

    //obtenemos la extencion del archivo
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    //validamos extencion
    if ($ext == 'png' || $ext == 'gif' || $ext == 'jpg') {
        redimencionarImagen($archivo, 427, $folders[0], $ext, $nuevo_nombre);

        //direccion a insertar en la base de datos
        $path_backgrond_insertDB = '../../System/Grupos/' . $RazonSocial_SESPACIOS . '/Fondo/';

        $fondo = $path_backgrond_insertDB . $nuevo_nombre . '.' . $ext;
    } else {
        echo '<script language = javascript> console.log("Formato no valido");</script>';
        array_push($errores, "Formato no valido");
    }
} else {
    crearCarpetasGrupo($RazonSocial_SESPACIOS, $root_folder);
    $ruta_fondoDefault = '../../../../../System/Grupos/Pendiente/Fondo/';
    if (!file_exists($ruta_fondoDefault)) {
        mkdir($ruta_fondoDefault);
    }
    $fondo = '../../System/Grupos/Pendiente/Fondo/background_default.png';
}

//validar Fotocardview no este vacio y img valida................................................................................
if ($_FILES['alta_grupo_foto']['size'] != 0) {

    $archivo = $_FILES["alta_grupo_foto"];
    $nombre = $archivo["name"];

    //creando directorios de almacenamiento
    $folder = crearCarpetasGrupo($RazonSocial_SESPACIOS, $root_folder);

    //new Name
    $nuevo_nombre = 'card_img_' . $RazonSocial_SESPACIOS;

    //obtenemos la extencion del archivo
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);

    //validamos extencion
    if ($ext == 'png' || $ext == 'gif' || $ext == 'jpg') {
        redimencionarImagen($archivo, 653, $folder[1], $ext, $nuevo_nombre);

        //direccion a insertar en la base de datos
        $path_backgrond_insertDB = '../../System/Grupos/' . $RazonSocial_SESPACIOS . '/Foto/';

        $foto = $path_backgrond_insertDB . $nuevo_nombre . '.' . $ext;
    } else {
        echo '<script language = javascript> console.log("Formato no valido");</script>';
        array_push($errores, "Formato no valido");
    }
} else {
    crearCarpetasGrupo($RazonSocial_SESPACIOS, $root_folder);
    $ruta_fondoDefault = '../../../../../System/Grupos/Pendiente/Foto/';
    if (!file_exists($ruta_fondoDefault)) {
        mkdir($ruta_fondoDefault);
    }
    $foto = '../../System/Grupos/Pendiente/Foto/card_img_default.png';
}

//si no hay errores..................................................................................................................
if (empty($errores)) {
    $query = mysqli_query($conexion, "SELECT * FROM gpo_corp WHERE nombre='" . $razonsocial . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        array_push($errores, "Razon social ya registrada");
    } else {
        //Carácteres para la contraseña
        $str = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890@*/";
        $password = "";
        //Reconstruimos la contraseña segun la longitud que se quiera
        for ($i = 0; $i < 5; $i++) {
            //obtenemos un caracter aleatorio escogido de la cadena de caracteres
            $password .= substr($str, rand(0, 65), 1);
        }
        $sql_add_user = mysqli_query($conexion, "INSERT INTO usuarios (nombre,email,logname,pass,gpo_id,avatar) VALUES ('$replegal','$emailreplegal','$emailreplegal','$password','3','../../System/avatar/avatar.png')");
        if ($sql_add_user) {
            echo '<script language="javascript">alert("USUARIO CREADO (LINEA 210 re_grupo.php)");</script>';
            $sql_select_user = mysqli_query($conexion, "SELECT * FROM usuarios where email= '" . $emailreplegal . "'");
            while ($row_select_user = mysqli_fetch_array($sql_select_user, MYSQLI_ASSOC)) {
                $var_id_user = $row_select_user['id'];
            }
            $sql_add_group = mysqli_query($conexion, "INSERT INTO gpo_corp (nombre, nombre_rp_legal, rfc_rp_legal, curp_rp_legal,email,fondo,foto,id_usuario) VALUES('$razonsocial','$replegal','$rfcreplegal','$curpreplegal','$emailreplegal','$fondo','$foto','$var_id_user')");
            if ($sql_add_group) {

                if (send_email($razonsocial, $emailreplegal, $password)) {
                    ?>
                    <script language="javascript">
                        aviso("<a class=\"msj_es_ex fas fa-check\" id=\"succes\">Razon social registrada</a>");
                    </script>     <?php
                } else {
                    array_push($errores, "No se envio el correo");
                }
            }
        }
    }
}

//mostrar errores.................................................................................................................
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
    </script> <?php
}

