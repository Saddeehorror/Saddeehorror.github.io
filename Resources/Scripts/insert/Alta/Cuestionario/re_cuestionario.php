<?php
$errores = array();
$succes = array();
$var_es=$_POST['select_es'];
$var_gm_numtank=$_POST['gm_numtank'];
$var_gm_numtank_p=$_POST['gm_numtank_p'];
$var_gm_captank=$_POST['gm_captank'];
$var_gm_captank_p=$_POST['gm_captank_p'];
$var_gm_obs=$_POST['gm_obs'];
$var_gp_numtank=$_POST['gp_numtank'];
$var_gp_numtank_p=$_POST['gp_numtank_p'];
$var_gp_captank=$_POST['gp_captank'];
$var_gp_captank_p=$_POST['gp_captank_p'];
$var_gp_obs=$_POST['gp_obs'];
$var_d_numtank=$_POST['d_numtank'];
$var_d_numtank_p=$_POST['d_numtank_p'];
$var_d_captank=$_POST['d_captank'];
$var_d_captank_p=$_POST['d_captank_p'];
$var_d_obs=$_POST['d_obs'];
$var_dm_numtank=$_POST['dm_numtank'];
$var_dm_numtank_p=$_POST['dm_numtank_p'];
$var_dm_captank=$_POST['dm_captank'];
$var_dm_captank_p=$_POST['dm_captank_p'];
$var_dm_obs=$_POST['dm_obs'];
$inv_est=$_POST['inv_estimada'];
$domicilio_not=$_POST['Domicilio_oiryrecibir'];
$camara_pertenece=$_POST['camara_pertenece'];
$num_proyectos_asociados=$_POST['num_proyectos'];
$proyecto = array();
$arrendado=array();
$propio=array();
$adm=$_POST['num_adm'];
$obreros=$_POST['despachadores'];
$personal_proyecto_asociado=$_POST['proyecto_asociado'];
$personal_adm_nombre=array();
$personal_adm_puesto=array();
$personal_adm_horario=array();
$personal_adm_descanso=array();
$personal_despachadores_nombre=array();
$personal_despachadores_puesto=array();
$personal_despachadores_horario=array();
$personal_despachadores_descanso=array();
$abs_agua=$_POST['abs_agua'];
$cap_fosa=$_POST['cap_fosa'];
$num_contrato=$_POST['num_contrato'];
$num_equipos=$_POST['num_equipos'];
$nombre = array();
$cap= array();
$quemador= array();
$combustible= array();
$precalienta=array();
$consumo=array();
$uso=array();
$num_motobombas=$_POST['num_motobombas'];
$cap_motobombas=$_POST['cap_motobombas'];
$num_dispensarios=$_POST['num_dispensarios'];
$mod_sencillo=$_POST['mod_sencillo'];
$mod_doble=$_POST['mod_doble'];
$mod_satelite=$_POST['mod_satellite'];
$num_mang_mag=$_POST['num_mag_magna'];
$num_mang_prem=$_POST['num_mag_prem'];
$num_mang_diesel=$_POST['num_mag_diesel'];
$fv_magna=$_POST['fv_magna'];
$fv_premium=$_POST['fv_prem'];
$fv_diesel=$_POST['fv_diesel'];
$fv_dieselmarino=$_POST['fv_dieselmarino'];
$cisternaorotoplas=$_POST['admin'];
$cap_cisternaorotoplas=$_POST['cap_cisterna'];
$venta_magna=$_POST['vent_magna'];
$venta_premium=$_POST['vent_premium'];
$venta_diesel=$_POST['vent_diesel'];
$venta_dieselmarino=$_POST['vent_dieselmarino'];
$plano_conjunto=$_POST['plano_conj'];
$plano_hidrosanitario=$_POST['plano_hidro'];
$plano_areaspeligrosas=$_POST['plano_areas'];

//1.- Seleccione una estación.....................................................................................................................
if ($var_es!="Seleccione una estación") {
    array_push($errores,"1.- ".$var_es);
}else{
 array_push($errores, "1.-Seleccione una Estación");
}
//2.-Productos.....................................................................................................................................
    //GASOLINA MAGNA...................................................
    if ($var_gm_numtank!="" || $var_gm_captank="" || $var_gm_obs=""){ //si numero de tankes o capacidad o observaciones es diferente de vacio...
//echo '<script language="javascript">alert("Numero de tanques: '.$var_gm_numtank.', Plano: '.$var_gm_numtank_p.', Capacidad: '.$var_gm_captank.', Plano: '.$var_gm_captank_p.', obs: '.$var_gm_obs.'");</script>';
        if ($var_gm_numtank!="" && $var_gm_numtank!=0) {
            if (is_numeric($var_gm_numtank)) {
                if ($var_gm_numtank_p=="Selecciona") {
                    array_push($errores, "2.1.-Especificar si el numero de tanques coincide con el plano");      
                }
                if ($var_gm_captank==0 || $var_gm_captank=="") {
                    array_push($errores, "2.1.-Especificar la capacidad por tanque");      
                }else{
                 $patron_cap="/^([0-9]+(,[0-9]+)*){1,$var_gm_numtank}$/";   
                    if (preg_match($patron_cap, $var_gm_captank)==0) {
                    array_push($errores,"2.1.-Verifca la capacidad de los tanques");    
                    }    
                }
            }     
        }    
}else{
    $var_gm_numtank="NONE";
    $var_gm_captank="NONE";
    $var_gm_numtank_p="NONE";
    $var_gm_captank_p="NONE";
    $var_gm_obs="NONE";
}    



//3.-Inv Estimada.................................................................................................................................
if ($inv_est!="") {
        $formato_inv="/^([0-9]+([.]*[0-9]*))?$/";
    if (preg_match($formato_inv, $inv_est)==0){
    array_push($errores, "3.-Inv estimada debe ser un digito");    
}
}else{
    $inv_est=0;
    array_push($errores,"3.- Debe especificar la Inversión");    
}
//4.-Domicilio para oir y recibir notificaciones..................................................................................................
if (empty($domicilio_not)) {
    array_push($errores, "4.- Domicilio para notificaciónes vacio");      
}
//5.-Camara y/o asociacion a la que pertenece la empresa:........................................................................................
if (empty($camara_pertenece)) {
    array_push($errores, "5.-vacio");      
}
//6.-Proyectos asociados:-----------------------------------------------------------------------------------------------------------------------
for ($i=0;$i<$num_proyectos_asociados;$i++){
    $numero=$i+1;
    if ($_POST["proyecto".$i]!="") {
        if ($_POST["arrendado".$i]!="Selecciona" && $_POST["propio".$i]!="Selecciona") {
            if ($_POST["arrendado".$i]==0 && $_POST["propio".$i]==0 ||$_POST["arrendado".$i]==1 && $_POST["propio".$i]==1 ) {
                array_push($errores, "6.".$numero.".- Especifique si el proyecto es arrendado o propio");    
            }else{
                array_push($proyecto,$_POST["proyecto".$i]);
                array_push($arrendado,$_POST["arrendado".$i]);
                array_push($propio,$_POST["propio".$i]);
            }
        }else{
            array_push($errores, "6.".$numero.".- Especifique si el proyecto es arrendado o propio");    
        }   
    }else if ($_POST["arrendado".$i]!='Selecciona'||$_POST["propio".$i]!='Selecciona'){
        array_push($errores, "6.".$numero.".- Especifique el nombre del proyecto");    
    }
}
//7.-Número de empleos y puestos generados:
//mostrar errores.................................................................................................................
 $max = sizeof($errores);
 $string="";
 if ($max>0) {
 $string="<h4>Ocurrieron los siguientes errores:</h4><br>";
for ($i=0; $i<$max; $i++){
$string=$string."<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">".$errores[$i]."</a><br>";
}
?>
<script language="javascript">     
erroresalert('<?php echo $string?>');
</script> <?php 
}
//correctos.......................................................................................................................
 $maxx = sizeof($succes);
 $stringg="";
 if ($maxx>0) {
 $stringg="<h4>Los datos correctos son:</h4><br>";
for ($ix=0; $ix<$maxx; $ix++){
$stringg=$stringg."<a class=\"msj_es_ex fas fa-check\" id=\"succes\">".$succes[$ix]."</a><br>";
}
?>
<script language="javascript">     
aviso('<?php echo $stringg?>');
</script> <?php 
}