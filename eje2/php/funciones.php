<?php

function calcularIntereses($depositoInicial, $cantidadDias){
    $tasa=0;
    $intereses = 0;
    switch ($cantidadDias) {
        case 30:
            $tasa =122;
            break;
        case 45:
            $tasa =130;
            break;
        case 60:
            $tasa =142;
            break;
        case 90:
            $tasa =155;
            break;
        default:
            echo("Error al calular la tasa de interes");
            break;
    }
    $intereses = $depositoInicial * ($tasa/100)*($cantidadDias/365);
    return $intereses;
}

?>