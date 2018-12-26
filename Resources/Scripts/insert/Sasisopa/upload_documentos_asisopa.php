<?php
//avatar
$errores = array();
$upload = array();
$num_estacion=$_POST['num_estacion'];

$num_carpeta=$_POST['num_carpeta'];

    if (!empty($_FILES["docments"])) {
$file = $_FILES["docments"];      
$nombre = $file["name"];         
               
    if (!empty($nombre)) {

        
    $file = $_FILES["docments"];
    $nombre = $file["name"];   
    $tipo = $file["type"];
    $ruta_provisional = $file["tmp_name"];
    $size = $file["size"];
    $dimensiones = getimagesize($ruta_provisional);
    $width = $dimensiones[0];
    $height = $dimensiones[1];
    $carpeta = "../../../../System/ES/E.S.".$num_estacion."/ASISOPA/".$num_carpeta."/";
    //$carpeta="../../../../system/";
    $string_sin_modificar = $tipo;

    
    $imgname=$nombre; 
    if ($tipo != 'application/pdf')
    {
         array_push($errores, "Solo se pueden cargar archivos .pdf");    

    }
    else{
        
        $src = $carpeta.$imgname;
        //echo "<img src='$src'>";
        if (move_uploaded_file($ruta_provisional, $src)){

      // echo '<script language="javascript">alert("Archivo de: 2.- Tablero principal subido con exito!");</script>';
       array_push($upload, "El archivo se cargo correctamente!");   

        }else{
        $error="Ocurrio un problema al cargar el archivo";        
        }
    }            
            
            
            
        //echo '<script language="javascript">alert("'.$src.'");</script>';    
            
    }else{
        // echo '<script language="javascript">alert("vacio");</script>';
   
    }     
    

    
}else{
//echo '<script language="javascript">alert("'.$estacion.','.$numcarpeta.'");</script>';
    echo '<script language="javascript">alert("vacio");</script>';

}
//si se cargo el archvio.

$size = sizeof($upload);
//echo '<script language="javascript">alert("tamaño:'.$size.'");</script>';
$result="";
if ($size>0) {
    

for($j=0; $j<$size; $j++){
$result=$result."<a class=\"msj_es_ex fas fa-check\" id=\"succes\">".$upload[$j]."</a><br>";
}
?>
<script language="javascript">
erroresalert('<?php echo $result?>');
</script><?php
}else{
 array_push($errores, "No se a seleccionado ningun archivo");    
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