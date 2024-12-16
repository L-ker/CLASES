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

header("Refresh:5;url=index.php");

$a = 777;
echo "El valor de \$a es '$a' y proviene de una constante numérica<br>";
$a = "Cadena String";
echo "El valor de \$a es '$a' y proviene de una constante string<br>";
$a = dechex(777);
echo "El valor de \$a es '$a' y proviene de una constante numérica hexadecimal<br>";
$a = decbin(20);
echo "El valor de \$a es '$a' y proviene de una constante numérica binaria<br>";
$a = 60 + 40;
echo "El valor de \$a es '$a' y proviene de una expresion numerica<br>";
$a = "a"."b"."c";
echo "El valor de \$a es '$a' y proviene de una expresion de cadenas de caracteres<br>";
$a = print "777";
echo "El valor de \$a es '$a' y proviene de la funcion print<br>";
$a = ($b = 4);
echo "El valor de \$a es '$a' y proviene de una expresion que sea una asignacion<br>";

?>
</body>
</html>