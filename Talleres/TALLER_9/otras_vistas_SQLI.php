<?php
require_once "config_mysqli.php";

// Consultas para cada vista
$queries = [
    "productos_bajo_stock" => "SELECT * FROM productos_bajo_stock",
    "historial_clientes" => "SELECT * FROM historial_clientes",
    "rendimiento_por_categoria" => "SELECT * FROM rendimiento_por_categoria",
    "tendencias_ventas" => "SELECT * FROM tendencias_ventas"
];

foreach ($queries as $view => $query) {
    echo "<h3>Vista: {$view}</h3>";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<pre>";
            print_r($row);
            echo "</pre>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la vista {$view}: " . mysqli_error($conn) . "<br>";
    }
}

mysqli_close($conn);
?>
