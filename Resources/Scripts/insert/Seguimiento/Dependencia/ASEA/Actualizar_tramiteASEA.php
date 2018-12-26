<?php
session_start();
require '../../../../funcionesPHP/Funciones.php';
$id_user=$_SESSION['session_id'];
require '../../../../Conect.php';
$errores=array();
$query= mysqli_query($conexion, "SELECT * FROM tramites_asea where id_es ='".$_POST['id_es']."' and tipo_tramite='".$_POST['tipo_tramite']."'"); //consultamos la informacion del tramite seleccionado---
while ($row = mysqli_fetch_assoc($query)) {
    $id_tramite=  $row['id_tramite'];
    $tipo_tramite= $row['tipo_tramite'];
    $estado_tramite= $row['estado_tramite'];
    $fecha_ingreso_sistema= $row['fecha_ingreso_sistema'];
    $fecha_ingreso_asea= $row['fecha_ingreso_asea'];
    $num_bitacora= $row['num_bitacora'];
    $acuce_recibo=$row['acuce_de_recibo'];
    $fecha_boletin= $row['fecha_aparicion_boletin'];
    $fecha_recepcion_notificacion= $row['fecha_recepcion_notificacion'];
    $fecha_entrega= $row['fecha_entrega'];
    $id_es= $row['id_es'];
}
//INNER JOIN GRUPO Y ESTACION
$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.id= '".$_POST['id_es']."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_gpo=$row_grpo['nombre'];   
}
$name=noEspacios($nombre_gpo);
//FIN ESTACION------------------------------------------------------------------

$query_es=mysqli_query($conexion,"SELECT * FROM estacion_servicio where id='".$id_es."'");
while($row_es= mysqli_fetch_assoc($query_es)){
    $num_es=$row_es['es'];
}
//SI ES CLIENTE----
if ($_SESSION['session_id']==3) {
    $hora= date ("h-i-s");
    $fecha= date ("j-n-Y");
    $fecha_hora=$hora.$fecha;
    if ($_POST['number_of_rows_consultar_solicitud_informacion']>0) {//SACAR ID DE SOLICITUD INFORMACION
        $consultar_informacion_alcance_asea=mysqli_query($conexion,"SELECT * FROM informacion_alcance_asea where id_tramite='".$id_tramite."'");
        while ($row_consultar_informacion_alcance_asea= mysqli_fetch_assoc($consultar_informacion_alcance_asea)){
            $id_solicitud_informacion=$row_consultar_informacion_alcance_asea['id'];
        }//FIN SACAR ID DE SOLICITUD INFORMACION
        
        $num_rows_client=$_POST['number_of_rows_consultar_solicitud_informacion'];
        for ($i=1;$i<=$num_rows_client;$i++){
        $file = $_FILES["documentos_solicitados".$i];      
        $nombre = $file["name"];
        if ($nombre!="") {
        $name_file_upload=$fecha_hora.$file["name"];
        $ruta_provisional = $file["tmp_name"];
        $carpeta = "../../../../../../System/Grupos/".$name."/ES/E.S.".$num_es."/Temporal/";
        $consultar_documentos_solicitud= mysqli_query($conexion, "Select * from solicitud_informacion where id_informacion='".$id_solicitud_informacion."'");
        $num_rowsconsultar_documentos_solicitud= mysqli_num_rows($consultar_documentos_solicitud);
        if ($num_rowsconsultar_documentos_solicitud!=0) {
        $ids_documentos_solicitud=array();
        while($row_consultar_documentos_solicitud= mysqli_fetch_assoc($consultar_documentos_solicitud)){
            $ids_documentos_solicitud[0]="x";
            array_push($ids_documentos_solicitud,$row_consultar_documentos_solicitud['id']);      
        }
         echo '<script language="javascript">console.log("'.$ids_documentos_solicitud[$i].'");</script>';
        $update_solicitud_informacion=mysqli_query($conexion,"UPDATE solicitud_informacion SET archivo= '".$name_file_upload."' WHERE id='".$ids_documentos_solicitud[$i]."'");
        if ($update_solicitud_informacion) {
            $src = $carpeta.$name_file_upload;
            move_uploaded_file($ruta_provisional, $src);
            ?>
        <script language="javascript">     
            actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
        </script> <?php 
        }else{
            echo '<script language="javascript">console.log("no");</script>';
        }
        }

        }
        }
    } 
}

////
//PRIMERA PARTE(FECHA DE INGRESO A ASEA, NUM BITACORA, ACUCE DE RECIBO)---------------------------------------------------------------------------------------------------------------------------------------
if (empty($fecha_ingreso_asea)||empty($num_bitacora)||empty($acuce_recibo)) {
    if (!empty($_POST['ingreso_asea'])){ //FECHA INGRESO
        $INSERT_ingreso_asea=$_POST['ingreso_asea'];    
    }else{
        $INSERT_ingreso_asea="";
        array_push($errores,"Fecha de Ingreso a Asea no puede estar vacia");
    }

    if (!empty($_POST['numero_bitacora'])) {//NUM BITACORA
        $INSERT_numero_bitacora=$_POST['numero_bitacora'];
        $query_bitacora= mysqli_query($conexion,"SELECT * FROM tramites_asea where num_bitacora='".$INSERT_numero_bitacora."'" );  
        $num_rows= mysqli_num_rows($query_bitacora);
        if ($num_rows!=0) {
            array_push($errores,"El numero de bitacora ya esta registrado en otro tramite");      
        }    
    }else{
        $INSERT_numero_bitacora="";
        array_push($errores,"El numero de bitacora no puede estar vacio");
    }
    
    $file_acuce = $_FILES["file_acucerecibo"];//acuce recibo
    $nombre_acuce = $file_acuce["name"];
    if (!empty($nombre_acuce)) {
        $tipo = $file_acuce["type"];
        $ruta_provisional = $file_acuce["tmp_name"];
        $size = $file_acuce["size"];
        $carpeta = "../../../../../../System/Grupos/".$name."/ES/E.S.".$num_es."/Tramites/ASEA/";
        echo '<script language="javascript">alert("'.$carpeta.'");</script>';
        $string_sin_modificar = $tipo;
        if ($tipo!='application/pdf') {
            array_push($errores,"Solo se admiten documentos en formato .pdf");     
        }else{
            $tipo='.pdf';
            $nombrearchivo=$tipo_tramite."_ACUCE_".$num_es.$tipo;
        }    
    }else{
        $INSERT_acuce_recibo="";
        array_push($errores,"El numero de bitacora no puede estar vacio");
    }
if (empty($errores)) {
    if ($_POST['tipo_tramite']=="SASISOPA") {
        $estado_string="Resolutivo";
    }else{
        $estado_string="En espera de publicacion del boletin";
    }
    $src = $carpeta.$nombrearchivo;
    $query_update= mysqli_query($conexion, "UPDATE tramites_asea SET fecha_ingreso_asea = '".$INSERT_ingreso_asea."', num_bitacora = '".$INSERT_numero_bitacora."', acuce_de_recibo = '".$nombrearchivo."',estado_tramite='".$estado_string."' WHERE id_tramite='".$id_tramite."'");
    if ($query_update) { 
        move_uploaded_file($ruta_provisional, $src);?>
        <script language="javascript">     
            aviso_noreload("<a class=\"msj_es_ex fas fa-check\" id=\"succes\"> Los Datos se Actualizaron Exitosamente!</a>");
        </script>
        <script language="javascript">     
            actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
        </script> <?php 
    }else{
        echo '<script language="javascript">alert("NO se actualizo");</script>';
    }
}//FIN DE PRIMERA PARTE-------------------------------------------------------------------------------------------------------------------------------------------

}else{
    if (empty($fecha_boletin)) {
       if (!empty($_POST['fecha_boletin'])) { //fecha de aparicion en el boletin
           $fecha_asea= strtotime($fecha_ingreso_asea);
           $fecha_aparicion_boletin =strtotime( $_POST['fecha_boletin']);
           if ($fecha_aparicion_boletin>$fecha_asea) {
          $fecha_aparicion_boletin=$_POST['fecha_boletin'];
               $query_update= mysqli_query($conexion, "UPDATE tramites_asea SET fecha_aparicion_boletin = '".$fecha_aparicion_boletin."',estado_tramite='En espera de recepcion de resolutivo o notificación' WHERE id_tramite='".$id_tramite."'");
               if ($query_update) {
           ?>
            <script language="javascript">     
    aviso_noreload("<a class=\"msj_es_ex fas fa-check\" id=\"succes\"> Los Datos se Actualizaron Exitosamente!</a>");
    </script>
        <script language="javascript">     
    actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
    </script>
     <?php        
               }
           }else{
          array_push($errores,"La fecha de aparicion en el boletin de notificaciones no puede ser anterior a la fecha de ingreso en la Asea");   
           }
       }else{
        array_push($errores,"Fecha de aparicion en boletin de notificaciones no puede estar vacia");    
       }
    }else{ /*ultimo*/
        if (empty($fecha_recepcion_notificacion)) {
            if ($_POST['select_estatus'] == "Selecciona") { //estatus
        array_push($errores,"Seleccione un estado del tramite");                    
            }else{
                $estatus_tramite=$_POST['select_estatus'];
            }
            if (!empty($_POST['fecha_recepcion'])) { //fecha recepcion
              $boletin= strtotime($fecha_boletin);
              $recepcion = strtotime($_POST['fecha_recepcion']);
              if ($recepcion>$boletin) {
                  $fecha_recepcion=$_POST['fecha_recepcion'];
              }else{
              array_push($errores,"La fecha de recepcion es invalida");    
              }
            }else{
           array_push($errores,"Ingrese la fecha de recepcion de la notificación o resolutivo");     
            }
            if (!empty($_POST['no_oficio'])) { //numero oficio
                $num_oficio=$_POST['no_oficio'];
            }else{
                array_push($errores,"El numero de oficio esta vacio");     
            }
            /*SI ES RESOLUTIVO*/
            if (!empty($_POST['periodo'])) {
                         if ($_POST['periodo']=="NA"){
                $periodo="";
                if ($periodo=="") {
                            $fecha1=null;
                            $fecha2=null;
                            $fecha3=null;
                            $fecha4=null;
                        }
            }else{
                $periodo=$_POST['periodo'];
                if ($_POST['select_estatus'] == "Resolutivo") {
                        if ($periodo == "Anual") {
                            if (empty($_POST['fecha0']) && empty($_POST['fecha1'])) {
                                array_push($errores, "Especificar fechas para presentar T y C");
                            } else {
                                if (empty($_POST['fecha0'])) {
                                    array_push($errores, "Especificar fecha inicial para presentar T y C");
                                } else {
                                    $fecha1 = $_POST['fecha0'];
                                        if (empty($_POST['fecha1'])) {
                                            array_push($errores, "Especificar fecha final para presentar T y C");
                                        } else {
                                            $fecha2 = $_POST['fecha1'];
                                            $fecha3 = null;
                                            $fecha4 = null;
                                                if (strtotime($fecha1) >= strtotime($fecha2)) {
                                                    array_push($errores, "Fechas invalidas para la presentacion de T y C");
                                                }
                                        }
                                }
                            }                      
                    }elseif($periodo=="Semestral"){
                        if (empty($_POST['fecha0']) && empty($_POST['fecha1']) && empty($_POST['fecha2']) && empty($_POST['fecha3'])) {
                           array_push($errores,"Especificar fechas para presentar T y C");  
                        }else{
                                if (empty($_POST['fecha0'])) {
                                    array_push($errores, "Especificar Fecha Inicial para presentar T y C del Primer Periodo");
                                } else {
                                    $fecha1 = $_POST['fecha0'];
                                        if (empty($_POST['fecha1'])) {
                                            array_push($errores, "Especificar Fecha Final para presentar T y C del Primer Periodo");
                                        } else {
                                            $fecha2 = $_POST['fecha1'];
                                            $fecha3 = null;
                                            $fecha4 = null;
                                                if (strtotime($fecha1) >= strtotime($fecha2)) {
                                                    array_push($errores, "Fechas invalidas para la presentacion de T y C del Primer Periodo");
                                                }
                                        }
                                }
                                if (empty($_POST['fecha2'])) {
                                    array_push($errores, "Especificar Fecha Inicial para presentar T y C del Segundo Periodo");
                                } else {
                                    $fecha3 = $_POST['fecha2'];
                                        if (empty($_POST['fecha3'])) {
                                            array_push($errores, "Especificar Fecha Final para presentar T y C del Segundo Periodo");
                                        } else {
                                            $fecha4 = $_POST['fecha3'];
                                                if (strtotime($fecha3) >= strtotime($fecha4)) {
                                                    array_push($errores, "Fechas invalidas para la presentacion de T y C del Segundo Periodo");
                                                }
                                        }
                                }
                        }
                        
                    }
                }                
            }   
            }
             /*-----*/
            if (!empty($_FILES["file_resolutivo"])) {
            $file = $_FILES["file_resolutivo"];      
            $nombre = $file["name"];         
            if (!empty($nombre)) {        
            $file = $_FILES["file_resolutivo"];
            $nombre = $file["name"];   
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $carpeta = "../../../../../../System/Grupos/".$name."/ES/E.S.".$num_es."/Tramites/ASEA/";
            $string_sin_modificar = $tipo;
            if ($tipo!='application/pdf') {
                  array_push($errores,"Solo se admiten documentos en formato .pdf");     
            }else{
                $tipo='.pdf';
                $nombrearchivo=$tipo_tramite."_".$_POST['select_estatus']."_".$num_es.$tipo;               
            }

    }else{
  array_push($errores,"No se proporciono el resolutivo o notificación correspondiente");
}
}
/* SI ES ASUNTO */
$estatus_reingreso="En espera de reingreso a Asea";
    $nombres_celdas = array();
        $descripciones_celdas = array();
            if ($_POST['select_estatus'] == "Asunto") {
                if (!empty($_POST['tiempo_contestacion'])) {
                    $tiempo_contestación = $_POST['tiempo_contestacion'];
                    if ($tiempo_contestación < 1) {
                        array_push($errores, "El numero de dias no puede ser menor a uno");
                    }
                } else {
                    array_push($errores, "No se proporciono el numero de dias habiles para dar contestación");
                }
                $celdas = $_POST['id_celdas'];
                if ($celdas!=0) {    
                $celdasarray = explode(",", $celdas);
                for ($i = 0; $i < sizeof($celdasarray); $i++) {
                    $nombre_celda = $_POST["nombre_informacion_requerida" . $celdasarray[$i]];
                    $descripcion_celda = $_POST['descripcion' . $celdasarray[$i]];
                    if (!empty($nombre_celda)) {
                                        $estatus_reingreso="En espera de informacion requerida";
                        array_push($nombres_celdas, $nombre_celda);
                                                if (!empty($descripcion_celda)) {
                            array_push($descripciones_celdas, $descripcion_celda );
                        }else{
                            array_push($descripciones_celdas, "No se especifico una descripcion");
                        }
                    } else {
                        if (!empty($descripcion_celda)) {
                            array_push($errores, "No se especifico un nombre para la información requerida");
                        }
                    }
                }
            }else{
            }
            }
/*SI NO HAY ERRORES-----------------------------------------------------------*/
            if (empty($errores)) {
               $src = $carpeta.$nombrearchivo;
    if ($estatus_tramite=="Asunto") {
        $esttramite="Requerimiento de información en Alcance";    
    }else if ($estatus_tramite=="Resolutivo") {
        $esttramite="Resolutivo";    
    }
    $query_update= mysqli_query($conexion, "UPDATE tramites_asea SET fecha_recepcion_notificacion = '".$fecha_recepcion."', estado_tramite='".$esttramite."' WHERE id_tramite='".$id_tramite."'");
    if ($query_update) {
        $query_insert= mysqli_query($conexion, "INSERT INTO notificacion_o_resolutivo (no_oficio,tipo_resolucion,notificacion_resolutivo,id_tramite)values ('$num_oficio','$estatus_tramite','$nombrearchivo','$id_tramite')");
        if ($query_insert) {
            move_uploaded_file($ruta_provisional, $src);
                       if ($estatus_tramite=="Resolutivo") {
                           if ($tipo_tramite=="MIA" || $tipo_tramite=="IP") {
    $query_insert_asunto= mysqli_query($conexion, "INSERT INTO asuntos_asea (estado_asunto,fecha_ingreso_sistema,nombre_asunto,periodo_de_cumplimiento,periodo1_fecha1,periodo1_fecha2,periodo2_fecha1,periodo2_fecha2,id_es,id_user)values"
 . " ('En espera de ser ingresado a Asea','$fecha_recepcion','TyC','$periodo','$fecha1','$fecha2','$fecha3','$fecha4','$id_es','$id_user')");
   
                           }
                       }else if ($estatus_tramite=="Asunto"){
                            $query_insert_infalcance= mysqli_query($conexion, "INSERT INTO informacion_alcance_asea (estatus_reingreso,tiempo_contestacion,id_tramite) values ('$estatus_reingreso','$tiempo_contestación','$id_tramite')");                       
                            if ($query_insert_infalcance) {
                             $query_inf_alcance=mysqli_query($conexion, "SELECT * FROM informacion_alcance_asea  WHERE id_tramite='".$id_tramite."'");
                           while ($row_inf_alcance = mysqli_fetch_assoc($query_inf_alcance)) {
                               $id_inf_alcance=$row_inf_alcance['id'];
                            }
                            for ($i=0;$i<sizeof($nombres_celdas);$i++){
    $query_insert_solicitud_informacion=mysqli_query($conexion, "INSERT INTO solicitud_informacion (nombre,descripcion,estatus,id_informacion) values('$nombres_celdas[$i]','$descripciones_celdas[$i]','En espera','$id_inf_alcance')");   
                       
    
                            }
                            }
                       }
                            ?>
            <script language="javascript">     
    aviso_noreload("<a class=\"msj_es_ex fas fa-check\" id=\"succes\"> Los Datos se Actualizaron Exitosamente!</a>");
    </script>
            <script language="javascript">     
    actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
    </script>
     <?php       
                }  
             }    
                
                
                
                
                
                for ($i=0;$i<sizeof($nombres_celdas);$i++){
                    echo '<script language="javascript">console.log("Nombre: '.$nombres_celdas[$i].' Descripcion: '.$descripciones_celdas[$i].'");</script>';
                }      
}/*FIN SI NO HAY ERRORES------------------------------------------------------*/
        }else{ //consulta_informacion en alcance-
           $consultar_informacion_alcance_asea= mysqli_query($conexion, "SELECT * FROM informacion_alcance_asea Where id_tramite='".$id_tramite."'");
           while ($row_informacion_alcance_asea = mysqli_fetch_assoc($consultar_informacion_alcance_asea)) {
               $var_id=$row_informacion_alcance_asea['id'];
               $var_estatus_reingreso=$row_informacion_alcance_asea['estatus_reingreso'];
               $var_tiempo_contestacion=$row_informacion_alcance_asea['tiempo_contestacion'];
               $var_fecha_ingreso_asea=$row_informacion_alcance_asea['fecha_ingreso_asea'];
               $var_sello_de_recibido=$row_informacion_alcance_asea['sello_de_recibido'];
               $var_fecha_aparicion_boletin=$row_informacion_alcance_asea['fecha_aparicion_boletin'];
               $var_fecha_recepcion_notificacion=$row_informacion_alcance_asea['fecha_recepcion_notificación'];
               $var_id_tramite=$row_informacion_alcance_asea['id_tramite'];
           }
           if (empty($var_fecha_ingreso_asea)) { //Si la fecha de ingreso en asea esta vacia
               if (!empty($_POST['fecha_Reingreso_asea'])) {//Post reingreso asea
                    $fecha_recepcion_asea= strtotime($fecha_recepcion_notificacion);
           $fecha_ingreso_info_requerida =strtotime( $_POST['fecha_Reingreso_asea']);
           if ($fecha_ingreso_info_requerida>$fecha_recepcion_asea) {
               $Post_reingreso_asea=$_POST['fecha_Reingreso_asea'];
           }else{
                array_push($errores,"La fecha de reingreso no puede ser anterior a la fecha de recepcion");           
           }   
               }else{
                    array_push($errores,"No se proporciono la fecha de ingreso de la información requerida");                              
               }//Fin Post reingreso asea
               
               $file = $_FILES["comprobante_reingreso"];
               $file_name=$file["name"];
               if ($file_name!="") {
                   $tipo = $file["type"];
                   $ruta_provisional = $file["tmp_name"];
                   $size = $file["size"];
                   $carpeta = "../../../../../../System/Grupos/".$name."/ES/E.S.".$num_es."/Tramites/ASEA/";
                   $string_sin_modificar = $tipo;
                   if ($tipo!='application/pdf') {
                    array_push($errores,"Solo se admiten documentos en formato .pdf");     
                   }else{
                    $tipo='.pdf';
                    $nombrearchivo=$tipo_tramite."_Cumplimiento_informacion_".$num_es.$tipo;               
                   }

    }else{
  array_push($errores,"No se proporciono el comprobante de cumplimiento de informacion");
}
if (empty($errores)) {
    $src = $carpeta.$nombrearchivo;
    $Update_table_informacion_alcance_asea= mysqli_query($conexion,"UPDATE informacion_alcance_asea SET estatus_reingreso='En espera de reaparicion en boletin', fecha_ingreso_asea = '".$Post_reingreso_asea."', sello_de_recibido= '".$nombrearchivo."' WHERE id_tramite='".$id_tramite."'");
    if ($Update_table_informacion_alcance_asea) {
        move_uploaded_file($ruta_provisional, $src); ?>
    
    <script language="javascript">     
        aviso_noreload("<a class=\"msj_es_ex fas fa-check\" id=\"succes\"> Los Datos se Actualizaron Exitosamente!</a>");
    </script>
    <script language="javascript">     
        actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
    </script>
     <?php          
    }

}
               }else if(empty ($var_fecha_aparicion_boletin)){ /* SI FECHA DE REAPARICION EN EL BOLETIN */
                               if (!empty($_POST['reaparicion_boletin'])) {//Post reingreso asea
                    $Post_ingreso_asea= strtotime($var_fecha_ingreso_asea);
                    $fecha_reaparicion =strtotime( $_POST['reaparicion_boletin']);
           if ($fecha_reaparicion>$Post_ingreso_asea) {
               $Post_reaparicion_boletin=$_POST['reaparicion_boletin'];
           }else{
                array_push($errores,"La fecha de reaparicion no puede ser anterior a la fecha de ingreso");           
           }   
               }else{
                    array_push($errores,"No se proporciono la fecha de reaparicion en el boletin de notificaciones");                              
               }//Fin Post reingreso asea   
                   
               }
               if (empty($errores)) {
               $Update_table_informacion_alcance_asea= mysqli_query($conexion,"UPDATE informacion_alcance_asea SET estatus_reingreso='En espera de recoleccion de notificación o Resolutivo', fecha_aparicion_boletin = '".$Post_reaparicion_boletin."' WHERE id_tramite='".$id_tramite."'");
    if ($Update_table_informacion_alcance_asea) { ?>
    <script language="javascript">     
        aviso_noreload("<a class=\"msj_es_ex fas fa-check\" id=\"succes\"> Los Datos se Actualizaron Exitosamente!</a>");
    </script>
    <script language="javascript">     
        actualizar_tabla('<?PHP ECHO $id_es?>','<?php echo $tipo_tramite ?>');
    </script>
     <?php          
    }  
               }
           }//FIN Si la fecha de ingreso en asea esta vacia 
        }
    }

//mostrar errores.................................................................................................................
 $max = sizeof($errores);
 $string="";
 if ($max>0) {
 $string="<h4>Ocurrieron los siguientes errores:</h4>";
for ($i=0; $i<$max; $i++){
$string=$string."<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">".$errores[$i]."</a> <br>";
}
?>
<script language="javascript">     
erroresalert('<?php echo $string?>');
</script> <?php 
}