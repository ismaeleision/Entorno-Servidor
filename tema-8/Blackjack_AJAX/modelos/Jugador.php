<?php
/* 
Clase Jugador
o Atributo “mano”, la mano del jugador, las cartas que haya ido robando.
o El constructor creará un array vacío para el atributo mano.
o Método “nuevaCarta($Carta)”, añade una Carta pasada como parámetro a la 
mano del jugador.
o Método “__toString()”, que muestre la mano del jugador.
o Método “valorMano()”, que calcule el valor de la mano del jugador, la suma 
del valor de sus cartas.
o Si necesitas más atributos o métodos, puedes añadirlos.
*/

class Jugador
{

  private $mano;

  public function __construct()
  {
    $this->mano = array();
  }

  //creo que no se usa
  public function nuevaCarta($carta)
  {
    array_push($this->mano, $carta);
  }

  //pinta el array de la carta 
  public function __toString()
  {
    $cartas = "";
    foreach ($this->mano as $carta) {
      $cartas .= $carta->__toString();
    }
    return $cartas;
  }

  //Crea un array con el nombre de las cartas para poder pintarlas
  public function mano()
  {
    $src = array();
    foreach ($this->mano as $carta) {
      $nombre = $carta->getFigura() . $carta->getPalo();
      array_push($src, $nombre);
    }
    return $src;
  }

  //Esta repetido en Carta, esta es la que se llama siempre para calcular el valor de las manos
  public function valorMano()
  {
    $valor = 0;
    foreach ($this->mano as $carta) {
      if ($carta->getFigura() != "A" && $carta->getFigura() != "K" && $carta->getFigura() != "Q" && $carta->getFigura() != "J") {
        $valor += $carta->getValor();
      } else if ($carta->getFigura() == "K" || $carta->getFigura() == "Q" || $carta->getFigura() == "J") {
        $valor += 10;
      } else if ($carta->getFigura() == "A") {
        //Si el valor total es menor a 11 A vale 1
        if ($valor < 11) {
          $valor += 11;
        } else {
          //Si no A vale 1
          $valor += 1;
        }
      }
    }
    return $valor;
  }
}
