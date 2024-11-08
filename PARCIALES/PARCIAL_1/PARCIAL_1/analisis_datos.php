<?php
include 'estadisticas.php';

$datos = [23, 45, 67, 89, 23, 45, 23, 56, 78, 90, 45, 67, 45, 23, 56, 78, 90, 67, 45, 23];

$media = calcular_media($datos);
$mediana = calcular_mediana($datos);
$moda = encontrar_moda($datos);

echo'media' . $media;
echo ' ';
echo 'mediana'. $mediana;
echo ' ';
for ($i = 0; $i < sizeof($moda); $i++) {
    echo ' '. $moda[$i] .' ';
}

