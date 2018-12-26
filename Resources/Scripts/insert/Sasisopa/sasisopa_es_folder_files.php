<?php 
require '../../Conect.php';
require '../../funcionesPHP/Funciones.php';
$id_gpo=$_POST['es'];
$folder=$_POST['folder'];

//consulta grupo es

$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.es= '".$id_gpo."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_grupo=$row_grpo['nombre'];   
}
$name = noespacios($nombre_grupo);


?>  
<div class="div-contenedor-cuerpo" id="documentacion_sasisopa_container_es_folder_files">
    <!--<header class="tooblar-header">
        <div class="span_menu_container">
            <span class="fas fa-bars btn-toggle-menu" onclick="boton_menu()"></span>
        </div>
        <span class="fas fa-arrow-left arrow-icon" onclick="show_sasisopa_cliente('documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')"></span>
        <span class="title_span">Documentacion Sasisopa</span>
        <span class="fas fa-bell bell-icon"></span>     
    </header>-->

    <div class="div-subcontenedor">
      <!--TODO CONTENT HERE-->
<?php

$max = strlen($id_gpo);
$directorio="";


switch ($folder) {
    case 1:
        $nombre_carpeta="POLITICA";
        break;
    case 2:
        $nombre_carpeta="IDENTIFICACION DE PELIGROS";
        break;
    case 3:
        $nombre_carpeta="REQUISITOS LEGALES";
        break;
        case 4:
        $nombre_carpeta="METAS OBJ E INDICADORES";
        break;
        case 5:
        $nombre_carpeta="FUNCIONES Y RESPONSABILIDADES";
        break;
        case 6:
        $nombre_carpeta="CAPACITACION Y ENTRENAMIENTO";
        break;
        case 7:
        $nombre_carpeta="COMUNICACION, PARTICIPACION";
        break;
        case 8:
        $nombre_carpeta="CONTROL DE DOCUMENTOS";
        break;
        case 9:
        $nombre_carpeta="MEJORES PRACTICAS Y ESTANDARES";
        break;
        case 10:
        $nombre_carpeta="CONTROL DE ACTIVIDADES";
        break;
        case 11:
        $nombre_carpeta="INTEGRIDAD MECANICA";
        break;
        case 12:
        $nombre_carpeta="SEGURIDAD DE CONTRATISTAS";
        break;
        case 13:
        $nombre_carpeta="PREPARACION Y RESPUESTAS";
        break;
        case 14:
        $nombre_carpeta="MONITOREO VERIFICACION Y EVALUACION";
        break;
        case 15:
        $nombre_carpeta="AUDITORIAS";
        break;
        case 16:
        $nombre_carpeta="INVESTIGACION DE INCIDENTES";
        break;
        case 17:
        $nombre_carpeta="REVISION DE RESULTADOS";
        break;
        case 18;
        $nombre_carpeta="INFORMES DE DESEMPEÑO";
        break;
}

//$directorio = opendir("../../../../System/ES/E.S.".$id_gpo."/ASISOPA/".$folder."/"); //ruta actual
$directorio = opendir("../../../../System/Grupos/".$name."/ES/E.S.".$id_gpo."/SASISOPA/".$folder."/"); //ruta actual


//echo '<script language="javascript">alert("'.$estacion.','.$numcarpeta.'");</script>';
?>
<div class="contenedor_archivos_a">
       <table class="table_sasisopa">
  <tr>
      <th>
          <span><?PHP echo $nombre_carpeta ?></span>
          <?php
          session_start();
          if ($_SESSION['session_group']==3) {   
          }else{
          ?>
          <span class="fas fa-file-upload file-icon" onclick="add_files_alert_sasisopa('<?php echo $nombre_carpeta ?>','<?php echo $folder?>','<?php echo $id_gpo?>')"></span>          
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
        <span ondblclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $id_gpo ?>/SASISOPA/<?php echo $folder?>/<?php echo $archivo;?>')"> <span class="fas fa-file-pdf"></span><span><?php echo $archivo;?></span></span>
     </td>
  </tr>

<?php

        }
    }

}
if ($contador==0) { ?>
  
    <tr>
        <td   id="files<?php echo $archivo ?>" <span class="text-center">Esta carpeta está vacía.</span>
      </td>
  </tr>
  
  
<?php  }      
?>        

<?php

?>
</table>
    </div> 
      <!--FIN TODO CONTENT-->
    </div>
</div>
<div id="upload_files_message"></div>


    
    

