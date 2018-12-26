<?php
//funcion para eliminar todos los directorios y sub directorios
session_start();

require '../../../Conect.php';
require '../../../funcionesPHP/Funciones.php';

$id_es_delete = $_POST['id_grupo_selected'];

//obtener el numero de estacion por una consulta
$query_es_consulta = "select * from estacion_servicio where id = '" . $id_es_delete . "'";
$result = mysqli_query($conexion, $query_es_consulta);

while ($row = mysqli_fetch_array($result)) {
    $numero_estacion = $row['es'];
    $id_de_grupo = $row['id_gpo'];
}

//obtener el nombre del grupo
$consultarGrupo = "select * from gpo_corp where id_gpo_corp = '".$id_de_grupo."'";
$resultado_consulta_grupo = mysqli_query($conexion, $consultarGrupo);
while ($row = mysqli_fetch_array($resultado_consulta_grupo, MYSQLI_ASSOC)) {
    $razonSocialGrupo = $row['nombre'];
}

//razon social del grupo sin espacios
$RS_SN_ESPACIO = noEspacios($razonSocialGrupo);

//direccion de la carpetas de la estacion
$root_folder = '../../../../../System/Grupos/'.$RS_SN_ESPACIO.'/ES/E.S.' . $numero_estacion . '/';
//$path_dir_es = '../../../../../System/';

//echo '<script language = "javascript"> alert("'.$root_folder.'");</script>';

//validamos si existe el directorio
if (file_exists($root_folder)) {
    if (eliminar_directorios($root_folder)) {
        echo '<script language = "javascript"> alert("Se eliminaron las carpetas");</script>';
    } else {
        echo '<script language = "javascript"> alert("No se eliminaron las carpetas");</script>';
    }
} else {
    echo '<script language = "javascript"> alert("No Existe la carpeta");</script>';
}

$query_sql_delete_es = "delete from estacion_servicio where id = '" . $id_es_delete . "'";
$result_es = mysqli_query($conexion, $query_sql_delete_es);

if ($result_es) {
    echo '<script language = "javascript">alertify.success("Eliminaste la estacion con numero '.$numero_estacion.'");</script>';
} else {
    echo '<script language = "javascript"> alert("No se elimino");</script>';
}

?>