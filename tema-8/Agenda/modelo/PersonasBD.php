<?php

class PersonasBD
{

  /**
   * Obtiene todos los productos de la BD
   */
  public static function getPersonas()
  {
    $conexion = ConexionBD::conectar("agenda");

    //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
    $gente = $conexion->personas->find();

    $personas = array();

    foreach ($gente as $persona) {
      $x = new Personas($id = $persona['_id'], $nombre = $persona['nombre'], $apellidos = $persona['apellidos'], $email = $persona['email'], $movil = $persona['movil']);
      array_push($personas, $x);
    }

    ConexionBD::cerrar();

    return $personas;
  }


  //Elimina a la persona que coincida con el id de la BD
  public static function deletePersona($id)
  {
    $conexion = ConexionBD::conectar("agenda");

    $conexion->personas->deleteOne(array('_id' => new MongoDB\BSON\ObjectId($id)));

    ConexionBD::cerrar();
  }

  //Dado el objeto persona los introduce a la BD
  public static function insertarPersona($persona)
  {
    $conexion = ConexionBD::conectar("agenda");

    try {
      //Insertar
      $conexion->personas->insertOne([
        'nombre' =>  $persona->getNombre(),
        'apellidos' => $persona->getApellidos(),
        'email' => $persona->getEmail(),
        'movil' => $persona->getMovil()
      ]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ConexionBD::cerrar();
  }


  public static function reset()
  {
    $conexion = ConexionBD::conectar("agenda");
    try {
      //Borrar Todo lo que contenga la coleccion
      $conexion->personas->deleteMany([]);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ConexionBD::cerrar();
  }
}
