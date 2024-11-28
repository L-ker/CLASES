<?php
$dias = rand(30,31);

if ($dias == 30) {
    echo "<h1>El mes tiene 30 días</h1>";
} else {
    echo "<h1>El mes tiene 31 días</h1>";
}
$mes = rand(1,12);
$msj = "El mes tiene dias";
$nombreMes = null;
$diasMes = "";
switch ($mes) {
    case 1:
        $nombreMes = $nombreMes == null ? "Enero" : $nombreMes;
    case 2:
        $nombreMes = $nombreMes == null ? "Febrero" : $nombreMes;
    case 3:
        $nombreMes = $nombreMes == null ? "Marzo" : $nombreMes;
    case 4:
        $nombreMes = $nombreMes == null ? "Abril" : $nombreMes;
    case 5:
        $nombreMes = $nombreMes == null ? "Mayo" : $nombreMes;
    case 6:
        $nombreMes = $nombreMes == null ? "Junio" : $nombreMes;
    case 7:
        $nombreMes = $nombreMes == null ? "Julio" : $nombreMes;
    case 8:
        $nombreMes = $nombreMes == null ? "Agosto" : $nombreMes;
    case 9:
        $nombreMes = $nombreMes == null ? "Septiembre" : $nombreMes;
    case 10:
        $nombreMes = $nombreMes == null ? "Octubre" : $nombreMes;
    case 11:
        $nombreMes = $nombreMes == null ? "Noviembre" : $nombreMes;
    case 12:
        $nombreMes = $nombreMes == null ? "Diciembre" : $nombreMes;
}
?>