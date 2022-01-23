<?php

class Carta
{
  private $palo;
  private $figura;

  //Constructor
  public function __construct($palo = "", $figura = "")
  {
    $this->palo = $palo;
    $this->figura = $figura;
  }

  //Escribano
  public function __toString()
  {
    return "Palo->" . $this->palo . " Figura->" . $this->figura;
  }

  /**
   * Get the value of palo
   */
  public function getPalo()
  {
    return $this->palo;
  }

  /**
   * Set the value of palo
   *
   * @return  self
   */
  public function setPalo($palo)
  {
    $this->palo = $palo;

    return $this;
  }

  /**
   * Get the value of figura
   */
  public function getFigura()
  {
    return $this->figura;
  }

  /**
   * Set the value of figura
   *
   * @return  self
   */
  public function setFigura($figura)
  {
    $this->figura = $figura;

    return $this;
  }


  //Calcula el valor de la carta 
  public function getValor()
  {
    if ($this->figura != "k" && $this->figura != "q" && $this->figura != "j") {
      return intval($this->figura);
      //Con el A hay problemas porque puede ser 1
    } else if ($this->figura == "a") {
      return 11;
    } else {
      return 10;
    }
  }
}
