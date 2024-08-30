<?php
$calificacion = 10;
$nota;
if ($calificacion >= 90) {
    $nota = 'A';
} elseif ($calificacion >= 80 && $calificacion < 90) {
    $nota = 'B';
} elseif ($calificacion >= 70 && $calificacion < 80) {
    $nota = 'C';
} elseif ($calificacion >= 60 && $calificacion < 70) {
    $nota = 'D';
} else {
    $nota = 'F';
}

$estado = ($nota == 'F') ? 'Reprobada' : 'Aprobada';

echo"La materia a sido $estado ";
switch ($nota) {
    case 'A':
        echo '<h3 style="color: green">Exelente Trabajo!!<h3>';
        break;
    case 'B':
        echo '<h3 style="color: #90ee90">Buen Trabajo<h3>';
        break;
    case 'C':
        echo '<h3 style="color: orange">Trabajo Aceptable<h3>';
        break;
    case 'D':
        echo '<h3 style="color: yellow">Necesitas mejorar<h3>';
        break;
    case 'F':
        echo '<h3 style="color: red">Debes esforzarte mas<h3>';
        break;
    default:
        # code...
        break;
}
