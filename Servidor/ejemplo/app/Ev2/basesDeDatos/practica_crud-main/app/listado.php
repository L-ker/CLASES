<?php session_start();
    require 'vendor/autoload.php';
    use Dotenv\Dotenv;
    use App\Crud\DB;
    use App\Crud\Plantilla;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit();
    }

    $db = new DB();
    $tabla = strtolower($_SESSION["tabla"]);
    $filas = $db->get_filas($tabla);

    $nombresColumnas = array_keys($filas[0]);

    var_dump($_POST);
    var_dump($_SESSION);

    if (isset($_POST["accion"])) {
        $accion = $_POST["accion"];
        switch ($accion) {
            case "borrar":
                break;
            case "editar":
                break;
            case "añadir":
                break;
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
<h1>Listado del contenido de tablas</h1>
<?php
    Plantilla::crear_tabla($nombresColumnas, $filas);
?>
</body>
</html>