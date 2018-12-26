<?php
if (empty($_POST['filtro_gpo']) && empty($_POST['filtro_numes']) && empty($_POST['filtro_estado'])) {
    $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!=''");
} else {
    require '../../Conect.php';
    if (!empty($_POST['filtro_gpo'])) {
        if ($_POST['filtro_gpo'] == "Selecciona") {
            $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!=''");
        } else {
            $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!='' and id_gpo='" . $_POST['filtro_gpo'] . "'");
        }
    }
    
if (!empty($_POST['filtro_numes'])) {
    if ($_POST['filtro_numes']=="Selecciona") {
         $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!=''");
    }else{
                  $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!='' and es='" . $_POST['filtro_numes'] . "'");  
    }
    
}
if (!empty($_POST['filtro_estado'])) {
    if ($_POST['filtro_estado'] == "Selecciona") {
        $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!=''");
    }else{
        $query_alias = mysqli_query($conexion, "SELECT * from estacion_servicio where alias!='' and estado='" . $_POST['filtro_estado'] . "'");         
    }
}
}


?>
<form id="filtro_alias_form">
    <label>Alias</label>
    <select name="filtro_alias" onchange="filtro('filtro_alias_form','alias')">    <?php 
    if (empty($_POST['filtro_numes'])) { ?>
    <option value="Selecciona">Selecciona</option>
    <?php 
    }else{
        if($_POST['filtro_numes']=="Selecciona"){ ?>
            <option value="Selecciona">Selecciona</option>
    <?php  
        }
    } ?>
  <?php while($row_gpo=mysqli_fetch_assoc($query_alias)){ ?>
        <option value="<?php echo $row_gpo['alias'] ?>"><?php echo $row_gpo['alias'] ?></option>
  <?php } ?>
    </select> 
</form>
