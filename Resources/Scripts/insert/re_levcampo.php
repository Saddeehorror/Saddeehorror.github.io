<?php
session_start();
require '../Conect.php';
$errores = array();
$upload = array();
$nombre_es=$_POST['select_es'];
$file_02=$_FILES["lev_campo_02"];
$file_03=$_FILES["lev_campo_03"];
$avatar=null;
//nombre_es.....................................................................................................
if ($nombre_es != "Seleccione una estación") {

    
}else{
      array_push($errores, "Seleccione una E.S.");  
}

//no errores....................................................................................................
if (empty($errores)) {
//2.Tablero principal...........................................................................................
if (!empty($file_02["name"])) {
$file = $_FILES["lev_campo_02"];
$nombre = $file["name"];   
$tipo = $file["type"];
$ruta_provisional = $file["tmp_name"];
$carpeta = "../../../System/ES/E.S.".$nombre_es."/levantamiento de campo/Tablero_principal/";
    $string_sin_modificar = $tipo;
    $tipoimg=null;
    if ($tipo!='image/png'&& $tipo!='image/gif') {
     $tipoimg='.jpg';   
    }elseif ($tipo!= 'image/jpg'&& $tipo!='image/gif') {
      $tipoimg='.png';       
    }elseif ($tipo!= 'image/jpg' && $tipo!='image/png') {
    $tipoimg='.gif';         
    }
     //echo '<script language="javascript">alert("'.$tipo.'");</script>'; 
        $imgname="IMG_Tablero Principal".$tipoimg; 
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      array_push($errores, "2.- No es un archivo de imagen");  
    }
    else
    {
        $src = $carpeta.$imgname;
        
        if (move_uploaded_file($ruta_provisional, $src)){
       //echo '<script language="javascript">alert("Archivo de: 2.- Tablero principal subido con exito!");</script>';
             array_push($upload, "Archivo de: 2.- Tablero principal subido con exito!");  

        }else{
        echo '<script language="javascript">alert("Ocurrio un error al subir los archivos");</script>';        
        }
    } 
}
//3. E.S. COMPLETA
if (!empty($file_03["name"])) {
$file = $_FILES["lev_campo_03"];
$nombre = $file["name"];   
$tipo = $file["type"];
$ruta_provisional = $file["tmp_name"];
$carpeta = "../../../System/ES/E.S.".$nombre_es."/levantamiento de campo/E.S/";
    $string_sin_modificar = $tipo;
    $tipoimg=null;
    if ($tipo!='image/png'&& $tipo!='image/gif') {
     $tipoimg='.jpg';   
    }elseif ($tipo!= 'image/jpg'&& $tipo!='image/gif') {
      $tipoimg='.png';       
    }elseif ($tipo!= 'image/jpg' && $tipo!='image/png') {
    $tipoimg='.gif';         
    }
        $imgname="IMG_E.S".$tipoimg; 
    if ($tipo != 'image/jpg' && $tipo != 'image/jpeg' && $tipo != 'image/png' && $tipo != 'image/gif')
    {
      array_push($errores, "3.- No es un archivo de imagen");  
    }
    else
    {
        $src = $carpeta.$imgname;
        
        if (move_uploaded_file($ruta_provisional, $src)) {
          //       echo '<script language="javascript">alert("Archivo de: 3.- E.S. Completa subido con exito!");</script>';    
            array_push($upload,"Archivo de: 3.- E.S. Completa subido con exito!");  
        }else{
                echo '<script language="javascript">alert("Ocurrio un error al subir los archivos");</script>';        
    
        }
    }
    
}
$size = sizeof($upload);
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
}




    

//4.Area de RP


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