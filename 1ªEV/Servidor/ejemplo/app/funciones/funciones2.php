<?php

function factorial ($n) {
    return $n == 0 ? 1 : $n*factorial($n-1);
}

$tabla = 4;
$multiplica = function ($num) use ($tabla)   {
    return $tabla*$num;
};

for ($i= 0; $i <= 10; $i++) {

    echo "$tabla * $i = ".$multiplica($i)."<br>";
}


$factorial = function($n) use (&$factorial) {
    return $n==0? 1: $n*$factorial($n-1);
};
$n = 4;

//funciones flecha, pueden acceder a variables y le puedes hacer => a un match y cosas asi 
$hora = 13;
$saludar = fn() => "hola";

echo "<h1>Saludar dice ".$saludar()." </h1>";

$segundos = time();

$fecha = date("d-m-Y H:i:s",time());

echo "hoy estamos a $fecha <br>";

$hoy = time();
$cuatro_dias_antes = $hoy - 60*60*24*4;
$fecha2 = date("d-m-Y H:i:s",time());
$fecha_hace_cuadtro_dias = date("d-m-Y H:i:s",$cuatro_dias_antes);

echo "hace cuatro dias estabamos a $fecha_hace_cuadtro_dias <br>";

$formato_tiempo_predeterminado = strtotime("12/27/1969");

$fecha3 = "01/01/2000";
$segundos_fecha3 = strtotime("01/01/2000");
$segundos_edad = $hoy - $segundos_fecha3;
$edad = date("y",$segundos_edad);
echo "$edad";
?>