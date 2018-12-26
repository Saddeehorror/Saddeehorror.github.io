

<?php
require '../../../../funcionesPHP/Funciones.php';
if (!empty($_POST['reg'])) {
}else{
  require '../../../../Conect.php';
  
}
session_start();
$id_es=$_POST['id_es'];
$tipo_tramite=$_POST['tramite'];
$id_user=$_SESSION['session_id'];
$consultar_es= mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE id='" . $_POST['id_es'] . "'");
while ($row = mysqli_fetch_assoc($consultar_es)) {
    $id_gpo = $row['id'];
    $nombre = $row['nombre_es'];
    $num_es = $row['es'];
}

$id_asunto="";
$estatus="En espera de ingreso a Asea";

//INNER JOIN GRUPO Y ESTACION
$query_grupo= mysqli_query($conexion, "SELECT * FROM gpo_corp INNER JOIN estacion_servicio ON gpo_corp.id_gpo_corp=estacion_servicio.id_gpo where estacion_servicio.es= '".$num_es."'");
while ($row_grpo= mysqli_fetch_array($query_grupo , MYSQLI_ASSOC)){
 $nombre_gpo=$row_grpo['nombre'];   
}
$name=noEspacios($nombre_gpo);
//FIN ESTACION------------------------------------------------------------------
$consultar_asuntos= mysqli_query($conexion, "SELECT * FROM asuntos_asea WHERE id_es='".$_POST['id_es']."' and nombre_asunto='".$tipo_tramite."'");
$numero_filas=mysqli_num_rows($consultar_asuntos);

if($numero_filas!=0){
while ($resultado_consultar_asuntos=mysqli_fetch_assoc($consultar_asuntos)){
    $id_asunto=$resultado_consultar_asuntos['id_asunto'];
    $fecha_ingreso_sistema=$resultado_consultar_asuntos['fecha_ingreso_sistema'];
    $fecha_ingreso_asea=$resultado_consultar_asuntos['fecha_ingreso_asea'];
    $asunto=$resultado_consultar_asuntos['nombre_asunto'];
    $acuce_de_recibo=$resultado_consultar_asuntos['acuce_de_recibo'];
    $periodo=$resultado_consultar_asuntos['periodo_de_cumplimiento'];
    $p1_f1=$resultado_consultar_asuntos['periodo1_fecha1'];
    $p1_f2=$resultado_consultar_asuntos['periodo1_fecha2'];
    $p2_f1=$resultado_consultar_asuntos['periodo2_fecha1'];
    $p2_f2=$resultado_consultar_asuntos['periodo2_fecha2'];
    $id_es=$resultado_consultar_asuntos['id_es'];
    $id_user=$resultado_consultar_asuntos['id_user'];
}

    


switch ($_POST['tramite']) {
    case 'MIA':
       $titulo = "Manifestación de Impacto Ambiental";
        break;
    case 'IP':
        $titulo = "Informe Preventivo";
        break;
    case 'AIO':
        $titulo = "Aviso de Inicio Opereraciónes antes 1988";
        break;
    case 'MPA':
        $titulo= "Modificación de Proyectos Autorizados";
        break;
    case 'CDT':
        $titulo= "Cambio de Titularidad";
        break;
        case 'TyC':
        $titulo="Terminos y Condicionantes";
        break;
        case 'LUA':
        $titulo="Licencia Ambiental Unica";
        break;
    case 'MOD LUA':
        $titulo="Modificación de la LAU";
        break;
    case 'COA':
        $titulo="Cédula de Operación Anual";
        break;
    case 'AEG':
        $titulo="Alta Como Empresa Generadora";
        break;
    case 'MOD AEG':
        $titulo="Modificación de la AEG";
        break;
}
?>



<div class="div-contenedor-cuerpo Contenedor_caracteristicas" id="asuntos_asea.php">
    <!--<header class="tooblar-header">
        <div class="span_menu_container">
            <span class="fas fa-bars btn-toggle-menu" onclick="boton_menu()"></span>
        </div>
        <span class="fas fa-arrow-left arrow-icon" onclick="show_table_seguimiento()"></span>
        <span class="title_span"> Información del Asunto</span>
        <span class="fas fa-bell bell-icon"></span>     
    </header>-->
    <div class="div-subcontenedor">
<!--TODO CONTENT HERE-->

        <form name="actualizar_info_tramite" id="actualizar_info_tramite" method="post" class="actualizar_info_tramite" enctype="multipart/form-data" onsubmit="return actualizartramite()">
            <input type="hidden" name="id_es" value="<?php echo $id_es ?>">
            <input type="hidden" name="tipo_tramite" value="<?php echo $tipo_tramite ?>" >
            <table class="table_caracteristicas">
                <tr>
                    <th Colspan = "2" class="Encabezado"><?php echo $titulo ?> </th>
                </tr>
                <tr>
                    <th class="Encabezados_secundarios"><?php echo $nombre; ?></th>
                    <th class="Encabezados_secundarios"><?php echo $num_es; ?></th>
                </tr>
                <tr>
                    <td>Asunto:</td>
                    <td><?php echo $tipo_tramite?></td>
                </tr>
                <tr>
                    <td>Estado del Asunto:</td>
                    <td>
                        <select disabled="true" id="select_estatus<?php echo $num_es?>" name="select_estatus">
                            <option><?php echo $estatus ?></option>
                        </select>  
                     </td>
                </tr>
                <tr>
                    <td>Fecha de ingreso en el sistema</td>
                    <td><?php echo $fecha_ingreso_sistema; ?></td>
                </tr>
                <?php if ($tipo_tramite=="TyC") { ?>
                <tr>
                    <td>Periodo:</td>
                    <td><?php echo $periodo ?></td>
                </tr>
               <?php if ($periodo=="Anual") { ?>
                <tr>
                    <td>Fechas:</td>
                    <td>De: <?php echo $p1_f1 ?> A <?php echo $p1_f2 ?></td>
                </tr>
                
                <?php        
                    }else{?>
                <tr>
                    <td>Fechas del Periodo 1: </td>
                    <td>De: <?php echo $p1_f1 ?> A <?php echo $p1_f2 ?></td>
                </tr>
                <tr>
                    <td>Fechas del Periodo 2: </td>
                    <td>De: <?php echo $p2_f1 ?> A <?php echo $p2_f2 ?></td>
                </tr>
                <?php  
                        
                    }
                }?>

                <tr>
                    <td>Fecha de ingreso a Asea:</td>
                    <td><input type="date" name="ingreso_asea" id="ingreso_asea<?php echo $num_es?>" value="<?php echo $fecha_ingreso_asea ?>" ></td>
                </tr>
                <tr>
                    <td>Acuce de Recibo: <br>
                    <input  disabled="true" type="file"  id="file_resolutivo<?php echo $num_es ?>" name="file_resolutivo" class="inputfile_caracteristicastramite" >
                    <label  for="file_resolutivo<?php echo $num_es ?>"><svg aria-hidden="true" data-prefix="fas" data-icon="upload" class="svg-inline--fa fa-upload fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 512 512"><path fill="currentColor" d="M296 384h-80c-13.3 0-24-10.7-24-24V192h-87.7c-17.8 0-26.7-21.5-14.1-34.1L242.3 5.7c7.5-7.5 19.8-7.5 27.3 0l152.2 152.2c12.6 12.6 3.7 34.1-14.1 34.1H320v168c0 13.3-10.7 24-24 24zm216-8v112c0 13.3-10.7 24-24 24H24c-13.3 0-24-10.7-24-24V376c0-13.3 10.7-24 24-24h136v8c0 30.9 25.1 56 56 56h80c30.9 0 56-25.1 56-56v-8h136c13.3 0 24 10.7 24 24zm-124 88c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20zm64 0c0-11-9-20-20-20s-20 9-20 20 9 20 20 20 20-9 20-20z"></path></svg> Elige un archivo</label>
                    </td>
                    <td>
                        <?php         
                    
                 if ($acuce_de_recibo!="") { ?>
       <a href="#" onclick="window.open('../../System/Grupos/<?php echo $name?>/ES/E.S.<?php echo $num_es ?>/Tramites/ASEA/<?php echo $notificacion_resolutivo ?>')"><?php echo $notificacion_resolutivo ?></a><br>
                   <?php  
                 }   
                    
                    ?>
                    </td>
                </tr>
                <tr>
                    <td>Fecha de entrega de notificación o resolutivo original al cliente: </td>
                    <td><input disabled="true" class="disable_inputs" id="fecha_entrega<?php echo $num_es ?>" type="date" name="fecha_entrega" value="<?php echo $fecha_entrega_resolutivo ?>" >
                    </td>
                </tr>
                <tr id="btn_save">
                    <td colspan="2">
                        <input type="submit" id="guardar_informacion" name="guardar_informacion" class="guardar_informacion" >
                        <label for="guardar_informacion" ><svg aria-hidden="true" data-prefix="fas" data-icon="save" class="svg-inline--fa fa-save fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z"></path></svg> Guardar</label>
                    </td>
                </tr>
                    
            </table>     
        </form>
            <div id="update_contenido"></div>
<!--TODO CONTENT HERE-->
    </div>
</div>
<?php
}else{
?>
<div class="alta_tramite">
                   
    <div id="contenedor_alta_tramite_asea">
 <header class="tooblar-header">
            <label class="fas fa-arrow-left" style="font-size: 30px" onclick="show_table_seguimiento()"> </label><h1> Información del tramite</h1></header>
            <div class="main_container_include">
                
    <h2>Actualmente el Asunto no esta dado de Alta</h2>
    <button name="guardar_informacion" class="guardar_informacion"></button>
    <label for="guardar_informacion" onclick="alta_tramites('<?php echo $id_es ?>','<?php echo $num_es ?>','<?php echo $tipo_tramite?>','<?php echo $id_user?>','ASEA','asunto')">
<svg aria-hidden="true" data-prefix="fas" data-icon="plus" class="svg-inline--fa fa-plus fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 448 512"><path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path></svg>
        Dar de alta</label>
                    </div>

            </div> 
    <div id="Alta_tramites_sucses"></div>              
</div>
<?php
}
?>