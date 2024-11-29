<?php
$carga = fn ($clase) => require ("clase.php");
spl_autoload_register($carga);

if (isset($_POST['submit'])) {
    $operacion = htmlspecialchars($_POST['operacion']);
    $tipo_operacion = Operacion::tipo_operacion($operacion);
    switch($tipo_operacion){
        case Operacion::REAL:
            $operacion = new OperacionReal($operacion);
            $resultado = $operacion->opera();
            break;
        case Operacion::RACIONAL:
            $operacion = new OperacionRacional($operacion);
            $resultado = $operacion->opera();
            break;
        case Operacion::ERROR:
            break;
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Calculadora</title>
        <link rel="stylesheet" type="text/css" href="Style/estilo.css" media="screen" />
    </head>
    <body>
        <header>
            <h1>Calculadora Real / Racional</h1>
        </header>
        <aside>
            <fieldset id="ayuda">
                <legend>Reglas de uso de la calculadora</legend>
                <ul>
                    <li>La calculadora se usa escribiendo la operación.</li>
                    <li>La  operación será <strong>Operando_1 operación Operando_2</strong>.</li>
                    <li>Cada operando puede ser número <i>positivo</i><strong> real  o racional.</strong></li>
                    <li>Real p.e. <strong>5</strong> o <strong>5.12 </strong> Racional p.e <strong> 6/3 </strong>o<strong> 7/1</strong></li>
                    <li>Los operadores reales permitidos son <strong><span class="destacado"> +  -  *  /</span></strong></li>
                    <li>Los operadores racionales permitidos son <strong><span class="destacado"> +  -  *  :</span> </strong></li>
                    <li>No se deben de dejar espacios en blanco entre operandos y operación</li>
                    <li>Si un operando es real y el otro racional se considerará operación racional</label></li>
                    <li>Ejemplos:
                        <ul>
                            <li>(Real) <strong>5.1+4</strong></li>
                            <li>(Racional) <strong>5/1:2</strong></li>
                            <li>(Error) <strong>5.2+5/1</strong></li>
                            <li>(Error) <strong>52214+</strong></li>
                        </ul>
                    </li>
                </ul>
            </fieldset>
        </aside>
        <main>
            <fieldset>
                <legend>Establece la operación</legend>
                <form action="." method="post">
                    <label for="operacion">Operación</label>
                    <input type="text" name="operacion" id="">
                    <input type="submit" name="enviar" value="Calcular">
                                    </form>
            </fieldset>
            <fieldset id=rtdo><legend>Resultado</legend>
                <label></label>
            </fieldset>
        </main>
    </body>
</html>