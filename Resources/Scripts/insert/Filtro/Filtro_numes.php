<?php
if (empty($_POST['filtro_gpo']) && empty($_POST['filtro_alias']) && empty($_POST['filtro_estado'])) {
    $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio");
} else {
    require '../../Conect.php';
    if (!empty($_POST['filtro_gpo'])) {
        if ($_POST['filtro_gpo'] == "Selecciona") {
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio");
        } else {
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio where id_gpo='" . $_POST['filtro_gpo'] . "'");
        }
    }
    if (!empty($_POST['filtro_alias'])) {
        if ($_POST['filtro_alias'] == "Selecciona") {
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio");
        } else {
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio where alias='" . $_POST['filtro_alias'] . "'");
        }
    }
    if (!empty($_POST['filtro_estado'])) {
        if ($_POST['filtro_estado'] == "Selecciona") {
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio");
        }else{
            $query_num_es = mysqli_query($conexion, "SELECT * FROM estacion_servicio where estado='" . $_POST['filtro_estado'] . "'");
        }
    }
}
?>
<form id="filtro_numes_form">
    <label>Numero estación</label>
        <select name="filtro_numes" onchange="filtro('filtro_numes_form','num_es')">
<?php 
    if (empty($_POST['filtro_alias'])) { ?>
    <option value="Selecciona">Selecciona</option>
    <?php 
    }else{
        if($_POST['filtro_alias']=="Selecciona"){ ?>
            <option value="Selecciona">Selecciona</option>
    <?php  
        }
    } ?>
            <?php while($row_gpo=mysqli_fetch_assoc($query_num_es)){ ?>
            <option value="<?php echo $row_gpo['es'] ?>"><?php echo $row_gpo['es'] ?></option>
    <?php } ?>
        </select> 
</form>
                 