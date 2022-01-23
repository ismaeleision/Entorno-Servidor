<?php

class Regalos
{
  private $id;
  private $nombre;
  private $precio;
  private $estado;
  private $usuario;

  public function __construct($id = "", $nombre = "", $destinatario = "", $precio = "", $estado = "", $usuario = "")
  {
    $this->id = $id;
    $this->nombre = $nombre;
    $this->destinatario = $destinatario;
    $this->precio = $precio;
    $this->estado = $estado;
    $this->usuario = $usuario;
  }

  /**
   * Get the value of nombre
   */
  public function getNombre()
  {
    return $this->nombre;
  }

  /**
   * Set the value of nombre
   *
   * @return  self
   */
  public function setNombre($nombre)
  {
    $this->nombre = $nombre;

    return $this;
  }

  /**
   * Get the value of precio
   */
  public function getPrecio()
  {
    return $this->precio;
  }

  /**
   * Set the value of precio
   *
   * @return  self
   */
  public function setPrecio($precio)
  {
    $this->precio = $precio;

    return $this;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of destinatario
   */
  public function getDestinatario()
  {
    return $this->destinatario;
  }

  /**
   * Set the value of destinatario
   *
   * @return  self
   */
  public function setDestinatario($destinatario)
  {
    $this->destinatario = $destinatario;

    return $this;
  }

  /**
   * Get the value of estado
   */
  public function getEstado()
  {
    return $this->estado;
  }

  /**
   * Set the value of estado
   *
   * @return  self
   */
  public function setEstado($estado)
  {
    $this->estado = $estado;

    return $this;
  }

  /**
   * Get the value of usuario
   */ 
  public function getUsuario()
  {
    return $this->usuario;
  }
}
