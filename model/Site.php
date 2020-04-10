<?php

class Site{

  function getHabilidadeProd(){
    $habilidades = $this->habilidadeProdArray();

    uasort($habilidades, function ($item, $compare) {
      return $item['inicio'] >= $compare['inicio']; 
    });

    return $habilidades;
  }

  function getHabilidadeAcad(){
    return $this->habilidadeAcadArray();
  }

  private function habilidadeProdArray(){
    return [
      [
        "habilidade"=>"HTML • CSS • JS",
        "inicio"=>2014
      ],
      [
        "habilidade"=>"Git • BitBucket",
        "inicio"=>2016
      ],
      [
        "habilidade"=>"MySQL • PostegreSQL",
        "inicio"=>2015
      ],
      [
        "habilidade"=>"PHP",
        "inicio"=>2015
      ],
      [
        "habilidade"=>"Laravel",
        "inicio"=>2017
      ],
      [
        "habilidade"=>"Scrum",
        "inicio"=>2017
      ],
      [
        "habilidade"=>"Node.js",
        "inicio"=>2018
      ],
      [
        "habilidade"=>"AWS • NGINX • CI/CD • Docker",
        "inicio"=>2018
      ],
      [
        "habilidade"=>"React.js",
        "inicio"=>2019
      ],
    ];
  }
  
  private function habilidadeAcadArray(){
    return [
      [
        "habilidade"=>"Android"
      ],
      [
        "habilidade"=>"React Native"
      ],
      [
        "habilidade"=>"MongoDB",
      ],
      [
        "habilidade"=>"Angular"
      ],
      [
        "habilidade"=>"Gamification"
      ],
      [
        "habilidade"=>"Jest"
      ],
      [
        "habilidade"=>"Arquitetura de Software"
      ], 
      [
        "habilidade"=>"Microserviço"
      ]
    ];
  }

}