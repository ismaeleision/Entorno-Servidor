<?php

class Series
{
  private $titulo;
  private $poster;
  private $mediaVotos;
  private $sinopsis;

  public function __construct($titulo = "", $poster = "", $mediaVotos = "", $sinopsis = "")
  {
    $this->titulo = $titulo;
    $this->poster = $poster;
    $this->mediaVotos = $mediaVotos;
    $this->sinopsis = $sinopsis;
  }

  /**
   * Get the value of id
   */
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of titulo
   */
  public function getTitulo()
  {
    return $this->titulo;
  }

  /**
   * Get the value of poster
   */
  public function getPoster()
  {
    return $this->poster;
  }

  /**
   * Get the value of mediaVotos
   */
  public function getMediaVotos()
  {
    return $this->mediaVotos;
  }

  /**
   * Get the value of sinopsis
   */
  public function getSinopsis()
  {
    return $this->sinopsis;
  }
}
