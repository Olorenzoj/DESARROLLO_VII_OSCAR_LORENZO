<?php
require_once "config_mysqli.php";

// Procedimiento: Procesar devolución
$stmt = $conn->prepare("CALL procesar_devolucion(?, ?, ?)");
$stmt->bind_param("iii", $venta_id, $producto_id, $cantidad);
$venta_id = 1;
$producto_id = 2;
$cantidad = 1;
$stmt->execute();

// Procedimiento: Calcular descuento
$stmt = $conn->prepare("CALL calcular_descuento(?, @descuento)");
$stmt->bind_param("i", $cliente_id);
$cliente_id = 3;
$stmt->execute();
$result = $conn->query("SELECT @descuento AS descuento");
$row = $result->fetch_assoc();
echo "Descuento: {$row['descuento']}%<br>";

// Procedimiento: Reporte bajo stock
$stmt = $conn->query("CALL reporte_bajo_stock(@reporte)");
$result = $conn->query("SELECT @reporte AS reporte");
$row = $result->fetch_assoc();
echo "Reporte: <pre>{$row['reporte']}</pre>";

// Procedimiento: Calcular comisiones
$stmt = $conn->prepare("CALL calcular_comisiones(?, @comision)");
$stmt->bind_param("i", $vendedor_id);
$vendedor_id = 2;
$stmt->execute();
$result = $conn->query("SELECT @comision AS comision");
$row = $result->fetch_assoc();
echo "Comisión: $ {$row['comision']}<br>";

$conn->close();
?>
