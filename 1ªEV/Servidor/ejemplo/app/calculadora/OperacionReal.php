<?php

class OperacionReal extends Operacion{


    static function tipo_operacion(string $tipo){

    }

    public function __construct($operacion){
        parent::__construct($operacion);
    }

    public function operar(){
        return match ($this->operador) {
            '+' => $this->op1 + $this->op2,
            '-' => $this->op1 - $this->op2,
            '*' => $this->op1 * $this->op2,
            '/' => $this->op1 / ($this->op2)
        };
    }

    public function __toString(){
        $msj = "<h2>Operacion Real</h2>";
        $msj .= parent::__toString();
        return $msj;
    }
}