<?php

class Chiste
{
  private $category;
  private $created_at;
  private $url;
  private $value;

  public function __construct($category = "", $created_at = "", $url = "", $value = "")
  {
    $this->category = $category;
    $this->created_at = $created_at;
    $this->url = $url;
    $this->value = $value;
  }

  /**
   * Get the value of category
   */ 
  public function getCategory()
  {
    return $this->category;
  }

  /**
   * Get the value of created_at
   */ 
  public function getCreated_at()
  {
    return $this->created_at;
  }

  /**
   * Get the value of url
   */ 
  public function getUrl()
  {
    return $this->url;
  }

  /**
   * Get the value of value
   */ 
  public function getValue()
  {
    return $this->value;
  }
}
