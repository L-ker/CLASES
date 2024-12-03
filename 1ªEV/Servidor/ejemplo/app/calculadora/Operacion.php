<?php

abstract class Operacion{

    protected  $op1;
    protected  $op2;
    protected  string $operador;
    const REAL =1;
    const RACIONAL =2;
    const ERROR = 0;


    static function tipo_operacion(string $cadena)
    {

        $tipo = self::ERROR;
        /*Con la intención de ayudar aporto algunas expresiones regulares que puedes usar*/
        $numReal = '[0-9]+(\.[0-9]*)?';
        $numEntero = '[0-9]+';
        $opReal = '[\+|\-|\*|\/]';
        $opRacional = '[\+|\-|\*|\:]';
        $numRacional = '[0-9]+\/[1-9][0-9]*';

        $operacion_real = "^$numReal$opReal$numReal$";
        $operacion_racional1 = "^$numRacional$opRacional$numRacional$";
        $operacion_racional2 = "^$numEntero$opRacional$numRacional$";
        $operacion_racional3 = "^$numRacional$opRacional$numEntero$";


        if (preg_match("#$operacion_real#", $cadena)) {
            $tipo = self::REAL;
        }
        if (preg_match("#$operacion_racional1#", $cadena)) {
            $tipo = self::RACIONAL;
        }
        if (preg_match("#$operacion_racional2#", $cadena)) {
            $tipo = self::RACIONAL;
        }
        if (preg_match("#$operacion_racional3#", $cadena)) {
            $tipo = self::RACIONAL;
        }
        return $tipo;



        /*
        $real $operador_real $real
        $racional    $operador_racional $racional
        $entero        $operador_racional $racional
        $racional  $operador_racional $entero
        */



    }

    public function __construct(string $operacion){
        $this->operador = $this->getOperador ($operacion);
        $datos = explode($this->operador, $operacion);
        $this->op1 = $datos[0];
        $this->op2 = $datos[1];
    }
    private function getOperador(string $operacion):string{


        return match(true){
            str_contains($operacion,'+') => '+',
            str_contains($operacion,'-') => '-',
            str_contains($operacion,'*') => '*',
            str_contains($operacion,':') => ':',
            str_contains($operacion,'/') => '/',
        };

    }

    public function __toString(){
        return "$this->op1 $this->operador  $this->op2 = ";
    }

    abstract  public function operar();


}
