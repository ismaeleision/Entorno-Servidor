<?php

class SeriesBD
{

  /**
   * Obtiene todos los productos de la BD
   */
  public static function getSeries($genero)
  {
    $url = "https://api.themoviedb.org/3/discover/tv?with_genres=" . $genero . "&api_key=4050c61edeca6dd91bd3d9d71914cd3b&language=en-US";
    $series = file_get_contents($url, false);
    $series = json_decode($series, true);
    $movies = [];

    foreach ($series as $serie) {
      var_dump($serie["original_name"]);
      $x = new Series($serie["original_name"], $serie["poster_path"], $serie["vote_average"], $serie['overview']);
      array_push($movies, $x);
    }

    return $movies;
  }
}
