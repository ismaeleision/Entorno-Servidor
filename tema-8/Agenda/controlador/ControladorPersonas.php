<?php
class ControladorPersonas
{
  //Muestra las personas que se haya en la BD 
  public static function mostrarPersonas()
  {
    $personas = PersonasBD::getPersonas();
    $vistaP = new VistaPersonas();
    $vistaP->render($personas);
  }

  //Crea un objeto persona y lo introduce a la BD
  public static function insertarPersona()
  {
    $nombre = filtrado($_REQUEST['nombre']);
    $apellido = filtrado($_REQUEST['apellidos']);
    $email = filtrado($_REQUEST['email']);
    $movil = filtrado($_REQUEST['movil']);

    $persona = new Personas(0, $nombre, $apellido, $email, $movil);

    PersonasBD::insertarPersona($persona);
    header("Location: enrutador.php?accion=inicio");
    exit;
  }

  //Quita la persona que corresponda con el id de la BD
  public static function quitarPersona()
  {
    $id = filtrado($_REQUEST['id']);

    PersonasBD::deletePersona($id);
    header("Location: enrutador.php?accion=inicio");
    exit;
  }

  //Devuelve una persona que corresponda con el id llamando a la funcion getPersonas del objero PersonasBD
  public static function getPersona($id)
  {
    return PersonasBD::getPersonas($id);
  }


  public static function resetPersonas()
  {
    PersonasBD::reset();
    header("Location: enrutador.php?accion=inicio");
    exit;
  }
}
