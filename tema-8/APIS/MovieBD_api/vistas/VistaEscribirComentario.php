<?php
class VistaEscribirComentario
{

  public function __construct()
  {
    $html = "";
  }

  public function render()
  {
    $this->html = '
    <form>
      <div class="mb-3">
        <label for="texto" class="form-label">Postea tu comentario</label>
        <input type="text" class="form-control" id="texto">
      </div>
      <button  class="btn btn-dark" id="enviarComentario">POST</button>
    </form>';

    echo $this->html;
  }
}
