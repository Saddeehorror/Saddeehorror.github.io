<?php # Script Conect - mysqli_connect.php

// Definir la información de acceso a la base de datos
DEFINE ('DB_USER', 'root');//nombre de usuario
DEFINE ('DB_PASS', '');//contraseña
DEFINE ('DB_HOST', 'localhost');//host
DEFINE ('DB_NAME', 'cale_db');//nombre de la base de datos

// hacer la conexión:
$conexion = mysqli_connect (DB_HOST, DB_USER, DB_PASS, DB_NAME) 
OR die ('No se puede conectar a MySQL: ' . mysqli_connect_error() );

// definir la codificación
mysqli_set_charset($conexion, 'utf8');