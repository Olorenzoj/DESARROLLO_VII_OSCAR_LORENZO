<?php
require_once "config_mysqli.php";

// Verificar disparo del trigger de membresía
$cliente_id = 3;
$result = $conn->query("SELECT nivel_membresia FROM clientes WHERE id = $cliente_id");
$row = $result->fetch_assoc();
echo "Nivel de Membresía: {$row['nivel_membresia']}<br>";

// Verificar actualización de estadísticas por categoría
$categoria_id = 2;
$result = $conn->query("SELECT * FROM estadisticas_categoria WHERE categoria_id = $categoria_id");
$row = $result->fetch_assoc();
echo "Ventas Totales: {$row['total_ventas']} - Productos Vendidos: {$row['cantidad_vendida']}<br>";

// Verificar alerta por stock crítico
$result = $conn->query("SELECT * FROM alertas ORDER BY fecha_alerta DESC LIMIT 1");
$row = $result->fetch_assoc();
echo "Alerta: {$row['mensaje']} - Fecha: {$row['fecha_alerta']}<br>";

// Verificar historial de cambios de estado
$cliente_id = 3;
$result = $conn->query("SELECT * FROM historial_estado_clientes WHERE cliente_id = $cliente_id ORDER BY fecha_cambio DESC LIMIT 1");
$row = $result->fetch_assoc();
echo "Historial: Estado anterior: {$row['estado_anterior']}, Nuevo estado: {$row['estado_nuevo']}, Fecha: {$row['fecha_cambio']}<br>";

$conn->close();
?>
