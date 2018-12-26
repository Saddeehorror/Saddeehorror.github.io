<?php 
session_start();
require 'Conect.php';
    $fecha = getdate();
    $myfecha=$fecha['year'].'/'.$fecha['mon'].'/'.$fecha['mday'];
    $hrmx = $fecha['hours']-7;
    $hora = $hrmx.':'.$fecha['minutes'].':'.$fecha['seconds'];
    $id_usuario=$_SESSION['session_id'];
    $sql="INSERT INTO bitacora(fecha, hora, act_realizada, id_user) VALUES('$myfecha','$hora','Fin de Sesion','$id_usuario')";
    $resultado=mysqli_query($conexion,$sql);
unset($_SESSION['session_username']);
session_destroy();
header("location:../../index.php");
?>
