<?php session_start();
require 'vendor/autoload.php';
use App\Crud\DB;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

//TODO
/**
 * GENERAL:
 * CAMBIAR CODS A INT Y AÑADIR AUTOINCREMENTAL * 
 */
$opcion = $_POST['submit']??"";
$db = ($opcion === "") ? "" : new DB();


if (isset($_POST["nombre"]) && isset($_POST["password"])) {
    $nombre = $_POST["nombre"];
    $password = $_POST["password"];
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
            case "Logout":
                unset($_SESSION['usuario']);
                unset($_SESSION["tabla"]);
                break;
        }
    } else {
        $resultado = (!isset($resultado)) ? "Ambos campos son necesarios" : $resultado;
    }
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