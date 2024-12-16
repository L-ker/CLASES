<?php

 class OperacionReal extends Operacion{


    public function __construct($operador){
        parent::__construct($operador);

    }

     public function operar(){
         return match($this->operador){
             '+'=> $this->op1 + $this->op2,
             '-'=> $this->op1 -$this->op2,
             '*'=> $this->op1 *$this->op2,
             '/'=> $this->op1 /$this->op2,
         };

    }
     public function __toString(){
         $msj = "<h2>Operacion Real</h2>";
         $msj .= parent::__toString();
         return $msj;
     }



 }
