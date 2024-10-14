<?php
include('config_sesion.php');


if (isset($_POST['producto_id'])) {
    $producto_id = intval($_POST['producto_id']);


    $productos = array(
        0 => array("Producto" => "Laptop", "Marca" => "Dell", "Modelo" => "XPS 13", "Precio" => 1200),
        1 => array("Producto" => "Smartphone", "Marca" => "Apple", "Modelo" => "iPhone 14", "Precio" => 999),
        2 => array("Producto" => "Tablet", "Marca" => "Samsung", "Modelo" => "Galaxy Tab S7", "Precio" => 650),
        3 => array("Producto" => "Smartwatch", "Marca" => "Garmin", "Modelo" => "Fenix 6", "Precio" => 500),
        4 => array("Producto" => "Monitor", "Marca" => "LG", "Modelo" => "UltraWide", "Precio" => 350)
    );


    if (isset($productos[$producto_id])) {

        if (!isset($_SESSION['carrito'])) {
            $_SESSION['carrito'] = array();
        }


        if (isset($_SESSION['carrito'][$producto_id])) {
            $_SESSION['carrito'][$producto_id]['cantidad']++;
        } else {
            $_SESSION['carrito'][$producto_id] = array(
                "nombre" => $productos[$producto_id]['Producto'],
                "precio" => $productos[$producto_id]['Precio'],
                "cantidad" => 1
            );
        }
    }


    header("Location: productos.php");
    exit();
}
?>
