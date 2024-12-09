<?php


class Pregunta extends Imagen
{
    private   Imagen $imagen;
    private $respuesta;
    public function __construct($imagen, $categoria, $idioma) {
        $nombreImagen = explode(".", $imagen)[0];
        $this->imagen = new Imagen($nombreImagen, "./$idioma/$categoria/$imagen");
        $respuesta = $nombreImagen;
    }


}










