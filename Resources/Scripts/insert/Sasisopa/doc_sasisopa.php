<?php
session_start();

$estacion=$_POST['num_es'];

$numcarpeta=$_POST['nummenu'];

$max = strlen($estacion);
$directorio="";


switch ($numcarpeta) {
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

$directorio = opendir("../../../../System/ES/E.S.".$estacion."/ASISOPA/".$numcarpeta."/"); //ruta actual

//echo '<script language="javascript">alert("'.$estacion.','.$numcarpeta.'");</script>';
?>
<H2 class="titulo_sasisopa_folder">Carpeta: <?php echo $numcarpeta;?>.- <?PHP echo $nombre_carpeta ?></H2>
<div class="contenedor_archivos_a">
    
<?php
while ($archivo = readdir($directorio)) //obtenemos un archivo y luego otro sucesivamente
{
    if (is_dir($archivo))//verificamos si es o no un directorio
    {
        //echo "[".$archivo . "]<br />"; //de ser un directorio lo envolvemos entre corchetes
    }
    else
    {
        //echo $archivo . "<br />";
        ?>
<a href="#" onclick="window.open('../../System/ES/E.S.<?php echo $estacion ?>/ASISOPA/<?php echo $numcarpeta?>/<?php echo $archivo;?>')">Doc <?php echo $archivo;?></a><br>


<?php
    }
}
if ($_SESSION['session_group']!=3) {
    

?>

</div>
<form id="upload_files_sasisopa" method="post" class="upload_files_sasisopa" onsubmit="return upload_files_sasisopa('<?php echo $numcarpeta?>','<?php echo $estacion?>');">
<input class="docments" type="file" id="docments" name="docments">
<input type="text" name="num_carpeta" value="<?php echo $numcarpeta?>" style="display: none">
<input type="text" name="num_estacion" value="<?php echo $estacion?>" style="display: none">
<input id="subir" name="subir" type="submit" value="Subir">    
</form>

<div id="doc_sasisopa_upload">
    
</div>
<?php }