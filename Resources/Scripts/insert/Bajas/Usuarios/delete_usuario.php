<?php

session_start();

require "../../../Conect.php";
require '../../Bajas/Usuarios/Funcion_delete_user.php';

$delete_for_id = $_POST['id_grupo_selected'];

borrarUsuario($delete_for_id, $conexion);

?>