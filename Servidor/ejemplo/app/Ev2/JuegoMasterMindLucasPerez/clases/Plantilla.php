<?php
//metodos estaticos
class Plantilla {
    public static function mostrarClave($clave){

        $msj = "<h1>Clave Actual</h1><br>";

        foreach ($clave as $color) {
            $msj .= "<span class='$color'>$color</span>";
        }
        
        return $msj;
    }

    public static function mostrarHistoricoJugadas($jugadas) {

        for ($i = 0; $i < count($jugadas); $i++) {
            $jugada = $jugadas[$i];
            $coloresAcertados = $jugada->getColoresAcertados();
            $posicionesAcertadas = $jugada->getPosicionesAcertadas(); 
            $coloresAcertados -= $posicionesAcertadas;

            echo "<br><h3>Valor de la jugada " .$i + 1 ."</h3><br>";

            for ($j = 0; $j < ($posicionesAcertadas + $coloresAcertados); $j++) {
                if ($j > $posicionesAcertadas - 1) 
                    echo "<span class='Negro'>$j</span>";
                else 
                    echo "<span class='Blanco'>$j</span>";
            }

            $combinacion = $jugada->getCombinacion();

            foreach ($combinacion as $color) {
                echo "<span class='Color_small $color'> ". $color[0] ."</span>";
            }

            echo "<br>";
        }
    }

    public static function crearSelects($respuestas = []) {
        
        $cadena = "";
        $colores = Clave::$COLORES;
        for ($i = 0; $i < 4; $i++) {
            $cadena .= "<select onchange='cambia_color($i)' name='respuesta[]' id ='respuesta$i'>";
            $cadena .= "<option value='' selected disabled hidden>Color</option>";
            foreach ($colores as $color) {
                $selected = (isset($respuestas[$i]) && $respuestas[$i] == $color) ? "selected" : "";
                $cadena .= "<option class ='$color' value='$color' $selected>$color</option>";
            }
            $cadena .= "</select>";
        }
        echo $cadena;
    }
}