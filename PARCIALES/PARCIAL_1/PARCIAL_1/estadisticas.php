<?php
function calcular_media($datos) {
    $suma = array_sum($datos);
    $n = count($datos);
    return $suma / $n;
}

function calcular_mediana($datos) {
    sort($datos);
    $n = count($datos);
    $mitad = floor($n / 2);

    if ($n % 2 == 0) {
        return ($datos[$mitad - 1] + $datos[$mitad]) / 2;
    } else {
        return $datos[$mitad];
    }
}

function encontrar_moda($datos) {
    $frecuencia = array_count_values($datos);
    arsort($frecuencia);
    $max_frecuencia = max($frecuencia);
    $modas = array_keys($frecuencia, $max_frecuencia);
    return $modas;
}

