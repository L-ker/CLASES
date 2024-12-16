<?php
$opcion = $_POST["submit"]??null;
var_dump($_POST);
switch ($opcion){
    case "Guardar":
        $msj = "Has presionado el boton guardar";
        break;
    case "Cancelar":
        $msj = "Has presionado el boton cancelar";
        break;
    case "Editar":
        $msj = "Has presionado el boton editar";
        break;
    case "Borrar":
        $msj = "Has presionado el boton borrar";
        break;
    default: 
        $msj = "Selecciona una opción";
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
    <fieldset>
        <legend>SeleccionaUnSubmit  </legend>
        <form action="ejemploVariosSubmits.php" method="POST">
            <input type="submit" value="Guardar" name="submit">
            <input type="submit" value="Cancelar" name="submit">
            <input type="submit" value="Editar" name="submit">
            <input type="submit" value="Borrar" name="submit">
        </form>
        <h1><?=$msj?></h1>
    </fieldset>
</body>
</html>