<?php
require '../../Conect.php';
require '../../funcionesPHP/Funciones.php';

if (!empty($_POST['es'])) {
   $query_estacion = mysqli_query($conexion, "SELECT * FROM estacion_servicio where es='".$_POST['es']."'");
   while ($row = mysqli_fetch_array($query_estacion, MYSQLI_ASSOC)) {
       $id_es=$row['id'];
   }
   $_POST['id']=$id_es;
}else{
  
}

//HEADER------------------------------------------------------------------------
$query_estacion = mysqli_query($conexion, "SELECT * FROM estacion_servicio where id='" . $_POST['id'] . "'");
while ($row = mysqli_fetch_array($query_estacion, MYSQLI_ASSOC)) {
    if ($row['alias'] != "") {
        $alias_es = "(" . $row['alias'] . ")";
    } else {
        $alias_es = "";
    }
//FIN HEADER--------------------------------------------------------------------
//NOMBRE_GRUPO------------------------------------------------------------------


$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.id= '".$_POST['id']."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_grupo=$row_grpo['nombre'];
 $nombre_es=$row_grpo['nombre_es'];
 $es=$row_grpo['es'];
}
$name = noespacios($nombre_grupo);
//FIN NOMBRE_GRUPO--------------------------------------------------------------



$directorio = opendir("../../../../System/Grupos/".$name."/ES/E.S.".$es."/Temporal/"); //ruta actual
?>
<div class="div-contenedor-cuerpo" id="Documentacion_estaciones">
    <div class="div-subcontenedor">
    <table class="table_sasisopa" id="table_content_es"> 
        <tr>
            <th> 
                <span><?php echo $row['nombre_es'] ?> E.S. <?php echo $row['es'] ?></span>
                <?php
          session_start();
          if ($_SESSION['session_group']==3) {   
          ?>
          <span class="fas fa-file-upload file-icon" onclick="add_files_alert_document('<?php echo $nombre_es?>','Temporal','<?php echo $es?>')"></span>          
          <?php
          }
          ?>                
            </th>
        </tr>
    <?php 
    $contador=0;
    while ($archivo = readdir($directorio)){ //obtenemos un archivo y luego otro sucesivamente
    if (is_dir($archivo)){//verificamos si es o no un directorio
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }else{
        if ($archivo=="index.php") {
            
        }else{
            $contador++;
        //echo $archivo . "<br />";
        ?>
  <tr class="tr">
    <td  onclick="sasisopa_onclick('files','<?php echo $archivo?>')" id="files<?php echo $archivo ?>">
        <span ondblclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $es ?>/Temporal/<?php echo $archivo;?>')"> <span class="fas fa-file-pdf"></span><span><?php echo $archivo;?></span></span>
     </td>
  </tr>

<?php

        }
    }

}

        ?>
    </table>
    </div>
</div>

    <div id="es_content_files"></div>
    <?php
}								
?>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
      output.push('<li><strong>', escape(f.name), '</strong> - ',
      f.size, ' bytes', '</li>');
    }
    document.getElementById('list').innerHTML = '<ul>' + output.join('') + '</ul>';
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>
