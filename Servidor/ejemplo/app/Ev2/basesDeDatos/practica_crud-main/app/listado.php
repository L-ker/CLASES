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
    if (!isset($_SESSION["tabla"])) {
        header("Location: sitio.php");
        exit();
    }

    $db = new DB();
    $tabla = strtolower($_SESSION["tabla"]);

    var_dump($_POST);
    var_dump($_SESSION);

    $accion = $_POST["accion"] ?? "tabla";
?>
<!doctype html>
<html lang="en">
<head>
    <!-- <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    > -->
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php Plantilla::generar_header()?>
<h1>Listado del contenido de tablas</h1>
<form action="add.php">
    <input type="submit" value="Añadir">
</form>
<?php

switch ($accion) {
    case "editar":
        break;
    case "añadir":
        break;
    case "borrar":
        $db->borrar_fila($_POST["codigo"]);
    default:
    $filas = $db->get_filas($tabla);
    $nombresColumnas = array_keys($filas[0]);
    Plantilla::crear_tabla($nombresColumnas, $filas);
}
?>
</body>
</html>