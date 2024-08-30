<?php
$nombre = 'Oscar Lorenzo';
$edad = 20;
$correo = 'olorenzo2004@gmail.com';
$telefono = '6668-4666';

define('OCUPACION', 'PriceFx developer');
echo "Hola mi nombre es $nombre tengo $edad anos, mi correo es $correo y mi numero telefonico es $telefono
,<br> actualmente trabajo de programador es pecificamente como <h3>" . OCUPACION . "</h3>";

echo "<br>Información de debugging:<br>";
var_dump($nombre);
echo "<br>";
var_dump($edad);
echo "<br>";
var_dump($correo);
echo "<br>";
var_dump(OCUPACION);
echo "<br>";
