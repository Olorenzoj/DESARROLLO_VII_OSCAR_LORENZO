<?php
include('config_sesion.php');

$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
</head>
<body>
<h1>Carrito de Compras</h1>

<?php if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])): ?>
    <table border="1">
        <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>Subtotal</th>
            <th>Acción</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($_SESSION['carrito'] as $id => $producto) {
            $subtotal = $producto['precio'] * $producto['cantidad'];
            $total += $subtotal;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($producto['nombre']) . "</td>";
            echo "<td>$" . htmlspecialchars($producto['precio']) . "</td>";
            echo "<td>" . htmlspecialchars($producto['cantidad']) . "</td>";
            echo "<td>$" . htmlspecialchars($subtotal) . "</td>";
            echo "<td>
                    <form method='POST' action='eliminar_del_carrito.php'>
                        <input type='hidden' name='producto_id' value='$id'>
                        <button type='submit'>Eliminar</button>
                    </form>
                  </td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>

    <h2>Total: $<?php echo htmlspecialchars($total); ?></h2>


    <form method="POST" action="checkout.php">
        <label for="nombre_usuario">Ingresa tu nombre para finalizar la compra:</label>
        <input type="text" id="nombre_usuario" name="nombre_usuario" required>
        <button type="submit">Finalizar Compra</button>
    </form>

    <a href="productos.php">Seguir Comprando</a>

<?php else: ?>
    <p>Tu carrito está vacío. <a href="productos.php">Ver productos</a></p>
<?php endif; ?>

</body>
</html>
