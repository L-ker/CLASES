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
$cadena = "caracol";
$entero = 7;
$decimal = 7.7;
$booleano = true    ;
$nulo = null;

echo "$cadena" . gettype($cadena) . " <br>";
echo "$entero" . gettype($cadena) . " <br>";
echo "$decimal" . gettype($cadena) . " <br>";
echo "$booleano" . gettype($cadena) . " <br>";
echo "$nulo" . gettype($cadena) ;

$numeroTitulo = rand(1,6);
$rojo = dechex(rand(1,255));
$azul = dechex(rand(1,255));
$verde = dechex(rand(1,255));

$rojo = strlen($rojo)==1? "0".$rojo : $rojo;
$verde = strlen($verde)==1? "0".$verde : $verde;
$azul = strlen($azul)==1? "0".$azul : $azul;

echo "<h$numeroTitulo style='color:#$rojo$verde$azul'>caracol de tamaño $numeroTitulo</h$numeroTitulo>";

?>
</body>
</html>