<?php

 class OperacionRacional extends Operacion{


    public function __construct($operacion){
        parent::__construct($operacion);
        $this->op1 = new Racional($this->op1);
        $this->op2 = new Racional($this->op2);
    }

     public function operar(){
        return match($this->operador){
            '+'=> $this->op1->sumar($this->op2),
            '-'=> $this->op1->restar($this->op2),
            '*'=> $this->op1->multiplicar($this->op2),
            ':'=> $this->op1->dividir($this->op2),
        };

    }

    public function __toString(){
        $msj = "<h2>Operacion Racional</h2>";
        $msj .= parent::__toString();
        return $msj;
    }


}
