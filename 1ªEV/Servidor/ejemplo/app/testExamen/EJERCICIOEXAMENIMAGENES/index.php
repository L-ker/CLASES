<?php
$carga = fn ($clase) => require "class/$clase.php";
spl_autoload_register($carga);

$imagenes = Diccionario::$diccionario;
// var_dump($imagenes);

foreach ($imagenes as $idioma => $contenido) {
    $idiomas[] = $idioma;
}
//idioma random todas las veces
$idioma = $idiomas[rand(0, count($imagenes) -1)];

//Todas las categorias de preguntas guardadas
$preguntas = $imagenes[$idioma];
// var_dump($preguntas);

//sacar preguntas de una categoria especifica random
$categorias = array_keys($preguntas);
$categoria = $categorias[rand(0,count($categorias) -1)];

$preguntasCategoria = $preguntas[$categoria];

// var_dump($preguntasCategoria);

$examen = new Examen($preguntasCategoria, $categoria, $idioma);

$examen->generarFormulario();






// $examen = new Examen($idioma, $imagenes, 2);
// $img = $examen->dame_primera_imagen();
// var_dump($idioma);