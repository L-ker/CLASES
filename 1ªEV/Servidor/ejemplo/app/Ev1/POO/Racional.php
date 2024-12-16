<?php

class Racional
{
    static public int $cuenta_racional=0;
    private $num;
    private $den;

    public function __construct($num = 1, $den = 1)
    {
        self::$cuenta_racional++;
        if (is_string($num)) {
            $datos = explode("/", $num);
            $num = $datos[0];
            $den = $datos[1];
        }

        $this->num = $num;
        $this->den = $den;
    }

    public function __toString(): string
    {
     return "$this->num/$this->den";
    }

    public function sumar (Racional $op1):Racional{
        $den = $this->den * $op1->den;
        $num = $this->num * $op1->den+$this->den*$op1->num;
        return new Racional($num, $den);
    }
    public function restar (Racional $op1):Racional{
        $den = $this->den * $op1->den;
        $num = $this->num * $op1->den-$this->den*$op1->num;
        return new Racional($num, $den);
    }
    public function multiplicar (Racional $op1):Racional{
        $num = $this->num * $op1->num;
        $den = $this->den * $op1->den;
        return new Racional($num, $den);
    }
    public function dividir (Racional $op1):Racional{
        $num = $this->num * $op1->den;
        $den = $this->den * $op1->num;
        return new Racional($num, $den);
    }

    // public static function sumar_estatico(Racional $op1, Racional $op2):Racional{
    //     $den = $op2->den * $op1->den;
    //     $num = $op2->num * $op1->den+$op2->den*$op1->num;
    //     return new Racional($num, $den);
    // }
    static public function sumar_estatico(Racional $op1, Racional $op2) {
        return $op1->sumar($op2);
    }

}
?>