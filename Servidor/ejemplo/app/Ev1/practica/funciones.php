<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="estilo.css" type="text/css">
    <title>Document</title>
</head>
<body>
<?php

$nombre = "sigmaReal";

function funcion (&$a,$b):int|float{
    echo "<h1>Valor de parámetro antes de modificar \$a $a</h1>";
    echo "<h1>Valor de parámetro antes de modificar \$b $b</h1>";
    $a *= 2;
    $b *= 2;
    echo "<h1>Valor de parámetro despues de modificar \$a $a</h1>";
    echo "<h1>Valor de parámetro despues de modificar \$b $b</h1>";
    if ($a > $b) 
        return $a;
    else 
        return $b;

}

$a = rand (1,10);
$b = rand (1,10);
echo "<h1>Valor de \$a $a</h1>";
echo "<h1>Valor de \$b $b</h1>";
funcion($a,$b);
echo "<h1>Valor de \$a $a</h1>";
echo "<h1>Valor de \$b $b</h1>";

//funciones flecha
$saludar = fn()=> "hola";

echo "<h1>Tipo de saludar". gettype($saludar)."</h1>";

?>
</body>
</html>
