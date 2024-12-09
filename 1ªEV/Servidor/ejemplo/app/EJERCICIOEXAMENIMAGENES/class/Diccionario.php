<?php

class Diccionario 
{

    static public array $diccionario =[
            'English' => [
                "Cuerpo" => ['finger.png', 'foot.png', 'hand.png', 'nose.png'],
                "Deportes" => ['cycling.png', 'football.png', 'swimming.png'],
                "Ropas" => ['blouse.png', 'boots.png', 'dress.png', 'salopette.png', 'shirt.png', 'shoes.png', 'skirt.png', 'sueter.png', 'sweatshirt.png', 't_shirt.png']
            ],
            'France' => [
                'Cuerpo' => ['doigt.png', 'main.png', 'nez.png', 'pied.png'],
                "Deportes" => ['cyclisme.png', 'football.png', 'natation.png'],
                "Ropas" => ['bottes.png', 'chaussures.png', 'chemise.png', 'chemisier.png', 'jupe.png',
                    'pull.png', 'robe.png', 'salopette.png', 'sweat.png', 'tee_shirt.png']
            ],
            'Spain' => [
                'Cuerpo' => ['dedo.png', 'mano.png', 'nariz.png', 'pie.png'],
                "Deportes" => ['ciclismo.png', 'futbol.png', 'natacion.png'],
                'Ropas' => ['blusa.png', 'botas.png', 'camisa.png', 'camiseta.png', 'falda.png', 'sudadera.png', 'sueter.png',
                    'vestido.png']
            ]
    ];

    protected string $idiomas;
    protected string $temas;


}