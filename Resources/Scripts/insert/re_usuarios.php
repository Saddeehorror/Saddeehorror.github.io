<?php
session_start();
require '../Conect.php';
require '../funcionesPHP/Funciones.php';
$errores = array();
$nombrecompleto = $_POST['nombre'];
$email = $_POST['email'];
$username = $_POST['user'];
$password = $_POST['pass'];
$administrador = $_POST['admin'];
$avatar = null;

//$avatar=$_POST['AVATAR'];
//NOMBRE-------------------------------------------------------------------------------------------------------------------------------------------------------
if (empty($nombrecompleto)) {
    array_push($errores, "Nombre del usuario vacio");
} else {
    $patron_nombre_us = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s])*$/";
    if (preg_match($patron_nombre_us, $nombrecompleto) == 0) {
        array_push($errores, "Nombre de usuario invalido");
    }
}
//email
if (empty($email)) {
    array_push($errores, "Correo vacio");
} else {
    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE email='" . $email . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        array_push($errores, "El correo ya se encuentra registrado");
    }
    $patron_correo = "/\S+@\S+\.\S+/";
    if (preg_match($patron_correo, $email) == 0) {
        array_push($errores, "Email invalido");
    }
}
//username
if (empty($username)) {
    array_push($errores, "Nombre de usuario vacio");
} else {
    $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE logname='" . $username . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows != 0) {
        array_push($errores, "El usuario ya se encuentra registrado");
    }
    $patron_username = "/^([A-Za-zñÑáéíóúÁÉÍÓÚüÜ\s])*$/";
    if (preg_match($patron_username, $username) == 0) {
        array_push($errores, "Nombre de usuario invalido");
    }
}
//password
if (empty($password)) {
    array_push($errores, "Pin vacio");
} else {
    $patron_password = "/^[0-9]{4}$/";
    if (preg_match($patron_password, $password) == 0) {
        array_push($errores, "Pin invalido");
    }
}


//tipo de usuario
if($administrador == 0){
    array_push($errores, "Seleccione el tipo de usuario");
}

//avatar
if($_FILES['file']['size']!=0){
    $file = $_FILES["file"];
    $nombre_archivo = $file["name"];
    $raiz = '../../../System/avatar/';
    if(!file_exists($raiz)){
        mkdir($raiz,0777);
    }
    $ext = pathinfo($nombre_archivo, PATHINFO_EXTENSION);
    if($ext == 'png' || $ext == 'gif' || $ext == 'jpg'){
        redimencionarImagen($file, 150, $raiz, $ext, $username);
        $avatar = "../../System/avatar/" . $username . '.' . $ext;
    }else{
        echo '<script language = javascript> console.log("Formato no valido");</script>';
        array_push($errores, "Formato no valido");
    }
}else{
    $avatar = "../../System/avatar/avatar.png";
}

if (empty($errores)) {
//insertar en la base de datos
    $sql = "INSERT INTO usuarios (nombre,email,logname,pass,gpo_id,avatar) VALUES ('$nombrecompleto','$email','$username','$password','$administrador','$avatar')";
    $result = mysqli_query($conexion, $sql);
    if ($result) {
        ?>
        <script language="javascript">
            aviso("<a class=\"msj_es_ex fas fa-check\" id=\"succes\">Usuario Registrado</a>");
        </script><?php
    } else {
        array_push($errores, "Error al ingresar datos de la informacion!");
    }
} else {
    
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