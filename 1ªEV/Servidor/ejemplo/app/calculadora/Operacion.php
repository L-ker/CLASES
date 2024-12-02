<?php

abstract class Operacion{

    protected int $op1;
    protected int $op2;
    protected string $operador;
    const REAL = 1;
    const RACIONAL =2;
    const ERROR = 0;

    static function tipo_operacion(string $cadena){

        var_dump($cadena);
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
        var_dump($tipo);
    }
    if (preg_match("#$operacion_racional1#", $cadena)) {
        $tipo = self::RACIONAL;
        var_dump($tipo);
    }
    if (preg_match("#$operacion_racional2#", $cadena)) {
        $tipo = self::RACIONAL;
        var_dump($tipo);
    }
    if (preg_match("#$operacion_racional3#", $cadena)) {
        $tipo = self::RACIONAL;
        var_dump($tipo);
    }
    return $tipo;



    /*
    $real $operador_real $real
    $racional    $operador_racional $racional
    $entero        $operador_racional $racional
    $racional  $operador_racional $entero
    */

        // $entero = "([1-9][0-9])*|0";
        // $racional = "$entero\/[1-9][0-9]*";
        // $real = "($entero\[\\.$entero]?)|(0\\.$entero)";
        // //traduccion con los escapados ($entero[\.$entero]?)(0\\.$entero)

        // $operadorReal = "[\\+|\\-|\\*|\\/]";
        // $operadorRacional = "[\\+|\\-|\\*|\\:]";

        // $numReal = "$real$operadorReal$real";
        // $numRacional = "^$racional$operadorRacional$racional$";
        // $numRacional2 = "^$racional$operadorRacional$entero$";
        // $numRacional3 = "^$entero$operadorRacional$entero$";

        
        // if (preg_match("#$numReal#",$cadena))
        //     return self::REAL;

        // if (preg_match("#$numRacional#",$cadena))
        //     return self::RACIONAL;
        // if (preg_match("#$numRacional2#",$cadena))
        //     return self::RACIONAL;
        // if (preg_match("#$numRacional3#",$cadena))
        //     return self::RACIONAL;

        // return self::ERROR;

        
        /*
        real operadorReal real
        racional operadorRacional racional
        entero operadoRacional racional
        racional operadorRacional entero
        */
        
    }

    public function __construct($operacion){
        $this->operador = $this->getOperador($operacion);
        $datos = explode($this->operador, $operacion);
        $this->op1 = $datos[0];
        $this->op2 = $datos[1];
    }

    private function getOperador(string $operacion) {
        return match(true) {
            str_contains($operacion,'+') => '+',
            str_contains($operacion,'-') => '-',
            str_contains($operacion,'*') => '*',
            str_contains($operacion,':') => ':',
            str_contains($operacion,'/') => '/',
        };
    }

    public function __toString() {
        return "$this->op1 $this->op2 $this->operador";
    }

    abstract public function operar();
}