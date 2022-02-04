<?php
class VistaComentario extends Vista
{

  public function __construct()
  {
    $this->html = "";
  }

  public function render($comentarios)
  {
    $this->html .= '
    <div class="container">';
    $var = 0;
    foreach ($comentarios as $comentario) {
      $var++;
      $this->html .= '
      <div>
        <p>Comentario ' . $var . '---' . $comentario->getTexto() . '</p>
      </div>';
    }


    $this->html .= '</div>';
    echo $this->html;
  }
}
