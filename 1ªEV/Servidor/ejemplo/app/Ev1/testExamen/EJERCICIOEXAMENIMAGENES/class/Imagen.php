<?php


class Imagen
{
    protected string $nombre;
    protected string $ubicacion;

    public function __construct ($nombre, $ubicacion) {
        $this->nombre = $nombre;
        $this->ubicacion = $ubicacion;
    }

    public function getNombre () : string {
        return $this->nombre;
    }
    public function getUbicacion () : string {
        return $this->ubicacion;
    }
}