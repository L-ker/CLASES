<?php
//metodos estaticos
class Clave {

    static public array $COLORES = ["Azul","Rojo","Naranja","Verde","Violeta","Amarillo","Marron","Rosa"];
    //no entiendo bien el contexto en el que necesito usar esta variable, creo que se usa para el tema de obtener y guardar la clave pero siendo todo estático no se bien como implementarlo 
    //así que el manejo de obtención y guardar la clave lo he hecho en jugar.php con $_SESSION sin nada externo.
    static public $clave;

    public static function generar_clave() {
        $colores = Clave::$COLORES;
        $clave=[];
        while (count($clave) < 4) {
        $color = $colores[rand(0,count($colores) - 1)];
        if (!in_array($color, $clave)) 
        $clave[] = $color;
        }
        return $clave;
    }
}