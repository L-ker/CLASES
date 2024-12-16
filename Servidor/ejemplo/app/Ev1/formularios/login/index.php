<?php
//si aprieto submit
if(isset($_POST['submit'])) {
    //Leer datos
    $usuario = htmlspecialchars(filter_input(INPUT_POST, 'usuario',));
    $password = htmlspecialchars(filter_input(INPUT_POST, 'password',));
    //validarlos (user y pass tienen que coincidir)
    if (($usuario === $password) && $usuario != "") {
        //Si ok ir a sitio con nombre usuario
        header("location:sitio.php?usuario=$usuario");
        exit();
    }
    //sino genero mensaje de error
    $error = "datos incorrectos";
    
}
//nos aseguramos de que siempre tenga un valor
$error = $error??"";
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
        <legend>Datos de acceso</legend>
        <span class="error"><?=$error?></span>
        <form action="index.php" method="POST">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario">
            <label for="password">Contraseña:</label>
            <input type="text" name="password" id="password"><br>
            <input type="submit" value="iniciarSesion" name="submit">
        </form>
    </fieldset>
</body>
</html>