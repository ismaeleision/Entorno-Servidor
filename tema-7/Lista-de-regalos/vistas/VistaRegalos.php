<?php
class VistaRegalos extends Vista
{
  public function __construct()
  {
    parent::__construct();
  }

  public function render($regalos)
  {
    $vistaC = new VistaCabecera();
    $vistaP = new VistaPie();
    $this->html .= $vistaC->render();
    $this->html .= unserialize($_SESSION['usuario'])[0]->getNombre() . '
    <div class="row">
    <div class="col-4"></div>
    <div class="col-6>
      <table class="table table-hover">
        <thead>
          <tr>
            <td>NOMBRE</td>
            <td>DESTINATARIO</td>
            <td>PRECIO</td>
            <td>ESTADO</td>
            <td>ACCIONES</td>     
          </tr>
        </thead>
        <tbody>';

        foreach ($regalos as $regalo) {
          $this->html .= '<tr>
          <td>' . $regalo->getNombre() . '</td>
          <td>' . $regalo->getDestinatario() . '</td>
          <td>' . $regalo->getPrecio() . '</td>
          <td>' . $regalo->getEstado() . '</td>
          <td><a href="enrutador.php?accion=quitarRegalo&id=' . $regalo->getId() . '">X</a></td>
          </tr>';
        }

    $this->html .= '
          </tbody>
        </table>
      </div>
    </div>';
    $this->html .= $vistaP->render();
    echo $this->html;
  }
}
