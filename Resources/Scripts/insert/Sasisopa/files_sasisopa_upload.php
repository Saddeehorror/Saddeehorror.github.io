<?php
$mensaje=array();
$errores=array();
require '../../Conect.php';
require '../../funcionesPHP/Funciones.php';
//DIRECTORIOS
$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.es= '".$_POST['es_sasisopa_file']."'");
    while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
        $nombre_grupo=$row_grpo['nombre'];   
    }
$name = noespacios($nombre_grupo);
//FIN DIRECTORIOS        

//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
$num_files=0;
$files_error=0;
foreach($_FILES["input_file_sasisopa"]['tmp_name'] as $key => $tmp_name){
    //Validamos que el archivo exista
    if($_FILES["input_file_sasisopa"]["name"][$key]) {
        $num_files++;
	$filename = $_FILES["input_file_sasisopa"]["name"][$key]; //Obtenemos el nombre original del archivo
	$source = $_FILES["input_file_sasisopa"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
        $filetype = $_FILES['input_file_sasisopa']['type'][$key]; //Obtenemos el tipo de archivo
        
        if ($filetype!="application/pdf") {
            $files_error++;
            ?>
            <script language="javascript">  
              alertify.error('<span Style="Color:white"><?php echo $filename ?> No es un documento PDF</span>');
            </script>
            <?php   
        }else{
            $directorio = '../../../../System/Grupos/'.$name.'/ES/E.S.'.$_POST['es_sasisopa_file'].'/SASISOPA/'.$_POST['sasisopa_folder'].'/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
            //Validamos si la ruta de destino existe, en caso de no existir la creamos
            if(!file_exists($directorio)){
		mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
            }
            $dir=opendir($directorio); //Abrimos el directorio de destino
            $target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
            //Movemos y validamos que el archivo se haya cargado correctamente
            //El primer campo es el origen y el segundo el destino
            if(move_uploaded_file($source, $target_path)) {	
                array_push($mensaje, $filename);
            } else {	
                array_push($errores, $filename);		
            }
            closedir($dir); //Cerramos el directorio de destino            
        }
    }
}


if ($files_error==$num_files) {
    $ul_mensaje="<span class=\"fas fa-times-circle fa-2x\" style=\"vertical-align:middle;color:#C22503;\"></span><strong> Tipo de formato Incorrecto</strong>";    
    ?>
        <script>   
            alertify.confirm('<?php echo $ul_mensaje?>').autoOk(4); 
        </script>
    <?php 
}else{
  if (!empty($mensaje)){
    $tamaño_mensaje= sizeof($mensaje);
    $mostrar_mensaje='';
        for ($i=0;$i<$tamaño_mensaje;$i++){
         $mostrar_mensaje=$mostrar_mensaje."<li><strong>".$mensaje[$i].'</strong></li><br>';   
        }
    $ul_mensaje="<span class=\"fa fa-check fa-2x\" style=\"vertical-align:middle;color:#64dd17;\"></span> Archivos Cargados con Exito <ul>".$mostrar_mensaje."</ul>";    
?>
    <script>   
 alertify.confirm('<?php echo $ul_mensaje?>', 
 function(){ return reload_folder('<?php echo $_POST['sasisopa_folder'] ?>','<?php echo $_POST['es_sasisopa_file'] ?>') }).autoOk(4); 
    </script>
<?php 
}  
}


