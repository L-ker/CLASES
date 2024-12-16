<?php
$carga = fn ($clase) => require "class/$clase.php";
spl_autoload_register($carga);

$imagenes = Diccionario::$diccionario;
// var_dump($imagenes);
foreach ($imagenes as $idioma => $contenido) {
    $idiomas[] = $idioma;
}

$idioma = $idiomas[rand(0, count($imagenes) -1)];

$examen = new Examen($idioma, $imagenes, 2);
$img = $examen->dame_primera_imagen();
var_dump($idioma);

