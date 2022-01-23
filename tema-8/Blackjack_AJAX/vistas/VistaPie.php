<?php
class VistaPie
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render()
  {
    $this->html .= '
<script type="text/javascript">
  window.addEventListener("load", inicio);

  //Funcion inicio
  async function inicio() {

    //Boton Nueva Partida
    document.getElementById("nuevaPartida").addEventListener("click", async function(e){
      const datos = new FormData();
      datos.append("accion", "partida");
      const response = await fetch("enrutador.php", {method: "POST", body: datos});
      document.getElementById("contenedor").innerHTML = await response.text();
    });

    document.getElementById("contenedor"),addEventListener("click", async function(e){
      //Boton plantarse
      let botonPlantarse = e.target.closest("button[id=plantarse]");
      if (botonPlantarse){
        const datos = new FormData();
        datos.append("accion", "plantarse");
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("contenedor").innerHTML = await response.text();
      }

      //Boton otraCarta
      let botonOtra = e.target.closest("button[id=otraCarta]");
      if(botonOtra){
        const datos = new FormData();
        datos.append("accion", "otraCarta");
        const response = await fetch("enrutador.php", {method: "POST",body: datos});
        document.getElementById("contenedor").innerHTML = await response.text();
      }

      //Boton Rendirse
      let botonRendirse = e.target.closest("button[id=rendirse]");
      if(botonRendirse){
        const datos = new FormData();
        datos.append("accion", "partida");
        const response = await fetch("enrutador.php", {method: "POST", body: datos});
        document.getElementById("contenedor").innerHTML = await response.text();
      }
    });
}
</script>
</body>
</html>';
    echo $this->html;
  }
}
