<?php

class VistaPartida extends Vista
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render($elementos)
  {
    $vistaC = new VistaCabecera();
    $vistaP = new VistaPie();
    $this->html .= $vistaC->render();
    $this->html .= '
    <div class="container" id="manos">
      <div class="row" id="crupier">
        <div class="col-6">
          <p>Crupier</p>';
    $direccion = $elementos->getCrupier()->mano();
    $contador = 0;
    foreach ($direccion  as $carta) {
      //El contador sirve para pintar solo la primera carta, las demas tienen que verse el reverso
      if ($contador < 1) {
        $contador++;
        $this->html .= '<img src="vistas/img/' . $carta . '.png" width="150px" height="200px">';
      } else {
        $this->html .= '<img src="vistas/img/reverso.png" width="150px" height="200px">';
      }
    }
    $this->html .=
      '</div>
      </div>
      <br>
      <div class="row" id="jugador">
        <div class="col-6">
          <p>Jugador</p> ';
    //guarda el contenido la mano del jugador y lo introduce en un img para pintarlo
    $direccion = $elementos->getJugador()->mano();
    foreach ($direccion  as $carta) {
      $this->html .= '<img src="vistas/img/' . $carta . '.png" width="150px" height="200px">';
    }
    //Muestra el valor de la mano del jugador como asistencia en la partida
    $this->html .=  '//Valor--' . $elementos->getJugador()->valorMano();
    $this->html .=
      ' </div>
      </div>
    </div>
    <div class="container-fluid" id="botones">
      <div class="row">
        <div class="col-3">
          <a href="enrutador.php?accion=plantarse"><button type="button" class="btn btn-dark">Plantarse</button></a>
        </div>
        <div class="col-3">
          <a href="enrutador.php?accion=otraCarta"><button type="button" class="btn btn-dark">Otra Carta</button></a>
        </div>
        <div class="col-3">
         <a href="enrutador.php?accion=partida"><button type="button" class="btn btn-dark">Rendirse</button></a>
        </div>
        <div class="col-3">
          <a href="enrutador.php?accion=salirJuego"><button type="button" class="btn btn-dark">Salir del Juego</button></a>
        </div>
      </div>
    </div>
    ';
    $this->html .= $vistaP->render();
    echo $this->html;
  }
}
