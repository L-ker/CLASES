<?php
spl_autoload_register(function ($clase){
    require ("./clases/$clase.php");
});
session_start();

$opcion = $_POST['submit']??null;

$msj;

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
        $msj = "<h3>Sin datos que mostrar</h3>";
        $clave = Clave::generar_clave();
        $_SESSION["clave"] = $clave;
        break;

    case "Jugar":
        if (isset($_POST["respuesta"]) && count($_POST["respuesta"]) == 4) {
            $jugada = new Jugada ($_POST['respuesta']);

            $clave = $_SESSION["clave"];

            if (!(isset($_SESSION["jugadas"]))) {
                $_SESSION["jugadas"] = [];
            }
            $jugadas = $_SESSION["jugadas"];
            $jugada->validarJugada();
            $jugadas[] = $jugada;
            $_SESSION["jugadas"] = $jugadas;


            if ($jugada->getPosicionesAcertadas() == 4) {
                header("Location:finJuego.php?adivinado=1");
                exit;
            }
            if (isset($_SESSION["jugadas"]) && count($_SESSION["jugadas"]) == 14) {
                header("Location:finJuego.php?adivinado=0");
                exit;
            }
            
        } else 
            $msjColores = "Debes seleccionar 4 colores para jugar";
        break;

    case "Mostrar Clave":
        $clave = $_SESSION["clave"];
        $msj = Plantilla::mostrarClave($clave);
        $estadoBotonClave = "Ocultar Clave";
        break;

    case "Ocultar Clave":
        if (!(isset($_SESSION["jugadas"])))
            $msj = "<h3>No hay jugadas actualmente</h3>";

        $estadoBotonClave = "Mostrar Clave";
        break;

    default: 
        header("Location:index.php");
        exit;
}
$msj = $msj ?? "";
$msj .= "<hr>";
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
<div class="contenedorJugar">
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
                <div>
                    <h3> <?=$msjColores?></h3>
                    <? Plantilla::crearSelects($_POST['respuesta'] ?? []) ?>
                </div>
                <input type="submit" value="Jugar" name="submit">
            </form>
        </fieldset>
    </div>

    <fieldset class="informacion">
        <h2>INFORMACIÓN</h2>
        <fieldset>
            <legend>Sección de información</legend>
            <?php 
            if (isset($_SESSION["jugadas"]) && $estadoBotonClave == "Mostrar Clave") {
                echo "<h3>Jugada actual: ". count($_SESSION["jugadas"]) ."</h3>";
            }
            ?>
            <?php 
            if ($estadoBotonClave == "Ocultar Clave") {
                echo "<h1>Clave Actual</h1>";
            }
            if (isset($_SESSION["jugadas"]))
            echo $_SESSION["jugadas"][count($_SESSION["jugadas"]) - 1]->getResultadoJugada();    

                echo $msj;
            ?>
            <?php
            if (isset($_SESSION["jugadas"]) && $estadoBotonClave == "Mostrar Clave") {
                echo "<a>Histórico de jugadas</a><br>";
                Plantilla::mostrarHistoricoJugadas($_SESSION["jugadas"]);
            }
            ?>
        </fieldset>
    </fieldset>
</div>
</body>
</html>
