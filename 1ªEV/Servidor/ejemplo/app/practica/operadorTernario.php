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

$num = rand(1,1000);

$msj = ($num % 2 == 0) ? "par" : "impar";

echo "El número $num es $msj";

?>
</body>
</html>
