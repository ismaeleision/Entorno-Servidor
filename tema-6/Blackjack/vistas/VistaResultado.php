<?php
class VistaResultado extends Vista
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render($elementos)
  {
    $vistaC = new VistaCabecera();
    $vistaP = new VistaPie();
    $this->html .= $vistaC->render();
    $this->html .= '
    <div class="container" id="manos">
      <div class="row" id="crupier">
        <div class="col">
          <p>Crupier</p>';
    $direccion = $elementos->getCrupier()->mano();
    foreach ($direccion  as $carta) {
      $this->html .= '<img src="vistas/img/' . $carta . '.png" width="150px" height="200px">';
    }
    $this->html .=  '//' . $elementos->getCrupier()->valorMano();
    $this->html .=
      '</div>
      </div>
      <br>
      <div class="row" id="jugador">
        <div class="col">
          <p>Jugador</p> ';
    $direccion = $elementos->getJugador()->mano();
    foreach ($direccion  as $carta) {
      $this->html .= '<img src="vistas/img/' . $carta . '.png" width="150px" height="200px">';
    }
    $this->html .=  '//' . $elementos->getJugador()->valorMano();
    $this->html .=
      ' </div>
      </div>
    </div>
    <div class="container" id="botones">
      <div class="d-grid gap-2 d-md-block">
        <a href="enrutador.php?accion=partida"><button type="button" class="btn btn-dark">Nueva Partida</button></a>
        <a href="enrutador.php?accion=inicio"><button type="button" class="btn btn-dark">Menu Inicio</button></a>
        <a href="enrutador.php?accion=salirJuego"><button type="button" class="btn btn-dark">Salir del Juego</button></a>
      </div>
    </div>
    ';
    $this->html .= $vistaP->render();
    echo $this->html;
  }
}
