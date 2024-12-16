<?php
if (isset($_POST[""])) {
    $expresion = htmlspecialchars($_POST["expresion_regular"]);
    $sujeto = htmlspecialchars($_POST["sujeto"]);
    $expresion = "#$expresion#";

    if (preg_match($expresion, $sujeto)) 
        $msj = "El sujeto cumple la expresión regular";
    else
        $msj = "l sujeto no cumple la expresión regular";
}
$msj = $msj??"";
$expresion = $expresion??"";
$sujeto = $sujeto??"";
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
        <legend>Expresiones regulares</legend>
        <form action="expresionesRegularesEJ.php" method="POST">
            <a>expresion:</a>
        <input type="text" value="<?=$expresion?>" name="expresion_regular"><br>
        <a>Sujeto:</a>
        <input type="text" value="<?=$sujeto?>" name="sujeto:"><br>
            <input type="submit" value="Evaluar" name="submit">
        </form>
    </fieldset>
    <h3><?=$msj?></h3>
</body>
</html>