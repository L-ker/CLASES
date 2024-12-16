<?php
$cantidad1 = 0;
$cantidad2 = 0;
$cantidad3 = 0;
$cantidad4 = 0;
$cantidad5 = 0;
$cantidad6 = 0;

for ($i = 0; $i < 10000; $i++) {
    $random = rand(1,6);

    match($random) {
        1 => $cantidad1++,
        2 => $cantidad2++,
        3 => $cantidad3++,
        4 => $cantidad4++,
        5 => $cantidad5++,
        6 => $cantidad6++,
    };

}

echo "<h1>cantidad de veces que ha salido el 1 $cantidad1</h1>";
echo "<h1>cantidad de veces que ha salido el 2 $cantidad2</h1>";
echo "<h1>cantidad de veces que ha salido el 3 $cantidad3</h1>";
echo "<h1>cantidad de veces que ha salido el 4 $cantidad4</h1>";
echo "<h1>cantidad de veces que ha salido el 5 $cantidad5</h1>";
echo "<h1>cantidad de veces que ha salido el 6 $cantidad6</h1>";


?>
