<?php

require_once __DIR__ . '\vendor\autoload.php';


class Carta
{
  private $id;
  private $name;
  private $img;

  public function __construct($id = "", $name = "", $img = "", $cost = "")
  {
    $this->id = $id;
    $this->name = $name;
    $this->img = $img;
    $this->cost = $cost;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->name;
  }


  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of img
   */
  public function getImg()
  {
    return $this->img;
  }
}
