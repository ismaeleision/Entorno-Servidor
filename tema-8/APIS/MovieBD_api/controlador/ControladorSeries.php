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
    foreach ($series as $serie) {
      $html .= '<div class="card" style="width: 18rem;">
        <img src="' . $serie->getPoster() . ' " class="card-img-top" width="400px" height="450px">
        <div class="card-body">
        <h5 class="card-title">' . $serie->getPoster() . '</h5>
        <p class="card-text">' . $serie->getSinopsis() . '</p>
      </div>
    </div>';
      return $html;
    }
  }
}
