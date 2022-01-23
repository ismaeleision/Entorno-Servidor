<?php
class VistaAjax
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render()
  {
    $vistaC = new VistaCabecera();
    $vistaP = new VistaPie();
    $this->html .= $vistaC->render();
    $this->html .=
      '
<div class="container-fluid" id="contenedor"></div>
  <div class="container mt-3">
    <div class="row">
      <div class="col-4">
        <button type="button" class="btn btn-dark" id="nuevaPartida">Nueva Partida</button>
      </div>
      <div class="col-4">
        <div>
          Partidas Jugadas: ' . $_SESSION['partidasJugadas'] . '
        </div>
        <div>
          Victorias: ' . $_SESSION['partidasGanadas'] . '
        </div>
      </div>
    </div>
  </div>
  
    ';
    $this->html .= $vistaP->render();
    echo $this->html;
  }
}
