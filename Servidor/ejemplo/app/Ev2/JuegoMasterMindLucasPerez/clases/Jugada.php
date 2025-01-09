<?php
class Jugada {

public $combinacion;
public $colores_acertados;
public $posiciones_acertadas;

public $resultado_jugada;

public function __construct($combinacion){
    $this->combinacion = $combinacion;
}

public function getColoresAcertados() {
    return $this->colores_acertados;
}

public function getPosicionesAcertadas() {
    return $this->posiciones_acertadas;
}
public function getCombinacion() {
    return $this->combinacion;
}

public function getResultadoJugada() {
    return $this->resultado_jugada;
}

public function validarJugada() {

    $clave = $_SESSION["clave"];

    $aciertos = 0;

    //no pongo en los bucles "count($this->combinacion)" en vez de 4 porque lo he considerado un valor que no va a ser actualizado en el futuro
    for ($i = 0; $i < 4; $i++) {
        $colorClave = $clave[$i];
        for ($j = 0; $j < 4; $j++) {
            if ($colorClave == $this->combinacion[$j]) {
                $aciertos++;
                break;
            }
        }
    }

    $this->colores_acertados = $aciertos;
    $aciertos = 0;

    for ($i = 0; $i < 4; $i++) {
        $colorClave = $clave[$i];
        $colorCombinacion = $this->combinacion[$i];
        if ($colorClave == $colorCombinacion) {
            $aciertos++;
        }
    }

    $this->posiciones_acertadas = $aciertos;

    $this->resultado_jugada = "<h3>Resultado: $this->colores_acertados colores y $this->posiciones_acertadas posiciones</h3>";
}

}