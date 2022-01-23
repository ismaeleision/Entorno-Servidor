<?php
class VistaOpciones
{
  public function __construct()
  {
    $this->html = "";
  }
  public function render()
  {
    $cabecera = new VistaCabecera();
    $pie = new VistaPie();
    $this->html .= $cabecera->render();

    //Cuerpo del html
    $this->html .= '
  <div class="container">
    <div class="row">
      <div class="col-4">
      <a href="enrutador.php?accion=partida"><button type="button" class="btn btn-dark">Nueva Partida</button></a>
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
    $this->html .= $pie->render();
    echo $this->html;
  }
}
