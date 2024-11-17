<?php
require_once "config_pdo.php";

// Consulta crítica
$consulta = "SELECT c.nombre, SUM(v.total) AS total_compras
             FROM clientes c
             JOIN ventas v FORCE INDEX (idx_cliente_id) ON c.id = v.cliente_id
             GROUP BY c.id
             ORDER BY total_compras DESC";

$inicio = microtime(true);
$stmt = $pdo->query($consulta);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
$fin = microtime(true);

// Tiempo de ejecución
$tiempo = $fin - $inicio;

// Registrar tiempo en la tabla de monitoreo
$stmt = $pdo->prepare("INSERT INTO monitoreo_consultas (consulta, tiempo_ejecucion) VALUES (:consulta, :tiempo)");
$stmt->execute([
    ':consulta' => $consulta,
    ':tiempo' => $tiempo
]);

echo "Consulta registrada. Tiempo: {$tiempo} segundos";
?>
