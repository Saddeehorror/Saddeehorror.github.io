<?php
$errores = array();
$num_es=$_POST['selectes'];

if (!empty($num_es) && $num_es!="Seleccione una estación") {

}else{
  array_push($errores, "Seleccione una estacion");  
}

if (empty($errores)) {
     ?>    
        <script language="javascript">     
         get_es(<?PHP echo $num_es ?>);
        </script> <?php     
}
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



