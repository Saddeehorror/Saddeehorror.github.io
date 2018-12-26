<?php
    

if (empty($_POST['filtro_numes']) && empty($_POST['filtro_alias']) && empty($_POST['filtro_estado'])) {
    $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp");
} else {
        require '../../Conect.php';
    if (!empty($_POST['filtro_numes'])) {
        if ($_POST['filtro_numes'] == "Selecciona") {
        $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp");
        } else {
        $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp inner join estacion_servicio on gpo_corp.id_gpo_corp = estacion_servicio.id_gpo where estacion_servicio.es='" . $_POST['filtro_numes'] . "'");
        }
    }
    if (!empty($_POST['filtro_alias'])) {
        if ($_POST['filtro_alias'] == "Selecciona") {
            $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp");
        } else {
        $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp inner join estacion_servicio on gpo_corp.id_gpo_corp = estacion_servicio.id_gpo where estacion_servicio.alias='" . $_POST['filtro_alias'] . "'");
        }
    }
    if (!empty($_POST['filtro_estado'])) {
        if ($_POST['filtro_estado'] == "Selecciona") {
            $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp");
        }else{
            $query_gpo_corp = mysqli_query($conexion, "SELECT * FROM gpo_corp inner join estacion_servicio on gpo_corp.id_gpo_corp = estacion_servicio.id_gpo where estacion_servicio.estado='" . $_POST['filtro_estado'] . "'");    
        }
    }
}
?>
<form id="filtro_gpo_form">
    <label>Grupo Corporativo</label>
    <select name="filtro_gpo" onchange="filtro('filtro_gpo_form','gpo_corporativo')">
    <?php 
    if (empty($_POST['filtro_numes']) && empty($_POST['filtro_alias'])) { ?>
    <option value="Selecciona">Selecciona</option>
    <?php 
    }else{
        if($_POST['filtro_numes']=="Selecciona" && $_POST['filtro_alias']=="Selecciona"){ ?>
            <option value="Selecciona">Selecciona</option>
    <?php  
        }
    } ?>
    <?php
    while($row_gpo=mysqli_fetch_assoc($query_gpo_corp)){ ?>
    <option value="<?php echo $row_gpo['id_gpo_corp'] ?>"><?php echo $row_gpo['nombre'] ?></option>
    <?php 
    }?> 
    </select> 
</form>
<?php

