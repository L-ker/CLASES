<?php

$mes = rand(1,12);
$dias = match($mes) {
    1,3,5,7,8,10,12 => "Tiene 31 días",
    2 => "Tiene 28 o 29 dias",
    4,6,9,11 => "Tiene 30 días"
};

echo "<h1>El mes $mes tiene $dias</h1>";

$edad = rand (0,3);
$msj = match(TRUE) {
    $edad >=0 && $edad <=3 => "Eres un niño",
};


$edad = rand (0,100);

echo $edad %2 == 0 ? "La edad $edad es par" : "La edad $edad es impar";
?>