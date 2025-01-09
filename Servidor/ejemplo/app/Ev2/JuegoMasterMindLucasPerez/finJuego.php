<?php
spl_autoload_register(function ($clase){
    require ("./clases/$clase.php");
});
session_start();

$adivinado = $_GET["adivinado"];
//como adivinado es 0 o 1 
$msj = ($adivinado) ? "Felicidades adivinaste la clave en ".count($_SESSION["jugadas"])." jugadas" : "Demasiados intentos... Prueba de nuevo";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="estilo.css">
</head>
<body>
    <div class="containerIndex">
        <h1>RESULTADO DE TU PARTIDA</h1>
        <div class="final">
            <h2><?=$msj?></h2>
            <h3>Valor de la clave:</h3>
            <?php 
            echo "<div class='jugada'>";
            echo Plantilla::mostrarClave($_SESSION["clave"]); 
            echo "</div>";
            echo "<br>";
            Plantilla::mostrarJugadasFin($_SESSION["jugadas"]);
            ?>
        </div>
        <form action="index.php">
            <input type="submit" value="Volver al Index" name="submit">
        </form>
    </div>
</body>
</html>