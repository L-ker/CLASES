<?php

class Contacto{
    static public int $cuentaContactos=0;
    public function __construct(private string $nombre="", private string $telefono=""){
        self::$cuentaContactos++;
    }
    public function setName($nombre) {
        $this->nombre=$nombre;
        return $this;
    }
    public function getName() {
        return $this->nombre;
    }
    public function __destruct() {
        self::$cuentaContactos--;
    }
    public function getCuenta() {
        return self::$cuentaContactos;
    }
}