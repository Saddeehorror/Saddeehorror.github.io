<?php
date_default_timezone_set("America/Mexico_City");
session_start();
if (!isset($_SESSION["session_username"])) {
    header("location:../../index.php");
} else {
    ?>
    <?php require("header.php"); ?>
    <link href="../Stylesheet/fontawesome-all.css" media="screen" rel="stylesheet">

    <body class="body" >

        <?php
        require './Conect.php';
        include './sidebar.php';
        include './Alertas_sidebar.php';
        
        ?>


        <div class="contenido"  id="content-all">
            <div class="tooblar-header" id="Toolbar_padre">
                <div class="span_menu_container">
                    <span class="fas fa-bars btn-toggle-menu" onclick="boton_menu()"></span>
                </div>
                <span class="fas fa-arrow-left arrow-icon" id="toolbar_arrow_icon" style="display: none"></span>
                <span  class="title_span" id="title_span_toolbar"></span>
                <?php include './insert/Alarmas/alarm_badge.php'; ?>
            </div>
                <script>
        TOOLBAR("Inicio","");
    </script>
            
            
            
            
            
            
            
            
            
            <?php
            if ($_SESSION['session_group'] == 3) {
                $varCorreo = $_SESSION['session_email'];
                //require './Conect.php';
                $query = "SELECT * FROM gpo_corp WHERE email = '" . $varCorreo . "'";
                $result = mysqli_query($conexion, $query);
                if ($result) {

                    //echo '<script language = "javascript"> alert("bien");</script>';
                    while ($filasG = mysqli_fetch_array($result)) {
                        $fotos = $filasG['foto'];
                    }
                } else {
                    
                }
                //echo '<script language = "javascript"> alert("'.$fotos.'");</script>';
                ?>

                <div class="div-contenedor-cuerpo tabcontent" >
     
                    <div class="main_container_include" >
                        <div class="intro" >
                            <div class="intro_container-card">
                                <div >
                                    <img class="background-img-resposive" src="<?php echo $fotos; ?>">
                                </div>
                                <div class="intro_container-cliente">
                                    <img src="../img/logo_cale_very_very_small.png" >
                                    <div>
                                        <h5>Ambientalistas Cale</h5>
                                        <h6>Sistema de Autogestion</h6>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>    
                </div>

                <?php
            } else {
                ?>
                <div class="div-contenedor-cuerpo tabcontent" >

                    <div class="main_container_include" >
                        <div class=" intro" >
                            <div class="intro_container">
                                <img src="../img/logo_cale.png" alt="Ambientalistas Cale">
                                <div class="intro_page_text">
                                    <h1>Ambientalistas Cale</h1>
                                    <h3>Sistema de Autogestion</h3>      
                                </div>
                            </div>
                        </div>



                    </div>    
                </div>
                <?php
            }
            ?>



            <?php
            if ($_SESSION['session_group'] != 3) {
                ?>
                <!--ALTAS------------------------------------------------------------------>
                <div id="Alta_grupos" class="tabcontent cnt contenedor_include_secciones">
                    <?php include("Alta_Grupo.php"); ?>   
                </div>
                <div id="Alta_Estaciones" class="tabcontent cnt">
                    <?php include("Alta_Estacion_Servicio.php"); ?>    
                </div>
                <div id="Cuestionario" class="tabcontent cnt">
                    <?php include("Cuestionario.php"); ?>  
                </div>
                <div id="Levantamiento" class="tabcontent cnt">
                    <?php include("Levantamiento_campo.php"); ?> 
                </div>
                <div id="Documentacion" class="tabcontent cnt">
                    <?php include("Documentacion.php"); ?> 
                </div>
                <div id="Add_user" class="tabcontent cnt">
                    <?php include("Registrar_Usuarios.php"); ?> 
                </div>
                <!--Actualizar------------------------------------------------------------->
                <div id="Modificacion_Grupos" class = "tabcontent cnt">
                    <?php include("Modificacion_Grupos.php"); ?>
                </div>
                <div id="Modificacion_Estacion_de_Servicio" class="tabcontent cnt">
                    <?php include("Modificacion_Estacion_de_Servicio.php"); ?>
                </div>
                <div id="Modificacion_Usuarios" class="tabcontent cnt">
                    <?php include("Modificacion_Usuarios.php"); ?>
                </div>

                <div id="Baja_Grupo" class="tabcontent cnt">
                    <?php include("Baja_Grupo.php"); ?>
                </div>
                <!--Eliminar--------------------------------------------------------------->

                <div id="Baja_Estacion_de_Servicio" class="tabcontent cnt">
                    <?php
                    include ("Baja_Estacion_de_servicio.php");
                    ?>
                </div>

                <div id="Baja_Usuario" class="tabcontent cnt">
                    <?php include("Baja_Usuario.php"); ?>
                </div>
                <!--Sasisopa--------------------------------------------------------------->
                <div id="Documentos_sasisopa" class="tabcontent cnt">
                    <?php include("Documentos_sasisopa.php"); ?>
                </div>
                <div id="Documentos_sasisopa" class="tabcontent cnt">
                    <?php include("Documentos_sasisopa.php"); ?>
                </div>
                <div id="Seguimiento" class="tabcontent cnt">
                    <?php include("Seguimiento.php"); ?> 
                </div>
                <!-- Estaciones de servicio------------------------------------>
                <div id="Razon_Social" class="tabcontent cnt">
                    <?php include("Razon_Social.php"); ?> 
                </div>
                
            <?php } else {
                ?>

                <div id="Documentos_sasisopa_client" class="tabcontent cnt">
                    <?php include("./insert/Sasisopa/sasisopa_es_cliente.php"); ?>
                </div>
                <div id="Seguimiento" class="tabcontent cnt">
                    <?php include("Seguimiento.php"); ?> 
                </div>
                                <!-- Estaciones de servicio------------------------------------>
                <div id="Estaciones_de_servicio" class="tabcontent cnt">
                    <?php include("./insert/Contenido_gpo/Estaciones_de_servicio_cliente.php"); ?> 
                </div>
                <?php
            }
            include("footer.php");
            ?>

        </div>
    </body>
    </html>

    <?php
}
        include './insert/Alarmas/Alarms.php';
?>
