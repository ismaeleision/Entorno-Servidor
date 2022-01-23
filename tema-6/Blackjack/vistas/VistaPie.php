<?php
class VistaPie
{
  public function __construct()
  {
    $this->html = "";
  }

  public function render()
  {
    $this->html .= '
    </body>
    </html>';
    echo $this->html;
  }
}
