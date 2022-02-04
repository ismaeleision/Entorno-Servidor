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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</head>

<body style="height:1500px">
  <div class="container">
    <div class="row" id="contenedor">
      <h2>API SERIES</h2>
      <div class="col-1" id="menu">
        <div class="row mt-1">
          <button class="btn btn-success" id="accion">Accion</button>        
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="animacion">Animacion</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="comedia">Comedia</button>
        </div>
        <div class="row mt-1">          
          <button class="btn btn-success" id="crimen">Crimen</button>
        </div>
        <div class="row mt-1">
          <button class="btn btn-success" id="documental">Documental</button>
        </div>
      </div>
      <div class="col-11">
        <div class="row" id="muestreo">
        </div>
      </div>
    </div>
    <div id="comentarios"></div>
  </div>
 

  <script type="text/javascript">
  window.addEventListener("load", inicio);

  //Funcion inicio
  async function inicio() {

    document.getElementById("accion").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "accion");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("animacion").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "animacion");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("comedia").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "comedia");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("crimen").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "crimen");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("documental").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "documental");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("muestreo").innerHTML = await response.text();
    });

    document.getElementById("contenedor"),addEventListener("click", async function(e){
      //Boton Info para desplegar la pelicula
      let botonInfo = e.target.closest("button[id=info]");
      if (botonInfo){
        const datos = new FormData();
        datos.append("accion", "id");
        datos.append("id", parseInt(botonInfo.value));
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("muestreo").innerHTML = await response.text();
      }

      //Boton Comentario 
      let botonComentario = e.target.closest("button[id=comentario]");
      if (botonComentario){
        const datos = new FormData();
        datos.append("accion", "comentario");
        datos.append("id", parseInt(botonComentario.value));
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("comentarios").innerHTML = await response.text();
      }

      //Boton para desplegar el formulario para escribir el comentario
      let botonEscribir = e.target.closest("button[id=escribir]");
      if (botonEscribir){
        const datos = new FormData();
        datos.append("accion", "verEscribir");
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("comentarios").innerHTML = await response.text();
      }

      //Boton subir el comentario
      let botonPost = e.target.closest("button[id=enviarComentario]");
      if (botonPost){
        const datos = new FormData();
        datos.append("accion", "escribir");
        datos.append("id", parseInt(document.getElementById("comentario").value));
        datos.append("comentario", document.getElementById("texto").value);
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("comentarios").innerHTML = await response.text();
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
