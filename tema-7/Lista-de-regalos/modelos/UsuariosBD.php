<?php
class UsuariosBD
{

  public static function getUsuario($nombre, $contraseña)
  {
    $conexion = ConexionBD::conectar("tienda_regalos");

    //La consulta sql
    $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE nombre=? OR email=? AND contraseña=?");
    $stmt->bindValue(1, $nombre);
    $stmt->bindValue(2, $nombre);
    $stmt->bindValue(3, $contraseña);
    $stmt->execute();

    //Lo que sale lo convierto en objetos Usuarios
    $usuario = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Usuarios');

    //Cierra la conexion a la BD
    ConexionBD::cerrar();

    return $usuario;
  }
}
