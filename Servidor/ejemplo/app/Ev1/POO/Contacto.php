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
    public function setTelefono($telefono) {
        $this->telefono=$telefono;
        return $this;
    }
    public function getTelefono() {
        return $this->telefono;
    }
    public function __destruct() {
        self::$cuentaContactos--;
    }
    public function getCuenta() {
        return self::$cuentaContactos;
    }
}