<?php
require_once "config_mysqli.php";

// Verificar conexión
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Función: Productos nunca vendidos
function productosNuncaVendidos($conn) {
    $sql = "SELECT p.nombre AS producto
            FROM productos p
            LEFT JOIN ventas_detalles vd ON p.id = vd.producto_id
            WHERE vd.producto_id IS NULL";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h3>Productos nunca vendidos:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Producto: {$row['producto']}<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

// Función: Categorías con número de productos y valor total del inventario
function categoriasInventario($conn) {
    $sql = "SELECT c.nombre AS categoria, COUNT(p.id) AS total_productos, SUM(p.precio * p.stock) AS valor_inventario
            FROM categorias c
            LEFT JOIN productos p ON c.id = p.categoria_id
            GROUP BY c.id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h3>Categorías con inventario:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Categoría: {$row['categoria']}, Productos: {$row['total_productos']}, Valor Inventario: ${$row['valor_inventario']}<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

// Función: Clientes que han comprado todos los productos de una categoría específica
function clientesCategoriaEspecifica($conn, $categoria_id) {
    $sql = "SELECT DISTINCT c.nombre AS cliente
            FROM clientes c
            JOIN ventas v ON c.id = v.cliente_id
            JOIN ventas_detalles vd ON v.id = vd.venta_id
            WHERE NOT EXISTS (
                SELECT 1
                FROM productos p
                WHERE p.categoria_id = $categoria_id
                AND NOT EXISTS (
                    SELECT 1
                    FROM ventas_detalles vd2
                    WHERE vd2.producto_id = p.id
                    AND vd2.venta_id IN (SELECT v.id FROM ventas v WHERE v.cliente_id = c.id)
                )
            )";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h3>Clientes que compraron todos los productos de la categoría {$categoria_id}:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Cliente: {$row['cliente']}<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

// Función: Porcentaje de ventas de cada producto respecto al total
function porcentajeVentasPorProducto($conn) {
    $sql = "SELECT p.nombre AS producto, 
                   SUM(vd.cantidad * vd.precio) AS total_ventas_producto,
                   (SUM(vd.cantidad * vd.precio) / (SELECT SUM(cantidad * precio) FROM ventas_detalles)) * 100 AS porcentaje_ventas
            FROM productos p
            JOIN ventas_detalles vd ON p.id = vd.producto_id
            GROUP BY p.id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<h3>Porcentaje de ventas por producto:</h3>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "Producto: {$row['producto']}, Porcentaje: {$row['porcentaje_ventas']}%<br>";
        }
        mysqli_free_result($result);
    } else {
        echo "Error en la consulta: " . mysqli_error($conn);
    }
}

// Ejecutar las consultas
productosNuncaVendidos($conn);
categoriasInventario($conn);
clientesCategoriaEspecifica($conn, 1);
porcentajeVentasPorProducto($conn);

// Cerrar conexión
mysqli_close($conn);
?>
