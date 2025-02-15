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

function eliminarContacto($contactos, $contactoBorrar) {
    /**
     * Recibo el array supuestamente con un contacto a eliminar
     * itero sobre el array en busca del contacto que coincide con el nombre del contacto a eliminar
     * si se encuentra se elimina ese contacto
     * sino no returneo el array sin modificar nada
     */
    foreach ($contactos as $idEnArray => $contactoExistente) {
        if ($contactoExistente->getName() === $contactoBorrar->getName()) {
            unset($contactos[$idEnArray]);
            return $contactos;
        }
    }
    return $contactos;
}

function hacerLista($listaContactos): void {
    if (!empty($listaContactos) && is_array($listaContactos)) {
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
     * Recibo un array de objetos no serializado
     * serializo el array, lo encodeo en base 64 y lo returneo
     */
    return base64_encode(serialize($listaContactos));
}

function desserializar($listaContactos) {
    /**
     * Recibo un array encodeado y serializado
     * decodeo el array, lo desserializo y lo returneo
     */
    return  unserialize(base64_decode($listaContactos));
}

if (isset($_POST["submit"])) {
    $contactos = $_POST['contactos']??"";
    //si existe lo desserializo sino creo un array vacio
    $contactos = ($contactos === "") ? []:desserializar($contactos);
    //consiguiendo el count de contactos para mostrarlo en la pagina
    //opcion seleccionada
    $opcion = $_POST["submit"]??null;
    switch ($opcion){
        case "añadir":
            //creo el contacto y llamo al metodo añadir contacto
            $nombre= $_POST['nombre'];
            $telefono = $_POST['telefono'];
            $contacto = new Contacto($nombre,$telefono);
            $contactos = ($contacto->getTelefono() == "") ? eliminarContacto($contactos, $contacto) : añadirContacto($contactos, $contacto);
            break;
        case "borrar":
            $contactos = "";
            $numContactos = "Sin contactos actualmente";
        }
        $numContactos =count($contactos)??0;
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
            <input type="hidden" value='<?=serializar($contactos)?>' name="contactos">
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