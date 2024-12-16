<?php

$red = 128;

$ip = rand (1,255);
$ip = 64;

if (($ip & $red) == $red)
    printf ("$ip %b pertenece a $red %b", $ip, $red);
else
    printf("$ip %b no pertenece a $red %b", $ip, $red);
?>