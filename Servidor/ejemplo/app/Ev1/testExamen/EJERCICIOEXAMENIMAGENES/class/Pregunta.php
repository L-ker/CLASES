<?php


class Pregunta extends Imagen
{
    private   Imagen $imagen;
    private $respuesta;
    public function __construct($imagen, $categoria, $idioma) {
        $nombreImagen = explode(".", $imagen)[0];
        $this->imagen = new Imagen($nombreImagen, "imagenes/$idioma/$categoria/$imagen");
        $this->respuesta = $nombreImagen;
    }

    public function getRespuesta() {
        return $this->respuesta;
    }

    public function getImagen() {
        return $this->imagen;
    }
}










