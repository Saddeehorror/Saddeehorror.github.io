<?php 
session_start();
if ($_SESSION['session_group']==3) {
    //require 'Conect.php';
  $query_gpo= mysqli_query($conexion, "Select * from gpo_corp where email='".$_SESSION['session_email']."'");  
  while ($row = mysqli_fetch_array($query_gpo,MYSQLI_ASSOC)){
  $id_gpo=$row['id_gpo_corp'];
  }
  $query= mysqli_query($conexion, "SELECT * FROM estacion_servicio where id_gpo='".$id_gpo."'");
  $id_sasisopa_es="documentacionsasisopacontaineres_client";
}else{
 
require '../../Conect.php';
$id_gpo=$_POST['es'];

$query= mysqli_query($conexion, "SELECT * FROM estacion_servicio where id_gpo='".$id_gpo."'");
$id_sasisopa_es="documentacionsasisopacontaineres";
}
    ?>
<div class="div-contenedor-cuerpo" id="<?php echo $id_sasisopa_es?>">

    <div class="div-subcontenedor">
<table class="table_sasisopa">
  <tr>
    <th>Nombre de Estación</th>
    <th>No Estación</th>
    <th class="no-display">Alias</th>
  </tr>
<?php while ($row = mysqli_fetch_array($query,MYSQLI_ASSOC)){ ?>
  <tr class="tr"id="estacion<?php echo $row['es']?>">
      <td class="" onclick="sasisopa_onclick('estacion','<?php echo $row['es']?>')" 
      ondblclick="sasisopa_ondblckick('sasisopa_es_folder','<?php echo $row['es']?>','','<?php echo $id_sasisopa_es?>','contenedor_sasisopa_es_') & asignar_titulos('sasisopa_es_folder') " >
          <span class="fas fa-folder"></span><span><?php echo $row['nombre_es'] ?></span></td>

      <td class="" ><?php echo $row['es'] ?></td>
      <td class="no-display"> <?php echo $row['alias'] ?> </td>
  </tr>
<?php
}
?>
</table>
    </div>
</div>


 <div id="contenedor_sasisopa_es_" style="display: none"></div> 