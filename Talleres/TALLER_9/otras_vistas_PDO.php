<?php
require_once "config_pdo.php";

// Consultas para cada vista
$queries = [
    "productos_bajo_stock" => "SELECT * FROM productos_bajo_stock",
    "historial_clientes" => "SELECT * FROM historial_clientes",
    "rendimiento_por_categoria" => "SELECT * FROM rendimiento_por_categoria",
    "tendencias_ventas" => "SELECT * FROM tendencias_ventas"
];

try {
    foreach ($queries as $view => $query) {
        echo "<h3>Vista: {$view}</h3>";
        $stmt = $pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
