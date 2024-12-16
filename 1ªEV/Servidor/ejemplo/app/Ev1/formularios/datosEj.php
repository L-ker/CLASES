<?php

$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
$nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre'));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>estoy en datos <?=$edad ?></h1>
</body>
</html>