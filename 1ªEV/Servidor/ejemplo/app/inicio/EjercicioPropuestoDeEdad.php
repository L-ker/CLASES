<?php

$edad = rand (0,100);
$msj = "sigma";
switch (TRUE) {
    case ($edad >= 0 && $edad <= 2):
        $msj = "Bebe";
        break;
    case ($edad >= 3 && $edad <= 10):
        $msj = "Niño";
        break;
    case ($edad >= 11 && $edad <= 17):
        $msj = "adolescente";
        break;
    case ($edad >= 18 && $edad <= 26):
        $msj = "Joven";
        break;
    case ($edad >= 27 && $edad <= 59):
        $msj = "Adulto";
        break;
    case ($edad >= 60 && $edad <= 80):
        $msj = "Viejo";
        break;
    default:
        $msj = "disfruta a tope ";
}

echo "Tu edad es $edad, $msj";
?>