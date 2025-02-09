<?php session_start();
    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit();
    }
    require 'vendor/autoload.php';
    use Dotenv\Dotenv;
    use App\Crud\DB;
    use App\Crud\Plantilla;

    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $db = new DB();

    $columnas = $db->get_campos();
    $foraneas = $db->get_foraneas();

    $columnas = array_values(array_diff($columnas,$foraneas));
    
    if (isset($_POST["submit"])) {
        $opcion = $_POST["submit"];
        switch ($opcion) {
            case "Enviar":
                $correcto = false;
                //NO FUNCIONA CON LA TABLA PRODUCTOS PORQUE EL COD ES VARCHAR EN VEZ DE INT AUTO INCREMENTADO
                if ($db->add_fila($_POST["datos"])) {
                    $correcto = true;
                } 
                break;
            case "Volver":
                header("Location: sitio.php");
                exit();
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
    <?php 
    Plantilla::generar_formulario($columnas, $foraneas);
    if (isset($correcto)){
        if ($correcto === true) {
            echo "<h1>Fila insertada con éxito.</h1>";
        } else {
            echo "<h1>Error durante la inserción de la fila</h1>";
        }
    }
    ?>
</body>
</html>
