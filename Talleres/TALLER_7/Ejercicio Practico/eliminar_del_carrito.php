<?php
include('config_sesion.php');

if (isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);


    if (isset($_SESSION['carrito'][$producto_id])) {
        unset($_SESSION['carrito'][$producto_id]);
    }

    header("Location: ver_carrito.php");
    exit();
}
?>
