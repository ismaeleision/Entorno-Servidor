<?php
class RegalosBD
{

  //Sacar todos los regalos de la BD
  public static function getRegalos()
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    //La consulta sql
    $stmt = $conexion->prepare("SELECT * FROM regalos");
    $stmt->execute();

    //Lo que sale lo convierto en objetos Regalos
    $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalos');

    //Cierra la conexion a la BD
    ConexionBD::cerrar();

    return $regalos;
  }

  //Obtiene los valores de BD que coincidan con el nombre o el destinatario
  public static function getRegalo($nombre, $destinatario)
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    $stmt = $conexion->prepare("SELECT * FROM regalos WHERE nombre=? OR destinatario=?");
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $destinatario);
    $stmt->execute();

    $regalos = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Regalos');

    ConexionBD::cerrar();
    return $regalos;
  }

  //Borra un articulo de la Cesta
  public static function deleteRegalo($id)
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    $stmt = $conexion->prepare("DELETE FROM regalos WHERE id=?");
    $stmt->bindValue(1, $id);
    $stmt->execute();

    ConexionBD::cerrar();
  }

  //Insertar Regalo nuevo
  public static function insertarRegalo($regalo)
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    $stmt = $conexion->prepare("INSERT INTO regalos (nombre, destinatario, precio, estado, id_usuario) VALUES (?,?,?,?,?)");
    $stmt->bindValue(1, $regalo->getNombre());
    $stmt->bindValue(2, $regalo->getDestinatario());
    $stmt->bindValue(3, $regalo->getPrecio());
    $stmt->bindValue(4, $regalo->getEstado());
    $stmt->bindValue(5, $regalo->getUsuario());
    $stmt->execute();

    ConexionBD::cerrar();
  }

  //Modificar 
  public static function modificarRegalo($id, $nombre, $destinatario, $precio, $estado)
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    $stmt = $conexion->prepare("UPDATE FROM regalos SET nombre=?, destinatario=?, precio=?, estado=? WHERE id=?");
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $destinatario);
    $stmt->bindValue(3, $precio);
    $stmt->bindValue(4, $estado);
    $stmt->bindValue(5, $id);
    $stmt->execute();

    ConexionBD::cerrar();
  }
}
