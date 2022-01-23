<?php

class PersonasBD
{

  /**
   * Obtiene todos los productos de la BD
   */
  public static function getPersonas()
  {
    $conexion = ConexionBD::conectar("agenda");

    //Consulta BBDD
    $stmt = $conexion->prepare("SELECT * FROM personas");
    $stmt->execute();

    //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
    $productos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Personas');

    ConexionBD::cerrar();

    return $productos;
  }

  //Obtiene a la persona que coincida con el id
  public static function getPersona($id)
  {
    $conexion = ConexionBD::conectar("agenda");

    //Consulta BBDD
    $stmt = $conexion->prepare("SELECT * FROM personas WHERE id=?");
    $stmt->bindValue(1, $id);
    $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Personas');
    $stmt->execute();

    //Usamos FETCH_CLASS para que convierta a objetos las filas de la BD
    $persona = $stmt->fetch();

    ConexionBD::cerrar();

    return $persona;
  }

  //Elimina a la persona que coincida con el id de la BD
  public static function deletePersona($id)
  {
    $conexion = ConexionBD::conectar("agenda");

    //Consulta BBDD
    $stmt = $conexion->prepare("DELETE FROM personas WHERE id=?");
    $stmt->bindValue(1, $id);
    $stmt->execute();

    ConexionBD::cerrar();
  }

  //Dado el objeto persona los introduce a la BD
  public static function insertarPersona($persona)
  {
    $conexion = ConexionBD::conectar("agenda");

    try {
      //Insertar
      $stmt = $conexion->prepare("INSERT INTO personas (nombre,apellidos,email,movil) VALUES (?, ?, ?, ?)");
      // Bind
      $stmt->bindValue(1, $persona->getNombre());
      $stmt->bindValue(2, $persona->getApellidos());
      $stmt->bindValue(3, $persona->getEmail());
      $stmt->bindValue(4, $persona->getMovil());
      // Ejecuta la consulta
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ConexionBD::cerrar();
  }


  public static function reset()
  {
    $conexion = ConexionBD::conectar("agenda");
    try {
      //Insertar
      $stmt = $conexion->prepare("DELETE FROM personas");
      // Ejecuta la consulta
      $stmt->execute();
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
    ConexionBD::cerrar();
  }
}
