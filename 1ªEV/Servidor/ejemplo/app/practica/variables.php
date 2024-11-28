<?php
header("Refresh:5;url=index.php");

$num1 = 125;

print($num1);

// incorrecto porque el 8 no existe en octal
// $num2 = 0874;

$num2 = 0723;

print ($num2);

$var1 = 0xAbC12;
print($var1);

$var2 = 0b1100;
print($var2);

$cadena1 = "<br>Esto es una cadena de caracteres<br>";
print ($cadena1);

$cadena2 = 'Esto es otra cadena de caracteres<br>';
print($cadena2);

//sin los br no tendria saltos de linea
$cadenaMultilinea1 = '<br>Esto es una cadena
multilínea
y termina aquí<br><br>'
;
print($cadenaMultilinea1);

// $cadenaMultilinea2 ='Esto es una cadena<br>
// multilínea<br>
// y termina aquí<br><br>';
// print($cadenaMultilinea2);

// $cadenaMultilinea2=<<< END
// Esto que ves,
// es una cadena
// multilínea
// y termina aquí             

// END;             
// print($cadenaMultilinea2);

$cadenaMultilinea1=<<< 'END'
<pre>
Esto que ves,
es una "cadena"
'multilínea'
y termina aquí              
</pre>
END;
print($cadenaMultilinea1);

$var3 = 1.23432230003322014000002234101;
print($var3);

echo "<br>";

$var4 = 1234E-2;
print($var4);

echo "<br>";

$var5 = null;
print($var5);

echo "<br>";

$var6 = true;
print($var6);

echo "<br>";

$var7 = false;
echo ($var7);

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
    
</body>
</html>