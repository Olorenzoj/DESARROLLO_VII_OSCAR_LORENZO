<?php
include('config_sesion.php');


if (isset($_POST['nombre_usuario'])) {
    $nombre_usuario = htmlspecialchars($_POST['nombre_usuario']);

    setcookie('nombre_usuario', $nombre_usuario, time() + 86400, "/", "", true, true);
} else {
    $nombre_usuario = "Usuario";
}


$carrito = isset($_SESSION['carrito']) ? $_SESSION['carrito'] : array();
$total = 0;

foreach ($carrito as $producto) {
    $total += $producto['precio'] * $producto['cantidad'];
}


unset($_SESSION['carrito']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Finalizada</title>
</head>
<body>
<h1>Gracias por tu compra, <?php echo $nombre_usuario; ?>!</h1>

<h2>Resumen de la Compra</h2>
<p>Total de productos: <?php echo count($carrito); ?></p>
<p>Total pagado: $<?php echo htmlspecialchars($total); ?></p>

<a href="productos.php">Volver a la tienda</a>

</body>
</html>
