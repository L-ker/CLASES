<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
        $adivinado = filter_var($_GET['adivinado'], FILTER_VALIDATE_BOOLEAN);
        $msj = "";
        if ($adivinado) {
            $jugadas = $_GET['jugadas'];
            $msj = "He acertado en $jugadas jugadas";
        } else {
            $msj = "No has sido sincero";
        }
        echo "<h1>".$msj."</h1>";
    ?>
</body>
</html>