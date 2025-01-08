<?php
session_start();
session_destroy();
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
    <fieldset>
        <h2>DESCRIPCIÓN DEL JUEGO MASTERMIND</h2>
        <hr>
        <ol>
            <li>Esta es una presentación personalizada del juego.</li>
            <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes.</li>
            <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos.</li>
            <li>En total habrá 14 intentos para adivinar la clave.</li>
            <li>En cada jugada la app informará:</li>
            <ul>
                <li>cuántos colores has acertado de la combinación</li>
                <li>cuántos de ellos están en la posición correcta.</li>
            </ul>
            <li>No se especificará cuáles son las posiciones acertadas en caso de acierto.</li>
        </ol>
        <hr>
        <form action="jugar.php" method="POST">
            <input type="submit" value="Empezar a jugar" name="submit">
        </form>
    </fieldset>
</body>
</html>