<?php
$productos = [
    'lechugas'=>  ['precio' => 100, 'unidades'=>50],
    'manzanas'=>  [ 'precio' => 200, 'unidades'=>100],
    'peras'=>  [ 'precio' => 300, 'unidades'=>150],
    'tomates'=>  [ 'precio' => 400, 'unidades'=>200],
    'cebollas'=>  ['precio' => 500, 'unidades'=>25],
];

foreach ($productos  as $producto => $detalle) {
    echo "<h1>$producto:</h1>";
    echo "<ul>";
    echo "<li>{$detalle['precio']}$ y quedan {$detalle['unidades']} unidades</li>";
    echo "</ul>";
}
?>