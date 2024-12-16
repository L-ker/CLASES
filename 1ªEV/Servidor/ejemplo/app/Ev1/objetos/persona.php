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

    public function __construct(private string $nombre, private string $apellido, private int $año){}

    public function __tostring() {
        return "NOMBRE: $this->nombre ";
    }
}