<?php
//---------------------------------------año
$año_mostrar= date("Y");
$Query_estaciones_y_grupo= mysqli_query($conexion, "SELECT * FROM estacion_servicio inner join gpo_corp on estacion_servicio.id_gpo = gpo_corp.id_gpo_corp");
$Rows_Query_estaciones_y_grupo= mysqli_num_rows($Query_estaciones_y_grupo); 

while ($row = mysqli_fetch_array($Query_estaciones_y_grupo,MYSQLI_ASSOC)){
    $nombre_estacion = $row['nombre_es'];
    $numero_estacion = $row['es'];
?>
<div style="overflow-x:auto;">
    <table class="Tabla_seguimiento" id="table_<?php echo $numero_estacion?>" >
        <tr>
            <th Colspan = "2" class="nombre_es_head"  id="nombre_es_head">
                <h4><?php echo $row['nombre_es']?> ES: <?php echo $row['es']?></h4>
            </th>
            <th Colspan = "12" class="año_es_head" id="año_es_head<?php echo $row['es']?>" class="año_seguimiento">
                <label class="fas fa-angle-left" onclick="calendar_year('<?php echo $numero_estacion?>','-')"></label>
                <label id="showyeartable<?php echo $row['es']?>"><?php echo $año_mostrar ?></label>   
                <label class="fas fa-angle-right" onclick="calendar_year('<?php echo $numero_estacion?>','+')"></label>
            </th>
        </tr>
<!--CUERPO DE TABLA-->   
<tr>
    <th Rowspan = "5" id="dependencia_asea<?php echo $row['es']?>" class="table_head_dependencia"><img src="../img/Calendario/Asea.svg"></th>
        <th id="asunto_tramite">Asunto/Tramite</th>
        <th class="mes"  >Ene</th>
        <th class="mes" >Feb</th>
        <th class="mes" >Mar</th>
        <th class="mes" >Abr</th>
        <th class="mes" >May</th>
        <th class="mes" >Jun</th>
        <th class="mes" >Jul</th>
        <th class="mes" >Ago</th>
        <th class="mes" >Sep</th>
        <th class="mes" >Oct</th>
        <th class="mes" >Nov</th>
        <th class="mes" >Dic</th>
   </tr>
<!--IMPACTO AMBIENTAL---------------------------------------------------------->
<tr>
    <td class="Padre_seguimiento cursor-seguimiento" id="IA<?php echo $row['es']?>">Impacto Ambiental <label class="fas fa-angle-double-down" id="ia<?php echo $row['es']?>" onclick=" mostrar_hijos_seguimiento('ia<?php echo $row['es']?>','7','dependencia_asea<?php echo $row['es']?>','<?php echo $row['es']?>')"> </label></td>
    <td id="01/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="02/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="03/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="04/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="05/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="06/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="07/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="08/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="09/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="10/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="11/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
    <td id="12/<?php echo $año_mostrar?>IA<?php echo $numero_estacion?>"></td>
</tr>
<!--MIA------------------------------------------------------------------------>
<tr class="ia<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento" id="MIA<?php echo $row['es']?>">
        <label onclick="show_caracteristicas('MIA','ASEA','tramite','<?php echo $numero_estacion?>')" class="menu" id="MIAlabel<?php echo $numero_estacion ?>">Manifestación Impacto Ambiental</label>
    </td>
    <!--                                                                    -->
    <td id="01/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>  
    <td id="02/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="03/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="04/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="05/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="06/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="07/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="08/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="09/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="10/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="11/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
    <td id="12/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>
</tr>
<!--IP------------------------------------------------------------------------->
      <tr class="ia<?php echo $row['es']?>" style="display: none">
        <td class="Hijo_seguimiento" id="IP<?php echo $row['es']?>">
            <label onclick="show_caracteristicas('IP','ASEA','tramite','<?php echo $numero_estacion?>')" class="menu" id="IPlabel<?php echo $row['es']?>">Informe Preventivo</label></td>
        <td id="01/<?php echo $año_mostrar?>MIA<?php echo $numero_estacion?>"></td>  
    <td id="02/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="03/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="04/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="05/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="06/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="07/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="08/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="09/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="10/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="11/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
    <td id="12/<?php echo $año_mostrar?>IP<?php echo $numero_estacion?>"></td>
   </tr>
<!--AIO------------------------------------------------------------------------>
         <tr class="ia<?php echo $row['es']?>" style="display: none">
             <td class="Hijo_seguimiento" id="AIO<?php echo $row['es']?>">
                 <label onclick="show_caracteristicas('AIO','ASEA','asunto','<?php echo $numero_estacion?>')" class="menu" id="AIOlabel<?php echo $row['es']?>">Aviso de Inicio Oper. antes 1988</label></td>
    <td id="01AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="02AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="03AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="04AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="05AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="06AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="07AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="08AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="09AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="10AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="11AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
    <td id="12AIO<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?> AIO<?php echo $row['es'] ?>"></td>
   </tr>
<!--MPA------------------------------------------------------------------------>
    <tr class="ia<?php echo $row['es']?>" style="display: none"> 
    <td class="Hijo_seguimiento td_disabled" id="MPA<?php echo $row['es']?>">
            <label class="menu label_disabled" id="MPAlabel<?php echo $row['es']?>">Modificación de Proyectos Autorizados</label>
    </td>
    <td id="01MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12MPA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--CDT------------------------------------------------------------------------> 
    <tr class="ia<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento td_disabled" id="CDT<?php echo $row['es']?>">
        <label class="menu label_disabled" id="CDTlabel<?php echo $row['es']?>">Cambio de titularidad</label></td>
    <td id="01CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12CDT<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--OBLIGACION DE IMPACTO AMBIENTAL-------------------------------------------->
   <tr class="ia<?php echo $row['es']?>" style="display: none">
       <td class="Obligacion td_disabled" id="obligaciontyc<?php echo $numero_estacion?>">Obligación</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
<!--TYC------------------------------------------------------------------------>
   <tr class="ia<?php echo $row['es']?>" style="display: none">
    <td class="td_disabled" id="TyC<?php echo $row['es']?>"> <!--Hijo_obligacion-->
        <label class="menu label_disabled" id="TyClabel<?php echo $row['es']?>">Informe de Terminos y Condicionantes</label></td>
    <td id="01TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12TyC<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--LICENCIA AMBIENTAL UNICA--------------------------------------------------->
    <tr>
        <td class="Padre_seguimiento cursor-seguimiento td_disabled" id="LUA<?php echo $row['es']?>">
            <label id="LUAlabel<?php echo $row['es']?>" class="menu label_disabled">Licencia Ambiental Unica(LAU)</label> <label class="fas fa-angle-double-down" id="lau<?php echo $row['es']?>" onclick="return mostrar_hijos_seguimiento('lau<?php echo $row['es']?>','3','dependencia_asea<?php echo $row['es']?>','<?php echo $row['es']?>')"></label></td>
    <td id="01LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--MOD LAU-------------------------------------------------------------------->
    <tr class="lau<?php echo $row['es']?>" style="display: none">
        <td class="Hijo_seguimiento td_disabled" id="MOD_LUA<?php echo $row['es'] ?>">
            <label onclick="show_caracteristicas('MOD LUA','ASEA','tramite','<?php echo $numero_estacion?>')" id=" MOD_LUAlabel<?php echo $row['es'] ?>" class="menu label_disabled">Modificación de LAU</label></td>
    <td id="01MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12MOD_LUA<?php echo $row['es'] ?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--OBLIGACION LICENCIA AMBIENTAL UNICA---------------------------------------->
       <tr class="lau<?php echo $row['es']?>" style="display: none">
    <td class="Obligacion td_disabled">Obligación</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
<!--COA------------------------------------------------------------------------>
    <tr class="lau<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_obligacion td_disabled" id="COA<?php echo $row['es'] ?>">
        <label onclick="show_caracteristicas('COA','ASEA','asunto','<?php echo $numero_estacion?>')" id="COAlabel<?php echo $row['es'] ?>" class="menu label_disabled">Cédula de Operación anual(COA)</label></td>
    <td id="01COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12COA<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--ALTA COMO EMPRESA GENERADORA----------------------------------------------->  
    <tr>
    <td class="Padre_seguimiento cursor-seguimiento" id="AEG<?php echo $row['es']?>">
        <label onclick="show_caracteristicas('AEG','ASEA','tramite','<?php echo $numero_estacion?>')" class="menu">Alta Como Empresa Generadora(AEG)</label> <label class="fas fa-angle-double-down" id="aeg<?php echo $row['es']?>" onclick="return mostrar_hijos_seguimiento('aeg<?php echo $row['es']?>','1','dependencia_asea<?php echo $row['es']?>','<?php echo $row['es']?>')"></label></td>
    <td id="01AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--MOD AEG---------------------------------------------------------------------->   
       <tr class="aeg<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento td_disabled" id="MOD_AEG<?php echo $row['es']?>">
        <label id="MOD_AEGlabel<?php echo $row['es']?>" class="menu label_disabled">Modificación a AEG</label></td>
    <td id="01MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12MOD_AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
<!--SASISOPA------------------------------------------------------------------->   
    <tr>
    <td class="Padre_seguimiento cursor-seguimiento td_disabled" id="SASISOPA<?php echo $row['es']?>">
        <label id="SASISOPAlabel<?php echo $row['es']?>" class="menu label_disabled"> SASISOPA </label><label class="fas fa-angle-double-down" id="sasisopa<?php echo $row['es']?>" onclick="return mostrar_hijos_seguimiento('sasisopa<?php echo $row['es']?>','7','dependencia_asea<?php echo $row['es']?>','<?php echo $row['es']?>')"></label></td>
    <td id="sasisopa1<?php echo $row['es']?>"></td>
    <td id="sasisopa2<?php echo $row['es']?>"></td>
    <td id="sasisopa3<?php echo $row['es']?>"></td>
    <td id="sasisopa4<?php echo $row['es']?>"></td>
    <td id="sasisopa5<?php echo $row['es']?>"></td>
    <td id="sasisopa6<?php echo $row['es']?>"></td>
    <td id="sasisopa7<?php echo $row['es']?>"></td>
    <td id="sasisopa8<?php echo $row['es']?>"></td>
    <td id="sasisopa9<?php echo $row['es']?>"></td>
    <td id="sasisopa10<?php echo $row['es']?>"></td>
    <td id="sasisopa11<?php echo $row['es']?>"></td>
    <td id="sasisopa12<?php echo $row['es']?>"></td>
   </tr>
       <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Conformación </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
       <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Dictaminación </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
       <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Resolución </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
          <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Implementación </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
          <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Dictaminación de seguimiento </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
    <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Informe Anual </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
    <tr class="sasisopa<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">
        <label class="menu label_disabled"> Cambio de titularidad </label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
   <!-- cre------------------------------------------------------------------->
    <tr>
        <th Rowspan = "5" id="dependencia_cre<?php echo $row['es']?>" class="table_head_dependencia"><img src="../img/Calendario/Cre.svg"></th>
    </tr>
        <tr class="relleno_contenedor">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr >
    <td Rowspan = "1" class="Padre_seguimiento cursor-seguimiento" ><label onclick="show_caracteristicas('CRE','RT','Reportes_trimestrales','<?php echo $row['id']?>')" class="menu"> Reportes trimestrales  </label><label class="fas fa-angle-double-down" id="reportes_trimestrales<?php echo $row['es']?>" onclick="return mostrar_hijos_seguimiento('reportes_trimestrales<?php echo $row['es']?>','2','dependencia_cre<?php echo $row['es']?>')"></label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>    
   <tr class="reportes_trimestrales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento"><label onclick="show_caracteristicas('CRE','RT','inf_est','<?php echo $row['id']?>')" class="menu"> Información estadística</label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
   <tr class="reportes_trimestrales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento"><label onclick="show_caracteristicas('CRE','RT','poliza_seguros','<?php echo $row['id']?>')" class="menu"> Póliza de seguros vigente en caso de renovación</label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
          <tr >
    <td class="Padre_seguimiento cursor-seguimiento" >Documentos anuales <label class="fas fa-angle-double-down" id="Documentos_anuales<?php echo $row['es']?>" onclick="return mostrar_hijos_seguimiento('Documentos_anuales<?php echo $row['es']?>','8','dependencia_cre<?php echo $row['es']?>')"></label></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
    <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Póliza anual vigente de seguros</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
       <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Reporte de quejas</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
       <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Procedencia del producto</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
       <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Reporte de incidentes o emergencias</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
          <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Comprobante de pago de Aprovechamientos</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
             <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">NOM-005-ASEA-2016</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
                <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">NOM-016-CRE-2016</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
                   <tr class="Documentos_anuales<?php echo $row['es']?>" style="display: none">
    <td class="Hijo_seguimiento">Sistema de Gestion de Medicion y Dictaminación</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
   </tr>
    <tr class="relleno_contenedor">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>

   <!--FIN-->
   <tr>
    <th Rowspan = "5" id="dependencia_cre<?php echo $row['es']?>" class="table_head_dependencia"><img src="../img/Calendario/Profeco.svg"></th>
    </tr>
            <tr class="relleno_contenedor">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr >
    <td class="Padre_seguimiento cursor-seguimiento" id="AEG<?php echo $row['es']?>"><label onclick="show_caracteristicas('ASEA','AEG','<?php echo $row['id']?>','ASEA')" class="menu">Calibraciones anuales</label></td>
    <td id="01AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
       <tr >
    <td class="Padre_seguimiento cursor-seguimiento" id="AEG<?php echo $row['es']?>"><label onclick="show_caracteristicas('ASEA','AEG','<?php echo $row['id']?>','ASEA')" class="menu">Aviso de sistema de monitoreo y control volumetrico</label></td>
    <td id="01AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
        <tr class="relleno_contenedor">
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr >
    <th Rowspan = "1" id="dependencia_cre<?php echo $row['es']?>" class="table_head_dependencia">AYUNTAMIENTO MUNICIPAL</th>    
    <td class="Padre_seguimiento cursor-seguimiento" id="AEG<?php echo $row['es']?>"><label onclick="show_caracteristicas('ASEA','AEG','<?php echo $row['id']?>','ASEA')" class="menu">Licencia de funcionamiento</label></td>
    <td id="01AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="02AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="03AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="04AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="05AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="06AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="07AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="08AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="09AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="10AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="11AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
    <td id="12AEG<?php echo $row['es']?><?php echo $año_mostrar?>" class="cleanall<?php echo $row['es'] ?>"></td>
   </tr>
   
  </TABLE>
        </div>

<script>
    disable_first();
</script>

    <?php
$Consultar_tramites= mysqli_query($conexion, "Select * from estacion_servicio INNER JOIN tramites ON estacion_servicio.id = tramites.id_es where estacion_servicio.es='".$numero_estacion."' and tramites.eliminado=0");    
$tramite = array();
$estado_tramite = array();
$fecha_registro_sistema = array();
while ($resultado = mysqli_fetch_array($Consultar_tramites,MYSQLI_ASSOC)){
    array_push($tramite, $resultado['nombre_tramite']);
    array_push($estado_tramite, $resultado['estado_tramite']);
    array_push($fecha_registro_sistema, $resultado['fecha_ingreso_sistema']);
}
$tramite_implode=implode(",",$tramite);
$estado_implode=implode(",",$estado_tramite);
$ingreso_sistema_implode= implode(",", $fecha_registro_sistema);
?>
<script>
    function_master('<?php echo $tramite_implode ?>','<?php echo $estado_implode ?>','<?php echo  $numero_estacion?>','<?php echo $ingreso_sistema_implode?>');
</script>
<?php
 }
?>



