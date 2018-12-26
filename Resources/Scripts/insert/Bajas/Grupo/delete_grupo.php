<?php

session_start();
//importamos los archivos php
require "../../../Conect.php";
require '../../../funcionesPHP/Funciones.php';
require '../../../funcionesPHP/Directorios.php';
require '../../Bajas/Usuarios/Funcion_delete_user.php';

//guardamos la id que llega por post
$delete_for_id = $_POST['id_grupo_selected'];

//consultar el grupo a eliminar para obtener el nombre de la razon social
$consultar_grupo_delete = "Select * from gpo_corp where id_gpo_corp = '" . $delete_for_id . "'";
$query_delete_gpo = mysqli_query($conexion, $consultar_grupo_delete);

//la consulta esta correcta?
$n = mysqli_num_rows($query_delete_gpo);
echo '<script language = "javascript"> alert("Cantidad de filas: ' . $n . '");</script>';

if ($n > 0) {
    //echo '<script language = "javascript"> alert("encontro datos");</script>';
    if ($query_delete_gpo) {
        //echo '<script language = "javascript"> alert("consulta correcta");</script>';
        while ($filasGPO = mysqli_fetch_array($query_delete_gpo)) {
            echo '<script language = "javascript"> alert("entro?¿");</script>';
            $razonSocial = $filasGPO['nombre'];
            $idUsuario = $filasGPO['id_usuario'];
        }
    } else {
        echo '<script language = "javascript"> alert("consulta incorrecta");</script>';
    }
}


//echo '<script language = "javascript"> alert("'.$razonSocial.'");</script>';
//echo '<script language = "javascript"> alert("'.$idUsuario.'");</script>';
$RS_SN_ESP = noEspacios($razonSocial);
echo '<script language = "javascript"> alert("' . $RS_SN_ESP . '");</script>';
echo '<script language = "javascript"> alert("' . $idUsuario . '");</script>';

//consultamos el usuario asignado al grupo
$sql_delete_user = "select * from usuarios where id ='" . $idUsuario . "'";
$resultado_consulta = mysqli_query($conexion, $sql_delete_user);
$numero_usuarios = mysqli_num_rows($resultado_consulta);

echo '<script language = "javascript"> alert("Usuarios encontrados:' . $numero_usuarios . '");</script>';

//creando la ruta destino
crearCarpetasGrupo("Pendiente", "../../../../../System/Grupos/");
$ruta_destino = '../../../../../System/Grupos/Pendiente/ES/';
if (!file_exists($ruta_destino)) {
    mkdir($ruta_destino, 0777);
}

//asignando la ruta actual
$ruta_actual = '../../../../../System/Grupos/' . $RS_SN_ESP . '/ES/';

//copiamos las carpetas
copiar($ruta_actual, $ruta_destino);

//eliminamos las carpetas de la ruta actual
eliminar_directorios($ruta_actual);

//actualizar estaciones de servicio a pendiente
$consultar_estaciones = "SELECT * FROM estacion_servicio WHERE id_gpo = '" . $delete_for_id . "'";
$query_es = mysqli_query($conexion, $consultar_estaciones);

$numrows = mysqli_num_rows($query_es);
if ($numrows > 0) {
    while ($row = mysqli_fetch_assoc($query_es)) {
        $update_es_id_gpo = "UPDATE estacion_servicio SET id_gpo = '1' WHERE id_gpo = '" . $delete_for_id . "'";
    }

    $query_es_update_gpo = mysqli_query($conexion, $update_es_id_gpo);

    if ($query_es_update_gpo) {

        if ($numero_usuarios > 0) {
            echo '<script language = "javascript">console.log("consulta correcta"); </script>';
            borrarUsuario($idUsuario, $conexion);
        }
        /*
          $sql_delete = "delete from gpo_corp where id_gpo_corp = '" . $delete_for_id . "'";
          echo '<script language = "javascript">alertify.success("' . $sql_delete . '");</script>;';
          $query = mysqli_query($conexion, $sql_delete);
          if ($query) {
          echo '<script language = "javascript">alertify.success("eliminaste");</script>;';
          } else {
          echo '<script language = "javascript">alertify.success("no se elimino... ");</script>;';
          } */
    } else {
        echo '<script language = "javascript">alertify.success("No se pudo actualizar grupo de estacion, no se elimina el grupo");</script>;';
    }
} else {
    borrarUsuario($idUsuario, $conexion);
    /*
      $sql_delete = "delete from gpo_corp where id_gpo_corp = '" . $delete_for_id . "'";
      echo '<script language = "javascript">alertify.success("' . $sql_delete . '");</script>;';
      $query = mysqli_query($conexion, $sql_delete);
      if ($query) {
      echo '<script language = "javascript">alertify.success("eliminaste");</script>;';
      } else {
      echo '<script language = "javascript">alertify.success("no se elimino... ");</script>;';
      } */
}

//eliminar directorios basura restante
$ruta_basura = '../../../../../System/Grupos/' . $RS_SN_ESP . '/';
echo '<script language = "javascript"> console.log(' . $ruta_basura . ');</script>';
eliminar_directorios($ruta_basura);
?>