<?php

                
                
                
function send_email($razonsocial,$emailreplegal,$password){
    for($i=0;$i<strlen($emailreplegal);$i++){
        if ($emailreplegal[$i]=="@") {
            if ($emailreplegal[$i+1]=="h" || $emailreplegal[$i+1]=="H") {
                 echo '<script language="javascript">alert("Es hotmail");</script>';
            }else if ($emailreplegal[$i+1]=="G" || $emailreplegal[$i+1]=="g") {
                echo '<script language="javascript">alert("Es Gmail");</script>';
            }  
        }
    }
    
    
                $mail = "ambientalistascale@hotmail.com";
                $to = "luisaguilar_92@hotmail.com";
                $subject = "Notificación de Alta en Sistema Cale";
                $header = 'From: ' . $mail . " \r\n";
                $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
                $header .= "Mime-Version: 1.0 \r\n";
                $header .= "Content-type:text/html;charset=UTF-8";

                $message = " 
<html>
<head>
<title>HTML</title>
</head>
<body style='background:#eee ;width 100%; text-align: center; padding:10px'>
<div>
<h2>LA RAZON SOCIAL: </h2>
<h2 style='color: #ff0066'>" . $razonsocial . "</h2>
<h2 style='color:#33cc00'> SE REGISTRO EXITOSAMENTE.</h2>
</div>

<div style='width: 100% ;background:#ffffff; Padding-top:10px; Padding-bottom:10px'>
<h3>Datos Para inciar sesion:</h3>
<h4>Nombre de usuario: </h4>
<label style='width: 35%'>" . $emailreplegal . "</label>
<h4>PIN: </h4>
<label style='width: 35%'>" . $password . "</label>
<h4>Inicie sesion en: </h4>
<h3><a href='https://ambientalistascale.com/'>https://ambientalistascale.com/</a><h3>

<div style='width: 80%; border-top: 3px solid black; margin-left:10%' >
<img width='10%' style='display:block; margin-left:45%' src='http://www.egadiescursioni.it/wp-content/uploads/2017/02/Whatsapp-logo-vector-1024x727-3.png'>
<h3>8331924627</h3>
</div>
</div>

<label style='background:#eee ;width 100%; text-align: center'><small>Copyright© 2018 Ambientalistas Cale S.A. de C.V.</small></label>
<label style='background:#eee ;width 100%; text-align: center'><small>La informacion contenida en este correo electronico es confidencial y para uso exclusivo de la(s) personas 
a quien(es) va dirigida. Esta prohibido difundir la informacion aqui contenida, si la ha recibido por error le suplicamos nofiticar
inmediatamente al remitente.<br>
Ambientalistas Cale S.A. de C.V. no garantizan la integridad del presente correo electronico o archivos adjuntos, ni que el mismo este libre de interferencias o virus
por lo que su lectura, recepción y retransmision sera responsabilidad de quien lo haga.</small></label>

</body>
</html>";

                if (mail($to, $subject, $message, $header)) {
                    return true;
                } else {
                    return false;
                }  
}                