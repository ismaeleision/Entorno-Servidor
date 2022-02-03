<?php

class SeriesBD
{

  /**
   * Obtiene todos los productos de la BD
   */
  public static function getSeries($genero)
  {
    $url = "https://api.themoviedb.org/3/discover/tv?with_genres=" . $genero . "&api_key=4050c61edeca6dd91bd3d9d71914cd3b&language=es";
    $api = file_get_contents($url, false);
    $series = json_decode($api);
    $series = $series->results;

    return $series;
  }

  public static function getSerie($id)
  {
    $url = "https://api.themoviedb.org/3/tv/" . $id . "?api_key=4050c61edeca6dd91bd3d9d71914cd3b&language=es";
    $api = file_get_contents($url, false);
    $series = json_decode($api);

    return $series;
  }
}
