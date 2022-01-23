<?php
include "lib.php";

if ($_POST) {
  if (isset($_POST['añadirPalabra'])) {
    if (isset($_POST['espanol']) && isset($_POST['ingles'])) {
      $espanol = filtrado(($_POST['espanol']));
      $ingles = filtrado($_POST['ingles']);
      añadirPalabra($espanol, $ingles);
    }
  }
  if (isset($_POST['eliminarPalabra'])) {
    $espanol = filtrado($_POST['espanol']);
    eliminarPalabra($espanol);
  }
  if (isset($_POST['Buscar'])) {
    if (isset($_POST['palabra'])) {
      $palabra = filtrado($_POST['palabra']);
      $resultado = buscarPalabra($palabra);
      header("Location: index.php?palabra=" . $palabra . "&significado=" . $resultado);
      exit;
    }
  }
  header("Location: index.php");
  exit;
}
