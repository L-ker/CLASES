<?php

header("Refresh:5;url=index.php");

?>

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
    
</body>
</html>
$nombre = "sigmaReal";

function sumar (int|float &$num1,int|float$num2=5):int|float{
   global  $nombre;
   $nombre = "pedro";
   //$num1 = 5000;
   //al tener el & hace referencia a la direccion de memoria de la variable en vez del valor sin mas
   return $num1+$num2;
    
}


$num1 = 5;
$num2 = 10;
$total = sumar($num1, $num2);
echo "<h1>$total</h1>";
echo "<h1>$num1";

$saludo = function ($nombre) {
   return "hola $nombre";
};

echo "<h1> ejecutando saludo ".$saludo("pedro")."</h1>";

$sumar = fn ($num1,$num2) => ($num1 + $num2);

$suma = $sumar (2,5);
$restar = function ($num1,$num2){
   return $num1 + $num2;
};

$tablaDel5 = fn ($num) => ($num * 5);

echo "<h1>tabla del 5 con 8 $tablaDel5(8)</h1>";

?>

