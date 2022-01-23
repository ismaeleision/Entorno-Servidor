<?php

/**Clase Partida, usa Jugador y BarajaInglesa. Llevará los dos jugadores y la baraja. Debes 
decidir tú qué implementar de esta clase y cómo. */

class Partida
{
  private $crupier;
  private $jugador;
  private $mazo;

  //no recibe parametros porque directamente se crean objetos de las clases que necesita
  public function __construct()
  {
    $this->crupier = new Jugador();
    $this->jugador = new Jugador();
    $this->mazo = new BarajaInglesa();
    $this->mazo->barajar(); //baraja el mazo, para no tener que hacerlo despues
  }

  //Reparte las dos cartas iniciales a los jugadores
  public function repartirMano()
  {
    $this->getCrupier()->nuevaCarta($this->mazo->repartirCarta());
    $this->getJugador()->nuevaCarta($this->mazo->repartirCarta());
    $this->getCrupier()->nuevaCarta($this->mazo->repartirCarta());
    $this->getJugador()->nuevaCarta($this->mazo->repartirCarta());
  }

  //le da una carta al jugador
  public function darCartaJugador()
  {
    $this->jugador->nuevaCarta($this->mazo->repartirCarta());
    if ($this->jugador->valorMano() > 21) {
      return 1;
    } else {
      return 0;
    }
  }

  //Le da una carta al crupier
  public function darCartaCrupier()
  {
    $this->crupier->nuevaCarta($this->mazo->repartirCarta());
  }

  //Solo pongo getters porque la idea es no modificar la partida mientras dure
  /**
   * Get the value of mazo
   */
  public function getMazo()
  {
    return $this->mazo;
  }

  /**
   * Get the value of crupier
   */
  public function getCrupier()
  {
    return $this->crupier;
  }

  /**
   * Get the value of jugador
   */
  public function getJugador()
  {
    return $this->jugador;
  }
}
//FALTA CURRO