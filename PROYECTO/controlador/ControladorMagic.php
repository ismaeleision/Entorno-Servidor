<?php
class ControladorMagic
{
  //Muestra las personas que se haya en la BD 
  public static function mostrarCartas()
  {
    $cartas = CartaBD::getCartas();
    $vistaP = new VistaPersonas();
    $vistaP->render($cartas);
  }

  public static function mostrarCarta()
  {
    $cartas = CartaBD::getCarta();
    $vistaP = new VistaCartas();
    $vistaP->render($cartas);
  }
}
