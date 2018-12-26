<?php

function borrarUsuario($idUsuario, $conectarDB) {
    $consultar_nombre_usuario = "select * from usuarios where id = '" . $idUsuario . "'";
    $result_query_users = mysqli_query($conectarDB, $consultar_nombre_usuario);

    while ($row = mysqli_fetch_array($result_query_users)) {
        $nombre_eliminado = $row['nombre'];
    }
//echo '<script language = "javascript"> alert("'.$nombre_eliminado.'");</script>';
    $consultar_bitacora = "SELECT * FROM bitacora WHERE id_user = '" . $idUsuario . "'";
    $query_bitacora = mysqli_query($conectarDB, $consultar_bitacora);

    $filas = mysqli_num_rows($query_bitacora);

    if ($filas != 0) {
        $delete_sql_bitacora = "delete from bitacora WHERE id_user = '" . $idUsuario . "'";
        $delete_bitacora = mysqli_query($conectarDB, $delete_sql_bitacora);
        if ($delete_bitacora) {
            
        } else {
            
        }
    } else {
        echo '<script language = "javascript">alertify.success("El usuario no tiene registro en bitacora");</script>';
    }

    if ($query_bitacora) {
        $sql_delete = "delete from usuarios where id = '" . $idUsuario . "'";
        //echo '<script language = "javascript">alertify.success("' . $sql_delete . '");</script>';
        $query = mysqli_query($conectarDB, $sql_delete);


        if ($query) {
            echo '<script language = "javascript">alertify.success("Eliminaste el usuario' . $nombre_eliminado . '");</script>';
            //llamar funcion js 
        } else {
            echo '<script language = "javascript">alertify.success("no se elimino el usuario.... ' . $nombre_eliminado . '");</script>';
        }
    } else {
        echo '<script language = "javascript">alertify.success("error en scriptSQL bitacora... ");</script>';
    }
}

?>