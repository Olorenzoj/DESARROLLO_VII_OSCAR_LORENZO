<?php
function calcular_total_ventas($datos_ventas) {
    $total = 0;
    foreach ($datos_ventas as $ventas) {
        $total += array_sum($ventas);
    }
    return $total;
}

function producto_mas_vendido($datos_ventas) {
    $total_por_producto = [];
    foreach ($datos_ventas as $producto => $ventas) {
        $total_por_producto[$producto] = array_sum($ventas);
    }
    arsort($total_por_producto);
    return key($total_por_producto);
}

function ventas_por_region($datos_ventas) {
    $ventas_region = [];
    foreach ($datos_ventas as $producto => $ventas) {
        foreach ($ventas as $region => $venta) {
            if (!isset($ventas_region[$region])) {
                $ventas_region[$region] = 0;
            }
            $ventas_region[$region] += $venta;
        }
    }
    arsort($ventas_region);
    return $ventas_region;
}

