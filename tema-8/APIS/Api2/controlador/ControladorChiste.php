<?php
class ControladorChiste
{
  //Muestra las series que se haya en la api
  public static function mostrarInicio()
  {
    $vistaP = new VistaInicio();
    $vistaP->render();
  }

  public static function mostrarRandomGenero($genero)
  {
    $chiste = ChisteBD::getRandomGenero($genero);
    $vista = new VistaChiste();
    $vista->render($chiste);
  }

  public static function mostrarRandom()
  {
    $chiste = ChisteBD::getRandom();
    $vista = new VistaChiste();
    $vista->render($chiste);
  }

  public static function mostrarBuscador($buscador)
  {
    $chiste = ChisteBD::buscador($buscador);
    $vista = new VistaChisteBuscador();
    $vista->render($chiste);
  }
}
