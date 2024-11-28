<?php

$carga =fn ($clase)=> require "$clase.php";


spl_autoload_register($carga);


$r1 = new Racional();
$r2 = new Racional(4);
$r3 = new Racional(2,6);
//Cuantos racionales llevo??

$rtdo = Racional::sumar_estatico($r1,$r2);

unset($r3);
//Cuantos racionales llevo??


$p1 = new Persona();
$p1->setName("Manuel")->setApellido("Romero")->setAño(25);

$datos =(string)$p1;

echo "<h1>$p1</h1>";


if (isset($_POST['submit'])){
    $op1 = new Racional($_POST['op1']);
    $op2 = new Racional($_POST['op2']);
    $operador = $_POST['operador'];
    $rtdo = match ($operador) {
        '+'=> $op1->sumar($op2),
        '-'=> $op1->restar($op2),
        '*'=> $op1->multiplicar($op2),
        '/'=> $op1->dividir($op2),
    };

}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<fielset>
    <legend>Realiza cálculos</legend>
<form action="index.php" method="post">
    <input type="text" name="op1">
    <select name="operador" id="">
        <option value="+">+</option>
        <option value="-">-</option>
        <option value="*">*</option>
        <option value="/">/</option>
    </select>
    <input type="text" name="op2">
    <br>
    <input type="submit" value="Operar" name="submit">
</form>
    <?php
    if (isset($_POST['submit']))
     echo "$op1 $operador $op2 = $rtdo";

    ?>
</fielset>
</body>
</html>