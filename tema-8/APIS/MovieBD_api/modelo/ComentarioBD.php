<?php

use MongoDB\Client;

require 'vendor/autoload.php';

class ComentarioBD
{
  public static function escribir($comentario)
  {
    $conexion = ConexionBD::conectar("test");

    try {
      //Insertar
      $conexion->comentarios->insertOne([
        'id' =>  $comentario->getId(),
        'texto' => $comentario->getTexto()
      ]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ConexionBD::cerrar();
  }

  public static function getComentario($id)
  {
    $conexion = ConexionBD::conectar("test");

    $comentarios = $conexion->comentarios->find(['id' => $id]);

    $array = array();

    foreach ($comentarios as $comentario) {
      $c = new Comentario($id = $comentario['id'], $texto = $comentario['texto']);
      array_push($array, $c);
    }

    ConexionBD::cerrar();

    return $array;
  }
}
