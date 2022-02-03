<?php

use MongoDB\Client as Mongo;

require_once __DIR__ . '\vendor\autoload.php';

class ConexionBD
{

  private static $conexion;

  public static function conectar($bd,  $host = "mongodb+srv://usuario:usuario@pruebamongo.ishrf.mongodb.net/test", $user = "root", $password = "root")
  {
    try {
      self::$conexion = (new Mongo($host))->{$bd};
    } catch (PDOException $e) {
      echo $e->getMessage();
    }

    return self::$conexion;
  }

  public static function cerrar()
  {
    self::$conexion = null;
  }
}
