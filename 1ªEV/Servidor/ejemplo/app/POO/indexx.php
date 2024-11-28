<?php
// require "persona.php";
$carga = fn ($clase) => require "$clase.php";
spl_autoload_register($carga);
// $c = function ($clase) {
//     require "clase.php";
// };
$p1 = new Persona("nigga", "giga", 14);

$p2 = new Persona();

$p2->setName("Hola")
   ->setApellido("NEGER")
   ->setAño(15);

echo $p1;

unset($p1);

echo $p2;

echo $p2->getCuenta();

echo "Actualmente tengo ".Persona::$cuenta_racional;