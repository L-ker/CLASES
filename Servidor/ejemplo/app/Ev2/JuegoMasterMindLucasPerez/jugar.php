<?php
spl_autoload_register(function ($clase){
    require ("./clases/$clase.php");
});
session_start();

$opcion = $_POST['submit']??null;
 
$msj = "<h3>Sin datos que mostrar</h3>";
$msjColores = "Selecciona 4 colores para jugar";

$estadoBotonClave = "Mostrar Clave";

switch ($opcion){
    case "Resetear la Clave":
        $clave = Clave::generar_clave();
        $_SESSION["clave"] = $clave;
        $_SESSION["jugadas"] = [];
        $msj="Se ha reseteado la clave";
        break;

    case "Empezar a jugar":
        $clave = Clave::generar_clave();
        $_SESSION["clave"] = $clave;
        break;

    case "Jugar":
        if (isset($_POST["respuesta"]) && count($_POST["respuesta"]) == 4) {
            $jugada = new Jugada ($_POST['respuesta']);
            $msj=$jugada->validarJugada();

            if ($jugada->getPosicionesAcertadas() == 4) {
                header("Location:finJuego.php");
                exit;
            }
            if (isset($_SESSION["jugadas"]) && count($_SESSION["jugadas"]) == 14) {
                header("Location:finJuego.php");
                exit;
            }

            $clave = $_SESSION["clave"];

            if (!(isset($_SESSION["jugadas"]))) {
                $_SESSION["jugadas"] = [];
            }
            $jugadas = $_SESSION["jugadas"];
            $jugadas[] = $jugada;
            $_SESSION["jugadas"] = $jugadas;
        } else 
            $msjColores = "Debes seleccionar 4 colores para jugar";
        break;

    case "Mostrar Clave":
        $clave = $_SESSION["clave"];
        $msj = Plantilla::mostrarClave($clave);
        $estadoBotonClave = "Ocultar Clave";
        break;

    case "Ocultar Clave":
        $msj = "<h3>No hay jugadas actualmente</h3>";
        $estadoBotonClave = "Mostrar Clave";
        break;

    default: 
        header("Location:index.php");
        exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel = "stylesheet" href="estilo.css">
    <script type="text/javascript" src="https://gc.kis.v2.scr.kaspersky-labs.com/FD126C42-EBFA-4E12-B309-BB3FDD723AC1/main.js?attr=0iFtnzOCjZIFuevVQRuyAf7lpBfPjUP2osCC8IB69k_B2wx8JK9BXeBRrd0tZ88UnGKIseojSKNGnk8m54n5v70QCXP7F7JDFvbt9Bm3etWQ4sjpELkLLmpJhCJpdWHU" charset="UTF-8"></script><script>
        function cambia_color(numero) {
            color = document.getElementById("respuesta" + numero).value;
            elemento = document.getElementById("respuesta" + numero);
            elemento.className = color;
        }

        window.onload = function() {
            for (let i = 0; i < 4; i++) {
                cambia_color(i);
            }
        };
    </script>
</head>
<body>
<div class="contenedorGrande">
    <div class="opciones">
        <h2>OPCIONES</h2>
        <fieldset>
            <legend>Acciones posibles</legend>
            <form action="jugar.php" method="POST">
                <input type="submit" value='<?=$estadoBotonClave?>' name="submit">
                <input type="submit" value="Resetear la Clave" name="submit">
            </form>
        </fieldset>
        <fieldset>
            <legend>Menú jugar</legend>
            <form action="jugar.php" method="POST">
                <h3> <?=$msjColores?></h3>
                <? Plantilla::crearSelects($_POST['respuesta'] ?? []) ?><br>
                <input type="submit" value="Jugar" name="submit">
            </form>
        </fieldset>


    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <?php 
            if (isset($_SESSION["jugadas"])) {
                echo "<h3>Juagada actual: ". count($_SESSION["jugadas"]) ."</h3>";
            }
            ?><br>
            <?=$msj?>
            <?php //TODO MOSTRAR HISTORICO JUGADAS CON CLASE PLANTILLA
            if (isset($_SESSION["jugadas"])) {
                echo "<a>Histórico de jugadas</a><br>";
                Plantilla::mostrarHistoricoJugadas($_SESSION["jugadas"]);
            }
            ?>
        </fieldset>
    </fieldset>
</div>
</body>
</html>