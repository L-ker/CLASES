<?php
$carga = fn ($clase) => require "$clase.php";
spl_autoload_register($carga);

if(isset($_POST['submit'])) {
    $contactos = $_POST['contactos']??[];
    $numContactos =count($contactos)??0;

    $opcion = $_POST["submit"]??null;

    switch ($opcion){
    case "añadir":
        $nombre= $_POST['nombre'];
        $telefono= $_POST['telefono'];
        $contacto = new Contacto($nombre,$telefono);
        añadirContacto($contactos, $contacto);
        break;
    case "borrar":
        $contactos = "Agenda sin contactos";
        $numContactos = "Sin contactos actualmente";
    }
    function añadirContacto(&$contactos, $contactoNuevo) {
        foreach ($contactos as $idEnArray => $contactoExistente) {
            if ($contactoExistente->nombre == $contactoNuevo->nombre) {
                $contactos[$idEnArray] = $contactoNuevo;
                return true;
            }
        }
        $contactos[] = $contactoNuevo;
        return false; 
    }
    function añadirContacto(&$contactos, $contactoNuevo) {
        foreach ($contactos as $idEnArray => $contactoExistente) {
            if ($contactoExistente->nombre == $contactoNuevo->nombre) {
                $contactos[$idEnArray] = $contactoNuevo;
                return true;
            }
        }
        $contactos[] = $contactoNuevo;
        return false; 
    }
}
$contactos = $contactos??"Agenda sin contactos";
$numContactos = $numContactos??"Sin contactos actualmente"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Agenda de contactos, contactos actuales: <?=$numContactos?></h1><br>

    <div>
    <fieldset>
        <legend>Nuevo contacto</legend>
        
        <form action="agenda.php" method="POST">
            <label>Nombre</label>
            <input type="text" name="nombre"><br>
            <label>Telefono</label>
            <input type="text" name="telefono"><br>
            <input type="submit" value="añadir" name="submit">
            <input type="submit" value="borrar" name="submit" disabled>
        </form>
    </fieldset>
    </div>
    
    <div>
        <h1>Listado de contactos</h1>
        <div>
            <a><?php listaContactos($contactos)?></a>
        </div>
    </div>

</body>
</html>