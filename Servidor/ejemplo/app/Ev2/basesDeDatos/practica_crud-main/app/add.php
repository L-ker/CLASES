<?php session_start();
    require 'vendor/autoload.php';
    use Dotenv\Dotenv;
    use App\Crud\DB;
    use App\Crud\Plantilla;
    $dotenv = Dotenv::createImmutable(__DIR__);
    $dotenv->load();

    $db = new DB();

    $columnas = $db->get_campos();

    $foraneas = $db->get_foraneas();

    var_dump($columnas);
    var_dump($foraneas);

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
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
    
    ?>
</body>
</html>
