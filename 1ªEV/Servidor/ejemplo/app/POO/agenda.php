<?php
var_dump($_POST);

$carga = fn ($clase) => require "$clase.php";
spl_autoload_register($carga);

function añadirContacto(&$contactos, $contactoNuevo): void {
    foreach ($contactos as $idEnArray => $contactoExistente) {
        if ($contactoExistente->nombre == $contactoNuevo->nombre) {
            $contactos[$idEnArray] = $contactoNuevo;
        }
    }
    $contactos[] = $contactoNuevo;
}

function hacerLista($listaContactos): void {
    if (!empty($listaContactos)) {
        $listaContactos = desserializar($listaContactos);
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Numero</th>";
        echo "</tr>";
        foreach ($listaContactos as $contacto) {
            echo "<tr><td>".$contacto->getName()."</td><td>".$contacto->getTelefono()."</td></tr>";
        }
    } else {
        echo "<a>No hay contactos en la agenda</a>";
    }
}

function serializar($listaContactos) {
    $listaSerializada = [];
    foreach ($listaContactos as $contactoSinSerializar) {
        $listaSerializada[] = serialize($contactoSinSerializar);
    }
    $listaContactos =  $listaSerializada;
    return $listaContactos;
}

function desserializar($listaContactos) {
    $listaDesserializada = [];
    foreach ($listaContactos as $contactoSerializado) {
        $listaDesserializada[] = unserialize($contactoSerializado);
    }
    return $listaDesserializada;
}

if(isset($_POST['submit'])) {
    
    $contactos = $_POST['contactos']??"";
    $contactos = ($contactos === "") ? []:desserializar($contactos);

    $numContactos =count($contactos) + 1??0;

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
}
//resolucion de nulos
$contactos = $contactos??[];
//desabilitar boton de borrar si no hay contactos
$desabilitado = ($contactos == []) ? "disabled" : "";
//mensaje del numero de contactos
$numContactos = $numContactos??"Sin contactos actualmente";
//serializacion del array de objetos contacto
$contactos = (empty($contactos)) ? "":serializar($contactos);
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
            <input type="submit" value="borrar" name="submit" <?=$desabilitado?>>
            <input type="hidden" value=<?php serializar($contactos)?> name="contactos">
        </form>
    </fieldset>
    </div>
    
    <div>
        <h1>Listado de contactos</h1>
        <div>
            <table>
            <?php  hacerLista($contactos)?>
            </table>
        </div>
    </div>

</body>
</html>