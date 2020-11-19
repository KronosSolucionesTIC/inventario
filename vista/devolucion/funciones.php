<?php
function mes_letras($mes)
{
    switch ($mes) {
        case '1':
            $letras = 'ENERO';
            break;
        case '2':
            $letras = 'FEBRERO';
            break;
        case '3':
            $letras = 'MARZO';
            break;
        case '4':
            $letras = 'ABRIL';
            break;
        case '5':
            $letras = 'MAYO';
            break;
        case '6':
            $letras = 'JUNIO';
            break;
        case '7':
            $letras = 'JULIO';
            break;
        case '8':
            $letras = 'AGOSTO';
            break;
        case '9':
            $letras = 'SEPTIEMBRE';
            break;
        case '10':
            $letras = 'OCTUBRE';
            break;
        case '11':
            $letras = 'NOVIEMBRE';
            break;
        case '12':
            $letras = 'DICIEMBRE';
            break;
        default:
            $letras = 'NO EXISTE EL MES';
            break;
    }
    return $letras;
}
