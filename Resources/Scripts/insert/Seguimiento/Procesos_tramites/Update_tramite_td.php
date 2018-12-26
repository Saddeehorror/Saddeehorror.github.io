<?php
require '../../../Conect.php';
require '../../../funcionesPHP/Funciones.php';
require '../../../funcionesPHP/Directorios.php';
$errores=array();
$success=array();
$id_tramites_dependientes=$_POST['id_td'];

$consultar_todo = mysqli_query($conexion, "SELECT * FROM tramites_dependientes "
        . "INNER JOIN periodos_cumplimiento ON periodos_cumplimiento.id_periodo = tramites_dependientes.id_periodo "
        . "INNER JOIN tramites ON periodos_cumplimiento.id_tramite = tramites.id_tramite "
        . "INNER JOIN estacion_servicio ON tramites.id_es = estacion_servicio.id "
        . "INNER JOIN gpo_corp ON estacion_servicio.id_gpo= gpo_corp.id_gpo_corp WHERE tramites_dependientes.id_td='".$id_tramites_dependientes."'");

while ($res_gral = mysqli_fetch_array($consultar_todo)){
    /*TRAMITES DEPENDIENTES*/
    $id_td = $res_gral['id_td'];
    $nombre_tramite_td = $res_gral['nombre_tramite_td'];
    $fecha_cumplimiento= $res_gral['fecha_cumplimiento'];
    $estado_tramite_td = $res_gral['estado_tramite_td'];
    $fecha_ingreso_dependencia_td=$res_gral['fecha_ingreso_dependencia_td'];
    $acuce_de_recibo_td= $res_gral['acuce_de_recibo_td'];
    $eliminado_td=$res_gral['eliminado_td'];
    $periodo=$res_gral['periodo'];
    $id_periodo=$res_gral['id_periodo'];
    
    /*PERIODOS_CUMPLIMIENTO*/
    
    /*TRAMITES*/
    
    /*ESTACION_SERVICIO*/
    $numero_estacion = $res_gral['es'];
    /*GPO_CORP*/
    $nombre_grupo= $res_gral['nombre'];
}

$next_date = date("Y-m-d", strtotime($fecha_cumplimiento."+1 year"));
$actualdate = date("Y-m-d");
$name = noEspacios($nombre_grupo);


if ($fecha_ingreso_dependencia_td == null) {
    $post_fecha_ingreso_dependencia_td = $_POST['input_fecha_ingreso_dependencia_td'];
    $post_acuce_recibo = $_FILES['file_acuce_recibo_td'];
    

    if ($post_fecha_ingreso_dependencia_td == null) {
        array_push($errores, "Fecha de ingreso a la dependencia vacia");
    }else{
        $str_time_fecha_cumplimiento = strtotime($fecha_cumplimiento);
        $str_time_fecha_ingreso = strtotime($post_fecha_ingreso_dependencia_td);
                
        if ($str_time_fecha_ingreso < $str_time_fecha_cumplimiento) {
            array_push($errores, "La fecha de ingreso a la dependencia no puede ser menor a la fecha de cumplimiento");
        }
    }
    if ($post_acuce_recibo['name'] == null){
        array_push($errores, "Acuce de recibo vacio");
    }else{
        if ($post_acuce_recibo['type']!="application/pdf") {
            array_push($errores, "Solo se admiten documentos .pdf");
        }
    }
    if (empty($errores)){
        $carpeta = "../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/";
        $temp_dir=$post_acuce_recibo['tmp_name'];
        $nombre_acuce_recibo="No_".$id_td."_".$nombre_tramite_td."_ACUCE_".$numero_estacion.".pdf";
            if (file_exists($carpeta)) {            
            }else{
                mkdir("../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/", 0777);
                createFile("../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/index.php");  
            }
               
           $query_update_tramite= mysqli_query($conexion,"update tramites_dependientes set estado_tramite_td='Cumplido', fecha_ingreso_dependencia_td ='".$post_fecha_ingreso_dependencia_td."', acuce_de_recibo_td='".$nombre_acuce_recibo."' where id_td='".$id_td."'");
           if ($query_update_tramite) {
               echo "<script type='text/javascript'>alert('entro');</script>";
                                               ?>   
                    <script>
                        reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramites_dependientes.php',"#Alta_tramites_success",'<?php echo $id_td?>');
                    </script>
                    
                    <script>
                        reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Caracteristicas_tramite_dependiente.php',"#Caracteristicas_tramites_seguimiento",'<?php echo $numero_estacion?>');
                    </script>
                <?php  
               
               
            $query_insert_terminos_condicionantes = mysqli_query($conexion, "INSERT INTO tramites_dependientes "
                    . "(nombre_tramite_td,fecha_cumplimiento,estado_tramite_td,fecha_ingreso_sistema_td,periodo,id_periodo) VALUES "
                    . "('tyc','$next_date','En espera de ser ingresado en dependencia','$actualdate','$periodo','$id_periodo')");

               $src = $carpeta.$nombre_acuce_recibo;
                move_uploaded_file($temp_dir, $src);
                array_push($success, "Datos guardados de forma exitosa");             

           }
    }
    
    

}

/* MOSTRAR ERRORES */
if (!empty($errores)) {
    $errores_implode= implode(",", $errores);
    ?>
    <script>
        alert_message('<?php echo $errores_implode?>',"Error","Ocurrieron los siguientes errores");
    </script>
    <?php    
} 

/* MOSTRAR SUCCESS */
if (!empty($success)) {
    $succes_implode = implode(",", $success);
    ?>
    <script>
        alert_message('<?php echo $succes_implode?>',"success","Actualización exitosa")
    </script>
    <?php
}