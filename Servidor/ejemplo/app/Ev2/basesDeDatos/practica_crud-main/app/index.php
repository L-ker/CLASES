<?php session_start();
require 'vendor/autoload.php';
use App\Crud\DB;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//TODO 
/**
 * Login:
 * Acabarlo
 * Falta mensaje no exitoso
 * Comprobar si campos vacios
 * 
 * Register:
 * Comprobar si campos vacios
 * No permitir registrarse con mismo usuario
 * 
 * Extra:
 * Revisar metodos de la clase DB para ver que me puede faltargit 
 */
$opcion = $_POST['submit']??"";
$db = ($opcion === "") ? "" : new DB();
switch($opcion){
    case "Login":
        // consulta para comprobar si existe el usuario con tema del password_hash
        //si funciona guardar en sesion y mandar a sitio.php

        // $nombre = trim($_POST['nombre'] ?? "");
        // $password = trim($_POST['password'] ?? "");
        $nombre = $_POST["nombre"];
        $password = $_POST["password"];

        $resultado = $db->validar_usuario($nombre, $password);

        if ($resultado) {
            header("Location: sitio.php");
             exit();
        }

        break;
    case "Registrar":
        $nombre = $_POST['nombre'];
        $password = $_POST['password'];

        $resultado = $db->registrar_usuario($nombre,$password);

        $resultado = ($resultado = true) ? "El registro se ha realizado correctamente": $resultado;
        break;
}

?>
<!doctype html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport"
         content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>Document</title>
</head>
<body>

<form action="index.php" method="post" >
    usuario <input type="text" name="nombre" id=""><br />
    password <input type="text" name="password" id=""><br />
    <input type="submit" value="Login" name="submit">
    <input type="submit" value="Registrar" name="submit">
</form>

<?php 
    if (isset($resultado))
        echo "<h2>$resultado</h2>";
?>

</body>
</html>