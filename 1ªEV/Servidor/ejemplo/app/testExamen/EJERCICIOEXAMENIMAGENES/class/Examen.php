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

   public function generarFormulario($accion) {
        if ($accion == "formulario") {
            echo "<fieldset>";
            echo "<legend>Examen en ".$this->idioma."</legend>";
            echo '<form action="index.php" method="POST">';
            foreach ($this->preguntas as $index => $pregunta) {
                echo '<img src="' . $pregunta->getImagen()->getUbicacion() . '" alt="' . $pregunta->getRespuesta() . '">';
                echo "<br><label>Respuesta:</label>";
                echo '<input type="text" name="respuestas[' . $index. ']"><br>';
        }
            echo '<input type="submit" value="enviar" name="submit">';
            echo '<input type="submit" value="reiniciar" name="submit">';
            echo "</form>"; 
            echo "</fieldset>";
        } else {

        }

    }
}