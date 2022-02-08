<?php
class ControladorChiste
{
  //Muestra los elementos estaticos de la pagina
  public static function mostrarInicio()
  {
    $vistaP = new VistaInicio();
    $vistaP->render();
  }

  //Llama a bd por un chiste random por genero y lo pinta 
  public static function mostrarRandomGenero($genero)
  {
    $chiste = ChisteBD::getRandomGenero($genero);
    $vista = new VistaChiste();
    $vista->render($chiste);
  }

  //llama a bd por un chiste random sin genero y lo pinta
  public static function mostrarRandom()
  {
    $chiste = ChisteBD::getRandom();
    $vista = new VistaChiste();
    $vista->render($chiste);
  }

  //pinta los resultados que obtenga de bd del contenido del buscador
  public static function mostrarBuscador($buscador)
  {
    $chiste = ChisteBD::buscador($buscador);
    $vista = new VistaChisteBuscador();
    $vista->render($chiste);
  }
}
