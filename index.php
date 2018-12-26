<?php
session_start();
require_once 'Resources/Scripts/Conect.php';
if (isset($_SESSION["session_username"])) {
    header("Location: Resources/Scripts/Home.php");
}
if (isset($_POST["login"])) {
    if (empty($_POST['username'])) {
        $username = "";
    }
    if (empty($_POST['password']) && !empty($_POST['username'])) {
        $username = $_POST['username'];
        
    }
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE logname='" . $username . "' AND pass='" . $password . "'");
        $numrows = mysqli_num_rows($query);
        if ($numrows != 0) {
            while ($row = mysqli_fetch_assoc($query)) {
                $dbusername = $row['logname'];
                $dbpassword = $row['pass'];
                $avatarimg = $row['avatar'];
                $permisos = $row['gpo_id'];
                $id_usuario = $row['id'];
                $name = $row['nombre'];
                $email = $row['email'];
            }
            if ($password == $dbpassword) {
include './Resources/Scripts/insert/Alarmas/Alarms.php';

                $_SESSION['session_username'] = $dbusername;
                $_SESSION['session_avatar'] = $avatarimg;
                $_SESSION['session_group'] = $permisos;
                $_SESSION['session_id'] = $id_usuario;
                $_SESSION['session_name'] = $name;
                $_SESSION['session_email'] = $email;
                $fecha = getdate();
                $myfecha = $fecha['year'] . '/' . $fecha['mon'] . '/' . $fecha['mday'];
                $hrmx = $fecha['hours'] - 7;
                $hora = $hrmx . ':' . $fecha['minutes'] . ':' . $fecha['seconds'];
                $sql = "INSERT INTO bitacora(fecha, hora, act_realizada, id_user) VALUES('$myfecha','$hora','Inicio de sesion','$id_usuario')";
                $resultado = mysqli_query($conexion, $sql);
                /* Redirect browser */
                header("Location: Resources/Scripts/Home.php");
                
                //include './Resources/Scripts/insert/Alarmas/Alarms.php';
                
            } else {
                $message = "Nombre de usuario ó contraseña invalida!";
            }
        } else {
            $message = "Nombre de usuario ó contraseña invalida!";
        }
    } else {

        $message = "Todos los campos son requeridos!";
    }
}
//include("Resources/Scripts/header.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sistema Cale</title>
        <!--declaracion del manifest-->
        <link rel="manifest" href="./manifest.json">
        <meta name="theme-color" content="#4CAF50">
        <!--deteccion de icono de la app-->
        <link rel="icon" type="image/png" sizes="72x72" href="Resources/img/icons/icon-72x72.png">
        <link rel="icon" type="image/png" sizes="96x96" href="Resources/img/icons/icon-96x96.png">
        <link rel="icon" type="image/png" sizes="128x128" href="Resources/img/icons/icon-128x128.png">
        <link rel="icon" type="image/png" sizes="144x144" href="Resources/img/icons/icon-144x144.png">
        <link rel="icon" type="image/png" sizes="152x152" href="Resources/img/icons/icon-152x152.png">
        <link rel="icon" type="image/png" sizes="192x192" href="Resources/img/icons/icon-192x192.png">
        <link rel="icon" type="image/png" sizes="348x348" href="Resources/img/icons/icon-384x384.png">
        <link rel="icon" type="image/png" sizes="512x512" href="Resources/img/icons/icon-512x512.png">
        <!--metatags IOS-->
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-title" content="PWA Demo">
        <link rel="apple-touch-icon" sizes="192x192" href="Resources/img/icons/icon-192x192.png">
        <!--metatags Windows-->
        <meta name="msapplication-TileColor" content="#4CAF50">
        <meta name="msapllication-TileImage" content="Resources/img/icons/icon-192x192.png">
        <!--metatags otros opengrafs-->
        <meta property="og:title" content="Ambientalistas Cale">
        <meta property="og:locale" content="es_MX">
        <meta property="og:type" content="website">
        <meta property="og:image" content="Resources/img/icons/icon-192x192.png">
        <meta property="og:site_name" content="Ambientalistas Cale S.A. de C.V.">
        <meta property="og:url" content="https://www.ambientalistascale.com">
        <!--Import Google Icon Font-->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <!--Import materialize.css-->
        <!--Import CSS y otros-->
        <link rel="SHORTCUT ICON" href="icon.ico">
        <link href="Resources/Stylesheet/Style_normal.css" media="screen" rel="stylesheet">
        <link href="Resources/Stylesheet/Style_responsive.css" media="screen" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    </head>
    
    <body class="index">
        <div class="content">
            <div class="title_index">
                <h1>Bienvenido</h1>    
            </div>
            <div class="cale_logo">
                <img src="Resources/img/logo_cale.png" alt="Ambientalistas Cale">
            </div>
            <form name="loginform" id="loginform" class="loginform" action="" method="POST">
                <p class="parrafo">
                    <span class="fas fa-user"></span>
                    <input type="text" name="username" id="username" class="login_inputs" placeholder="Usuario" value="<?php if (isset($_POST["login"])) echo $username; ?>" size="20" />
                </p>
                <p class="parrafo">
                    <span class="fas fa-lock"></span>
                    <input type="password" name="password" id="password" class="login_inputs" placeholder="Contraseña" value="" size="20" />
                </p>
                <p class="submit">
                    <input type="submit" name="login" class="login_button" value="Entrar" />
                </p>    
            </form>
        </div>

        <footer class="footerindex">
            <?php
            if (empty($message)) {
                echo "<a class=\"footer\" id=\"contenido\">AMBIENTALISTAS CALE S.A. DE C.V</a>";
            } else {
                echo "<a class=\"error\" id=\"contenido\">" . $message . "</a>";
            }
            ?>
        </footer>
        <script>

        </script>
        <script src="Resources/Js/Registro_SW.js"></script>
    </body>   
</html>

