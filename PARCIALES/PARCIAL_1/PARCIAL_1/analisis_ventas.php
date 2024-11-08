<?php
include 'procesamiento_ventas.php';

$datos_ventas = [
    'Producto A' => ['Región 1' => 100, 'Región 2' => 150, 'Región 3' => 200, 'Región 4' => 250],
    'Producto B' => ['Región 1' => 200, 'Región 2' => 250, 'Región 3' => 300, 'Región 4' => 350],
    'Producto C' => ['Región 1' => 150, 'Región 2' => 200, 'Región 3' => 250, 'Región 4' => 300],
    'Producto D' => ['Región 1' => 50, 'Región 2' => 100, 'Región 3' => 150, 'Región 4' => 200],
    'Producto E' => ['Región 1' => 300, 'Región 2' => 350, 'Región 3' => 400, 'Región 4' => 450]
];

$total_ventas = calcular_total_ventas($datos_ventas);
$producto_mas_vendido = producto_mas_vendido($datos_ventas);
$ventas_region = ventas_por_region($datos_ventas);


echo "<h1>Análisis de Ventas</h1>";
echo "<table border='1'>
    <tr><th>Producto</th><th>Total Ventas</th></tr>";

foreach ($datos_ventas as $producto => $ventas) {
    echo "<tr><td>$producto</td><td>" . array_sum($ventas) . "</td></tr>";
}

echo "</table><br>";

echo "<p><strong>Total de ventas de la empresa:</strong> $total_ventas</p>";
echo "<p><strong>Producto más vendido:</strong> $producto_mas_vendido</p>";

echo "<h2>Ventas por Región</h2>";
echo "<table border='1'>
    <tr><th>Región</th><th>Total Ventas</th></tr>";

foreach ($ventas_region as $region => $ventas) {
    echo "<tr><td>$region</td><td>$ventas</td></tr>";
}

echo "</table>";