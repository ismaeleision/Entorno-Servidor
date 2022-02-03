<?php
class Comentario
{
  private $id;
  private $texto;

  public function __construct($id = "", $texto = "")
  {
    $this->id = $id;
    $this->texto = $texto;
  }



  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of texto
   * No saco el setter porque no voy a ponerle para editar comentarios ya escritos
   */
  public function getTexto()
  {
    return $this->texto;
  }
}
