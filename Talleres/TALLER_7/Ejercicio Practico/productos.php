<?php
include('config_sesion.php');


$productos = array(
    0 => array("Producto" => "Laptop", "Marca" => "Dell", "Modelo" => "XPS 13", "Precio" => 1200),
    1 => array("Producto" => "Smartphone", "Marca" => "Apple", "Modelo" => "iPhone 14", "Precio" => 999),
    2 => array("Producto" => "Tablet", "Marca" => "Samsung", "Modelo" => "Galaxy Tab S7", "Precio" => 650),
    3 => array("Producto" => "Smartwatch", "Marca" => "Garmin", "Modelo" => "Fenix 6", "Precio" => 500),
    4 => array("Producto" => "Monitor", "Marca" => "LG", "Modelo" => "UltraWide", "Precio" => 350)
);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
</head>
<body>
<h1>Lista de Productos</h1>
<table border="1">
    <thead>
    <tr>
        <th>Producto</th>
        <th>Marca</th>
        <th>Modelo</th>
        <th>Precio</th>
        <th>Acción</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($productos as $index => $producto) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($producto['Producto']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['Marca']) . "</td>";
        echo "<td>" . htmlspecialchars($producto['Modelo']) . "</td>";
        echo "<td>$" . htmlspecialchars($producto['Precio']) . "</td>";
        echo "<td>
                <form method='POST' action='agregar_al_carrito.php'>
                    <input type='hidden' name='producto_id' value='$index'>
                    <button type='submit'>Añadir al Carrito</button>
                </form>
              </td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>

<a href="ver_carrito.php">Ver Carrito</a>
</body>
</html>
