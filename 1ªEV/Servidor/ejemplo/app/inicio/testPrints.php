<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
# ECHO
echo "Hola, esto es un echo <br>";
echo "hola, esto es una contrabarra y n \n hola <br>";
# \n parece no funcionar para hacer un salto de linea, supongo que porque la forma de visualizacion es html
echo "hola, esto es una contrabarra y t \t hola <br>";
echo "hola, esto es una contrabarra y v \v hola <br>";
echo "argumento 1 " , "argumento 2 ", "argumento 3 ", "argumento 4 <br>";
# PRINT
$correcto = print "Printeando <br>";

echo $correcto , "<br>";
#PRINTF
$numeroRandom =rand (1,127);
printf("El valor del numero con 2 decimales es %x %X %b %o<br>", $numeroRandom, $numeroRandom, $numeroRandom, $numeroRandom);

$numero = 5.12313213;
printf("El valor del numero con 2 decimales es %.2f <br>", $numero);

#PRINTR
$vectorDeCaracoles = array("Caracol Helix Pomatia", "Caracol Comu Aspersum", "Caracol Monachoides Vicinus", "Caracol Scutalus");

echo $vectorDeCaracoles;

print_r($vectorDeCaracoles);

$arrayEnCadena = print_r($vectorDeCaracoles, true);

echo "<br>";

echo $arrayEnCadena, "<br>";

#VAR_DUMP
echo "<br>";
$cadena = "Me gustan mucho los caracoles dormidores";
$numeroVarDump = 10;
$flotante = 3.14162833;
$arrayTiposAutismo = array("Síndrome de Asperger" , "Síndrome de Rett" , "Síndrome de Kanner");

var_dump($cadena);
echo "<br>";
var_dump($numeroVarDump);
echo "<br>";
var_dump($flotante);
echo "<br>";
var_dump($arrayTiposAutismo);

?>
</body>
</html>