<?php

function consultar_id_gpo_corp($id_usuario,$conexion){
    
    $query_consultar_gpo_corp= mysqli_query($conexion, "Select * from gpo_corp where id_usuario ='".$id_usuario."'");
    while ($row_consultar_gpo_corp= mysqli_fetch_array($query_consultar_gpo_corp,MYSQLI_ASSOC)){
        $var_id_gpo_corp=$row_consultar_gpo_corp['id_gpo_corp'];     
    }
    return $var_id_gpo_corp;
    
}