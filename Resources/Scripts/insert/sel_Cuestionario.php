<?php
session_start();
require '../Conect.php';
$errores = array();
$estacion = $_POST['SELECT'];
if ($estacion != 'Seleccione una estación') {
 $_SESSION['nombre_es_select']=$estacion;
}else{
   array_push($errores, "Seleccione una estación para continuar");
}

 $max = sizeof($errores); ?>
<div class="error_datosgenerales">
<?php
for ($i=0; $i<$max; $i++){
echo "<a class=\"msj_gpo_err fas fa-times\" id=\"error_datosgenerales\">".$errores[$i]. "</a><br>" ;
}
?>
</div>