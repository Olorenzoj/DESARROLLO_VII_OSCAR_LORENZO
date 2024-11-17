<?php
require_once "config_pdo.php";

// Procedimiento: Procesar devolución
$stmt = $pdo->prepare("CALL procesar_devolucion(:venta_id, :producto_id, :cantidad)");
$stmt->execute([':venta_id' => 1, ':producto_id' => 2, ':cantidad' => 1]);

// Procedimiento: Calcular descuento
$stmt = $pdo->prepare("CALL calcular_descuento(:cliente_id, @descuento)");
$stmt->execute([':cliente_id' => 3]);
$stmt = $pdo->query("SELECT @descuento AS descuento");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Descuento: {$row['descuento']}%<br>";

// Procedimiento: Reporte bajo stock
$pdo->query("CALL reporte_bajo_stock(@reporte)");
$stmt = $pdo->query("SELECT @reporte AS reporte");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Reporte: <pre>{$row['reporte']}</pre>";

// Procedimiento: Calcular comisiones
$stmt = $pdo->prepare("CALL calcular_comisiones(:vendedor_id, @comision)");
$stmt->execute([':vendedor_id' => 2]);
$stmt = $pdo->query("SELECT @comision AS comision");
$row = $stmt->fetch(PDO::FETCH_ASSOC);
echo "Comisión: $ {$row['comision']}<br>";

$pdo = null;
?>
