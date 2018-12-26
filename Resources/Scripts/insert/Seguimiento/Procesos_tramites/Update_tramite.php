<?php
require '../../../Conect.php';
require '../../../funcionesPHP/Funciones.php';
require '../../../funcionesPHP/Directorios.php';
$errores=array();
$success=array();
date_default_timezone_set("America/Mexico_City");
$fecha_actual=date("d/m/Y-H:i:s");
$numero_tramite=$_POST['numero_tramite'];
$consultar_tramite = mysqli_query($conexion, "SELECT * FROM tramites inner join estacion_servicio on tramites.id_es=estacion_servicio.id where tramites.id_tramite='" . $numero_tramite . "'");
while ($resultado = mysqli_fetch_array($consultar_tramite)) {
    $num_tramite = $resultado['id_tramite'];
    $tipo_tramite = $resultado['tipo_tramite'];
    $nombre_tramite = $resultado['nombre_tramite'];
    $estatus_tramite = $resultado['estado_tramite'];
    $fecha_Alta_sistema = $resultado['fecha_ingreso_sistema'];
    $fecha_ingreso_dependencia = $resultado['fecha_ingreso_asea'];
    $bitacora = $resultado['num_bitacora'];
    $acuce_recibo = $resultado['acuce_de_recibo'];
    $fecha_boletin = $resultado['fecha_aparicion_boletin'];
    $fecha_recepcion = $resultado['fecha_recepcion_notificacion'];
    $num_oficio = $resultado['num_oficio'];
    $respuesta_tramite = $resultado['respuesta'];
    $fecha_entrega = $resultado['fecha_entrega'];
    $relacion_estacion = $resultado['id_es'];
    $numero_estacion = $resultado['es'];
    $relacion_gpo = $resultado['id_gpo'];
}
$query_grupo = mysqli_query($conexion, "SELECT * FROM gpo_corp where id_gpo_corp='" . $relacion_gpo . "'");
while ($result_query_grupo = mysqli_fetch_assoc($query_grupo)) {
    $nombre_grupo = $result_query_grupo['nombre'];
}
$name = noEspacios($nombre_grupo);

$query_informacion_alcance = mysqli_query($conexion, "Select * from informacion_alcance_asea where id_tramite='".$num_tramite."'");
$rows_informacion_alcance= mysqli_num_rows($query_informacion_alcance);
if ($rows_informacion_alcance >0) {
while ($resultado_informacion_alcance = mysqli_fetch_array($query_informacion_alcance)) {
$num_info = $resultado_informacion_alcance['id'];
$dias_habiles = $resultado_informacion_alcance['tiempo_contestacion'];
$fecha_reingreso_asea = $resultado_informacion_alcance['fecha_reingreso_asea'];
$sello_recibido=$resultado_informacion_alcance['sello_de_recibido'];
$fecha_reaparicion_boletin=$resultado_informacion_alcance['fecha_reaparicion_boletin'];
$fecha_rerecepcion=$resultado_informacion_alcance['fecha_recepcion'];
$num_oficio_resultante=$resultado_informacion_alcance['no_resolutivo'];
$tipo_resolutivo=$resultado_informacion_alcance['resolutivo_desechamiento'];
$relacion_tramite_informacion=$resultado_informacion_alcance['id_tramite'];
}
}
//seccion 1---------------------------------------------------------------------
    if ($fecha_ingreso_dependencia==null) {
        $fecha_ingreso_dependencia_post=$_POST['input_fecha_ingreso_dependencia'];
        $numero_bitacora_post=$_POST['input_no_bitacora'];
        $acuce_recibo_post=$_FILES['file_acuce_recibo'];
        
        if ($fecha_ingreso_dependencia_post==null) {
            array_push($errores, "Fecha de ingreso a la dependencia vacia");
        }
        if ($numero_bitacora_post==null) {
            array_push($errores, "Numero de bitacora vacio");
        }else{
            $query_nobitacora= mysqli_query($conexion, "SELECT * from tramites where num_bitacora='".$numero_bitacora_post."'");
            $rows_query_nobitacora= mysqli_num_rows($query_nobitacora);
            if ($rows_query_nobitacora!=0) {
            array_push($errores, "El numero de bitacora ya se encuentra registrado en otro tramite");
            }
        }
        if ($acuce_recibo_post['name']==null) {  
            array_push($errores, "Acuce de recibo vacio");
        }else{
            if ($acuce_recibo_post['type']!="application/pdf") {
                array_push($errores, "Solo se admiten documentos .pdf");
            }
        }
        if (empty($errores)) {
            $carpeta = "../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/";
            $temp_dir=$acuce_recibo_post['tmp_name'];
            $nombre_acuce_recibo="No_".$num_tramite."_".$nombre_tramite."_ACUCE_".$numero_estacion.".pdf";
            if (file_exists($carpeta)) {            
            }else{
                mkdir("../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/", 0777);
                createFile("../../../../../System/Grupos/".$name."/ES/E.S.".$numero_estacion."/Tramites/index.php");  
            }
               
           $query_update_tramite= mysqli_query($conexion,"update tramites set estado_tramite='En espera de publicacion del boletin', fecha_ingreso_asea ='".$fecha_ingreso_dependencia_post."', num_bitacora='".$numero_bitacora_post."', acuce_de_recibo='".$nombre_acuce_recibo."' where id_tramite='".$num_tramite."'");
           if ($query_update_tramite) {
               $src = $carpeta.$nombre_acuce_recibo;
                move_uploaded_file($temp_dir, $src);
                array_push($success, "Datos guardados de forma exitosa");                
               ?>   
                    <script>
                        reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite?>');
                    </script>
                <?php  
           }
        }
//FIN SECCION 1#################################################################
        
    }else if ($fecha_boletin== null){//SECCION 2--------------------------------
        $fecha_boletin_post=$_POST['fecha_aparicion_boletin'];
        if ($fecha_boletin_post==null) {
            array_push($errores, "Fecha de aparicion en el boletin vacia");
        }else{
           $fecha_ingreso_dependencia_str= strtotime($fecha_ingreso_dependencia);
           $fecha_aparicion_boletin_str= strtotime($fecha_boletin_post);
           
           if ($fecha_ingreso_dependencia_str>$fecha_aparicion_boletin_str) {
               array_push($errores, "La fecha de aparicion en el boletin no puede ser anterior a $fecha_ingreso_dependencia");
           }
        }
        
        if (empty($errores)) {
            $update_tramite_fecha_boletin= mysqli_query($conexion, "update tramites set estado_tramite='En espera de recoleccion de respuesta' ,fecha_aparicion_boletin='".$fecha_boletin_post."' where id_tramite='".$num_tramite."'");
                if ($update_tramite_fecha_boletin) { 
                    array_push($success, "Datos guardados de forma exitosa");
                    ?>
                    <script>
                        reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite?>');
                    </script>
                <?php  
           }    
        }
        
        
//FIN SECCION 2#################################################################
        
    }else if ($fecha_recepcion==null) {//SECCION 3------------------------------
    $fecha_recepcion_post=$_POST['fecha_recepcion_notificacion'];
    $num_oficio_post=$_POST['num_oficio'];
    $respuesta_post=$_FILES['file_respuesta'];
    $respuesta_post_name=$respuesta_post['name'];
    $estado_tramite_update_post=$_POST['estado_tramite_update'];
    $dias_habiles_info_alcance="";
    
    if ($estado_tramite_update_post=="Seleccione") {
        array_push($errores, "No se selecciono un estado.");
        $name_estado="";
    }else{
       $name_estado= noEspacios($estado_tramite_update_post);
    }
    
    if ($fecha_recepcion_post == null) {
        array_push($errores, "La fecha de recepción esta vacia.");
    }else{
        $fecha_boletin_str = strtotime($fecha_boletin);
        $fecha_recepcion_str = strtotime($fecha_recepcion_post);
        if ($fecha_boletin_str > $fecha_recepcion_str) {
            array_push($errores, "La fecha de recepcion no puede ser anterior a $fecha_boletin");
        }
    }
    
    if ($num_oficio_post==null) {
        array_push($errores, "El numero de oficio esta vacio.");
    }else{
        $query_no_oficio= mysqli_query($conexion, "SELECT * from tramites where num_oficio='".$num_oficio_post."'");
        $rows_query_no_oficio= mysqli_num_rows($query_no_oficio);
        if ($rows_query_no_oficio!=0) {
            array_push($errores, "El numero de oficio ya se encuentra registrado en otro tramite"); 
        }
    }
    
    if ($respuesta_post['name'] == null) {
        array_push($errores, "No se selecciono ningun documento.");
    } else {
        if ($respuesta_post['type'] != "application/pdf") {
            array_push($errores, "Solo se admiten documentos .pdf");
        } else {
            $carpeta = "../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/";
            $temp_dir = $respuesta_post['tmp_name'];
            $nombre_acuce_recibo = "No_" . $num_tramite . "_" . $nombre_tramite . "_" . $name_estado . "_" . $numero_estacion . ".pdf";
            if (file_exists($carpeta)) {
                
            } else {
                mkdir("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/", 0777);
                createFile("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/index.php");
            }
        }
    }
    
    if ($estado_tramite_update_post=="Acuerdo de apercibimiento") {
        $dias_habiles_info_alcance=$_POST['dias_habiles_info_alcance'];
        if (empty($dias_habiles_info_alcance)) {
            array_push($errores, "No se especificaron los dias para presentar la información"); 
        }
    }else if ($estado_tramite_update_post=="Resolutivo" && $nombre_tramite=="MIA" || $nombre_tramite=="IP") {
        $periodo_post=$_POST['periodo'];    
        if ($periodo_post=="anual") {
            $fecha1_tyc=$_POST['fecha1'];
            $fecha2_tyc="";
            
            if ($fecha1_tyc==null) {
                array_push($errores, "No se especifico la fecha para presentar los terminos y condicionantes");   
            }else{
                if ($fecha_recepcion_post!=null) {
                    $fecha_recepcion_post_str = strtotime($fecha_recepcion_post);
                    $fecha1_tyc_str = strtotime($fecha1_tyc);
                    if ($fecha_recepcion_post_str > $fecha1_tyc_str) {
                        array_push($errores, "La fecha para presentar los terminos y condicionantes no puede ser anterior a la fecha de recepción.");
                    }                     
                }
            }
            
        }else if ($periodo_post=="semestral"){
            $fecha1_tyc=$_POST['fecha1'];
            $fecha2_tyc=$_POST['fecha2'];
            
            if ($fecha1_tyc==null) {
                array_push($errores, "No se especifico la fecha del primer periodo para presentar los terminos y condiciones");                   
            }else{
                if ($fecha_recepcion_post!=null) {
                    $fecha_recepcion_post_str = strtotime($fecha_recepcion_post);
                    $fecha1_tyc_str = strtotime($fecha1_tyc);
                    if ($fecha_recepcion_post_str > $fecha1_tyc_str) {
                        array_push($errores, "La fecha del primer periorodo para presentar los terminos y condicionantes no puede ser anterior a la fecha de recepción.");
                    }                     
                }                
            }
            if ($fecha2_tyc==null) {
                array_push($errores, "No se especifico la fecha del segundo periodo para presentar los terminos y condiciones"); 
            }
            
            if ($fecha1_tyc!=null && $fecha2_tyc!=null ) {
                $fecha1_tyc_str = strtotime($fecha1_tyc);
                $fecha2_tyc_str = strtotime($fecha2_tyc);
                if ($fecha1_tyc_str > $fecha2_tyc_str) {
                    array_push($errores, "La fecha del segundo periodo no puede ser anterior al primer periodo");
                } 
            } 
        }
    }
    
    if (empty($errores)) {
        if ($estado_tramite_update_post=="Acuerdo de apercibimiento") {
            $fecha_limite=sumar_dias($fecha_recepcion_post, $dias_habiles_info_alcance);            
        }    
        $query_update_tramite = mysqli_query($conexion, "update tramites set estado_tramite='" . $estado_tramite_update_post . "' ,fecha_recepcion_notificacion='" . $fecha_recepcion_post . "' , num_oficio='" . $num_oficio_post . "' , respuesta='" . $nombre_acuce_recibo . "' where id_tramite='".$num_tramite."'");
        if ($query_update_tramite) {
            array_push($success, "Datos guardados de forma exitosa");
            $src = $carpeta . $nombre_acuce_recibo;
            move_uploaded_file($temp_dir, $src);
            if ($estado_tramite_update_post=="Acuerdo de apercibimiento") {
                $query_insert_informacion_alcance= mysqli_query($conexion, "INSERT INTO informacion_alcance_asea (tiempo_contestacion,id_tramite) VALUES ('$fecha_limite','$num_tramite')");
                if ($query_insert_informacion_alcance) {
                    array_push($success, "Se dio de alta solicitud de informacion en alcance");                  
                }                
            }else if ($estado_tramite_update_post=="Resolutivo" && $nombre_tramite=="MIA" || $nombre_tramite=="IP"){
/* TYC*/        $query_insert_terminos_condicionantes_fechas=mysqli_query($conexion,"INSERT INTO periodos_cumplimiento (tipo_periodo,id_tramite) VALUES ('$periodo_post','$num_tramite')");

                if ($query_insert_terminos_condicionantes_fechas) {
                    $id_periodos_cumplimiento= mysqli_insert_id($conexion);
        
                    if ($periodo_post=="anual") { 
                        $query_insert_terminos_condicionantes = mysqli_query($conexion, "INSERT INTO tramites_dependientes (nombre_tramite_td,fecha_cumplimiento,estado_tramite_td,fecha_ingreso_sistema_td,periodo,id_periodo) VALUES ('tyc','$fecha1_tyc','En espera de ser ingresado en dependencia','$fecha_actual','1','$id_periodos_cumplimiento')");
                        if ($query_insert_terminos_condicionantes) {
                            array_push($success, "Se realizo el alta de terminos y condicionantes");
                        }
                        
                    }else if($periodo_post == "semestral"){
                        $query_insert_terminos_condicionantes1 = mysqli_query($conexion, "INSERT INTO tramites_dependientes (nombre_tramite_td,fecha_cumplimiento,estado_tramite_td,fecha_ingreso_sistema_td,periodo,id_periodo) VALUES ('tyc','$fecha1_tyc','En espera de ser ingresado en dependencia','$fecha_actual','1','$id_periodos_cumplimiento')");
                        $query_insert_terminos_condicionantes2 = mysqli_query($conexion, "INSERT INTO tramites_dependientes (nombre_tramite_td,fecha_cumplimiento,estado_tramite_td,fecha_ingreso_sistema_td,periodo,id_periodo) VALUES ('tyc','$fecha2_tyc','En espera de ser ingresado en dependencia','$fecha_actual','2','$id_periodos_cumplimiento')");
                        if ($query_insert_terminos_condicionantes1 && $query_insert_terminos_condicionantes2 ) {
                            array_push($success, "Se realizo el alta de terminos y condicionantes");
                        }
                        
                    }

                
                }
                
            }
            ?>     
                <script>
                    reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite ?>');
                </script>
            <?php                
        }
    }

//FIN SECCION 3#################################################################    
}elseif ($rows_informacion_alcance>0) {
    if ($fecha_reingreso_asea==null){ //SECCION 4-------------------------------
        $fecha_reingreso_asea_post=$_POST['fecha_reingreso_dependencia'];
        $comprobante_reingreso=$_FILES['file_comprobante_reingreso'];
        $comprobante_reingreso_name=$comprobante_reingreso['name'];
        
        if ($fecha_reingreso_asea_post==null) {
        array_push($errores, "La fecha de reingreso se encuentra vacia.");            
        }
        
        if ($comprobante_reingreso_name==null){
        array_push($errores, "No se selecciono ningun documento.");                        
        }else{
            if ($comprobante_reingreso['type'] != "application/pdf") {
                array_push($errores, "Solo se admiten documentos .pdf");
            } else {
                $carpeta = "../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/";
                $temp_dir = $comprobante_reingreso['tmp_name'];
                $nombre_comprobante = "No_" . $num_info . "_COMPROBANTE_REINGRESO_" . $numero_estacion . ".pdf";
                if (file_exists($carpeta)) {
                } else {
                    mkdir("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/", 0777);
                    createFile("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/index.php");
                }
            }
        }
        
    if (empty($errores)) {
        
        $query_update_informacion_alcance= mysqli_query($conexion, "update informacion_alcance_asea set fecha_reingreso_asea='".$fecha_reingreso_asea_post."', sello_de_recibido='".$nombre_comprobante."' where id_tramite='".$relacion_tramite_informacion."'");
        
        if ($query_update_informacion_alcance){
            $src = $carpeta.$nombre_comprobante;
            move_uploaded_file($temp_dir, $src);
            $query_update_tramite= mysqli_query($conexion, "update tramites set estado_tramite='En espera de publicacion del boletin' where id_tramite='".$num_tramite."'");
            if ($query_update_tramite) {
            ?>
                <script>
                    alert_message("Datos guardados de forma exitosa","success","Actualización exitosa");
                </script>
                       
                <script>
                    reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite ?>');
                </script>
            <?php                  
            }
        }
    }        
//FIN SECCION 4#################################################################            
    }else if ($fecha_reaparicion_boletin==null){ //SECCION 5--------------------
        $fecha_raparicion_boletin_post=$_POST['fecha_reaparicion_boletin'];
        if ($fecha_raparicion_boletin_post == null) {
            array_push($errores, "La fecha de aparicion en el boletin de notificaciones esta vacia.");
        }else{
            $fecha_reingreso_asea_str = strtotime($fecha_reingreso_asea);
            $fecha_raparicion_boletin_str = strtotime($fecha_raparicion_boletin_post);
        if ($fecha_reingreso_asea_str > $fecha_raparicion_boletin_str) {
            array_push($errores, "La fecha de aparicion no puede ser anterior a la fecha de ingreso");
        }
    }
    if (empty($errores)) {
        $query_update_informacion_alcance= mysqli_query($conexion, "update informacion_alcance_asea set fecha_reaparicion_boletin='".$fecha_raparicion_boletin_post."' where id_tramite='".$relacion_tramite_informacion."'");
        if ($query_update_informacion_alcance) {
                        $query_update_tramite= mysqli_query($conexion, "update tramites set estado_tramite='En espera de recoleccion de respuesta' where id_tramite='".$num_tramite."'");
            if ($query_update_tramite) {
            ?>
                <script>
                    alert_message("Datos guardados de forma exitosa","success","Actualización exitosa");
                </script>
                       
                <script>
                    reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite ?>');
                </script>
            <?php                  
            }
        }
        
    }
    
    
    
    
//FIN SECCION 5#################################################################            
    }else if ($fecha_rerecepcion==NULL){
        $estatus_tramite_post=$_POST['estado_tramite_update'];
        $fecha_rerecepcion_post=$_POST['fecha_rerecepcion_resolutivo'];
        $num_oficio_inf_post=$_POST['num_oficio_inf_alcance'];
        $respuesta_inf_alcance=$_FILES['file_respuesta_inf_alcance'];
        $respuesta_inf_alcance_name=$respuesta_inf_alcance['name'];

    if ($estatus_tramite_post=="Seleccione") {
            array_push($errores, "No se selecciono el estado del tramite");        
    }

        if ($fecha_rerecepcion_post == null) {
            array_push($errores, "La fecha de recepcion de la respuesta se encuentra vacia.");
        }else{
            $fecha_raparicion_boletin_str = strtotime($fecha_reaparicion_boletin);
            $fecha_recepcion_str = strtotime($fecha_rerecepcion_post);
        if ($fecha_raparicion_boletin_str > $fecha_recepcion_str) {
            array_push($errores, "La fecha de recepcion no puede ser anterior a la fecha de aparicion en el boletin");
        }
        }
        
        if ($num_oficio_inf_post==null){
                    array_push($errores, "El numero de oficio esta vacio.");    
        }
        
        if ($respuesta_inf_alcance_name== null) {
       array_push($errores, "No se selecciono ningun documento.");                        
        }else{
            if ($respuesta_inf_alcance['type'] != "application/pdf") {
                array_push($errores, "Solo se admiten documentos .pdf");
            } else {
                $carpeta = "../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/";
                $temp_dir = $respuesta_inf_alcance['tmp_name'];
                $nombre_respuesta = "No_" . $num_info . "_".$estatus_tramite_post."_" . $numero_estacion . ".pdf";
                if (file_exists($carpeta)) {
                } else {
                    mkdir("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/", 0777);
                    createFile("../../../../../System/Grupos/" . $name . "/ES/E.S." . $numero_estacion . "/Tramites/index.php");
                }
            }
        }
        
    if (empty($errores)) {
        $query_update_informacion_alcance= mysqli_query($conexion, "update informacion_alcance_asea set fecha_recepcion='".$fecha_rerecepcion_post."', no_resolutivo='".$num_oficio_inf_post."', resolutivo_desechamiento='".$nombre_respuesta."' where id_tramite='".$relacion_tramite_informacion."'");
        if ($query_update_informacion_alcance) {
                        $src = $carpeta . $nombre_respuesta;
            move_uploaded_file($temp_dir, $src);
                        $query_update_tramite= mysqli_query($conexion, "update tramites set estado_tramite='".$estatus_tramite_post."' where id_tramite='".$num_tramite."'");
            if ($query_update_tramite) {
            ?>
                <script>
                    alert_message("Datos guardados de forma exitosa","success","Actualización exitosa");
                </script>
                       
                <script>
                    reload_datos_tramite('../Scripts/insert/Seguimiento/Procesos_tramites/Datos_tramite.php',"#Alta_tramites_success",'<?php echo $num_tramite ?>');
                </script>
            <?php                  
            }
        }
        
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