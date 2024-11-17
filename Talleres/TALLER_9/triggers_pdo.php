<?php
require_once "config_pdo.php";

// Verificar disparo del trigger de membresía
$stmt = $pdo->prepare("SELECT nivel_membresia FROM clientes WHERE id = :cliente_id");
$stmt->execute([':cliente_id' => 3]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Nivel de Membresía: {$row['nivel_membresia']}<br>";

// Verificar actualización de estadísticas por categoría
$stmt = $pdo->prepare("SELECT * FROM estadisticas_categoria WHERE categoria_id = :categoria_id");
$stmt->execute([':categoria_id' => 2]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Ventas Totales: {$row['total_ventas']} - Productos Vendidos: {$row['cantidad_vendida']}<br>";

// Verificar alerta por stock crítico
$stmt = $pdo->query("SELECT * FROM alertas ORDER BY fecha_alerta DESC LIMIT 1");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Alerta: {$row['mensaje']} - Fecha: {$row['fecha_alerta']}<br>";

// Verificar historial de cambios de estado
$stmt = $pdo->prepare("SELECT * FROM historial_estado_clientes WHERE cliente_id = :cliente_id ORDER BY fecha_cambio DESC LIMIT 1");
$stmt->execute([':cliente_id' => 3]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Historial: Estado anterior: {$row['estado_anterior']}, Nuevo estado: {$row['estado_nuevo']}, Fecha: {$row['fecha_cambio']}<br>";

$pdo = null;
?>
