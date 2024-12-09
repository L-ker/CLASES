<?php
class Examen extends Pregunta
{

    private array  $preguntas=[];
    private $categoria;
    private $idioma;

    public function __construct($listaPreguntas, $categoria, $idioma) {
        $this->categoria = $categoria;
        $this->idioma = $idioma;

        foreach ($listaPreguntas as $pregunta) {
            $this->preguntas[] = new Pregunta($pregunta,$categoria,$idioma);
        }

    }
    
   public function getCategoria(): string {
        return $this->categoria;
   }

   public function getIdioma(): string {
    return $this->idioma;
   }

   public function getPreguntas(): array {
    return $this->preguntas;
   }
}