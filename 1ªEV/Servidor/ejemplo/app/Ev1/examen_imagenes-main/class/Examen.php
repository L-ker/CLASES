<?php


class Examen extends Pregunta
{

    private $nombre_alumno;
    private $idioma;
    private $fecha;
    private array  $preguntas=[];

    public function __construct($idioma, $imagenes, $numero_preguntas) {
        $this->idioma = $idioma;
        $imagenes = $imagenes[$idioma];
        $pos = rand (0,sizeof($imagenes)-1);
        $categorias = array_keys($imagenes);
        $categoria = $categorias[$pos];
        for ($n = 0; $n < $numero_preguntas; $n++) {
            $this->preguntas[] = new Pregunta($categoria,$imagenes);
        }
        var_dump($imagenes);
    }

}