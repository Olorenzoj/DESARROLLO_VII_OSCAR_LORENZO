<?php
require_once 'Empresa.php';

$empresa = new Empresa();

$gerente = new Gerente("Oscar", 1, 5000, "IT");
$gerente->asignarBono(1000);

$desarrollador = new Desarrollador("Laura", 2, 3000, "PHP", "Senior");

$empresa->agregarEmpleado($gerente);
$empresa->agregarEmpleado($desarrollador);

echo "<h3>Listado de empleados:</h3>";
$empresa->listarEmpleados();

echo "<h3>Nómina total:</h3>";
echo $empresa->calcularNominaTotal() . " USD<br>";

echo "<h3>Evaluaciones de desempeño:</h3>";
$empresa->evaluarDesempenioEmpleados();
?>
