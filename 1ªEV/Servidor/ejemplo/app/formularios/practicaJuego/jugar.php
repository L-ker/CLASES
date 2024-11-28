<?php
$cualSubmit = $_POST["submit"]??"Empezar";
switch ($cualSubmit) {
    case "Reiniciar":
    case "Empezar":
        $intentos = $_POST["intentos"]??header("Location: index.php");
        $min = 1;
        $max = 2**$intentos;
        $numero = $max/2;
        $jugar = 1;
        break;
    case "Jugar":
        $numero = $_POST["numero"];
        $jugar = $_POST["jugar"];
        $intentos = $_POST["intentos"];
        $min = $_POST['min'];
        $max = $_POST['max'];

        if(isset($_POST["opcionJuego"])) {
            $opcionJuego = $_POST["opcionJuego"];

            switch ($opcionJuego) {
                case "1":
                    $min = ++$numero;   
                    break;
                case "-1":
                    $max = --$numero;
                    break;
                case "0":
                    header("Location: fin.php?adivinado=true&jugadas=$jugar");
                    exit();
            }
            if ($jugar == $intentos) {
                header("Location: fin.php?adivinado=false");
                exit();
            }
            $numero = rand($min,$max);
            $jugar++;
        }
        break;
    case "Volver":
        header("Location: index.php");
        exit(); 
    default:
        header("Location: index.php");
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
<fieldset style="background: burlywood">
        <legend><h1>Empieza el juego</h1></legend>
        <h2>El número es <?=$numero?>?</h2>
        <h2>Jugada <?=$jugar?></h2>
        <fieldset>
            <legend>Indica cómo es el número qué has pasado</legend>
            <form action="jugar.php" method="POST">
                <input type="radio" value="1" name="opcionJuego"><a>Mayor</a><br>
                <input type="radio" value="-1" name="opcionJuego"><a>Menor</a><br>
                <input type="radio" value="0" name="opcionJuego"><a>Igual</a><br>
                <input type="submit" value="Jugar" name="submit">
                <input type="submit" value="Reiniciar" name="submit">
                <input type="submit" value="Volver" name="submit">
                <input type="hidden" value="<?=$jugar?>" name="jugar">
                <input type="hidden" value="<?=$min?>" name="min">
                <input type="hidden" value="<?=$max?>" name="max">
                <input type="hidden" value="<?=$intentos?>" name="intentos">
                <input type="hidden" value="<?=$numero?>" name="numero">
            </form>
        </fieldset>
    </fieldset>
</body>
</html>