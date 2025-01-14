<?php
namespace Modelo;

class Persona {

    public function __construct(private string $nombre, 
                                private string $apellido,
                                private int $edad ) {

        
                                }
}