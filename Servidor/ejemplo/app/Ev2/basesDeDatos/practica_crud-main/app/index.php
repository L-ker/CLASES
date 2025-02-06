<?php session_start();
require 'vendor/autoload.php';
use App\Crud\DB;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//TODO
/**
 * cascada si no esta: https://www.youtube.com/watch?v=-ePYcp9eBbQ
 * 
 * hacer ajustes para primary keys, en random.txt hay ejemplos utles
 * Basicamente necesito hacer que en los metodos relacionados con borrar y editar 
 * (tanto en la plantilla cuando genero la tabla como en los metodos de DB) donde se colocan las claves
 * primarias se haga un bucle que las coloque y he de hacer que se pasen por arrays por si se
 * selecciona un elemento de la tabla stock que tiene 2 tablas primarias 
 * 
 * Hacer la pagina de añadir entera
 * 
 * revisar tema de mensajes, sesiones y campos ocultos PDF
 * 
 * Cambiar header a plantilla para ponerlo en todas partes
 * 
 * 
 */
$opcion = $_POST['submit']??"";
$db = ($opcion === "") ? "" : new DB();

$nombre = (isset($_POST["nombre"])) ? $_POST["nombre"] : "";
$password = (isset($_POST["password"])) ? $_POST["password"] : "";
if (!($nombre === "" || $password === "")) {
    switch($opcion){
        case "Login":
            $resultado = $db->validar_usuario($nombre, $password);
            if ($resultado) {
                header("Location: sitio.php");
                exit();
            } else {
                $resultado = "Datos de inicio de sesión incorrectos";
            }

            break;
        case "Registrar":
            

            $resultado = $db->registrar_usuario($nombre,$password);

            $resultado = ($resultado === true) ? "El registro se ha realizado correctamente": $resultado;
            break;
    }
} else {
    $resultado = (!isset($resultado)) ? "Ambos campos son necesarios" : $resultado;
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