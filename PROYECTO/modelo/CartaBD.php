<?php

class CartaBD
{

  /**
   * Obtiene todos los productos de la BD
   */
  public static function getCartas()
  {
    $conexion = ConexionBD::conectar("MagicCards");
    $cartas = $conexion->Cards->find();

    $coleccion = array();

    foreach ($cartas as $carta) {
      $x = new Carta($id = $carta['id'], $name = $carta['name'], $img = $carta["'image_uris'=>[small']"]);
      array_push($coleccion, $x);
    }

    ConexionBD::cerrar();

    return $coleccion;
  }


  public static function getCarta()
  {
    $conexion = ConexionBD::conectar("MagicCards");
    $carta = $conexion->Cards->findOne();

    $coleccion = array();
    $x = new Carta($id = $carta['id'], $name = $carta['name'], $img = $carta[array('image_uris' => 'small')]);
    array_push($coleccion, $x);

    ConexionBD::cerrar();

    return $coleccion;
  }
}
