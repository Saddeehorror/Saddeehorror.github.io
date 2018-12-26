f<?php
require '../../../Conect.php';
require '../../../funcionesPHP/Funciones.php';
require '../../../funcionesPHP/MakeFile.php';
require '../../../funcionesPHP/Directorios.php';
include './funciones_alarmas.php';
$errores = array();
$warnings = array();
$correos = array();
$telefonos = array();

//$_SESSION['session_err']=$errores;
//variables.....................................................................
$var_grupo = $_POST['alta_gpo_select'];
$var_nombre_es = $_POST['alta_nombre_es'];
$var_alias = $_POST['alta_alias_es'];
$var_num_es = $_POST['alta_num_es'];
$var_rfc_es = $_POST['alta_rfc_es'];
$var_direccion = $_POST['alta_dir_es'];
$var_nacionalidad = $_POST['alta_nacionalidad_es'];
$var_estado = $_POST['alta_estado_es'];
$var_municipio = $_POST['alta_municipio_es'];
$var_codigopostal = $_POST['alta_cp_es'];
$var_email = $_POST['alta_email_es'];
$var_telefono = $_POST['alta_tel_es'];
$var_actividad = $_POST['alta_actividad_es'];
$var_inicio_operaciones = $_POST['alta_init_oper_es'];
$var_horario_atencion1 = $_POST['alta_hrs1_es'];
$var_horario_atencion2 = $_POST['alta_hrs2_es'];
$var_tipo_sector = $_POST['tipo_sector'];

$numCamposTel = $_POST['send_num_campos_telefono'];
$numCamposEmail = $_POST['send_num_campos_email'];

//echo '<script language = "javascript"> alert("Nombre es: ' . $var_grupo . '");</script>';

$consultarGrupo = "select * from gpo_corp where id_gpo_corp = '".$var_grupo."'";
$resultado_consulta_grupo = mysqli_query($conexion, $consultarGrupo);
while ($row = mysqli_fetch_array($resultado_consulta_grupo, MYSQLI_ASSOC)) {
    $razonSocialGrupo = $row['nombre'];
}

//echo '<script language = "javascript"> alert("numero de filas: ' . $razonSocialGrupo . '");</script>';

if ($numCamposEmail >= 2) {
    for ($i = 2; $i <= $numCamposEmail; $i++) {
        array_push($correos, $_POST["correo" . $i]);
    }
} else {
    
}

if ($numCamposTel >= 2) {
    for ($i = 2; $i <= $numCamposEmail; $i++) {
        array_push($telefonos, $_POST["telefono" . $i]);
    }
} else {
    
}

//errores.......................................................................
//validar nombre....................................................................................................................................................................
if (empty($var_nombre_es)) {
    array_push($errores, "Nombre de la estación vacio");
}
//validar numero estacion....................................................................................................................................................................
if (empty($var_num_es)) {
    $var_num_es = hexadecimalAzar(5);
    $query_estaciones = mysqli_query($conexion, "select * from estacion_servicio where es = '" . $var_num_es . "'");
    $filas = mysqli_num_rows($query_estaciones);
    //echo '<script language = "javascript"> alert("numero de filas: ' . $filas . '");</script>';
    if ($filas != 0) {
        $var_num_es = hexadecimalAzar(5);
    }
    echo '<script language = "javascript"> alert("Se Genero aleatoriamente el numero de estacion: ' . $var_num_es . '");</script>';
    //array_push($warnings, "Se genero automaticamente el numero de estacion: '.$var_num_es.'");
} else {
    if (strlen($var_num_es) < 5 || strlen($var_num_es) > 5) {
        array_push($errores, "Número de estación invalido");
    } else {
        $patron_num_es = "/[0-9]{5}/";
        if (preg_match($patron_num_es, $var_num_es) == 0) {
            array_push($errores, "Número de estación invalido");
        }
    }
}
//validar Sector
if(empty($var_tipo_sector)){
    array_push($errores, "Sector no valido");
}else{
    if($var_tipo_sector == "Selecciona"){
        array_push($errores, "Seleccione sector");
    }
}

//validar RFC....................................................................................................................................................................
if (empty($var_rfc_es)) {
    array_push($errores, "RFC vacio");
} else {
    $patron_rfc_es = "/^([A-ZÑ\x26]{3,4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])([A-Z]|[0-9]){2}([A]|[0-9]){1})?$/";
    if (preg_match($patron_rfc_es, $var_rfc_es) == 0) {
        array_push($errores, "RFC invalido");
    }
}
//validar direccion....................................................................................................................................................................
if (empty($var_direccion)) {
    array_push($errores, "Direccion vacia");
}
//validar estado....................................................................................................................................................................
if ($var_estado != 'Selecciona') {
    
} else {
    array_push($errores, "No se selecciono un estado");
    array_push($errores, "No se selecciono un municipio");
    array_push($errores, "No se selecciono un C.P");
}
//validar municipios....................................................................................................................................................................
if ($var_municipio != 'Selecciona un municipio') {
    
} else {
    array_push($errores, "No se selecciono un municipio");
    array_push($errores, "No se selecciono un C.P");
}
//validar codigo postal....................................................................................................................................................................
if ($var_codigopostal != "Selecciona un codigo Postal") {
    
} else {
    array_push($errores, "No se selecciono un C.P");
}
//validar email....................................................................................................................................................................
if (empty($var_email)) {
    array_push($errores, "Email vacio");
} elseif ($numCamposEmail >= 2) {
    if (!empty($var_email) && !empty($correos)) {
        $patron_correo = "/\S+@\S+\.\S+/";
        if (preg_match($patron_correo, $var_email) == 0) {
            array_push($errores, "Email invalido");
        }
        for ($i = 0; $i < sizeof($correos); $i++) {
            if (preg_match($patron_correo, $correos[$i]) == 0) {
                array_push($errores, "Email invalido " . $correos[$i]);
            }
        }
    }
} else {
    if (!empty($var_email)) {
        $patron_correo = "/\S+@\S+\.\S+/";
        if (preg_match($patron_correo, $var_email) == 0) {
            array_push($errores, "Email invalido");
        }
    }
}
//validar telefono....................................................................................................................................................................
if (empty($var_telefono)) {
    array_push($errores, "Num. de telefonos vacio");
} else if ($numCamposTel >= 2) {
    if (!empty($var_telefono) && !empty($telefono2)) {
        $patron_telefono = "/[0-9]{7,10}/";
        if (preg_match($patron_telefono, $var_telefono) == 0) {
            array_push($errores, "Num. de telefono invalido");
        }
        for ($i = 0; $i < sizeof($telefonos); $i++) {
            if (preg_match($patron_telefono, $telefonos[$i]) == 0) {
                array_push($errores, "Num. de telefono invalido " . $telefonos[$i]);
            }
        }
    } else {
        if (!empty($var_telefono) && !empty($telefono2)) {
            $patron_telefono = "/[0-9]{7,10}/";
            if (preg_match($patron_telefono, $var_telefono) == 0 && preg_match($patron_telefono, $telefono2) == 0) {
                array_push($errores, "Num. de telefono invalido");
            }
        }
    }
}

//validar actividad....................................................................................................................................................................
if (empty($var_actividad)) {
    array_push($errores, "Actividad vacia");
}
//validar inicio operaciones....................................................................................................................................................................
if (empty($var_inicio_operaciones)) {
    array_push($errores, "Fecha vacia");
}
//validar horario atencion....................................................................................................................................................................
if (empty($var_horario_atencion1) || empty($var_horario_atencion2)) {
    array_push($errores, "Horario de atención vacio");
}
//Insertar a la base de datos
if (empty($errores)) {
    //consultar si la estacion de servicio o el numero de la estacion no se encuentran registrados
    $query = mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE es='" . $var_num_es . "'");
    $numrows = mysqli_num_rows($query);
    if ($numrows == 0) {
        $sql = "INSERT INTO estacion_servicio(nombre_es, es, tipo_sector , alias, rfc, direccion, nacionalidad, estado, municipio, cp, act_principal, inicio_operaciones, hora_inicio_act, hora_fin_act, id_gpo) VALUES"
                . "('$var_nombre_es','$var_num_es','$var_tipo_sector','$var_alias','$var_rfc_es','$var_direccion','$var_nacionalidad','$var_estado','$var_municipio','$var_codigopostal','$var_actividad','$var_inicio_operaciones','$var_horario_atencion1','$var_horario_atencion2','$var_grupo')";
        //echo '<script language = "javascript"> alert("'.$sql.'");</script>';
        $resultado = mysqli_query($conexion, $sql);

        $consulta_tabla_es = "select * from estacion_servicio where es='".$var_num_es."'";
        $query = mysqli_query($conexion, $consulta_tabla_es);

        while ($row = mysqli_fetch_assoc($query)) {
            $consultar_id = $row['id'];
        }
        if (!empty($var_email) && empty($correos)) {
            $sql_correo = "INSERT INTO correo(correo, id_es) values ('" . $var_email . "','" . $consultar_id . "')";
            $result_email = mysqli_query($conexion, $sql_correo);
        } else if ($numCamposEmail >= 2) {
            $sql_correo = "INSERT INTO correo(correo, id_es) values ('" . $var_email . "','" . $consultar_id . "')";
            $result_email = mysqli_query($conexion, $sql_correo);
            if ($result_email) {
                for ($i = 0; $i < sizeof($correos); $i++) {
                    $sql_correo = "INSERT INTO correo(correo, id_es) values ('" . $correos[$i] . "','" . $consultar_id . "')";
                    $result_email = mysqli_query($conexion, $sql_correo);
                    if ($result_email) {
                        //echo '<script language = "javascript"> alert("si se pudo");</script>';
                    } else {
                        echo '<script language = "javascript"> alert("ocurrio un error");</script>';
                    }
                }
            }
        }

        if (!empty($var_telefono) && empty($telefonos)) {
            $sql_tel = "INSERT INTO telefono(num, id_es) values ('" . $var_telefono . "','" . $consultar_id . "')";
            $result_tel = mysqli_query($conexion, $sql_tel);
        } else if ($numCamposTel >= 2) {
            $sql_tel = "INSERT INTO telefono(num, id_es) values ('" . $var_telefono . "','" . $consultar_id . "')";
            $result_tel = mysqli_query($conexion, $sql_tel);
            if ($result_tel) {
                for ($i = 0; $i < sizeof($telefonos); $i++) {
                    $sql_tel = "INSERT INTO telefono(num, id_es) values ('" . $telefonos[$i] . "','" . $consultar_id . "')";
                    $result_tel = mysqli_query($conexion, $sql_tel);
                    if ($result_email) {
                        //echo '<script language = "javascript"> alert("si se pudo");</script>';
                    } else {
                        echo '<script language = "javascript"> alert("Ocurrio un error");</script>';
                    }
                }
            }
        }
        //Generacion de alarmas---------------------------------------------------------
$estado_estacion_alarma=$var_estado;        
$sector=$var_tipo_sector;        
 
$array= calcular_dias($estado_estacion_alarma,$sector);
$tamaño= sizeof($array);

    $INSERT_Alarmas_Sasisopa= mysqli_query($conexion, "INSERT INTO alarmas_sasisopa (Primer_mes,Primer_año,Segundo_mes,Segundo_año,Tercer_mes,Tercer_año,id_es) values "
    . "('$array[0]','$array[1]','$array[2]','$array[3]','$array[4]','$array[5]','$consultar_id')");
    if ($INSERT_Alarmas_Sasisopa) {
        $SELECT_Alarmas_Sasisopa = mysqli_query($conexion, "SELECT * FROM alarmas_sasisopa where id_es='".$consultar_id."'");
    while ($row_SELECT_Alarmas_Sasisopa = mysqli_fetch_assoc($SELECT_Alarmas_Sasisopa)) {    
     $varSelectAlarmas_id_alarma=$row_SELECT_Alarmas_Sasisopa['id_alarma'];
    }
    $main= calcular_dias_alarma($array);
    $max= sizeof($main);
for($i=0; $i<$max; $i++){
$max1= sizeof($main[$i]);
echo 'Mes '.$i;?><br><?php
for ($j=0; $j<$max1; $j++){
$fecha = $main[$i][$j];    
    $INSERT_Fechas_Alarmas= mysqli_query($conexion, "INSERT INTO fechas_alarmas (fecha,estado,id_alarma) values ('$fecha',FALSE,'$varSelectAlarmas_id_alarma')");   
}
}
    
   }


//Fin Generacion de alarmas.....................................................        

        if ($resultado) {
            ?>
            <script language="javascript">
                aviso("<a class=\"msj_es_ex fas fa-check\" id=\"succes\">Estación de servicio registrada!</a>");
            </script> 
            <?php
            $root_folder = '../../../../../System/Grupos/';

            if (!file_exists($root_folder)) {
                mkdir($root_folder, 0777);
                createFile($root_folder."index.php");
            }
            
            $RS_SN_ESPACIOS = noEspacios($razonSocialGrupo);
            
            //echo '<script language = "javascript"> alert("numero de filas: ' . $RS_SN_ESPACIOS . '");</script>';

            $path_folder = '../../../../../System/Grupos/' . $RS_SN_ESPACIOS;

            if (!file_exists($path_folder)) {
                mkdir($path_folder, 0777);
                createFile($path_folder."index.php");
            }
            

            $path_dir_es = $path_folder . "/ES/";
            if (!file_exists($carpeta)) {
                mkdir($carpeta, 0777);
                createFile($path_dir_es."index.php");
            }
            
            //$path_dir_es = '../../../../../System/ES/';

            if (!file_exists($path_dir_es)) {
                mkdir($path_dir_es, 0777);
                createFile($path_dir_es."index.php");
            }
            
            
            
            //echo '<script language = "javascript"> alert("Creaste los directorios ?¿");</script>';
            mkdir($path_dir_es."E.S." . $var_num_es, 0777);
            createFile($path_dir_es."E.S." . $var_num_es."/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tablero_principal", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tablero_principal/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/E.S", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/E.S/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_rp", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_rp/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Islas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Islas/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Insumos_indirectos", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Insumos_indirectos/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Botes_de_basura", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Botes_de_basura/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Extintores", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Extintores/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Paros_de_emergencia", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Paros_de_emergencia/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Registros_de_rejillas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Registros_de_rejillas/index.php");
            
            mkdir($path_dir_es."E.S." .$var_num_es . "/levantamiento de campo/Trampa_de_combustibles", 0777);
            createFile($path_dir_es."E.S." .$var_num_es . "/levantamiento de campo/Trampa_de_combustibles/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_almacenamiento", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_almacenamiento/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tubos_de_venteo", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tubos_de_venteo/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tierras_Fisicas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Tierras_Fisicas/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Para_rayos", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Para_rayos/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_jardines", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Area_de_jardines/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Rutas_de_evacuacion", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Rutas_de_evacuacion/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Punto_de_reunion", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Punto_de_reunion/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Plan_de_contingencias", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Plan_de_contingencias/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Barda_perimetral", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Barda_perimetral/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cisterna", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cisterna/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Rotoplas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Rotoplas/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Señalizacion_miusvalidos", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Señalizacion_miusvalidos/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Baños", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Baños/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Baños_empleados", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Baños_empleados/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_control", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_control/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto de maquinas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto de maquinas/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto de electrico", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto de electrico/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Compresor", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Compresor/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Planta de emergencia", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Planta de emergencia/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Bomba_contra_incendio", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Bomba_contra_incendio/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Hidroneumatico", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Hidroneumatico/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_limpios", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_limpios/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_sucios", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Cuarto_de_sucios/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Bodega", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Bodega/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Oficinas", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Oficinas/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Facturacion", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Facturacion/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Vedeer_root", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/levantamiento de campo/Vedeer_root/index.php");
            
            
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/1", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/1/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/2", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/2/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/3", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/3/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/4", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/4/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/5", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/5/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/6", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/6/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/7", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/7/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/8", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/8/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/9", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/9/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/10", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/10/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/11", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/11/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/12", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/12/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/13", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/13/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/14", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/14/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/15", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/15/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/16", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/16/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/17", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/17/index.php");
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/SASISOPA/18", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/SASISOPA/18/index.php");
            
            
            
            mkdir($path_dir_es."E.S." . $var_num_es . "/Tramites/", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/Tramites/index.php");
            
            

            mkdir($path_dir_es."E.S." . $var_num_es . "/Temporal/", 0777);
            createFile($path_dir_es."E.S." . $var_num_es . "/Temporal/index.php");
        } else {
            array_push($errores, "Error al ingresar datos de la informacion!");
        }
    } else {
        array_push($errores, "Nombre o numero de estacion ya registrados");
    }
}


//mostrar errores.................................................................................................................
$max = sizeof($errores);
$string = "";
if ($max > 0) {
    $string = "<h4>Ocurrieron los siguientes errores:</h4><br>";
    for ($i = 0; $i < $max; $i++) {
        $string = $string . "<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">" . $errores[$i] . "</a><br>";
    }
    ?>
    <script language="javascript">
        erroresalert('<?php echo $string ?>');
    </script> <?php
}

//mostrar advertencias.................................................................................................................
$max = sizeof($warnings);
$string = "";
if ($max > 0) {
    $string = "<h4>Advertencias </h4><br>";
    for ($i = 0; $i < $max; $i++) {
        $string = $string . "<a class=\"msj_gpo_warr fas fa-exclamation-triangle\" id=\"error_datosgenerales\">" . $warnings[$i] . "</a><br>";
    }
    ?>
    <script language="javascript">
        warningAlert('<?php echo $string ?>');
    </script> <?php
}
?>