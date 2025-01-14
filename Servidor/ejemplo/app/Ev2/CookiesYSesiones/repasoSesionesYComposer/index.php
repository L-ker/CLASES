<?php 

require "vendor/autoload.php";

use Modelo\Persona;

//hace falta serializar las clases cuando las metes en sesiones

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Datos de persona</legend>
        <form action="index.php" method="POST">
            nombre <input type="text" name="nombre" id=""><br>  
            apellido <input type="text" name="apellido" id=""><br>
            edad <input type="text" name="edad" id=""><br>
            <input type="submit" value="añadir">
            <input type="submit" value="listar">
        </form>
    </fieldset>
</body>
</html>