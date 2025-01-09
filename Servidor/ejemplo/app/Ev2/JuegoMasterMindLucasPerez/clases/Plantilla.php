<?php
//metodos estaticos
class Plantilla {
    public static function mostrarClave($clave){

        $msj = "";
        
        foreach ($clave as $color) {
            $msj .= "<span class='Color $color'>$color</span>";
        }
        
        return $msj;
    }

    public static function mostrarJugadasFin($jugadas) {
        for ($i = 0; $i < count($jugadas); $i++) {
            $jugada = $jugadas[$i];
            $coloresAcertados = $jugada->getColoresAcertados();
            $posicionesAcertadas = $jugada->getPosicionesAcertadas(); 

            echo "<br><h3 class='titulo'>Valor de la jugada " .$i + 1 ."</h3><br>";

            $combinacion = $jugada->getCombinacion();

            echo "<div class='jugada'>";
            foreach ($combinacion as $color) {
                echo "<span class='Color $color'> ". $color[0] ."</span>";
            }
            echo "</div>";
            echo "<br>";
        }
    }
    public static function mostrarHistoricoJugadas($jugadas) {
        echo "<div class='jugada'>";
        for ($i = 0; $i < count($jugadas); $i++) {
            $jugada = $jugadas[$i];
            $coloresAcertados = $jugada->getColoresAcertados();
            $posicionesAcertadas = $jugada->getPosicionesAcertadas(); 

            echo "<br><h3 class='titulo'>Valor de la jugada " .$i + 1 ."</h3><br>";

            for ($j = 0; $j < ($posicionesAcertadas + $coloresAcertados); $j++) {
                if ($posicionesAcertadas > 0) {
                    echo "<span class='negro'>$j</span>";
                    $posicionesAcertadas--;
                } else 
                    echo "<span class='blanco'>$j</span>";
            }

            $combinacion = $jugada->getCombinacion();

            foreach ($combinacion as $color) {
                echo "<span class='Color_small $color'> ". $color[0] ."</span>";
            }

            echo "<br>";
        }
        echo "</div>";
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