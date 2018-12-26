session_start();
<div id="Caracteristicas_tramites_seguimiento" style="display: none">  
</div>
<div class="div-contenedor-cuerpo" id="seguimiento_tables_container">
    <div class="div-subcontenedor" >

<?php
if ($_SESSION['session_group']!=3) {
  include 'insert/Filtro/Filtros_container.php';
  
}else{
    
}
?>
    <div id="Tables_seguimiento">
    <?php
    include './insert/Seguimiento/Tables.php';
    ?>
    </div>



    </div>
</div>