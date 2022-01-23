<?php
class ControladorRegalos
{
  public static function mostrarIndex()
  {
    $vistaL = new VistaLogin();
    $vistaL->render();
  }

  public static function comprobarUsuario($nick, $contraseña)
  {
    $usuario = UsuariosBD::getUsuario($nick, $contraseña);
    if ($usuario[0]->getContraseña() != $contraseña) {
      header("Location: enrutador.php?accion=index&mostrar=errorDatos");
      exit;
    } else {
      $_SESSION['usuario'] = serialize($usuario);
      header("Location: enrutador.php?accion=inicio");
      exit;
    }
  }

  public static function mostrarRegalos()
  {
    $regalos = RegalosBD::getRegalos();
    $vistaR = new VistaRegalos();
    $vistaR->render($regalos);
  }

  public static function quitarRegalo()
  {
    $id = filtrado($_REQUEST['id']);

    RegalosBD::deleteRegalo($id);
    header("Location: enrutador.php?accion=inicio");
    exit;
  }

  //Recoge los datos del formulario, crea un objeto regalo y lo inserta en la BD
  public static function insertarRegalo()
  {
    $nombre = filtrado($_REQUEST['nombre']);
    $destinatario = filtrado($_REQUEST['destinatario']);
    $precio = filtrado($_REQUEST['precio']);
    $estado = filtrado($_REQUEST['estado']);
    $usuario = $_REQUEST['usuario'];

    $regalo = new Regalos(0, $nombre, $destinatario, $precio, $estado, $usuario);
    RegalosBD::insertarRegalo($regalo);
    header("Location: enrutador.php?accion=inicio");
    exit;
  }
}
