<?php

class VistaChisteBuscador extends Vista
{

  public function __construct()
  {
    $this->html;
  }

  public function render($chistes)
  {
    foreach ($chistes as $chiste) {
      $this->html .= '
    <div class="card ms-3 mb-2" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">' . $chiste->getCreated_at() . '</h5>
        <h6 class="card-subtitle mb-2 text-muted">' . $chiste->getCategory() . '</h6>
        <p class="card-text">' . $chiste->getValue() . '</p>
        <a href="' . $chiste->getUrl() . '" class="card-link">+ Info</a>
      </div>
    </div>
    ';
    }
    echo $this->html;
  }
}
