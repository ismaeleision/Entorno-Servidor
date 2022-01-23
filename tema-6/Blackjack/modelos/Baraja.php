<?php
/**
 * Clase abstracta Baraja
 * Atributo “mazo” que será un array de 52 cartas de la clase Carta.
 * Método abstracto repartirCarta().
 * Constructor, crea un array vacío para el mazo.
 * Método barajar(), el array del mazo lo desordena.
 * Método listar(), muestra por pantalla el mazo de cartas.
 */

abstract class Baraja
{
  protected $mazo;

  public function __construct()
  {
    $this->mazo = array();
  }

  public abstract function repartirCarta();

  public function barajar()
  {
    return shuffle($this->mazo);
  }

  public function listar()
  {
    foreach ($this->mazo as $carta) {
      echo $carta;
    }
  }
}
