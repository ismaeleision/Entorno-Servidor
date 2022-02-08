<?php

class VistaInicio
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body style="height:1500px">
  <div class="container">
    <div class="row mt-3">
      <div class="col-6">
        <h1><strong>Chuck Norris API Jokes</strong></h1> 
        <h5>Click on the categories below to get a random joke about it</h5>
      </div>
      <div class="col-2 mt-2">
      <input type="search" class="form-control form-control-dark" placeholder="Search..." aria-label="Search" id="buscador">
      </div>
    </div>
    <div class="row" id="contenedor">
      <div class="col-2" id="menu">
        <div class="row mt-1">
          <button class="btn btn-success" id="random">Random</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="animal">Animals</button>        
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="career">Career</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="dev">Dev</button>
        </div>
        <div class="row mt-1">          
          <button class="btn btn-success" id="genero" value="explicit">Explicit</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="fashion">Fashion</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="food">Food</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="history">History</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="money">Money</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="music">Music</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="political">Political</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="religion">Religion</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="science">Science</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="sport">Sport</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="genero" value="travel">Travel</button>
        </div>
      </div>
      <div class="col-9 ms-2">
        <div class="row" id="muestreo">
        </div>
      </div>
    </div>
  </div>
 

  <script type="text/javascript">
  window.addEventListener("load", inicio);

  //Funcion inicio
  async function inicio() {
    //Si se pulsa el boton random lanza la llamada a enrutador con la accion random
    document.getElementById("random").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "random");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    //Cada vez que se levante la tecla mientras se escriba en el buscador lanza la llamada a accion buscador
    document.getElementById("buscador").addEventListener("keyup", async function(e){
      const datos = new FormData();
      datos.append("accion", "buscador");
      datos.append("buscador", document.getElementById("buscador").value);
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("contenedor"),addEventListener("click", async function(e){
      //si el id es genero manda una llamada a enrutador con accion genero y genero valor del boton
      let botonPost = e.target.closest("button[id=genero]");
      if (botonPost){
        const datos = new FormData();
        datos.append("accion", "genero");
        datos.append("genero", botonPost.value);
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("muestreo").innerHTML = await response.text();
      }
    });
  }
  </script>

</body>
</html>
    ';

    echo $this->html;
  }
}
