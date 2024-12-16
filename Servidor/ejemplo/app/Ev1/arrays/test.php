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

$aleatorio = fn()=>rand(1,100);
$datos = array_fill(0,20,rand(1,10));
$datos = array_map($aleatorio, $datos);
$cuadrado = fn($num) => $num*$num;
$datos2 = array_map($cuadrado, $datos);

$sumar = fn($num, $num2) => $num*$num2;
// $sumar = fn($num, $num2) => $num+$num2;
$total_suma = array_reduce($datos, $sumar, 1);

$multiplos_5 = fn($num) => $num%5==0;
$multiplos = array_filter($datos,$multiplos_5);

var_dump($datos);
var_dump($datos2);

//sort
$datos[30] = 85;
$datos[40] = 85;
var_dump($datos);
sort($datos);
var_dump($datos);


$cadena = serialize($datos);
$array = unserialize($cadena);
?>
