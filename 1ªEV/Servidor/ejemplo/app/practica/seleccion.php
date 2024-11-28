<?php
header("Refresh:2;url=index.php");
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
<?php

rand(1,150);
$edad = rand (0,100);
$msj = "Hola";
switch (TRUE) {
    case ($edad >= 0 && $edad <= 11):
        $msj = "Niño";
        break;
    case ($edad >= 12 && $edad <= 17):
        $msj = "Adolescentes";
        break;
    case ($edad >= 18 && $edad <= 35):
        $msj = "Jóvenes";
        break;
    case ($edad >= 36 && $edad <= 65):
        $msj = "Adulto";
        break;
    case ($edad >= 66 && $edad <= 110):
        $msj = "Jubilado";
        break;
    default:
        $msj = "edad no contenplada en nuestra encuesta";
}

echo "Tu edad es de $edad, $msj";

?>
</body>
</html>

