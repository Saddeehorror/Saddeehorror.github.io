<?php

function calcular_dias($estado, $sector) {
    $array_datos = array();
    if ($sector == "Comercial") {
        switch ($estado) { //Relacion estados sector comercial
            case 'Coahuila':
                $mes = 8;
                $año_inicio = "2018";
                break;
            case 'Nuevo_León':
                $mes = 9;
                $año_inicio = "2018";
                break;
            case 'Veracruz':
                $mes = 10;
                $año_inicio = "2018";
                break;
            case 'Hidalgo':
                $mes = 10;
                $año_inicio = "2018";
                break;
            case 'Jalisco':
                $mes = 11;
                $año_inicio = "2018";

                break;
            case 'Estado_de_México':
                $mes = 12;
                $año_inicio = "2018";
                break;
            case 'Guanajuato':
                $mes = 1;
                $año_inicio = "2019";
                break;
            case 'Ciudad_de_México':
                $mes = 1;
                $año_inicio = "2019";
                break;
            case 'Campeche':
                $mes = 1;
                $año_inicio = "2019";
                break;
            case 'Sonora':
                $mes = 2;
                $año_inicio = "2019";
                break;
            case 'Oaxaca':
                $mes = 2;
                $año_inicio = "2019";
                break;
            case 'Querétaro':
                $mes = 2;
                $año_inicio = "2019";
                break;
            case 'Chihuahua':
                $mes = 3;
                $año_inicio = "2019";
                break;
            case 'San_Luis_Potosí':
                $mes = 3;
                $año_inicio = "2019";
                break;
            case 'Yucatán':
                $mes = 3;
                $año_inicio = "2019";
                break;
            case 'Tamaulipas':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Aguascalientes':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Guerrero':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Baja_California':
                $mes = 5;
                $año_inicio = "2019";
                break;
            case 'Morelos':
                $mes = 5;
                $año_inicio = "2019";
                break;
            case 'Tabasco':
                $mes = 5;
                $año_inicio = "2019";
                break;
            case 'Puebla':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Nayarit':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Quintana_Roo':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Sinaloa':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'Tlaxcala':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'Baja_California_Sur':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'Zacatecas':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'Michoacán':
                $mes = 8;
                $año_inicio = "2019";
                break;
            case 'Colima':
                $mes = 8;
                $año_inicio = "2019";
                break;
            case 'Durango':
                $mes = 8;
                $año_inicio = "2019";
                break;
            case 'Chiapas':
                $mes = 8;
                $año_inicio = "2019";
                break;
        }
    } else {
        switch ($estado) { //Relacion estados sector industrial
            case 'Coahuila':
                $mes = 9;
                $año_inicio = "2018";
                break;
            case 'Nuevo_León':
                $mes = 11;
                $año_inicio = "2018";
                break;
            case 'Veracruz':
                $mes = 11;
                $año_inicio = "2018";
                break;
            case 'Hidalgo':
                $mes = 11;
                $año_inicio = "2018";
                break;
            case 'Jalisco':
                $mes = 8;
                $año_inicio = "2018";

                break;
            case 'Estado_de_México':
                $mes = 12;
                $año_inicio = "2018";
                break;
            case 'Guanajuato':
                $mes = 11;
                $año_inicio = "2019";
                break;
            case 'Ciudad_de_México':
                $mes = 10;
                $año_inicio = "2018";
                break;
            case 'Campeche':
                $mes = 2;
                $año_inicio = "2019";
                break;
            case 'Sonora':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'Oaxaca':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Querétaro':
                $mes = 1;
                $año_inicio = "2019";
                break;
            case 'Chihuahua':
                $mes = 7;
                $año_inicio = "2019";
                break;
            case 'San_Luis_Potosí':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Yucatán':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Tamaulipas':
                $mes = 10;
                $año_inicio = "2018";
                break;
            case 'Aguascalientes':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Guerrero':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Baja_alifornia':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Morelos':
                $mes = 5;
                $año_inicio = "2019";
                break;
            case 'Tabasco':
                $mes = 5;
                $año_inicio = "2019";
                break;
            case 'Puebla':
                $mes = 11;
                $año_inicio = "2018";
                break;
            case 'Nayarit':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Quintana_Roo':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Sinaloa':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Tlaxcala':
                $mes = 3;
                $año_inicio = "2019";
                break;
            case 'Baja_California_Sur':
                $mes = 4;
                $año_inicio = "2019";
                break;
            case 'Zacatecas':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Michoacán':
                $mes = 6;
                $año_inicio = "2019";
                break;

            case 'Colima':
                $mes = 8;
                $año_inicio = "2019";
                break;
            case 'Durango':
                $mes = 6;
                $año_inicio = "2019";
                break;
            case 'Chiapas':
                $mes = 4;
                $año_inicio = "2019";
                break;
        }
    }
    $año_mensaje1 = $año_inicio;
    $año_mensaje2 = $año_inicio;
    if ($mes == 2) {
        $inicio_mensajes1 = 12;
        $inicio_mensajes2 = 1;
        $año_mensaje1 = $año_inicio - 1;
    } else if ($mes == 1) {
        $inicio_mensajes1 = 11;
        $inicio_mensajes2 = 12;
        $año_mensaje1 = $año_inicio - 1;
        $año_mensaje2 = $año_inicio - 1;
    } else {
        $inicio_mensajes1 = $mes - 2;
        $inicio_mensajes2 = $mes - 1;
    }
    array_push($array_datos, $inicio_mensajes1);
    array_push($array_datos, $año_mensaje1);
    array_push($array_datos, $inicio_mensajes2);
    array_push($array_datos, $año_mensaje2);
    array_push($array_datos, $mes);
    array_push($array_datos, $año_inicio);

    return $array_datos;
}

function calcular_dias_alarma($array) {
    $main_array = array();
//Mes 1 ........................................................................
    $Primer_Mes = $array[0];
    $Primer_Año = $array[1];
    $Ultimo_Dia_Primer_Mes = date("d", mktime(0, 0, 0, $Primer_Mes + 1, 0, $Primer_Año));
//Mes 2.........................................................................
    $Segundo_Mes = $array[2];
    $Segundo_Año = $array[3];
    $Ultimo_Dia_Segundo_Mes = date("d", mktime(0, 0, 0, $Segundo_Mes + 1, 0, $Segundo_Año));
//Mes 3.........................................................................
    $Tercer_Mes = $array[4];
    $Tercer_Año = $array[5];
    $Ultimo_Dia_Tercer_Mes = date("d", mktime(0, 0, 0, $Tercer_Mes + 1, 0, $Tercer_Año));
//Alarmas Mes 1.................................................................
    $Dias_Primer_Mes = array();
    for ($i = 1; $i <= $Ultimo_Dia_Primer_Mes; $i++) {
        if ($i == 1) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Primer_Mes, $i, $Primer_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 1) {
                
            } else {
                array_push($Dias_Primer_Mes, $ultimo);
            }
        } elseif ($i == $Ultimo_Dia_Primer_Mes) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Primer_Mes, $i, $Primer_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 1) {
                
            } else {
                array_push($Dias_Primer_Mes, $ultimo);
            }
        }
        $ultimo = date('Y-m-d', mktime(0, 0, 0, $Primer_Mes, $i, $Primer_Año));
        $dia_semana = date("w", strtotime($ultimo));
        if ($dia_semana == 1) {
            array_push($Dias_Primer_Mes, $ultimo);
        }
    }
//FIN Alarmas Mes 1.............................................................
//
//Alarmas Mes 2.................................................................
    $Dias_Segundo_Mes = array();
    for ($i = 1; $i <= $Ultimo_Dia_Segundo_Mes; $i++) {
        if ($i == 1) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Segundo_Mes, $i, $Segundo_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 1) {
                
            } else {
                array_push($Dias_Segundo_Mes, $ultimo);
            }
        } elseif ($i == $Ultimo_Dia_Segundo_Mes) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Segundo_Mes, $i, $Segundo_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 1) {
                
            } else {
                array_push($Dias_Segundo_Mes, $ultimo);
            }
        } elseif ($i > 19) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Segundo_Mes, $i, $Segundo_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana != 0 && $dia_semana != 6) {
                array_push($Dias_Segundo_Mes, $ultimo);
            }
        } else {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Segundo_Mes, $i, $Segundo_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 1) {
                array_push($Dias_Segundo_Mes, $ultimo);
            }
        }
    }
//FIN Alarmas Mes 2.............................................................
//Alarmas Mes 3.................................................................
    $Dias_Tercer_Mes = array();
    for ($i = 1; $i <= 21; $i++) {
        $ultimo = date('Y-m-d', mktime(0, 0, 0, $Tercer_Mes, $i, $Tercer_Año));
        $dia_semana = date("w", strtotime($ultimo));
        if ($dia_semana != 0 && $dia_semana != 6) {
            array_push($Dias_Tercer_Mes, $ultimo);
        }
        if ($i == 21) {
            $ultimo = date('Y-m-d', mktime(0, 0, 0, $Tercer_Mes, $i, $Tercer_Año));
            $dia_semana = date("w", strtotime($ultimo));
            if ($dia_semana == 0) {
                $ultimo = date('Y-m-d', mktime(0, 0, 0, $Tercer_Mes, 22, $Tercer_Año));
                array_push($Dias_Tercer_Mes, $ultimo);
            } elseif ($dia_semana == 6) {
                $ultimo = date('Y-m-d', mktime(0, 0, 0, $Tercer_Mes, 23, $Tercer_Año));
                array_push($Dias_Tercer_Mes, $ultimo);
            }
        }
    }
//FIN Alarmas Mes 3.............................................................   

    array_push($main_array, $Dias_Primer_Mes);
    array_push($main_array, $Dias_Segundo_Mes);
    array_push($main_array, $Dias_Tercer_Mes);

    return $main_array;
}