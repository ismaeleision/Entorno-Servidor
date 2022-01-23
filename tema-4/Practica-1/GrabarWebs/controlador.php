<?php
include "lib.php";
if ($_GET) {
  if (isset($_GET['accion'])) {

    if ($_GET['accion'] == "facebook") {
      DatosFace();
    }
    if ($_GET['accion'] == "cnn") {
      datosCNN();
    }
    if ($_GET['accion'] == "concurrencias") {
      $numero = concurrenciasBiden();
      header("Location: index.php?concurrencias=$numero");
      exit;
    }
    header("Location; index.php");
    exit;
  }
}
