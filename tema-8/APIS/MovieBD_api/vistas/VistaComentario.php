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
    foreach ($comentarios as $comentario) {
      $this->html .= '
      <div>
        <p>' . $comentario->getTexto() . '</p>
      </div>';
    }


    $this->html .= '</div>';
    echo $this->html;
  }
}
