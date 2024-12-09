<?php


class Imagen
{
    protected string $nombre;
    protected string $ubicacion;

    public function __construct ($nombre, $ubicacion) {
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
    }

}