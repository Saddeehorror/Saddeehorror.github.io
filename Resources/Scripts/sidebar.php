<?php 

if($_SESSION['session_group']== 2){?>
<div class="sidebar hide-all" id="sidebar_admin"> <!-- Inicio SIDEBAR ------------------------------------->
    <div class="contenedor_sidebaryheader">
    <div class="side_bar_header"><!-- Inicio HEADER --------------------------->
        <div class="avatar">
            <img src='<?php echo $_SESSION['session_avatar']; ?>' alt="" />        
        </div>
        <div class="text-container">
            <h3 class="text">Bienvenido</h3>
            <h3 class="text">  <?php echo $_SESSION['session_username']; ?> </h3>  
        </div>
    </div><!-- Inicio HEADER -------------------------------------------------->
    <div class="side_bar_content" >
        <div class="Padre_modulo_sidebar" id="Padre_alta" onclick="mostrar_hijos_menu('hijo_registrar','Padre_alta','sidebar_admin')"><span class="fas fa-plus-circle"></span><span> Altas</span></div>
        <div id="hijo_registrar" style="display: none">
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Alta_grupos')"><span class="fas fa-users "></span><span> Grupos</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Alta_Estaciones')"><span class="fas fa-gas-pump"></span><span> Estaciones de Servicio</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Cuestionario')"><span class="fas fa-file-alt"></span><span> Cuestionario</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Levantamiento')"><span class="fas fa-clipboard-list"></span><span> Levantamiento de campo</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Documentacion')"><span class="fas fa-folder-open"></span><span> Documentacion</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Add_user')"><span class="fas fa-user-plus"></span><span> Usuarios</span></div>
        </div>
        <div class="Padre_modulo_sidebar" id="Padre_actualizar" onclick="mostrar_hijos_menu('hijo_Actualizar','Padre_actualizar','sidebar_admin')"><span class="fas fa-edit selc"></span><span> Actualizar</span></div>
        <div id="hijo_Actualizar" style="display: none">
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Modificacion_Grupos')"><span class="fas fa-users "></span><span> Grupos</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Modificacion_Estacion_de_Servicio')"><span class="fas fa-gas-pump"></span><span> Estaciones de Servicio</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Modificacion_Usuarios')"><span class="fas fa-user"></span><span> Usuarios</span></div>
        </div>
        <div class="Padre_modulo_sidebar" id="Padre_eliminar" onclick="mostrar_hijos_menu('hijo_Eliminar','Padre_eliminar','sidebar_admin')"><span class="fas fa-trash-alt selc"></span><span> Eliminar</span></div>
        <div id="hijo_Eliminar" style="display: none">
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Baja_Grupo')"><span class="fas fa-users "></span><span> Grupos</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Baja_Estacion_de_Servicio')"><span class="fas fa-gas-pump"></span><span> Estaciones de Servicio</span></div>
            <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Baja_Usuario')"><span class="fas fa-user"></span><span> Usuarios</span></div>
        </div>
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Documentos_sasisopa')"><span class="fas fa-folder"></span><span> S.A.S.I.S.O.P.A.</span></div>    
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Seguimiento')"><span class="far fa-calendar-alt "></span><span> Calendario</span></div>
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Razon_Social')"><span class="fas fa-gas-pump "></span><span> Estaciones de Servicio</span></div>
    </div>
        </div>

    <div class="logout"><!-- Inicio LOGOUT------------------------------------->
        <a href="logout.php" class="fas fa-power-off"></a>    
    </div><!-- Fin LOGOUT------------------------------------------------------>
</div><!-- Fin SIDEBAR -------------------------------------------------------->
    <?php
}elseif ($_SESSION['session_group']== 1){?>
<div class="sidebar user">
    <div id="logo" class="">
    <span class="image avatar48"><img src='<?php echo $_SESSION['session_avatar'];?>' alt="" /></span>
        <h4 id="title">Bienvenido</h4>
        <h4 id="title">  <?php echo $_SESSION['session_username'];?> </h4>
    </div>
       <ul>
        <li class="menu_li_user"><a href="#" class="fas fa-plus-circle selc" onclick="showdisplaymenu(event,'Registrar_btn')"> Registrar</a></li>
            <ul id="Registrar_btn" class="mymenu cnt">
                <li class="menu_li_content"><a href="#Alta_grupos" class="fas fa-industry tablinks" onclick="opentab(event, 'Alta_grupos')">  Alta de Grupos</a></li>
                <li class="menu_li_content"><a href="#Alta_Estaciones" class="fas fa-plus-circle tablinks" onclick="opentab(event, 'Alta_Estaciones')">  Alta de Estaciones de Servicio</a></li>
                <li class="menu_li_content"><a href="#Cuestionario" class="fas fa-file tablinks" onclick="opentab(event, 'Cuestionario')"> Cuestionario</a></li>
                <li class="menu_li_content"><a href="#Levantamiento" class="fas fa-list tablinks" onclick="opentab(event, 'Levantamiento')">  Levantamiento de campo</a></li>
            </ul>
        <li class="menu_li_user"><a href="#" class="fas fa-edit selc" onclick="showdisplaymenu(event, 'modif_btn')"> Modificar o Actualizar</a></li>
            <ul id="modif_btn" class="mymenu cnt">
                <li class="menu_li_content"><a href="#Alta_grupos" class="fas fa-industry tablinks" onclick="opentab(event, 'Alta_grupos')">  seccion1</a></li>
            </ul>
        <li class="menu_li_user"><a href="#" class="fas fa-folder-open selc" onclick="showdisplaymenu(event, 'tramites_btn')"> Tramites</a></li>
            <ul id="tramites_btn" class="mymenu cnt">
                <li class="menu_li_content"><a href="#tablas" class="fas fa-industry tablinks" onclick="opentab(event, 'tablas')">  seccion3</a></li>
            </ul>
        </ul> 
        <div class="logout user_log">
        <a href="logout.php" class="fas fa-power-off"><span class="label"></span></a>    
    </div>

</div>
<?php }elseif ($_SESSION['session_group']== 3) {
     //session_start();
     //require '../Scripts/Conect.php';
     $varEmail = $_SESSION['session_email'];
     //$varAvatar = $_SESSION['session_avatar'];
     //echo '<script language = "javascript"> alert("'.$varEmail.'");</script>';
     
     //require './Conect.php';
     $consultar_grupo = "SELECT * FROM gpo_corp WHERE email = '".$varEmail."'";
     
     $resutl = mysqli_query($conexion, $consultar_grupo);
     if($resutl){
         
         //echo '<script language = "javascript"> alert("bien");</script>';
         while ($filasG = mysqli_fetch_array($resutl)){
         $fondo = $filasG['fondo'];
     }
     //echo '<script language = "javascript"> alert("'.$fondo.'");</script>';
     //echo '<script language = "javascript"> alert("'.$logo.'");</script>';
     }else{
         //echo '<script language = "javascript"> alert("mal");</script>';
     }
     
    ?>
<div class="sidebar hide-all" id="sidebar_admin"> <!-- Inicio SIDEBAR ------------------------------------->
    <div class="contenedor_sidebaryheader">
        <div id="bg_login" class="side_bar_header-cliente"><!-- Inicio HEADER --------------------------->
            
        <div class="text-container">
            <h3 class="text">Bienvenido</h3>
            <h3 class="text">  <?php echo $_SESSION['session_name']; ?> </h3>  
        </div>
    </div><!-- Inicio HEADER -------------------------------------------------->
    <div class="side_bar_content" >
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Documentos_sasisopa_client')"><span class="fas fa-folder"></span><span> S.A.S.I.S.O.P.A.</span></div>    
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Seguimiento')"><span class="far fa-calendar-alt "></span><span> Calendario</span></div>
        <div class="Hijo_modulo_sidebar tablinks" onclick="opentab(event, 'Estaciones_de_servicio')"><span class="fas fa-gas-pump "></span><span> Estaciones de Servicio</span></div>

    </div>
        </div>

    <div class="logout"><!-- Inicio LOGOUT------------------------------------->
        <a href="logout.php" class="fas fa-power-off"></a>    
    </div><!-- Fin LOGOUT------------------------------------------------------>
    <script src="../Js/Funciones_Imgs.js"></script>
    <script>
        cambiarBackgroundSidebar('bg_login','<?php echo $fondo?>')
    </script>
</div>
        
 <?php   }    
