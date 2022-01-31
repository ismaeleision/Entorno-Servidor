<?php
class ControladorSeries
{
  //Muestra las series que se haya en la api
  public static function mostrarInicio()
  {
    $vistaP = new VistaSeries();
    $vistaP->render();
  }

  public static function mostrarGenero($genero)
  {
    $series = SeriesBD::getSeries($genero);
    $html = "";
    /* 
   }
      return $html;
      */
    $vistaP = new VistaSerie();
    $vistaP->render($series);
  }
}
