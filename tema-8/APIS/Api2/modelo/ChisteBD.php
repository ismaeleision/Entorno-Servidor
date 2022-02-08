<?php

class ChisteBD
{
  //obtiene de la api un chiste aleatorio que contenga el genero
  public static function getRandomGenero($genero)
  {
    $url = "https://api.chucknorris.io/jokes/random?category=" . $genero;
    $api = file_get_contents($url, false);
    $chiste = json_decode($api);
    $X = new Chiste($chiste->categories[0], $chiste->created_at, $chiste->url, $chiste->value);

    return $X;
  }

  //obtiene un chiste aleatorio sin genero
  public static function getRandom()
  {
    $url = "https://api.chucknorris.io/jokes/random";
    $api = file_get_contents($url, false);
    $chiste = json_decode($api);
    $X = new Chiste("", $chiste->created_at, $chiste->url, $chiste->value);

    return $X;
  }

  //obtiene todos los chistes que contengan las palabras o palabra que se haya escrito en el buscador
  public static function buscador($palabra)
  {
    try {
      $url = "https://api.chucknorris.io/jokes/search?query=" . $palabra;
      $api = file_get_contents($url, false);
      $chistes = json_decode($api);
      $chistes = $chistes->result;
      $x = [];
      foreach ($chistes as $chiste) {
        $X = new Chiste('', $chiste->created_at, $chiste->url, $chiste->value);
        array_push($x, $X);
      }

      return $x;
    } catch (error $e) {
      throw "No se ha encontrador nada";
    }
  }
}
