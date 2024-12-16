<?php
//leo el nombre de esta manera para asegurarme de que hay algo porque si no hay se vuelve a enviar al index
$usuario = htmlspecialchars($_GET['usuario']??"");
if ($usuario=="") {
    header("location:index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hola <?= $usuario?> </h1>
    <a href="index.php">Volver</a>
</body>
</html>