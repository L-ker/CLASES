<?php

class OperacionRacional extends Operacion{


    static function tipo_operacion(string $tipo){

    }

    public function __construct($operacion){
        parent::__construct($operacion);
        $this->op1 = new Racional($this->op1);
    }

    public function operar(){
        return match ($this->operador) {
            '+' => $this->op1 + $this->op2,
            '-' => $this->op1 - $this->op2,
            '*' => $this->op1 * $this->op2,
            ':' => $this->op1 / ($this->op2)
        };
    }

    public function __toString(){
        $msj = "<h2>Operacion racional</h2>";
        $msj .= parent::toString();
        return $msj;
    }
}