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
define("edad" ,18);

const edad2 = 18;

echo "<h2>Tengo ".edad." años (constante declarada con define)</h2><br>";
echo "<h2>Tengo ".edad2." años (constante declarada con const)</h2><br>";

echo "<h2>Para los 100 me faltan ".(100-edad2)." años (con la constante declarada con const)</h2><br>";
echo "<h2>Para los 100 me faltan ".(100-edad)." años (con la constante declarada con define)</h2><br>";
?>
</body>
</html>