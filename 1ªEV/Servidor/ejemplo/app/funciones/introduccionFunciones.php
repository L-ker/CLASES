<?php

function sumar(int|string$a, int $b):int|string{
    if (is_string($a)) {
        $racional1 = explode("/",$a);
        $num = $b * $racional1[1] + $racional1[0];
        return "$num/$racional1[1]";
    }

    return $a += $b;
}

$total = sumar (6,7);
$total_racional = sumar ("7/8",5);
$total_entero = sumar(9,5);

echo "<h1>8/7 + 5 = $total_racional</h1>";
echo "<h1>9/5 + 5 = $total_entero</h1>";


?>
