<?php
if (empty($_POST['filtro_gpo']) && empty($_POST['filtro_numes']) && empty($_POST['filtro_alias'])) {
    $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio");
} else {
    require '../../Conect.php';
    if (!empty($_POST['filtro_gpo'])) {
        if ($_POST['filtro_gpo'] == "Selecciona") {
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio");
        } else {
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio where id_gpo='" . $_POST['filtro_gpo'] . "'");
        }
    }

    if (!empty($_POST['filtro_numes'])) {
        if ($_POST['filtro_numes'] == "Selecciona") {
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio");
        } else {
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio where es='" . $_POST['filtro_numes'] . "'");
        }
    }
    if (!empty($_POST['filtro_alias'])) {
        if ($_POST['filtro_alias'] == "Selecciona") {
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio");
        } else {
            //$query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio where alias='" . $_POST['filtro_alias'] . "'");
            $query_estado = mysqli_query($conexion, "SELECT DISTINCT estado FROM estacion_servicio where alias='" . $_POST['filtro_alias'] . "'");
        }
    }
}
?>
<form id="filtro_estado_form">
    <label>Estado</label>
    <select name="filtro_estado" onchange="filtro('filtro_estado_form','estado')">
<?php 
    if (empty($_POST['filtro_numes']) && empty($_POST['filtro_alias'])) { ?>
    <option value="Selecciona">Selecciona</option>
    <?php 
    }else{
        if($_POST['filtro_numes']=="Selecciona" ){ ?>
            <option value="Selecciona">Selecciona</option>
    <?php  
        }
                if($_POST['filtro_alias']=="Selecciona"){ ?>
            <option value="Selecciona">Selecciona</option>
    <?php  
        }
        if ($_POST['filtro_alias']=="Selecciona") { ?>
            <option value="Selecciona">Selecciona</option>
    <?php         
        }
    } ?>
                                                        <?php
                while($row_gpo=mysqli_fetch_assoc($query_estado)){
                    ?>
                <option value="<?php echo $row_gpo['estado'] ?>"><?php echo $row_gpo['estado'] ?></option>
                <?php
                }
                ?>
                 </select> 
</form>
                 