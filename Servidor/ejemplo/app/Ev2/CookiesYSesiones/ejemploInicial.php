<?php
function imprimirNombres() {
    //La funcion se ejecuta siempre, cuando existen conexiones y se le da a mostrar se recorren las conexiones de las cookies y se muestran de una forma simple
        if (isset($_COOKIE["conexiones"]) && $_POST["submit"] === "Mostrar") {
            $conexiones = unserialize(base64_decode($_COOKIE["conexiones"]));
            foreach($conexiones as $usuario => $instante) {
                echo "Hola $usuario, te conectaste a las $instante <br>";
            }
        } 
}

if (isset($_POST["submit"])) {
    //recibimos el nombre
    $conexion = htmlspecialchars($_POST["nombre"]);
    //solo haremos algo si no esta vacio el campo de entrada
    if ($conexion != "") {
        switch ($_POST["submit"]) {
            case "Enviar":
                //cuando se le da a enviar recibo las conexiones, si no hay creo un aray vacio
                $conexiones = $_COOKIE["conexiones"]??[];
    
                //Si existe lo desserializo
                $conexiones = ($conexiones != []) ? unserialize(base64_decode($conexiones)) : [];
            
                //introduzco la nueva conexion en el array siendo el nombre de la conexion el indice en el array y la hora con formato el valor
                $conexiones[$conexion] = date('H:i:s');
            
                //seteo las cookies
                setcookie("conexiones",base64_encode(serialize($conexiones)),time()+180);
                break;
            case "Borrar":
                //Para borrar una cookie si pones tiempo menor al de ahora ej "time() - 1" se borran

                //recibo el array de conexiones
                $conexiones = $_COOKIE["conexiones"]??[];
                
                //si existe lo desserializo
                $conexiones = ($conexiones != []) ? unserialize(base64_decode($conexiones)) : [];
            
                //lo desseteo
                unset($conexiones[$conexion]);
            
                //seteo las cookies
                setcookie("conexiones",base64_encode(serialize($conexiones)),time()+180);
                break;
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<fieldset>
        <legend>Formulario</legend>
        <form action="ejemploInicial.php" method="POST">
            <input type="text" name="nombre" id="nombre"><br>
            <input type="submit" name="submit" value="Enviar">
            <input type="submit" name="submit" value="Mostrar">
            <input type="submit" name="submit" value="Borrar">
        </form>
    </fieldset>
    <?php imprimirNombres() ?>
</body>
</html>