<?php

abstract class Operacion{

    private int $op1;
    private int $op2;
    private string $operador;
    const REAL = 1;
    const RACIONAL =2;
    const ERROR = 0;

    static function tipo_operacion(string $tipo){
        $entero = "[1-9][0-9]*";
        $real = "($entero\[\\.$entero]?)|(0\\.$entero)";
        //traduccion con los escapados ($entero[\.$entero]?)(0\\.$entero)
        $operadorReal = "[\\+|\\-|\\*|\\/]";
        $numReal = "$real$operadorReal$real";
        if (preg_match("#$numReal#",$tipo))
            return self::REAL;
        /*
        real operadorReal real
        racional operadorRacional racional
        entero operadoRacional racional
        racional operadorRacional entero
        */
        
    }

    public function __construct($op1,$op2,$tipo,$operador){}

    abstract public function operar($tipo);
}