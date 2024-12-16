<?php

$patron = "#^[0-9][a-z]+$#";
$cadena="1efAABVBBg";
if (preg_match($patron,$cadena))
    echo "La cadena $cadena cumple el patron $patron";
else 
    echo "La cadena $cadena NO cumple el patron $patron";
?>