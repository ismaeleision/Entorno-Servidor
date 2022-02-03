<?php

class VistaAmpliada extends Vista
{

  public function __construct()
  {
    $html = "";
  }

  public function render($serie)
  {
    $this->html .=
      '<div class="container col-10">
          <img src="https://image.tmdb.org/t/p/w500' .  $serie->poster_path . '" width="1000px" height="650px">
          <div class="row">
              <h5 class="card-title">' . $serie->name . '</h5>
              <p>' . $serie->first_air_date . '</p>    
              <p class="card-text"><strong>Sinopsis</strong><br>' . $serie->overview . '</p>
              <p class="card-text">Media Votos ' . $serie->vote_average . ' </p>
          </div>
          <div class="row">
            <button class="btn btn-dark" id="comentario">Comentarios</button>
            <button class="btn btn-dark" id="escribir">Escribir Comentario</button>
          </div>
        </div>';

    echo $this->html;
  }
}
