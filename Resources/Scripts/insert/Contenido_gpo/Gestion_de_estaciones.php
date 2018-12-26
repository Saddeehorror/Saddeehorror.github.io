<?php 
require '../../Conect.php';
$query_contenido = mysqli_query($conexion, "SELECT * FROM estacion_servicio WHERE id='" . $_POST['id'] . "'");
    while ($row = mysqli_fetch_array($query_contenido, MYSQLI_ASSOC)) { 
        $nombre_es=$row['nombre_es'];
        $numero_es=$row['es'];
        if ($row['alias']!="") {
            $alias_es = "(".$row['alias'].")";   
        }else{
            $alias_es="";  
        }
    } ?>

<div class="div-contenedor-cuerpo" id="Gestion_estaciones">
    <div class="div-subcontenedor">
        <table class="table_sasisopa" id="Gestion_estaciones_table"> 
            <tr>  
                <th><span> <?php echo $nombre_es ?> E.S. <?php echo $numero_es?> <?php echo $alias_es?></span></th>
            </tr>
            <tr>
                <td class=" td" id="documentacion<?php echo $numero_es ?>" 
                    onclick="sasisopa_onclick('documentacion', '<?php echo $numero_es ?>')" 
                    ondblclick="show_content('documentacion','<?php echo $_POST['id']?>','Show_gestion','Gestion_estaciones','Documentacion')
                                & asignar_titulos('show_files_documentacion')" >
                    <span class="fas fa-folder"></span>
                    <span>Documentacion</span>
                </td>
            </tr>
        </table>

    </div>
</div>
<div id="Show_gestion"></div>