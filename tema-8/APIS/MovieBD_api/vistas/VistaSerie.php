<?php

class VistaSerie extends Vista
{

  public function __construct()
  {
    $html = "";
  }

  public function render($series)
  {

    foreach ($series as $serie) {
      $this->html .=
        '<div class="card" style="width: 18rem;">
          <img src="https://image.tmdb.org/t/p/w500' .  $serie->poster_path . '" class="card-img-top" width="400px" height="450px">
          <div class="card-body">
            <h5 class="card-title">' . $serie->name . '</h5>
            <p class="card-text"><strong>Sinopsis</strong><br>' . $serie->overview . '</p>
            <p class="card-text">Media Votos ' . $serie->vote_average . ' </p>
            <button class="btn btn-dark" id="info" value="' . $serie->id . '">+Info</button>
          </div>
        </div>';
    }
    echo $this->html;
  }
}
