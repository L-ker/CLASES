<?php
$caracteresNoAlfanumericos = "!#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
$str = "";
for ($i = 0; $i < 6; $i++) {
    $str = "$str" . chr(rand(33, 126));
}
//$caracter = "";
//for($i = 0; $i < 2; $i++) {
//    $rango = rand (0,3);
//    $caracter = match($rango) {
//        0 => rand(33,47),
//        1 => rand(58,64),
//        2 => rand(91,96),
//        3 => rand(123,126)
//    };
//}

for ($i = 0; $i < 2; $i++) {
$str = "$str" . $caracteresNoAlfanumericos[rand(0,30)];
}
str_shuffle($str);
echo $str;
?>