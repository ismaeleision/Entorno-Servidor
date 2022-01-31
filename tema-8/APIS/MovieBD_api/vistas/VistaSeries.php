<?php

class VistaSeries
{

  public function __construct()
  {
    $html = "";
  }

  public function render()
  {
    $this->html = '
    <!DOCTYPE html>
<html lang="en">

<head>
  <title>Series Api</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="imgs/contacto.png" sizes="256x256" type="image/png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body style="height:1500px">
  <div class="container align-items-center">
    <h2>API SERIES</h2>
  </div>
  <div class="container mt-3 p-5">
    <div class="col-2" id="menu">
      <div class="row mt-2">
        <button class="btn btn-success" id="accion">Accion</button>
      </div>
      <div class="row mt-1">
        <button class="btn btn-success" id="16">Animacion</button>
      </div>
      <div class="row mt-1">
        <button class="btn btn-success" id="35">Comedia</button>
      </div>
      <div class="row mt-1">
        <button class="btn btn-success" id="80">Crimen</button>
      </div>
      <div class="row mt-1">
        <button class="btn btn-success" id="99">Documental</button>
      <div>
    </div>
    <div class="col-8" id="muestreo">

    </div>
  </div>

  <script type="text/javascript">
  window.addEventListener("load", inicio);

  //Funcion inicio
  async function inicio() {

    //Boton Nueva Partida
    document.getElementById("accion").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "accion");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });
  }
  </script>

</body>
</html>
    ';

    echo $this->html;
  }
}
