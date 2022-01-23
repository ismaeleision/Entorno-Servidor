<?php

class VistaCartas extends Vista
{

  public function __construct()
  {
    parent::__construct();
  }

  public function render($cartas)
  {

    $this->html .= '
    <!DOCTYPE html>
<html lang="en">

<head>
  <title>BD Cartas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body>
  <div class="container bg-dark">';

    //la imagen es un array asi que hay que filtrar aqui cual se quiere o en CartaBD

    foreach ($cartas as $carta) {
      $this->html .= '
      <div class="card" style="width: 18rem;">
        <img src="' . $carta->getImg()->{"normal"} . ' " class="card-img-top" width="400px" height="450px">
        <div class="card-body">
        <h5 class="card-title">' . $carta->getNombre() . '</h5>
        <p class="card-text"></p>
      </div>
    </div>';
    }

    $this->html .= '</div>
</body>
</html>
    ';

    echo $this->html;
  }
}
