<?php 
require '../../Conect.php';
$id_gpo=$_POST['es'];
?>






<div class="div-contenedor-cuerpo" id="documentacion_sasisopa_container_es_folder">
    <!--<header class="tooblar-header">
        <div class="span_menu_container">
            <span class="fas fa-bars btn-toggle-menu" onclick="boton_menu()"></span>
        </div>
        <span class="fas fa-arrow-left arrow-icon" onclick="show_sasisopa_cliente('documentacionsasisopacontaineres','contenedor_sasisopa_es_')"></span>
        <span class="title_span">Documentacion Sasisopa</span>
        <span class="fas fa-bell bell-icon"></span>     
    </header>-->

    <div class="div-subcontenedor">
      <!--TODO CONTENT HERE-->
<table class="table_sasisopa">
  <tr>
    <th>E.S. <?php echo $id_gpo?></th>
  </tr>
  <tr class="tr">
      <td  onclick="sasisopa_onclick('1','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','1','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="1<?php echo $id_gpo?>"><span class="fas fa-folder"></span><span>Politica</span></td>
  </tr>                                                    
  <tr class="tr">
      <td  onclick="sasisopa_onclick('2','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','2','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="2<?php echo $id_gpo?>"><span class="fas fa-folder"></span><span>Identificacion De Peligros</span></td>
  </tr >
    <tr class="tr">
      <td  onclick="sasisopa_onclick('3','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','3','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="3<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Requisitos Legales</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('4','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','4','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="4<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Metas, Objetivos E Indicadores</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('5','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','5','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="5<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Funciones Y Responsabilidades</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('6','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','6','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="6<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Capacitación y Entrenamiento</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('7','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','7','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="7<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Comunicacion, Participación y Consulta</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('8','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','8','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="8<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Control de Documentos</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('9','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','9','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="9<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Mejores Practicas y Estandares</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('10','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','10','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="10<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Control de Actividades, Arranques y Cambios</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('11','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','11','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="11<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Integridad Mecánica</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('12','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','12','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="12<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Seguridad de Contratistas</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('13','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','13','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="13<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Preparacion y Respuesta a Emergencias</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('14','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','14','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="14<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Monitoreo, Verificación y Evaluación</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('15','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','15','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="15<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Auditorías</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('16','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','16','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="16<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Investigación de Incidentes y Accidentes</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('17','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','17','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="17<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Revisión de Resultados</span></td>
  </tr>
    <tr class="tr">
      <td  onclick="sasisopa_onclick('18','<?php echo $id_gpo?>')" ondblclick="sasisopa_ondblckick('sasisopa_es_folder_files','<?php echo $id_gpo?>','18','documentacion_sasisopa_container_es_folder','contenedor_sasisopa_es_files')" id="18<?php echo $id_gpo?>"><span class="fas fa-folder"></span> <span>Informes de Desempeño</span></td>
  </tr>
</table>
      <!--FIN TODO CONTENT-->
    </div>
</div>

 <div id="contenedor_sasisopa_es_files" style="display: none"></div> 