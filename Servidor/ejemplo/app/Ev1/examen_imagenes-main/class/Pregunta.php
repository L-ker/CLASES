<?php



class Pregunta
{
    private    $imagen;
    private $respuesta;
    private $resultado;
    private $categoria;

    public function __construct($categoria, $imagenes){
        $pos = array_rand($imagenes[$categoria]);
        $this->categoria = $categoria;
        $this->imagen = $imagenes[$categoria[$pos]];

    }

}