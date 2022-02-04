<?php

class VistaVerComentarios extends Vista
{

  public function __construct()
  {
    $html = "";
  }

  public function render($comentarios)
  {
    foreach ($comentarios as $comentario) {
      $this->html .=
        '<div>
          <p>' . $comentario->getTexto . '</p>
        </div>';
    }
    echo $this->html;
  }
}
