<?php
var_dump($_POST);

$carga = fn ($clase) => require "$clase.php";
spl_autoload_register($carga);

function añadirContacto($contactos, $contactoNuevo) {
    /**
     * Recibo un array desserializada y un contacto
     * reviso el array entero para ver si el nombre de algun contacto de este coincide con el nuevo
     * si coincide cambio el contacto para modificar el numero y returneo el array
     * sino sigue y cuando acaba lo añade y returnea el array
     */
    foreach ($contactos as $idEnArray => $contactoExistente) {
        if ($contactoExistente->getName() === $contactoNuevo->getName()) {
            $contactos[$idEnArray] = $contactoNuevo;
            return $contactos;
        }
    }
    $contactos[] = $contactoNuevo;
    return $contactos;
}

function hacerLista($listaContactos): void {
    /**
     * Recibo un array serializada
     * Si no esta vacia la desserializado
     * creo la parte de arriba de la tabla
     * foreach para rellenar la tabla 
     * si el array esta vacio hago un echo de que no hay contactos
     */
    if (!empty($listaContactos)) {
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
    /**
     * Recibo un array no serializado cuyo contenido no esta serializado
     * creo un array vacio
     * foreach del contenido del array no serializado 
     * cada objeto del array lo serializo y añado al array vacio
     * returneo el array serializado con contenido serializado
     */
    $listaSerializada = [];
    foreach ($listaContactos as $contactoSinSerializar) {
        $listaSerializada[] = serialize($contactoSinSerializar);
    }
    return serialize($listaSerializada);
}

function desserializar($listaContactos) {
    /**
     * Recibo una lista serializada (los objetos de dentro serializados tambien)
     * Creo un array vacio
     * desserializo la lista serializada
     * cada elemento de la lista que acabo de desserializar lo desserializo y lo añado al array vacio
     * devuelvo el array vacio
     */
    $listaDesserializada = [];
    $listaContactos = unserialize($listaContactos);
    foreach ($listaContactos as $contactoSerializado) {
        $listaDesserializada[] = unserialize($contactoSerializado);
    }
    return $listaDesserializada;
}

if (isset($_POST["submit"])) {
    $contactos = $_POST['contactos']??"";
    //si existe lo desserializo sino creo un array vacio
    $contactos = ($contactos === "") ? []:desserializar($contactos);
    //consiguiendo el count de contactos para mostrarlo en la pagina
    $numContactos =count($contactos) + 1??0;
    //opcion seleccionada
    $opcion = $_POST["submit"]??null;
    switch ($opcion){
        case "añadir":
            //creo el contacto y llamo al metodo añadir contacto
            $nombre= $_POST['nombre'];
            $telefono= $_POST['telefono'];
            $contacto = new Contacto($nombre,$telefono);
            $contactos = añadirContacto($contactos, $contacto);
            break;
        case "borrar":
            $contactos = "Agenda sin contactos";
            $numContactos = "Sin contactos actualmente";
        }
}
//resolucion nulos array contactos
$contactos = $contactos??[];
//si no hay contactos el boton de borrar se deshabilita
$desabilitado = ($contactos == []) ? "disabled" : "";
//mensaje del numero de contactos
$numContactos = $numContactos??"Sin contactos actualmente";
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
            <input type="hidden" value=<?=serializar($contactos)?> name="contactos">
            <label>Nombre</label>
            <input type="text" name="nombre"><br>
            <label>Telefono</label>
            <input type="text" name="telefono"><br>
            <input type="submit" value="añadir" name="submit">
            <input type="submit" value="borrar" name="submit" <?=$desabilitado?>>
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