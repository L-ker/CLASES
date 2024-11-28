<?php
var_dump($_POST);
$nombre = $_POST["nombre"];
$edad = filter_input(INPUT_POST, 'edad', FILTER_VALIDATE_INT);
$nombre = htmlspecialchars(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING));


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>estoy en datos</h1>
</body>
</html>