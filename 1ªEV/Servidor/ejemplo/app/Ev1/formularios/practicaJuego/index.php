<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <fieldset style="background: burlywood;widht 60%">
        <legend><h1>Juego adivina número</h1></legend>
        <h2>Selecciona un intervalo del menu de abajo</h2>
        <fieldset>
            <form action="jugar.php" method="POST">
                <input type="radio" value="10" name="intentos"><a>1-1.024(2^10)</a><br>
                <input type="radio" value="16" name="intentos"><a>1-65.536(2^16)</a><br>
                <input type="radio" value="20" name="intentos"><a>1-1.048.576(2^20)</a><br>
                <input type="submit" value="Empezar">
            </form>
        </fieldset>
        <h2>Piensa en un número de ese intervalo</h2><br>

        <h2>La aplicación lo acertará en el número de intentos establecidos según el intervalo</h2><br>

        <h2>Cada vez que la aplicación te especifique un titulo deberás de indicar</h2><br>

        <a>Si el número buscado es mayor<br>Si el número buscado es menor<br>Si el número buscado es igual</a>
    </fieldset>
</body>
</html>