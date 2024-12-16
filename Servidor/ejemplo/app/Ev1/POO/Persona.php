<?php

class Persona{
    //atributos
    // private string $nombre;
    // private string $apellido;
    // private int $edad;

    //metodos
    // public function __construct(string $nom, string $surname, int $año) {
    //     $this->nombre = $nom;
    //     $this->apellido = $surname;
    //     $this->edad = $año;
    // }

    static public int $cuenta_racional=0;
    public function __construct(private string $nombre="", private string $apellido="", private int $año=0){
        self::$cuenta_racional++;
    }

    public function setName($nombre) {
        $this->nombre=$nombre;
        return $this;
    }

    public function setApellido($apellido) {
        $this->apellido=$apellido;
        return $this;
    }
    public function setAño($año) {
        $this->año=$año;
        return $this;
    }
    public function __tostring() {
        return "NOMBRE: $this->nombre ";
    }

    public function __destruct() {
        self::$cuenta_racional--;
    }

    public function getCuenta() {
        return self::$cuenta_racional;
    }

}