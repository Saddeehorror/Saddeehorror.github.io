    <tr style="display: none" class="tyc_table">
        <th Colspan = "2" class="Encabezado">Terminos y Condicionantes</th>
    </tr>
    <tr style="display: none" class="tyc_table">
        <td>Periodo para presentar los Terminos y Condicionantes: </td>
        <td>
            <input type="radio" name="periodo" value="anual" checked="checked" onchange="draw_fechas_tyc(this.value)"> Anual<br>
            <input type="radio" name="periodo" value="semestral" onchange="draw_fechas_tyc(this.value)"> Semestral<br>
        </td>
    </tr>
    <tr style="display: none" class="tyc_table" id="fecha1_tyc_table">
        <td>Fecha para presentar terminos y condicionantes: </td>
        <td><input type="date" name="fecha1"></td>
    </tr>
    <tr style="display: none" class="tyc_table" id="fecha2_tyc_table">
    </tr>
<?php
