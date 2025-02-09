<?php session_start();
require 'vendor/autoload.php';
use App\Crud\Plantilla;
    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit();
    }
    if (isset($_POST["submit"])) {
        $tabla = $_POST["submit"];
        $_SESSION["tabla"] = $tabla;
        header("Location: listado.php?");
        exit();
    }
    if (isset($_POST["Volver"])) {
        unset($_SESSION["tabla"]);
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF - 8">
    <meta name="viewport" content="width=device - width, initial - scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="estilo . css">
</head>
<body>
<?php Plantilla::generar_header() ?>
<!-- Navigation Buttons -->
<div>
    <form action="sitio.php" method="post">
        <input class="btn btn - create" type="submit" value="Producto" name="submit">
        <input class="btn btn - edit" type="submit" value="Tienda" name="submit">
        <input class="btn btn - delete" type="submit" value="Usuarios" name="submit">
        <input class="btn btn - create" type="submit" value="Stock" name="submit">

    </form>

</div>

<!-- Placeholder for Future Content -->
<div id="content">
    <p>Selecciona una opción para gestionar los elementos de la tienda.</p>
</div>
</body>
</html>
